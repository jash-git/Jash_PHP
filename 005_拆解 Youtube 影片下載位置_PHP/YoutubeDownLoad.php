<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!-- InstanceBeginEditable name="doctitle" -->
		<title>YoutubeDownload</title>
	  <style type="text/css">
		html{font-size:20px;}
		fieldset{width:650px; margin: 0 auto;}
		legend{font-weight:bold; font-size:24px;}
		.label{float:left; width:100px; margin-left:20px;}
		.left{margin-left:180px;font-size:18px;}
		.input{width:500px;}
		span{color: #666666;}
	  </style>		
	</head>
	<body>
		<div>
			<fieldset>
				<legend></legend>
				<form name="InputURL" method="post">
					<p>
					<label for="ex:" class="input">範例輸入:https://www.youtube.com/watch?v=n4LZ2ooE_2E</label>
					<p/>
					<p>
					<label for="url" class="label">輸入網址:</label>
					<input id="url" name="url" type="text" class="input" />
					<p/>
					<p>
					<input type="submit" name="submit" value="  確  定  " class="left" />
					</p>
					<p>
					簡易操作步驟:<br><br>
					01.首先你必須先將youtube影片的連結網址複製下來,胋到下面程式「輸入網址』的空格裡。<br><br>
					02.接著按「確定』後,下方會出面這個影片的實際檔案存放位置,其中包括各種清晰度的版本,
					你可以選擇其中一個在文字的上面按滑鼠右鍵，選擇「另存連結為』或「鏈結另存新檔』,
					在出現的視窗中選擇要儲存的位置。<br>
					(ps建議選擇第一個因為畫質最好，另外如果儲存視窗沒有給副檔名記得自己補上.mp4)<br><br>
					03.最後就等影片下載完成後欣賞囉!!<br><br>
					(ps如果不能下載，有可能是該影片為版權影片)
					</p>
				</form>
			</fieldset>
		</div>	
	</body>
</html>
<?php
	header('content-type:text/html;charset=utf-8');
	function GetYoutubeVideoID($URL)//->https://www.youtube.com/watch?v=4giqv8YT2Ss
	{
		$my_array_of_vars=array();
		parse_str( parse_url( $URL, PHP_URL_QUERY ), $my_array_of_vars );
		return $my_array_of_vars['v']; 
	}
	//->https://www.youtube.com/watch?v=4giqv8YT2Ss
	//GetShowYoutubeFileUrl("4giqv8YT2Ss");
	//GetShowYoutubeFileUrl(GetYoutubeVideoID("https://www.youtube.com/watch?v=4giqv8YT2Ss"));
	function GetShowYoutubeFileUrl($video_id)
	{

		set_time_limit(10); // 10S
		//$video_id = $_GET['video_id']; // 讓 video_id 可以透過 query string 代入，這樣可以動態拆解不同的 Youtube 影片
		//jash mark //$video_id = 'fEcnrA6RIzo';
		 
		$params = array(); // 宣告 $params 為 array
		// 讀取 Youtube API 的 query

		$query_string = file_get_contents('http://www.youtube.com/get_video_info?video_id=' . $video_id);
		
		parse_str($query_string, $params); // 拆解 query string 載入至 $params
		 
		$streams = explode(',', $params['url_encoded_fmt_stream_map']); // 以 , 將 $params['url_encoded_fmt_stream_map'] 分拆
		foreach ($streams as $stream)
		{
			$s = array();
			parse_str($stream, $s);
			if (($index = strpos($s['type'], ';')) !== false)
			{
				$s['mime'] = substr($s['type'], 0, $index); // 選取 mimetype 部分
			}
		//  是因為 br 在 blog 中會變成換行，不能顯示，閣下是不需要將 br 分開
			printf('<a href="%s&signature=%s">%s-%s(%s-%s)</a><b' . 'r/>'
				, urldecode($s['url'])
				, $s['sig']
				, $params['author']
				, $params['title']
				, $s['mime']
				, $s['quality']
			);
		}		
	}
	if(isset($_POST['submit']))
	{
		$url=$_POST['url'];
		GetShowYoutubeFileUrl(GetYoutubeVideoID($url));
	}
?>
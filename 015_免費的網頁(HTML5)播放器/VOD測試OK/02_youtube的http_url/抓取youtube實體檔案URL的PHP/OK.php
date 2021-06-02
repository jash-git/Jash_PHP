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
	GetShowYoutubeFileUrl(GetYoutubeVideoID("https://www.youtube.com/watch?v=rWvwUvTH880"));
?>
<?php
	//jashlib.php
	function Printf_n($string)//��¤�r��X����
	{
		echo $string."<br>";
	}
	function BoldString($string)//��¤�r�����X
	{
		echo "<b>".$string."</b>";
	}
	function SWAP(&$a,&$b)//�z�L��}�覡�洫���
	{
		$c=$a;
		$a=$b;
		$b=$c;
	}
	$fp;
	function OpenLogFile($FileName)
	{
		global $fp;
		$fp=fopen($FileName,"a+");
	}
	function WriteLog($FileName,$Position,$Message)
	{
		//WriteLog(__FILE__,__LINE__,"Message");
		global $fp;
		fprintf($fp,"%s,%d-%s\n",$FileName,$Position,$Message);
	}
	function CloseLogFile()
	{
		global $fp;
		fclose($fp);
	}
	
	function GetYoutubeVideoID($URL)//->https://www.youtube.com/watch?v=4giqv8YT2Ss
	{
		$my_array_of_vars=array();
		parse_str( parse_url( $URL, PHP_URL_QUERY ), $my_array_of_vars );
		return $my_array_of_vars['v']; 
	}
	
	//->https://www.youtube.com/watch?v=4giqv8YT2Ss
	//GetShowYoutubeFileUrl("4giqv8YT2Ss");
	//GetShowYoutubeFileUrl(GetYoutubeVideoID("https://www.youtube.com/watch?v=4giqv8YT2Ss"));
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
		//$video_id = $_GET['video_id']; // �� video_id �i�H�z�L query string �N�J�A�o�˥i�H�ʺA��Ѥ��P�� Youtube �v��
		//jash mark //$video_id = 'fEcnrA6RIzo';
		 
		$params = array(); // �ŧi $params �� array
		// Ū�� Youtube API �� query

		$query_string = file_get_contents('http://www.youtube.com/get_video_info?video_id=' . $video_id);
		
		parse_str($query_string, $params); // ��� query string ���J�� $params
		 
		$streams = explode(',', $params['url_encoded_fmt_stream_map']); // �H , �N $params['url_encoded_fmt_stream_map'] ����
		foreach ($streams as $stream)
		{
			$s = array();
			parse_str($stream, $s);
			if (($index = strpos($s['type'], ';')) !== false)
			{
				$s['mime'] = substr($s['type'], 0, $index); // ��� mimetype ����
			}
		//  �O�]�� br �b blog ���|�ܦ�����A������ܡA�դU�O���ݭn�N br ���}
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
?>
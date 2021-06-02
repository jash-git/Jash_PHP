
<?php
	//GOOGLE: php get google search result
	//資料來源:http://leandroarts.com/how-to-scrape-google-search-results-for-query-popularity-with-php/
	header('content-type:text/html;charset=utf-8');
	include_once('simple_html_dom.php');
	$query = "jashliao 學佛問答"; // This is the search term you are using.. use a form submission.. or pull the titles from an RSS feed via SimplePie, etc..
	$domain="jashliao.pixnet.net";
	$otherpage="&start=";
	function fetch_google($query,$domain,$otherpage)
	{
		$cleanQuery = str_replace(" ","+",$query);
		$url = 'http://www.google.com/search?q='.$cleanQuery;
		//ini_set("user_agent","Opera/9.80 (Windows NT 6.1; U; Edition Campaign 21; en-GB) Presto/2.7.62 Version/11.00");
		$scrape = file_get_contents($url);
		$seach_c=0;
		$seo_c=0;
		$seach=array();
		$seo=array();

		$html = str_get_html($scrape);
		foreach($html->find('a') as $element)
		{
			$conditions='/url?q='.$domain;
			if (false !== ($rst = strpos($element->href, $otherpage)))
			{
				$seach[$seach_c]='http://www.google.com.tw'.$element->href;
				$seach_c=$seach_c+1;
			}
			if (false !== ($rst = strpos($element->href, $conditions)))
			{
				$seo[$seo_c]='http://www.google.com.tw'.$element->href;
				$seo_c=$seo_c+1;
			}					
		}
		echo "搜尋網址:<br>";
		for($i=0;$i<$seach_c;$i++)
		{
			echo $seach[$i].'<br>';
			$scrape = file_get_contents($seach[$i]);
			$html = str_get_html($scrape);
			foreach($html->find('a') as $element)
			{
				if (false !== ($rst = strpos($element->href, $conditions)))
				{
					$seo[$seo_c]='https://www.google.com.tw'.$element->href;
					$seo_c=$seo_c+1;
				}				
			}
		}
		
		echo "SEO網址:<br>";
		$pf=fopen("seo.txt","w");
		for($j=0;$j<$seo_c;$j++)
		{
			echo $seo[$j].'<br><br>';
			fprintf($pf,"%s\n",$seo[$j]);
		}
		fclose($pf);
		echo "<script>document.location.href=\"./run_seo.php?now=0&count=$seo_c\";</script>";
		exit;
	}
	
	if(isset($_POST['searchconditions']))
	{
		$query=$_POST['searchconditions'];
		$domain=$_POST['searchdomain'];
		$otherpage="start=";
		fetch_google($query,$domain,$otherpage);		
	}
?>
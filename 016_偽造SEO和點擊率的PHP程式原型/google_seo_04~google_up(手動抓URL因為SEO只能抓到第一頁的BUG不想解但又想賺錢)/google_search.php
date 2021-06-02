<?php
	header('content-type:text/html;charset=utf-8');
	$query = "Murder in Pretoria? OJ detective says 'Blade Runner' evidence is overwhelming";
	// This is the search term you are using.. use a form submission.. or pull the titles from an RSS feed via SimplePie, etc..
	function fetch_google($query)
	{
		$cleanQuery = str_replace(" ","+",$query);
		$url = 'http://www.google.com/search?q='.$cleanQuery.'&start=20';
		$scrape = file_get_contents($url);
		$scrapedItem = preg_match_all('/About.*?results/i', $scrape, $matches, PREG_PATTERN_ORDER);
		$results = $matches[0][0];
		$scrapedItem2 = preg_match_all('/[1-9](?:\d{0,2})(?:,\d{3})*(?:\.\d*[1-9])?|0?\.\d*[1-9]|0/i', $results, $matches2, PREG_PATTERN_ORDER);
		$finalResult = $matches2[0][0];
		echo '<div style="position: aboslute; top: 0px; left: 0px; color: #bada55; background: #000; padding: 65px; z-index: 9999999999999;">';
		echo '<h3>The Search Query (ie, Title of rss post)</h3>';
		print_r($query);
		echo '<br />';
		echo '<h3>Google Result for the query</h3>';
		echo $results;
		echo '<br />';
		echo '<h3>Scraped Total</h3>';
		echo $finalResult;
		echo '<br />';
		echo '</div>';
		print_r($scrape);
	}
	if(isset($_POST['searchconditions']))
	{
		$query=$_POST['searchconditions'];
		fetch_google($query);		
	}
?>	
	
<?php
	header("Content-Type:text/html; charset=utf-8");//PHP 亂碼
	require ('config.inc.php'); 		//加載數據庫配置文件
	$sql = "SELECT * FROM county";
	$numRecord = mysql_query($sql);
	while($rs=mysql_fetch_object($numRecord))
	{
		echo $rs->id;
		echo '<br>'; 
		echo $rs->county;
		echo '<br>';
		echo '<br>';
	}
?>
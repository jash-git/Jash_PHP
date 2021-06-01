<?php
	header("Content-Type:text/html; charset=utf-8");//PHP 亂碼
	$user=$_GET['user'];
	$pw=$_GET['pw'];
	$dbname=$_GET['dbname'];
	$server=$_GET['host'];
	set_time_limit(3600);//1hr time_out
	if(!isset($user) || !isset($pw) || !isset($dbname) || !isset($server))
	{
		die('參數不足，無法執行');
	}
	str_replace ("_",".",$server);
	$conn_string = "host=".$server." port=5432 dbname=".$dbname." user=".$user." password=".$pw;
	//$conn_string = "host=127.0.0.1 port=5432 dbname=vk user=postgres password=postgres";
	$dbconn = pg_connect ($conn_string) or die('PgSQL connect error');
	pg_set_client_encoding($dbconn, "utf8");
	//http://www.linuxscrew.com/2009/07/03/postgresql-show-tables-show-databases-show-columns/
	$sql = "SELECT table_name FROM information_schema.tables WHERE table_schema = 'public'";// 抓取單一資料庫內的 資料表 數量
	$result = pg_query($dbconn,$sql) or die('PgSQL query error');
	
	$filename = "TablesList.bat";
	$filename1="List.txt";
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	$myfile1 = fopen($filename1, "w") or die("Unable to open file!");
	fwrite($myfile1, $filename1."\r\n");
	while ($row = pg_fetch_row($result))
	{
		/*
		wget.exe "http://localhost:8080/ms_my_pg_test/MySQL2CSV.php?user=root&pw=usbw&dbname=register&tbname=user" -O 03.log
		*/
		$data="";
		$data="wget.exe \"http://localhost/PgSQL2CSV.php?user=".$user."&pw=".$pw."&dbname=".$dbname."&tbname=".$row[0]."&host=".$server."\" -O 03.log";
		fwrite($myfile, $data."\r\n");
		fwrite($myfile1, $dbname."_".$row[0].".csv\r\n");
		echo "<br>".$row[0];
	}
	pg_free_result($result);
	pg_close($con);
	fclose($myfile);
	fclose($myfile1);
	echo "MySQL2TablesList.php done...";	
?>
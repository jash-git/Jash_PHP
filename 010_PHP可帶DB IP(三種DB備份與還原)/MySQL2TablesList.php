<?php
	header("Content-Type:text/html; charset=utf-8");//PHP 亂碼
	//數據庫配置信息
	$user=$_GET['user'];
	$pw=$_GET['pw'];
	$dbname=$_GET['dbname'];
	$server=$_GET['host'];
	set_time_limit(3600);//1hr time_out
	if(!isset($user) || !isset($pw) || !isset($dbname) || !isset($server))
	{
		die('參數不足，無法執行');
	}
	define('DB_HOST', '127.0.0.1'); //數據庫服務器主機地址    
	define('DB_USER', 'root'); 			//數據庫帳號    
	define('DB_PW', 'usbw'); 				//數據庫密碼    
	define('DB_NAME', 'register'); //數據庫名     
	define('DB_CHARSET', 'utf8'); 	//數據庫字符集    
	define('DB_PCONNECT', 1); 			//0 或1，是否使用持久連接    
	define('DB_DATABASE', 'mysql'); //數據庫類型
	
	str_replace ("_",".",$server);
	$con=mysql_connect($server,$user,$pw) or die('鏈接數據庫失敗！');
	mysql_query('set names utf8');
	mysql_select_db($dbname);
	$sql = "SHOW TABLES FROM ".$dbname;// 抓取單一資料庫內的 資料表 數量
	$result = mysql_query($sql);

	if (!$result)
	{
		echo "DB Error, could not list tables<br>";
		echo 'MySQL Error: ' . mysql_error();
		exit;
	}

	$filename = "TablesList.bat";
	$filename1="List.txt";
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	$myfile1 = fopen($filename1, "w") or die("Unable to open file!");
	fwrite($myfile1, $filename1."\r\n");
	while ($row = mysql_fetch_row($result))
	{
		/*
		wget.exe "http://localhost:8080/ms_my_pg_test/MySQL2CSV.php?user=root&pw=usbw&dbname=register&tbname=user" -O 03.log
		*/
		$data="";
		$data="wget.exe \"http://localhost:8080/ms_my_pg_test/MySQL2CSV.php?user=".$user."&pw=".$pw."&dbname=".$dbname."&tbname=".$row[0]."&host=".$server."\" -O 03.log";
		fwrite($myfile, $data."\r\n");
		fwrite($myfile1, $dbname."_".$row[0].".csv\r\n");
		echo "<br>".$row[0];
	}
	mysql_free_result($result);
	mysql_close($con);
	fclose($myfile);
	fclose($myfile1);
	echo "MySQL2TablesList.php done...";
?>	
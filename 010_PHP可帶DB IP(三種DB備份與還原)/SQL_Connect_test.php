<?php
	header("Content-Type:text/html; charset=utf-8");//PHP 亂碼
	$user=$_GET['user'];
	$pw=$_GET['pw'];
	$dbname=$_GET['dbname'];
	$server=$_GET['host'];//$server='127.0.0.1';
	set_time_limit(3600);//1hr time_out
	if(!isset($user) || !isset($pw) || !isset($dbname) || !isset($server))
	{
		die('參數不足，無法執行');
	}
	str_replace ("_",".",$server);
	$filename = "SQL_Connect_test.txt";
	$myfile = fopen($filename, "w");
	
	$conn_string = "host=$server port=5432 dbname=".$dbname." user=".$user." password=".$pw;
	if(function_exists('pg_connect'))//判斷對應套件支援度
	{
		$dbconn = pg_connect ($conn_string);
	}
	if($dbconn)
	{
		fwrite($myfile, "PgSQL");
		pg_close($dbconn);
	}
	else
	{
		if(function_exists('mysql_connect'))//判斷對應套件支援度
		{
			$con=mysql_connect($server,$user,$pw);
		}	
		if($con)
		{
			fwrite($myfile, "MySQL");
			mysql_close($con);
		}
		else
		{
			$connstr = "Driver={SQL Server};Server=$server;Database=$dbname";
			if(function_exists('odbc_connect'))//判斷對應套件支援度
			{
				$connect =odbc_connect($connstr,$user,$pw,SQL_CUR_USE_ODBC);
			}
			if($connect)
			{
				fwrite($myfile, "MsSQL");
				odbc_close($connect);
			}
			else
			{
				fwrite($myfile, "NoSQL");	
			}
		}
	}
	
	fclose($myfile);
	echo "SQL_Connect.php done...";
?>	
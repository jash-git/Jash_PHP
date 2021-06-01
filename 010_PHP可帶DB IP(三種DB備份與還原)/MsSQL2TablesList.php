<?php  
	//http://www.programgo.com/article/48613569901/;jsessionid=85BFB10EFD4F2C1C7F7EC17649DB14B4
	/** 
	* @author samsun 
	* @copyright 2007 
	* php使用ODBC连接sql server数据库实例 
	*/  
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
	
	str_replace ("_",".",$server);//$server='127.0.0.1';
	/*
	$username='root';  
	$password='asd700502';  
	$database='v7';  
	*/
	$connstr = "Driver={SQL Server};Server=$server;Database=$dbname";  
	$connect =odbc_connect($connstr,$user,$pw,SQL_CUR_USE_ODBC)or die ("couldn't connect");

	$result = odbc_tables($connect);// 抓取單一資料庫內的 資料表 數量

	$filename = "TablesList.bat";
	$filename1="List.txt";
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	$myfile1 = fopen($filename1, "w") or die("Unable to open file!");	
	fwrite($myfile1, $filename1."\r\n");
	while(odbc_fetch_row($result))
	{
		/*
		wget.exe "http://localhost:8080/ms_my_pg_test/MySQL2CSV.php?user=root&pw=usbw&dbname=register&tbname=user" -O 03.log
		*/
		if(odbc_result($result,"TABLE_TYPE")=="TABLE")
		{
			echo odbc_result($result,"TABLE_NAME")."<br>";
			$data="";
			$data="wget.exe \"http://localhost:8080/ms_my_pg_test/MsSQL2CSV.php?user=".$user."&pw=".$pw."&dbname=".$dbname."&tbname=".odbc_result($result,"TABLE_NAME")."&host=".$server."\" -O 03.log";		
			fwrite($myfile, $data."\r\n");
			fwrite($myfile1, $dbname."_".odbc_result($result,"TABLE_NAME").".csv\r\n");			
		}
	}
	fclose($myfile);
	fclose($myfile1);
	odbc_free_result($result);
	odbc_close($connect);
	echo "MsSQL2TablesList.php done...";
?>
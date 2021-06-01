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
	$tbname=$_GET['tbname'];
	$server=$_GET['host'];
	set_time_limit(3600);//1hr time_out
	if(!isset($user) || !isset($pw) || !isset($dbname) || !isset($tbname) || !isset($server))
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

	$sql = "truncate table ".$tbname;//清空資料表:	truncate table 資料表名稱;
	$result[0] = odbc_exec($connect,$sql);
	if ( !$result[0] )
	{
		die('無法執行清空資料表');
	}
	$filename = $dbname."_".$tbname.".csv";
	if(file_exists($filename))
	{
		$file = fopen($filename, "r");
		$index=0;
		
		while (!feof($file))
		{
			$str = fgets($file);
			if($str!='')//因為換行符號也算一行，所以雖然只有兩行資料，但是會有三行數據
			{
				if($index==0)
				{
					$field_name=trim($str,"\n");//取出欄位名稱並且刪除'\n'
				}
				else
				{
					$sql="INSERT INTO " .$tbname. "( ".$field_name." ) VALUES (".trim($str,"\n")." )";
					echo $sql;
					echo "<br>";
					$result[$index] = odbc_exec($connect,$sql);
				}
			}
			$index++;
		}
		fclose($file);		
	}
	else
	{
		die('還原檔案不存在');
	}	
	odbc_close($connect);
	echo "MsSQL2CSV.php done...";	
?>	
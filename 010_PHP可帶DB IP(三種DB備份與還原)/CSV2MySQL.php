<?php
	header("Content-Type:text/html; charset=utf-8");//PHP 亂碼
	//數據庫配置信息
	$user=$_GET['user'];
	$pw=$_GET['pw'];
	$dbname=$_GET['dbname'];
	$tbname=$_GET['tbname'];
	$DB_Host=$_GET['host'];
	set_time_limit(3600);//1hr time_out
	if(!isset($user) || !isset($pw) || !isset($dbname) || !isset($tbname) || !isset($DB_Host))
	{
		die('參數不足，無法執行');
	}
	str_replace ("_",".",$DB_Host);
	define('DB_HOST', '127.0.0.1'); //數據庫服務器主機地址    
	define('DB_USER', 'root'); 			//數據庫帳號    
	define('DB_PW', 'usbw'); 				//數據庫密碼    
	define('DB_NAME', 'register'); //數據庫名     
	define('DB_CHARSET', 'utf8'); 	//數據庫字符集    
	define('DB_PCONNECT', 1); 			//0 或1，是否使用持久連接    
	define('DB_DATABASE', 'mysql'); //數據庫類型
	
	$con=mysql_connect($DB_HOST,$user,$pw) or die('鏈接數據庫失敗！');
	mysql_query('set names utf8');
	mysql_select_db($dbname);
	
	
	$sql = "truncate table `".$tbname."`";//清空資料表:	truncate table 資料表名稱;
	$result[0] = mysql_query($sql);
	if ( !$result[0] )
	{
		die(mysql_error());
	}
	//*
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
					$result[$index] = mysql_query($sql);
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
	//*/
	mysql_close($con);	
	echo "CSV2MySQL.php done...";
?>
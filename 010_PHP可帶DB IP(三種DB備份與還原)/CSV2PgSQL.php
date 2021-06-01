<?php
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

	str_replace ("_",".",$server);
	$conn_string = "host=".$server." port=5432 dbname=".$dbname." user=".$user." password=".$pw;
	//$conn_string = "host=127.0.0.1 port=5432 dbname=vk user=postgres password=postgres";
	$dbconn = pg_connect ($conn_string);
	
	$sql = "TRUNCATE TABLE ".$tbname;//清空資料表:	truncate table 資料表名稱;
	$result[0] = pg_query($sql);
	if ( !$result[0] )
	{
		die(pg_result_error($result[0]));
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
					$result[$index] = pg_query($sql);
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
	pg_close($dbconn);
	echo "CSV2PgSQL.php done...";
?>
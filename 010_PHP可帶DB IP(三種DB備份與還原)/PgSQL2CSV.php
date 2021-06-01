<?php
	header("Content-Type:text/html; charset=utf-8");//PHP 亂碼
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
	pg_set_client_encoding($dbconn, "utf8");

	$query = "SELECT * FROM ".$tbname; //從選取emp_title資料庫中所有資料 
	$result = pg_query($dbconn,$query) or die('PgSQL query error');

	$filename = $dbname."_".$tbname.".csv";
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	$field_name ='';
	
	$len=pg_num_fields($result);//得由 pg_query() 傳回的 result 欄位數量
	for($i=0;$i<$len;$i++)
	{
		if($i!=0)
		{
			$field_name .=",";
		}
		$name[$i]=pg_field_name($result,$i);//取得特定欄位的名稱。要特別注意的是 field_index 參數
		$field_name .=$name[$i];
	}
	fwrite($myfile, $field_name."\n");
	echo $field_name;
	echo "<br>";
	
	while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) 
	{ 
		$field_value='';
		for($i=0;$i<$len;$i++)
		{
			if($i!=0)
			{
				$field_value .=",";
			}				
			$field_value .="'".$row[$name[$i]]."'";
		}
		fwrite($myfile, $field_value."\n");
		echo $field_value;
		echo "<br>";
	}
	
	fclose($myfile);
	pg_free_result($result);
	pg_close($dbconn);
	echo "PgSQL2CSV.php done...";
?>
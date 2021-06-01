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

	$sql = "select * from ".$tbname;
	$result = mysql_query($sql) or die('MySQL query error');
	
	$filename = $dbname."_".$tbname.".csv";
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	$field_name ='';
	
	$len=mysql_num_fields($result);//得由 mysql_query() 傳回的 result 欄位數量
	for($i=0;$i<$len;$i++)
	{
		if($i!=0)
		{
			$field_name .=",";
		}
		$name[$i]=mysql_field_name($result,$i);//取得特定欄位的名稱。要特別注意的是 field_index 參數
		$field_name .=$name[$i];
	}
	fwrite($myfile, $field_name."\n");
	echo $field_name;
	echo "<br>";
	
	while($row = mysql_fetch_array($result))
	{
		//echo $row['name']." ";
		//echo $row['class']."<br>";
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
	mysql_free_result($result);
	mysql_close($con);
	echo "MySQL2CSV.php done...";
?>
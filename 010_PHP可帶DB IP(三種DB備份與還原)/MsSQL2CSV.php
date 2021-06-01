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
	$result = odbc_exec($connect, "SELECT * FROM ".$tbname);

	$filename = $dbname."_".$tbname.".csv";
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	$field_name ='';
	
	$len=odbc_num_fields($result);//欄位數量
	$field_name="";
    for($i = 1;$i <= $len;$i++)
    {
		if($i!=1)
		{
			$field_name .=",";
		}
		$name[$i]=odbc_field_name($result,$i);//取得特定欄位的名稱。要特別注意的是 field_index 參數
		$field_name .=$name[$i];
    }
	fwrite($myfile, $field_name."\n");
	echo $field_name;
	echo "<br>";
	
	while(odbc_fetch_row($result))
	{
		$field_value='';
		for($i=1;$i<=$len;$i++)
		{
			if($i!=1)
			{
				$field_value .=",";
			}	
			$buf=trim(odbc_result($result,$i));//清除空白
			$field_value .="'".$buf."'";//$field_value .="'".odbc_result($result,$i)."'";
		}
		fwrite($myfile, $field_value."\n");
		echo $field_value;
		echo "<br>";
	}
	fclose($myfile);
	odbc_free_result($result);
	odbc_close($connect);
	echo "MsSQL2CSV.php done...";
?>  
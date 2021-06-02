<?php
header('content-type:text/html;charset=utf-8');
include('conn.php');
if(isset($_POST['years']))
{
	$years=$_POST['years'];
	$months=$_POST['months'];
	$days=$_POST['days'];
	$hours=$_POST['hours'];
	$minutes=$_POST['minutes'];
	
	$sql_1 ="SELECT COUNT(DISTINCT value) FROM `all_data` WHERE value LIKE 'F1001,P_N%' AND years='$years' AND months='$months' AND days='$days' AND hours='$hours' AND minutes='$minutes'";
	//echo $sql;
	$sql_data_count_1=mysql_query($sql_1); //改成自己的sql語法
	$row_1 = mysql_fetch_array($sql_data_count_1);
	$counts_1=$row_1[0];
	echo $years.'/'.$months.'/'.$days.'/'.$hours.'/'.$minutes.',F1001,'.$counts_1.';';
	
	$sql_2 ="SELECT COUNT(DISTINCT value) FROM `all_data` WHERE value LIKE 'F1002,P_N%' AND years='$years' AND months='$months' AND days='$days' AND hours='$hours' AND minutes='$minutes'";
	//echo $sql;
	$sql_data_count_2=mysql_query($sql_2); //改成自己的sql語法
	$row_2 = mysql_fetch_array($sql_data_count_2);
	$counts_2=$row_2[0];
	echo $years.'/'.$months.'/'.$days.'/'.$hours.'/'.$minutes.',F1002,'.$counts_2.';';
	
	$sql_3 ="SELECT COUNT(DISTINCT value) FROM `all_data` WHERE value LIKE 'F1003,P_N%' AND years='$years' AND months='$months' AND days='$days' AND hours='$hours' AND minutes='$minutes'";
	//echo $sql;
	$sql_data_count_3=mysql_query($sql_3); //改成自己的sql語法
	$row_3 = mysql_fetch_array($sql_data_count_3);
	$counts_3=$row_3[0];
	echo $years.'/'.$months.'/'.$days.'/'.$hours.'/'.$minutes.',F1003,'.$counts_3.';';	
}
?>
<?php
header('content-type:text/html;charset=utf-8');
$device_id="";
$value="";
$years="";
$months="";
$days="";
$hours="";
$minutes="";
$seconds="";

if(isset($_GET['device_id']))
{
	include('conn.php');
	$device_id=$_GET['device_id'];
	$value=$_GET['value'];
	$years=$_GET['years'];
	$months=$_GET['months'];
	$days=$_GET['days'];
	$hours=$_GET['hours'];
	$minutes=$_GET['minutes'];
	$seconds=$_GET['seconds'];
	$sql = "INSERT INTO all_data(device_id,value,years,months,days,hours,minutes,seconds)VALUES('$device_id','$value','$years','$months','$days','$hours','$minutes','$seconds')";
	echo $sql;
	if(mysql_query($sql,$conn))
	{
		echo'INSERT Data Success';
	}
	else
	{
		echo'INSERT Data Fail';
	}
}
else
{
	echo'INSERT Data Fail';
}

?>
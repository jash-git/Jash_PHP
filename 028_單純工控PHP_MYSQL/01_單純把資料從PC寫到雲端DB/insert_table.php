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

if(isset($_POST['device_id']))
{
	include('conn.php');
	$device_id=$_POST['device_id'];
	$value=$_POST['value'];
	$years=$_POST['years'];
	$months=$_POST['months'];
	$days=$_POST['days'];
	$hours=$_POST['hours'];
	$minutes=$_POST['minutes'];
	$seconds=$_POST['seconds'];
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
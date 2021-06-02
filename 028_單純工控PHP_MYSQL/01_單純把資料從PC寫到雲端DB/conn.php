<?php
/*****************************
*数据库连接
*****************************/
$conn = @mysql_connect("localhost","root","usbw");
if (!$conn){
	die("資料庫連接失敗：" . mysql_error());
}
mysql_select_db("smart_firefighting", $conn);
mysql_query("set character set 'utf8'");
mysql_query('set names utf8');
?>
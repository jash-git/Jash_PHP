<?php
/*****************************
*���ݿ�����
*****************************/
$conn = @mysql_connect("localhost","root","usbw");
if (!$conn){
	die("�Y�ώ��B��ʧ����" . mysql_error());
}
mysql_select_db("Invoices", $conn);
mysql_query("set character set 'utf8'");
mysql_query('set names utf8');
?>
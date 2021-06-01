<?php
session_start();
header('content-type:text/html;charset=utf-8');
//加載數據庫配置文件
require ('config.inc.php');
//權限驗證
if(!$_SESSION['login'])
{
	//顯示權限不足並且跳回首頁
	echo "<script>alert('權限不足!');location.href='index.php';</script>";
	exit();
}

if(isset($_GET['id'])&&$_GET['id']!="")
{
	//刪除制定id在留言回復表中信息
	$delRevertSql="delete from reply where info_id=".$_GET['id'];//從reply資料表，刪除整筆的SQL語法
	mysql_query($delRevertSql);
	//刪除制定id在留言信息表中信息
	$delGuestSql="delete from info where id = ".$_GET['id'];//從info資料表，刪除整筆的SQL語法
	mysql_query($delGuestSql);
	if(mysql_error()=="")
	{
		//顯示刪除成功並且跳回首頁
		echo "<script>alert('刪除成功!');location.href='index.php';</script>";
	}
}
?>
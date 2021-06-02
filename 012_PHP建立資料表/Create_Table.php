<?php
//包含資料庫連接檔
include('conn.php');
$sql = "CREATE TABLE Persons 
(
FirstName varchar(15),
LastName varchar(15),
Age int
)";
mysql_query($sql);

?>
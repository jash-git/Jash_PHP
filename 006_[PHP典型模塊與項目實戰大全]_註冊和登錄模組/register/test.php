<?php
header("Content-Type:text/html; charset=utf-8");
//登錄狀態測試腳本
require ('is_login.php');
echo '您已登錄成功：）';
//unset( $_SESSION['login']);
?>

<?php
header("Content-Type:text/html; charset=utf-8");
session_start();
if (empty($_SESSION['login'])) {
    echo "您還沒有登錄，不能訪問當前頁面！";
    exit;
}
?>

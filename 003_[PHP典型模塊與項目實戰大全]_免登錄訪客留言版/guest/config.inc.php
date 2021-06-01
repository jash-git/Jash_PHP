<?php
session_start();
//數據庫配置信息
define('DB_HOST', 'localhost'); //數據庫服務器主機地址    
define('DB_USER', 'root'); 			//數據庫帳號    
define('DB_PW', 'usbw'); 				//數據庫密碼    
define('DB_NAME', 'guestbook'); //數據庫名     
define('DB_CHARSET', 'utf8'); 	//數據庫字符集    
define('DB_PCONNECT', 0); 			//0 或1，是否使用持久連接    
define('DB_DATABASE', 'mysql'); //數據庫類型  
$con=mysql_connect(DB_HOST,DB_USER,DB_PW) or die('鏈接數據庫失敗！');
mysql_query('set names utf8');
mysql_select_db(DB_NAME);
?>

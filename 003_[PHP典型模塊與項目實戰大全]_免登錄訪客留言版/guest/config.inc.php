<?php
session_start();
//�ƾڮw�t�m�H��
define('DB_HOST', 'localhost'); //�ƾڮw�A�Ⱦ��D���a�}    
define('DB_USER', 'root'); 			//�ƾڮw�b��    
define('DB_PW', 'usbw'); 				//�ƾڮw�K�X    
define('DB_NAME', 'guestbook'); //�ƾڮw�W     
define('DB_CHARSET', 'utf8'); 	//�ƾڮw�r�Ŷ�    
define('DB_PCONNECT', 0); 			//0 ��1�A�O�_�ϥΫ��[�s��    
define('DB_DATABASE', 'mysql'); //�ƾڮw����  
$con=mysql_connect(DB_HOST,DB_USER,DB_PW) or die('�챵�ƾڮw���ѡI');
mysql_query('set names utf8');
mysql_select_db(DB_NAME);
?>

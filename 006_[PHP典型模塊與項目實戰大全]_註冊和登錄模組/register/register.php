<?php
	header("Content-Type:text/html; charset=utf-8");
	// trim()函數可以截去頭尾的空白字符
	$username   = trim($_POST['username']);
	$password   = $_POST['password'];
	$cpassword 	= $_POST['cpassword'];
	$email      = trim($_POST['email']);

    // 數據驗證, empty()函數判斷變量內容是否為空
    if (empty($username) || empty($email) || empty($password) || $cpassword != $password) 
	{
		echo '數據輸入不完整';
		exit;
	}
	else
	{
		//密碼長度判斷
		if (strlen($password) < 6 || strlen($password) > 30)
		{
			echo '密碼必須在6到30個字符之間';
			exit;
		}
		// 與客戶端驗證Email時相同的正則表達式
		$pattern = "/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/";
		if (!preg_match($pattern, $email)) 
		{
			echo 'Email格式不合法!';
			exit;
		}
		// 創建數據庫連接
		$db = mysql_connect('localhost', 'root', 'usbw') or die('Could not connect: ' . mysql_error());
		mysql_query('set names utf8');
		mysql_select_db('register') or die('Could not select database');
		// 查詢數據庫，看填寫的用戶名是否已經存在
    	$sql = "SELECT * FROM `user` WHERE `username` = '".$username."'";
    	$result = mysql_query($sql);
		if ($result && mysql_num_rows($result) > 0) 
		{
			echo "<font color='red' size='5'>該用戶名已被註冊，請換一個重試!</font><br>\n";
        	echo $username."<br>\n";
			echo $password."<br>\n";
			echo $cpassword."<br>\n";
			echo $email."<br>\n";
		}
		else
		{
			// 將用戶信息插入數據庫的user表
			$sql = "INSERT INTO user (username, pwd,email) VALUES";
			$sql .= "('$username', '$password', '$email')";
			//echo $sql;
			$result =mysql_query($sql);
			if (!$result) 
			{
				// 釋放結果集
				mysql_free_result($result);
				// 關閉連接
				mysql_close($db);
				echo '數據記錄插入失敗!';
				exit;
			}
			echo "<font color='red' size='5'>恭喜您註冊成功!</font><br>\n";
		}
		// 關閉數據庫連接
		mysql_close($db);
	}
?>
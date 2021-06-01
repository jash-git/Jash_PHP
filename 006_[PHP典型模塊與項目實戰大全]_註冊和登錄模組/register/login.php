<?php
header("Content-Type:text/html; charset=utf-8");
require_once('function.php'); // 加載防止SQL注入漏洞檢查的代碼
//取得客戶端提交的用戶名
$username = trim($_POST['username']);
// 取得客戶端提交的密碼
$password = trim($_POST['pwd']);
// 設置一個錯誤消息變量，以便判斷是否有錯誤發生
// 以及在客戶端顯示錯誤消息。 其初值為空
$errmsg = '';
if (!empty($username))
{  // 用戶填寫了數據才執行數據庫操作
    // 數據驗證, empty()函數判斷變量內容是否為空
    if (empty($username))
	{
        $errmsg = '數據輸入不完整';
    }
    if(empty($errmsg)) 
	{ // $errmsg為空說明前面的驗證通過
   		// 創建數據庫連接
		$db = mysql_connect('localhost', 'root', 'usbw') or die('Could not connect: ' . mysql_error());
		mysql_query('set names utf8');
		mysql_select_db('register') or die('Could not select database');
        // 檢查數據庫連接
        if (mysqli_connect_errno())
		{
            $errmsg = "數據庫連接失敗!\n";
        }
        else 
		{
			// 查詢數據庫，看用戶名及密碼是否正確
			$sql = "SELECT * FROM user WHERE username='$username' AND pwd='$password'";
			$result = mysql_query($sql);
            // $result = mysql_query($sql);判斷上面的執行結果是否含有記錄，有記錄說明登錄成功
			if ($result && mysql_num_rows($result) > 0) 
			{              
				// 在實際應用中可以使用前面提到的重定向功能轉到主頁
				$errmsg = "登錄成功!";
				//註冊session變量
                session_start();
				//標識登錄狀態true為已經登錄
				$_SESSION['login'] = 'true';
                //記錄該用戶信息
               	$_SESSION['user']=$username;
                // 在實際應用中可以使用前面提到的重定向功能轉到主頁
			}
			else
			{
				$errmsg = "用戶名或密碼不正確，登錄失敗!";
            }
   
			// 釋放資源
			mysql_free_result($result);
			// 關閉連接
			mysql_close($db);
		}
    }
}
echo "<font color='red' size='5'>用戶：".$username."".$errmsg."</font><br>\n";
?>

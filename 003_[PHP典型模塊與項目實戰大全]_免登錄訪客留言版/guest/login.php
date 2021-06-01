<?php
	//文件名: login.php
	session_start();
	if(isset($_POST['Submit']))//檢查是否設置Submit變量
	{			
		//防呆機制
		if(!get_magic_quotes_gpc())//本函數取得 PHP 環境配置的變量 magic_quotes_gpc (GPC, Get/Post/Cookie) 值。返回 0 表示關閉本功能﹔返回 1 表示本功能打開。當 magic_quotes_gpc 打開時，所有的 ' (單引號), " (雙引號), \ (反斜線) and 空字符會自動轉為含有反斜線的溢出字符。
		{
			foreach ($_POST as &$items)
			{
				//循環遍歷items
				$items = addslashes($items);//addslashes() 函數在指定的預定義字元前添加反斜杠。
			}
		}
		
		//驗證管理者
		if($_POST['username']=='admin'&&$_POST['password']=='admin')
		{
				$_SESSION['login']=true;			//設置登錄成功標識
				echo "<script>location.href='index.php';</script>";//跳回首頁
				exit();
		}
		else
		{
			echo "<script>alert('登錄失敗！'); location.href='index.php';</script>";
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
			<meta http-equiv="Content-Type" content="text/html; charset=big5" />
			<title>留言版-管理者登錄頁面</title>
	</head>
	<body>
		<table>
			<tr>
				<td>
					<form action="login.php" method="POST" name="form1">
						用戶名：<input type="text" name="username" size="20"/>
						密碼：<input type="password" name="password" size="20">
						<input type="submit" value="登錄" name="Submit"/>
						<input type="button" onclick="javascript:location.href='index.php'" value="放棄"/>
					</form>
				</td>
			</tr>
		</table>
	</body>
</html>
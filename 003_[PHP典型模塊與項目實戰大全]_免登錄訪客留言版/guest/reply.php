<?php
	if(!isset($_SESSION))
	{
		session_start();
	}
	require ('config.inc.php'); 		//加載數據庫配置文件
	if(!$_SESSION['login']){ 			//判斷是否登錄
		echo "<script>alert('沒有登錄不能回復!');location.href='index.php';</script>";
		exit();
	}
	if(isset($_POST['Submit']))
	{ 				//判斷是否發送
		if(!get_magic_quotes_gpc())
		{
			foreach ($_POST as $items)
			{
				$items = addslashes($items);
			}
		}
		//當回復內容過長時返回上一步操作
		if(strlen($_POST['reply'])>400)
		{
			echo "<script>alert('回復內容過長!');history.go(-1);</script>";
			exit();
		}
		$info_id = $_POST['info_id']; 	//獲得操作留言對應的id
		$reply = $_POST['reply']; 		//回復留言內容
		$time = time();					//獲得系統時間
		$insertRevertSql = "insert into reply (info_id,reply,reply_time) value('$info_id','$reply','".$time."')";
		if(mysql_query($insertRevertSql))
		{
				echo "<script>alert('回復成功');location.href='index.php';</script>";
				exit();
		}
		else 
		{
			echo "<script>alert('回復失敗!');history.go(-1);</script>";
		}
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=big5" />
		<title>管理者回復頁面</title>
	</head>
	<body>
		<table>
			<tr>
				<td>回復內容：</td>
			</tr>
			<tr>
				<td>
					<form action="reply.php" method="POST" name="reply">
						<textarea name="reply" cols="30" rows="5" id="reply"></textarea> 
						<input type="hidden" name="info_id" value="<?php echo $_GET['id']?> "size="20">
				</td>
			</tr>
			<tr>
				<td>
					<input type='submit'  value="回 復" name="Submit" /> 
					<input type="button" onClick="JavaScript:history.go(-1);" value="放棄" />
					</form>
				</td>
			</tr>
		</table>
	</body>
</html>

<?php
	if(!isset($_SESSION))
	{
		session_start();
	}
	require ('config.inc.php'); 		//�[���ƾڮw�t�m���
	if(!$_SESSION['login']){ 			//�P�_�O�_�n��
		echo "<script>alert('�S���n������^�_!');location.href='index.php';</script>";
		exit();
	}
	if(isset($_POST['Submit']))
	{ 				//�P�_�O�_�o�e
		if(!get_magic_quotes_gpc())
		{
			foreach ($_POST as $items)
			{
				$items = addslashes($items);
			}
		}
		//��^�_���e�L���ɪ�^�W�@�B�ާ@
		if(strlen($_POST['reply'])>400)
		{
			echo "<script>alert('�^�_���e�L��!');history.go(-1);</script>";
			exit();
		}
		$info_id = $_POST['info_id']; 	//��o�ާ@�d��������id
		$reply = $_POST['reply']; 		//�^�_�d�����e
		$time = time();					//��o�t�ήɶ�
		$insertRevertSql = "insert into reply (info_id,reply,reply_time) value('$info_id','$reply','".$time."')";
		if(mysql_query($insertRevertSql))
		{
				echo "<script>alert('�^�_���\');location.href='index.php';</script>";
				exit();
		}
		else 
		{
			echo "<script>alert('�^�_����!');history.go(-1);</script>";
		}
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=big5" />
		<title>�޲z�̦^�_����</title>
	</head>
	<body>
		<table>
			<tr>
				<td>�^�_���e�G</td>
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
					<input type='submit'  value="�^ �_" name="Submit" /> 
					<input type="button" onClick="JavaScript:history.go(-1);" value="���" />
					</form>
				</td>
			</tr>
		</table>
	</body>
</html>

<?php
	//���W: login.php
	session_start();
	if(isset($_POST['Submit']))//�ˬd�O�_�]�mSubmit�ܶq
	{			
		//���b����
		if(!get_magic_quotes_gpc())//����ƨ��o PHP ���Ұt�m���ܶq magic_quotes_gpc (GPC, Get/Post/Cookie) �ȡC��^ 0 ����������\��Q��^ 1 ��ܥ��\�ॴ�}�C�� magic_quotes_gpc ���}�ɡA�Ҧ��� ' (��޸�), " (���޸�), \ (�ϱ׽u) and �Ŧr�ŷ|�۰��ର�t���ϱ׽u�����X�r�šC
		{
			foreach ($_POST as &$items)
			{
				//�`���M��items
				$items = addslashes($items);//addslashes() ��Ʀb���w���w�w�q�r���e�K�[�ϱק��C
			}
		}
		
		//���Һ޲z��
		if($_POST['username']=='admin'&&$_POST['password']=='admin')
		{
				$_SESSION['login']=true;			//�]�m�n�����\����
				echo "<script>location.href='index.php';</script>";//���^����
				exit();
		}
		else
		{
			echo "<script>alert('�n�����ѡI'); location.href='index.php';</script>";
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
			<meta http-equiv="Content-Type" content="text/html; charset=big5" />
			<title>�d����-�޲z�̵n������</title>
	</head>
	<body>
		<table>
			<tr>
				<td>
					<form action="login.php" method="POST" name="form1">
						�Τ�W�G<input type="text" name="username" size="20"/>
						�K�X�G<input type="password" name="password" size="20">
						<input type="submit" value="�n��" name="Submit"/>
						<input type="button" onclick="javascript:location.href='index.php'" value="���"/>
					</form>
				</td>
			</tr>
		</table>
	</body>
</html>
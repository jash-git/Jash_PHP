<?php
header('content-type:text/html;charset=utf-8');
session_start();
echo "<font size='24' face='Arial'>";//PHP放大字體
//註銷登錄
if(isset($_GET['action'] ))
{
	if( $_GET['action'] == "logout")
	{
		unset($_SESSION['userid']);
		unset($_SESSION['username']);
		header("Location:index.html");
		exit;
	}
}

//登錄
if(!isset($_POST['submit'])){
	header("Location:index.html");
}
$username = htmlspecialchars($_POST['username']);
$password = $_POST['password'];

$result=$username.','.$password;
//echo $result.'<br>';
$fp=fopen("u_p.txt","r");
$check=0;
while (!feof($fp))
{
	$contents = fgets($fp, 300);//一次一行
	//echo $contents.'<br>';
	if (false !== ($rst = strpos($contents, $result))) {
		//登錄成功
		$_SESSION['username'] = $username;
		$check=1;
		break;
	}
}
fclose($fp);

if($check==1)
{
	header("Location:up_down.php");
}
else
{
	exit('登錄失敗！點擊此處 <a href="javascript:history.back(-1);">返回</a> 重試');
}

?>

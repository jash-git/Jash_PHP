<?php
header('content-type:text/html;charset=utf-8');
//如果PHP設置的自動轉義函數未開啟，就轉義這些值
if(!get_magic_quotes_gpc())
{
	foreach ($_POST as &$items)
	{
		$items = addslashes($items);
	}
}

$name = $_POST['name'];
$content = $_POST['content'];
echo "nane=".$name."<br>";
echo "content =".$content ."<br>";

if($name==""||strlen($name)>10)
{
	echo <<<tem
	<script language="javascript">
	alert('請輸入正確的有戶名');
	history.go(-1);
	</script>
tem;
exit();
}

if(strlen($content)>400){
	echo <<<tem
	<script>
	alert("輸入的留言內容太長！");
	history.go(-1);
	</script>
tem;
exit();
}

//加載數據庫配置文件
require ('config.inc.php');

//把客戶信息插入info表

$content_time = time();
$insertSql="insert into info (name,content,content_time) values ('$name','$content','$content_time')";
//sql調試語句
//echo $insertSql;

if(mysql_query($insertSql))
{
	
	echo <<<tem
	<script>
	alert("留言成功");
	location.href="index.php";
	</script>
tem;
}
else
{
	echo <<<tem
	<script>
	alert("留言失敗");
	location.href="index.php";
	</script>
tem;
}
?>

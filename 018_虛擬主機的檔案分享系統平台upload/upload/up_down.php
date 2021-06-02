<?php
session_start();

//檢測是否登錄，若沒登錄則轉向登錄介面
if(!isset($_SESSION['username'])){
	header("Location:index.html");
	exit();
}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>檔案上傳</title>
	</head>
	<body>
		<form action="upload.php" method="post" enctype="multipart/form-data">
		只限英文檔名:<input type="file" name="file"><br>
		<input type="submit" value="上傳">
		</form>	
		<?php
			echo '可下載檔案清單:<br><br>';
			echo '<table width="800" border="1">';
			echo '<tr>';
			echo '<td align="center">強制下載:</td>';
			echo '<td align="center">嘗試用瀏覽器閱覽:</td>';
			echo '</tr>';
			$Vhost_Dir=opendir("./upload/");
			while($file=readdir($Vhost_Dir)){
				if ($file != "." && $file != "..")
				{
					$url='./downloadfile.php?file=';
					$url=$url."./upload/$file";
					//echo $url.'<br>';//DEBUG用
					echo '<tr>';
					
					echo '<td align="center">';
					echo '<a href='.$url.'>'.$file.'</a>';
					echo '</td>';
					
					echo '<td align="center">';
					echo '<a href=./upload/'.$file.'>'.$file.'</a>';
					echo '</td>';
					
					echo '</tr>';
				}
			}
			echo '</table>';
			closedir($Vhost_Dir);
			
		?>			
	</body>
</html>
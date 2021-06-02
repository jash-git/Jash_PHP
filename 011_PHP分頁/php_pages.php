<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!-- InstanceBeginEditable name="doctitle" -->
		<title>PHP 分頁</title>
	</head>
	<body>
		<?PHP
			header('content-type:text/html;charset=utf-8');
			include("conn.php"); //把所需函數引導進來
			$page_count=2; //每頁設定顯示筆數
			$sql_data_count=mysql_query("select count(*) from manufacturer"); //改成自己的sql語法
			$row = mysql_fetch_array($sql_data_count);
			$rows=$row[0];

			$page_total=intval($rows/$page_count);

			if ($rows % $page_count)
			{
				$page_total++;		
			}

			$i=1;
			if (isset($_GET['page']))
			{
				$page=intval($_GET['page']);
			}
			else
			{
				$page=$i;
			}
			for ($i=1;$i<$page;$i++)
			{
				echo "<a href='./php_pages.php?page=".intval($i)."'>[".intval($i) ."]</a> "; //顯示出頁數，程式檔案名稱要改跟目前一樣
			}
			
			$move=$page_count * ($page - 1); //資料移動筆數
			//echo "select * from manufacturer limit $move,$page_count";
			$sql_data_move=mysql_query("select * from manufacturer limit $move,$page_count"); //改成自己的sql語法

			if ($row = mysql_fetch_array($sql_data_move))
			{
				echo "<table border='1' width='50%'>";
				do
				{
					$i++;
					//--------------------------改成自己需要顯示資料
					echo "<tr>";
					echo "<td >";
					echo $row['name'];
					echo "</td>";
					echo "</tr>";
					//----------------------------------------------
				}
				while ($row = mysql_fetch_array($sql_data_move));
			}
			echo "<tr>";
			echo "<td align='right'>";
			for ($i=$page;$i<=$page_total;$i++)
			{
				echo "<a href='./php_pages.php?page=".intval($i)."'>[".intval($i) ."]</a> "; //顯示出頁數，程式檔案名稱要改跟目前一樣
			}
			echo "</tr>";
			echo "</table>";

		?>
	</body>
</html>	
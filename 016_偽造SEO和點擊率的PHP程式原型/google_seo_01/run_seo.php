<?php
	header('content-type:text/html;charset=utf-8');
	$now=0;
	$count=0;
	if(isset($_GET['now'])&&isset($_GET['count']))
	{
		$now=$_GET['now'];
		$count=$_GET['count'];
	}
	else
	{
		header("Location:index.html");
	}
?>
<html>
	<head>
		<title>run_seo.php</title>
		<script language="javascript">
		function Timer()
        {
            setTimeout("Run();", 40000);
        }
		function Run()
		{
			<?php
				$n=($now+1);
				echo "document.location.href=\"./run_seo.php?now=$n&count=$count\";";
			?>
		}
		</script>
	</head>
	<body  onload="Timer()">
		<?php
			if(((int)$now+1)<((int)$count))
			{
				$pf=fopen("seo.txt","r");
				$i=0;
				while (!feof($pf))
				{
					$url = trim(fgets($pf, 300));//一次一行
					if($i==$now)
					{
						break;
					}
					$i=$i+1;
				}
				fclose($pf);
				echo "<script language=\"javascript\">\n";
					echo "var displaymode=0\n";
					echo "var iframecode='<iframe id=\"external\" style=\"width:50%;height:50%\" src=\"$url\"></iframe>'\n";
					echo "if (displaymode==0)\n";
					echo "	document.write(iframecode)\n";
				echo '</script>';
			}
			else
			{
				header("Location:index.html");
			}
		?>
	</body>	
</html>
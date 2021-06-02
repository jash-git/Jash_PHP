<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>jpv_計數器</title>
	<style type="text/css">
		html{font-size:18px;}
		fieldset{width:250px; margin: 0 auto;}
		legend{font-weight:bold; font-size:16px;}
		span{color: #666666;}
	</style>
	</head>
	
	<body>
		<div>
			<fieldset>
				<legend>瀏覽人數</legend>
				<?php
					include('conn.php');
					$year=date("Y");
					$month=date("m");
					$day=date("d");
					$times=date('H:i:s');
					
					$sql = "SELECT COUNT(*) as total  FROM visitors WHERE year='$year' AND month='$month' AND day='$day'";
					$result=mysql_query($sql,$conn);
					$data=mysql_fetch_assoc($result);

					echo "今&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;天: ".$year."/".$month."/".$day."<br>";
					echo "人&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;數: ".	$data['total']."(人)<br>";
					
					$sql = "SELECT COUNT(*) as total  FROM visitors";
					$result1=mysql_query($sql,$conn);
					$data1=mysql_fetch_assoc($result1);
					echo "累積總人數: ".	$data1['total']."(人)<br>";
				?>				
			</fieldset>
		</div>
	</body>
</html>
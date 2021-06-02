<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>讀取/解析 QR Code 頁面</title>
	<style type="text/css">
		html{font-size:20px;}
		fieldset{width:800px; margin: 0 auto;}
		legend{font-weight:bold; font-size:24px;}
		.label{float:left; width:200px; margin-left:20px;}
		.left{margin-left:400px;font-size:18px;}
		.input{width:600px; font-size:24px;}
		span{color: #666666;}
	</style>
	</head>
	
	<body>
		<div>
			<fieldset>
				<legend>讀取/解析 QR Code 頁面</legend>
				<form name="Qr_code_Form" method="post" action="">
					<p>
					<label for="image_url" class="label">QR Code Image URL:</label>
					<input id="image_url" name="image_url" type="text" value="http://jashliao.pixnet.net" class="input" />
					<p/>
					<p>
					<input type="submit" name="submit" value="  確  定  " class="left" />
					</p>
				</form>
				<?php
				if(isset($_POST['submit']))
				{
					include_once('./lib/QrReader.php');
					$img_url = htmlspecialchars($_POST['image_url']);
					$qrcode = new QrReader($img_url);
					$text = $qrcode->text(); //return decoded text from QR Code
					echo "<br>".$text."<br>";
				}
				?>				
			</fieldset>
		</div>
	</body>
</html>
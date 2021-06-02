<?PHP
/*
		<script type="text/javascript">
			var data=location.href;
			var url="http://127.0.0.1:8080/jpv/js_php_visitors.php?action=";
			var aaa = url+data
			document.write("<script language=\"javascript\" type=\"text/javascript\" src=\"" + aaa + "\"><\/sc" + "ript>");		
		</script>	
*/
	if (!empty($_SERVER['HTTP_CLIENT_IP']))
	{
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}else
	{
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	
	$browser='';
	$browser=$_SERVER['HTTP_USER_AGENT'];
	$browser +='<-->';
	$browser += get_browser();
	//print_r($browser);
	
	//--
	$action= $_GET["action"];
	$close= $_GET["close"];
	//--	
	$fp=fopen(date('Y-m-d').'.txt',"a+");
	if(((int)$close)==0)
	{
		fprintf($fp,"%s,%s,%s,%s-open\n",$ip,$action,date('H:i:s'),$browser);
	}
	else
	{
		fprintf($fp,"%s,%s,%s,%s-close\n",$ip,$action,date('H:i:s'),$browser);
	}
	
	fclose($fp);
	//--
	
	if((date('m')-1)<10)
	{
		$filename=date('Y-0').(date('m')-1).date('-d').'.txt';
	}
	else
	{
		$filename=date('Y-').(date('m')-1).date('-d').'.txt';
	}	
	unlink($filename);
?>
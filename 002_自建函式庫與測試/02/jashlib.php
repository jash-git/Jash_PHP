<?php
	//jashlib.php
	function Printf_n($string)//��¤�r��X����
	{
		echo $string."<br>";
	}
	function BoldString($string)//��¤�r�����X
	{
		echo "<b>".$string."</b>";
	}
	function SWAP(&$a,&$b)//�z�L��}�覡�洫���
	{
		$c=$a;
		$a=$b;
		$b=$c;
	}
	$fp;
	function OpenLogFile($FileName)
	{
		global $fp;
		$fp=fopen($FileName,"a+");
	}
	function WriteLog($FileName,$Position,$Message)
	{
		//WriteLog(__FILE__,__LINE__,"Message");
		global $fp;
		fprintf($fp,"%s,%d-%s\n",$FileName,$Position,$Message);
	}
	function CloseLogFile()
	{
		global $fp;
		fclose($fp);
	}
	function check_mobile()//�T�{�s�������x
	{
		$regex_match="/(nokia|iphone|android|motorola|^mot\-|softbank|foma|docomo|kddi|up\.browser|up\.link|";
		$regex_match.="htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|";
		$regex_match.="blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam\-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|";
		$regex_match.="symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte\-|longcos|pantech|gionee|^sie\-|portalmmm|";   
		$regex_match.="jig\s browser|hiptop|^ucweb|^benq|haier|^lct|opera\s*mobi|opera\*mini|320x320|240x320|176x220";
		$regex_match.=")/i";
		return preg_match($regex_match, strtolower($_SERVER['HTTP_USER_AGENT']));
	}
?>
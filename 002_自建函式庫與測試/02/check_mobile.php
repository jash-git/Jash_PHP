<?php
/*
google�Gphp���������
	http://twweeb.org/php-detect-mobile/
	http://www.minwt.com/mobilewebdesign/2501.html
*/
/*
google�Gandroid webview set user agent
	http://stackoverflow.com/questions/5586197/android-user-agent
		�| webview.getSettings().setUserAgentString("user-agent-string");
	http://android-er.blogspot.tw/2013/05/set-user-agent-string-of-webview.html
*/
 //�w�q����User Agent String�ݩ����s��
function check_mobile()
{
    $regex_match="/(nokia|iphone|android|motorola|^mot\-|softbank|foma|docomo|kddi|up\.browser|up\.link|";
    $regex_match.="htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|";
    $regex_match.="blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam\-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|";
    $regex_match.="symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte\-|longcos|pantech|gionee|^sie\-|portalmmm|";   
    $regex_match.="jig\s browser|hiptop|^ucweb|^benq|haier|^lct|opera\s*mobi|opera\*mini|320x320|240x320|176x220";
    $regex_match.=")/i";
    return preg_match($regex_match, strtolower($_SERVER['HTTP_USER_AGENT']));
}
if( check_mobile() )  //�p�G�O����s���A�h���榹�q�y�k
{
	echo "���o�A�A�{�b���b�ϥΤ���s����!!";
	echo <<<tem
	<script>
	alert("����O");
	location.href="text.php";
	</script>
tem;
	exit;
}
else
{
	echo "���o�A�A�{�b���b�ϥ�PC�s����!!";
	echo <<<tem
	<script>
	alert("PC�O");
	location.href="index.php";
	</script>
tem;
	exit;
}
 ?>
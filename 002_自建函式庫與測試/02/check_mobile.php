<?php
/*
google：php手機版網頁
	http://twweeb.org/php-detect-mobile/
	http://www.minwt.com/mobilewebdesign/2501.html
*/
/*
google：android webview set user agent
	http://stackoverflow.com/questions/5586197/android-user-agent
		└ webview.getSettings().setUserAgentString("user-agent-string");
	http://android-er.blogspot.tw/2013/05/set-user-agent-string-of-webview.html
*/
 //定義那些User Agent String屬於手機瀏覽
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
if( check_mobile() )  //如果是手機瀏覽，則執行此段語法
{
	echo "哈囉，你現在正在使用手機瀏覽喔!!";
	echo <<<tem
	<script>
	alert("手機板");
	location.href="text.php";
	</script>
tem;
	exit;
}
else
{
	echo "哈囉，你現在正在使用PC瀏覽喔!!";
	echo <<<tem
	<script>
	alert("PC板");
	location.href="index.php";
	</script>
tem;
	exit;
}
 ?>
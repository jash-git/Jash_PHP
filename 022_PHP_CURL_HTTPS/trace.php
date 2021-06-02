<?php 

include_once 'MyCurl.class.php';

$myCurl = new MyCurl();
$myCurl->setUrl('https://www.google.com.tw/webhp');
$myCurl->setMethod('get');
$sendData = array();
$sendData['sourceid'] = 'chrome-instant';
$sendData['ion'] = '1';
$sendData['espv'] = '2';
$sendData['ie'] = 'UTF-8';
$sendData['q'] = 'jashliao C#';
$myCurl->setData($sendData);
$ResultStr = $myCurl->sendCurl();
unset($myCurl);

echo $ResultStr;
exit;
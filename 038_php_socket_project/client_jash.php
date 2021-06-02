<?php
header('content-type:text/html;charset=utf-8');
error_reporting(E_ALL);
set_time_limit(0);
echo "<h2>TCP/IP Connection</h2>\n";

$port = 8888;
$ip = "127.0.0.1";

/*
 +-------------------------------
 *    @socket連接整個過程
 +-------------------------------
 *    @socket_create
 *    @socket_connect
 *    @socket_write
 *    @socket_read
 *    @socket_close
 +--------------------------------
 */

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket < 0) {
    echo "socket_create() failed: reason: " . socket_strerror($socket) . "\n";
}else {
    echo "OK.\n";
}

echo "試圖連接 '$ip' 埠 '$port'...\n";
$result = socket_connect($socket, $ip, $port);
if ($result < 0) {
    echo "socket_connect() failed.\nReason: ($result) " . socket_strerror($result) . "\n";
}else {
    echo "連接OK\n";
}

$in = "Ho\r\n";
$in .= "first blood$\r\n";
$out = '';

if(!socket_write($socket, $in, strlen($in))) {
    echo "socket_write() failed: reason: " . socket_strerror($socket) . "\n";
}else {
    echo "發送到伺服器資訊成功！\n";
    echo "發送的內容為:<font color='red'>$in</font> <br>";
}

while($out = socket_read($socket, 2048)) {
	if(strlen( $out )>0)//當和C#配合時，不加上判斷式會造成在WEB上會咬死
	{
		echo "接收伺服器回傳資訊成功！\n";
		echo "接受的內容為:",$out;
		break;
	}
}

echo "關閉SOCKET...\n";
socket_close($socket);
echo "關閉OK\n";
?>

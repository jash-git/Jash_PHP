<?php
    //phpinfo();
	//確保在連接用戶端時不會超時
	header('content-type:text/html;charset=utf-8');
	set_time_limit(0);

	$ip = '127.0.0.1';
	$port = 1935;

	/*
	 +-------------------------------
	 *    @socket通信整個過程
	 +-------------------------------
	 *    @socket_create
	 *    @socket_bind
	 *    @socket_listen
	 *    @socket_accept
	 *    @socket_read
	 *    @socket_write
	 *    @socket_close
	 +--------------------------------
	 */

	/*----------------    以下操作都是手冊上的    -------------------*/
	if(($sock = socket_create(AF_INET,SOCK_STREAM,SOL_TCP)) < 0) {
		echo "socket_create() 失敗的原因是:".socket_strerror($sock)."\n";
	}

	if(($ret = socket_bind($sock,$ip,$port)) < 0) {
		echo "socket_bind() 失敗的原因是:".socket_strerror($ret)."\n";
	}

	if(($ret = socket_listen($sock,4)) < 0) {
		echo "socket_listen() 失敗的原因是:".socket_strerror($ret)."\n";
	}

	$count = 0;

	do {
		if (($msgsock = socket_accept($sock)) < 0) {
			echo "socket_accept() failed: reason: " . socket_strerror($msgsock) . "\n";
			break;
		} else {
			
			//發到用戶端
			$msg ="測試成功！\n";
			socket_write($msgsock, $msg, strlen($msg));
			
			echo "測試成功了啊\n";
			$buf = socket_read($msgsock,8192);
			
			
			$talkback = "收到的資訊:$buf\n";
			echo $talkback;
			
			if(++$count >= 5){
				break;
			};
			
		
		}
		//echo $buf;
		socket_close($msgsock);

	} while (true);

	socket_close($sock);
?>

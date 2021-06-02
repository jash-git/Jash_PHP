<?PHP
	date_default_timezone_set('Asia/Taipei');
	ignore_user_abort(true); //即使Client斷開(如關掉流覽器)，PHP腳本也可以繼續執行.
	set_time_limit(0); // 執行時間為無限制，php默認的執行時間是30秒，通過set_time_limit(0)可以讓程式無限制的執行下去
	$interval=5; // 每隔5秒鐘運行
	do{
		$fp = fopen("test.txt","a");
		fwrite($fp,date('Y-m-d H:i:s',time())."\r\n");
		fclose($fp);
		echo date('Y-m-d H:i:s',time()). "<br>";
		ob_flush();
		flush();
		sleep($interval); // 按設置的時間等待5秒鐘迴圈執行
	}while(true);

?>
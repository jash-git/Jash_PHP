	<?php
		//test.php
		include("jashlib.php");//引用函式庫
		OpenLogFile("logtest.txt");
		Printf_n(BoldString("引用函式庫-jashlib.php"));
		$a=10;$b=20;
		Printf_n("未呼叫SWAP函數前a=".$a." b=".$b);
		WriteLog(__FILE__,__LINE__,"未呼叫SWAP函數前");
		SWAP($a,$b);
		Printf_n(BoldString("呼叫SWAP函數後a=".$a." b=".$b));
		WriteLog(__FILE__,__LINE__,"呼叫SWAP函數後");
		CloseLogFile();
	?>
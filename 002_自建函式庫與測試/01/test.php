	<?php
		//test.php
		include("jashlib.php");//�ޥΨ禡�w
		OpenLogFile("logtest.txt");
		Printf_n(BoldString("�ޥΨ禡�w-jashlib.php"));
		$a=10;$b=20;
		Printf_n("���I�sSWAP��ƫea=".$a." b=".$b);
		WriteLog(__FILE__,__LINE__,"���I�sSWAP��ƫe");
		SWAP($a,$b);
		Printf_n(BoldString("�I�sSWAP��ƫ�a=".$a." b=".$b));
		WriteLog(__FILE__,__LINE__,"�I�sSWAP��ƫ�");
		CloseLogFile();
	?>
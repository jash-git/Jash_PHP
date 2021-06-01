	<?php
		//test.php
		include("jashlib.php");//まノㄧΑ畐
		OpenLogFile("logtest.txt");
		Printf_n(BoldString("まノㄧΑ畐-jashlib.php"));
		$a=10;$b=20;
		Printf_n("ゼ㊣SWAPㄧ计玡a=".$a." b=".$b);
		WriteLog(__FILE__,__LINE__,"ゼ㊣SWAPㄧ计玡");
		SWAP($a,$b);
		Printf_n(BoldString("㊣SWAPㄧ计a=".$a." b=".$b));
		WriteLog(__FILE__,__LINE__,"㊣SWAPㄧ计");
		CloseLogFile();
	?>
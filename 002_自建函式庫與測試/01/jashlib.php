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
?>
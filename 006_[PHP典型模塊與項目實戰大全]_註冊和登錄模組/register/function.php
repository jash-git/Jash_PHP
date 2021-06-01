<?php
header("Content-Type:text/html; charset=utf-8");
function checkIllegalWord ()
{
	// 定義不允許提交的SQL命令及關鍵字
	$words = array();
	$words[]    = " add ";
	$words[]    = " count ";
	$words[]    = " create ";
	$words[]    = " delete ";
	$words[]    = " drop ";
	$words[]    = " from ";
	$words[]    = " grant ";
	$words[]    = " insert ";
	$words[]    = " select ";
	$words[]    = " truncate ";
	$words[]    = " update ";
	$words[]    = " use ";
	$words[]    = "-- ";
   
    // 判斷提交的數據中是否存在以上關鍵字, $_REQUEST中含有所有提交數據
	foreach($_REQUEST as $strGot)
	{
		$strGot = strtolower($strGot); // 轉為小寫
		foreach($words as $word)
		{
			if (strstr($strGot, $word))
			{
				echo "您輸入的內容含有非法字符！";
				exit; // 退出運行
			}
		}//foreach($words as $word)
	}// foreach($_REQUEST as $strGot)
}
checkIllegalWord(); // 在本文件被包含時即自動調用
?>

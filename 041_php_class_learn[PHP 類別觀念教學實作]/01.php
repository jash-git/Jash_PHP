<?php
class Demo
{
    private $a = 11;
    private $b = 22;
     
    function do_something()
	{
        return $this->a + $this->b;
    }
}
 
$demo = new Demo();
echo $demo->do_something();
 
/*
	資料來源:http://pydoing.blogspot.tw/2013/03/PHP-Class-and-Object.html
	包含技術:
		01.class 基本定義
		02.變數和函數的存取權限定義
		03.成員變數初值定義
		04.class實體化的基本教學
		05.物件實際呼叫成員應用
*/
?>
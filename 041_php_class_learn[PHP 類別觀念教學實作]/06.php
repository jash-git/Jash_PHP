<?php
class Demo {
    public static $zero = 0;
     
    public static function do_something() {
        return self::$zero;
    }
}
 
echo Demo::$zero . "\n";
echo Demo::do_something() . "\n";
$d = new Demo();
echo $d->zero . "\n";
echo $d->do_something();
 
/*
	資料來源:http://pydoing.blogspot.tw/2013/03/PHP-static.html
	包含技術:
		01.靜態(static)成員
*/
?>
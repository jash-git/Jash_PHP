<?php
class Demo {
    const c = "constant value\n";
     
    function do_something() {
        return self::c;
    }
}
 
echo Demo::c;
$d = "Demo";
echo $d::c;
$o = new Demo();
echo $o::c;
echo $o->do_something();
 
/*
	資料來源:http://pydoing.blogspot.tw/2013/03/PHP-const.html
	包含技術:
		01.常數(const)定義與使用
*/
?>
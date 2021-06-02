<?php
interface Demo {
    const n = 100;
    public function do_something();
}
 
class Demo2 implements Demo {
    function do_something() {
        return self::n;
    }
}
 
$d = new Demo2();
echo Demo::n . "\n";
echo $d->do_something();
 
/*
	資料來源:http://pydoing.blogspot.tw/2013/03/PHP-interface.html
	包含技術:
		01.介面(interface)
*/
?>

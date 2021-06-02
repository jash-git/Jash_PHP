<?php
interface Demo {
    public function do_something1();
}
 
interface Demo2 {
    public function do_something2();
}
 
interface Demo3 extends Demo, Demo2 {
    public function do_something3();
}
 
class Demo4 implements Demo3 {
    function do_something1() {
        return "1";
    }
     
    function do_something2() {
        return "2";
    }
     
    function do_something3() {
        return "3";
    }
}
 
$d2 = new Demo4();
echo $d2->do_something1() . "\n";
echo $d2->do_something2() . "\n";
echo $d2->do_something3();
 
/*
	資料來源:http://pydoing.blogspot.tw/2013/03/PHP-interface.html
	包含技術:
		01.介面(interface)和介面繼承
*/
?>
<?php
class Demo {
    function __construct() {
        echo "constructor call...\n";
    }
     
    function __destruct() {
        echo "destructor call...\n";
    }
     
    function do_something() {
        echo "do something\n";
    }
}
 
$o = new Demo();
$o->do_something();
 
/*
	資料來源:http://pydoing.blogspot.tw/2013/03/PHP-Constructor-and-Destructor.html
	包含技術:
		01.建構子/解構子
*/
?>
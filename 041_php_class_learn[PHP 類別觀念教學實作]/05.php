<?php
class Demo {
    private $a = "superclass_a";
    protected $b = "superclass_b";
    public $c = "superclass_c";
     
    function do_something() {
        echo "a: $this->a, b: $this->b, c: $this->c\n";
    }
}
 
class Demo2 extends Demo {
    function do_something() {
        echo "a: $this->a, b: $this->b, c: $this->c\n";
    }
}
 
$o = new Demo2();
$o->do_something();
 
/*
	資料來源:http://pydoing.blogspot.tw/2013/03/PHP-Inheritance.html
	包含技術:
		01.類別繼承
	執行結果
		Demo 中已經有定義 do_something() 方法 (method) ， Demo2 再次定義相同名稱 do_something() 會改寫父類別的 do_something() ，因此子類別的物件呼叫 do_something() 會是子類別定義的版本。
		屬性 (property) $a 沒有被印出，這是因為 $a 在父類別 Demo 為 private 成員，因此子類別 Demo2 並沒有繼承 $a ，就 Demo2 而言， $a 為一個沒有被定義的屬性。
	心得
		繼承特性同等C++的public繼承
*/
?>
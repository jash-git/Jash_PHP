<?php
class Demo {
    public function __call($name, $arguments) {
        echo "something wrong";
    }
}
 
$d = new Demo();
$d->do_something();
 
/*
	資料來源:http://pydoing.blogspot.tw/2013/03/PHP-Magic-Method.html
	包含技術:
		01.內建方法
			方法	說明
			__call($name, $arguments)	當呼叫不存在的方法時執行
			__callStatic($name, $arguments)	當呼叫不存在的 static 方法時執行
			__get($name)	當讀取不存在的屬性時執行
			__set($name, $value)	當設定不存在的屬性時執行
			__isset($name)	當使用不存在的屬性呼叫 isset() 或 empty() 時執行
			__unset($name)	當使用不存在的屬性呼叫 unset() 時執行
			__sleep()	在物件序列化之前執行
			__wakeup()	在物件序列化過程中重建物件
			__toString()	物件的字串形式
			__invoke($x)	當把物件當函數呼叫時執行
			__set_state($an_array)	當呼叫 var_export() 方法時執行
			__clone()	使用 clone 複製物件完成後執行
*/
?>

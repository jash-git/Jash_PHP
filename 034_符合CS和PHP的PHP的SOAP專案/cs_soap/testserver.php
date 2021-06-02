<?php
class TestClass
{
	function SumData($a,$b)
	{
		return $a+$b;
	}
	function SubData($a,$b)
	{
		return $a-$b;
	}	
}
ini_set("soap.wsdl_cache_enabled", "0"); // disabling WSDL cache
$server = new SoapServer('http://crazed-it.frog.tw/tools/cs_soap/test.wsdl', array('soap_version'   => SOAP_1_2));
$server->setClass('TestClass');
$server->handle();
?>
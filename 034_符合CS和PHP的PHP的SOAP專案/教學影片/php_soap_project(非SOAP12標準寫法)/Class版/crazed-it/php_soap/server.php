<?php
class DemoService { 
  private $demo = array("sam" => 98.42);  
  function getDemo($name) {
    if (isset($this->demo[$name])) {
      return $this->demo[$name];
    } else {
      throw new SoapFault("Server","Unknown name '$name'.");
    }
  }
  function Add($a,$b) {
	  return $a+$b;
  }
}
 
$server = new SoapServer("demo.wsdl");
$server->setClass("DemoService");
$server->handle();
?>
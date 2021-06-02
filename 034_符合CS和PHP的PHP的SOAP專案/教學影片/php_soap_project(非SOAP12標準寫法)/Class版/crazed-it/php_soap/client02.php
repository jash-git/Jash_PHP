<?php
  $client = new SoapClient("http://crazed-it.frog.tw/tools/php_soap/demo.wsdl", array('soap_version'   => SOAP_1_2));
  try {
    print($client->getDemo("sam"));
	echo '<br>';
    print($client->Add(12.0,13.0));
	echo '<br>';

  } catch (SoapFault $exception) { 
    echo $exception;
  }
?>
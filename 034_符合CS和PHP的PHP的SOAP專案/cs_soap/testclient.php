<?php
    $client = new SoapClient("http://crazed-it.frog.tw/tools/cs_soap/test.wsdl", array('soap_version' => SOAP_1_2,'trace' =>  1 ));
	$a=200;
	$b=100;
    $return = $client->__soapCall("SumData",array('Sum_a' => $a,'Sum_b' =>$b));
    print_r($return);
	echo '<br>';
	$return1 = $client->__soapCall("SubData",array('Sub_a' => $a,'Sub_b' =>$b));
	print_r($return1);
?>
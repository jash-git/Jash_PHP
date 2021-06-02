<?php
    ini_set("soap.wsdl_cache_enabled", "0"); // disabling WSDL cache
    $client = new SoapClient("http://crazed-it.frog.tw/tools/soap_function/inventory.wsdl");
    $return = $client->getItemCount('12345');
    print_r($return);
	echo '<br>';
	echo $client->Add(123,456);
?>
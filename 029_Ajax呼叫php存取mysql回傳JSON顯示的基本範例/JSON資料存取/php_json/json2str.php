<?php
$cart = array(
  "orderID" => 12345,
  "shopperName" => "John Smith",
  "shopperEmail" => "johnsmith@example.com",
  "contents" => array(
    array(
      "productID" => 34,
      "productName" => "SuperWidget",
      "quantity" => 1
    ),
    array(
      "productID" => 56,
      "productName" => "WonderWidget",
      "quantity" => 3
    )
  ),
  "orderCompleted" => true
);
 
echo json_encode( $cart );
?>
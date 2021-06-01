<?php
//http://blog.wu-boy.com/2011/04/%E4%BD%A0%E4%B8%8D%E5%8F%AF%E4%B8%8D%E7%9F%A5%E7%9A%84-json-%E5%9F%BA%E6%9C%AC%E4%BB%8B%E7%B4%B9/
$jsonString = '
{                                           
  "orderID": 12345,                         
  "shopperName": "John Smith",              
  "shopperEmail": "johnsmith@example.com",  
  "contents": [                             
    {                                       
      "productID": 34,                      
      "productName": "SuperWidget",         
      "quantity": 1                        
    },                                      
    {                                       
      "productID": 56,                      
      "productName": "WonderWidget",        
      "quantity": 3                         
    }                                       
  ],                                        
  "orderCompleted": true                    
}                                           
';
 
$cart = json_decode( $jsonString );
echo $cart->shopperEmail . "<br>";
echo $cart->contents[1]->productName . "<br>";
?>
<?php
//http://stackoverflow.com/questions/541430/how-do-i-read-any-request-header-in-php
/*
See Also:
getallheaders() - (PHP >= 5.4) cross platform edition of apache_request_headers() 
apache_response_headers() - Fetch all HTTP response headers.
headers_list() - Fetch a list of headers to be sent.
*/
$headers = apache_request_headers();

foreach ($headers as $header => $value) {
    echo "$header: $value <br />\n";
}
?>
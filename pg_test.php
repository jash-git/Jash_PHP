<?php
$conn_string = "host=127.0.0.1 port=5432 dbname=v7 user=postgres password=postgres";
$dbconn = pg_connect ($conn_string);
//pg_set_client_encoding($conn, "utf8");
$query = 'SELECT * FROM emp_title_type'; //從選取test資料庫中所有資料 
$result = pg_query($dbconn,$query); 
//逐一讀取test中的資料 
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) 
{ 
	foreach ($line as $col_value) 
	{ 
		echo "\t\t<td>$col_value</td>\n"; 
	} 
} 

?>

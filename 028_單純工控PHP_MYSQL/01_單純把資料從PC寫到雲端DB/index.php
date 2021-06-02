<?php
header('content-type:text/html;charset=utf-8');
include('conn.php');
$sql ="SELECT * FROM all_data ORDER BY id DESC;";
$all_data_query = mysql_query($sql,$conn);
echo '<table border="1">';
echo 	'<caption>all_data</caption>';
echo 	'<tbody>';
echo 		'<tr>';
echo 			'<td>id</td>';
echo 			'<td>device_id</td>';
echo 			'<td>value</td>';
echo 			'<td>years</td>';
echo 			'<td>months</td>';
echo 			'<td>days</td>';
echo 			'<td>hours</td>';
echo 			'<td>minutes</td>';
echo 			'<td>seconds</td>';
echo 		'</tr>';
while($rs_all_data= mysql_fetch_array($all_data_query))
{
	
echo 		'<tr>';
echo 			"<td>$rs_all_data[0]</td>";
echo 			"<td>$rs_all_data[1]</td>";
echo 			"<td>$rs_all_data[2]</td>";
echo 			"<td>$rs_all_data[3]</td>";
echo 			"<td>$rs_all_data[4]</td>";
echo 			"<td>$rs_all_data[5]</td>";
echo 			"<td>$rs_all_data[6]</td>";
echo 			"<td>$rs_all_data[7]</td>";
echo 			"<td>$rs_all_data[8]</td>";
echo 		'</tr>';	
}
echo 	'</tbody>';
echo '</table>';
?>
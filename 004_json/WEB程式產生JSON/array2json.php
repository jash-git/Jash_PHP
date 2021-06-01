<?php
header('Content-Type: application/json');
$arraydata=array();
for($i=0;$i<5;$i++)
{
	$arraydata[$i]["name"]="jash";
	$arraydata[$i]["job"]="sw";
}
echo json_encode($arraydata);
?>
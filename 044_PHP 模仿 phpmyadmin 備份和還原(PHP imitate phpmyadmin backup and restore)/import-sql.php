﻿<?php
//資料來源:http://stackoverflow.com/questions/19751354/how-to-import-sql-file-in-mysql-database-using-php
header('content-type:text/html;charset=utf-8');
set_time_limit(0);	
// Name of the file
$filename = 'db-backup.sql';
// MySQL host
$mysql_host = 'localhost';
// MySQL username
$mysql_username = 'root';
// MySQL password
$mysql_password = 'usbw';
// Database name
$mysql_database = 'CSV_Import_Export';

// Connect to MySQL server
mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
// Select database
mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());

mysql_query("SET NAMES utf8;");
mysql_query("SET CHARACTER_SET_CLIENT=utf8;");
mysql_query("SET CHARACTER_SET_RESULTS=utf8;");

// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
    // Perform the query
    mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
    // Reset temp variable to empty
    $templine = '';
}
}
 echo "Tables imported successfully";
?>
<?php

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'grocery_db';

//$mysqli =mysqli_connect("localhost","ibpaprxy_user","!@#456&*(gabriel","ibpaprxy_db");
 $mysqli =mysqli_connect("localhost","root","","grocery_db");



$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
if($db->connect_error){
    die("Unable to connect database: " . $db->connect_error);
}



//local
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost'); //host name depends on server
DEFINE ('DB_NAME', 'grocery_db');




$mysqli =mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

if ($mysqli->connect_errno)
{
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>
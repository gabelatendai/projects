<?php
// include "config.php";
define('DB_SERVER','localhost');
define('DB_USER','ibpaprxy_user');
define('DB_PASS' ,'!@#456&*(gabriel');
define('DB_NAME', 'ibpaprxy_db');
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

$ID=$_GET['ID'];

$query="SELECT * FROM login WHERE email ='$ID'";

$result = mysqli_query($conn,$query);

$array = array();

while ($row  = mysqli_fetch_assoc($result))
{
	$array[] = $row;
}


echo ($result) ?
json_encode(array("code" => 1, "result"=>$array)) :
json_encode(array("code" => 0, "message"=>"Data not found !"));


?>
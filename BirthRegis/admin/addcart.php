<?php

define('DB_SERVER','localhost');
define('DB_USER','ibpaprxy_user');
define('DB_PASS' ,'!@#456&*(gabriel');
define('DB_NAME', 'ibpaprxy_db');

$mysqli = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

if ($mysqli->connect_error) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}


$pid=$_POST['id_item'];
$user=$_POST['user'];
$image=$_POST['item_photo'];
$name=$_POST['item_name'];

$qty=$_POST['qty'];
$stok=$_POST['stok'];
$price=$_POST['price'];
$sub_total=$_POST['sub_total'];
 $date = date('d-M-Y');
 
   $sql="INSERT INTO `cart`( `qnty`, `image`, `price`, `sub_total`, `stok`, `item_name`, `pid`, `date`, `user_id`) 
VALUES ('$qty','$image','$price','$sub_total','$stok','$name','$pid','$date','$user')";

	$exeQuery = mysqli_query($mysqli, $sql) ;

if($exeQuery){
    echo json_encode("true");
    
}else{
     echo json_encode("false");
}

?>



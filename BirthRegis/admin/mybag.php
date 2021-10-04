<?php

define('DB_SERVER','localhost');
define('DB_USER','ibpaprxy_user');
define('DB_PASS' ,'!@#456&*(gabriel');
define('DB_NAME', 'ibpaprxy_db');

$mysqli = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

if ($mysqli->connect_error) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

include 'rb.php';

$conn= R::setup('mysql:host=localhost;dbname=ibpaprxy_db', 'ibpaprxy_user', '!@#456&*(gabriel');

$pid=$_POST['id_item'];
$user=$_POST['user'];
$image=$_POST['item_photo'];
$name=$_POST['item_name'];

$qty=$_POST['qty'];
$stok=$_POST['stok'];
$price=$_POST['price'];
$sub_total=$_POST['sub_total'];
 $date = date('d-M-Y');
// if(isset($_POST['submit'])){
//     $pid=1;
//     $user=2;
//     $image="";
//     $name="";

//     $qty=3;
//     $stok=5;
//     $price=5;
//     $sub_total=4;
//     $date = date('d-M-Y');
 
   $sql="INSERT INTO `cart`( `qnty`, `image`, `price`, `sub_total`, `stok`, `item_name`, `pid`, `date`, `user_id`) 
VALUES ('$qty','$image','$price','$sub_total','$stok','$name','$pid','$date','$user')";

	$exeQuery = mysqli_query($mysqli, $sql) ;

if($exeQuery){
    echo json_encode("true");
    
}else{
     echo json_encode("false");
}
//}
        // $admin = R::dispense('cart');
        // $admin->qnty =$qty;
        //  $admin->image =$image;
        //   $admin->price =$price;
        // $admin->sub_total=$sub_total;
        // $admin->stok =$stok;
        //   $admin->item_name =$name;
        // $admin->pid = $pid;
        // $admin->date = date('d-M-Y');
        // $admin->user_id = $user;
        // R::store($admin);
?>

<!-- <form method="post" action="" >-->

<!--    <input name="submit" value="Submit" type="submit">-->
<!--</form>-->
    


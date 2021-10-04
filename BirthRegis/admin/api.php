<?php
define('DB_SERVER','localhost');
define('DB_USER','ibpaprxy_user2');
define('DB_PASS' ,'xgdZveLGeZaQGU4');
define('DB_NAME', 'ibpaprxy_gr');

$mysqli =mysqli_connect("localhost","root","","grocery_db");
//$mysqli =mysqli_connect("localhost","ibpaprxy_user","!@#456&*(gabriel","ibpaprxy_db");
// $mysqli = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

if ($mysqli->connect_error) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

if(isset($_GET['products'])){
    
$sql="SELECT * FROM products ORDER BY id DESC";
$result=$mysqli->query($sql);
$response=array();
if($result->num_rows>0){
    while($get_row=mysqli_fetch_assoc($result)){
        array_push($response,$get_row);
    }
}
$mysqli->close();
header('Content-Type: application/json');
echo json_encode($response);
}
if(isset($_GET['category'])){
    
    $sql="SELECT * FROM categories";
    $result=$mysqli->query($sql);
    $response=array();
    if($result->num_rows>0){
        while($get_row=mysqli_fetch_assoc($result)){
            array_push($response,$get_row);
        }
    }
    $mysqli->close();
    header('Content-Type: application/json');
    echo json_encode($response);
    }
    
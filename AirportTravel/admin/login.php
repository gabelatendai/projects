<?php

define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'grocery_db');
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Failed to connect to MySQL: " . $conn->connect_error);
}

$email=$_POST['email'];
$pass=$_POST['pass'];

$r= mysqli_query($conn, "SELECT * FROM login where email='".$email."' and password='".$pass."'");
$data =mysqli_num_rows($r);

if($data >0){
// $r= mysqli_query($conn, "SELECT * FROM login WHERE password = '".$pass."'");
// $data = mysqli_fetch_array($r);
// if($data[3]==$pass){
    echo json_encode("true");
    
}else{
echo json_encode("false");
}
    
// }
// else{
//     echo json_encode("dont have an account");
// }

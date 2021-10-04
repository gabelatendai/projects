<?php
define('DB_SERVER','localhost');
define('DB_USER','ibpaprxy_user');
define('DB_PASS' ,'!@#456&*(gabriel');
define('DB_NAME', 'ibpaprxy_db');
$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

$date=date('Y/m/d');
    $sql="SELECT * FROM events where startdate > '$date'";
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
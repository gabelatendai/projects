<?php
include 'rb.php';
 R::setup('mysql:host=localhost;dbname=grocery_db', 'root', ''); //for both mysql or mariaDB

//$db=R::setup('mysql:host=localhost;dbname=ibpaprxy_db', 'ibpaprxy_user', '!@#456&*(gabriel');
$id = $_GET['id'];

$init = R::findOne('about', 'id = ?', [$id]);

R::trash( $init );

print ("<script>window.alert('successfully deleted ')</script>");
print ("<script>window.location.assign('about.php')</script>");
?>

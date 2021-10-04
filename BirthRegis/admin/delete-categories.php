<?php
include 'rb.php';

$db=R::setup('mysql:host=localhost;dbname=grocery_db', 'root', '');

//$db=R::setup('mysql:host=localhost;dbname=ibpaprxy_db', 'ibpaprxy_user', '!@#456&*(gabriel');
$id = $_GET['id'];

$init = R::findOne('categories', 'id = ?', [$id]);

R::trash( $init );

print ("<script>window.alert('successfully deleted ')</script>");
print ("<script>window.location.assign('categories.php')</script>");
?>

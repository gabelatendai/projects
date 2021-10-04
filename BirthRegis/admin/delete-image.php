<?php
include 'rb.php';

$db=R::setup('mysql:host=MYSQL5004;dbname=db_a6908e_fif', 'a6908e_fif', 'admin123');
//$mysqli =mysqli_connect("MYSQL5004","a6908e_fif","admin123","db_a6908e_fif");

$id = $_GET['id'];

$init = R::findOne('images', 'id = ?', [$id]);

R::trash( $init );

print ("<script>window.alert('successfully deleted ')</script>");
print ("<script>window.location.assign('images.php')</script>");
?>

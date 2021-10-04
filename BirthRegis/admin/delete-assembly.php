<?php
include 'rb.php';

$db=R::setup('mysql:host=localhost;dbname=grocery_db', 'root', '');
$id = $_GET['id'];

$init = R::findOne('assembly', 'id = ?', [$id]);

R::trash( $init );

print ("<script>window.alert('successfully deleted ')</script>");
print ("<script>window.location.assign('assemblies.php')</script>");
?>

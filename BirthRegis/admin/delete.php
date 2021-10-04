<?php
include 'rb.php';

//$db=R::setup('mysql:host=localhost;dbname=ibpaprxy_db', 'ibpaprxy_user', '!@#456&*(gabriel');
$db=R::setup('mysql:host=localhost;dbname=portal', 'root', '');

$id = $_GET['id'];

$init = R::findOne('birthreg', 'id = ?', [$id]);

R::trash( $init );

print ("<script>window.alert('successfully deleted ')</script>");
print ("<script>window.location.assign('b_view.php')</script>");
?>

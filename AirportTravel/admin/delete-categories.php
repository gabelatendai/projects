<?php
//include 'config.php';
//$mysqli =mysqli_connect("localhost","root","","garb_db");

$id = $_GET['id'];

//$init = R::findOne('categories', 'id = ?', [$id]);

mysqli_query($mysqli,"delete from categories where cat_id='$id'")or die("query is incorrect...");
//R::trash( $init );

print ("<script>window.alert('successfully deleted ')</script>");
print ("<script>window.location.assign('categories.php')</script>");
?>

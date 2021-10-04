<?php
include "config.php";
$id = $_GET['id'];


//R::trash( $init );
mysqli_query($mysqli, "DELETE FROM `email_info` WHERE email_id='$id'");

print ("<script>window.alert('successfully deleted ')</script>");
print ("<script>window.location.assign('assemblies.php')</script>");
?>

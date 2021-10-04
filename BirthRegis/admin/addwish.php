<?php

require 'config.php';
require 'rb.php';
$db=R::setup('mysql:host=localhost;dbname=weddinghub', 'root', ''); //for both mysql or mariaDB

if(isset($_SESSION['user_id'])){
    $user=3;
}
@$id = 1;

//$user_id = $_SESSION[''];
$get=mysqli_query($mysqli,"SELECT * FROM listings where id ='$id'");
$count=mysqli_fetch_assoc($get);
@$cat= $count['category'];
@$vid= $count['user_id'];
if(isset($_GET['action'])) {

    $lid = $_GET['lid'];
    $vd = $_GET['vid'];
    $wishlist=R::dispense('wishlist');
    $wishlist->listings_id = $lid;
    $wishlist->vendors_id = $vd;
    $wishlist->date = date('d-M-Y');
    $wishlist->users_id = $user;
    R::store($wishlist);
    print ("<script>window.alert('added Successfully')</script>");
    print ("<script>window.location.assign('list-single.php?id='.$lid)</script>");
//    echo '<div class="alert alert-success" role="alert" style="background-color:transparent">...<h2  style="color:white"> <img src="images/492.png" />
//!login successfull </h2></div>';
//    echo '  <h2 align="center">
//          <meta content="2;list-single.php?id='.$id.' http-equiv="refresh" />
//        </h2> ';

}

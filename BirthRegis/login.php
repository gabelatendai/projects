<?php

// Inialize session
session_start();

// Include database connection settings
include('rb.php');
$db=R::setup('mysql:host=localhost;dbname=portal', 'root', '');


    $_SESSION['last_login_timestamp'] = time();
    $username = $_POST['user'];
    $password =md5($_POST['pass']);
    $activity = "Log in";
    $Time = time();
    /*
    ---------------------------- gabriel ---------------------------------------------*/

    $init = R::findOne('users', 'email = ? AND password = ?', [$username, $password]);


    if ($init == null) {
        //   $message = "invalid details";
        print ("<script>window.alert('invalid details')</script>");
        print ("<script>window.location.assign('index.php')</script>");

    } else {
        @session_start();
        $_SESSION['email'] = $_POST['user'];
        $_SESSION['name'] = $init->name;
        $_SESSION['user'] = $init->username;
        $_SESSION['grade'] = $init->grade;
        $_SESSION['place'] = $init->place;
        $_SESSION['role'] = $init->grade;
        $_SESSION['id'] = $init->id;

        $act = $activity;
        $Time = time();




        echo '<div class="alert alert-success" role="alert" style="background-color:transparent">...<h2  style="color:white"> 
<img src="images/success.png"/>
!login successfull </h2></div>';
        if($_SESSION['role']=="admin"){
            echo '  <h2 align="center">
          <meta content="2;admin/dashboard.php" http-equiv="refresh" />
        </h2> ';
        }else{
            echo '  <h2 align="center">
          <meta content="2;bentry.php" http-equiv="refresh" />
        </h2> ';
        }




    //  print ("<script>window.location.assign('index.php')</script");
}


?>

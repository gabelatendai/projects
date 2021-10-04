<?php
/**
 * Created by PhpStorm.
 * User: gabriel
 * Date: 3/29/2021
 * Time: 1:29 AM
 */

include'conf.php';
session_start();

include 'rb.php';

$db=R::setup('mysql:host=localhost;dbname=portal', 'root', '');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!--    <link href="admin/css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
    <title>Online Birth Registration : : Home</title>
    <link rel="stylesheet" type="text/css" href="style.css" media="screen">
    <script language="JavaScript" type="text/javascript">
        <!--
        function validateForm()
        {
            var x=document.forms["myForm"]["user"].value;
            var y=document.forms["myForm"]["pass"].value;
            if (x==null || x=="" || y==null || y=="" )
            {
                alert("Enter Username And Password......!");
                return false;
            }
        }
        //-->
    </script>
    <script language="JavaScript" type="text/javascript">
        <!--
        function validateFormAdmin()
        {
            var x=document.forms["myFormAdmin"]["username"].value;
            var y=document.forms["myFormAdmin"]["password"].value;
            if (x==null || x=="" || y==null || y=="" )
            {
                alert("Enter Admin Username And Password......!");
                return false;
            }
        }
        //-->
    </script>
</head>

<body>
<div id="main_container">
    <div id="header">
        <div id="logo"><a href="index.php"><img src="images/logo.png" alt="" title="" border="0"></a></div><br /><br />
<!--        <h1 align="center"><font color="#000000" size="5">ONLINE BIRTH AND DEATH REGISTRATION PORTAL</font></h1>-->


        <div id="menu">
            <ul>
                <li><a class="current" href="index.php" title="">Home</a></li>
                <li><a href="bentry.php" title="">Birth Entry</a></li>
<!--                <li><a href="deathentry.php" title="">Death Entry</a></li>-->
                <li><a href="birthview.php" title="">Birth Certificate View</a></li>
<!--                <li><a href="deathview.php" title="">Death Certificate View</a></li>-->
                <li><a href="contact.php" title="">Contactus</a></li>
                <?php
                if(!isset($_SESSION['user'])){
                    ?>
                    <li><a href="login_page.php" title="" >Login</a></li>
                    <li><a href="reg.php" title="" >Register</a></li>
                <?php
                }else{
                    ?>
                    <li><a href="logout.php" title="" >Logout</a></li>
                <?php
                }
                ?>
            </ul>
        </div>

    </div>

    <div class="green_box">
        <div class="clock">
            <img src="images/clock.png" alt="" title="">
        </div>
        <div class="text_content">
            <h1>Welcome to Online Birth Registration</h1>
            <p class="green">
                We Welcome you to  Online New Born Birth Certificate System .Its mainly developed and used for Online registration of  birth certificates...
            </p>
            <!--        <div class="read_more"><a href="documents\Birth certificate.docx" TARGET="_blank" >read more</a></div>-->
        </div>

        <div id="right_nav">
            <ul>
                <li><a class="current" href="index.php" title="">Home</a></li>
                <li><a href="bentry.php" title="">Birth Entry</a></li>
<!--                <li><a href="deathentry.php" title="">Death Entry</a></li>-->
                <li><a href="birthview.php" title="">Birth View</a></li>
<!--                <li><a href="deathview.php" title="">Death View</a></li>-->
            </ul>
        </div>


    </div><!--end of green box-->

<?php


include 'rb.php';
session_start();
@$id = $_SESSION['id'];

$db=R::setup('mysql:host=localhost;dbname=portal', 'root', '');
//$mysqli =mysqli_connect("localhost","ibpaprxy_user","!@#456&*(gabriel","ibpaprxy_db");
$mysqli =mysqli_connect("localhost","root","","portal");

@$admin = R::findOne('users','id=?',[$id]);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title ?></title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/summernote-bs4.css" rel="stylesheet">
    <!-- Google Fonts -->
    <script type="text/javascript"src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js">
    </script>
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- FontAwesome icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="fontawesome/css/fontawesome-all.css" rel="stylesheet">
    <!-- Fontello icon -->
    <link href="fontello/css/fontello.css" rel="stylesheet">

    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/x-icon" href="../images/logo.png">
    <!-- Style CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/button.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/offcanvas.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="body-bg">
<div class="dashboard-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 col-lg-10 col-md-8 col-sm-12 col-6">
                <div class="header-logo">

                    <a href="">

                        <img src="../images/logo.png" style="height: 40px" alt="Weddings | Find A Wedding Venue &amp; Supplier WordPress Theme"></a>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 text-right col-md-4 col-sm-12 col-6">
                <div class="user-vendor">
                    <div class="dropdown">

                        <a class="dropdown-toggle" id="dropdownMenuButton" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="user-icon"> <img src="../images/user.png" alt="" class="rounded-circle mb10">
                            </span>
                            <span class="user-vendor-name"><?php echo @$admin->username ?></span>
                        </a>

                            <div class=" dashboard-dropdown-menu dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="dashboard.php">Dashboard</a>
                                <a class="dropdown-item" href="logout.php">Log Out</a>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="navbar-expand-lg">
    <button class="navbar-toggler" type="button" data-toggle="offcanvas">
        <span id="icon-toggle" class="fa fa-bars"></span>
    </button>
</div>
<div class="dashboard-wrapper">
    <div class="dashboard-sidebar offcanvas-collapse">
        <div class="vendor-user-profile">
            <div class="vendor-profile-img">
                <img src="../images/user.png" alt="" class="rounded-circle"></div>
            <h3 class="vendor-profile-name"><?php echo @$admin->username ?></h3>

            <a href="#" class="edit-link"><?php echo @$admin->email ?></a>
        </div>
        <div class="dashboard-nav">

                <ul class="list-unstyled">
                    <li <?php if ($title== "Dashboard"){ echo ' class="active"'; }?>><a href="dashboard.php"><span class="dash-nav-icon"><i class="fas fa-compass"></i></span>Dashboard</a>
                    </li>
                    <li  <?php if ($title== "Users"){ echo ' class="active"'; }?>><a href="users.php"><span class="dash-nav-icon"><i
                                        class="fas fa-list-alt"></i> </span> Users </a></li>
                    <li  <?php if ($title== "Birth Certificates"){ echo ' class="active"'; }?>><a href="b_view.php"><span class="dash-nav-icon"><i
                                        class="fas fa-list-alt"></i> </span> Birth Certificates </a></li>
                    <li  <?php if ($title== " Provinces"){ echo ' class="active"'; }?>><a href="categories.php"><span class="dash-nav-icon"><i
                                        class="fas fa-list-alt"></i> </span> Provinces </a></li>
                    <li  <?php if ($title== " Districts"){ echo ' class="active"'; }?>><a href="districts.php"><span class="dash-nav-icon"><i
                                        class="fas fa-list-alt"></i> </span> Districts </a></li>

                    <li><a href="logout.php"><span class="dash-nav-icon"><i class="fas fa-sign-out-alt"></i></span>Logout
                        </a></li>
                </ul>
        </div>
    </div>
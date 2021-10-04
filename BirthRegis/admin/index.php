<?php
include 'rb.php';
include 'config.php';


$db=R::setup('mysql:host=localhost;dbname=grocery_db', 'root', '');


if (isset($_POST['login'])) {
    $_SESSION['last_login_timestamp'] = time();
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $activity = "Log in";
    $Time = time();
    /*
    ---------------------------- gabela ---------------------------------------------*/

    $init = R::findOne('admin', 'username = ? AND password = ?', [$email, $password]);


    if ($init == null) {
        //   $message = "invalid details";
        print ("<script>window.alert('invalid details')</script>");
        print ("<script>window.location.assign('index.php')</script>");

    } else {
        @session_start();
        // $_SESSION['role'] = "vendor";
        $_SESSION['pass'] =$_POST['password'];
//        $_SESSION['role'] = $init->role;
        $_SESSION['user_id'] = $init->id;
        $_SESSION['username'] = $init->email;
        $_SESSION['email'] = $email;

        $act = $activity;
        $Time = time();




        echo '<div class="alert alert-success" role="alert" style="background-color:transparent">...<h2  style="color:white"> 
<img src="images/success.png" />
!login successfull </h2></div>';

      echo '  <h2 align="center">
          <meta content="2;dashboard.php" http-equiv="refresh" />
        </h2> ';



    }
    //  print ("<script>window.location.assign('index.php')</script");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sign In</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- FontAwesome icon -->
    <link href="fontawesome/css/fontawesome-all.css" rel="stylesheet">
    <!-- Fontello icon -->
    <link href="fontello/css/fontello.css" rel="stylesheet">
    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png">
    <!-- Style CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!-- vendor-form -->

<body class="vendor-bg-image">
<!-- sign up -->
<div class=" vendor-form">
    <div class="container">
        <div class="row ">
            <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6 col-md-12 col-sm-12 col-12  ">
                <!-- vendor head -->
                <div class="vendor-head">
                    <a href="index.php"><img src="img/logo_white.png" style="height: 70px" alt="Wedding Vendor & Supplier Directory HTML Template "></a>
                </div>
                <!-- /.vendor head -->
                <div class="st-tab">
                    <ul class="nav nav-tabs nav-justified" id="Mytabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link"  id="tab-2" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab-2" aria-selected="false">Login</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab2" role="tabpanel" aria-labelledby="tab-1">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <!-- vendor title -->
                                <div class="vendor-form-title">
                                    <h3 class="mb-2">Welcome Back Administrator</h3>

                                </div>
                                <!-- /.vendor title -->
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="control-label sr-only" for="username"></label>
                                                <input id="username" type="text" name="email" placeholder="Username" class="form-control" required>
                                            </div>
                                        </div>
                                        <!-- Text input-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <div class="form-group service-form-group">
                                                <label class="control-label sr-only" for="passwordlogin"></label>
                                                <input id="passwordlogin" type="password" name="password" placeholder="Password" class="form-control" required>
                                            </div>
                                        </div>
                                        <!--buttons -->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <button type="submit" name="login" class="btn btn-default">Login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- vendor-login -->
                        <!-- /.vendor-login -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.vendor-form -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/fastclick.js"></script>
<script src="js/custom-script.js"></script>


</body>

</html>
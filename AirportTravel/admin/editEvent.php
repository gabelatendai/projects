<?php
include 'rb.php';
include 'config.php';
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// Using Awesome https://github.com/PHPMailer/PHPMailer
//require_once 'controllers/authController';
$db= R::setup('mysql:host=localhost;dbname=grocery_db', 'root', ''); //for both mysql or mariaDB

$errors = array();
$bussinessname="";
$email="";
$password="";
$category="";


if (isset($_POST['reg'])) {


    $pass =md5($_POST['password']);
    $bussinessname = $_POST['bussinessname'];
    $category = $_POST['category'];
    $email = $_POST['email'];
    $token=md5(uniqid());
    $init = R::count('users', 'email = ? ', [$email]);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors['email']='Email address is inValid';
    }

    if(empty($email)){
        $errors['email']='Email is required';
    }
    if(empty($pass)){
        $errors['pass']='Password is required';
    }
    if(empty($bussinessname)){
        $errors['name']='Name is required';
    }
    if(empty($category)){
        $errors['category']='Category is required';
    }

    if($init> 0 ){
        $errors['email']=' Email is Already registered by another user';
    }
    if(count($errors)===0){


        $admin = R::dispense('email');
        $admin->email = $email;
        $admin->password =$pass;
        $admin->token = $token;
        $admin->verified = false;
        $admin->notification = true;
        $admin->role ="vendor";
        $admin->date = date('Y-m-d H:i:s');
        R::store($admin);

        $vprofile = R::dispense('vprofile');
        $vprofile->bussinessname = $bussinessname;
        $vprofile->category = $category;
        $admin->ownProductList[] = $vprofile;
        R::store($admin);
        session_start();
        $_SESSION['email']=$email;
        $mail = new PHPMailer(true);
        try{

            $mail->SMTPDebug= SMTP::DEBUG_SERVER;
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'mail.weddinghub.co.zw';                     // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'info@weddinghub.co.zw';   // SMTP username
            $mail->Password = 'weddinghub@2020';                           // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                            // Enable encryption, only 'tls' is accepted
            $mail->Port = 587;                            // Enable encryption, only 'tls' is accepted


            $mail->setFrom('info@weddinghub.co.zw','Wedding Hub');
            $mail->addAddress($email);                 // Add a recipient
            $mail->isHTML(true);
            $body= '<!DOCTYPE html>
<html lang="en">
    <head>
    <title>
        Verify Email
    </title>
    </head>
    <body>
        <p>
            Thank you for registering with us please click the link to verify your
            email..
        </p>
      <a href="http://weddinghub.co.zw/verification.php?token='.$token.'">
       Verify your email address </a>
    </body>


    </html>';
            $mail->Subject = 'Email Verification';
            $mail->Body    =$body;


            $mail->send();
            print ("<script>window.alert('Successfully registered')</script>");
            print ("<script>window.location.assign('user_verification.php')</script>");
//            header('location:user_verification.php?email='.$email.'&name='.$bussinessname);

        } catch (Exception $e) {
            echo "Message was not sent:{$mail->ErrorInfo}";
        }


    }


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Wedding hub</title>
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
    <script src="./js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="./js/ajax-handler.js" type="text/javascript"></script>
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
                            <a class="nav-link active" id="tab-1" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab-1" aria-selected="true">Register</a>
                        </li>
                        <!--                        <li class="nav-item">-->
                        <!--                            <a class="nav-link" id="tab-2" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab-2" aria-selected="false">Login</a>-->
                        <!--                        </li>-->
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab-1">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <!-- vendor title -->
                                <div class="vendor-form-title">
                                    <h3 class="mb-2">Business Register</h3>
                                    <p>Join Weddings to get your business listed or to claim your listing for FREE!</p>
                                </div>
                                <!-- /.vendor title -->
                                <form action="" method="post" enctype="multipart/form-data" onsubmit="if(document.getElementById('agree').checked) { return true; } else
                                        { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
                                    <?php
                                    if(count($errors)>0):?>
                                        <div class="alert alert-danger">
                                            <?php foreach($errors as $error):   ?>
                                                <li><?php  echo $error;
                                                    ?></li>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php
                                    endif;
                                    ?>
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="control-label sr-only" for="bussinessname"></label>
                                                <input id="bussinessname" type="text"  value="<?php echo $bussinessname ?>" name="bussinessname" placeholder="Bussiness Name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <!-- Text input-->
                                            <div class="form-group service-form-group">
                                                <label class="control-label sr-only" for="email"></label>
                                                <input id="email" name="email" type="email"  value="<?php echo $email ?>" placeholder="Email" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <!-- Text input-->
                                            <div class="form-group service-form-group">
                                                <label class="control-label sr-only" for="passwordregister"></label>
                                                <input id="passwordregister" type="password" name="password" placeholder="Password" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <!-- select -->
                                            <div class="form-group">
                                                <select class="wide mb20" name="category">
                                                    <option value="">Vendor Purpose</option>

                                                    <?php

                                                    $ad = mysqli_query($mysqli,'Select * from products');
                                                    while($all=mysqli_fetch_assoc($ad)){

                                                        ?>
                                                        <option value="<?php echo $all['name'];?>"><?php echo $all['name'] ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <!-- select -->
                                            <div class="form-group">
                                                <input type="checkbox" required name="checkbox" value="check" id="agree" />I have read and agree to the Terms and Conditions and Privacy Policy
                                            </div>
                                        </div>
                                        <!-- buttons -->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <button type="submit" name="reg" class="btn btn-default">Sign up</button>
                                        </div>
                                    </div>
                                </form>
                                <p class="mt-2">Already have Account? <a href="login.php" class="wizard-form-small-text"> Login here</a></p>

                                <p class="mt-2"> Are you a new couple?<a href="couple_registration.php"> Click here</a></p>
                            </div>
                        </div>
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
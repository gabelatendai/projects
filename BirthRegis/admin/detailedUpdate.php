<?php
include 'rb.php';
include 'config.php';

@$id= $_GET['id'];
$db=R::setup('mysql:host=localhost;dbname=grocery_db', 'root', '');



$count = R::findOne('apostleupdate', 'id = ?', [1]);




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

<body class="">
<!-- sign up -->
<div class=" vendor-form">
    <div class="container">
        <div class="row ">

                <!-- /.vendor head -->
                <div class="vendor-content-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-8 col-md-8 col-sm-12 col-12">
                                <!--vendor-details -->

                                <div class="">
                                    <div class="card border card-shadow-none">
                                        <h3 class="card-header bg-white">About <?php echo $count['title']; ?></h3>
                                        <div class="card-body">
                                            <!--/.vendor-details -->
                                            <!--vendor-description -->
                                            <p class="lead">
                                                <?php echo nl2br($count['description']); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.review-content -->
                                <!-- review-form -->
                            </div>

                        </div>
                        <!-- /.list-sidebar -->
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
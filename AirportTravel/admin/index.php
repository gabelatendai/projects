<?php
// Initialize the session
@session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

// Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }

// Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

// Validate credentials
    if(empty($email_err) && empty($password_err)){
// Prepare a select statement
        $sql = "SELECT id, email, password FROM admin WHERE email = ?";

        if($stmt = mysqli_prepare($link, $sql)){
// Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

// Set parameters
            $param_email = $email;

// Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
// Store result
                mysqli_stmt_store_result($stmt);

// Check if email exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
// Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
// Password is correct, so start a new session
                            @session_start();

// Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;

// Redirect user to welcome page
//header("location: dashboard.php");
                            echo '<div class="alert alert-success" role="alert" style="background-color:transparent">...<h2  style="color:white">
<img src="images/success.png" />
!login successfull </h2></div>';
                            echo '  <h2 align="center">
          <meta content="2;dashboard.php" http-equiv="refresh" />
        </h2> ';
                        } else{
// Password is not valid, display a generic error message
                            $login_err = "Invalid email or password.";
                        }
                    }
                } else{
// Username doesn't exist, display a generic error message
                    $login_err = "Invalid email or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

// Close statement
            mysqli_stmt_close($stmt);
        }
    }

// Close connection
    mysqli_close($link);
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
    <link rel="shortcut icon" type="image/x-icon" href="../img/logo.png">
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
                    <a href="index.php"><img src="../images/logo.png" style="height: 70px" alt=" "></a>
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

                                    <?php
                                    if(!empty($login_err)){
                                        echo '<div class="alert alert-danger">' . $login_err . '</div>';
                                    }
                                    ?>
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="control-label sr-only" for="email"></label>
                                                <input id="email" type="text" name="email" placeholder="email" value="<?php echo $email; ?>" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>">
                                                <span class="invalid-feedback"><?php echo $email_err; ?></span>
                                            </div>
                                        </div>
                                        <!-- Text input-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <div class="form-group service-form-group">
                                                <label class="control-label sr-only" for="passwordlogin"></label>
                                                <input id="passwordlogin" type="password" name="password" placeholder="Password" class="form-control" <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>>
                                                <span class="invalid-feedback"><?php echo $password_err; ?></span>
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


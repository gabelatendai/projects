<?php
// require 'config.php';

// require 'vendor/autoload.php';
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;
$conn =mysqli_connect("localhost","ibpaprxy_user","!@#456&*(gabriel","ibpaprxy_db");
define('DB_SERVER','localhost');
define('DB_USER','ibpaprxy_user');
define('DB_PASS' ,'!@#456&*(gabriel');
define('DB_NAME', 'ibpaprxy_db');
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);


// $db=R::setup('mysql:host=localhost;dbname=ibpaprxy_db', 'ibpaprxy_user', '!@#456&*(gabriel');
  
 $mobile= $_POST['mobile'];
    $email= $_POST['email'];
    $name  =  $_POST['name'];
     $address  = $_POST['address'];
    $password =  md5($_POST['password']);
   // $gender  =  $_POST['gender'];
   $date = date('d-m-y');
  $token= md5(uniqid());
    $verified=false;

$r= mysqli_query($conn, "SELECT * FROM login WHERE email = '".$email."'") ;
$data = mysqli_fetch_array($r);

if($data[0]>1){
     echo json_encode("account already exists");
}else{
  $query="INSERT INTO login(id,name,email,password,token,verified,address,mobile,date)
 values(null,'$name','$email','$password','$token','$verified','$address','$mobile','$date')";
   //  mysqli_query($conn);
	$exeQuery = mysqli_query($conn, $query);
if($exeQuery){
    echo json_encode("true");
    
}else{
     echo json_encode("false");
}
//   $mail = new PHPMailer(true);
//         try{

//             $mail->SMTPDebug= SMTP::DEBUG_SERVER;
//             $mail->isSMTP();                                      // Set mailer to use SMTP
//             $mail->Host = 'mail.weddinghub.co.zw';                     // Specify main and backup SMTP servers
//             $mail->SMTPAuth = true;                               // Enable SMTP authentication
//             $mail->Username = 'info@weddinghub.co.zw';   // SMTP username
//             $mail->Password = 'weddinghub@2020';                           // SMTP password
//             $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                            // Enable encryption, only 'tls' is accepted
//             $mail->Port = 587;                            // Enable encryption, only 'tls' is accepted


//             $mail->setFrom('info@weddinghub.co.zw','Wedding Hub');
//             $mail->addAddress($email);                 // Add a recipient
//             $mail->isHTML(true);
//             $body= '<!DOCTYPE html>
// <html lang="en">
//     <head>
//     <title>
//         Verify Email
//     </title>
//     </head>
//     <body>
//         <p>
//             Thank you for registering with us please click the link to verify your
//             email..
//         </p>
//       <a href="http://weddinghub.co.zw/verification?token='.$token.'">
//       Verify your email address </a>
//     </body>


//     </html>';
//             $mail->Subject = 'Email Verification';
//             $mail->Body    =$body;


//             $mail->send();
//             print ("<script>window.alert('Successfully registered')</script>");
//             print ("<script>window.location.assign('user_verification')</script>");
//             // header('location:user_verification?email='.$email);

//         } catch (Exception $e) {
//             echo "Message was not sent:{$mail->ErrorInfo}";
//         }

   
}

   


?>

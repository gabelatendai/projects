<?php
include "header.php";
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if (isset($_POST['submit'])) {

    $fname = $_POST['fname']. '   '.$_POST['sname'];

    $mobile = $_POST['mobile'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $status = true;
    mysqli_query($con,"INSERT INTO `feedback`( `name`, `email`, `phone`, `subject`, `message`, `status`)
 VALUES ('$fname','$email','$mobile','$subject','$message','$status')");
//
//    print ("<script>window.alert('Product Successfully added!!!')</script>");
//    print ("<script>window.location.assign('contact_us.php')</script>");
//    $mail = new PHPMailer(true);
//    try{
//
//        $mail->SMTPDebug= SMTP::DEBUG_SERVER;
//        $mail->isSMTP();                                      // Set mailer to use SMTP
//        $mail->Host = 'mail.houseofcleopatra.org';                     // Specify main and backup SMTP servers
////        $mail->Host = 'mail.houseofcleopatra.org';                     // Specify main and backup SMTP servers
//        $mail->SMTPAuth = true;                               // Enable SMTP authentication
//        $mail->Username = 'info@houseofcleopatra.org';   // SMTP username
//        $mail->Password = 'compHub@2020';                           // SMTP password
//        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                            // Enable encryption, only 'tls' is accepted
//        $mail->Port = 587;                            // Enable encryption, only 'tls' is accepted
//
//
//
//        $mail->setFrom($email,$name);              // Add a recipient
//        $mail->addAddress('info@houseofcleopatra.org');                // Add a recipient
//
//        $mail->Subject = 'Contact form Feedback';
//        $mail->Body    =$message;
//
//        // $mail->AltBody    = '<b>Testing some Mailgun awesom ness by http post 1 may 2020</b>';
//
//        $mail->send();
//        print ("<script>window.alert('Successfully Send')</script>");
//        print ("<script>window.location.assign('contact_us.php')</script>");
//        //     echo 'Message has  been sent.';
//
//    } catch (Exception $e) {
//        echo "Message was not sent:{$mail->ErrorInfo}";
//    }



    $msg= "submited";

}

?>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/cover-img-3.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>Airport Travel</h2>
				   					<h1>Contact us</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 animate-box">
						<h3>Get In Touch</h3>
						<form action="" method="post" enctype="multipart/form-data" >
							<div class="row form-group">
								<div class="col-md-6 padding-bottom">
									<label for="fname">First Name</label>
									<input type="text" id="fname" name="fname" class="form-control" placeholder="Your firstname">
								</div>
								<div class="col-md-6">
									<label for="lname">Last Name</label>
									<input type="text" id="lname" name="sname" class="form-control" placeholder="Your lastname">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-6">
									<label for="email">Email</label>
									<input type="email" id="email" name="email" class="form-control" placeholder="Your email address">
								</div>
                                <div class="col-md-6">
									<label for="email">Phone Number</label>
									<input type="text" id="email" name="mobile" class="form-control" placeholder="Your contact number">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="subject">Subject</label>
									<input type="text" id="subject" name="subject" class="form-control" placeholder="Your subject of this message">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="message">Message</label>
									<textarea name="message" id="message"  cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
								</div>
							</div>
							<div class="form-group text-center">
								<input type="submit" name="submit" value="Send Message" class="btn btn-primary">
							</div>

						</form>		
					</div>
					<div class="col-md-10 col-md-offset-1 animate-box">
						<h3>Contact Information</h3>
						<div class="row contact-info-wrap">
							<div class="col-md-3">
								<p><span><i class="icon-location"></i></span> No 2 Blecksely rd <br> Logan Park Harare</p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-phone3"></i></span> <a href="tel:+263 774 796 794">+263 774 796 794</a></p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-paperplane"></i></span> <a href="mailto:info@airporttravel.com">info@airporttravel.com</a></p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-globe"></i></span> <a href="#">airporttravel.com</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="map" class="colorlib-map"></div>
	
		<div id="colorlib-subscribe" style="background-image: url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<h2>Sign Up for a Newsletter</h2>
						<p>Sign up for our mailing list to get latest updates and offers.</p>
						<form class="form-inline qbstp-header-subscribe">
							<div class="row">
								<div class="col-md-12 col-md-offset-0">
									<div class="form-group">
										<input type="text" class="form-control" id="email" placeholder="Enter your email">
										<button type="submit" class="btn btn-primary">Subscribe</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

<?php
include "footer.php";
<?php
define('DB_SERVER','localhost');
define('DB_USER','ibpaprxy_user');
define('DB_PASS' ,'!@#456&*(gabriel');
define('DB_NAME', 'ibpaprxy_db');
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);


  $user_id=$_POST['idu'];
  $name =$_POST['name'];
  $email = $_POST['email'];
  $phone =$_POST['phone'];
  $address =$_POST['address'];

 
  
  
$query="UPDATE login SET name='$name',
			     email='$email',
			     mobile='$phone',
			
			     address='$address'
                 
				 WHERE id='$user_id'";

 
   $exeQuery = mysqli_query($conn, $query) ;


	 if($exeQuery){
	 echo (json_encode(array('code' =>1, 'message' => 'Modifier avec succee')));
}else {echo(json_encode(array('code' =>2, 'message' => 'Modification Non Terminer')));
 }


 ?>
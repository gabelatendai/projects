<?php
include'conf.php';
// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['user'])) {
        header('Location: timeout.php');
}

$user_id=$_SESSION['id'];

$invp=$_SESSION['user'];
$inv="select * from users where username='$invp'";
$ansinv=mysqli_query($con,$inv);
   while($row=mysqli_fetch_array($ansinv))
   {
	 $invoicepre = $row['ccode'];
 }
$ino="select id from birthreg";
$ansin=mysqli_query($con,$ino);
while($row=mysqli_fetch_array($ansin))
   {
	 $no = $row['id'];
 }

@$sql2 ="SELECT id FROM birthreg WHERE id > '$id' ORDER by id DESC LIMIT 1";

$resultn = mysqli_query($con,$sql2);
$nextrows = mysqli_num_rows($resultn);
while ($nextrow = mysqli_fetch_array($resultn)) {
$next=$nextrow['id']+1;
}

 $d=date('Y');
 $m=date('M');
 $no=$ino;

 $a=$invoicepre .'/'.$d.'/'.$m.'/'.$next;
$status=false;
$filetmp= $_FILES['image']['tmp_name'];
$filename = $_FILES['image']['name'];
$filetype = $_FILES['image']['tmp_name'];
$filepath= "documents/bcr/".$filename;
move_uploaded_file( $filetmp,$filepath);
$date= date('d-M-Y');

$sql="INSERT INTO birthreg (Registerno, districit, zone, name, sex, dob, pob, father, mother, p_address, a_t_birth, remark,bcr,users_id,status,mid,fid, dor)
VALUES('$a','$_POST[dist]','$_POST[zone]','$_POST[chname]','$_POST[sex]','$_POST[bday]','$_POST[placebirth]','$_POST[father]','$_POST[mother]','$_POST[paddress]','$_POST[aaddress]','$_POST[remarks]','$filename','$user_id','$status','$_POST[mid]','$_POST[fid]','$date')";
echo @$id;
if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error());
  }
  echo"<script language='javascript'>
  alert(' Birth Registration Sucessfully submitted.......! ' )
 window.location = 'bentry.php';
  </script>";
  //echo $a;
  //
 
  //echo "<b>Invoice Created Sucessfully........! </b><br><br>";?>
  <?php  //echo"<a href='makebill.php'>Back</a>";

mysqli_close($con)
?>
</center>
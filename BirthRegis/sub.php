<?php
//include'conf.php';
// Inialize session
//session_start();
include "header.php";
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['user'])) {
        header('Location: timeout.php');
}



?>
    <div id="main_content">
    	<div id="left_content" style="width: 400px">
        <h2>Online Birth Registration</h2>
        <p>
              </p>
      <form action="bstor.php" method="post" name="sub" id="sub" enctype="multipart/form-data">
<table border="0" align="center">

<tr><td>Select Province</td><td>:</td><td><input type="text" name="dist" value="<?php echo $_POST['dist']; ?>"  /><a href="bentry.php"><img src="images\refresh.png" width="20" /></a></td></tr>
<tr><td>Select District</td><td>:</td><td><select name="zone"><option value="">--Select--</option>
<?php
$pname=$_POST['dist'];
$bn="select zone from place where dist='$pname'";
$ans=mysqli_query($con,$bn);
   while($row=mysqli_fetch_array($ans))
   {?>
	<option value="<?php echo $row['zone'];?>"> <?php echo $row['zone']; } ?></option></select></td></tr>
    
<tr><td>Enter Child Name</td><td>:&nbsp;</td><td><input type="text" name="chname"  /></td></tr>
<tr><td>Select Sex</td><td>:&nbsp;</td><td><select name="sex"><option value="MALE">MALE</option><option value="FEMALE">FEMALE</option></select></td></tr>
<tr><td>Enter Date Of Birth</td><td>:&nbsp;</td><td><input id='bday' class='datepicker' name="bday" type="date"></td></tr>
<tr><td>Place Of Birth</td><td>:&nbsp;</td><td><input type="text" name="placebirth"></td></tr>
<tr><td>Name of Father</td><td>:&nbsp;</td><td><input type="text" name="father"></td></tr>
<tr><td>Father ID Number</td><td>:&nbsp;</td><td><input type="text" name="fid"></td></tr>
<tr><td>Name of Mother</td><td>:&nbsp;</td><td><input type="text" name="mother"></td></tr>
<tr><td>Mother ID</td><td>:&nbsp;</td><td><input type="text" name="mid"></td></tr>
<tr><td>Permenant Address</td><td>:&nbsp;</td><td> <textarea name="paddress"></textarea></td></tr>
<tr><td>Address At Time Of Birth</td><td>:&nbsp;</td><td><input type="text" name="aaddress"></td></tr>
<tr><td>Remarks</td><td>:&nbsp;</td><td><input type="text" name="remarks"></td></tr>
<tr><td>Birth Confirmation Record (BCR)</td><td>:&nbsp;</td><td><input type="file" name="image"></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="Submit" /></td><td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="clear" value="Clear All" /></td></tr>
</table>
</form>  
        
        </div><!--end of left content-->



    	<div id="right_content" style="width: 400px">
        <h2>Hints To Register</h2>


            <?php
            include "how.php";
            ?>
         	<div class="products_box">
  
            </div>
            
            
            </div>  
            
            
        <?php
        include "infor.php";
        ?>
        </div><!--end of right content-->


    
    <div style=" clear:both;"></div>
    </div><!--end of main content-->


<?php

include "footer.php";

?>
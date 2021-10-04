<?php
include "header.php";


if (!isset($_SESSION['user'])) {
    header('Location: timeout.php');
}
?>

    <div id="main_content">
    	<div id="left_content">
        <h2>Online Birth Registration</h2>
        <p>
              </p>
      <form action="sub.php" method="post" name="sub" onsubmit="return validateForm()" >
<table border="0" align="center">

<tr><td>Select Province</td><td>:</td><td>
        <select name="dist" required ><option value="">--Select--</option><?php
//$place=$_SESSION['place'];
//echo $place;
$bnm="select distric from distr ORDER BY id ";
$ansv=mysqli_query($con,$bnm);
   while($rowa=mysqli_fetch_array($ansv))
   {?><option value="<?php echo $rowa['distric'];?>"> <?php echo $rowa['distric']; } ?></option>
        </select>

    </td><td><input type="submit" name="submit" value="Retrive District" /></td></tr>
</table>
</form>  
        
        </div><!--end of left content-->



    	<div id="right_content">
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
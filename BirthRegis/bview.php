<?php
// Inialize session
$user_id=$_SESSION['id'];
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['user'])) {
        header('Location: timeout.php');
}

?>
<?php
include "header.php";
?>
    <div id="main_content">
    	<div id="left_content">
        <h2>Online Birth Certificate</h2>
        <p>
              </p>
      <?php 
include_once "conf.inc";
$na=$_REQUEST['place'];
//$name=mysql_query("SELECT name FROM users WHEE username='$na'");

$result = mysqli_query($con,"SELECT * FROM birthreg WHERE users_id='$user_id'" );
    if(mysqli_num_rows($result) == 0) { 
        ?><h4>Select Correct District</h4><a href="birthview.php"><img src="images\refresh.png" width="20" /></a>
        <?php
    } 
    else 
    { 
        # Print the top of a table 
        echo "<table width='100%' bgcolor='' ><tr>";
		echo "<td><b>Register No</b></td>";
		echo "<td><b>Province </b></td>";
		echo "<td><b>District</b></td>";
		echo "<td><b>Child Name </b></td>"; 
		echo "<td><b>Sex</b></td>"; 
		echo "<td><b>Date of birth</b></td>"; 
        echo "<td><b>Place of birth</b></td>"; 
        echo "<td><b>Father</b></td>";
		echo "<td><b>Mother</b></td>"; 
		echo "<td><b>Permenant Address</b></td>";
		echo "<td><b>Address time of Birth</b></td>";
		echo "<td><b>Remarks</b></td>";
		echo "<td><b>Date of Register</b></td>";
		echo "<td><b>Date of Generate</b></td>";
		echo "<td><b>Print Document</b></td>";
        echo "</tr>"; 
  
        # Print each file 
        while($row = mysqli_fetch_assoc($result)) 
        { 
            # Print file info 
			echo "<tr><td>". $row['Registerno']. "</td>";
            echo "<td>". $row['districit']. "</td>"; 
			echo "<td>". $row['zone']. "</td>"; 
            echo "<td>". $row['name']. "</td>"; 
			echo "<td>". $row['sex']. "</td>"; 
			echo "<td>". $row['dob']. "</td>"; 
			echo "<td>". $row['pob']. "</td>";
			echo "<td>". $row['father']. "</td>"; 
  echo "<td>". $row['mother']. "</td>";
  echo "<td>". $row['p_address']. "</td>";
  echo "<td>". $row['a_t_birth']. "</td>";
  echo "<td>". $row['remark']. "</td>";
  echo "<td>". $row['dor']. "</td>";
  echo "<td>". date("d-m-Y")."</td>";
            # Print download link ?>
            <td><a href="#" onClick="MyWindow=window.open('gen.php?mobilenoo=<?php echo $row['Registerno'] ; ?>','MyWindow','toolbar=no,location=no,directories=no,status=no, menubar=no,scrollbars=no,resizable=no,width=600,height=800,');
             if (MyWindow) {
                MyWindow.focus(5);
                MyWindow.print();
        }
            
            
             return false;">Print</a>
            <?php echo "</tr>"; 
			 # delete link 
            
        } 
  
        # Close table 
        echo "</table>"; 
    } 
  
    # Free the result 
    mysqli_free_result($result); 
 
# Close the mysql connection 
?>
 
        
        </div><!--end of left content-->



    	<div id="right_content">
        	<div class="products_box">
  
             <br />
            </div>
            
            
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
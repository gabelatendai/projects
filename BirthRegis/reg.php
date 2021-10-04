<?php
include "header.php";
if (isset($_POST['submit'])) {
    $init = R::count('users','email=?',[$_POST['email']]);
    if($init>0){
        $msg="Email is registered with another User";
    }else{
        if ($_POST['pass']!=$_POST['pass2']){


//    print ("<script>window.alert('Province Successfully added!!!')</script>");
            $msg="Passwords doesn't match";
//    print ("<script>window.location.assign('reg.php')</script>");
        }
        else{
            $admin = R::dispense('users');
            $admin->name = $_POST['name'];
            $admin->email = $_POST['email'];
//            $admin->username = $_POST['username'];
            $admin->mobile = $_POST['mobile'];
            $admin->username = $_POST['username'];
            $admin->password = md5($_POST['pass']);
            $admin->grade ="user";
            $admin->date = date('d-m-y');
            R::store($admin);


            print ("<script>window.alert(' Successfully Registered!!!')</script>");
            print ("<script>window.location.assign('login_page.php')</script>");
        }
    }


}
?>
    <script type="text/javascript">
        function isNumber(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57)){
                // alert('Contact Number must have numbers only');
                document.getElementById("num").innerHTML = "Contact Number must have numbers only ";
                alert("Phone Number must have numbers only ");
                return false;
            }
            return true;
        }
        function isString(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57)){
                return true;
            }
            else{
                //alert('User address must have alphanumeric characters only');
                document.getElementById("name").innerHTML = "User address must have alphanumeric characters only ";
                alert(" Name does not have  numbers  ");
                return false;
            }
        }



    </script>
    <div id="main_content">
    <div id="left_content" style="width: 400px">
        <h2>Online Registration</h2>
        <p>
        </p>
        <form action="" method="post" name="sub" id="sub" enctype="multipart/form-data">
            <table border="0" align="center">
                <tr><td>  FullName :- -</td><td>:&nbsp;</td><td><input required type="text" name="name"id="name"  onKeyPress="return isString(event)" /></td></tr>
                <tr><td> Email :-</td><td>:&nbsp;</td><td><input required type="text" name="email" /></td></tr>
                <tr><td> Contact Number :-</td><td>:&nbsp;</td><td><input required type="text" onKeyPress="return isNumber(event)" id="num" name="mobile" /></td></tr>
                <tr><td> Password :-</td><td>:&nbsp;</td><td><input required type="password" name="pass" /></td></tr>
                <tr><td>Confirm Password :-</td><td>:&nbsp;</td><td><input required type="password" name="pass2" /></td></tr>
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
</div>


    
    <div style=" clear:both;"></div>
    </div><!--end of main content-->

<?php
include "footer.php";
?>
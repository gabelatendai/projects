<?php
include "header.php";
?>
    <div id="main_content">
        <div id="left_content" style="width: 400px">
            <h2>Login</h2>
            <p>
            </p>
            <form action="login.php" method="post" name="sub" id="sub" enctype="multipart/form-data">
                <table border="0" align="center">
                    <tr><td> Email :-</td><td>:&nbsp;</td><td><input required type="text" name="user" /></td></tr><br>
                    <tr><td> Password :-</td><td>:&nbsp;</td><td><input required type="password" name="pass" /></td></tr>
                    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="sub" value="Login" /></td><td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
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
    </div><!--end of main content-->

<?php
include "footer.php";
?>
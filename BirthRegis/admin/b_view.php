<?php
$title= "Birth Certificate";

include "v-header.php";
include "../vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
@$id = $_SESSION['user_id'];

if(isset($_GET['status']))
{
    $id = $_GET['id'];
    $in = R::findOne('birthreg','id=?',[$id]);

    $userId=$in->users_id;
    $user_email = R::findOne('users','id=?',[$userId]);
    $email= $user_email->email;
    $status = $_GET['status'];
    $sql = "Update birthreg SET status=".$status." WHERE id=".$id;
    $mysqli->query($sql);

    $mail = new PHPMailer(true);
    try{

        $mail->SMTPDebug= SMTP::DEBUG_SERVER;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mail.snagasportswear.com';                     // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'info@snagasportswear.com';   // SMTP username
        $mail->Password = 'Passwordsnaga123';                           // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                            // Enable encryption, only 'tls' is accepted
        $mail->Port = 587;                            // Enable encryption, only 'tls' is accepted


        $mail->setFrom('info@registrargeneral.com','Registrar General');
        $mail->addAddress($email);                 // Add a recipient

        $body= '<html>
    <head>
    <title>
        Birth Application
    </title>
    </head>
    <body>
        <p>
            Your Birth Application Has Been Approved ... Come and colllect Your Birth Certificate
        </p>
    
    </body>


    </html>';
        $mail->isHTML(true);
        $mail->Subject = ' Birth Application';
        $mail->Body    =$body;


        $mail->send();
        print ("<script>window.alert('Successfully registered')</script>");
        header('location:b_view.php');
//print ("<script>window.location.assign('user_verification?email='.$email.'&name='$name)</script>");
        //     echo 'Message has  been sent.';

    } catch (Exception $e) {
        echo "Message was not sent:{$mail->ErrorInfo}";
    }


}

?>

    <div class="dashboard-content">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="dashboard-page-header">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h3 class="dashboard-page-title">Registered birth Certificates</h3>
                            </div>
                        </div>
                    </div>
<!--                    <div class="row">-->
<!--                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-right mb20">-->
<!---->
<!--                            <a href="addApostlesUpdate.php" class="btn btn-default btn-sm">add new </a>-->
<!--                        </div>-->
<!--                    </div>-->
                    <div class="card request-list-table table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <?php
                                echo "<table width='100%' bgcolor='' ><tr>";
//                                echo "<td><b>Register No</b></td>";
                                echo "<td><b>Child Name </b></td>";
                                echo "<td><b>Sex</b></td>";
                                echo "<td><b>Date of birth</b></td>";
//                                echo "<td><b>Place of birth</b></td>";
//                                echo "<td><b>Father</b></td>";
//                                echo "<td><b>Mother</b></td>";
                                echo "<td><b>Permenant Address</b></td>";
                                echo "<td><b>Date of Register</b></td>";
                                echo "<td><b>BCR</b></td>";
                                echo "<td><b>Date of Generate</b></td>";
                                ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $in = R::findall('birthreg');
                            if ($in!=null) {

                                foreach ($in as $row) {
                                    ?>

                                        <?php
                                        echo "<tr>";
                                        echo "<td>". $row['name']. "</td>";
                                        echo "<td>". $row['sex']. "</td>";
                                        echo "<td>". $row['dob']. "</td>";
//                                        echo "<td>". $row['pob']. "</td>";
//                                        echo "<td>". $row['father']. "</td>";
//                                        echo "<td>". $row['mother']. "</td>";
                                        echo "<td>". $row['p_address']. "</td>";
                                        echo "<td>". $row['dor']. "</td>";
                                        echo "<td><a href=../documents/bcr/". $row['bcr']. ">BCR</a></td>";
                                        echo "<td>". date("d-m-Y")."</td>";
                                        ?>

                                        <td class="requester-action">
                                            <a class="btn btn-outline-pink btn-xs" id="example-one" data-text-swap="close" data-text-original="Details" href="../gen.php?id=<?php echo $row->id; ?>" aria-expanded="false" aria-controls="collapseExample">View  </a>

                                            <a href="#myModal<?php echo $row->id; ?>" class="btn btn-outline-violate btn-xs mr10" data-toggle="modal">delete</a>
                                            <?php
                                            if( $row['status']=="1")
                                            {

                                                ?>
                                                <label class="switch1" title="Approved">
                                                    <input type="checkbox" checked onclick="disable(<?php echo $row['id'];?>,0);">
                                                    <p class="btn btn-outline-pink btn-xs">Approve</p>
                                                </label>
                                                <script>
                                                    function disable(id,status) {
                                                        $.ajax({
                                                            url:"b_view.php",
                                                            type:'get',
                                                            data:{id:id,status:status},
                                                            success:function(){
                                                                //alert('Visibility change successfully !');
                                                                window.location.reload();
                                                            }
                                                        })
                                                    }
                                                </script>
                                            <?php

                                            }
                                            else
                                            {

                                            ?>
                                                <label class="switch1" title="Rejected">
                                                    <input type="checkbox" onclick="enable(<?php echo $row['id'];?>,1);">
                                                    <p class="btn btn-outline-pink btn-xs">Approve</p>
                                                </label>


                                                <script>
                                                    function enable(id,status) {
                                                        $.ajax({
                                                            url:"b_view.php",
                                                            type:'get',
                                                            data:{id:id,status:status},
                                                            success:function(){
                                                                //alert('Visibility change successfully !');
                                                                window.location.reload();
                                                            }
                                                        })
                                                    }
                                                </script>
                                                <?php
                                            }
                                            ?>
                                             <div id="myModal<?php echo $row->id; ?>" class="modal fade">
                                            <div class="modal-dialog modal-confirm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Are you sure?</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Do you really want to delete these records? This process cannot be undone.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        <a href="delete.php?id=<?php echo $row->id; ?>" type="button" style="color: white" class="btn btn-danger ">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    <?php
                                }}
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php
include "v-footer.php";


?>
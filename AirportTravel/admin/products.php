<?php
$title= "Flight";

include "v-header.php";
//include 'rb.php';

@$idd = $_SESSION['id'];
//$db= R::setup('mysql:host=localhost;dbname=ecommerece', 'root', ''); //for both mysql or mariaDB

if(isset($_GET['delete'])){
    $id = $_GET['id'];

    mysqli_query($mysqli,"delete from flight where id='$id'")or die("query is incorrect...");

    print ("<script>window.alert('successfully deleted ')</script>");
    print ("<script>window.location.assign('products.php')</script>");
}
if(isset($_GET['send'])){
    $id = $_GET['id'];
    $sub = $_GET['subject'];
    $msg = $_GET['message'];


//    mysqli_query($mysqli,"delete from flight where id='$id'")or die("query is incorrect...");

    print ("<script>window.alert('successfully deleted ')</script>");
    print ("<script>window.location.assign('products.php')</script>");
}
?>
    <div class="dashboard-content">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="dashboard-page-header">
                        <h3 class="dashboard-page-title"> Flight Bookings</h3>
                        <p>Lists present multiple line items vertically as a single continuous element.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-right mb20">

<!--                    <a href="addCategories.php" class="btn btn-default btn-sm">add new Flight Charge</a>-->


                </div>
            </div>
            <div class="dashboard-vendor-list">
                <ul class="list-unstyled">
                    <?php

                    $product_query = "SELECT * FROM flight";
                    $run_query = mysqli_query($mysqli,$product_query);
                    if(mysqli_num_rows($run_query) > 0) {

                        while ($iny = mysqli_fetch_array($run_query)) {
                            ?>
                            <li>
                                <div class="dashboard-list-block">
                                    <div class="row">
                                        <!--                                            <div class="col-xl-2 col-lg-4 col-md-12 col-sm-12 col-12">-->
                                        <!--                                                <div class="dashboard-list-img"><a href="#">-->
                                        <!--                                                        <img src="uploads/cat/" style="height: 100px" alt="" class="img-fluid">-->
                                        <!--                                                    </a></div>-->
                                        <!--                                            </div>-->
                                        <div class="col-xl-7 col-lg-5 col-md-7 col-sm-12 col-12">
                                            <div class="dashboard-list-content">
                                                <h3 class="mb0"><?php echo $iny['departure'] ?>
                                                    <i>to</i> <?php echo $iny['destination'] ?>
                                                </h3>

                                            </div>

                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">

                                            <div class="dashboard-list-btn">

                                                <!--                                                    <a href="editCategories.php--><?php //echo '?id=' . $iny['id']; ?><!--" class="btn btn-outline-violate btn-xs mr10">edit</a>-->
                                                <a class="btn btn-outline-pink btn-xs" data-toggle="collapse" id="example-one" data-text-swap="close" data-text-original="Details" href="#review<?php  echo  $iny['id'] ?>" aria-expanded="false" aria-controls="collapseExample">View  </a></td>


                                                <a href="#myModal<?php echo $iny['id']; ?>" class="btn btn-outline-violate btn-xs mr10" data-toggle="modal">delete</a>
                                                <a href="#send<?php echo $iny['id']; ?>" class="btn btn-outline-violate btn-xs mr10" data-toggle="modal">Send Mail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <td colspan="12" class="expandable-info">
                                <div class="collapse expandable-collapse" id="review<?php  echo  $iny['id'] ?>">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <!-- /.review-user -->
                                            <!-- review-descripttions -->
                                            <div class="review-descriptions">

                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <!-- review-list -->
                                                        <div class="review-list col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                            <div class="review-for">Departure</div>
                                                            <div class="review-number"><?php  echo  $iny['departure'] ?></div>
                                                        </div>
                                                        <div class="review-list col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                            <div class="review-for">Destination</div>
                                                            <div class="review-number"><?php  echo  $iny['destination'] ?></div>
                                                        </div>
                                                        <div class="review-list col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                            <div class="review-for">Guest</div>
                                                            <div class="review-number"><?php  echo  $iny['guest'] ?></div>
                                                        </div>
                                                        <div class="review-list col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                            <div class="review-for">Category</div>
                                                            <div class="review-number"><?php  echo  $iny['category'] ?></div>
                                                        </div>
                                                        <div class="review-list col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                            <div class="review-for">Checkin</div>
                                                            <div class="review-number"><?php  echo  $iny['checkin'] ?></div>
                                                        </div><div class="review-list col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                            <div class="review-for">Checkout</div>
                                                            <div class="review-number"><?php  echo  $iny['checkout'] ?></div>
                                                        </div>
                                                        <div class="review-list col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                            <div class="review-for">Client Contact Details</div>
                                                            <div class="review-number"><?php  echo  $iny['email'] ?></div><br>
                                                            <div class="review-number"><?php  echo  $iny['phonenumber'] ?></div>
                                                        </div>
                                                    </div>
                                                    <!-- /.review-list -->
                                                </div>

                                            </div>
                                            <!-- /.review-descripttions -->
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <div id="myModal<?php echo $iny['id']; ?>" class="modal fade">
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
                                            <a href="products.php?delete=delete&<?php echo 'id='.$iny['id']; ?>" type="button" style="color: white" class="btn btn-danger ">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="send<?php echo $iny['id']; ?>" class="modal fade">
                                <div class="modal-dialog modal-confirm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Contact Client</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="post" enctype="multipart/form-data" >
                                                <div class="row form-group">
                                                    <div class="col-md-12 padding-bottom">
                                                        <label for="fname">Subject</label>
                                                        <input type="text" id="fname" name="subject" class="form-control" placeholder="Your Subject">
                                                    </div>
                                                </div>


                                                <div class="row form-group">
                                                    <div class="col-md-12">
                                                        <label for="message">Message</label>
                                                        <textarea name="message" id="message"  cols="30" rows="5" class="form-control" placeholder="Say something about us"></textarea>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <a href="products.php?send=send&<?php echo 'id='.$iny['id']; ?>" type="button" style="color: white" class="btn btn-secondary ">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }else
                    {
                        ?>
                        <li>
                            <div class="dashboard-list-block">
                                <div class="row">
                                    <h4>No Listings Available</h4>
                                </div>
                            </div>
                        </li>
                    <?php  }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal HTML -->

    <style type="text/css">
        body {
            font-family: 'Varela Round', sans-serif;
        }
        .modal-confirm {
            color: #636363;
            width: 400px;
        }
        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
            text-align: center;
            font-size: 14px;
        }
        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
        }
        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -10px;
        }
        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -2px;
        }
        .modal-confirm .modal-body {
            color: #999;
        }
        .modal-confirm .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
            padding: 10px 15px 25px;
        }
        .modal-confirm .modal-footer a {
            color: #999;
        }
        .modal-confirm .icon-box {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            border-radius: 50%;
            z-index: 9;
            text-align: center;
            border: 3px solid #f15e5e;
        }
        .modal-confirm .icon-box i {
            color: #f15e5e;
            font-size: 46px;
            display: inline-block;
            margin-top: 13px;
        }
        .modal-confirm .btn {
            color: #fff;
            border-radius: 4px;
            background: #60c7c1;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            min-width: 120px;
            border: none;
            min-height: 40px;
            border-radius: 3px;
            margin: 0 5px;
            outline: none !important;
        }
        .modal-confirm .btn-info {
            background: #c1c1c1;
        }
        .modal-confirm .btn-info:hover, .modal-confirm .btn-info:focus {
            background: #a8a8a8;
        }
        .modal-confirm .btn-danger {
            background: #f15e5e;
        }
        .modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
            background: #ee3535;
        }
        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
    </style>
<?php
include "v-footer.php";


?>
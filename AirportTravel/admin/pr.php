<?php
$title= "My products";

include "v-header.php";
//include 'rb.php';

@$idd = $_SESSION['id'];
//$db= R::setup('mysql:host=localhost;dbname=ecommerece', 'root', ''); //for both mysql or mariaDB

if(isset($_GET['status']))
{
    $id = $_GET['id'];
    $status = $_GET['status'];
    $sql = "Update productstabe SET status=".$status." WHERE id=".$id;
    $mysqli->query($sql);
}
if(isset($_GET['delete'])){
    $id = $_GET['id'];

    mysqli_query($mysqli,"delete from productstabe where id='$id'")or die("query is incorrect...");

    print ("<script>window.alert('successfully deleted ')</script>");
    print ("<script>window.location.assign('products')</script>");
}
?>
        <div class="dashboard-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="dashboard-page-header">
                            <h3 class="dashboard-page-title"> Products</h3>
                            <p>Lists present multiple line items vertically as a single continuous element.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-right mb20">

                        <a href="addproducts" class="btn btn-default btn-sm">add new product</a>


                    </div>
                </div>
                <div class="dashboard-vendor-list">
                    <ul class="list-unstyled">
                        <?php
                        $run_query = mysqli_query($mysqli,"SELECT * FROM productstabe");
                            while ($row = mysqli_fetch_array($run_query)) {

                                $pro_cat = $row['product_cat'];
//        $pro_brand = $row['product_brand'];
                                $pro_title = $row['product_title'];
                                $pro_price = $row['product_price'];
                                $pro_des = $row['product_desc'];
                                $pro_image = $row['image'];
                                $status = $row['status'];
                                $pro_id = $row['id'];
                                ?>
                                <li>
                                    <div class="dashboard-list-block">
                                        <div class="row">
                                            <div class="col-xl-2 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="dashboard-list-img"><a href="#"><img
                                                            src="../product_images/<?php echo $pro_image ?>" style="height: 100px" alt=""
                                                            class="img-fluid"></a></div>
                                        </div>
                                            <div class="col-xl-7 col-lg-5 col-md-7 col-sm-12 col-12">
                                                <div class="dashboard-list-content">
                                                    <h3 class="mb0"><a href="#" class="title"><?php echo $pro_title ?></a></h3>
                                                  
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">

                                                <div class="dashboard-list-btn">

                                                    <a href="editCategories.php<?php echo '?id=' . $pro_id; ?>" class="btn btn-outline-violate btn-xs mr10">edit</a>
                                                    <a class="btn btn-outline-pink btn-xs" data-toggle="collapse" id="example-one" data-text-swap="close" data-text-original="Details" href="#review<?php  echo  $pro_id ?>" aria-expanded="false" aria-controls="collapseExample">View  </a></td>


                                                    <a href="#myModal<?php echo $pro_id; ?>" class="btn btn-outline-violate btn-xs mr10" data-toggle="modal">delete</a>

                                                    <?php
                                                    if ($status == "1") {

                                                        ?>
                                                        <label class="switch1" title="Approved">
                                                            <input type="checkbox" checked onclick="disable(<?php echo $pro_id; ?>,0);">
                                                            <p class="btn btn-outline-pink btn-xs">InStock</p>
                                                        </label>
                                                        <script>
                                                            function disable(id, status) {
                                                                $.ajax({
                                                                    url: "products.php",
                                                                    type: 'get',
                                                                    data: {id: id, status: status},
                                                                    success: function () {
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
                                                            <input type="checkbox" onclick="enable(<?php echo $pro_id; ?>,1);">
                                                            <p class="btn btn-outline-pink btn-xs">InStock</p>
                                                        </label>


                                                        <script>
                                                            function enable(id, status) {
                                                                $.ajax({
                                                                    url: "products.php",
                                                                    type: 'get',
                                                                    data: {id: id, status: status},
                                                                    success: function () {
                                                                        //alert('Visibility change successfully !');
                                                                        window.location.reload();
                                                                    }
                                                                })
                                                            }
                                                        </script>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <td colspan="12" class="expandable-info">
                                    <div class="collapse expandable-collapse" id="review<?php  echo  $pro_id ?>">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <!-- review-user -->
                                                <div class="review-user">
                                                    <div class="user-img">
                                                        <img src="../product_images/<?php echo $pro_image ?>" style="height: 300px" alt="star rating jquery" class="rounded-circle">
                                                    </div>
                                                    <div class="user-meta">
                                                        <span class="user-name"><?php  echo  $pro_title ?></span>
                                                        <div class="given-review">
                                                            <span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>                                                         </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.review-user -->
                                                <!-- review-descripttions -->
                                                <div class="review-descriptions">

                                                    <div class="row">
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                            <!-- review-list -->
                                                            <div class="review-list">
                                                                <div class="review-for">Product Name</div>
                                                                <div class="review-number"><?php  echo  $pro_title ?></div>
                                                            </div>
                                                            <!-- /.review-list -->
                                                            <!-- review-list -->
                                                           
                                                            <!-- /.review-list -->
                                                            <!-- review-list -->
<!--                                                            <div class="review-list">-->
<!--                                                                <div class="review-for">Date Uploaded</div>-->
<!--                                                                <div class="review-number">--><?php // echo  $iny->date ?><!--</div>-->
<!--                                                            </div>-->
                                                        </div>
                                                        <!-- /.review-list -->
                                                    </div>
                                                
                                                </div>
                                                <!-- /.review-descripttions -->
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <div id="myModal<?php echo $pro_id; ?>" class="modal fade">
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
                                                <a href="products.php<?php echo '?id='.$pro_id; ?>&delete=delete" type="button" style="color: white" class="btn btn-danger ">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }

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
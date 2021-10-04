<?php
$title= "My products";

include "v-header.php";
//include 'rb.php';

@$id = $_SESSION['user_id'];
//$db= R::setup('mysql:host=localhost;dbname=weddinghub', 'root', ''); //for both mysql or mariaDB


if(isset($_GET['status']))
{
    $id = $_GET['id'];
    $status = $_GET['status'];
    $sql = "Update products SET status=".$status." WHERE id=".$id;
    $mysqli->query($sql);
}

?>
    <div class="dashboard-content">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="dashboard-page-header">
                        <h3 class="dashboard-page-title"> products</h3>
                        <p>Lists present multiple line items vertically as a single continuous element.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-right mb20">

                    <a href="addproducts.php" class="btn btn-default btn-sm">add new products</a>


                </div>
            </div>
            <div class="dashboard-vendor-list">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th> Image</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Weight</th>
                        <th>Date Added</th>
                        <th>Views</th>
                        <th style="width:10%;">Visibility</th>
                        <th class="cat_action_list" style="width:20%;">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $in = R::findall('products');
                    //                        $init = R::findOne('vprofile','users_id=?',[$id]);
                    if ($in!=null) {

                        foreach ($in as $iny) {
                            ?>
                            <tr>
                                <td><?php echo $iny['id'];?></td>
                                <td> <span class="category_img"><img src="uploads/products/<?php echo $iny['profile'];?>" style="height: 80px;width: 100px" /></span></td>
                                <td><?php  echo  $iny->name ?></td>
                                <td><?php  echo  $iny->category ?></td>
                                <td><?php  echo  $iny->price ?></td>
                                <td><?php  echo  $iny->weight . ' '. $iny->weight_unity ?></td>
                                <td><?php  echo  $iny->date ?></td>
                                <td><?php  echo  $iny->views ?></td>
                                <td>
                                    <?php
                                    if($iny['status'])
                                    {

                                        ?>
                                        <label class="switch1" title="Approved">
                                            <input type="checkbox" checked onclick="disable(<?php echo $iny['id'];?>,0);">
                                           <p>Yes</p>
                                        </label>
                                        <script>
                                            function disable(id,status) {
                                                $.ajax({
                                                    url:"productsTable.php",
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
                                            <input type="checkbox" onclick="enable(<?php echo $iny['id'];?>,1);">
                                           <p>No</p>
                                        </label>
                                        <script>
                                            function enable(id,status) {
                                                $.ajax({
                                                    url:"productsTable.php",
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

                                </td>

                                <td><a href="edit_menugallery.php?gallery_id=<?php echo $iny['id'];?>" class="btn btn-primary">Edit</a>
                                    <a href="?gallery_id=<?php echo $iny['id'];?>" class="btn btn-default" onclick="return confirm('Are you sure you want to delete this gallery?');">Delete</a></td>

                            </tr>

                            <?php
                        }
                    }else
                    {
                        ?> <li>
                        <div class="dashboard-list-block">
                            <div class="row">
                                <h4>No Listings Available</h4>
                            </div>
                        </div>
                    </li>
                    <?php  }
                    ?>
                </table>
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
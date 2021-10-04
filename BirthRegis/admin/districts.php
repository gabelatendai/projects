<?php
$title= " Districts";

include "v-header.php";
//include 'rb.php';

@$id = $_SESSION['user_id'];
//$db= R::setup('mysql:host=localhost;dbname=weddinghub', 'root', ''); //for both mysql or mariaDB

if(isset($_GET['visibility_mode']))
{
    $id = $_GET['id'];
    $visibility_mode = $_GET['visibility_mode'];
    $sql = "Update distr SET status =".$visibility_mode." WHERE id=".$id;
    $mysqli->query($sql);
}
if (isset($_POST['submit'])) {
    $admin = R::dispense('place');
    $admin->zone = $_POST['zone'];
    $admin->dist= $_POST['dist'];
    $admin->status =true;
    R::store($admin);


    print ("<script>window.alert('District Successfully added!!!')</script>");
    print ("<script>window.location.assign('districts.php')</script>");
}
if(@$_GET['action']){
    $todo_id=   $_GET['id'];
    $trash = R::findOne('place','id =?',[$todo_id]);
    R::trash($trash);
    print ("<script>window.alert('deleted')</script>");
}
?>
        <div class="dashboard-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="dashboard-page-header">
                            <h3 class="dashboard-page-title"> All Districts</h3>
                            <p>Lists present multiple line items vertically as a single continuous element.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-right mb20">

                        <a href="#add" data-toggle="modal" class="btn btn-default btn-sm">add new District</a>


                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card review-summary-table table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>District</th>
                                    <th>Province</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $in = R::findall('place');
                                //                                $init = R::findOne('vprofile','users_id=?',[$id]);
                                if ($in!=null) {

                                    foreach ($in as $iny) {
                                        ?>
                                        <tr>
                                            <td class="review-summary-name"><?php  echo  $iny->zone ?></td>
                                            <td class="review-summary-name"><?php  echo  $iny->dist ?></td>
                                            <td class="review-summary-action">
                                                <a href="#myModal<?php echo $iny->id; ?>" class="btn btn-outline-violate btn-xs mr10" data-toggle="modal">delete</a>


<!--                                                <a class="btn btn-outline-pink btn-xs" data-toggle="collapse" id="example-one" data-text-swap="close" data-text-original="Details" href="#review--><?php // echo  $iny->id ?><!--" aria-expanded="false" aria-controls="collapseExample">Details  </a></td>-->
                                        </tr>
                                        <tr>
                                            <td colspan="12" class="expandable-info">
                                                <div class="collapse expandable-collapse" id="review<?php  echo  $iny->id ?>">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                            <!-- review-user -->
                                                            <div class="review-user">
                                                                <div class="user-img"> <img src="images/review-pic-2.jpg" alt="star rating jquery" class="rounded-circle"></div>
                                                                <div class="user-meta">
                                                                    <span class="user-name"><?php  echo  $iny->name ?></span>
                                                                    <span class="user-review-date"><?php  echo  $iny->date_of_review ?></span>
                                                                    <div class="given-review">
                                                                        <span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>                                                         </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- /.review-user -->
                                                            <!-- review-descripttions -->
                                                            <div class="review-descriptions">
                                                                <p><?php  echo  $iny->review ?></p>
                                                                <div class="row">
                                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                                        <!-- review-list -->
                                                                        <div class="review-list">
                                                                            <div class="review-for">Quality Service</div>
                                                                            <div class="review-rating"><span class="rated"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas  fa-star"></i> </span></div>
                                                                            <div class="review-number">5</div>
                                                                        </div>
                                                                        <!-- /.review-list -->
                                                                        <!-- review-list -->
                                                                        <div class="review-list">
                                                                            <div class="review-for">Facilities</div>
                                                                            <div class="review-rating"><span class="rated"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> </span></div>
                                                                            <div class="review-number">5</div>
                                                                        </div>
                                                                        <!-- /.review-list -->
                                                                        <!-- review-list -->
                                                                        <div class="review-list">
                                                                            <div class="review-for">Staff</div>
                                                                            <div class="review-rating"><span class="rated"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> </span></div>
                                                                            <div class="review-number">5</div>
                                                                        </div>
                                                                        <!-- /.review-list -->
                                                                        <!-- review-list -->
                                                                        <div class="review-list">
                                                                            <div class="review-for">Flexibility</div>
                                                                            <div class="review-rating"><span class="rated"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> </span></div>
                                                                            <div class="review-number">5</div>
                                                                        </div>
                                                                        <!-- /.review-list -->
                                                                        <!-- review-list -->
                                                                        <div class="review-list">
                                                                            <div class="review-for">Value of money</div>
                                                                            <div class="review-rating"><span class="rated"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> </span></div>
                                                                            <div class="review-number">5</div>
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
                                        </tr>
                                        <div id="myModal<?php echo $iny->id; ?>" class="modal fade">
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
                                                        <a href="districts.php?action=delete&id=<?php echo $iny->id; ?>" type="button" style="color: white" class="btn btn-danger ">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }}else{
                                    ?>
                                    <tr>
                                        <td>No Reviews Recorded</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="add" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <!-- Form Name -->
                        <div class="venue-form-info card-body">
                            <div class="row">

                                <!-- Text input-->

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label" for="title">District Name</label>
                                        <input id="title" name="zone" type="text" placeholder="District Name" class="form-control ">
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Province Name</label>
                                        <select name="dist" required class="form-control " >
                                            <option value="">--Select--</option>
                                            <?php
                                            $in = R::findall('distr');
                                            foreach ($in as $rowa) {?>
                                            <option value="<?php echo $rowa['distric'];?>"> <?php echo $rowa['distric']; } ?></option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>


                <div class="modal-footer">

                    <div class="social-form-info card-body border-top">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <!--                                         <input class="btn btn-default" type="submit" value="Submit New Item">-->
                                <button class="btn btn-default" name="submit" type="submit">Submit New Item</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
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
<?php
$title= "My images";

include "v-header.php";


@$id = $_SESSION['user_id'];


if(isset($_GET['visibility_mode']))
{
    $rid = $_GET['id'];
    $visibility_mode = $_GET['visibility_mode'];
    $sql = "Update images SET status =".$visibility_mode." WHERE id=".$rid;
    $mysqli->query($sql);
}
if(isset($_GET['delete'])){
    $id = $_GET['id'];

    $init = R::findOne('feedback', 'id = ?', [$id]);

    R::trash( $init );

    print ("<script>window.alert('successfully deleted ')</script>");
    print ("<script>window.location.assign('feedback.php')</script>");
}
?>
        <div class="dashboard-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="dashboard-page-header">
                            <h3 class="dashboard-page-title"> Mobile App Feedback</h3>
                            <p>Lists present multiple line items vertically as a single continuous element.</p>
                        </div>
                    </div>
                </div>

                <div class="dashboard-vendor-list">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="wedding-budget-event">Name</th>
                                    <th class="wedding-budget-estimate">Email</th>
                                    <th class="wedding-budget-actual">Phone Number</th>
                                    <th class="wedding-budget-paid">Subject</th>
                                    <th class="wedding-budget-pending">Message</th>
                                    <th class="wedding-budget-pending">Date</th>
                                    <th class="wedding-budget-pending">Action</th>
                                </tr>
                                </thead>

                        <?php
                        $in = R::findall('feedback');
//                        $init = R::findOne('vprofile','users_id=?',[$id]);
                        if ($in!=null) {

                            foreach ($in as $iny) {
                                ?>
                                <tbody>
                                <tr>
                                    <td><?php echo $iny->name ?>  </td>
                                    <td class="estimate-total"><span class="total-amount"> <?php echo $iny->email ?>  </span></td>
                                    <td class="actual-total"><span class="total-amount"><?php echo $iny->phone ?>  </span></td>
                                    <td class="paid-total"><span class="total-amount"><?php echo $iny->subject ?>  </span></td>
                                    <td ><?php echo $iny->message ?>  </td>
                                    <td class="pending-total"><span class="total-amount"><?php echo $iny->date ?>  </span></td>
                                    <td>
                                        <a class="btn btn-outline-pink btn-xs" data-toggle="collapse" id="example-one" data-text-swap="close" data-text-original="Details" href="#review<?php  echo  $iny->id ?>" aria-expanded="false" aria-controls="collapseExample">View  </a>

                                    <a href="#myModal<?php echo $iny->id; ?>" class="btn btn-outline-violate btn-xs mr10" data-toggle="modal">delete</a></span></td>
                                </tr>

                                <td colspan="12" class="expandable-info">
                                    <div class="collapse expandable-collapse" id="review<?php  echo  $iny->id ?>">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <!-- review-user -->
                                                <div class="review-user">
                                                    <div class="user-img"></div>
                                                    <div class="user-meta">
                                                        <span class="user-name"><?php  echo  $iny->name ?></span>
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
                                                                <div class="review-for"> Name</div>
                                                                <div class="review-number"><?php  echo  $iny->name ?></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                            <div class="review-list">
                                                                <div class="review-for"> Email</div>
                                                                <div class="review-number"><?php  echo  $iny->email ?></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                            <div class="review-list">
                                                                <div class="review-for"> Email</div>
                                                                <div class="review-number"><?php  echo  $iny->Subject ?></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                                            <div class="review-list">
                                                                <div class="review-for">Date Uploaded</div>
                                                                <div class="review-number"><?php  echo  $iny->date ?></div>
                                                            </div>
                                                        </div>
                                                        <br>

                                                        <h2>Description</h2><br><br><br>
                                                        <p><?php echo $iny->message ?>  </p>
                                                    </div>
                                                </div>
                                                <!-- /.review-descripttions -->
                                            </div>
                                        </div>
                                    </div>
                                </td>
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
                                                <a href="feedback.php<?php echo '?id='.$iny->id; ?>&delete=delete" type="button" style="color: white" class="btn btn-danger ">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                        }else
                        {
                            ?>
                            <tr>
                                <td> Empty   </td>

                            </tr>
                        <?php  }
                        ?>
                                </tbody>
                            </table>
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
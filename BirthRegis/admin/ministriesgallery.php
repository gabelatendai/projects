<?php
$title= "My products";

include "v-header.php";
//include 'rb.php';

@$id = $_SESSION['user_id'];
//$db= R::setup('mysql:host=localhost;dbname=weddinghub', 'root', ''); //for both mysql or mariaDB


if(isset($_GET['visibility_mode']))
{
    $rid = $_GET['id'];
    $visibility_mode = $_GET['visibility_mode'];
    $sql = "Update products SET status =".$visibility_mode." WHERE id=".$rid;
    $mysqli->query($sql);
}
if(isset($_GET['delete'])){
    $id = $_GET['id'];

    $init = R::findOne('ministries', 'id = ?', [$id]);

    R::trash( $init );

    print ("<script>window.alert('successfully deleted ')</script>");
    print ("<script>window.location.assign('ministriesgallery.php')</script>");
}
?>
?>
        <div class="dashboard-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="dashboard-page-header">
                            <h3 class="dashboard-page-title"> Ministries Gallery</h3>
                            <p>Lists present multiple line items vertically as a single continuous element.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-right mb20">

                        <a href="ministries.php" class="btn btn-default btn-sm">add new </a>


                    </div>
                </div>
                <div class="dashboard-venue-gallery card-body border-top">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h3> Gallery </h3>

                        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="row">
                <?php
        $in = R::findall('ministries');
//                        $init = R::findOne('vprofile','users_id=?',[$id]);
        if ($in!=null) {

            foreach ($in as $iny) {
                ?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
                    <div class="gallery-upload-img">
                        <img src="uploads/listings/<?php echo $iny->profile ?>" style="height: 300px" alt="" class="img-fluid">
                        <span class="delete-gallery-img">
                             <a href="#myModal<?php echo $iny->id; ?>"  data-toggle="modal">
                                 <i class="fa  fa-times-circle" style="color: red"></i></a></span>

                        </span>
                    </div>
                </div>
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
                                <a href="ministriesgallery.php<?php echo '?id='.$iny->id; ?>&delete=delete" type="button" style="color: white" class="btn btn-danger ">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
                ?>
            </div>
        </div>

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
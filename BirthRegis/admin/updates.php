<?php
$title= "Updates";

include "v-header.php";
//include 'rb.php';

@$id = $_SESSION['user_id'];
//$db= R::setup('mysql:host=localhost;dbname=weddinghub', 'root', ''); //for both mysql or mariaDB


?>

    <div class="dashboard-content">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="dashboard-page-header">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h3 class="dashboard-page-title">Apostles Update</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-right mb20">

                            <a href="addApostlesUpdate.php" class="btn btn-default btn-sm">add new </a>
                        </div>
                    </div>
                    <div class="card request-list-table table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Posted Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $in = R::findall('apostleupdate');
                            if ($in!=null) {

                                foreach ($in as $iny) {
                                    ?>
                                    <tr>
                                        <td class="requester-name"><?php echo $iny->title ?></td>
                                        <td class="wedding-date"><?php echo $iny->date ?></td>
                                        <td class="requester-action">
                                            <a href="editUpdates.php<?php echo '?id=' . $iny->id; ?>" class="btn btn-outline-violate btn-xs mr10">edit</a>
                                            <a class="btn btn-outline-pink btn-xs" data-toggle="collapse" id="example-one" data-text-swap="close" data-text-original="Details" href="#review<?php  echo  $iny->id ?>" aria-expanded="false" aria-controls="collapseExample">View  </a>
                                            <a href="#myModal<?php echo $iny->id; ?>" class="btn btn-outline-violate btn-xs mr10" data-toggle="modal">delete</a>
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
                                                        <a href="delete-update.php?id=<?php echo $iny->id; ?>" type="button" style="color: white" class="btn btn-danger ">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    <td colspan="12" class="expandable-info">
                                        <div class="collapse expandable-collapse" id="review<?php  echo  $iny->id ?>">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <!-- review-user -->
                                                    <div class="review-user">
                                                        <div class="user-img"> <img src="uploads/listings/<?php echo $iny->profile ?>" style="height: 300px" alt="star rating jquery" class="rounded-circle"></div>
                                                        <div class="user-meta">
                                                            <span class="user-name"><?php  echo  $iny->title ?></span>
                                                            <span class="user-review-date"><?php  echo  $iny->name ?></span>
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
                                                                    <div class="review-for">Title</div>
                                                                    <div class="review-number"><?php  echo  $iny->title ?></div>
                                                                </div>
                                                                </br>
                                                                <div class="review-list">
                                                                    <div class="review-for">Date Uploaded</div>
                                                                    <div class="review-number"><?php  echo  $iny->date ?></div>
                                                                </div>
                                                            </div>
                                                            <!-- /.review-list -->
                                                        </div>
                                                        <h2>Description</h2>
                                                        <p><?php  echo  $iny->description ?></p>
                                                    </div>
                                                    <!-- /.review-descripttions -->
                                                </div>
                                            </div>
                                        </div>
                                    </td>

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
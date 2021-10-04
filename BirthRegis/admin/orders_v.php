<?php

$title= "Orders";

include "v-header.php";
?>
        <div class="dashboard-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="dashboard-page-header">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h3 class="dashboard-page-title">Request List</h3>
                                    <p>Check your request quote.</p>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-filter-row mb20">
                            <div class="row">
                                <div class="col-xl-3">
                                    <select class="form-control wide" id="exampleFormControlSelect1">
                                        <option>Select Your Listing</option>
                                        <option>Select Your Listing #1</option>
                                        <option>Select Your Listing #2</option>
                                        <option>Select Your Listing #3</option>
                                        <option>Select Your Listing #4</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card request-list-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Order Date</th>
                                    
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
$in = R::findall('orders');
if ($in!=null) {

    foreach ($in as $iny) {
        ?>
        <tr>
            <td class="requester-name"><?php echo $iny->name ?></td>
            <td class="wedding-date"><?php echo $iny->date_of_request ?></td>
            <td class="wedding-date"><?php echo $iny->weddingdate ?></td>
            <td class="requester-id"><?php echo $iny->email ?></td>
            <td class="requester-phone"><?php echo $iny->phone ?></td>
            <td class="requester-action">
                <a href="#myModal<?php echo $iny->id; ?>" class="btn btn-outline-violate btn-xs mr10" data-toggle="modal">delete</a>
                <a data-toggle="modal" data-target="#msg<?php echo $iny->id ?>" class="btn btn-outline-pink btn-xs"
                   onclick="SendSSms('<?php echo $iny['id']; ?>','<?php echo $iny['name'];?>','<?php echo $iny['phone'];?>')" >Send SMS</a>
<!---->
<!--                <a href="#" class="btn btn-outline-pink btn-xs ">Send Email</a></td>-->
<!--        <td class="review-summary-action">-->
                <a class="btn btn-outline-pink btn-xs" data-toggle="collapse" id="example-one" data-text-swap="close" data-text-original="Details" href="#collapseExample<?php echo $iny->id ?>" aria-expanded="false" aria-controls="collapseExample">Details  </a></td>
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
                            <a href="vendor-delete-quotations.php?id=<?php echo $iny->id; ?>" type="button" style="color: white" class="btn btn-danger ">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </tr>
        <tr>
            <td colspan="12" class="expandable-info">
                <div class="collapse expandable-collapse" id="collapseExample<?php echo $iny->id ?>">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <!-- review-user -->
                            <div class="review-user">
                                <div class="user-meta">
                                    <span class="user-name"><?php echo $iny->name ?></span>
                                    <span class="user-review-date"><?php echo $iny->date_of_request ?></span>
                                </div>
                            </div>
                            <!-- /.review-user -->
                            <!-- review-descripttions -->
                            <div class="review-descriptions">
                                <p> <?php echo $iny->message ?> </p>
                            </div>
                            <!-- /.review-descripttions -->
                        </div>
                    </div>
                </div>
            </td>
        </tr>


        <!-- Send SMS -->
        <div class="modal fade" id="msg<?php echo $iny->id ?>" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Send SMS</h4>
                    </div>

                    <div class="modal-body">

                        <form action="" method="post" class="form form-horizontal" >
                            <div class="section">
                                <div class="section-body">

                                    <div class="form-group">

                                        <div class="col-md-11">
                                            <p class="control-label" id="name_mobile_sms">Name (<?php echo $iny['name']; ?>)</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <input type="hidden" name="u_id1" id="u_id1" value="<?php echo $iny['id']; ?>" class="form-control" required >
                                            <input type="hidden" name="mobileno" id="mobileno" class="form-control" required >
                                            <input type="text" name="sms_text" id="sms_text" placeholder="Type message" value="<?php echo $iny['sms_text']; ?>" class="form-control" required >
                                        </div>
                                        <div class="col-md-8">
                                        </div>
                                    </div>

                                </div>
                            </div>


                    </div>

                    <div class="modal-footer">
                        <button type="submit" name="send_sms_text" class="btn btn-outline-pink btn-xs">Send Now</button>

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>
                </div>
                </form>
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
<?php
$title= "Users";

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
                                <h3 class="dashboard-page-title">Registered Users</h3>
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
                                <th>Name</th>
                                <th>Email</th>
                                 <th>Mobile</th>
                                <th>UserName</th>
                                <!--<th>Reg Date</th>-->
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $in = R::findall('users','grade=?',['user']);
                            if ($in!=null) {

                                foreach ($in as $iny) {
                                    ?>
                                    <tr>
                                        <td class="requester-name"><?php echo $iny->name ?></td>
                                        <td class="wedding-date"><?php echo $iny->email ?></td>
                                             <td class="requester-name"><?php echo $iny->mobile ?></td>
                                        <td class="wedding-date"><?php echo $iny->username ?></td>
                                         <!--<td class="wedding-date"><?php echo $iny->date ?></td>-->
                                        <td class="requester-action">
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
                                                        <a href="delete-users.php?id=<?php echo $iny->id; ?>" type="button" style="color: white" class="btn btn-danger ">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>


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
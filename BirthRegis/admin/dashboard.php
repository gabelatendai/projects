<?php
$title= "Dashboard";

include "v-header.php";

@$id = $_SESSION['user_id'];

$count= R::count('products');
//$request= R::count('categories');
$wishlist= R::count('distr');
$new= R::count('birthreg','status=?',[false]);
$old= R::count('birthreg','status=?',[true]);
$guest= R::count('users');
$connect= R::count('birthreg');
$users= R::count('appusers');
$images= R::count('images');
//$request= R::count('categories');
$live= R::count('livestreaming');
$pages= R::count('pages');
$updates= R::count('apostleupdate');
$feedback= R::count('feedback');
//$users= R::count('appusers');
?>

        <div class="dashboard-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="dashboard-page-header">
                            <h3 class="dashboard-page-title">Admin Dashboard</h3>
                            <p>Welcome admin. You can check and manage your products, events, assemblies and Apostles Updates.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card summary-block summary-vendor-wishlist">
                            <div class=" card-body summary-content">
                                <h3 class="summary-title ">Provinces</h3>
                                <div class="summary-count"><?php echo $wishlist;?></div>
                                <p class="summary-text">Provinces</p>
                            </div>
                            <div class="card-footer text-center"><a href="categories.php">View All</a></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card summary-block summary-table-seating">
                            <div class="card-body summary-content">
                                <h3 class="summary-title ">Birth Certificates </h3>
                                <div class="summary-count"><?php echo $connect;?></div>
                                <p class="summary-text"> <?php echo $old;?>  Approved <span class="ml5"> <?php  echo $new;?> New</span></p>
                            </div>
                            <div class="card-footer text-center"><a href="b_view.php">View All</a></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card summary-block summary-guest-list">
                            <div class="card-body summary-content">
                                <h3 class="summary-title ">Users</h3>
                                <div class="summary-count"><?php echo $guest;?></div>
                                <p class="summary-text">Registered Users</p>
                            </div>
                            <div class="card-footer text-center"><a href="users.php">View All</a></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card summary-block summary-todo">
                            <div class="card-body summary-content">
                                <h3 class="summary-title ">Approved</h3>
                                <div class="summary-count"><?php echo $old;?></div>
                                <p class="summary-text"> <?php //echo $completed;?>  Complete <span class="ml5"> <?php // echo $uncompleted;?> remain</span></p>
                            </div>
                            <div class="card-footer text-center"><a href="b_view.php">View All</a></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card summary-block summary-todo">
                            <div class="card-body summary-content">
                                <h3 class="summary-title ">New Birth Certificates</h3>
                                <div class="summary-count"><?php echo $new;?></div>
                                <p class="summary-text"> <?php //echo $completed;?>  Complete <span class="ml5"> <?php // echo $uncompleted;?> remain</span></p>
                            </div>
                            <div class="card-footer text-center"><a href="b_view.php">View All</a></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
 <?php

include "v-footer.php";

?>
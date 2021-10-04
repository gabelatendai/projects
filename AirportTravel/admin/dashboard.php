<?php
$title= "Dashboard";

include "v-header.php";

@$id = $_SESSION['id'];
$run_query = mysqli_query($mysqli,"SELECT * FROM bookings where type ='flight'");
$products = mysqli_num_rows($run_query);
$run = mysqli_query($mysqli,"SELECT * FROM bookings where type ='hotel'");
$hotel = mysqli_num_rows($run);
$run2 = mysqli_query($mysqli,"SELECT * FROM bookings where type ='car'");
$car = mysqli_num_rows($run2);
$run3 = mysqli_query($mysqli,"SELECT * FROM charges");
$charges = mysqli_num_rows($run3);
?>

        <div class="dashboard-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="dashboard-page-header">
                            <h3 class="dashboard-page-title">Admin Dashboard</h3>
                            <p>Welcome admin. You can check and manage your products, appointments, news emails and categories.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card summary-block summary-vendor-wishlist">
                            <div class=" card-body summary-content">
                                <h3 class="summary-title ">Flight Charges</h3>
                                <div class="summary-count"><?php echo @$charges;?></div>
                                <p class="summary-text">Flight Charges</p>
                            </div>
                            <div class="card-footer text-center"><a href="categories.php">View All</a></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card summary-block summary-table-seating">
                            <div class="card-body summary-content">
                                <h3 class="summary-title ">Hotel</h3>
                                <div class="summary-count"><?php echo $hotel;?></div>
                                <p class="summary-text"><span class="text-primary"></span>Hotel bookings</p>
                            </div>
                            <div class="card-footer text-center"><a href="hotels.php">View All</a></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card summary-block summary-todo">
                            <div class="card-body summary-content">
                                <h3 class="summary-title ">Flight </h3>
                                <div class="summary-count"><?php echo @$products;?></div>
                                <p class="summary-text"> <?php //echo $completed;?>  Flight bookings <span class="ml5"> <?php // echo $uncompleted;?> remain</span></p>
                            </div>
                            <div class="card-footer text-center"><a href="products.php">View All</a></div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card summary-block summary-vendor-wishlist">
                            <div class=" card-body summary-content">
                                <h3 class="summary-title ">Car Rental</h3>
                                <div class="summary-count"><?php echo $car;?></div>
                                <p class="summary-text">Car Rental </p>
                            </div>
                            <div class="card-footer text-center"><a href="cars.php">View All</a></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card summary-block summary-guest-list">
                            <div class="card-body summary-content">
                                <h3 class="summary-title ">Contact Page Feedback</h3>
                                <div class="summary-count"><?php echo 2;?></div>
                                <p class="summary-text"> <?php //echo $completed;?>  Contact Page feedback<span class="ml5"></span></p>

                            </div>
                            <div class="card-footer text-center"><a href="Feedback.php">View All</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <?php

include "v-footer.php";

?>
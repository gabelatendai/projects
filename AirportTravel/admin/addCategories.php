<?php
$title= "Add categories";

include 'v-header.php';
@$id ='1';





if (isset($_POST['submit'])) {


    $date= date('d M Y');
    $d= $_POST['destination'];
    $dp = $_POST['departure'];
    $price = $_POST['price'];
//    $views = 0;
    $status =true;

//    R::store($admin);

    mysqli_query($mysqli,"insert into charges(departure,destination,price,date, status) values ('$dp','$d','$price','$date','$status')");

    print ("<script>window.alert(' Successfully added!!!')</script>");
    print ("<script>window.location.assign('categories.php')</script>");
}
?>
        <div class="dashboard-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="dashboard-page-header">
                            <h3 class="dashboard-page-title">Add New Flight Charges</h3>
                            <p>Lists present multiple line items vertically as a single continuous element.</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header"> <h4 class="mb0">About Flight Charge</h4></div>
                    <div class="">
                        <form action="" method="post" enctype="multipart/form-data">
                            <!-- Form Name -->
                            <div class="venue-form-info card-body">
                                <div class="row">
                                   
                                    <!-- Text input-->
                                
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <label class="control-label" for="title">Departure</label>
                                            <input id="title" name="departure" type="text" placeholder="Departure" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <label class="control-label" for="title">Destination</label>
                                            <input id="title" name="destination" type="text" placeholder="Destination" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <label class="control-label" for="title">Flight Price</label>
                                            <input id="title" name="price" type="text" placeholder="price" class="form-control ">
                                        </div>
                                    </div>

                                </div>
                            </div>


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
<?php

include "v-footer.php";
?>
<script>
    function initMap() {
        var uluru = {
            lat: 23.0732195,
            lng: 72.5646902
        };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map,
            icon: 'images/map-pin.png'
        });
    }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvZiQwPXkkIeXfAn-Cki9RZBj69mg-95M&callback=initMap">
    </script>
    <script src="js/summernote-bs4.js"></script>

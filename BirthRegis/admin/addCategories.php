<?php
$title= "Add categories";

include 'v-header.php';
@$id ='1';


@$admin = R::findOne('admin','id=?',[$id]);



if (isset($_POST['submit'])) {
//   $name= $_FILES['file']['name'];

    $filetmp= $_FILES['image']['tmp_name'];
    $filename = $_FILES['image']['name'];
    $filetype = $_FILES['image']['tmp_name'];
    $filepath= "uploads/cat/".$filename;
    move_uploaded_file( $filetmp,$filepath);


    $admin = R::dispense('categories');
    $admin->profile = $filename;
    $admin->title = $_POST['title'];
    $admin->date = date('d-m-y');
    $admin->views = 0;
    $admin->status =true;
    R::store($admin);


    print ("<script>window.alert('category Successfully added!!!')</script>");
    print ("<script>window.location.assign('categories.php')</script>");
}
?>
        <div class="dashboard-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="dashboard-page-header">
                            <h3 class="dashboard-page-title">Add New Category</h3>
                            <p>Lists present multiple line items vertically as a single continuous element.</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header"> <h4 class="mb0">About Category</h4></div>
                    <div class="">
                        <form action="" method="post" enctype="multipart/form-data">
                            <!-- Form Name -->
                            <div class="venue-form-info card-body">
                                <div class="row">
                                   
                                    <!-- Text input-->
                                
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <label class="control-label" for="title">Category Title</label>
                                            <input id="title" name="title" type="text" placeholder="Title" class="form-control ">
                                        </div>
                                    </div>

                                </div>
                            </div>


                    <!--                            Fsn@52T4janM-->
                            <div class="dashboard-venue-gallery card-body border-top">
                                <div class="row">

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h3>Add Image</h3>

                                    </div>
                                

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                        <!-- File Button -->
                                        <div class="form-group">
                                            <label class="control-label" for="filebutton">Browse Image</label>
                                            <input id="filebutton" name="image" class="btn btn-primary btn-block" type="file" >
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

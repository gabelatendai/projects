<?php
$title= "Update Color";

include "v-header.php";
//include 'rb';

@$id = $_GET['id'];

$init = R::findOne('colors','id=?',[$id]);

$title=$init->title;



if (isset($_POST['submit'])) {


        $init = R::findOne('colors','id=?',[$id]);

        $admin = R::load('colors', $id);
        $admin->title = $_POST['title'];
        $admin->date = date('d-m-y');
        R::store($admin);
        print ("<script>window.alert(' Successfully updated!!!')</script>");
        print ("<script>window.location.assign('colors.php')</script>");



}

?>
<div class="dashboard-content">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="dashboard-page-header">
                    <h3 class="dashboard-page-title">Update Color</h3>
                    <p>Lists present multiple line items vertically as a single continuous element.</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header"> <h4 class="mb0">About Color</h4></div>
            <div class="">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Form Name -->
                    <div class="venue-form-info card-body">
                        <div class="row">

                            <!-- Text input-->
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="control-label" for="title">Color Title</label>
                                    <input id="title" value="<?php echo $title ?>" name="title" type="text" placeholder="Title" class="form-control ">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="social-form-info card-body border-top">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <button class="btn btn-default" name="submit" type="submit">Update</button>
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

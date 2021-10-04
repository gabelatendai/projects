<?php
$title= "Update Livestreaming";

include "v-header.php";
//include 'rb';

@$id = 1;



@$id = $_GET['id'];

$init = R::findOne('livestreaming','id=?',[$id]);
//$profile = $filename;
$title = $init->title;
$profile =$init->profile;
$description =$init->description;
$link =$init->link;



if (isset($_POST['submit'])) {
    if($_FILES['image']['name']!="") {
        $albumimgnm = rand(0, 99999) . "_" . $_FILES['image']['name'];
//        $tpath1='categories/'.$_POST['cat_id'].'/'.$albumimgnm;
        $tpath1 = "uploads/listings/" . $albumimgnm;
        move_uploaded_file($_FILES["image"]["tmp_name"], $tpath1);

        $init = R::findOne('livestreaming', 'id=?', [$id]);

        $admin = R::load('livestreaming', $id);
        $admin->profile = $albumimgnm;
        $admin->title = $_POST['title'];
        $admin->description= $_POST['description'];
        $admin->link= $_POST['link'];
        R::store($admin);
        print ("<script>window.alert(' Successfully updated!!!')</script>");
        print ("<script>window.location.assign('livestreaming.php')</script>");

    }else{
        $init = R::findOne('livestreaming','id=?',[$id]);

        $admin = R::load('livestreaming', $id);
        $admin->title = $_POST['title'];
        $admin->description = $_POST['description'];
        $admin->link= $_POST['link'];
        R::store($admin);
        print ("<script>window.alert(' Successfully updated!!!')</script>");
        print ("<script>window.location.assign('livestreaming.php')</script>");

    }

}?>
        <div class="dashboard-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="dashboard-page-header">
                            <h3 class="dashboard-page-title">Add New Assembly</h3>
                            <p>Lists present multiple line items vertically as a single continuous element.</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header"> <h4 class="mb0">About Assembly</h4></div>
                    <div class="">
                        <form action="" method="post" enctype="multipart/form-data">
                            <!-- Form Name -->
                            <div class="venue-form-info card-body">
                                <div class="row">
                                   
                                    <!-- Text input-->
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="title">Page Title</label>
                                            <input id="title" name="title" value="<?php echo $title?>" type="text" placeholder="Title" class="form-control ">
                                        </div>
                                    </div>

                                </div>
                            </div>


                    <!--                            Fsn@52T4janM-->
                            <div class="dashboard-venue-gallery card-body border-top">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h3>Add Cover Image</h3>
                                        
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
                                        <div class="gallery-upload-img">
                                            <img src="uploads/listings/<?php echo $profile ?>" alt="" class="img-fluid">
                                            <span class="delete-gallery-img"> <a href="#"><i class="fa  fa-times-circle"></i></a></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <!-- File Button -->
                                        <div class="form-group">
                                            <label class="control-label" for="filebutton">Browse Image</label>
                                            <input id="filebutton" name="image" class="btn btn-primary btn-block" type="file">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="summernote">Short Text </label>
                                            <input type="text" class="form-control"  name="description" value=" <?php echo $description ?> " placeholder="Write Descriptions for your venue">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="summernote"> Link  </label>
                                            <input class="form-control" type="url" name="link" value=" <?php echo $link ?> " placeholder="url link ">

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="social-form-info card-body border-top">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
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
<div class="modal fade" id="login" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel-2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-2">Add Amenity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="control-label sr-only" for="username"></label>
                                <input id="username" type="text" name="title" placeholder="Title" class="form-control" required>
                            </div>
                        </div>
                        <!-- Text input-->
                        <!--buttons -->

                    </div>
                    <div class="modal-footer">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <button type="submit" name="amenity" class="btn btn-default">Add New Amenity</button>
                        </div>
                    </div>
                </form>
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
            icon: 'livestreaming/map-pin.png'
        });
    }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvZiQwPXkkIeXfAn-Cki9RZBj69mg-95M&callback=initMap">
    </script>
    <script src="js/summernote-bs4.js"></script>

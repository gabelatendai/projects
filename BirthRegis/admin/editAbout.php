<?php
$title= "Update";

include "v-header.php";
//include 'rb';

@$id = $_GET['id'];

$init = R::findOne('about','id=?',[$id]);
//$admin->profile = $filename;
$title = $init->title;
$name = $init->name;
$contact = $init->contact;
$description =$init->description;
$profile=$init->profile;


if(isset($_POST['submit']))
{

    if($_FILES['image']['name']!="")
    {
        $albumimgnm=rand(0,99999)."_".$_FILES['image']['name'];
//        $tpath1='categories/'.$_POST['cat_id'].'/'.$albumimgnm;
        $tpath1= "uploads/listings/".$albumimgnm;
        move_uploaded_file($_FILES["image"]["tmp_name"], $tpath1);

        $init = R::findOne('about','id=?',[$id]);

    $admin = R::load('about', $id);
                $admin->profile = $albumimgnm;
                $admin->title = $_POST['title'];
                $admin->name = $_POST['name'];
                $admin->contact = $_POST['contact'];
                $admin->description = $_POST['description'];
                R::store($admin);
    print ("<script>window.alert(' Successfully updated!!!')</script>");
    print ("<script>window.location.assign('about.php')</script>");
    }
    else
    {
        $init = R::findOne('about','id=?',[$id]);
//
    $admin = R::load('about', $id);
                $admin->title = $_POST['title'];
                $admin->name = $_POST['name'];
                $admin->contact = $_POST['contact'];
                $admin->description = $_POST['description'];
                R::store($admin);
        print ("<script>window.alert(' Successfully updated!!!')</script>");
        print ("<script>window.location.assign('about.php')</script>");
    }


//    header( "Location:about.php");
    exit;


}

?>
        <div class="dashboard-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="dashboard-page-header">
                            <h3 class="dashboard-page-title">Update Info</h3>
                            <p>Lists present multiple line items vertically as a single continuous element.</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header"> <h4 class="mb0">About Info</h4></div>
                    <div class="">
                        <form action="" method="post" enctype="multipart/form-data">
                            <!-- Form Name -->
                            <div class="venue-form-info card-body">
                                <div class="row">
                                   
                                    <!-- Text input-->
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <label class="control-label" for="title"> Title</label>
                                            <input id="title" value="<?php echo $title ?>" name="title" type="text" placeholder="Title" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <label class="control-label" for="title">Name </label>
                                            <input id="title" value="<?php echo $name ?>" name="name" type="text" placeholder="Name" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <label class="control-label" for="title">Contact</label>
                                            <input id="title" value="<?php echo $contact ?>" name="contact" type="text" placeholder="Contact" class="form-control ">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="dashboard-venue-gallery card-body border-top">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
                                        <div class="gallery-upload-img">
                                            <img src="uploads/listings/<?php echo $profile ?>" alt="" class="img-fluid">
                                            <span class="delete-gallery-img"> <a href="#"><i class="fa  fa-times-circle"></i></a></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
                                        <!-- File Button -->
                                        <div class="form-group">
                                            <label class="control-label" for="filebutton">Browse Image</label>
                                            <input id="filebutton" name="image" class="btn btn-primary btn-block" type="file">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="summernote">Descriptions </label>
                                            <textarea class="form-control" id="summernote" name="description" rows="6" placeholder="Write Descriptions for your venue">
                                                            <?php echo $description ?></textarea>
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
            icon: 'images/map-pin.png'
        });
    }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvZiQwPXkkIeXfAn-Cki9RZBj69mg-95M&callback=initMap">
    </script>
    <script src="js/summernote-bs4.js"></script>

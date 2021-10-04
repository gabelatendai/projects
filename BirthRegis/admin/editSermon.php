<?php
$title= "Add Teaching";

include "v-header.php";
//include 'rb';

@$id = $_GET['id'];

$init = R::findOne('categories','id=?',[$id]);
$name=$init->name;
$title=$init->title;
$des=$init->description;
$profile=$init->profile;
$vidio=$init->vidio;

if (isset($_POST['submit'])) {
if($_FILES['image']['name']!="") {
    $albumimgnm = rand(0, 99999) . "_" . $_FILES['image']['name'];
//        $tpath1='categories/'.$_POST['cat_id'].'/'.$albumimgnm;
    $tpath1 = "uploads/listings/" . $albumimgnm;
    move_uploaded_file($_FILES["image"]["tmp_name"], $tpath1);
    $vidname= $_FILES['file']['name'];
    $init = R::findOne('categories','id=?',[$id]);

    $admin = R::load('categories', $id);
    $admin->title = $_POST['title'];
    $admin->name = $_POST['name'];
    $admin->profile = $albumimgnm;
//    $admin->vidio = $_POST['vid'];
    $admin->description = $_POST['description'];
    $admin->date = date('d-m-y');
    R::store($admin);
    print ("<script>window.alert(' Successfully updated!!!')</script>");
    print ("<script>window.location.assign('categories.php')</script>");
}else{
    if($_POST['vidio']!="") {
//        $vidname= $_FILES['file']['name'];
        $init = R::findOne('categories','id=?',[$id]);

        $admin = R::load('categories', $id);
        $admin->title = $_POST['title'];
        $admin->vidio = $_POST['vidio'];
        $admin->name = $_POST['name'];
        $admin->description = $_POST['description'];
        $admin->date = date('d-m-y');
        R::store($admin);
        print ("<script>window.alert(' Successfully updated!!!')</script>");
        print ("<script>window.location.assign('categories.php')</script>");

    }
    else{
        $init = R::findOne('categories','id=?',[$id]);

        $admin = R::load('categories', $id);
        $admin->title = $_POST['title'];
//        $admin->vidio= $name;
        $admin->name = $_POST['name'];
        $admin->description = $_POST['description'];
        $admin->date = date('d-m-y');
        R::store($admin);
        print ("<script>window.alert(' Successfully updated!!!')</script>");
        print ("<script>window.location.assign('categories.php')</script>");


    }
}
}

?>
<div class="dashboard-content">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="dashboard-page-header">
                    <h3 class="dashboard-page-title">Update Sermon</h3>
                    <p>Lists present multiple line items vertically as a single continuous element.</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header"> <h4 class="mb0">About Sermon</h4></div>
            <div class="">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Form Name -->
                    <div class="venue-form-info card-body">
                        <div class="row">

                            <!-- Text input-->
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <label class="control-label" for="title">Preacher Name</label>
                                    <input id="title" value="<?php echo $name ?>" name="name" type="text" placeholder="Title" class="form-control ">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <label class="control-label" for="title">Sermon Title</label>
                                    <input id="title" value="<?php echo $title ?>" name="title" type="text" placeholder="Title" class="form-control ">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <!-- File Button -->
                                <div class="form-group">
                                    <label class="control-label" for="filebutton"> Video Name <i></i></label>
                                    <input id="title" value="<?php echo $vidio ?>" name="vidio" type="text" placeholder="Title" class="form-control ">
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--                            Fsn@52T4janM-->
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
                                                <?php echo $des ?>      </textarea>
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

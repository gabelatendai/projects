<?php
$title= "Add Teaching";

include "v-header.php";
//include 'rb';

@$id = $_GET['id'];

$init = R::findOne('products','id=?',[$id]);
$category=$init->category;
$name=$init->name;
$price=$init->price;
$profile=$init->profile;
$weight=$init->weight;
$weight_unity=$init->weight_unity;
$description=$init->description;

if (isset($_POST['submit'])) {
    if($_FILES['image']['name']!="") {
        $filetmp= $_FILES['image']['tmp_name'];
        $filename = $_FILES['image']['name'];
        $filetype = $_FILES['image']['tmp_name'];
        $filepath= "uploads/products/".$filename;
        move_uploaded_file( $filetmp,$filepath);


        $init = R::findOne('products','id=?',[$id]);

        $admin = R::load('products', $id);
        $admin->profile = $filename;
        $admin->category = $_POST['category'];
        $admin->price = $_POST['price'];
        $admin->name = $_POST['name'];
        $admin->weight = $_POST['weight'];
        $admin->weight_unity = $_POST['unity'];
        $admin->description = $_POST['description'];
        R::store($admin);
        print ("<script>window.alert(' Successfully updated!!!')</script>");
        print ("<script>window.location.assign('products.php')</script>");
    }else{

            $init = R::findOne('products','id=?',[$id]);

            $admin = R::load('products', $id);
        $admin->category = $_POST['category'];
        $admin->price = $_POST['price'];
        $admin->name = $_POST['name'];
        $admin->weight = $_POST['weight'];
        $admin->weight_unity = $_POST['unity'];
        $admin->description = $_POST['description'];
            R::store($admin);
            print ("<script>window.alert(' Successfully updated!!!')</script>");
            print ("<script>window.location.assign('products.php')</script>");



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
                                    <label class="control-label" for="title">Product Name</label>
                                    <input id="title" name="name" value="<?php echo $name ?>" type="text" placeholder="product name" class="form-control ">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <label class="control-label" for="title">Price</label>
                                    <input id="title" value="<?php echo $price ?>" name="price" type="text" placeholder="price" class="form-control ">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <!-- Select Basic -->
                                <div class="form-group">
                                    <label class="control-label" for="Category">Product Category</label>
                                    <select class="wide" id="Category" name="category">
                                        <option value="Select Category">Select Category</option>
                                        <?php
                                        $in = R::findall('categories');
                                        //                        $init = R::findOne('vprofile','users_id=?',[$id]);


                                        foreach ($in as $iny) {
                                            ?>
                                            <option value="<?php echo $iny['id'] ?>"><?php echo $iny['title'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <label class="control-label" for="title">Weight</label>
                                    <input id="title" value="<?php echo $weight ?>" name="weight" type="text" placeholder="weight" class="form-control ">
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label class="control-label" for="title">Weight Unity</label>
                                <input id="title" name="unity" value="<?php echo $weight_unity ?>" type="text" placeholder="weight unity eg ml, kgs, gr, " class="form-control ">
                            </div>
                        </div>
                    </div>

                    <div class="dashboard-venue-gallery card-body border-top">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="gallery-upload-img">
                                    <img src="uploads/products/<?php echo $profile ?>" alt="" class="img-fluid">
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
                                                <?php echo $description ?>      </textarea>
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

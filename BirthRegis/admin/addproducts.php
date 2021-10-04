<?php
$title= "Add products";

include 'v-header.php';
@$id ='1';


@$admin = R::findOne('admin','id=?',[$id]);



if (isset($_POST['submit'])) {
//   $name= $_FILES['file']['name'];

    $filetmp= $_FILES['image']['tmp_name'];
    $filename = $_FILES['image']['name'];
    $filetype = $_FILES['image']['tmp_name'];
    $filepath= "uploads/products/".$filename;
    move_uploaded_file( $filetmp,$filepath);


    $admin = R::dispense('products');
//    $admin->vidio =$name;
    $admin->profile = $filename;
    $admin->category = $_POST['category'];
    $admin->price = $_POST['price'];
    $admin->name = $_POST['name'];
    $admin->weight = $_POST['weight'];
    $admin->weight_unity = $_POST['unity'];
    $admin->description = $_POST['description'];
    $admin->date = date('d-m-y');
    $admin->views = 0;
    $admin->status =true;
    R::store($admin);


    print ("<script>window.alert('product Successfully added!!!')</script>");
    print ("<script>window.location.assign('products.php')</script>");
}
?>
<div class="dashboard-content">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="dashboard-page-header">
                    <h3 class="dashboard-page-title">Add New products</h3>
                    <p>Lists present multiple line items vertically as a single continuous element.</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header"> <h4 class="mb0">About Listing</h4></div>
            <div class="">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Form Name -->
                    <div class="venue-form-info card-body">
                        <div class="row">

                            <!-- Text input-->
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <label class="control-label" for="title">Product Name</label>
                                    <input id="title" name="name" type="text" placeholder="product name" class="form-control ">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <label class="control-label" for="title">Price</label>
                                    <input id="title" name="price" type="text" placeholder="price" class="form-control ">
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
                                    <input id="title" name="weight" type="text" placeholder="weight" class="form-control ">
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <label class="control-label" for="title">Weight Unity</label>
                                    <input id="title" name="unity" type="text" placeholder="weight unity eg ml, kgs, gr, " class="form-control ">
                                </div>
                            </div>
                    </div>


                    <!--                            Fsn@52T4janM-->
                    <div class="dashboard-venue-gallery card-body border-top">
                        <div class="row">

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <h3>Add Image</h3>

                            </div>
                        

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <!-- File Button -->
                                <div class="form-group">
                                    <label class="control-label" for="filebutton">Browse Image</label>
                                    <input id="filebutton" name="image" class="btn btn-primary btn-block" type="file" >
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="control-label" for="summernote">About Product </label>
                                    <textarea class="form-control" id="summernote" name="description" rows="6" placeholder="Write Descriptions for your venue">
                                                            </textarea>
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

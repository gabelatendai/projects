<?php
$title= "Update Product";


include "v-header.php";

@$pid = $_GET['id'];


$result = mysqli_query($mysqli, " SELECT * FROM productstabe WHERE id = $pid");
$init = mysqli_fetch_assoc($result);


$category=$init['product_cat'];
$name=$init['product_title'];
$price=$init['product_price'];
$profile=$init['image'];
$image1=$init['image1'];
$image2=$init['image2'];
$image3=$init['image3'];
//$product_price=$init['product_price2'];
//$discount_price=$init->discount_price;
//$weight_unity=$init->weight_unity;
$description=$init['product_desc'];
$result2 = mysqli_query($mysqli, " SELECT * FROM categories WHERE cat_id = $category");
$d = mysqli_fetch_assoc($result2);
//@$d = R::findOne('categories','id=?',[$category]);
$title=$d['cat_title'];

if (isset($_POST['submit'])) {


    $filetmp= $_FILES['image'];
    $filetmp= $_FILES['image']['tmp_name'];
    $filename = $_FILES['image']['name'];
    $filetype = $_FILES['image']['tmp_name'];
    move_uploaded_file( $filetmp,"../product_images/".$filename);

//    $admin = R::load('products',$pid);
    $product_title = $_POST['title'];
//    $discount_price = $_POST['discount_price'];
    $product_price = $_POST['price'];
//    $product_price2 = $_POST['price2'];
    $product_desc = $_POST['description'];
    $product_cat = $_POST['category'];
    $product_keywords = strtolower(preg_replace('/[^a-zA-Z0-9\-]/', '',preg_replace('/\s+/', '-', $_POST['title']) ));;
if(!empty($_FILES['image']['tmp_name'])) {
    $profile = $filename;
}
//else{
//    $image = $profile;
//}
    if(!empty($_FILES['image1']['tmp_name'])){
        $filetmp= $_FILES['image1']['tmp_name'];
        $filename = $_FILES['image1']['name'];
        $filetype = $_FILES['image1']['tmp_name'];
        //$filepath1= "../product_images/".$filename;
        move_uploaded_file( $filetmp,"../product_images/".$filename);
        $image1 = $filename;

    }
//    else{
//        //$filepath1="";
//        $image1 = $image1;
//
//    }

    if(!empty($_FILES['image2']['tmp_name'])){
        $filetmp= $_FILES['image2']['tmp_name'];
        $filename = $_FILES['image2']['name'];
        $filetype = $_FILES['image2']['tmp_name'];
        $filepath2= "../product_images/".$filename;
        move_uploaded_file( $filetmp,"../product_images/".$filename);
        $image2= $filename;
    }
//    else{
////        // $filepath2="";
//        $image2= $image2;
//    }

    if(!empty($_FILES['image3']['tmp_name'])){
        $filetmp= $_FILES['image3']['tmp_name'];
        $filename = $_FILES['image3']['name'];
        $filetype = $_FILES['image3']['tmp_name'];
        //$filepath3= "../product_images/".$filename;
        move_uploaded_file( $filetmp,"../product_images/".$filename);
        $image3= $filename;
    }
    mysqli_query($mysqli, "UPDATE `productstabe` SET  
`product_title`='$product_title' ,
`product_price`='$product_price' ,
`product_desc`='$product_desc' ,
`product_cat`='$product_cat' ,
`product_keywords`='$product_keywords' ,
`image`='$profile' ,
`image2`='$image2' ,
`image3`='$image3' ,
`image1`='$image1' 
WHERE `id`='$pid'");


    print ("<script>window.alert(' Successfully Updated!!!')</script>");
    print ("<script>window.location.assign('products.php')</script>");


}

?>
<div class="dashboard-content">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="dashboard-page-header">
                    <h3 class="dashboard-page-title">Update Product
                    </h3>
                    <p>Lists present multiple line items vertically as a single continuous element.</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header"> <h4 class="mb0">About Product</h4></div>
            <div class="">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Form Name -->

                    <div class="venue-form-info card-body">
                        <div class="row">

                            <!-- Text input-->
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <label class="control-label" for="title">Product Title</label>
                                    <input id="title" value="<?php echo $name?>" name="title" type="text" placeholder="product name" class="form-control ">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <label class="control-label" for="title"><?php

                                            ?>Price<?php  ?></label>
                                    <input id="title" value="<?php echo $price?>" name="price" type="text" placeholder="Price" class="form-control ">
                                </div>
                            </div>
<!--                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">-->
<!--                                <div class="form-group">-->
<!--                                    <label class="control-label" for="title">Natural Colour Price</label>-->
<!--                                    <input id="title" value="--><?php //echo $product_price?><!--" name="price2" type="text" placeholder="Natural Colour Price" class="form-control ">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">-->
<!--                                <div class="form-group">-->
<!--                                    <label class="control-label" for="title">Discount Price</label>-->
<!--                                    <input id="title" value="--><?php //echo $discount_price?><!--" name="discount_price" type="text" placeholder="Discount Amount" class="form-control ">-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <!-- Select Basic -->
                                <div class="form-group">
                                    <label class="control-label" for="Category">Product Category</label>
                                    <select class="wide" id="Category" name="category">
                                        <option value="Select Category" >Select Category</option>
                                        <?php
                                        $re = mysqli_query($mysqli, " SELECT * FROM categories");
                                        while($iny = mysqli_fetch_assoc($re)) {
                                            ?>
                                            <option value="<?php echo $iny['cat_id']?>" <?php if($iny['cat_id']==$category){echo "selected";}?> ><?php echo $iny['cat_title'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-venue-gallery card-body border-top">
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                <div class="gallery-upload-img">
                                    <img src="../product_images/<?php echo $profile ?>" alt="" class="img-fluid">
                                    <span class="delete-gallery-img"> <a href="#"><i class="fa  fa-times-circle"></i></a></span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">

                                <div class="form-group">
                                    <label class="control-label" for="filebutton">Browse Main Image</label>
                                    <input id="filebutton"  name="image" class="btn btn-primary btn-block" type="file">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                <div class="gallery-upload-img">
                                    <img src="../product_images/<?php echo $image1 ?>" alt="" class="img-fluid">
                                    <span class="delete-gallery-img"> <a href="#"><i class="fa  fa-times-circle"></i></a></span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
<!--                                <!-- File Button -->
                                <div class="form-group">
                                    <label class="control-label" for="filebutton">Browse Image 1</label>
                                    <input id="filebutton" name="image1" class="btn btn-primary btn-block" type="file">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                <div class="gallery-upload-img">
                                    <img src="../product_images/<?php echo $image2 ?>" alt="" class="img-fluid">
                                    <span class="delete-gallery-img"> <a href="#"><i class="fa  fa-times-circle"></i></a></span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">

                                <div class="form-group">
                                    <label class="control-label" for="filebutton">Browse Image 2</label>
                                    <input id="filebutton" name="image2" class="btn btn-primary btn-block" type="file">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                <div class="gallery-upload-img">
                                    <img src="../product_images/<?php echo $image3 ?>" alt="" class="img-fluid">
                                    <span class="delete-gallery-img"> <a href="#"><i class="fa  fa-times-circle"></i></a></span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">

                                <div class="form-group">
                                    <label class="control-label" for="filebutton">Browse  Image 3</label>
                                    <input id="filebutton" name="image3" class="btn btn-primary btn-block" type="file">
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

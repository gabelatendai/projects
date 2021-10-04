<?php
include "config.php";


$valid_extensions = array("mp4","avi","3gp","mov","mpeg","mkv"); // valid extensions
$path = 'uploads/videos/'; // upload directory
if(!empty($_POST['name']) || !empty($_POST['title']) || $_FILES['file'])

{


    $filetmp= $_FILES['image']['tmp_name'];
    $filename = $_FILES['image']['name'];
    $filetype = $_FILES['image']['tmp_name'];
    $filepath= "uploads/listings/".$filename;
    move_uploaded_file( $filetmp,$filepath);


    $img = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    // can upload same image using rand function
    $final_image = rand(1000,1000000).$img;
    // check's valid format
    if(in_array($ext, $valid_extensions))
    {
        $path = $path.strtolower($final_image);
        if(move_uploaded_file($tmp,$path))
        {
            //  echo "<img src='$path' />";
            $name = $_POST['name'];
            $title = $_POST['title'];
            $des = $_POST['description'];
            $date = date('d-m-y');

            $insert = $db->query("INSERT categories (name,title,vidio,profile,description,date) VALUES ('".$name."','".$title."','".$path."','".$filename."','".$des."','".$date."')");
        }

        print ("<script>window.alert('Teaching Successfully added!!!')</script>");
        print ("<script>window.location.assign('categories.php')</script>");
    }
    else
    {
        print ("<script>window.alert('File extension not allowed!!!')</script>");
        print ("<script>window.location.assign('addcategories.php')</script>");
    }
}
?>
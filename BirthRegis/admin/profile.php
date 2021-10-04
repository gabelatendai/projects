<?php
$title= "Profile";

include "v-header.php";
$errors = array();

$id=$_SESSION['user_id'];

    $vprofile = R::findOne('admin','id=?',[$id]);
   $user= $vprofile->id;
   $name= $vprofile->username;
   $password= $vprofile->password;
   $email= $vprofile->email;
   $image= $vprofile->image;





if (isset($_POST['submit'])) {
    if($_FILES['image']['name']!="") {
        $albumimgnm = rand(0, 99999) . "_" . $_FILES['image']['name'];
//        $tpath1='categories/'.$_POST['cat_id'].'/'.$albumimgnm;
        $tpath1 = "img/" . $albumimgnm;
        move_uploaded_file($_FILES["image"]["tmp_name"], $tpath1);

        $init = R::findOne('admin', 'id=?', [$id]);

        $admin = R::load('admin', $id);
        $admin->image = $albumimgnm;
        $admin->username = $_POST['name'];
        $admin->email= $_POST['email'];
        R::store($admin);
        print ("<script>window.alert(' Successfully updated!!!')</script>");
        print ("<script>window.location.assign('dashboard.php')</script>");

    }else{
        $init = R::findOne('admin','id=?',[$id]);

        $admin = R::load('admin', $id);
        $admin->username = $_POST['name'];
        $admin->email= $_POST['email'];
        R::store($admin);
        print ("<script>window.alert(' Successfully updated!!!')</script>");
        print ("<script>window.location.assign('dashboard.php')</script>");

    }

}if (isset($_POST['add'])) {

     $filetmp= $_FILES['image']['tmp_name'];
    $filename = $_FILES['image']['name'];
    $filetype = $_FILES['image']['tmp_name'];
    $filepath= "img/".$filename;
    move_uploaded_file( $filetmp,$filepath);
$username = $_POST['name'];
    $init = R::findOne('admin','username=?',[$username]);
    if($init==null){
        $admin = R::dispense('admin');
        $admin->image = $filename;
        $admin->username = $_POST['name'];
        $admin->email= $_POST['email'];
        $admin->password= $_POST['password'];
        $admin->date= date('d-M-Y');
        R::store($admin);
        print ("<script>window.alert('new User added!!!')</script>");
        print ("<script>window.location.assign('dashboard.php')</script>");
    }
    else{
        print ("<script>window.alert('Username already taken by another user!!!')</script>");
        print ("<script>window.location.assign('dashboard.php')</script>");
    }


}


if (isset($_POST['change-password'])) {

    $password= $_POST['oldpassword'];


    $newpassword= $_POST['newpassword'];
    $retypepassword= $_POST['retypepassword'];
    if($newpassword!=$retypepassword){
        $errors['password']='The Two Passwords do not match';
    }
    // if($password!=$pass){
    //     $errors['password']='Old password is incorrect';
    // }
    if(count($errors)===0) {
        $admin = R::load('admin',$id);
        $admin->password = md5($newpassword);
        R::store($admin);
        print ("<script>window.alert('Password Updated Successfully !!!')</script>");
    print ("<script>window.location.assign('dashboard.php')</script>");
    }

}
?>
        <div class="dashboard-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="dashboard-page-header">
                            <h3 class="dashboard-page-title ">My Profile</h3>
                            <p>Change your profile image and information edit and save.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Profile</a>
                            <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-add" role="tab" aria-controls="v-pills-home" aria-selected="true">Add New User</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Password Change</a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Email Notifications</a>
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Delete Account</a>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 col-12">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show" id="v-pills-add" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="card">
                                    <div class="card-header">Add New Admin User</div>
                                    <div class="card-body">
                                        <form action="" enctype="multipart/form-data" method="post">
                                            <!-- Form Name -->
                                            <div class="profile-upload-img">
                                                <div class="row">
                                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <div id="image-preview">
                                                        <img src="img/<?php echo $image ;?>">
                                                        </div>
                                                        <input type="file" name="image" id="image-upload" class="upload-profile-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="personal-form-info">
                                                <div class="row">
                                                    <!-- Text input-->
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="Username">User Name</label>
                                                            <input id="Username" name="name" type="text" placeholder="" class="form-control " required>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="email">Email</label>
                                                            <input id="email" name="email" type="email" placeholder="" class="form-control " >
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="email">Password</label>
                                                            <input id="email" name="password" type="password" placeholder="" class="form-control " >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="social-form-info mb-0">
                                                <div class="row">

                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <button class="btn btn-default" name="add" type="submit">Add New User</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="card">
                                    <div class="card-header">Profile</div>
                                    <div class="card-body">
                                        <form action="" enctype="multipart/form-data" method="post">
                                            <!-- Form Name -->
                                            <div class="profile-upload-img">
                                                <div class="row">
                                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <div id="image-preview">
                                                        <img src="img/<?php echo $image ;?>">
                                                        </div>
                                                        <input type="file" name="image" id="image-upload" class="upload-profile-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="personal-form-info">
                                                <div class="row">
                                                    <!-- Text input-->
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="Username">User Name</label>
                                                            <input id="Username" value="<?php echo $name ;?>" name="name" type="text" placeholder="" class="form-control " required>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="email">Email</label>
                                                            <input id="email" name="email" value="<?php echo $email ;?>" type="email" placeholder="" class="form-control " >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="social-form-info mb-0">
                                                <div class="row">

                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <button class="btn btn-default" name="submit" type="submit">Update profile</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <div class="card">
                                    <div class="card-header">Password Change</div>
                                    <div class="card-body">
                                        <form class="row" action="" enctype="multipart/form-data" method="post">
                                            <?php
                                            if(count($errors)>0):?>
                                                <div class="alert alert-danger">
                                                    <?php foreach($errors as $error):   ?>
                                                        <li><?php  echo $error;
                                                            ?></li>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php
                                            endif;
                                            ?>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="currentpassword">Current Password</label>
                                                    <input id="currentpassword" name="oldpassword" type="password" placeholder="" class="form-control ">
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="newpassword">New Password</label>
                                                    <input id="newpassword" name="newpassword" type="password" placeholder="" class="form-control ">
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="retypepassword">Retype Password</label>
                                                    <input id="retypepassword" name="retypepassword" type="password" placeholder="" class="form-control ">
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <button class="btn btn-default" name="change-password" type="submit">Save Changes</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                <div class="card">
                                    <div class="card-header">Email Notifications</div>
                                    <div class="">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">Email Notifications


                                                <div class="switch-notification">

                                                        <div class="onoffswitch">
                                                            <input type="checkbox"  onclick="disable(<?php echo $init['id'];?>,0);" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" tabindex="0" checked>
                                                            <label class="onoffswitch-label" for="myonoffswitch">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                        <script>
                                                            function disable(id,visibility_mode) {
                                                                $.ajax({
                                                                    url:"User-profile.php",
                                                                    type:'get',
                                                                    data:{id:id,visibility_mode:visibility_mode},
                                                                    success:function(){
                                                                        //alert('Visibility change successfully !');
                                                                        window.location.reload();
                                                                    }
                                                                })
                                                            }
                                                        </script>

                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                <div class="card">
                                    <div class="card-header">Account Delete</div>
                                    <div class="card-body">
                                        <p>In the fields below, enter your new password.</p>
                                        <form>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Delete my account and data listing also.</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">Delete my account only.</label>
                                            </div>
                                            <button class="btn btn-primary mt30" type="submit">Delete My Account</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include "v-footer.php";
?>

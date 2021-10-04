<?php
$title= "Add Guest";

include "v-header.php";

error_reporting(0);
@$user_id = $_SESSION['user_id'];

if(isset($_POST['singlebutton'])){


    $email= $_POST['email'];

    //  $bid= $_POST['bid'];

    $admin = R::dispense('guest');
    $admin->firstname =$_POST['fname'];
    $admin->secondname =$_POST['lname'];
    $admin->p_firstname =$_POST['p_fname'];
    $admin->p_secondname =$_POST['p_lname'];
    $admin->relation = $_POST['relation'];
    $admin->address = $_POST['address'];
    $admin->mobile = $_POST['mobile'];
    $admin->email = $email;
    $admin->city = $_POST['city'];
    $admin->country = $_POST['country'];
    $admin->users_id = $user_id;
    $admin->guest_type =  $_POST['type'];
    $admin->zipcode = $_POST['zipcode'];
    $admin->date = date('Y-m-d H:i:s');
    R::store($admin);

}
?>
        <div class="dashboard-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-8 col-sm-12 col-12">
                        <div class="dashboard-page-header">
                            <h3 class="dashboard-page-title">Add New Guest</h3>
                            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="single-guest-tab" data-toggle="tab" href="#single-guest" role="tab" aria-controls="single-guest" aria-selected="true">Single Guest</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="couple-guest-tab" data-toggle="tab" href="#couple-guest" role="tab" aria-controls="couple-guest" aria-selected="false">Couple </a>
                            </li>
<!--                            <li class="nav-item">-->
<!--                                <a class="nav-link" id="household-tab" data-toggle="tab" href="#household" role="tab" aria-controls="household" aria-selected="false">Household</a>-->
<!--                            </li>-->
                        </ul>
                    </div>
                    <div class="">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="single-guest" role="tabpanel" aria-labelledby="single-guest-tab">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <h4>Guest Information</h4>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="fname">First Name</label>
                                                    <input id="fname" name="fname" type="text" placeholder="" class="form-control">
                                                    <input id="fname" name="type" value="1" type="hidden" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="lname">Last Name</label>
                                                    <input id="lname" name="lname" type="text" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-top">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <h4>Relation with couple</h4>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" id="family">Group/Family</label>
                                                    <select class="wide" for="family" name="relation">
                                                        <option value="Groom Sister">Groom Sister</option>
                                                        <option value="Bride Friend">Bride Friend</option>
                                                        <option value="Groom Friend">Groom Friend</option>
                                                        <option value="Bride Family">Bride Family</option>
                                                        <option value="Groom Family">Groom Family</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-top">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <h4>Contact Information</h4>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="address1">Address Line </label>
                                                    <input id="address1" name="address" type="text" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="address2">Phone Number</label>
                                                    <input id="address2" name="mobile" type="text" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="email">Email</label>
                                                    <input id="email" name="email" type="email" placeholder="" class="form-control ">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="city">City</label>
                                                    <select name="city" class="wide" id="city">
                                                        <option value="Harare">Harare</option>
                                                        <option value="Mutare">Mutare</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="country">Country</label>
                                                    <select class="wide" name="country" id="country">
                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                        <option value="India">India</option>
                                                        <option value="UK">UK</option>
                                                        <option value="US">US</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="postcode">Postcode</label>
                                                    <input id="postcode" name="zipcode" type="text" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button type="submit" name="singlebutton" class="btn btn-default">Save Guest Details</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="couple-guest" role="tabpanel" aria-labelledby="couple-guest-tab">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <h4>Guest Information</h4>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="fname">First Name</label>
                                                    <input id="fname" name="fname" type="text" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="lname">Last Name</label>
                                                    <input id="lname" name="lname" type="text" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="p_fname">First Name</label>
                                                    <input id="fname" name="p_fname" type="text" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="lname">Last Name</label>
                                                    <input id="lname" name="p_lname" type="text" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-top">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <h4>Relation with couple</h4>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" id="family">Group/Family</label>
                                                    <select class="wide" for="family" name="relation">
                                                        <option value="Groom Sister">Groom Sister</option>
                                                        <option value="Bride Friend">Bride Friend</option>
                                                        <option value="Groom Friend">Groom Friend</option>
                                                        <option value="Bride Family">Bride Family</option>
                                                        <option value="Groom Family">Groom Family</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-top">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <h4>Contact Information</h4>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="address1">Address Line </label>
                                                    <input id="address1" name="address" type="text" placeholder="" class="form-control">
                                                    <input id="address1" name="type" value="2" type="hidden" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="address2">Phone Number</label>
                                                    <input id="address2" name="mobile" type="text" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="email">Email</label>
                                                    <input id="email" name="email" type="email" placeholder="" class="form-control ">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="city">City</label>
                                                    <select name="city" class="wide" id="city">
                                                        <option value="Harare">Harare</option>
                                                        <option value="Mutare">Mutare</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="country">Country</label>
                                                    <select class="wide" name="country" id="country">
                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                        <option value="India">India</option>
                                                        <option value="UK">UK</option>
                                                        <option value="US">US</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="postcode">Postcode</label>
                                                    <input id="postcode" name="zipcode" type="text" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button type="submit" name="singlebutton" class="btn btn-default">Save Guest Details</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="household" role="tabpanel" aria-labelledby="household-tab">
                                <form>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <h3>Guest Information</h3>
                                                <hr>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="row">
                                                    <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="fname2">First Name</label>
                                                            <input id="fname2" name="fname2" type="text" placeholder="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="lname2">Last Name</label>
                                                            <input id="lname2" name="lname2" type="text" placeholder="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-2">
                                                        <button class="btn btn-primary mt30"> Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <a href="#" class="btn btn-default">Add New Row</a>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mt30 mb30">
                                                <div class="form-group">
                                                    <label class="control-label" for="family3">Group/Family</label>
                                                    <select class="wide" id="family3">
                                                        <option value="Groom Sister">Groom Sister</option>
                                                        <option value="Bride Friend">Bride Friend</option>
                                                        <option value="Groom Friend">Groom Friend</option>
                                                        <option value="Bride Family">Bride Family</option>
                                                        <option value="Groom Family">Groom Family</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <legend>Contact Information</legend>
                                                <hr>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="address5">Address Line 1</label>
                                                    <input id="address5" name="address5" type="text" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="address6">Address Line 2</label>
                                                    <input id="address6" name="address6" type="text" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="email3">Email</label>
                                                    <input id="email" name="email3" type="email3" placeholder="" class="form-control ">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="city3">City</label>
                                                    <select class="wide" id="city3">
                                                        <option value="Ahmedabad">Ahmedabad</option>
                                                        <option value="Baroda">Baroda</option>
                                                        <option value="Bharuch">Bharuch</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="country3">Country</label>
                                                    <select class="wide" id="country3">
                                                        <option value="India">India</option>
                                                        <option value="UK">UK</option>
                                                        <option value="US">US</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="postcode3">Postcode</label>
                                                    <input id="postcode3" name="postcode3" type="text" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button type="submit" name="singlebutton" class="btn btn-default">Save Guest Details</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php
include "v-footer.php";
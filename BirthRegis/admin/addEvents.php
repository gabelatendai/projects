<?php
$title= "Add Teaching";

include "v-header.php";
//include 'rb';

@$id = 1;




if (isset($_POST['submit'])) {

    $filetmp= $_FILES['image']['tmp_name'];
    $filename = $_FILES['image']['name'];
    $filetype = $_FILES['image']['tmp_name'];
    $filepath= "uploads/listings/".$filename;
    move_uploaded_file( $filetmp,$filepath);


                $admin = R::dispense('events');
//                $admin->vidio =$name;
                $admin->profile = $filename;
                $admin->title = $_POST['title'];
                $admin->startdate = $_POST['startdate'];
                  $admin->starttime = $_POST['starttime'];
                $admin->endtime = $_POST['endtime'];
                $admin->enddate = $_POST['enddate'];
                $admin->description = $_POST['description'];
                $admin->status = true;
                $admin->views =0;
                $admin->date = date('d-m-y');

                R::store($admin);

}
?>
        <div class="dashboard-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="dashboard-page-header">
                            <h3 class="dashboard-page-title">Add New Event</h3>
                            <p>Lists present multiple line items vertically as a single continuous element.</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header"> <h4 class="mb0">About Event</h4></div>
                    <div class="">
                        <form action="" method="post" enctype="multipart/form-data">
                            <!-- Form Name -->
                            <div class="venue-form-info card-body">
                                <div class="row">
                                   
                                    <!-- Text input-->
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="title">Event Title</label>
                                            <input id="title" name="title" type="text" placeholder="Title" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <label class="control-label" for="title"> Start Date</label>
                                            <input id="title" name="startdate" type="date" placeholder="Title" class="form-control ">
                                        </div>
                                    </div><div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <label class="control-label" for="title"> End Date</label>
                                            <input id="title" name="enddate" type="date" placeholder="Title" class="form-control ">
                                        </div>
                                    </div>
 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <label class="control-label" for="title"> Start Time</label>
                                            <input id="title" name="starttime" type="time" placeholder="Title" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <label class="control-label" for="title"> End Time</label>
                                            <input id="title" name="endtime" type="time" placeholder="Title" class="form-control ">
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
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <!-- File Button -->
                                        <div class="form-group">
                                            <label class="control-label" for="filebutton">Browse Image</label>
                                            <input id="filebutton" name="image" class="btn btn-primary btn-block" type="file" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="summernote">Descriptions </label>
                                            <textarea class="form-control" id="summernote" name="description" rows="6" placeholder="Write Descriptions for your venue">
                                                            </textarea>
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
            icon: 'images/map-pin.png'
        });
    }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvZiQwPXkkIeXfAn-Cki9RZBj69mg-95M&callback=initMap">
    </script>
    <script src="js/summernote-bs4.js"></script>

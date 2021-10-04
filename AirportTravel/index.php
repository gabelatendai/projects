<?php
include "header.php";


if (isset($_POST['flight'])) {
    $from= $_POST['from'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $category = $_POST['category'];
    $checkin = $_POST['checkin'];
    $checkout= $_POST['checkout'];
    $guest = $_POST['guest'];
    $destination = $_POST['destination'];
    $status =false;
    mysqli_query($con,"INSERT INTO `flight`( `destination`, `departure`, `checkin`, `checkout`, `guest`, `status`, `category`, `email`, `phonenumber`)
 VALUES ('$destination','$from','$checkin','$checkout','$guest','$status','$category','$email','$mobile')");
    print ("<script>window.alert('Flight Successfully Booked ,, You will recieve an email concerning payment and your flight schedule!!!')</script>");
    print ("<script>window.location.assign('index.php')</script>");
}
if (isset($_POST['hotel'])) {
//    $booking = $_POST['booking'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $category = $_POST['category'];
    $checkin = $_POST['checkin'];
    $checkout= $_POST['checkout'];
    $guest = $_POST['guest'];
    $destination = $_POST['destination'];
    $status =false;
    mysqli_query($con,"INSERT INTO `hotels`( `destination`, `checkin`, `checkout`, `guest`, `status`, `category`, `email`, `phonenumber`)
 VALUES ('$destination','$checkin','$checkout','$guest','$status','$category','$email','$mobile')");
    print ("<script>window.alert('Hotel Successfully booked!!!')</script>");
    print ("<script>window.location.assign('index.php')</script>");
}
if (isset($_POST['car'])) {
    $from = $_POST['departure'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
//    $category = $_POST['category'];
    $checkin = $_POST['checkin'];
    $checkout= $_POST['checkout'];
    $guest = $_POST['guest'];
    $destination = $_POST['destination'];
    $status =false;
    mysqli_query($con,"INSERT INTO `cars`( `destination`, `departure`, `checkin`, `checkout`, `guest`, `status`, `email`, `phonenumber`)
 VALUES ('$destination','$from','$checkin','$checkout','$guest','$status','$email','$mobile')");
    print ("<script>window.alert(' Successfully Rented a car!!!')</script>");
    print ("<script>window.location.assign('index.php')</script>");
}
?>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/124.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>2 Days Tour</h2>
				   					<h1>Amazing Maldives Tour</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/117.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>10 Days Cruises</h2>
				   					<h1>From Harare to Dubai</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/img_bg_5.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluids">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>Explore our most travel agency</h2>
				   					<h1>Our Travel Agency</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/img_bg_4.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>Experience the</h2>
				   					<h1>Best Trip Ever</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>	   	
			  	</ul>
		  	</div>
		</aside>
		<div id="colorlib-reservation">
			<!-- <div class="container"> -->
				<div class="row">
					<div class="search-wrap">
						<div class="container">
							<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#flight"><i class="flaticon-plane"></i> Flight</a></li>
								<li><a data-toggle="tab" href="#hotel"><i class="flaticon-resort"></i> Hotel</a></li>
								<li><a data-toggle="tab" href="#car"><i class="flaticon-car"></i> Car Rent</a></li>
<!--								<li><a data-toggle="tab" href="#cruises"><i class="flaticon-boat"></i> Cruises</a></li>-->
							</ul>
						</div>
						<div class="tab-content">
                            <div class="booknow">
                                <h2>Book Now</h2>
                                <span>Best Price Online</span>
                            </div>
							<div id="flight" class="tab-pane fade in active">
								<form method="post" action="" enctype="multipart/form-data" class="colorlib-form">
				              	<div class="row">
				              	 <div class="col-md-2">
				              	 	<div class="form-group">
				                    <label for="date">From:</label>
				                    <div class="form-field">
                                        <select name="from" id="people" class="form-control">

                                            <option style="color: black">Departure Location</option>
<?php
$run_query = mysqli_query($con,"SELECT * FROM charges");
//                                                    if(mysqli_num_rows($run_query) > 0) {
while ($iny = mysqli_fetch_array($run_query)) {
$ds=$iny['destination'];
//                                                        foreach ($in as $iny) {
    ?>

    <option style="color: black" value="<?php echo $ds ;?>"><?php echo $ds ;?></option>
    <?php
}
    ?>
                                        </select>
<!--				                      <input type="text" required id="destination" name="from" class="form-control" placeholder="Departure Location">-->
				                    </div>
				                  </div>
				              	 </div>
                                    <div class="col-md-2">
				              	 	<div class="form-group">
				                    <label for="date">Where:</label>
				                    <div class="form-field">
				                      <input type="text" required id="destination" name="destination" class="form-control" placeholder="Destination Location">
				                    </div>
				                  </div>
				              	 </div>

				                <div class="col-md-2">
				                  <div class="form-group">
				                    <label for="date">Check-in:</label>
				                    <div class="form-field">
				                      <i class="icon icon-calendar2"></i>
				                      <input type="text" required id="date" name="checkin" class="form-control date" placeholder="Check-in date">
				                    </div>
				                  </div>
				                </div>
				                <div class="col-md-2">
				                  <div class="form-group">
				                    <label for="date">Check-out:</label>
				                    <div class="form-field">
				                      <i class="icon icon-calendar2"></i>
				                      <input type="text" required id="date" name="checkout" class="form-control date" placeholder="Check-out date">
<!--				                      <input type="hidden" id="date" name="booking" value="flight" class="form-control date" placeholder="Check-out date">-->
<!--				                      <input type="hidden" id="date" name="category" value="economy" class="form-control date" placeholder="Check-out date">-->

				                    </div>
				                  </div>
				                </div>
				                <div class="col-md-3">
				                  <div class="form-group">
				                    <label for="guests">Guest</label>
				                    <div class="form-field">
				                      <i class="icon icon-arrow-down3"></i>
				                      <select name="guest" id="people" class="form-control">
				                        <option style="color: black" value="1">1</option>
				                        <option style="color: black" value="2">2</option>
				                        <option style="color: black" value="3">3</option>
				                        <option style="color: black" value="4">4</option>
				                        <option style="color: black" value="5">5+</option>
				                      </select>
				                    </div>
				                  </div>
				                </div>

				              </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="guests">Categories</label>
                                                <div class="form-field">
                                                    <i class="icon icon-arrow-down3"></i>
                                                    <select name="category" id="category" class="form-control">
                                                        <option value="" style="color: black">Select Category</option>
                                                        <option style="color: black" value="Economy" >Economy</option>
                                                        <option style="color: black" value="Luxury">Luxury</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="date">Email:</label>
                                                <div class="form-field">
                                                    <input type="text" required id="destination" name="email" class="form-control" placeholder="enter your email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="date">Phone Number:</label>
                                                <div class="form-field">
                                                    <input type="text" required id="destination" name="mobile" class="form-control" placeholder="enter your phone number">
                                                </div>
                                            </div>
                                        </div>
                                    <div class="col-md-3">
                                        <input type="submit" name="flight" id="submit" value="Find Flights" class="btn btn-primary btn-block">
                                    </div>
                                    </div>
				            </form>
				         </div>
				         <div id="hotel" class="tab-pane fade">
						      <form method="post" action="" enctype="multipart/form-data" class="colorlib-form">
				              	<div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="date">Where:</label>
                                            <div class="form-field">
                                                <input type="text" required id="destination" name="destination" class="form-control" placeholder="Search Location">
                                            </div>
                                        </div>
                                    </div>
				                <div class="col-md-3">
				                  <div class="form-group">
				                    <label for="date">Check-in:</label>
				                    <div class="form-field">
				                      <i class="icon icon-calendar2"></i>
<!--                                        <input type="hidden" id="date" name="booking" value="hotel" class="form-control date" placeholder="Check-out date">-->

                                        <input type="text" required id="date" name="checkin" class="form-control date" placeholder="Check-in date">
				                    </div>
				                  </div>
				                </div>
				                <div class="col-md-3">
				                  <div class="form-group">
				                    <label for="date">Check-out:</label>
				                    <div class="form-field">
				                      <i class="icon icon-calendar2"></i>
				                      <input type="text" required id="date" name="checkout" class="form-control date" placeholder="Check-out date">
				                    </div>
				                  </div>
				                </div>
				                <div class="col-md-3">
				                  <div class="form-group">
				                    <label for="guests">Guest</label>
				                    <div class="form-field">
				                      <i class="icon icon-arrow-down3"></i>
				                      <select name="guest" id="people" class="form-control">
				                        <option style="color: black" value="1">1</option>
				                        <option style="color: black" value="2">2</option>
				                        <option style="color: black" value="3">3</option>
				                        <option style="color: black" value="4">4</option>
				                        <option style="color: black" value="5">5+</option>
				                      </select>
				                    </div>
				                  </div>
				                </div>
				              </div>
                                  <div class="row">
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="guests">Categories</label>
                                              <div class="form-field">
                                                  <i class="icon icon-arrow-down3"></i>
                                                  <select name="category" id="category" class="form-control">
                                                      <option value="" style="color: black">Select Category</option>
                                                      <option style="color: black" value="5" >5 star</option>
                                                      <option style="color: black" value="4">4 star</option>
                                                      <option style="color: black" value="3">3 star</option>
                                                      <option style="color: black" value="2">2 star</option>
                                                      <option style="color: black" value="1">1 star</option>
                                                  </select>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="date">Email:</label>
                                              <div class="form-field">
                                                  <input type="text" required id="destination" name="email" class="form-control" placeholder="enter your email">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="date">Phone Number:</label>
                                              <div class="form-field">
                                                  <input type="text" required id="destination" name="mobile" class="form-control" placeholder="enter your phone number">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <input type="submit" name="hotel" id="submit" value="Find Hotel" class="btn btn-primary btn-block">
                                      </div>
                                  </div>
				            </form>
						   </div>
						   <div id="car" class="tab-pane fade">
						   	<form method="post" action="" enctype="multipart/form-data" class="colorlib-form">
				              	<div class="row">
				              	 <div class="col-md-3">
				              	 	<div class="form-group">
				                    <label for="date">From:</label>
				                    <div class="form-field">
				                      <input type="text" required id="destination" name="departure" class="form-control" placeholder="Departure Location">
				                    </div>
				                  </div>
				              	 </div><div class="col-md-3">
				              	 	<div class="form-group">
				                    <label for="date">Where:</label>
				                    <div class="form-field">
				                      <input type="text" required id="destination" name="destination" class="form-control" placeholder="Destination Location">
				                    </div>
				                  </div>
				              	 </div>
				                <div class="col-md-3">
				                  <div class="form-group">
				                    <label for="date">Start Date:</label>
				                    <div class="form-field">
				                      <i class="icon icon-calendar2"></i>
				                      <input type="text" required id="date" name="checkin" class="form-control date" placeholder="Start date">
				                    </div>
				                  </div>
				                </div>
				                <div class="col-md-3">
				                  <div class="form-group">
				                    <label for="date">Return Date:</label>
				                    <div class="form-field">
				                      <i class="icon icon-calendar2"></i>
				                      <input type="text" required id="date" name="checkout" class="form-control date" placeholder="Return date">
				                    </div>
				                  </div>
				                </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="date">Email:</label>
                                            <div class="form-field">
                                                <input type="text" required id="destination" name="email" class="form-control" placeholder="enter your email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="date">Phone Number:</label>
                                            <div class="form-field">
                                                <input type="text" required id="destination" name="mobile" class="form-control" placeholder="enter your phone number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">

				                     <input type="submit" name="car" id="submit" value="Find Car" class="btn btn-primary btn-block">
                                    </div>
				              </div>
				            </form>
						   </div>
						   <div id="cruises" class="tab-pane fade">
						      <form method="post" class="colorlib-form">
				              	<div class="row">
				              	 <div class="col-md-4">
				              	 	<div class="form-group">
				                    <label for="date">Where:</label>
				                    <div class="form-field">
				                      <input type="text" required id="destination" class="form-control" placeholder="Search Location">
				                    </div>
				                  </div>
				              	 </div>
				                <div class="col-md-3">
				                  <div class="form-group">
				                    <label for="date">Start Date:</label>
				                    <div class="form-field">
				                      <i class="icon icon-calendar2"></i>
				                      <input type="text" required id="date" class="form-control date" placeholder="Check-in date">
				                    </div>
				                  </div>
				                </div>
				                <div class="col-md-3">
				                  <div class="form-group">
				                    <label for="guests">Categories</label>
				                    <div class="form-field">
				                      <i class="icon icon-arrow-down3"></i>
				                      <select name="category" id="category" class="form-control">
				                        <option value="#">Suite</option>
				                        <option value="#">Super Deluxe</option>
				                        <option value="#">Balcony</option>
				                        <option value="#">Economy</option>
				                        <option value="#">Luxury</option>
				                      </select>
				                    </div>
				                  </div>
				                </div>
				                <div class="col-md-2">
				                  <input type="submit" name="submit" id="submit" value="Find Cruises" class="btn btn-primary btn-block">
				                </div>
				              </div>
				            </form>
						   </div>
			         </div>
					</div>
				</div>
			</div>
		</div>


		<div style="margin-top: -100px" class="colorlib-tour colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<h2>Popular Destination</h2>
						<p>Plan your trip with us</p>
					</div>
				</div>
			</div>
			<div class="tour-wrap" style="margin-top: -80px">
				<a href="#" class="tour-entry animate-box">
					<div class="tour-img" style="background-image: url(images/tour-1.jpg);">
					</div>
					<span class="desc">
						<p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
						<h2>Business Trip</h2>
						<span class="city">Addis Ababa, Ethopia</span>
						<span class="price">$450</span>
					</span>
				</a>
				<a href="#" class="tour-entry animate-box">
					<div class="tour-img" style="background-image: url(images/tour-2.jpg);">
					</div>
					<span class="desc">
						<p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
						<h2>Family Tour in Thailand</h2>
						<span class="city">Athens, Thailand</span>
						<span class="price">$900</span>
					</span>
				</a>
				<a href="#" class="tour-entry animate-box">
					<div class="tour-img" style="background-image: url(images/tour-3.jpg);">
					</div>
					<span class="desc">
						<p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
						<h2>Family Tour in Abu Dhabi</h2>
						<span class="city">Abu Dhabi, United Emerates</span>
						<span class="price">$550</span>
					</span>
				</a>
				<a href="#" class="tour-entry animate-box">
					<div class="tour-img" style="background-image: url(images/tour-4.jpg);">
					</div>
					<span class="desc">
						<p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
						<h2>Family Tour in Greece</h2>
						<span class="city">Athens, Greece</span>
						<span class="price">$450</span>
					</span>
				</a>
				<a href="#" class="tour-entry animate-box">
					<div class="tour-img" style="background-image: url(images/tour-5.jpg);">
					</div>
					<span class="desc">
						<p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
						<h2>Family Tour in Capetown</h2>
						<span class="city">Capetown, South Africa</span>
						<span class="price">$350</span>
					</span>
				</a>
				<a href="#" class="tour-entry animate-box">
					<div class="tour-img" style="background-image: url(images/tour-6.jpg);">
					</div>
					<span class="desc">
						<p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
						<h2>Vacation Tour in Dubai</h2>
						<span class="city">Dubai, United Arab Emerates</span>
						<span class="price">$450</span>
					</span>
				</a>
				<a href="#" class="tour-entry animate-box">
					<div class="tour-img" style="background-image: url(images/tour-7.jpg);">
					</div>
					<span class="desc">
						<p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
						<h2>Family Tour in Victoria Falls</h2>
						<span class="city">Victoria Falls, Zimbabwe</span>
						<span class="price">$250</span>
					</span>
				</a>
				<a href="#" class="tour-entry animate-box">
					<div class="tour-img" style="background-image: url(images/tour-8.jpg);">
					</div>
					<span class="desc">
						<p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
						<h2>Business Meeting in Qatar</h2>
						<span class="city">Qatar, Qatar</span>
						<span class="price">$450</span>
					</span>
				</a>
			</div>
		</div>


		<div id="colorlib-intro" class="intro-img" style="background-image: url(images/cover-img-1.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6 animate-box">
						<div class="intro-desc">
							<div class="text-salebox">
								<div class="text-lefts">
									<div class="sale-box">
										<div class="sale-box-top">
											<h2 class="number">45</h2>
											<span class="sup-1">%</span>
											<span class="sup-2">Off</span>
										</div>
										<h2 class="text-sale">Sale</h2>
									</div>
								</div>
								<div class="text-rights">
									<h3 class="title">Just hurry up limited offer!</h3>
									<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
									<p><a href="#" class="btn btn-primary">Book Now</a> <a href="#" class="btn btn-primary btn-outline">Read more</a></p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 animate-box">
						<div class="video-wrap">
							<div class="video colorlib-video" style="background-image: url(images/img_bg_2.jpg);">
								<a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo"><i class="icon-video"></i></a>
								<div class="video-overlay"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="colorlib-hotel">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<h2>Recommended Hotels</h2>
						<p>We love to tell our successful far far away, behind the word mountains, far from the countries, there live the blind texts.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 animate-box">
						<div class="owl-carousel">
							<div class="item">
								<div class="hotel-entry">
									<a href="" class="hotel-img" style="background-image: url(images/hotel-1.jpg);">
										<p class="price"><span>$120</span><small> /night</small></p>
									</a>
									<div class="desc">
										<p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
										<h3><a href="#">Hotel Edison</a></h3>
										<span class="place">New York, USA</span>
										<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="hotel-entry">
									<a href="" class="hotel-img" style="background-image: url(images/3.jpg);">
										<p class="price"><span>$120</span><small> /night</small></p>
									</a>
									<div class="desc">
										<p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
										<h3><a href="#">Jemson Hotel</a></h3>
										<span class="place">Harare, Zimbabwe</span>
										<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="hotel-entry">
									<a href="hotels.html" class="hotel-img" style="background-image: url(images/9.jpg);">
										<p class="price"><span>$120</span><small> /night</small></p>
									</a>
									<div class="desc">
										<p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
										<h3><a href="#">Rain Bow Towers</a></h3>
										<span class="place">Harare, Zimbabwe</span>
										<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="hotel-entry">
									<a href="hotels.html" class="hotel-img" style="background-image: url(images/6.jpg);">
										<p class="price"><span>$120</span><small> /night</small></p>
									</a>
									<div class="desc">
										<p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
										<h3><a href="#">Cresta Lodge</a></h3>
										<span class="place">Harare, Zimbabwe</span>
										<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



	<?php

include "footer.php";
<?php
include "header.php";
?>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/cover-img-3.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>By Airport Travel</h2>
				   					<h1>Flight Charges</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div id="colorlib-services">
			<div class="container">

				<div class="row" style="margin-top: 100px">
                    <h3 class="text-center">Flight Charges</h3>
                        <table class="table table-bordered" >
                            <thead>
                            <tr>
                                <th>From</th>
                                <th>To</th>
                                <th>Price</th>
                                <th>Last Updated On</th>
                            </tr>
                            </thead><tbody>
<?php
$run_query = mysqli_query($con,"SELECT * FROM charges");
//                                                    if(mysqli_num_rows($run_query) > 0) {
while ($iny = mysqli_fetch_array($run_query)) {

//                                                        foreach ($in as $iny) {
    ?>
    <tr>
        <td class="review-summary-name"><?php echo $iny['departure'] ?></td>
        <td class="review-summary-name"><?php echo $iny['destination'] ?></td>
        <td class="review-summary-name">$<?php echo $iny['price'] ?></td>
        <td class="review-summary-name"><?php echo $iny['date'] ?></td>
    </tr>
    <?php
}
    ?>
    </tbody>
                    </table>
				</div>
			</div>
		</div>


<?php
include "footer.php";
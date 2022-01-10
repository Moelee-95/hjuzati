<div style="display:block;">
<?php

session_start();

//check if user is loged in
if (!isset($_SESSION['login_user'])) {
	header("Location:../logout.php");
	exit();
}

$user_id =  $_SESSION['login_user'];
$hotel_id = $_SESSION['hotel_id'];
// echo "$user_id <br>";
// echo "$hotel_id  <br>";
include('../../db/db_connect.php'); 

$user_info = "SELECT hHotelName,contact_name,hMainPhoneNumber FROM hima.hotels where hHotelID = '$hotel_id';";
$query = mysqli_query($conn, $user_info);
$result = mysqli_fetch_array($query);





 ?>

 </div>
<!DOCTYPE html>
<html>
<title>Stars Hotels | Finish</title>
<?php include('header.php'); ?>
<?php include('nav.php'); ?>

<div class="container">
	<div class="title">
		<legend class="big" style="font-weight: bold;">The Accommodation Agreement</legend>
	</div>
<!-- 
	<div class="alert alert-info hover_blue">
		<span>To get your hotel listed as soon as possible, please accept the terms and conditions of the commission percentage below.</span>
	</div>
-->
	<div class="contents" style="">
		<div class="alert" style="font-weight: bold;font-size: 11pt;text-align: center;">
			<h3>We will contact you on <strong style="color: #007eff"></strong>  in order to receive the agreement</h3>
		</div>
		

		<div class="row col-lg-10 col-md-10 col-sm-12 col-xs-"  >
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="display: inline-block;">
				<p>Between:</p>
				<p>
				Hima Hotels Co.</br>
				Iraq, Sulaymaniyah.</br>
				Office Number:</br>
				Address:</br>
				</p>
			</div>
			<div class="col-lg-1 col-md-1 col-sm-0 col-xs-0" style="border-left: 2px solid green;height: 230px;display: inline-block;position: absolute;"></div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="display: inline-block;" >
				<p>And You, The Accommodation</p>
					<p>Legal company name:</p>
					<span id="company_name_span">
						
					</span>
					<b>
						<?php
							echo $result['hHotelName'];

						 ?> 
					</b>

					</br></br>
					<p>Full name:</p>
					<span id="company_name_span">
					</span>
					<b> <?php echo $result['contact_name'];?> </b>

					</br></br>
					<p>Contact Number:</p>
					<span id="company_name_span">
					</span>
					<b> <?php echo $result['hMainPhoneNumber'];?> </b>

					</br></br>
					

					
			</div>
		</div>
		<a type="button" class="btn button" href="../../index.php?hotel_id=<?php echo $hotel_id ?>" style="width: 100%">Go to hotel managment</a>

		
		
	</div>
	

</div>












<script type="text/javascript" src="bootstrap/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<?php include('html/footer.html'); ?>
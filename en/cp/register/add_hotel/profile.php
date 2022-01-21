
<?php
session_start();
$user_id =  $_SESSION['login_user'];

//check if user is loged in
if (!isset($_SESSION['login_user'])) {
	header("Location:../logout.php");
	exit();
}

$hotel_id = $_SESSION['hotel_id'];
// echo "$user_id <br>";
// echo "$hotel_id  <br>";
include('../../../../db_connect.php'); 

if($conn->connect_error){
	echo "something is wrong with connection to the database, the error is:".$conn->connect_error;
	exit();
}
else {

	if(isset($_POST['hotel_information']) && isset($_SESSION['hotel_id'])){
		$name = htmlspecialchars($_POST['name']);
		$star_rating = htmlspecialchars($_POST['star_rating']);
		$contact_name = htmlspecialchars($_POST['contact_name']);
		$contact_email = htmlspecialchars($_POST['contact_email']);
		$contact_phone = htmlspecialchars($_POST['contact_phone']);
		$contact_phone_2 = htmlspecialchars($_POST['contact_phone_2']);
		$city = htmlspecialchars($_POST['city']);
		$address = htmlspecialchars($_POST['address']);
		$maps_location = htmlspecialchars($_POST['maps_location']);
		$zip_code = htmlspecialchars($_POST['zip_code']);

		echo $name."</br>";
		echo $star_rating ."</br>";
		echo $contact_name ."</br>";
		echo $contact_email ."</br>";
		echo $contact_phone ."</br>";
		echo $contact_phone_2 ."</br>";
		echo $city."</br>";
		echo $address."</br>";
		echo $maps_location ."</br>";
		echo $zip_code."</br>";
		


		$update_info = "UPDATE hotels SET hHotelName = '$name',hHotelRating = '$star_rating',contact_name= '$contact_name', hCompanyMailAddress= '$contact_email',hMainPhoneNumber= '$contact_phone',hNormalNumber = '$contact_phone_2',hCity= '$city',hAddress= '$address',hMapsLocation = '$maps_location',hZipCode= '$zip_code'  WHERE hHotelID = '$hotel_id' and hUserID = '$user_id'";

		//$result = ;
		//$fetchit = mysqli_fetch_row($result);

		if (mysqli_query($conn, $update_info)) {
			 //header('location:facilities.php');
			header('location:photos.php');
		}
		else {
			 echo "Not updated, Please Try Again</br>";
			// echo $hotel_id."</br>";
			// echo $user_id."</br>";
	}

}
}

$get_data = "SELECT * FROM hotels WHERE hHotelID = '$hotel_id' and hUserID = '$user_id'";
$query = mysqli_query($conn, $get_data);
$row = mysqli_fetch_array($query);
$db_star = $row['hHotelRating'];
$db_city = $row['hCity'];
?>




<!DOCTYPE html>
<html>
<?php include('header.php'); ?>
<?php include('nav.php'); ?>
	
	<?php  ?>

<div class="container">
	<form method="post" action="profile.php" name="Hotel Information">
	<input type="hidden" name="hotel_information" value="hotel_information" />
	<input type="hidden" name="hotel_id" disabled="disabled" value="Hotel ID:<?php echo $hotel_id ?>"><br>
	<div class="title">
		<legend class="big" ><b>You're doing great. Keep it up!</b></legend>
		<legend class="small">Start by telling us your property's name, contact details, and address.</legend>
	</div>
	<div class="contents">
		<div class="row">
			<div class="column d-inline col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<legend class="big">What's the name of your property?</legend>
				<input min="5" max="30" class="text" type="text" name="name" placeholder="Hotel Name" value="<?php echo($row['hHotelName']) ?>" >
				<legend class="note col-lg-6 col-md-6 col-sm-12 col-xs-12" style="width: 100%">Guests will see this name when they search for a place to stay.</legend>
			</div>
			<div class="column d-inline col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<legend class="small">Star rating</legend>
				<select class="text phone" name="star_rating">
					 <?php if (!empty($db_star)) {
				 		echo "<option value='$db_star' selected hidden >$db_star</option>";
						 } ?>
					 <option value="N/A">N/A</option>
					 <option value="1 ✯" >1 ✯</option>
					 <option value="2 ✯✯">2 ✯✯</option>
					 <option value="3 ✯✯✯">3 ✯✯✯</option>
					 <option value="4 ✯✯✯✯">4 ✯✯✯✯</option>
					 <option value="5 ✯✯✯✯✯">5 ✯✯✯✯✯</option>
				</select>
			</div>
		</div>
	</div>

	<div class="contents">
		<legend class="big">What are the contact details for this property?</legend>
		<div class="row">
			<div class="column d-inline col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<legend class="small">Contact name</legend>
				<input min="5" max="30" class="text" type="text" name="contact_name" placeholder="Contact Name" value="<?php echo($row['contact_name']) ?>"> <br>
			</div>
			<div class="column d-inline col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<legend class="small">Contact Email</legend>
				<input min="5" max="80" class="text" type="email" name="contact_email" placeholder="Email Address" value="<?php echo($row['hCompanyMailAddress']) ?>"> <br>
			</div>
		</div>
		<hr>
		<legend class="big">Contact number (so we can assist with your registration when needed)</legend>
		<hr>
		<div class="row">
			<div class="column d-inline col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<legend class="small">Phone number</legend>
				<input size="20" class="text phone" type="tel" name="contact_phone" placeholder="+964770XXXXXXX" value="<?php echo($row['hMainPhoneNumber']) ?>"> 
			</div>
			<div class="column d-inline col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<legend class="samll">Normal number (optional)</legend>
				<input size="20" class="text phone" type="tel"  name="contact_phone_2" placeholder="+964770XXXXXXX" value="<?php echo($row['hNormalNumber']) ?>">	
			</div>
		</div>
	</div>
		
	<div class="contents">
		<legend class="big">Where's your property located?</legend>
		<div class="row">
			<div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<legend class="small">Street address</legend>
				<input class="text" type="text" name="address" placeholder="Address" value="<?php echo($row['hAddress']) ?>"> <br>
			</div>
			<div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<legend class="small">Country/Region</legend>
				<input class="text" type="text" name="country" placeholder="Country" value="Iraq" disabled="disabled" value="<?php echo 'Iraq'//($row['country']) ?>"> <br>
			</div>
		</div>
		<div class="row">
			<div class="column d-inline col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<legend class="small">City</legend>
						<select id="city" class="text" name="city" onchange="setZip()">
				 	<?php if (!empty($db_city)) {
			 		echo "<option value='$db_city' selected hidden >$db_city</option>";
					 } ?>
							 <option value="Sulaymaniyah" >Sulaymaniyah</option>
							 <option value="Erbil">Erbil</option>
							 <option value="Kirkuk">Kirkuk</option>
							 <option value="Duhok">Duhok</option>
						</select>
			</div>
			<div class="column d-inline col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<legend class="small">Zip code</legend>
				<input id="zipCode" class="text" type="text" name="zip_code" placeholder="Zip Code" value="<?php echo($row['hZipCode']) ?>">
			</div>
		</div>
		<div class="row">
			<legend class="samll">Your Location ON Map</legend>
				
				<input id="location_link" class="text" type="text" name="maps_location" placeholder="Location Link On google Maps" value="<?php echo($row['hMapsLocation']) ?>">
				<button type="button" name="detect" class="btn btn-default btn-lg" onclick="getLocation()">Detect</button> <br>
		</div>
			
				
	<div class="">
		<button type="submit" name="submit" class="button">Save and Continue</button>
		
	</div>
</div>
</form>


<script type="text/javascript">
	var city =document.getElementById('city');
	var zip_code =document.getElementById('zipCode');
	setZip();
	function setZip(){
		//alert('Works');
		
		if (city.value == 'Sulaymaniyah') {
			zip_code.value = '46001';
		}
		else if (city.value == 'Erbil') {
			zip_code.value ='44000';
		}
		else if (city.value == 'Kirkuk') {
			zip_code.value ='36001';
		}
		else if (city.value =='Duhok') {
			zip_code.value='42001';
		}
	}
	var x = document.getElementById("location_link");
	function getLocation() {
	  if (navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(showPosition);
	  } else { 
	    x.value = "Geolocation is not supported by this browser.";
	  }
	}

	function showPosition(position) {
	  x.value = "https://www.google.com/maps/@" + position.coords.latitude + "," + position.coords.longitude + ",20z";
	}
		
</script>

<br/>
<br/>
<br/>
<br/>




<?php 
mysqli_close($conn) ?>
<?php include('html/footer.html'); ?>
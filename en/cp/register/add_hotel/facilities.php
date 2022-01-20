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


//if (isset($_POST['submit'])) {}

if($conn->connect_error){
	echo "something is wrong with connection to the database, the error is:".$conn->connect_error;
	exit();
}
	


//Get options, values from the database
$get_data = "SELECT * FROM facilitiesoptions";
$query = mysqli_query($conn, $get_data);
$fetch = mysqli_fetch_All($query,MYSQLI_ASSOC);
//print_r($fetch);
// echo "</br>---------------------------------------------------------------";
function get_options($f_option_id){
	include('../../db/db_connect.php'); 
	$f_sql = "SELECT * FROM facilitesvalues WHERE fFacilitesOptionsID = '$f_option_id'";
	$f_query = mysqli_query($conn, $f_sql);
	$f_fetch = mysqli_fetch_all($f_query, MYSQLI_ASSOC);
	return $f_fetch;
}

//print_r(get_options("5"));

?>



<!DOCTYPE html>
<html>
<head>
	<!-- These CDN links are for multi Select -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<!-- These CDN links are for multi Select -->
</head>
<?php include('header.php'); ?>
<?php include('nav.php'); ?>
<br>
<br>

<div class="container">
	<form method="post" action="facilities.php">
	<div class="title">
		<legend class="big"><b>Facilities & Services<b></legend>
		<legend class="small">Now let us know some general details about your property like facilities available, internet, parking, and the languages you speak.</legend>
	</div>
	<div class="contents">

		<legend class="big">
			<?php //Getting Service name and ID, Internt is the first index 0 in the database
		 $service = $fetch['0']['fFaciliteNameEn'];
		 $serviceId = $fetch['0']['fFaciliteID'];
		 echo $service 
		 ?>
		 </legend>
		<legend class="note">Internet access is important for many travelers. Free Wi-Fi is a huge selling point, too!</legend>
		<legend class="small">Is internet available to guests?</legend>
				<select class="text" name="internet">
				 <?php //Get the values of the specified service and save them to an array
				 
				   $values = get_options($serviceId);
				  	foreach ($values as $key => $value){
				  		echo "<option value='".$value['fID']."'>".$value['fOptionsEn']."</option>";
				  		//echo $value;
				  	}
	   			 ?>
		</select><br/>
		</div>

		<div class="contents">

			<legend class="big">
			<?php //Getting Service name and ID, Parking is the first index 1 in the database
				 $service = $fetch['1']['fFaciliteNameEn'];
				 $serviceId = $fetch['1']['fFaciliteID'];
				 echo $service 
			?>
		 </legend>
			<legend class="note">This information is especially important for those traveling to your property by car.</legend>
			<legend class="small">Is parking available to guests?</legend>
					<select class="text" name="internet">
				 <?php //Get the values of the specified service and save them to an array
				 
				   $values = get_options($serviceId);
				  	foreach ($values as $key => $value){
				  		echo "<option value='".$value['fID']."'>".$value['fOptionsEn']."</option>";
				  		//echo $value;
				  	}
	   			 ?>
		</select><br/>
		</div>
		<div class="contents">

			<legend class="big">
				<?php //Getting Service name and ID, Breakfast is the first index 2 in the database
					 $service = $fetch['2']['fFaciliteNameEn'];
					 $serviceId = $fetch['2']['fFaciliteID'];
					 echo $service 
				?>
			 </legend>
			<legend class="small">Is breakfast available to guests?</legend>
			<select class="text" name="breakfast_included" >
			 <?php //Get the values of the specified service and save them to an array
				 
				   $values = get_options($serviceId);
				  	foreach ($values as $key => $value){
				  		echo "<option value='".$value['fID']."'>".$value['fOptionsEn']."</option>";
				  	}
	   			 ?>
		</select>
		</div>

		<div class="contents">
		<legend class="big">
				<?php //Getting Service name and ID, Languages is index3 in the database
					 $service = $fetch['3']['fFaciliteNameEn'];
					 $serviceId = $fetch['3']['fFaciliteID'];
					 echo $service 
				?>
			 </legend>
		<legend class="note">What languages do you or your staff speak?</legend>
		<select class="selectpicker" multiple data-live-search="true" name="lang_spoken_by_staff">
				<?php //Get the values of the specified service and save them to an array
				 
				   $values = get_options($serviceId);
				  	foreach ($values as $key => $value){
				  		echo "<option value='".$value['fID']."'>".$value['fOptionsEn']."</option>";
				  	}
	   			 ?>
           
        </select>

		</div>



	<div class="contents">
		<legend class="big">Facilities That Are Popular With Guests</legend>
				<legend class="note">Guests look for these facilities the most when they’re searching for properties.</legend>
		<div class="div_divcontents">
			
			<div class="divcontents ">
				<?php
				//Bring OptinsID, Option English, Values ID, Values English
					$sql = "SELECT fo.fFaciliteID ,fo.fFaciliteNameEn FROM facilitiesoptions as fo  where fo.fFaciliteID > 4";

					$query = mysqli_query($conn,$sql);
					$fetch = mysqli_fetch_all($query,MYSQLI_ASSOC);
					//print_r($fetch);
					foreach ($fetch as $key => $value) {
						#print_r($value['0']."<br>");?>
				<label class="control control-checkbox"><?php echo $value['fFaciliteNameEn'] ?>
            	<input type="checkbox" name="<?php echo $value['fOptionsEn'] ?>" value="yes"
            	<?php
//             					######## CHECK THE BOXES  ########


            	?>
            	  />
     		   <div class="control_indicator"></div>
  				</label><br/>
					

				<?php } ?>
   				
			</div>

		</div>
	</div>

	<div>
		<button type="submit" name="submit" class="button">Continue</button>
		
	</div>
</div>

	




<?php include('html/footer.html'); ?>

<?php ?>
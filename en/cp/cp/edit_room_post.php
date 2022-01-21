<?php

session_start();

$user_id = $_SESSION['login_user'];
$hotel_id = $_SESSION['hotel_id'];



//When the user enters to the link directly without going through the user cp
if (!isset($_SESSION['hotel_id'])) {
	header("Location:../register/userprofile/");
	exit();
}

		

if (empty($hotel_id)) {
	echo "Dear User You are not logged in<br> Click <a href='../index.php'>Here</a> to login to your account!	";
	exit();
}
else {
	include('../../../db_connect.php');
	
			


		$result = null;
		$room_type = $_POST['room_type'];//will not be used
		$room_name = $_POST['room_name'];//Will use instead of both room type and room name
		$cusrom_name = $_POST['cusrom_name'];
		$smoking_policy = $_POST['smoking_policy'];
		$num_bed_rooms = $_POST['num_bed_rooms'];
		$num_living_rooms = $_POST['num_living_rooms'];
		$num_bathrooms = $_POST['num_bathrooms'];
		$no_of_rooms = $_POST['no_of_rooms'];
		$beds_kinds = $_POST['beds_kinds'];
		$bed_num = $_POST['bed_num'];
		$guest_num = $_POST['guest_num'];
		$room_size = $_POST['room_size'];
		$price_guest_num = $_POST['price_guest_num'];
		$offer_lower_if_fewer_guest_num = $_POST['offer_lower_if_fewer_guest_num'];
		$discount_1_person = $_POST['discount_1_person'];
		//Represents the Room id to edit
		$room_id = $_POST['room_id'];

		$sql = "UPDATE rooms SET rRoomNameID = '$room_name', rCustomName = '$cusrom_name', rSmokingPolicy ='$smoking_policy',num_bed_rooms = '$num_bed_rooms',num_living_rooms = '$num_living_rooms',num_bathrooms = '$num_bathrooms',rRoomsNumbers = '$no_of_rooms',beds_kinds = '$beds_kinds',bed_num = '$bed_num',rMaxPas = '$guest_num',rRoomSize = '$room_size',rLowestPrice = '$price_guest_num',rOfferLower = '$offer_lower_if_fewer_guest_num',rDisscount = '$discount_1_person' WHERE rHotelID = '$hotel_id' and rRoomID = '$room_id'";
		 

 		$quer = mysqli_query($conn,$sql);
 		if ($quer) {
 			
 			$result = 1;
 		}
 		else
 		{
 			//return an error to the ajax request
 			
 			$result = 0;
 		}
 		echo $result;
	}

	
	/*// Backup when updating room info
	$edit_info = "UPDATE layout_pricing  SET room_type = '$room_type',room_name='$room_name',cusrom_name='$cusrom_name',smoking_policy='$smoking_policy',num_bed_rooms ='$num_bed_rooms',num_living_rooms = '$num_living_rooms',num_bathrooms ='$num_bathrooms',no_of_rooms='$no_of_rooms',beds_kinds='$beds_kinds',bed_num='$bed_num', guest_num = '$guest_num',room_size='$room_size',price_guest_num='$price_guest_num',offer_lower_if_fewer_guest_num='$offer_lower_if_fewer_guest_num',discount_1_person='$discount_1_person', pictures_paths = '$pictures_paths' WHERE hotel_id = '$hotel_id' AND room_id = '$room_id'";
*/
	
	?>
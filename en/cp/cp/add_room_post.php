<?php

session_start();

require "../../../classes/removeFiles.php";
$backPath = RemoveFiles::backPath();

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
		$room_size = "0";// Default empty size
		$room_size = $_POST['room_size'];
		$price_guest_num = $_POST['price_guest_num'];
		$offer_lower_if_fewer_guest_num = $_POST['offer_lower_if_fewer_guest_num'];
		
		$discount_1_person = $_POST['discount_1_person'];


		$sql = "INSERT INTO rooms(rHotelID,rRoomStatusID,rRoomNameID,rCustomName,rSmokingPolicy,num_bed_rooms,num_living_rooms,num_bathrooms,
rRoomsNumbers,beds_kinds,bed_num,rMaxPas,rRoomSize,rLowestPrice,rOfferLower,rDisscount) 
		VALUES ('$hotel_id','2','$room_name','$cusrom_name','$smoking_policy',
        '$num_bed_rooms','$num_living_rooms','$num_bathrooms','$no_of_rooms','$beds_kinds',
        '$bed_num','$guest_num','$room_size','$price_guest_num','$offer_lower_if_fewer_guest_num','$discount_1_person');";
		 

 		$quer = mysqli_query($conn,$sql);
 		if ($quer) {
 			$last_id = "SELECT LAST_INSERT_ID();";
 			$last_query = mysqli_query($conn,$last_id);
 			if ($last_query) {
	 			//fetch the query and store the room id inside a variaable
	 			$fetch = mysqli_fetch_row($last_query);
	 			$roomID = $fetch['0'];
	 			//create folder for this room id if it's not exsitst 
	 			if (!file_exists("$backPath/users/$user_id/hotels/$hotel_id/rooms/$roomID")) {
				    mkdir("$backPath/users/$user_id/hotels/$hotel_id/rooms/$roomID", 0777, true);
				}
 			}
 			
 			$result = 1;
 		}
 		else
 		{
 			//return an error to the ajax request
 			$result = $conn -> error;
 		}
 		echo $result;
	}

	


	?>
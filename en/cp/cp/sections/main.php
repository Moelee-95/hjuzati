<?php

require "../../../classes/db.php";
require "../../../classes/booking.php";
require "../../../classes/room.php";
require "../../../classes/reserveRoom.php";
require "../../../classes/removeFiles.php";
require '../../../classes/hotel.php';
require '../../../classes/user.php';

session_start();

$login_user = $_SESSION['login_user'];

//To prevent loging out when browsing the cp
if (isset($_GET['hotel_id'])) {
	$hotel_id = $_GET['hotel_id'];
	$hotels = (json_decode(unserialize($_COOKIE['user'])))->hotels;
	foreach ($hotels as $key => $hotel) {
		if ($hotel->id = $hotel_id) {
			$manage_hotel = $hotel;
		}
	}
	// $_SESSION['manage_hotel'] = serialize($manage_hotel);
	print_r($manage_hotel);
	$_SESSION['hotel_id'] = $hotel_id;
}



//When the user enters to the link directly without going through the user cp
if (!isset($_SESSION['hotel_id'])) {
	header("Location:../register/userprofile/");
	exit();
}

else {
	include('../../../db_connect.php');
	$get_data = "SELECT * FROM hotels WHERE hHotelID = '$hotel_id'";
	$query = mysqli_query($conn, $get_data);
	$row = mysqli_fetch_array($query);
	$hotel_name = $row['hHotelName'];
	$name = $_SESSION['userName'];
}




?>
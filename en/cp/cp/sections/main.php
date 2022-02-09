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
	$user = unserialize($_SESSION['user']);
    $hotels = $user->hotels;
	foreach ($hotels as $key => $hotel) {
		if ($hotel->id = $hotel_id) {
			$manage_hotel = $hotel;
		}
	}
	// $_SESSION['manage_hotel'] = serialize($manage_hotel);
	$_SESSION['hotel_id'] = $hotel_id;
}

//When the user enters to the link directly without going through the user cp
if (!isset($_SESSION['hotel_id'])) {
	header("Location:../register/userprofile/");
	exit();
}

else {
	include('../../../db_connect.php');
	$hotel_id = $_SESSION['hotel_id'];
	$user = unserialize($_SESSION['user']);
    $hotels = $user->hotels;
	foreach ($hotels as $key => $hotel) {
		if ($hotel->id = $hotel_id) {
			$manage_hotel = $hotel;
		}
	}
	$hotel_name = $manage_hotel->name;
	$name = $user->fullName;
}




?>
<?php

require "../../../classes/db.php";
require "../../../classes/booking.php";
require "../../../classes/room.php";
require "../../../classes/reserveRoom.php";
require "../../../classes/removeFiles.php";
require '../../../classes/hotel.php';
require '../../../classes/user.php';
include('../../../db_connect.php');

session_start();

$login_user = $_SESSION['login_user'];

// checking 
if (isset($_GET['hotel_id'])) {
	$user = unserialize($_SESSION['user']);
	$user->generateHotels();
	// assign hotel to session only when it's one of the user's hotels
	foreach ($user->hotels as $key => $hotel) {
		if ($hotel->id == $_GET['hotel_id']) {
			$_SESSION['hotel_id'] = $_GET['hotel_id'];
			break;
		}
	}
}

// session is already set
if (isset($_SESSION['hotel_id']) && !empty($_SESSION['hotel_id'])) {
	$hotel_id = $_SESSION['hotel_id'];
	$user = unserialize($_SESSION['user']);
	$user->generateHotels();
	foreach ($user->hotels as $key => $hotel) {
		if ($hotel->id == $hotel_id) {
			$manageHotel = $hotel;
			break;
		}
	}
	$hotel_name = $manageHotel->name;
	$name = $user->fullName;
}

else {
	header("Location:../register/userprofile/");
	exit();
}




?>
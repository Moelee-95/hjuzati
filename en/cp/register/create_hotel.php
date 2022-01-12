<?php

session_start();

//Connect to the database
include('../db/db_connect.php'); 
require "../../../classes/removeFiles.php";
$backPath = RemoveFiles::backPath();

//Check if the user loged in to the system
if (!isset($_SESSION['login_user'])) {
	header('location:userprofile');
	exit();
}

//Get the user id from the global variable seassion
$user_id = $_SESSION['login_user'];

//Creating hotel row in the database
$sql = "INSERT INTO `hima`.`hotels` (`hUserID`) VALUES ('$user_id')";
$query = mysqli_query($conn, $sql);

//if new record have been added to the hotels table
if ($query) {
	//Get the hotel id and assign it to the global variable to use it when update the hotel info in the next page
	$get_hotel_id = "SELECT * FROM `hima`.hotels ORDER BY hHotelID DESC LIMIT 1";
	$hotel_id_query = mysqli_query($conn, $get_hotel_id);
	$fetch = mysqli_fetch_row($hotel_id_query);
	$hotel_id = $fetch[0];
	$_SESSION['hotel_id'] = $hotel_id;
	// Create folder for the hotel
	mkdir("$backPath/users/$user_id/hotels/$hotel_id",0777,true);
	// Create folder for the hotel photos
	mkdir("$backPath/users/$user_id/hotels/$hotel_id/photos",0777,true);
	// Create folder for the rooms
	mkdir("$backPath/users/$user_id/hotels/$hotel_id/rooms",0777,true);
	// Create folder for temperory photos inside rooms folder
	mkdir("$backPath/users/$user_id/hotels/$hotel_id/rooms/tmp_rooms",0777,true);

	header('location:add_hotel/profile.php');

}




 ?>
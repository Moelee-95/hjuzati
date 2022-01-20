<?php

session_start();

//Connect to the database
include('../db/db_connect.php'); 

//Check if the user loged in to the system
if (!isset($_SESSION['login_user'])) {
	header('location:userprofile');
	exit();
}

//Get the user id from the global variable seassion
$user_id = $_SESSION['login_user'];

//Check for the the hotel id to remove
if (isset($_GET['hotel_id'])) {
	$hotel_id = $_GET['hotel_id'];
	echo "Hotel ID is $hotel_id <br>";
	echo "User ID is $user_id <br>";

	//Removing the row from hotel table
	$sql = "DELETE FROM `hotels` WHERE `hHotelID` = '$hotel_id'";
	$query = mysqli_query($conn, $sql);
	//if the record is removed
	if ($query) {
		// echo "Hotel Removed";
		header('location:userprofile/index.php');
	}
	else {
		// echo "Hotel isn't Removed";
		header('location:userprofile/index.php?message=Coudnot Remove the hotel');
		exit();

	}

}
else{
	echo "wrong request!";
}



//Creating hotel row in the database






 ?>
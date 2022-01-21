<?php
// setting the main photo for the hotel
session_start();
//When the user enters to the link directly without going through the user cp
if (!isset($_SESSION['hotel_id'])) {
	header("Location:../register/userprofile/");
	exit();
}

include('../../../db_connect.php');

$hotel_id = $_SESSION['hotel_id'];
if (isset($_GET['photoID'])) {
	$photoID = $_GET['photoID'];
	$sql = "UPDATE hotels SET hMainPhotoID = '$photoID' WHERE hHotelID = '$hotel_id'";
	$qur = mysqli_query($conn, $sql);
	// When the value saved into the databse
	if ($qur) {
		echo "have been set";
		header("location:hotel_photos.php");
	}

}
else{
	echo "Empty or Wrong photo ID";
	header("location:hotel_photos.php");

}
// in all cases will return back to the previous page





?>
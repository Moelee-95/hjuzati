<?php

session_start();
$login_user = $_SESSION['login_user'];

//To prevent loging out when browsing the cp
if (isset($_GET['hotel_id'])) {
	$hotel_id = $_GET['hotel_id'];
	$_SESSION['hotel_id'] = $hotel_id;


}
$hotel_id = $_SESSION['hotel_id'];

//When the user enters to the link directly without going through the user cp
if (!isset($_SESSION['hotel_id'])) {
	header("Location:../register/userprofile/");
	exit();
}
	include('../../../../db_connect.php');
	$room_id = $_POST['room_id'];
	
	$sql = "SELECT * FROM rooms WHERE rHotelID = '$hotel_id' AND rRoomID ='$room_id' ";
	$fetch = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	$row = mysqli_fetch_array($fetch);

	echo $row["rMaxPas"];




?>
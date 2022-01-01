<?php

session_start();


//Check if the user loged in to the system
if (!isset($_SESSION['login_user'])) {
	header('location:userprofile');
	exit();
}

//Get the user id from the global variable seassion
$user_id = $_SESSION['login_user'];

if (isset($_GET['hotel_id'])) {
	$_SESSION['hotel_id'] = $_GET['hotel_id'];
	header('location:add_hotel/profile.php');
}




 ?>
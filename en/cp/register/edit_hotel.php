<?php

session_start();


//Check if the user loged in to the system
if (isset($_COOKIE['login_user']) and isset($_COOKIE['userName']) and isset($_COOKIE['userPassword'])) {
	if (isset($_SESSION['login_user'])) {
	  $user_id =  $_SESSION['login_user'];
	}
	else{
		$_SESSION['login_user'] = $_COOKIE['login_user'];
		$_SESSION['userName'] = $_COOKIE['userName'];
		$user_id =  $_SESSION['login_user'];
	}
  }
  elseif (!isset($_COOKIE['login_user']) and !isset($_SESSION['login_user'])) {
	header("Location:../logout.php");
	exit();
  }

if (isset($_GET['hotel_id'])) {
	$_SESSION['hotel_id'] = $_GET['hotel_id'];
	header('location:add_hotel/profile.php');
}




 ?>
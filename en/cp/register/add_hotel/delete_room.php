<?php
session_start();
$hotel_id =$_SESSION['login_user'];
if (empty($hotel_id)) {
	header('location:../index.php');
}
else {
	include('../../../../db_connect.php'); 
	//check if user name is available in the users table
		include("user_check.php");
		
	if ($_GET['room_id']) {
		$del_room = $_GET['room_id'];
		$del_row = "DELETE FROM layout_pricing WHERE hotel_id = '$hotel_id' AND room_id = '$del_room'";
		$query = mysqli_query($conn, $del_row);

		if (!$query) {
			echo "Not Deleted";
		}
			elseif ($query) {
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit;
	}
	}
	


}
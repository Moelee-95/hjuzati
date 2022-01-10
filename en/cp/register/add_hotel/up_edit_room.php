<?php
session_start();
$hotel_id =$_SESSION['login_user'];
if (empty($hotel_id)) {
	header('location:../index.php');
}
else {
	include('db_connect.php');

		//check if user name is available in the users table
		include("user_check.php");
		
	if (isset($_POST['submit'])) {
		$room_id = $_POST['room_id'];
		$room_type=$_POST['room_type'];
		$room_name=$_POST['room_name'];
		$cusrom_name=$_POST['cusrom_name'];
		$smoking_policy=$_POST['smoking_policy'];
		$no_of_rooms=$_POST['no_of_rooms'];
		
		$beds_kinds=$_POST['beds_kinds'];
		
		$bed_num=$_POST['bed_num'];
		$guest_num=$_POST['guest_num'];
		$room_size=$_POST['room_size'];
		
		$price_guest_num=$_POST['price_guest_num'];
		$offer_lower_if_fewer_guest_num=$_POST['offer_lower_if_fewer_guest_num'];
		$discount_1_person =$_POST['discount_1_person'];
		
	
	$edit_info = "UPDATE layout_pricing  SET room_type = '$room_type',room_name='$room_name',cusrom_name='$cusrom_name',smoking_policy='$smoking_policy',no_of_rooms='$no_of_rooms',beds_kinds='$beds_kinds',bed_num='$bed_num', guest_num = '$guest_num',room_size='$room_size',price_guest_num='$price_guest_num',offer_lower_if_fewer_guest_num='$offer_lower_if_fewer_guest_num',discount_1_person='$discount_1_person' WHERE hotel_id = '$hotel_id' AND room_id = '$room_id'";

	$query = mysqli_query($conn, $edit_info);

	if ($query) {
		$_SESSION['message'] = "$cusrom_name Have been updated Succesfully!";
		header('location:layout_pricing.php');
		
	}
	else{
		echo "Not Updated";
	}


		}
		else{
			echo "Nothing is posted from your side";
		}
}
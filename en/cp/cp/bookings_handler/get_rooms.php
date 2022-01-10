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
	//incomming variables hotel_id,room_id,room_name,date,iName,value from jquery script in calender.php
	include('../../db/db_connect.php');

// get values from calender.php

	$hotel_id = $_POST['hotel_id'];
	$room_id = $_POST['room_id'];
	//$room_name = $_POST['room_name'];
	$date = $_POST['date'];
	$iName = $_POST['iName'];

	if ($iName == "rNum") {
		$getValue = "rARoomsNum";
	}
	//Figure that out
	elseif ($iName == "sRate") {
		$getValue = "rRate";
	}
	elseif ($iName == "bRate") {
		$getValue = "rBfast_price";
	}
	elseif ($iName == "opncls") {
		$getValue = "rOpenClose";
	}
	else {
		echo "Undifined Input it's Not sRate Or rNum";
	}

	$sql = "
	SELECT $getValue FROM rates WHERE rRoomsID = '$room_id' AND rDate = '$date' ";
	
	$fetch = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	$row = mysqli_fetch_array($fetch);

	echo $row[0];
 


?>
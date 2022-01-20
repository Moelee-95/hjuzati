<?php 

include('../../db/db_connect.php');

if ($_GET['pic_id']) {
	#Get the picture id
	$remove = $_GET['pic_id'];
	$url = $_GET['url'];
	# Sql code ready for execution
	$sql = "DELETE FROM `hotelsphotos` WHERE (`hpID` = '$remove')";

	# Execute the sql code
	if (mysqli_query($conn, $sql) && unlink($url)) {
	 header('Location: photos.php');
	} else {
	 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	 sleep(1);
	 header('Location: photos.php');
	}

}


?>
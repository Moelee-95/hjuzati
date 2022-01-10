<?php

session_start();
$user_id = $_SESSION['login_user'];
$hotel_id = $_SESSION['hotel_id'];

if (empty($user_id)) {
	if (empty($hotel_id)) {
		header('location:../register/userprofile')
	}
	echo "Dear User You are not logged in<br> Click <a href='../index.php'>Here</a> to login to your account!	";
	exit();
}
else {

	if (isset($_FILES['attachments'])) {
		$msg ="";
		$targetFile = "../users/$user_id/hotels/$hotel_id/rooms/tmp_rooms/".basename($_FILES['attachments']['name'][0]);
		$fileName = basename($_FILES['attachments']['name'][0]);
		if (file_exists($targetFile))
			$msg = array('status' => 0, "msg" => "File is aleray exists!" );
		
		else if (move_uploaded_file($_FILES['attachments']['tmp_name'][0], $targetFile))
			$msg = array('status' => 1, "msg" => "File Has been uploaded", "path" => $targetFile, "fileName" => $fileName );

		exit(json_encode($msg));
	}
}

?>
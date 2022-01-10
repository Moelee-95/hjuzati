<?php
 session_start();
  $hotel_id = $_SESSION['login_user'];
 if ($hotel_id != "") {
 	$rm_path = $_POST['path'];
	$state = null;
	
	if (unlink($rm_path)) {
		$state = 1;
	}
	else{
		$state = 0;
	}

	echo $state;
 }




?>
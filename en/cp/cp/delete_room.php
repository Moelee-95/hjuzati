<?php
session_start();
$user_id = $_SESSION['login_user'];
$hotel_id = $_SESSION['hotel_id'];

if (empty($user_id)) {
	//header('location:../index.php');
	echo "You are not logged in, try to login first";
}
else {
	include('../db/db_connect.php');
	//check if user name is available in the users table
	if(isset($_GET['room_id'])){
		$room_id = $_GET['room_id'];
	}
	else {
		echo "Wrong Input, Please try again with hima hotels dashboard!";
		exit();
	}
	if ($room_id) {
		$del_room = $room_id;
		$del_row = "call hima.removeroom('$hotel_id', '$room_id')";
		$query = mysqli_query($conn, $del_row);

		
		// To echo 0 back to the sweet alert when the query don't work
		if (!$query) {
			echo "0,".$room_id;
		}
		//when the query is working and the room removed
			elseif ($query) {
			echo "1,".$room_id;
			//Remove room directory with it's contents
			$dirPath  = "../users/$user_id/hotels/$hotel_id/rooms/".$room_id;
			if (! is_dir($dirPath)) {
	        throw new InvalidArgumentException("$dirPath must be a directory");
		    }
		    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
		        $dirPath .= '/';
		    }
		    $files = glob($dirPath . '*', GLOB_MARK);
		    foreach ($files as $file) {
		        if (is_dir($file)) {
		            self::deleteDir($file);
		        } else {
		            unlink($file);
		        }
		    }
		    rmdir($dirPath);
		    //End of removing the room directory
			exit;
			
		}
	}
	


}
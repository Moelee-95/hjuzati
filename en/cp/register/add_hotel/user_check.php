<?php 
//check if user name is available in the users table
		$user_check = "SELECT hotel_id FROM users WHERE hotel_id='$hotel_id' LIMIT 1";
		$user_query = mysqli_query($conn,$user_check);
		if (mysqli_fetch_row($user_query)) {
		    //User confirmed
		} else {
		    header('location:logout.php');
		}



?>
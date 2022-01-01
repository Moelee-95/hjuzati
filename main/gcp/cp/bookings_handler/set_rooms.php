<?php
//set values and send it to the database
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

	$hotel_id = $_POST['hotel_id'];
	$room_id = $_POST['room_id'];
	$date = $_POST['date'];
	$iName = $_POST['iName'];
	$value = $_POST['value'];
	$num_r_a = "";
	$sdr_price ="";
	$bfast_price ="";
	$open_close ="";

	if ($iName == "rNum") {
		$num_r_a = $value;
	}
	elseif ($iName == "sRate") {
		$sdr_price = $value;
	}

	elseif ($iName == "opncls") {
		$open_close = $value;
	}

   //echo "I got your value hotel id is: $hotel_id   Room Id:$room_id  Room Name:$room_name  Date:$date  InputName:$iName  Input Value:$values";



	//check the hotel_id, Room_id and Date if exsitst
	$check = "SELECT * FROM rates WHERE  rRoomsID= '$room_id' AND rDate ='$date'";
	$result = mysqli_query($conn, $check) or die(mysqli_error($conn));

	if (mysqli_num_rows($result) > 0) { // when record is exists
		//Recorde is exsist 
		// echo "you are updating record";
		if ($num_r_a !="") {
			$update = "UPDATE rates SET rARoomsNum = '$num_r_a' WHERE  rRoomsID= '$room_id' AND rDate ='$date'";
			$query = mysqli_query($conn, $update);
			if ($query) {
				// echo "$num_r_a is successfully added to the database!";	
			}
			else {
				// echo "Couldn't update $num_r_a to the databaase!";
			}

		}
		elseif ($sdr_price != "") {
			$update = "UPDATE rates SET rRate = '$sdr_price' WHERE  rRoomsID= '$room_id' AND rDate ='$date'";
			$query = mysqli_query($conn, $update);
			if ($query) {
				// echo "$sdr_price is successfully added to the database!";	
			}
			else {
				// echo "Couldn't update $sdr_price to the databaase!";
			}
		}
		elseif ($open_close != "") {
			$update = "UPDATE rates SET rOpenClose = '$open_close' WHERE  rRoomsID= '$room_id' AND rDate ='$date'";
			$query = mysqli_query($conn, $update);
			if ($query) {
				// echo "$open_close is successfully added to the database!";	
			}
			else {
				// echo "Couldn't update $open_close to the databaase!";
			}
		}
		
	}
	else{ // when recorde isn't exsist!
		// echo "You are adding new recorde";
		//by default added room will bt unLucked even if user didn't set it
		if ($open_close == "") {
			$open_close ="1";
		}

		if ($num_r_a !="") {
			$insertRoomNum = "INSERT INTO rates(rRoomsID,rDate,rARoomsNum,rOpenClose,rRateTypeID)
 			VALUES ('$room_id','$date','$num_r_a','$open_close','1')";

		    if ($conn->query($insertRoomNum)) {
		    	 echo "information is new and it's successfully added the row to the database";
		    }
		    else{
		    	 // echo "Information is new but coudn't add the new row to the database "."Room ID:".$room_id.'  Date:'.$date.'  Num_r_a:'.$num_r_a.'  sdr_price:'.$sdr_price.'  Open_close:'.$open_close;
		    }

		}
		elseif ($sdr_price != "") {
			$insertPrice = "INSERT INTO rates(rRoomsID,rDate,rRate,rOpenClose,rRateTypeID)
 			VALUES ('$room_id','$date','$sdr_price','$open_close','1')";

		    if ($conn->query($insertPrice)) {
		    	 // echo "information is new and it's successfully added the row to the database";
		    }
		    else{
		    	 // echo "Information is new but coudn't add the new row to the database "."Room ID:".$room_id.'  Date:'.$date.'  Num_r_a:'.$num_r_a.'  sdr_price:'.$sdr_price.'  Open_close:'.$open_close;
		    }
		}
		elseif ($open_close != "") {
			
			$insert = "INSERT INTO rates(rRoomsID,rDate,rOpenClose,rRateTypeID)
 			VALUES ('$room_id','$date','$open_close','1')";

		    if ($conn->query($insert)) {
		    	 // echo "information is new and it's successfully added the row to the database";
		    }
		    else{
		    	 // echo "Information is new but coudn't add the new row to the database "."Room ID:".$room_id.'  Date:'.$date.'  Num_r_a:'.$num_r_a.'  sdr_price:'.$sdr_price.'  Open_close:'.$open_close;
		    }
		}
	    
	    echo $open_close;
	}

?>
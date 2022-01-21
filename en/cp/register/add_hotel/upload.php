<?php

session_start();

$hotel_id = $_SESSION['hotel_id'];
$user_id =  $_SESSION['login_user'];
//#Connection Check
//#Login Check

  // Database connection
  include '../../../../db_connect.php';

          
    if (isset($_FILES['attachments'])) {
        $msg = "";
        $targetFile = "../../users/$user_id/hotels/$hotel_id/photos/" . time().basename($_FILES['attachments']['name'][0]);
        if (file_exists($targetFile)){
            $msg = array("status" => 0, "msg" => "File already exists!");
        }
        else if (move_uploaded_file($_FILES['attachments']['tmp_name'][0], $targetFile)){
            $msg = array("status" => 1, "msg" => "File Has Been Uploaded", "path" => $targetFile);
            $insert = $conn->query("INSERT INTO `hotelsphotos` (`hpPath`, `hotels_hHotelID`) VALUES ('$targetFile', '$hotel_id')"); 
        }

        


        exit(json_encode($msg));
    }
?>
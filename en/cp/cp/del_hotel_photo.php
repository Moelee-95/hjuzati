<?php 
    
if (isset($_GET['hpID'])) {
    $hpID = $_GET['hpID'];
    $del_path = $_GET['delPath'];
    include('../db/db_connect.php');

    if (!unlink($del_path)){
        $del = "DELETE FROM hotelsphotos WHERE (`hpID` = '$hpID')";
        $qu = mysqli_query($conn, $del);
        if ($qu) {
            // $msg = array("status" => 1, "msg" => "File Deleted", "path" => $del_path , "hpID" => $hpID);
            echo "Photo deleted from db and location";
            header('location:hotel_photos.php');
        }
        else{
            echo "Error while deleting from db";
            // $msg = array("status" => 1, "msg" => "File Deleted");

        }
    }
    // exit(json_encode($msg));
}
else{
    echo "Wrong requoest";
}

header('location:hotel_photos.php');
?>
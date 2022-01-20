<?php


session_start();

require ('db.php'); // DB class
require('guest.php'); // guest class
$guest = unserialize($_SESSION['guest']);

if(isset($_POST['phoneNumber'])){
    $conn = new db();
    $conn = $conn->getConnection();// new connection

    $phoneNumber = $_POST['phoneNumber'];//phone num variable
    $q = "UPDATE `guests` SET `gPassword` = '$phoneNumber' WHERE (`gGuestID` = '$guest->guestID')";
    $stmt = mysqli_prepare($conn, $q);
    if(mysqli_stmt_execute($stmt)){
        $guest->phoneNumber = $phoneNumber;
        $_SESSION['guest'] = serialize($guest);
        $data['error'] = '0';
        $data['message'] = 'Phone number have been changed!';
        echo json_encode($data);
    }
    else{
        $data['error'] = '1';
        $data['message'] = 'Error, Couldnot change phone number!';
        echo json_encode($data);
    }  

}




?>
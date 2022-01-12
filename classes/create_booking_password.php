<?php

require 'db.php';
require 'booking.php';
require 'guest.php';

session_start();



if(isset($_SESSION['bookingConf'])){
    $bookingConf = unserialize($_SESSION['bookingConf']);
    $data['error'] = '0';
    $data['message'] = $bookingConf->bookingID;
    
}

/* require 'db.php';
require 'booking.php';
require 'guest.php';

if(isset($_SESSION['bookingConf'])){
    $bookingConf = unserialize($_SESSION['bookingConf']);
    if (isset($_POST['phoneNumber'])) {
        $bookingConf->
        
    }
    
    
} else {
    echo 'No guest Object has ';
    exit();
}

 */







?>
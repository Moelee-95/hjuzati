
<?php
session_start();
//Storing the user id of the hotel owner
require('../classes/db.php');
require('../classes/guest.php');
require('../classes/booking.php');
require('../classes/cities.php');


if (isset($_POST['phone_input'])) {  // reserve room request
    $hotel_id =  $_POST['hotel_id'];
    $check_in =  $_POST['check-in'];
    $check_out =  $_POST['check-out'];
    $nights =  $_POST['nights'];
    $psNumber =  $_POST['psNumber'];
    $chNumber =  $_POST['chNumber'];
    $totalPrice =  $_POST['totalPriceinput'];
    $fullName =  $_POST['fullName'];
    $phone =  $_POST['phone_input'];
    $email =  $_POST['email'];
    $city =  $_POST['city'];
    $paymentMethod =  $_POST['paymentMethod'];
    // insert all reserved rooms to an array $reservedRooms
    foreach ($_POST as $name => $value){
        // echo $name.":". $value."<br>";
        $rooms = explode("_", $name);
        if($rooms[0] == "roomsNum"){
            if ($value > 0){
                $room_id = $rooms[1];
                $totalRooms = $value;
                $reservedRooms["$room_id"]= $value;
            } 
        }
    }
    
    if (!empty($_SESSION['login_guest'])) {
        $guestID = $_SESSION['login_guest'];
        $guest = unserialize($_SESSION['guest']);//guest object
        $b = new Booking("16",'2021-11-05','2021-11-11','6','1','0', $reservedRooms,'2',$totalPrice, $guestID,'','','','');//create booking
        if($b->bookingCreated){
            $guest->bookings[] = $b;
            $_SESSION['guest'] = serialize($guest); // store the guest with it's booking back to the session
            $_SESSION['bookingConf'] = serialize($b);
            header("Location: confirmation.php?createBookingPassword=false");
            exit();
        }
    
    }
    else{
        
        $b = new Booking("16",'2021-11-05','2021-11-11','6','1','0', $reservedRooms,'2',$totalPrice, null ,$fullName,$city,$phone,$email);
        if($b->bookingCreated){
            if (!isset($_COOKIE['bookingConf'])) { // when creating first 
                $bookings = array(); // array to hold bookings objects
                $bookings[] = $b;        //  adding booking to the array
                $incode = json_encode($bookings); //  incode array of bookings
                $serialized = serialize($incode); //  serialize it
                $_SESSION['bookingConf'] = serialize($b);
                $set = setcookie('bookingConf',$serialized, time()+60*60*30, "/");
                header("Location: confirmation.php?createBookingPassword=true");
                die();
            }
            elseif(isset($_COOKIE['bookingConf'])){
                $bookings = json_decode(unserialize($_COOKIE['bookingConf'])); // incode then unserialize
                $bookings[] = $b;        //  adding booking to the array
                $serialized = serialize(json_encode($bookings)); // serialize and incode
                $_SESSION['bookingConf'] = serialize($b);
                $set = setcookie('bookingConf',$serialized, time()+60*60*30, "/");
                header("Location: confirmation.php?createBookingPassword=true");
                die();

            }
        }
    
    }
} // END if ($_POST['phone_input'])
else {
    header("Location: 404.php");
    exit();
}







?>
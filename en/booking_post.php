
<?php
session_start();
//Storing the user id of the hotel owner
require('../classes/db.php');
require('../classes/guest.php');
require('../classes/booking.php');
require('../classes/room.php');
require('../classes/reserveRoom.php');
require('../classes/cities.php');


if (isset($_POST['phone_input'])) {  // reservation request
    $hotel_id =  $_POST['hotel_id'];
    $hotel_name =  $_POST['hotel_name'];
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
        $b = new Booking();//create booking 
        $b->addToDB($hotel_id,$hotel_name,$check_in,$check_out,$nights,$psNumber,$chNumber, $reservedRooms,'2',$totalPrice, $guestID,$fullName,$city,$phone,$email);
        if($b->bookingCreated){
            $guest->bookings[] = $b;
            $_SESSION['guest'] = serialize($guest); // store the guest with it's booking back to the session
            $_SESSION['bookingConf'] = serialize($b);//only used in confirmation.php
            header("Location: confirmation.php?createBookingPassword=false");
            die();
        }
    }
    else{
        $b = new Booking();//create booking 
        $b->addToDB($hotel_id,$hotel_name,$check_in,$check_out,$nights,$psNumber,$chNumber, $reservedRooms,'2',$totalPrice, null,$fullName,$city,$phone,$email);
        if($b->bookingCreated){
            if (!isset($_COOKIE['bookings'])) { // when creating first booking
                $bookings = array(); // array to hold bookings objects
                $bookings[] = $b;        //  adding booking to the array
                $serialized = serialize(json_encode($bookings)); // incode then serialize
                $_SESSION['bookingConf'] = serialize($b);//only used in confirmation.php backend side;;
                setcookie('bookings',$serialized, time()+60*60*30, "/"); //front end side
                header("Location: confirmation.php?createBookingPassword=true");
                die();
            }
            elseif (isset($_COOKIE['bookings'])) { // when creating first booking
                $bookings = json_decode(unserialize($_COOKIE['bookings'])); // unserialize->decode bokkings array
                $bookings[] = $b;        //  adding booking to the array
                $serialized = serialize(json_encode($bookings)); // incode then serialize
                $_SESSION['bookingConf'] = serialize($b);        //Only used in confirmation.php
                setcookie('bookings',$serialized, time()+60*60*30, "/"); // 30 days
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
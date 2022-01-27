<?php

// require 'db.php';
// require 'room.php';
// require 'reserveRoom.php';
// require 'hotel.php';


class Booking {
    public $hotelID;
    public $hotelName;
    public $hotel;
    public $bookingID; // inisilized later
    public $checkIn;
    public $checkOut;
    public $bPassword; // inisilized later
    public $nights;
    public $adultNumber;
    public $childNumber;
    public $rooms = array();// stores objects of room
    public $numberOfRooms = 0;
    public $paymentMethod;
    public $paymentStatus = "pending";
    public $guestID; //
    public $bookingCreated = false;
    public $errorMsg;
    public $fullName;
    public $phoneNumber;
    public $email;
    public $address;
    public $totalAmount;
    public $paidAmount;
    public $remainingAmount;
    
    public function getHotelName(){
        $conn = new db();
        $conn = $conn->getConnection();
        $sql = "SELECT hHotelName FROM hotels WHERE hHotelID = '$this->hotelID'";
        $result = $conn -> query($sql);
        if ($result) {
            $fetch = $result->fetch_array();
            $this->hotelName = $fetch['hHotelName'];
        } else {$this->hotelName = "Error";}
    }
    public function __construct(){
        
    }

    // Add booking to the database
    public function addToDB($hotelID, $hotelName, $checkIn,$checkOut,$nights,$adultNumber,$childNumber, $reservedRooms,$paymentMethod,$totalAmount,$guestID = null, $fullName='',$address='',$phone='',$email=''){
        if (!($this->checkPaymentId($paymentMethod))) {
            $this->bookingCreated = false;
            $this->errorMsg = "Payment method is not exists in the database";
            return false;//stop executing the code
        }
        $this->hotelID = $hotelID;$this->hotelName = $hotelName;$this->checkIn = $checkIn;$this->checkOut = $checkOut;$this->nights = $nights;
        $this->adultNumber = $adultNumber;$this->childNumber = $childNumber;$this->reservedRooms=$reservedRooms;
        $this->paymentMethod = $paymentMethod;$this->totalAmount = $totalAmount;
        $this->fullName = $fullName; $this->phoneNumber = $phone; $this->email = $email; $this->address = $address;
        //generate hotel object
        $hotel = new Hotel();
        $hotel -> generateHotel($info['bHotelID']);
        $this->hotel = $hotel;

        if ($guestID == null) {
            if($this->createBookingGuestNotExisted()){
                foreach ($reservedRooms as $id => $number){ // insert all rooms to the booking
                    $room = new ReserveRoom();
                    $room->addToDB($this->bookingID, $id, $number); // booking id, room id, reserved numbers
                    $this->rooms[] = $room;
                    $this->setNumberOfRooms();//setup rooms Numbers
                }
            }
        }
        else{
            $this->guestID = $guestID;
            if($this->createBookingGuestExisted()){
                foreach ($reservedRooms as $id => $number){ // insert all rooms to the booking
                    $room = new ReserveRoom();
                    $room->addToDB($this->bookingID, $id, $number); // booking id, room id, reserved numbers
                    $this->rooms[] = $room;
                    $this->setNumberOfRooms();//setup rooms Numbers
                }
            }
        }
    }

    //getFromDB helper to setup rooms
    public function getRoomsFromDB(){
        $conn = new db();
        $conn = $conn->getConnection();
        $sql = "SELECT rbRoomID FROM roomsbooked WHERE rbBookingID = '$this->bookingID';"; 
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $info = $result->fetch_all(MYSQLI_ASSOC);
            foreach ($info as $key => $roomInfo) {
                foreach ($roomInfo as $key2 => $roomID) {
                    $room = new ReserveRoom();
                    $room->getFromDB($this->bookingID, $roomID);
                    $this->rooms[] = $room;
                    $this->setNumberOfRooms();
                }
            }
        }
    }

    // Get booking from database
    public function getFromDB($bookingID){
        $conn = new db();
        $conn = $conn->getConnection();
        $sql = "SELECT * FROM bookings where bBookingID = '$bookingID'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $info = $result->fetch_array();
            $this->hotelID=$info['bHotelID'];
            $this->bookingID=$info['bBookingID'];
            $this->checkIn=$info['bDateFrom'];
            $this->checkOut=$info['bDateTo'];
            $this->bPassword=$info['password']; // inisilized later
            $this->nights=$info['bNumOfNights'];
            $this->adultNumber=$info['bNumOfGuests'];
            $this->childNumber=$info['bNumOfChildren'];
            $this->totalAmount=$info['totalAmount'];
            $this->guestID=$info['bGuestID']; //
            $this->fullName=$info['fullName'];
            $this->phoneNumber=$info['phoneNumber'];
            $this->email=$info['email'];
            $this->address=$info['address'];
            $this->paymentMethod=$info['paymentMethod']; //change to values later
            $this->paymentStatus = $info['bPaymentStatusID']; // change to values later
            $this->getHotelName(); //set hotel name
            $this->getRoomsFromDB(); // setup rooms
            $this->bookingCreated = true;
            $hotel = new Hotel();
            $hotel -> generateHotel($info['bHotelID']);
            $this->hotel = $hotel;

        }
    }

    public function createBookingGuestExisted(){
        $conn = new db();
        $conn = $conn->getConnection();
        // echo $hotel_id." - ".$guest_id." - ".$check_in." - ".$check_out." - ".$psNumber." - ".$chNumber." - ". '1'."<br>";
        $sql = "call addReservation('$this->hotelID', '$this->guestID', '$this->checkIn', '$this->checkOut', '$this->adultNumber', '$this->childNumber', '1','$this->paymentMethod','$this->totalAmount','$this->fullName', '$this->phoneNumber', '$this->email','$this->address');";
        $query = mysqli_query($conn, $sql);
        $fetch = mysqli_fetch_array($query);
        $this->bookingID = $fetch[0];
        $this->bookingCreated = true;
        $conn->close();
        return true;
        
    }

    public function createBookingGuestNotExisted(){
        $conn = new db();
        $conn = $conn->getConnection();
        //Creating a booking
        $sql = "call addReservationNoGuest('$this->hotelID',  '$this->checkIn', '$this->checkOut', '$this->adultNumber', '$this->childNumber', '$this->fullName', '$this->address', '$this->phoneNumber', '$this->email', '1','$this->paymentMethod','$this->totalAmount');";
        $query = mysqli_query($conn, $sql);
        $fetch = mysqli_fetch_array($query);
        $this->bookingID = $fetch[0];
        $this->bookingCreated = true;
        $conn->close();
        return true;
        
    }

    public function setBookingPassword($password){
        if($this->bookingCreated){
            $conn = new db();
            $conn = $conn->getConnection(); // connection ready
            $q = "UPDATE bookings SET `password` = '$password' WHERE `bBookingID` = '$this->bookingID';";
            $stmt =mysqli_prepare($conn,  $q);
            if(mysqli_stmt_execute($stmt)){//if password inserted to the db
                $this->bPassword = $password;// insert password to the instance
                return true;
            }
            else{
                $this->errorMsg = "Error when tried to change booking password";
            }
        }
        else {
            $this->errorMsg = "Booking haven't created to change password";
        }
        

    }

    //check payment id availablity in the DB
    public function checkPaymentId($id){
        $return;
        $conn = new db();
        $conn = $conn->getConnection();
        $sql = "SELECT pID FROM payments;";
        $result = $conn -> query($sql); 
        $r = $result -> fetch_all(MYSQLI_ASSOC);//insert the array result to the variable
      
        if (array_key_exists($id, $r)) {
          $return =  true;
        } else{
          $return = false;
        }
        $result -> free_result(); // close the resutls
        $conn -> close(); //close the connection
        return $return; 
      
    }
    
    
    public function setNumberOfRooms(){
        if($this->bookingCreated){
            $conn = new db();
            $conn = $conn->getConnection();
            $sql = "SELECT sum(rbNumOfRooms) as numOfRooms FROM roomsbooked where rbBookingID = '$this->bookingID';";
            $query = mysqli_query($conn, $sql);
            if($fetch = mysqli_fetch_array($query)){
                $this->numberOfRooms = $fetch['numOfRooms'];
            }
                

        }
    }
    

    //Convert Date from 2021-11-05 to Thu 20 Feb Format
    public static function dateConvert($date){
        $dt = DateTime::createFromFormat('Y-m-d', $date);
        return strtoupper($dt->format('D j M')); # 24 DEC
    }

    //remove booking and it's related rooms from db;
    public function remove(){
        $conn = new db();
        $conn = $conn->getConnection();
        //removing all rooms in the booking
        foreach ($this->rooms as $key => $room) { 
            $room->remove();
        }
        //removing booking from the db;
        $sql = "DELETE FROM bookings WHERE bBookingID = '$this->bookingID'";
        $result = $conn->query($sql);
        if($result ){ return true;}
        else {return false;}
    }
}


// $reservedRooms["76"]= "12";

// $b = new Booking();
// $b->addToDB("16","Hjuzati",'2021-11-05','2021-11-11','6','1','0', $reservedRooms,'2','200.0', "114",'test t t','baghdad','07700000000','e@mail.com');

// if ($b->bookingCreated) {
//     $rooms = $b->rooms;;
//     print_r($rooms);
// }

// $b = new Booking();
// $b->getFromDB("234");
// echo $b->hotel->name;



// if ($b->bookingCreated) {
//     $rooms = $b->rooms;;
//     print_r($rooms[0]->type);
// }



















?>
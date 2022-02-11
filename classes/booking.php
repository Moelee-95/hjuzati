<?php

// require 'db.php';
// require 'room.php';
// require 'reserveRoom.php';
// require 'hotel.php';

class Booking {
    public $hotelID;
    public $hotelName;
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
    public $status = "2"; // 1: confirmed 2:Not confirmed default:not confirmed
    
    
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
        $this->paymentMethod = new PaymentMethod($paymentMethod);$this->totalAmount = $totalAmount;
        $this->fullName = $fullName; $this->phoneNumber = $phone; $this->email = $email; $this->address = $address;

        if ($guestID == null) {
            if($this->createBookingGuestNotExisted($paymentMethod)){
                foreach ($reservedRooms as $id => $number){ // insert all rooms to the booking
                    $room = new ReserveRoom();
                    $room->setDate($this->checkIn, $this->checkOut);
                    $room->addToDB($this->bookingID, $id, $number); // booking id, room id, reserved numbers
                    $this->rooms[] = $room;
                }
                $this->setNumberOfRooms();//setup rooms Numbers
            }
        }
        else{
            $this->guestID = $guestID;
            if($this->createBookingGuestExisted($paymentMethod)){
                foreach ($reservedRooms as $id => $number){ // insert all rooms to the booking
                    $room = new ReserveRoom();
                    $room->setDate($this->checkIn, $this->checkOut);
                    $room->addToDB($this->bookingID, $id, $number); // booking id, room id, reserved numbers
                    $this->rooms[] = $room;
                }
                $this->setNumberOfRooms();//setup rooms Numbers
            }
        }
    }

    //getFromDB helper to setup rooms// you have to initilize booking id bofore calling this function
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
                    $room->setDate($this->checkIn, $this->checkOut);
                    $room->getFromDB($this->bookingID, $roomID);
                    $this->rooms[] = $room;
                }
            }
            $this->setNumberOfRooms();//setup rooms Numbers
        }
    }

    // Get booking from database
    public function getFromDB($bookingID){
        $query = "SELECT * FROM bookings where bBookingID = '$bookingID'";
        $result = new Execute($query, "array");
        if ($result->num_rows > 0) {
            $info = $result->result;
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
            $this->paymentMethod=new PaymentMethod($info['paymentMethod']); //change to values later
            $this->paymentStatus = $info['bPaymentStatusID']; // change to values later
            $this->status = $info['bBookingStatusID'];
            $this->getHotelName(); //Problem too many connections
            $this->getRoomsFromDB(); // Problem too many connections
            $this->bookingCreated = true;
            //DO NOT MAKE HOTEL OBJECT BECAUSE THAT WILL GET YOU INTO A LOOP

        }
    }

    public function createBookingGuestExisted($paymentMethod){
        // echo $hotel_id." - ".$guest_id." - ".$check_in." - ".$check_out." - ".$psNumber." - ".$chNumber." - ". '1'."<br>";
        $query = "call addReservation('$this->hotelID', '$this->guestID', '$this->checkIn', '$this->checkOut', '$this->adultNumber', '$this->childNumber', '1','$paymentMethod','$this->totalAmount','$this->fullName', '$this->phoneNumber', '$this->email','$this->address');";
        $this->bookingID = (new Execute($query, "single"))->result;
        $this->bookingCreated = true;
        return true;
        
    }

    public function createBookingGuestNotExisted($paymentMethod){
        //Creating a booking
        $query = "call addReservationNoGuest('$this->hotelID',  '$this->checkIn', '$this->checkOut', '$this->adultNumber', '$this->childNumber', '$this->fullName', '$this->address', '$this->phoneNumber', '$this->email', '1','$paymentMethod','$this->totalAmount');";
        $this->bookingID = (new Execute($query, "single"))->result;
        $this->bookingCreated = true;
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
        $query = "SELECT pID FROM payments;";
        $r = (new Execute($query, "multi"))->result;
      
        if (array_key_exists($id, $r)) {
          $return =  true;
        } else{
          $return = false;
        }
        return $return; 
      
    }
    
    
    public function setNumberOfRooms(){
        if($this->bookingCreated){
            $query = "SELECT sum(rbNumOfRooms) as numOfRooms FROM roomsbooked where rbBookingID = '$this->bookingID';";
            $fetch = (new Execute($query, "array"))->result;
            if($fetch){
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
        $conn-> close();
        if($result ){ return true;}
        else {return false;}
    }

    //update final price
    public function update(){
        //loop through all rooms and sum prices
        $totalAmount = 0;
        foreach ($this->rooms as $key => $room) {
            $totalAmount += $room->getPrice();
        }
        $query = "UPDATE `bookings` SET `totalAmount` = '$totalAmount' WHERE (`bBookingID` = '$this->bookingID');";
        $result = (new Execute($query, "execute"))->result;
        if ($result) {
            $this->totalAmount = $totalAmount;
            return true;
        } else {
            return false;
        }
    }

    //update booking travelr information without effecting the price of the booking
    public function updateTravelerInfo($fullName, $email, $city){
        $conn = new db();
        $conn = $conn->getConnection();
        $query = "UPDATE bookings SET `fullName` = '$fullName', `email` = '$email', `address` = '$city'
         WHERE (`bBookingID` = '$this->bookingID');";
         echo "</br>full name before change:  $this->fullName";
         echo "</br>full name update:  $fullName";
        $result = new Execute($query, "execute");
        if($result->result){//Date updated in the database
            $this->fullName = $fullName;
            echo "</br>full name after change:  $this->fullName";
            $this->email = $email;
            $this->address = $city;
            return true;
        }
        else{
            echo "coudn't execute query: $query";
            return false;
            
        }
        
    }

    //update the booking information, it will effect final price. 
    public function updateBookingInfo($checkIn, $checkOut, $adults, $child){
        $conn = new db();$conn=$conn->getConnection();
        //format date should be correct ****
        $nights = Calculate::getNights($checkIn, $checkOut);
        //Updating database
        $query = "UPDATE bookings SET `bDateFrom` = '$checkIn', `bDateTo` = '$checkOut', `bNumOfNights` = '$nights',
         `bNumOfGuests` = '$adults', `bNumOfChildren` = '$child' WHERE (`bBookingID` = '$this->bookingID');";
        $result = $conn->query($query);
        if($result){
            //update current booking info
            $this->nights = $nights;
            $this->checkIn = $checkIn;
            $this->checkOut = "$checkOut";
            
            //update all rooms the checkin, checkout dates Objects + 
            foreach ($this->rooms as $key => $room) {
                $this->rooms[$key]->setDate($checkIn, $checkOut);
            }
            
            $this->update();//update final price in db and current obj
            return true;
            

        }
        else { echo "error Qeury: $query";}
    }


    //working on it
    public function confirmBooking(){
        $query = "UPDATE `bookings` SET `bBookingStatusID` = '1' WHERE (`bBookingID` = '$this->bookingID')";
        if(new Execute($query, "execute")){
            $this->status = "1";
            return true;
        }

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
// $b->getFromDB("238");
// // echo $b->hotel->name;
// print_r($b->rooms);



// if ($b->bookingCreated) {
//     $rooms = $b->rooms;;
//     print_r($rooms[0]->type);
// }



















?>
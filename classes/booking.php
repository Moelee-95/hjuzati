<?php

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
    public $reservedRooms = array(); // array, indexes are the rooms id, values are numbers of rooms
    public $numberOfRooms = 0;
    public $paymentMethod;
    public $paymentStatus = "pending";
    public $totalAmount;
    public $guestID; //
    public $bookingCreated = false;
    public $errorMsg;
    public $fullName;
    public $phoneNumber;
    public $email;
    public $address;
    

    public function __construct($hotelID, $hotelName, $checkIn,$checkOut,$nights,$adultNumber,$childNumber, $reservedRooms,$paymentMethod,$totalAmount,$guestID = null, $fullName='',$address='',$phone='',$email=''){
        if (!($this->checkPaymentId($paymentMethod))) {
            $this->bookingCreated = false;
            $this->errorMsg = "Payment method is not exists in the database";
            return false;//stop executing the code
        }
        $this->hotelID = $hotelID;$this->hotelName = $hotelName;$this->checkIn = $checkIn;$this->checkOut = $checkOut;$this->nights = $nights;
        $this->adultNumber = $adultNumber;$this->childNumber = $childNumber;$this->reservedRooms=$reservedRooms;
        $this->paymentMethod = $paymentMethod;$this->totalAmount = $totalAmount;
        $this->fullName = $fullName; $this->phoneNumber = $phone; $this->email = $email; $this->address = $address;
        
        if ($guestID == null) {
            if($this->createBookingGuestNotExisted()){
                foreach ($reservedRooms as $name => $value){ // insert all rooms to the booking
                    $this->addRoom($this->bookingID, $name, $value);
                    $this->setNumberOfRooms();//setup rooms Numbers
                }
            }
        }
        else{
            $this->guestID = $guestID;
            if($this->createBookingGuestExisted()){
                foreach ($reservedRooms as $name => $value){
                    $this->addRoom($this->bookingID, $name, $value);
                    $this->setNumberOfRooms();//setup rooms Numbers
                }
            }
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
        $sql = "call hima.addReservationNoGuest('$this->hotelID',  '$this->checkIn', '$this->checkOut', '$this->adultNumber', '$this->childNumber', '$this->fullName', '$this->address', '$this->phoneNumber', '$this->email', '1','$this->paymentMethod','$this->totalAmount');";
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
            $q = "UPDATE `hima`.`bookings` SET `password` = '$password' WHERE `bBookingID` = '$this->bookingID';";
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
        $sql = "SELECT pID FROM hima.payments;";
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
    
     //add rooms to the booking 
    public function addRoom($booking_id, $room_id, $value){
        $conn = new db();
        $conn = $conn->getConnection();
        $insertRoomSql = "INSERT INTO `hima`.`roomsbooked` (`rbBookingID`, `rbRoomID`, `rbNumOfRooms`) VALUES ('$booking_id', '$room_id', '$value')";
        // print_r($insertRoomSql);
        if ($conn->query($insertRoomSql) === TRUE) {
            //inserted
            return true;
        } else {
            // echo "Error insert room: $room_id: " . $conn->error;
            return false;
        }
        
        $conn->close();
    }
    
    public function setNumberOfRooms(){
        if($this->bookingCreated){
            $conn = new db();
            $conn = $conn->getConnection();
            $sql = "SELECT sum(rbNumOfRooms) as numOfRooms FROM hima.roomsbooked where rbBookingID = '$this->bookingID';";
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
}


/* $reservedRooms["65"]= "2";

$b = new Booking("16",'2021-11-05','2021-11-11','6','1','0', $reservedRooms,'2','200.0', null,'','','','');

if ($b->bookingCreated) {
    echo "true";
}
 */



















?>
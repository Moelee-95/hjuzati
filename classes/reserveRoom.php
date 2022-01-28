<?php

// require 'db.php';
// require 'room.php';

class ReserveRoom extends room{
    public $bookingID;// booking id in reserved rooms table
    public $number;  //number of rooms in reserved rooms table
    public $created = false; //by default false
    public $checkIn;
    public $checkOut;
    public $reservedDates = array();
    private $totalPrice;


    public function __construct(){

    }



    // Generate max passengers that this room could have
    /* public function generateMaxPassengers(){
        $conn = new db(); $conn = $conn->getConnection();
        $query = "SELECT rMaxPas FROM rooms WHERE rRoomID= '$this->id'";
        $result = $conn -> query($query);
        if ($result) {
            $fetch = $result->fetch_row();
            if ($this->maxPassengers = $fetch[0]) {
                return true;
            } else{} 
        }else{}
    }
 */
    //increase date with 1 day //related to generateReservedDate
    public function incraseDateOneDay($date){
        $result = DateTime::createFromFormat('Y-m-d', $date)->add(new DateInterval('P1D'));
        $finalResult = $result ->format('Y-m-d');
        return $finalResult;
    }

    //get rate for each date //related to generateReservedDate
    public function dateRate($date){
        $conn = new db();$conn=$conn->getConnection();
        $query = "SELECT rRate FROM rates WHERE rRoomsID = '$this->id' and rDate = '$date'";
        $result = $conn->query($query);
        if ($result) {
            $fetch = $result->fetch_array();
            return $fetch['rRate'];
        }
    }

    //generate reserved dates and prices
    public function generateReservedDates(){
        $reservedDates = array();
        for ($i=$this->checkIn; $i < $this->checkOut; $i = $this->incraseDateOneDay($i)) { 
            $reservedDates[$i]= $this->dateRate($i);
            echo "added";
        }
        
        $this->reservedDates = $reservedDates;
    }

    //get Total price of the room based on reserved dates and number of rooms
    public function getPrice(){
        $totalPrice;
        foreach ($this->reservedDates as $key => $reservedDate) {
            $totalPrice += $reservedDate[0];
        }
        $this->totalPrice = $totalPrice;
    }

     //insert room reservation details to rooms booked table
     public function addToDB($bookingID, $id, $number){
        $conn = new db();
        $conn = $conn->getConnection();
        $insertRoomSql = "INSERT INTO roomsbooked (`rbBookingID`, `rbRoomID`, `rbNumOfRooms`) VALUES ('$bookingID', '$id', '$number')";
        // print_r($insertRoomSql);
        if ($conn->query($insertRoomSql) === TRUE) {
            //inserted
            $this->id = $id;
            $this->bookingID = $bookingID;
            $this->number = $number;
            $this->generateInfo();
            $this->generateReservedDates();
            $this->created = true;
            return true;
        } else {
            // echo "Error insert room: $room_id: " . $conn->error;
            $this->created = true;
            return false;
        }
    }
    //get room reservation details from rooms booked table
    public function getFromDB($bookingID,$roomID){
        $conn = new db();
        $conn = $conn->getConnection();
        $sql = "SELECT rbNumOfRooms FROM roomsbooked where rbBookingID = '$bookingID' and rbRoomID = '$roomID'";
        $query = mysqli_query($conn, $sql);
        if ($query->num_rows > 0) {
            $fetch = mysqli_fetch_row($query);
            $this->bookingID = $bookingID;
            $this->number = $fetch["0"];
            $this->id = $roomID;
            $this->created = true;
            $this->generateInfo();
            $this->generateReservedDates();
            return true;
        }else{
            $this->created = false;
            return false;
        }
    }

    //remove reserved room from database; should remove it's object too 
    //return true when query is executed, false when not executed
    public function remove(){
        $conn = new db();
        $conn = $conn->getConnection();
        $sql = "DELETE FROM roomsbooked WHERE rbBookingID = '$this->bookingID' and rbRoomID = '$this->id'";
        $result = $conn->query($sql);
        if ($result){return true; } 
        else { return false;}
    }
}

// $obj = new ReserveRoom();
// $obj->checkIn = '2022-01-26';
// $obj->checkOut = '2022-01-28';
// $obj->getFromDB("238", "77");

// echo "Result:";
// print_r($obj->reservedDates);

// $obj = new ReserveRoom();
// $obj->addToDB("160", "76", "4");
// echo $obj->id."-----";
// echo $obj->number."-----";
// print_r($obj->photos);


















?>
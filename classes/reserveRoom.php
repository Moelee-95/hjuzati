<?php

// require 'db.php';
// require 'room.php';

class ReserveRoom extends room{
    public $bookingID;// booking id in reserved rooms table
    public $number;  //number of rooms in reserved rooms table
    public $created = false; //by default false

    public function __construct(){

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
        $sql = "SELECT rbNumOfRooms FROM hima.roomsbooked where rbBookingID = '$bookingID' and rbRoomID = '$roomID'";
        $query = mysqli_query($conn, $sql);
        if ($query->num_rows > 0) {
            $fetch = mysqli_fetch_row($query);
            $this->bookingID = $bookingID;
            $this->number = $fetch["0"];
            $this->id = $roomID;
            $this->created = true;
            $this->generateInfo();
            return true;
        }else{
            $this->created = false;
            return false;
        }
    }
}

// $obj = new ReserveRoom();
// $obj->addToDB("160", "76", "4");
// echo $obj->id."-----";
// echo $obj->number."-----";
// print_r($obj->photos);

















?>
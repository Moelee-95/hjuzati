<?php


class Room {
    public $bookingID;// booking id in reserved rooms table
    public $id;      //  id
    public $number;  //number of rooms in reserved rooms table
    public $created = false; //by default false
    public $type;   //from rooms table
    public $name;   //from rooms table
    public $quantity; //from rooms table
    public $photos = array(); //from rooms photos table


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
            $this->number = $number;
            $this->created = true;
            return true;
        } else {
            // echo "Error insert room: $room_id: " . $conn->error;
            $this->created = true;
            return false;
        }
        
        $conn->close();
    }

    //get room reservation details from rooms booked table
    public function getFromDB($bookingID){
        $sql = "SELECT * FROM hima.roomsbooked where rbBookingID = '$bookingID'";
    }

    public function generateInfo(){

    }

    public function getPrice($date){
        
    }

    //get room hotelID
    public static function getRooomHotelID($roomID){
        $conn = new db();
        $conn = $conn->getConnection();
        $q = "SELECT rHotelID FROM rooms where rRoomID = $roomID";
        $query = mysqli_query($conn, $q);
        if (!empty($query)) {
            $fetch = mysqli_fetch_row($query);
            $result = $fetch[0];
            //free results and close connection
            return $result;
        }
        else{
            return "";
        }
    }
    // Get Hotel userID
    public static function getHotelUserID($hotelID){
        $conn = new db();
        $conn = $conn->getConnection();
        $q = "SELECT hUserID FROM hima.hotels WHERE hHotelID = $hotelID;";
        $query = mysqli_query($conn, $q);
        if (!empty($query)) {
            $fetch = mysqli_fetch_row($query);
            $result = $fetch[0];
            //free results and close connection
            return $result;
        }
        else{
            return "";
        }
        
    }

    public static function removeRoom($roomID){
        $conn = new db();
        $conn = $conn->getConnection();
        //remove rates and photos
        $sql = "DELETE FROM rates WHERE (`rRoomsID` = '$roomID');";
        $sql2 = "DELETE FROM roomsphotos WHERE (`rpRoomsID` = '$roomID')";
        $sql3 = "DELETE FROM `hima`.`rooms` WHERE (`rRoomID` = '$roomID')";
        $hotelID = Room::getRooomHotelID($roomID); // getting hotel id
        $userID = Room::getHotelUserID($hotelID); //getting user id
        if ($result = $conn -> query($sql)) { //remove rates
            if ($result2 = $conn -> query($sql2)) { //remove room photos
                if ($result3 = $conn -> query($sql3)) { //remove room
                    //remove room folder Note: removeFiles Class should be included
                    if ($hotelID != "" && $userID != "") {
                        removeFiles::removeRoom($userID,$hotelID,$roomID);
                    }
                }else{ return false;}
            }else{return false;}
        }else{return false;}
        $conn -> close();
    }
}

// echo Room::removeRoom('75');















?>
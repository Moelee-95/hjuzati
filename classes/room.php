<?php


class Room {
    public $id;
    public $type;
    public $name;
    public $quantity;
    public $photos = array();

    public function __construct(){
        $conn = new db();
        $conn = $conn->getConnection();
        
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
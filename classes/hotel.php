<?php


// require "../../db.php";
// require "room.php";
// require "removeFiles.php";

class Hotel{
    public $id;
    public $name;
    public $rating;
    public $pictures = array();
    public $mainPicture;
    public $rooms = array();
    public $mapLocation;
    public $address;

    public function __construct(){
        $conn = new db();
        $conn = $conn->getConnection();
        //iterate through hotel rooms and create objects out of them and insert the object to the array
        
    }

    public static function removeHotel($hotelID){
        $conn = new db();
        $conn = $conn->getConnection();
        //get rooms and remove them
        $q ="SELECT rRoomID FROM hima.rooms where rHotelID = '$hotelID'"; // remove hotel rooms query
        $q2 = "call hima.removehotel('$hotelID');"; //remove other related data to hotel procedure
        if ($result = $conn -> query($q)) {
            $r = $result -> fetch_all(MYSQLI_ASSOC);
            foreach ($r as $key => $room) {// iterate through hotel rooms and remove them
                if (!Room::removeRoom($room['rRoomID'])) { // when fail to remove room
                    echo "Coudn't remove room:". $room['rRoomID'];
                }
            }
        }else{ $err[] = "coudn't fetch hotel rooms";}
        if($r2 = $conn -> query($q2)){ } else{ $err[] = "coudn't execute ";}//remove other related methods from db;
        if (RemoveFiles::removeHotel(Room::getHotelUserID($hotelID),$hotelID)) {} else{$err[]= "could not remove dirs";} //remove hotel folder
        return $err;
    }
}









?>
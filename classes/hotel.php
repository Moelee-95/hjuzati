<?php


// require "db.php";
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
    public $phoneNumber;

    public function __construct(){
        $conn = new db();
        $conn = $conn->getConnection();
        //iterate through hotel rooms and create objects out of them and insert the object to the array
    }

    //remove hotel, including all of it's bookings, rooms and rates
    public static function removeHotel($userID,$hotelID){
        $conn = new db();
        $conn = $conn->getConnection();
        //get rooms and remove them
        $q ="SELECT rRoomID FROM rooms where rHotelID = '$hotelID' and hUserID = '$userID'"; // remove hotel rooms query
        $q2 = "call removehotel('$hotelID');"; //remove tates, bookings related to the hotel and finall remove the hotel
        if ($result = $conn -> query($q)) {
            $r = $result -> fetch_all(MYSQLI_ASSOC);
            foreach ($r as $key => $room) {// iterate through hotel rooms and remove them
                if (!Room::removeRoom($room['rRoomID'])) { // when fail to remove room
                    echo "Coudn't remove room:". $room['rRoomID'];
                }
            }
        }else{ $err = "coudn't fetch hotel rooms";}
        if($r2 = $conn -> query($q2)){ } else{ $err = "coudn't execute ";}//remove other related methods from db;
        if (RemoveFiles::removeHotel(Room::getHotelUserID($hotelID),$hotelID)) {} else{$err= "could not remove dirs";} //remove hotel folder
        return $err;
    }

    public function generateRooms(){
        $conn = new db();$conn = $conn->getConnection();
        $sql = "SELECT rRoomID FROM rooms WHERE rHotelID = '$this->id';";
        $result  = $conn -> query($sql);
        $rooms = $result -> fetch_all(MYSQLI_ASSOC);
        // print_r($fetch);
        foreach ($rooms as $key => $room) {
            $r = new Room();
            $r->id = $room['rRoomID'];
            $r->generateInfo();
            $this->rooms[] = $r;
        }
        
    }

    public function generateHotel($id){
        $conn = new db();$conn = $conn->getConnection();
        $sql = "SELECT * FROM hotels WHERE hHotelID = '$id'";
        $result  = $conn -> query($sql);
        $fetch = $result -> fetch_array();
        $this->id = $id;
        $this->name = $fetch['hHotelName'];
        $this->rating = $fetch['hHotelRating'];
        $this->address = $fetch['hAddress'];
        $this->mapLocation = $fetch['hMapsLocation'];
        $this->phoneNumber = $fetch['hMainPhoneNumber'];
    }
}

// $hotel = new Hotel();
// $hotel -> generateHotel("24");
// $hotel -> generateRooms();
// print_r($hotel->rooms);

?>
<?php


// require "db.php";
// require "booking.php";
// require "room.php";
// require "reserveRoom.php";
// require "removeFiles.php";

class Hotel{
    public $id;
    public $name;
    public $rating;
    public $pictures = array();
    public $mainPicture;
    public $rooms = array();
    public $bookings = array();
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
        if (RemoveFiles::removeHotel(Room::getHotelUserID($hotelID),$hotelID)) {}
         else{$err= "could not remove dirs";} //remove hotel folder
        return $err;
    }

    public function generateRooms(){
        $query = "SELECT rRoomID FROM rooms WHERE rHotelID = '$this->id';";
        $rooms = (new Execute($query, "multi"))->result;
        // print_r($fetch);
        foreach ($rooms as $key => $room) {
            $r = new Room();
            $r->id = $room['rRoomID'];
            $r->generateInfo();
            $this->rooms[] = $r;
        }
        
    }

    public function generateHotel($id){
        $query = "SELECT * FROM hotels WHERE hHotelID = '$id'";
        $fetch = (new Execute($query, "array"))->result;
        $this->id = $id;
        $this->name = $fetch['hHotelName'];
        $this->rating = $fetch['hHotelRating'];
        $this->address = $fetch['hAddress'];
        $this->mapLocation = $fetch['hMapsLocation'];
        $this->phoneNumber = $fetch['hMainPhoneNumber'];
        $this->generateRooms();//generate hotel rooms
        $this->generateBookings();//generate bookings
    }

    public function generateBookings(){
        $query = "SELECT bBookingID FROM hima.bookings where bHotelID = '$this->id'";
        $result = new Execute($query, "multi");
        if ($result) {
            $bookings = $result->result;
            foreach ($bookings as $key => $booking) {
                $b = new Booking();
                //$b->getFromDB($booking['bBookingID']);
                $this->bookings[] = $b;
                unset($b); 
            }
        }


    }
}

// $hotel = new Hotel();
// $hotel -> generateHotel("24");
// $hotel -> generateBookings();
// print_r($hotel->bookings);

?>
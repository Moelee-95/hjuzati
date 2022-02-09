<?php


class Room {
    public $id;      //  id initilize from the child class
    public $type;   
    public $name;   
    public $numbers;
    public $numBedRooms;
    public $numLivingRooms;
    public $numBathrooms;
    public $bedNum;
    public $maxPassengers;
    public $photos = array(); //from rooms photos table


    public function __construct(){
        
    }

    public function generatePhotos(){
        $conn = new db();
        $conn = $conn->getConnection();
        $sql = "SELECT rpPhotoPath FROM roomsphotos where rpRoomsID = '$this->id';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            $photosArr = $result->fetch_all(MYSQLI_ASSOC);
            // print_r($photosArr);
            foreach ($photosArr as $key => $photoArr) {
                $this->photos[] = $photoArr["rpPhotoPath"];
            }
        }
        

    }

    public function generateInfo(){
        $conn = new db();$conn = $conn->getConnection();
        if (!empty($this->id)) {
            $sql = "SELECT rtRoomTypeEn, rnRoomNameEn,rRoomsNumbers,num_bed_rooms,num_living_rooms,num_bathrooms,bed_num,rMaxPas FROM rooms r 
            join roomsnames rn on r.rRoomNameID = rn.rnRoomNameID 
            join roomstypes rt on rt.rtRoomTypeID = rn.rnRoomTypeID where r.rRoomID = '$this->id';";
            $query = mysqli_query($conn, $sql);
            if ($query->num_rows > 0) {
                $fetch = mysqli_fetch_array($query);
                $this->type = $fetch['rtRoomTypeEn'];
                $this->name = $fetch['rnRoomNameEn'];
                $this->numbers = $fetch['rRoomsNumbers'];//max number of rooms in the hotel
                $this->numBedRooms = $fetch['num_bed_rooms'];
                $this->numLivingRooms = $fetch['num_living_rooms'];
                $this->numBathrooms = $fetch['num_bathrooms'];
                $this->bedNum = $fetch['bed_num'];
                $this->maxPassengers = $fetch['rMaxPas'];
                //$this->generatePhotos(); //problem (08004/1040): Too many connections
            }
        }else{ echo "Initilize guest id first: if there would be $this->id";}
      
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
        $q = "SELECT hUserID FROM hotels WHERE hHotelID = $hotelID;";
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
        $sql3 = "DELETE FROM `rooms` WHERE (`rRoomID` = '$roomID')";
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
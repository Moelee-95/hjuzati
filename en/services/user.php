<?php

require "../../db.php";
require "room.php";
require "removeFiles.php";
require "hotel.php";

class User{
    public $id;
    public $fullName;
    public $userName;
    public $email;
    public $password;
    public $phoneNumber;

    public function __construct() {

    }

    public static function removeUser($userID){
        $conn = new db();
        $conn = $conn->getConnection();
        //get rooms and remove them
        $q ="SELECT hHotelID FROM hotels WHERE hUserID = '$userID'";
        $q2 = "DELETE FROM users WHERE uUserID = '$userID'";//remove stored payment methods
        if ($result = $conn -> query($q)) {
            $r = $result -> fetch_all(MYSQLI_ASSOC);
            foreach ($r as $key => $hotel) {// iterate through hotel rooms and remove them
                if (!Hotel::removeHotel($hotel['hHotelID'])) {  }// if fail to remove room do nothing for now
            }
        }else{ $err[] = "coudn't fetch hotel rooms";}
        if($r2 = $conn -> query($q2)){ } else{ $err[] = "coudn't execute ";}//remove other related methods from db;
        if (RemoveFiles::removeUser($userID)) {} else{$err[]= "Directory is deleted";} //remove hotel folder
        return $err;
    }
}

print_r(User::removeUser("39"));


?>
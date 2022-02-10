<?php

// require "db.php";
// require "booking.php";
// require "room.php";
// require "reserveRoom.php";
// require "removeFiles.php";
// require "hotel.php";

class User{
    public $id;
    public $fullName;
    public $userName;
    public $email;
    public $password;
    public $phoneNumber;
    public $hotels = array();
    public $loggedIn= false; //false by default

    public function __construct() {

    }

    public function login($user_n_e, $password){ 
        $query = "SELECT uUserID,uUserName,uUserEmail,uUserPassword,uUserPhoneNumber,uFullName FROM users WHERE uUserEmail = '$user_n_e'  OR uUserName='$user_n_e' AND uUserPassword= '$password' ";
        $result = new Execute($query, "array");
        if ($result->num_rows > 0) {
            $fetch = $result->result;
            $db_user_name =  $fetch['uUserName'];
            $db_email = $fetch['uUserEmail'];
            $db_password = $fetch['uUserPassword'];
            $db_phoneNumber = $fetch['uUserPhoneNumber'];
            $db_fullName = $fetch['uFullName'];
            $user_id = $fetch['uUserID'];

            if ($db_user_name == $user_n_e || $db_email == $user_n_e) {
                if ($db_password == $password) {
                    $this->loggedIn = true;
                    $this->id = $user_id; //user id
                    $this->fullName = $db_fullName; //full name
                    $this->userName = $db_user_name;// user name
                    $this->email = $db_email; // email
                    $this->password = $db_password; //password
                    $this->phoneNumber = $db_phoneNumber; //phone number
                    // $this->generateHotels();
                    return $this->loggedIn;
                }
                else{
                    $this->loggedIn = false;
                    return $this->loggedIn;
                }
            }
            else {
                $this->loggedIn = false;
                return $this->loggedIn;
            }
            
        } else {
            $this->loggedIn = false;
            return $this->loggedIn;
        }
       
    }
    

    //generate hotels and it's information without generating the bookings for  each hotelS
    public function generateHotels(){
        $query = "select hHotelID from hotels where hUserID = '$this->id'";
        $result = new Execute($query, "multi");
        if ($result->num_rows > 0) {
            $fetch = $result->result;
            foreach ($fetch as $key => $hotel) {
                $hID = $hotel['hHotelID'];
                $hotel = new Hotel();
                $hotel->generateHotel($hID);
                $this->hotels[] = $hotel;
                unset($hID);//prevent conflect
            }
        } else {
            return "There are no hotels available for this user";
        }

    }

    public function register($email, $user_name, $password, $fullName, $phone_number){
        $results;
        $sql_e = "SELECT * FROM users WHERE uUserEmail ='$email'";
        $sql_u = "SELECT * FROM users WHERE uUserName ='$user_name'";
        $result_e = (new Execute($sql_e, "multi"))->num_rows;
        $result_u = (new Execute($sql_u, "multi"))->num_rows;

        if ($result_e > 0) {
            $results['state'] = false;
            $results['message'] = "Email is used before";
        }
        elseif ($result_u > 0) {
            $results['state'] = false;
            $results['message'] = "User Name is taken";
        }
        else {
            $query = "CALL add_user('$email','$user_name','$password','$phone_number','$fullName')";//returns user id
            $userID = (new Execute($query, "single"))->result;

            if ($userID > 0) {
                $this->id =$userID;
                $this->fullName = $fullName;
                $this->userName = $user_name;
                $this->password = $password;
                $this->phoneNumber = $phone_number;
                $this->loggedIn = true;
                $this->generateHotels();
                $results['state'] = true;
                $results['message'] = "User Name Created successfully";
            }

            else{
                $results['state'] = false;
                $results['message'] = "Coud not create user in the database";
            }
        }

        return $results;
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
        $conn->close();
        return $err;
    }
}

// print_r(User::removeUser("39"));
// $user = new User();
// echo $user->login("m", "m1");
// if ($user->login("m", "m")){
//     $user->generateHotels();
//     echo "logged in";
//     foreach ($user->hotels as $key => $hotel) {
//         echo $hotel->name;
//     }
// } else { echo "wrong Login";}

?>
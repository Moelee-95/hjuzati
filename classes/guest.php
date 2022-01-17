<?php

// require 'db.php';
// require 'room.php';
// require 'reserveRoom.php';
// require 'booking.php';

class createGuest extends db {
    public $created = false;
    public $guestID;
    public $fullName; // Used in the constructor
    public $userName; // Used in the constructor
    public $password; // Used in the constructor
    public $phoneNumber;// Used in the constructor
    
    public function __construct($fullName , $password , $phoneNumber ){
        $conn = new db();
        $conn = $conn->getConnection();

        $this->fullName = $fullName;
        $this->password = $password;
        $this->phoneNumber = $phoneNumber;
        $nameArray = explode(" ", $fullName); // convert full name to array
        $userName = $nameArray[0].substr($phoneNumber, -3); //combine first name with last 3 numbers of the phone number
        $this->userName = $userName;   
        
        $sql = "CALL add_guest('$fullName','$userName','$password','$phoneNumber')";
        $qu = mysqli_query($conn, $sql);
        $fetchit = mysqli_fetch_row($qu);
        $this->guestID = $fetchit[0];

        if ($conn->query($sql) or $this->guestID > 0) {
            mkdir("../guests/$this->guestID",0777,true); //Create guest folder
            $this->created = true;
        }
        else{
            $this->created = false;
        }

        $conn->close();
        
    }
    
}


class Guest extends db {
    public $loggedIn = false; //
    public $errorMessage; //
    public $userName;//setted before login
    public $password; //setted before login
    public $guestID ; 
    public $fullName; 
    public $address;
    public $address2;
    public $city;
    public $zipCode;
    public $country;
    public $phoneNumber;
    public $email;
    public $gender;
    public $status;
    public $avatar;
    public $creationDate;
    public $DOB;
    public $bookings = array();
    public $avatarImg;

    public function __construct($identifier, $password){
        parent::__construct(); // to run the code inside cons. to be able to access conn
        //Add country code to the phone number, Works only in Iraq
        if(substr($identifier, 0,2) == "07"){ $identifier = "+964".substr($identifier, 1);}
        elseif(substr($identifier, 0,1) == "7"){$identifier = "+964".$identifier;}

        if($this->login($identifier , $password)){ // when logged in generate guest account information
            $this->generateInfo();
        }
    }

    // used when forgot password, accept itentity(email,username,phone) returns $data
    public static function findGuestID($identity){
        $conn = new db();
        $conn = $conn->getConnection();
        $msg = '';
        $error;
        $sql = "SELECT gGuestID, gPhoneNumber FROM hima.guests where (gUserName= '$identity' or gEmail='$identity' or gPhoneNumber='$identity');";
        if ($query = mysqli_query($conn, $sql)) {
            $fetch = mysqli_fetch_row($query);
            $guestID =  $fetch['gGuestID'];
            $phoneNumber = $fetch['gPhoneNumber'];
            $msg = "User have been found!";
            $error = 0;
            $data = array($error,$msg,$phoneNumber,$guestID);
            return $data;
        }
        else {
            $msg = "Coudn't Find your account!";
            $error = 1;
            $guestID = 0;
            $phoneNumber = 0;
            $data = array($error,$msg,$phoneNumber,$guestID);
            return $data;
        }
        
    }

    //send sms to the guest phone, accepts guest id, returns encrypted md5 verification code
    public static function sendSms($guestID){
    // I have to create a class for sending sms to the phone number, sendSms

    }

    
    public static function sendEmail($guestID){

    }

    //Accepts guestID and the new password, return true if passoword changed, false if coudn't change password
    public static function changePassword($guestID, $NewPassword){
        $conn = new db();
        $conn = $conn->getConnection();
        $msg = "";
        $error;
        $sql = "UPDATE `guests` SET `gPassword` = '$NewPassword' WHERE (`gGuestID` = '$guestID');";
        if (mysqli_query($conn, $sql)) {
            return true;
        }
        else{
            return false;
        }

    }

    private function login($identifier, $password){
        $conn = new db();
        $conn = $conn->getConnection();        
        $sql = "SELECT gUserName,gEmail,gPassword,gPhoneNumber FROM guests WHERE gEmail = '$identifier' OR gUserName='$identifier'  OR gPhoneNumber='$identifier' AND gPassword= '$password'";
        $query = mysqli_query($conn, $sql);
        $fetch = mysqli_fetch_array($query);
        if ($fetch > 0) {
            $this->userName = $fetch['gUserName'];
            $this->password = $fetch['gPassword'];
            $this->loggedIn = true;
            $this->errorMessage = "0";
            return true;

        }else {
            $this->loggedIn = false;
            $this->errorMessage = "Incorrect User Name or Email or phone number";
            return false;}
        
    }

    // generate bookings and insert them to bookings array when login
    public function generateBookings(){
        $conn = new db();
        $conn = $conn->getConnection();
        $sql = "SELECT bBookingID FROM bookings where bGuestID = '$this->guestID'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $info = $result->fetch_all(MYSQLI_ASSOC);
            foreach ($info as $index => $bookings) {
                foreach ($bookings as $index2 => $booking) {
                    $b = new Booking();
                    $b->getFromDB($booking);
                    if ($b->bookingCreated) {
                        $this->bookings[] = $b;
                    }
                    else{
                        $this->errorMessage = $this->errorMessage." - Coudn't created $b Bookings";
                    }
                }
            }
        }
    }
    
    // generate guest information
    private function generateInfo(){
        $conn = new db();
        $conn = $conn->getConnection();
        if($this->loggedIn){
            $sql = "SELECT * FROM guests WHERE gUserName='$this->userName' AND gPassword= '$this->password'";
            $result = $conn -> query($sql);
            if ($result->num_rows > 0) {
                $fetch = $result->fetch_array();
                $this->guestID = $fetch['gGuestID'];
                $this->fullName = $fetch['gFullName'];
                $this->address = $fetch['gAddress'];
                $this->address2 = $fetch['gAddress2'];
                $this->city = $fetch['gCity'];
                $this->zipCode = $fetch['gZipCode'];
                $this->country = $fetch['gCountry'];
                $this->phoneNumber = $fetch['gPhoneNumber'];
                $this->email = $fetch['gEmail'];
                $this->gender = $fetch['gGender'];
                $this->status = $fetch['gStatus'];
                $this->avatar = $fetch['gStatus'];
                $this->DOB = $fetch['gDOB'];
                $this->creationDate = $fetch['gCreatingDate'];
                $this->avatarImg = $fetch['avatar'];
                $this->generateBookings();
            }
            else { return false;}
        } else{ return false;}
    }

    // Add unadded bookings Objects & set to guest by database
    public function addBooking($booking){
        $bID = $booking->bookingID;// bookingID
        $conn = new db();
        $conn = $conn->getConnection();
        $sql = "UPDATE bookings SET bGuestID = '$this->guestID' WHERE bBookingID = '$bID';";//set guest name in bookings table
        if ($conn->query($sql) === TRUE) {
            $this->bookings[] = $booking;
            return true;
        } else {
            // echo "Error modify booking guestID: " . $conn->error;
            return false;
        }
    }

    //setters for setting basic info
    public function setInfo($fullName, $gender, $DOB){
        $conn = new db();
        $conn = $conn->getConnection();
        $q = "UPDATE `hima`.`guests` SET `gFullName` = '$fullName', `gGender` = '$gender', `gDOB` = '$DOB' WHERE `gGuestID` = '$this->guestID'";
        $stmt = mysqli_prepare($conn, $q);
        
        if(mysqli_stmt_execute($stmt)){
            $this->fullName = $fullName;
            $this->gender = $gender;
            $this->DOB = date("Y-m-d", strtotime($DOB));
            return true;
        }
        else {
            $this->errorMessage = "Coudn't update user information";
            return false;
        }

       
    }
    //change guest email
    public function setEmail($email){
    }

    //change guest phone number
    public function setPhoneNumber($phoneNumber){
        
    }

    public function setPassword($oldPassword, $newPassword){
        if($this->loggedIn){
            if($oldPassword == $this->password){
                $conn = new db();
                $conn = $conn->getConnection();
                $q = "UPDATE hima.guests SET `gPassword` = '$newPassword' WHERE `gGuestID` = '$this->guestID'";
                $stmt = mysqli_prepare($conn, $q);
                /* to bind data mysqli_stmt_bind_param($stmt, 'i', $post_id);
                to bind result mysqli_stmt_bind_result($stmt, $content);
                to fetch data mysqli_stmt_fetch($stmt);
                if(mysqli_stmt_num_rows($stmt)){
                     echo $content;
                } */
                if(mysqli_stmt_execute($stmt)){
                    $this->password = $newPassword;
                    return true;
                }
                else{
                    $this->errorMessage = "Coudn't insert the data!";
                    return false;
                }  
            }
            else{
                $this->errorMessage = "incorrect old password!";
                return false;
            }
        }
        else {
            $this->errorMessage = "please login first to change your password";
            return false;
        }
    }

    public static function findAccount($identifier){
        $conn = new db();
        $conn = $conn->getConnection();
        // Add country code to phone numbers works only for Iraq
        if(substr($identifier, 0,2) == "07"){ $identifier = "+964".substr($identifier, 1);}
        elseif(substr($identifier, 0,1) == "7"){$identifier = "+964".$identifier;};

        $q = "SELECT gGuestID,gPhoneNumber,gEmail,gFullName FROM hima.guests where (gUserName= '$identifier' or gEmail='$identifier' or gPhoneNumber='$identifier');";
        $qu = mysqli_query($conn, $q);
        $data = mysqli_fetch_array($qu);
        if($data > 0){
            $data['error'] = 0;
            return $data;
        }
        else{
            $data['error'] = 1;
            return $data;
        }
    }

    public static function setNewPassword($guestID, $newPassword){
        $conn = new db();
        $conn = $conn->getConnection();
        $q = "UPDATE hima.guests SET `gPassword` = '$newPassword' WHERE `gGuestID` = '$guestID'";
        $stmt = mysqli_prepare($conn, $q);
        /* to bind data mysqli_stmt_bind_param($stmt, 'i', $post_id);
        to bind result mysqli_stmt_bind_result($stmt, $content);
        to fetch data mysqli_stmt_fetch($stmt);
        if(mysqli_stmt_num_rows($stmt)){
                echo $content;
        } */
        if(mysqli_stmt_execute($stmt)){
            return 0;
        }
        else{
            return 1;
        }  
    }


}
/* $result = Guest::findAccount("mo1");
print_r($result);
 */

// $guest = new Guest('ali111', 'ali');

// print_r($guest->fullName);


// echo $guest->errorMessage;

// print_r($guest->setAddress('Somewher'));






?>
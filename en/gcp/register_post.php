<?php
session_start();

include('../cp/db/db_connect.php');
require '../../db.php';
require 'cp/classes/guest.php';



if (isset($_COOKIE['login_guest'])) {
    $_SESSION['login_guest'] = $_COOKIE['login_guest']; 
    $_SESSION['guestUserName'] = $_COOKIE['guestUserName'];
    $_SESSION['guest'] = serialize(new Guest($_COOKIE['guestUserName'],$_COOKIE['guestPassword'])); // create guest object
    header("location:cp/index.php");
}
elseif (empty($_SESSION['login_guest'])) {
    if (!isset($_POST['phone_number'])) {
        header("location:register.php?error=1&message=phoneNumberInputIsEmpty");
        }
    elseif (isset($_POST['phone_number'])) {
        $password = htmlspecialchars($_POST['password']);//pass
        $fullname = htmlspecialchars($_POST['fullname']);//full name
        $phone_number = htmlspecialchars($_POST['phone_number']); // phone number
        
        //to check if the phone number is exists
        $sql_e = "SELECT * FROM guests WHERE gPhoneNumber = '$phone_number'";
        $result_e = mysqli_query($conn, $sql_e) or die(mysqli_error($conn));
        if (mysqli_num_rows($result_e) > 0) {
            header("location:register.php?error=1&message=PhoneNumberIsUsedBefore");
        }
        
        else {
            $newGuest = new createGuest($fullname, $password, $phone_number);
            if ($newGuest->created) {
                $_SESSION['login_guest'] = $newGuest->guestID;  // Represents the guest Id
                $_SESSION['guestUserName'] = $newGuest->userName; // Represents the guest user Name
                $_SESSION['guest'] = serialize(new Guest($newGuest->userName,$password)); // create guest object
                //store in cookies for 7 days when remember me is clicked
                setcookie('login_guest',$newGuest->guestID, time()+60*60*7, "/");
                setcookie('guestUserName',$newGuest->userName, time()+60*60*7, "/");
                setcookie('guestPassword',$password, time()+60*60*7, "/");

                header("location:cp/index.php?guestUser=");  // send   user to the dashboard 
            }

            else{
                header("location:register.php?error=1&message=CouldnotInsertDataToTheDatabase");
            } // error fetching guest info
        } // phone number is confiremd by sms session
    } // check form phone post
} // check guest logged in or not


?>

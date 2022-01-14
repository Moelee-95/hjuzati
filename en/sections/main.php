<?php

session_start();
//Storing the user id of the hotel owner

require('../classes/db.php');
require('../classes/guest.php');
require('../classes/booking.php');
require('../classes/cities.php');

// Currency cookies
if (isset($_COOKIE['currency'])) {
    $currency = $_COOKIE['currency'];
// Default currency
} else {
    setcookie('currency','USD', time()+60*60*7, "/");
    $currency = 'USD';
}
// language cookies
if (isset($_COOKIE['language'])) {
    $language = $_COOKIE['language'];
// Default currency
} else {
    setcookie('language','english', time()+60*60*7, "/");
    $language = 'english';
}
if (isset($_COOKIE['login_user']) and isset($_COOKIE['userName']) and isset($_COOKIE['userPassword'])) {
    if (isset($_SESSION['login_user'])) {
      $user_id =  $_SESSION['login_user'];
    }
    else{
        $_SESSION['login_user'] = $_COOKIE['login_user'];
        $_SESSION['userName'] = $_COOKIE['userName'];
        $user_id =  $_SESSION['login_user'];
    }
}
if (isset($_COOKIE['login_guest']) and isset($_COOKIE['guestUserName']) and isset($_COOKIE['guestPassword'])) {//when cookies are setted vut sessions are not setted
	if (isset($_SESSION['login_guest'])) { // when guest is logged in with session
		$guest = unserialize($_SESSION['guest']);
	}
	elseif (!isset($_SESSION['login_guest'])){	//When guest is logged in only by coockies, setup the php sessions
		$_SESSION['login_guest'] = $_COOKIE['login_guest']; 
		$_SESSION['guestUserName'] = $_COOKIE['guestUserName'];
		$_SESSION['guest'] = serialize(new Guest($_COOKIE['guestUserName'],$_COOKIE['guestPassword'])); // create guest object
		$guest = unserialize($_SESSION['guest']);
	}
}

?>
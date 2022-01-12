<?php

require '../../classes/db.php';
require '../../classes/guest.php';
require '../../send_sms/send.php';

if (isset($_COOKIE['login_guest'])) {
    $_SESSION['login_guest'] = $_COOKIE['login_guest']; 
    $_SESSION['guestUserName'] = $_COOKIE['guestUserName'];
    $_SESSION['guest'] = serialize(new Guest($_COOKIE['guestUserName'],$_COOKIE['guestPassword'])); // create guest object
    header("location:cp/index.php");
}
else{
    if (isset($_POST['identifier'])) {
        $response = Guest::findAccount($_POST['identifier']);
        echo json_encode($response);
    }
    else if (isset($_POST['newPassword'])) {
        $response = Guest::setNewPassword($_POST['guestID'], $_POST['newPassword']);
        $data['error'] = $response;
        echo json_encode($data);
    }
}



?>
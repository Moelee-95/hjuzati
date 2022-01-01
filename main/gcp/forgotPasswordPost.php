<?php

require '../../db.php';
require 'cp/classes/guest.php';
require '../send_sms/send.php';


if (isset($_POST['identifier'])) {
    $response = Guest::findAccount($_POST['identifier']);
    echo json_encode($response);
}
else if (isset($_POST['newPassword'])) {
    $response = Guest::setNewPassword($_POST['guestID'], $_POST['newPassword']);
    $data['error'] = $response;
    echo json_encode($data);
}


?>
<?php
require '../../../../classes/db.php';
require '../../../../classes/RemoveFiles.php';
require '../../../../classes/room.php';
require '../../../../classes/hotel.php';

if (isset($_COOKIE['login_user']) and isset($_COOKIE['userName']) and isset($_COOKIE['userPassword'])) {
  if (isset($_SESSION['login_user'])) {
    $user_id =  $_SESSION['login_user'];
  }
  else{
      $_SESSION['login_user'] = $_COOKIE['login_user'];
      $_SESSION['userName'] = $_COOKIE['userName'];
      $user_id =  $_SESSION['login_user'];
  }
  if (isset($_GET['removeHotelID']) && !empty($_GET['removeHotelID'])){
    $result = Hotel::removeHotel($user_id, $_GET['removeHotelID']);
    header("Location:index.php?message=$result");
    exit();
  }
  else {
      echo "<span>Wrong request</span>";
  }
}
elseif (!isset($_COOKIE['login_user']) and !isset($_SESSION['login_user'])) {
  header("Location:../../logout.php");
  exit();
}





?>
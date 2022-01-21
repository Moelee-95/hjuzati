<?php 
session_start();

if (!empty($_SESSION['login_user'])) {
  include('../../../../db_connect.php');
  $hotel_id = $_SESSION['login_user'];
  $sql = "SELECT form_state FROM users WHERE hotel_id = '$hotel_id'";
  $query = mysqli_query($conn, $sql);
  $fetch = mysqli_fetch_array($query);
  $form_state =  $fetch['form_state'];
  if ($form_state =="1") {
   
  }
  else if ($form_state =="0") {
    header("location:../register/profile.php");
  }

  
}
elseif (empty($_SESSION['login_user'])) {
header('location:../login'); 
}

?>


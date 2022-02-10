<?php

session_start();

	unset($_SESSION['hotel_id']);
    unset($_SESSION['manage_hotel']);
    header("Location:../register/userprofile/");
   
 
?>
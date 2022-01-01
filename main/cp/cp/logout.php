<?php

session_start();
   
	unset($_SESSION['hotel_id']);
    header("Location:../register/userprofile/");
   
 
?>
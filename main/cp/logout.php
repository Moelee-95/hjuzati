<?php

session_start();
   
   if (session_destroy()) {
   	if ($_SERVER['HTTP_REFERER'] == "http://localhost/main/"){
         header("Location:../index.php");
      }
   	else{
         header("Location:index.php");
      }
   }
   
 
?>
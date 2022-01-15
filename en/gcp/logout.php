<?php

session_start();

   if (session_destroy()) {
      //destory cookies sessions
      setcookie('login_guest',$guest_id, time()-1,"/");
      setcookie('guestUserName',$db_user_name, time()-1,"/");
      setcookie('guestPassword',$password, time()-1,"/");
      setcookie('bookingConf',$password, time()-1,"/");

      if ($_SERVER['HTTP_REFERER'] == "http://localhost/main/"){
         header("Location:../index.php");
      }
   	else{
         header("Location:index.php");
      }
   }
   
 
?>
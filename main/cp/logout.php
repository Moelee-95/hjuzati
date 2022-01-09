<?php

session_start();
   
   if (session_destroy()) {
      setcookie('login_user',$user_id, time()-1, "/");
      setcookie('userName',$db_user_name, time()-1, "/");
      setcookie('userPassword',$password, time()-1, "/");
   	if ($_SERVER['HTTP_REFERER'] == "http://localhost/main/"){
         header("Location:../index.php");
      }
   	else{
         header("Location:index.php");
      }
   }
   
 
?>
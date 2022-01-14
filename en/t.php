<?php  include('sections/header2.php'); ?>




<?php 
 $set = setcookie('some_cookies','here is the content', time()+60*60*30, "/");
 echo $set;



?>
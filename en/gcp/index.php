<?php

session_start();
$display_msg = "none";
require('../../classes/db.php');
require('../../classes/guest.php');
require('../../classes/booking.php');
require('../../classes/room.php');
require('../../classes/reserveRoom.php');
require('../../classes/cities.php');
include('../../db_connect.php');


if (isset($_COOKIE['login_guest']) and isset($_COOKIE['guestUserName']) and isset($_COOKIE['guestPassword'])) {
    if (isset($_SESSION['login_guest'])) {
        header("location:cp/index.php");
    }
    else{
        $_SESSION['login_guest'] = $_COOKIE['login_guest'];
        $_SESSION['guestUserName'] = $_COOKIE['guestUserName'];
        $_SESSION['guest'] = serialize(new Guest($_COOKIE['guestUserName'],$_COOKIE['guestPassword'])); // create guest object
        header("location:cp/index.php");
    }
}
elseif (empty($_SESSION['login_guest']) and empty($_COOKIE['login_guest'])) {
  if (isset($_POST['submit'])) {
    $user_n_e = strtolower(htmlspecialchars($_POST['user_n_e']));
    $password = strtolower(htmlspecialchars($_POST['password']));
    $guest = new Guest($user_n_e, $password);

    if ($guest->loggedIn) {
        //Making sure to remove previous sessions
        unset($_SESSION['login_user']);
        if (isset($_COOKIE['bookings']) && !empty($_COOKIE['bookings'])) { // Merge guest with previous bookings in cookies
            $cookiesBookings = json_decode(unserialize($_COOKIE['bookings']));
            foreach ($cookiesBookings as $key => $cookiesBooking) {
                
                $guest->addBooking($cookiesBooking); //adding previous booking to guest when he logges in
            }
            //remove bookings from cookies to prevent conflect
            setcookie('bookings','', time()-1,"/");
        }
        $_SESSION['guest'] = serialize($guest);
        $_SESSION['login_guest'] = $guest->guestID;  // Represents the guest Id
        $_SESSION['guestUserName'] = $guest->userName; // Represents the user Name
        // Store cookies for 30 days when remember me is clicked
        if (isset($_POST['remember'])) {
            setcookie('login_guest',$guest->guestID, time()+60*60*30, "/");
            setcookie('guestUserName',$guest->userName, time()+60*60*30, "/");
            setcookie('guestPassword',$guest->password, time()+60*60*30, "/");
        }else{
        //Store in cookies for 7 days
            setcookie('login_guest',$guest->guestID, time()+60*60*7, "/");
            setcookie('guestUserName',$guest->userName, time()+60*60*7, "/");
            setcookie('guestPassword',$guest->password, time()+60*60*7, "/");
        }
        //Redirect user to cp
        echo $guest->guestID."</br>".$guest->userName."</br>".$guest->password;
        header("location:cp/index.php");
        exit();
        }
        else{
            $msg = $guest->errorMessage;
            $display_msg = "block";
        }

    }
}
   




?>


<!doctype html>
<html class="no-js" lang="">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hjuzati Hotels | Login and Register Form Hjuzati Hotels</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="font/flaticon.css">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
    <section class="fxt-template-animation fxt-template-layout4 has-animation">
        <div class="container-fluid">
            <div class="row">
                    
                <div class="col-md-6 col-12 fxt-bg-wrap d-none d-md-block">
                    <div class="fxt-bg-img" data-bg-image="img/figure/bg4-l.jpg">
                        <div class="fxt-header">
                            <div class="fxt-transformY-50 fxt-transition-delay-1">
                                <a href="../index.php" class="fxt-logo"><img src="img/logo-2.png" alt="Logo"></a>
                            </div>
                            <div class="fxt-transformY-50 fxt-transition-delay-2">
                                <h1>Welcome To Hjuzati Hotels Dashboard</h1>
                            </div>
                            <div class="fxt-transformY-50 fxt-transition-delay-3">
                                <p>Login to the user panel to manage your reservations.</p>
                            </div>
                        </div>
                        <ul class="fxt-socials">
                            <li class="fxt-facebook fxt-transformY-50 fxt-transition-delay-4"><a href="https://fb.com/Hjuzati.hotels"
                                    title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="fxt-instagram fxt-transformY-50 fxt-transition-delay-5"><a href="https://www.instagram.com/Hjuzati.hotels/" title="instragram"><i
                                        class="fab fa-instagram"></i></a></li>

                           <!--  <li class="fxt-google fxt-transformY-50 fxt-transition-delay-6"><a href="#" title="google"><i
                                        class="fab fa-google-plus-g"></i></a></li>
                            <li class="fxt-linkedin fxt-transformY-50 fxt-transition-delay-7"><a href="#"
                                    title="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                            <li class="fxt-youtube fxt-transformY-50 fxt-transition-delay-8"><a href="#" title="youtube"><i class="fab fa-youtube"></i></a></li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-12 fxt-bg-color">
                    <div class="fxt-content">
                        <div class="">
                            <a href="../index.php" class="text-secondary"> 
                                <i class="fas fa-arrow-left"></i>
                                &nbsp;
                               <span class="font-weight-normal"> Back to Previous Page</span>
                               </a>
                        </div>
                        <div class="fxt-form p-4 mb-2 bg-light">
                            <div class="alert alert-danger" id="error" style="display: <?php echo $display_msg; ?>"><?php echo $msg; ?></div>
                            <form method="POST" action="">
                                <div class="form-group">  
                                    <label for="user_n_e" class="input-label">Email Address or user name</label>                                              
                                    <input type="text" id="user_n_e" class="pl-3 form-control" name="user_n_e" placeholder="example@Hjuzati.com" required="required">
                                </div>
                                
                                <div class="form-group">  
                                    <label for="password" class="input-label">Password</label>                                               
                                    <input id="password" type="password" class="pl-3 form-control" name="password" placeholder="********" required="required">
                                    <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-checkbox-area">
                                        <div class="checkbox">
                                            <input id="checkbox1" name="remember" type="checkbox">
                                            <label for="checkbox1">Keep me logged in</label>
                                        </div>
                                        <a href="forgot-password.php" class="switcher-text" onclick="">Forgot Password</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button name="submit" type="submit" class="fxt-btn-fill">Log in</button>
                                </div>
                            </form>                            
                        </div> 
                        <div class="fxt-footer">
                            <p>Don't have an account?<a href="register.php" class="switcher-text" onclick="">Register</a></p>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </section>
    <!-- jquery-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <!-- Validator js -->
    <script src="js/validator.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>

</body>



</html>
<?php
require "../../classes/db.php";
require "../../classes/booking.php";
require "../../classes/room.php";
require "../../classes/reserveRoom.php";
require "../../classes/removeFiles.php";
require '../../classes/hotel.php';
require '../../classes/user.php';

session_start();
$display_msg = "none";
include('../../db_connect.php');

if (isset($_COOKIE['login_user']) and isset($_COOKIE['userName']) and isset($_COOKIE['userPassword'])) {
    if (isset($_SESSION['login_user'])) {
        header("location:cp/index.php");
    }
    else{
        $_SESSION['login_user'] = $_COOKIE['login_user'];
        $_SESSION['userName'] = $_COOKIE['userName'];
        header("location:cp/index.php");
    }
}
elseif (empty($_SESSION['login_user'])) {
  if (isset($_POST['submit'])) {
    $user_n_e = strtolower(htmlspecialchars($_POST['user_n_e']));
    $password = htmlspecialchars($_POST['password']);
    
    $user = new User();
    $result = $user->login($user_n_e, $password);
    if ($result){
         unset($_SESSION['guest_user']);//logout from guest account
        $_SESSION['login_user'] = $user->id;//Represents the user ID
        $_SESSION['userName'] = $user->userName; // Represents the user Name
        $_SESSION['user'] = serialize($user);
        
         if (isset($_POST['remember'])) {
        // Store cookies for 30 days when remember me is clicked
            //setcookie('user',json_encode($user), time()+60*60*30, "/");
            setcookie('login_user',$user->id, time()+60*60*30, "/");
            setcookie('userName',$user->userName, time()+60*60*30, "/");
            setcookie('userPassword',$$user->password, time()+60*60*30, "/");
        }else{
        //Store in cookies for 7 days
            // setcookie('user',json_encode($user), time()+60*60*30, "/");
            setcookie('login_user',$user->id, time()+60*60*7, "/");
            setcookie('userName',$user->userName, time()+60*60*7, "/");
            setcookie('userPassword',$user->password, time()+60*60*7, "/");
        }
        
        header("location:register/userprofile/");

    } else { 
        $msg = "Incorrect Login";
        $display_msg = "block";
    }
    

  } //when post submit
}//end if when user session is not set
   




?>


<!doctype html>
<html class="no-js" lang="">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hjuzati | Login</title>
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
                                <h1>Welcome To Hjuzati Dashboard</h1>
                            </div>
                            <div class="fxt-transformY-50 fxt-transition-delay-3">
                                <p>Login to the control panel to manage your hotel rooms.</p>
                            </div>
                        </div>
                        <ul class="fxt-socials">
                            <li class="fxt-facebook fxt-transformY-50 fxt-transition-delay-4"><a href="https://fb.com/hotels"
                                    title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="fxt-instagram fxt-transformY-50 fxt-transition-delay-5"><a href="https://www.instagram.com/hotels/" title="instragram"><i
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
                                    <input type="text" id="user_n_e" class="pl-3 form-control" name="user_n_e" placeholder="hjuzati@gmail.com" required="required">
                                </div>
                                <div class="form-group">  
                                    <label for="password" class="input-label">Password</label>                                               
                                    <input id="password" type="password" class="pl-3 form-control" name="password" placeholder="********" required="required">
                                    <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-checkbox-area">
                                        <div class="checkbox">
                                            <input id="checkbox1" type="checkbox">
                                            <label for="checkbox1">Keep me logged in</label>
                                        </div>
                                        <a href="#forgot-password.php" class="switcher-text" onclick="alert('Please Call Hjuzati On:07708138928')">Forgot Password</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button name="submit" type="submit" class="fxt-btn-fill">Log in</button>
                                </div>
                            </form>                            
                        </div> 
                        <div class="fxt-footer">
                            <p>Don't have an account?<a href="#" class="switcher-text" onclick="alert('Please call Hjuzati on:07708138928')">Register</a></p>
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
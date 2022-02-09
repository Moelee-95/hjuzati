<?php

session_start();

include('../../db_connect.php');
require "../../classes/db.php";
require "../../classes/booking.php";
require "../../classes/room.php";
require "../../classes/reserveRoom.php";
require "../../classes/removeFiles.php";
require '../../classes/hotel.php';
require '../../classes/user.php';
$backPath = RemoveFiles::backPath();

if (!empty($_SESSION['login_user'])) {
    header("location:register/userprofile");
}
elseif (empty($_SESSION['login_user'])) {

    if (!isset($_POST['email'])) {
            //echo "Nothing Post";
        }
    elseif (isset($_POST['email'])) {
        $email = strtolower(htmlspecialchars($_POST['email']));
        $user_name = strtolower(htmlspecialchars($_POST['user_name']));
        $password = htmlspecialchars($_POST['password']);//pass
        $fullname = htmlspecialchars($_POST['fullname']);//full name
        $phone_number = htmlspecialchars($_POST['phone_number']);

        $user = new User();
        $result = $user->register($email, $user_name, $password, $fullname, $phone_number);
        if ($result['state']) {
        // Set Sesstions
            $_SESSION['login_user'] = $user->id;
            $_SESSION['userName'] = $user->userName; // Represents the user Name

        // Store in cookies for 7 days
            setcookie('user',json_encode($user), time()+60*60*30, "/");
            setcookie('login_user',$user->id, time()+60*60*7, "/");
            setcookie('userName',$user->userName, time()+60*60*7, "/");
            setcookie('userPassword',$user->password, time()+60*60*7, "/");

        // Create User folder
            mkdir("$backPath/users/$user_id",0777,true);
            //Creat Hotels folder for the user hotels
            mkdir("$backPath/users/$user_id/hotels",0777,true);
            //Creat motels folder for the user motels
            mkdir("$backPath/users/$user_id/motels",0777,true);
            ///Creat appartmets folder for the user appartments
            mkdir("$backPath/users/$user_id/appartments",0777,true);
            // echo $user_id;
        // Redirect user to dashboard
            header('location:register/userprofile');

        } else {
            echo $result['message'];
            unset($user);
        }
       
    }// post email
} // sesstion empty



?>
<!DOCTYPE HTML>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hjuzati | Register New User</title>
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
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div id="wrapper" class="wrapper">        
        <div class="fxt-template-animation fxt-template-layout4 has-animation">
            <div class="container-fluid">
                    
                <div class="row">
                    <div class="col-md-6 col-12 fxt-bg-wrap">
                        <div class="fxt-bg-img" data-bg-image="img/figure/bg4-r.jpg">
                            <div class="fxt-header">
                                <div class="fxt-transformY-50 fxt-transition-delay-1">
                                    <a href="index.php" class="fxt-logo"><img src="img/logo-2.png" alt="Logo"></a>
                                </div>
                                <div class="fxt-transformY-50 fxt-transition-delay-2">
                                    <h1>Welcome To Hjuzati</h1>
                                </div>
                                <div class="fxt-transformY-50 fxt-transition-delay-3">
                                    <p>After Regestration you will be redirected to a page where you add your hotel information.</p>
                                </div>
                            </div>
                            <ul class="fxt-socials">
                                <li class="fxt-facebook fxt-transformY-50 fxt-transition-delay-4"><a href="https://www.facebook.com/hotels"
                                        title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="fxt-instagram fxt-transformY-50 fxt-transition-delay-5"><a href="https://www.instagram.com/hotels" title="instagram"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li class="fxt-whatsapp fxt-transformY-50 fxt-transition-delay-6"><a style="background-color: #01cc66cc" href="https://wa.me/9647708138928" title="whatsapp"><i
                                            class="fab fa-whatsapp"></i></a></li>
                                <li class="fxt-transformY-50 fxt-transition-delay-7" ><a style="" href="https://m.me/hotels"
                                        title="messenger"><i class="fab fa-messenger"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6 col-12 fxt-bg-color">
                        <div class="fxt-content">
                            <div class="fxt-form">
                                <div id="emailAlert" style="display: none" class="alert alert-danger"></div>
                                <div id="userAlert" style="display: none" class="alert alert-danger"></div>
                                <div id="phoneAlert" style="display: none" class="alert alert-danger"></div>
                                <div id="passAlert" style="display: none" class="alert alert-danger"></div>
                                <div id="confPassAlert" style="display: none" class="alert alert-danger"></div>
                                <div id="error" style="display: none" class="alert alert-danger"></div>
                                <form id="form1" method="POST" action="" >
                                    <h3>Create an account for adding your hotels</h3>

                                    <div class="form-group">  
                                        <label for="fullname" class="input-label">Full Name</label>                                              
                                        <input id="fullname" type="text" class="form-control" name="fullname" placeholder="eg. Rebaz Mohammed Ali" required="required">
                                    </div>

                                    <div class="form-group">  
                                        <label for="email" class="input-label">Email Address</label>                                              
                                        <input id="email" type="email" id="email" class="form-control" name="email" placeholder="eg. Example@gmail.com" required="required">
                                    </div>
                                    <div class="form-group">  
                                        <label id="userName" for="user_name" class="input-label">User Name</label>                                              
                                        <input type="text" id="user_name" class="form-control" name="user_name" placeholder="eg. grand_millinume" required="required">
                                    </div>
                                    <div class="form-group">  
                                        <label for="phoneNumber" class="input-label">Phone Number</label>                                              
                                        <input type="text" id="phoneNumber" class="form-control" name="phone_number" placeholder="eg. 07708138928" required="required">
                                    </div>
                                    
                                    <div class="form-group">  
                                        <label for="pass" class="input-label">Password</label>                                               
                                        <input id="pass" type="password" class="form-control" name="password" placeholder="********" required="required">
                                        <i toggle="#pass" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                    </div>
                                    <div class="form-group">  
                                        <label for="conf_pass" class="input-label">Confirm Password</label>                                              
                                        <input id="conf_pass" type="password" class="form-control" name="conf_password" placeholder="********" required="required">
                                        <i toggle="#conf_pass" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                    </div>
                                    <!--  we don't need it
                                    <div class="form-group">
                                        <div class="fxt-checkbox-area">
                                            <div class="checkbox">
                                                <input id="checkbox1" type="checkbox">
                                                <label for="checkbox1">I agree with the terms and condition</label>
                                            </div>
                                        </div>
                                    </div>

                                -->
                                    <div class="form-group">
                                        <button name="wtf" type="button" class="fxt-btn-fill" onclick="
                       
                         function _(el){
                            return document.getElementById(el);
                        }

                        var alrt_em = _('emailAlert');
                        var alrt_us = _('userAlert');
                        var alrt_ph = _('phoneAlert');
                        var alrt_pw = _('passAlert');
                        var alrt_cpw = _('confPassAlert');

                        
                        var email =_('email').value;
                        var userName =_('userName').value;
                        var phoneNumber =_('phoneNumber').value;
                        var pass =_('pass').value;
                        var conf_pass =_('conf_pass').value;
                        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;//Email format
                        var phoneno = /^\d{11}$/;//phone num validation from 11
                        var illegalChars = /\W/; // allow letters, numbers, and underscores
                        var em;var us;var ph;var pw;var cpw;
                        if (email != '') {
                            em =1;
                            alrt_em.style.display ='none';
                        }
                        else{
                            em=0;
                            alrt_em.style.display ='block';
                            alrt_em.innerHTML ='<strong>Email field is empty!</strong>';
                        }
                        //checking emil validation
                        if(email.match(mailformat))
                        {
                        em =1;
                        alrt_em.style.display ='none';
                        }
                        else
                        {
                        em=0;
                        alrt_em.style.display ='block';
                        alrt_em.innerHTML ='<strong>Email Address is not valid</strong>';
                        }


                        if (userName == '') {
                            us=0;
                            alrt_us.style.display ='block';
                            alrt_us.innerHTML ='<strong>User Name field is empty!</strong>';
                            
                        }
                        else if(userName != ''){
                            us =1;
                            alrt_us.style.display ='none';
                        }

                        else if ((userName.length < 5) || (userName.length > 15)) {
                            us=0;
                            alrt_us.style.display ='block';
                            alrt_us.innerHTML ='<strong>The username should be berween 5 and 15 characters!</strong>';
                        
                 
                    } else if (illegalChars.test(userName)) {
                        us=0;
                            alrt_us.style.display ='block';
                            alrt_us.innerHTML ='<strong>The username contains illegal characters. letters, numbers and underscores are allowed!</strong>';
                 
                    } 


                        if (phoneNumber != '') {
                            ph =1;
                            alrt_ph.style.display ='none';
                        }
                        else{
                            ph=0;
                            alrt_ph.style.display ='block';
                            alrt_ph.innerHTML ='<strong>Phone Number field is empty!</strong>';
                        }

                        //Chcking phone number validation
                          if(phoneNumber.match(phoneno)){
                              ph_is_num =1;
                            alrt_ph.style.display ='none';
                                }
                              else
                                {
                                ph_is_num =0;
                            alrt_ph.style.display ='block';
                            alrt_ph.innerHTML ='<strong>Phone Number is not valid!</strong>';
                                }

                       
                        if (pass != '') {
                            pw =1;
                            alrt_pw.style.display ='none';
                        }
                        else{
                            pw=0;
                           alrt_pw.style.display ='block';
                            alrt_pw.innerHTML ='<strong>Password field is empty!</strong>';
                        }
                        if (conf_pass != '') {
                            cpw =1;
                            alrt_cpw.style.display ='none';
                        }
                        else{
                            cpw=0;
                            alrt_cpw.style.display ='block';
                            alrt_cpw.innerHTML ='<strong>Confirm password field is empty!</strong>';
                        }
                        if (em ==1 && us==1&&ph==1&&pw==1&&cpw==1&&ph_is_num==1) {
                            if( pass == conf_pass){
                                
                                document.getElementById('form1').submit();
                                

                                }
                                else{
                                    alrt_pw.style.display ='block';
                                    alrt_pw.innerHTML ='<strong>Passwords Are Not Matching!!</strong>';
                                }
                        }
                        
                        ">Register</button>
                                    </div>
                                </form>                            
                            </div> 
                            <div class="text-center">
                                <p>Have an account?<a href="index.php" class="switcher-text">Log in</a></p>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
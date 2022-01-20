<?php

session_start();

include('../db/db_connect.php');
if (!empty($_SESSION['login_user'])) {
  
  $hotel_id = $_SESSION['login_user'];
  $sql = "SELECT form_state FROM users WHERE hotel_id = '$hotel_id'";
  $query = mysqli_query($conn, $sql);
  $fetch = mysqli_fetch_array($query);
  $form_state =  $fetch['form_state'];
  if ($form_state =="1") {
    header("location:../cp");
  }

  else if ($form_state =="0") {
    header("location:profile.php");
  }

  
}
elseif (empty($_SESSION['login_user'])) {
    if (!isset($_POST['email'])) {
            echo "Nothing Post";
        }
    elseif (isset($_POST['email'])) {

        $email = htmlspecialchars($_POST['email']);
        $user_name = htmlspecialchars($_POST['user_name']);
            // Coverting email address and username to lowcase
        $email = strtolower($email) ;
        $user_name = strtolower($user_name);
        $password = htmlspecialchars($_POST['password']);
        $phone_number = htmlspecialchars($_POST['phone_number']);

        $sql_e = "SELECT * FROM users WHERE email ='$email'";
        $sql_u = "SELECT * FROM users WHERE user_name ='$user_name'";
        $result_e = mysqli_query($conn, $sql_e) or die(mysqli_error($conn));
        $result_u = mysqli_query($conn, $sql_u) or die(mysqli_error($conn));
        
        if (mysqli_num_rows($result_e) > 0) {
            echo "Email is used before";
        }
        elseif (mysqli_num_rows($result_u) > 0) {
            echo "User Name is taken";
        }
        else {

            $sql = "INSERT INTO users(email,user_name,password,phone_number) VALUES ('$email','$user_name','$password','$phone_number')";

        if ($conn->query($sql)) {
            
            $check="SELECT hotel_id FROM users WHERE email ='$email' ";
            $result=mysqli_query($conn,$check);
            $row = mysqli_fetch_array($result);
            $hotel_id = $row['hotel_id'];
            $hotel_row = "INSERT INTO hotels(hotel_id) VALUES('$hotel_id')";
            if ($conn->query($hotel_row)) {
                $facilites = "INSERT INTO f_s(hotel_id) VALUES('$hotel_id')";
                if ($conn->query($facilites)) {
                    $amenities = "INSERT INTO amenities(hotel_id) VALUES('$hotel_id')";
                    if ($conn->query($amenities)) {
                        $photos = "INSERT INTO photos(hotel_id) VALUES('$hotel_id')";
                        if ($conn->query($photos)) {
                            $policies = "INSERT INTO policies(hotel_id) VALUES('$hotel_id')";
                            if ($conn->query($policies)) {
                                $payment = "INSERT INTO payment(hotel_id) VALUES('$hotel_id')";
                                if ($conn->query($payment)) {
                                    $_SESSION['login_user'] = $hotel_id;
                                    //Creating folder with current user hotel name inside the hotels folder 

                                    // Create folder for Genaral hotel photos
                                    mkdir("users/$user_id/hotels/photos",0777,true);
                                    // Create folder for temperory rooms pictures
                                    mkdir("users/$user_id/hotels/tmp_rooms",0777,true);
                                    // Create folder for temperory rooms pictures
                                    mkdir("users/$user_id/hotels/rooms",0777,true);
;
                                    header('location:profile.php');
                                }
                            }
                        }
                    }
                    
                }
                else {
                    echo "Problem with inserting to the facilities table";
                }
            
            }
            else {
                echo "Something went wrong while creating a record for hotels table";
            }
            

            
        }
        else{
            echo "filed to register";
        }
        }
        


        
        }


    }



?>

<!DOCTYPE HTML>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="google-site-verification" content="XzvsW-NJhc4s2wmujUjF8LGA4LOXMLeihLRJKQseI7E" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Hjuzati complete booking and reservation system provides complete solution for travel agency">
<meta name="keywords" content="Hjuzati  hotels booking script, ">
<meta name="author" content="Hjuzati">
<title>supplier Registration</title>


<link rel="shortcut icon" href="../../uploads/global/favicon.png">
<link href="../../themes/new/assets/css/bootstrap.css" rel="stylesheet" media="screen">
<link href="../../themes/new/style.css" rel="stylesheet">
<link href="../../themes/new/assets/css/navigation.css" rel="stylesheet">
<!--<link href="https://www.Hjuzati.com/themes/new/eder.css" rel="stylesheet"> -->
<link href="../../themes/new/assets/css/mobile.css" rel="stylesheet" media="screen">
<!-- facebook --> <meta property="og:title" content="supplier Registration"/> <meta property="og:site_name" content="Hjuzati"/> <meta property="og:description" content="Hjuzati complete booking and reservation system provides complete solution for travel agency"/> <meta property="og:image" content="https://www.Hjuzati.com/uploads/global/favicon.png"/>  <meta property="og:url" content="https://www.Hjuzati.com/"/> <meta property="og:publisher" content="https://www.facebook.com/Hjuzati"/>



<link rel="stylesheet" href="bootstrap/tel_jquery/css/intlInputPhone.min.css">


<!-- Child Theme --> <style> @import "../../themes/new/assets/css/childstyle.css"; </style>
<!-- Google Maps --> <!-- jQuery --> <script src="../../themes/new/assets/js/jquery-2.2.4.min.js"></script>
<!-- RTL CSS --> <!-- Mobile Redirect -->  <script>if(/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)){ // window.location ="";
}</script> <!--[if lt IE 7] > <link rel="stylesheet" type="text/css" href="https://www.Hjuzati.com/themes/new/assets/css/font-awesome-ie7.css" media="screen" /> <![endif]-->
<!-- Autocomplete files-->
<link href="../../themes/new/assets/js/autocomplete/easy-autocomplete.min.css" rel="stylesheet" type="text/css">
<script src="../../themes/new/assets/js/autocomplete/jquery.easy-autocomplete.min.js" type="text/javascript" ></script>
<script src="../../assets/include/datepicker/datepicker.js"></script>
<script src="../../themes/new/assets/js/bootstrap.min.js"></script>
<!-- Autocomplete files-->
<script>var base_url = '../../index.php';</script>

</head>
<body>
 <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.php?id=GTM-5FN6PQG"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) --> 
<div id="preloader" class="loader-wrapper">
    <div class="progress">
     <div class="indeterminate"></div>
    </div>
</div>
<div class="modal  left  fade" id="sidebar_left" tabindex="1" role="dialog" aria-labelledby="sidebar_left">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close go-left" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="close icon-angle-left"></i></span></button>
                <h4 class="modal-title go-text-right" id="sidebar_left"><i class="icon_set_1_icon-65 go-right"></i> Settings</h4>
            </div>
            <ul class="nav navbar-nav navbar-side navbar-right sidebar go-left user_menu">
        <li id="li_myaccount">
        <a href="javascript:void(0);" data-toggle="dropdown" class="dropdown-toggle go-text-right"><i class="icon_set_1_icon-70 go-right"></i> My Account <b class="lightcaret mt-2 go-left"></b></a>
        <ul class="dropdown-menu">
            <li><a class="go-text-right" href="../../login.php"> Login</a></li>
            <li><a class="go-text-right" href="../../register.php">  Sign Up</a></li>
        </ul>
    </li>
        <div class="header-brdr pull-left hidden-xs hidden-md go-left"></div>
            <li class="dropdown">
            <a class="dropdown-toggle go-text-right" data-toggle="dropdown" href="#">
                <strong><i class="icon-money-2 go-right"></i> 
                    USD                </strong>
            </a>
            <ul class="dropdown-menu wow fadeIn">
                                <li>
                    <a class="go-text-right" data-code='1' href="#" onclick="change_currency(this)">
                        USD                    </a>
                </li>
                            </ul>
        </li>
            <ul class="nav navbar-nav">
        <li class="dropdown" style="margin-top:-9px">
            <a href="javascript:void(0);" data-toggle="dropdown" class="go-text-right dropdown-toggle" aria-expanded="true"> <img class="go-right flafFIX" src="../../uploads/images/language/en.png" width="21" height="14" alt="English"> English </a>
            <ul class="dropdown-menu wow fadeIn">
                                <li><a href="../../ru/supplier-register.php" data-langname="Russian" id="ru" class="go-text-right changelang" ><img class="go-right flafFIX" src="../../uploads/images/language/ru.png" width="21" height="14" alt="">  Russian</a></li>
                                <li><a href="../../fa/supplier-register.php" data-langname="Farsi" id="fa" class="go-text-right changelang" ><img class="go-right flafFIX" src="../../uploads/images/language/fa.png" width="21" height="14" alt="">  Farsi</a></li>
                                <li><a href="../../fr/supplier-register.php" data-langname="French" id="fr" class="go-text-right changelang" ><img class="go-right flafFIX" src="../../uploads/images/language/fr.png" width="21" height="14" alt="">  French</a></li>
                                <li><a href="../../tr/supplier-register.php" data-langname="Turkish" id="tr" class="go-text-right changelang" ><img class="go-right flafFIX" src="../../uploads/images/language/tr.png" width="21" height="14" alt="">  Turkish</a></li>
                                <li><a href="../../ar/supplier-register.php" data-langname="Arabic" id="ar" class="go-text-right changelang" ><img class="go-right flafFIX" src="../../uploads/images/language/ar.png" width="21" height="14" alt="">  Arabic</a></li>
                                <li><a href="../../es/supplier-register.php" data-langname="Spanish" id="es" class="go-text-right changelang" ><img class="go-right flafFIX" src="../../uploads/images/language/es.png" width="21" height="14" alt="">  Spanish</a></li>
                                <li><a href="../../en/supplier-register.php" data-langname="English" id="en" class="go-text-right changelang" ><img class="go-right flafFIX" src="../../uploads/images/language/en.png" width="21" height="14" alt="">  English</a></li>
                            </ul>
        </li>
    </ul>
            <li class="visible-xs mob-menu go-text-right"><i class="go-right icon_set_1_icon-87"></i> Services</li>
    <li class="visible-xs go-text-right"><a href="../../blog.php"><i class="icon_set_1_icon-93 go-right "></i> Blog        <i class="angle right icon pull-right"></i></a></li>
    <li class="visible-xs go-text-right"><a href="../../offers.php"><i class="icon_set_1_icon-93 go-right "></i> Offers      <i class="angle right icon pull-right"></i></a></li>
    <li class="visible-xs go-text-right"><a href="../../About-Us.php"><i class="icon_set_1_icon-93 go-right "></i> About us  <i class="angle right icon pull-right"></i></a></li>
    <li class="visible-xs go-text-right"><a href="../../Contact-Us.php"><i class="icon_set_1_icon-84 go-right "></i> Contact Us  <i class="angle right icon pull-right"></i></a></li>
    <li class="visible-xs go-text-right"><a href="../../Terms-of-Use.php"><i class="icon_set_1_icon-92 go-right "></i> Terms and Conditions  <i class="angle right icon pull-right"></i></a></li>
    <li class="visible-xs go-text-right"><a href="../../Privacy-Policy.php"><i class="icon_set_1_icon-17 go-right "></i> Privacy Policy  <i class="angle right icon pull-right"></i></a></li>
</ul>        </div>
    </div>
</div>
<div class="clearfix"></div>
   <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header go-right">
                                <button data-toggle="modal" data-target="#sidebar_left" class="navbar-toggle go-left" type="button" style="margin-right: 10px;">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                                <ul class="nav navbar-nav go-right">
                    <li class="text-center go-right">
                        <a href="../../index.php" class="navbar-brand go-right" style="padding-top: 0px;" target="">
                         <img class=" " src="../../uploads/global/logo.png" alt="supplier Registration" />
                           Home                        </a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav go-right">
              <!--<li class="text-center go-right"><a href="https://www.Hjuzati.com/">Home</a></li>-->
                                          <li class="text-center go-right"><a href="../../blog.php">Blog      </a></li>
              <li class="text-center go-right"><a href="../../offers.php">Offers    </a></li>
               <li class="text-center go-right"><a href="../../contact-us-2.php">Contact Us</a></li>
                            <li class="text-center go-right"><a href="../../About-Us.php">About us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right hidden-sm go-left">
              <ul class="nav navbar-nav navbar-side navbar-right sidebar go-left user_menu">
        <li id="li_myaccount">
        <a href="javascript:void(0);" data-toggle="dropdown" class="dropdown-toggle go-text-right"><i class="icon_set_1_icon-70 go-right"></i> My Account <b class="lightcaret mt-2 go-left"></b></a>
        <ul class="dropdown-menu">
            <li><a class="go-text-right" href="../../login.php"> Login</a></li>
            <li><a class="go-text-right" href="../../register.php">  Sign Up</a></li>
        </ul>
    </li>
        <div class="header-brdr pull-left hidden-xs hidden-md go-left"></div>
            <li class="dropdown">
            <a class="dropdown-toggle go-text-right" data-toggle="dropdown" href="#">
                <strong><i class="icon-money-2 go-right"></i> 
                    USD                </strong>
            </a>
            <ul class="dropdown-menu wow fadeIn">
                                <li>
                    <a class="go-text-right" data-code='1' href="#" onclick="change_currency(this)">
                        USD                    </a>
                </li>
                            </ul>
        </li>
            <ul class="nav navbar-nav">
        <li class="dropdown" style="margin-top:-9px">
            <a href="javascript:void(0);" data-toggle="dropdown" class="go-text-right dropdown-toggle" aria-expanded="true"> <img class="go-right flafFIX" src="../../uploads/images/language/en.png" width="21" height="14" alt="English"> English </a>
            <ul class="dropdown-menu wow fadeIn">
                                <li><a href="../../ru/supplier-register.php" data-langname="Russian" id="ru" class="go-text-right changelang" ><img class="go-right flafFIX" src="../../uploads/images/language/ru.png" width="21" height="14" alt="">  Russian</a></li>
                                <li><a href="../../fa/supplier-register.php" data-langname="Farsi" id="fa" class="go-text-right changelang" ><img class="go-right flafFIX" src="../../uploads/images/language/fa.png" width="21" height="14" alt="">  Farsi</a></li>
                                <li><a href="../../fr/supplier-register.php" data-langname="French" id="fr" class="go-text-right changelang" ><img class="go-right flafFIX" src="../../uploads/images/language/fr.png" width="21" height="14" alt="">  French</a></li>
                                <li><a href="../../tr/supplier-register.php" data-langname="Turkish" id="tr" class="go-text-right changelang" ><img class="go-right flafFIX" src="../../uploads/images/language/tr.png" width="21" height="14" alt="">  Turkish</a></li>
                                <li><a href="../../ar/supplier-register.php" data-langname="Arabic" id="ar" class="go-text-right changelang" ><img class="go-right flafFIX" src="../../uploads/images/language/ar.png" width="21" height="14" alt="">  Arabic</a></li>
                                <li><a href="../../es/supplier-register.php" data-langname="Spanish" id="es" class="go-text-right changelang" ><img class="go-right flafFIX" src="../../uploads/images/language/es.png" width="21" height="14" alt="">  Spanish</a></li>
                                <li><a href="../../en/supplier-register.php" data-langname="English" id="en" class="go-text-right changelang" ><img class="go-right flafFIX" src="../../uploads/images/language/en.png" width="21" height="14" alt="">  English</a></li>
                            </ul>
        </li>
    </ul>
            <li class="visible-xs mob-menu go-text-right"><i class="go-right icon_set_1_icon-87"></i> Services</li>
    <li class="visible-xs go-text-right"><a href="../../blog.php"><i class="icon_set_1_icon-93 go-right "></i> Blog        <i class="angle right icon pull-right"></i></a></li>
    <li class="visible-xs go-text-right"><a href="../../offers.php"><i class="icon_set_1_icon-93 go-right "></i> Offers      <i class="angle right icon pull-right"></i></a></li>
    <li class="visible-xs go-text-right"><a href="../../About-Us.php"><i class="icon_set_1_icon-93 go-right "></i> About us  <i class="angle right icon pull-right"></i></a></li>
    <li class="visible-xs go-text-right"><a href="../../Contact-Us.php"><i class="icon_set_1_icon-84 go-right "></i> Contact Us  <i class="angle right icon pull-right"></i></a></li>
    <li class="visible-xs go-text-right"><a href="../../Terms-of-Use.php"><i class="icon_set_1_icon-92 go-right "></i> Terms and Conditions  <i class="angle right icon pull-right"></i></a></li>
    <li class="visible-xs go-text-right"><a href="../../Privacy-Policy.php"><i class="icon_set_1_icon-17 go-right "></i> Privacy Policy  <i class="angle right icon pull-right"></i></a></li>
</ul>            </ul>
            </div>
        </div>
    </nav>
<div id="body-section"><style>
    .tabs{
    margin-top: 120px
    }
    .tour_margin{
    margin-left: 20px;
    margin-right: 20px;
    }
    @media (max-width: 480px){.tabs{margin-top: 35px !important;}}
    @media (max-width: 624px){.tour_margin{margin-left: 0px !important; margin-right: 0px !important}}
    .form {
    padding-left: 12px !important;
    }
</style>
    <div id="Carousel" class="carousel slide carousel-fade">
        <div class="carousel-inner fadeIn animated">
            <div class="item home-slider hero hidden-xs hidden-sm active" style="background-image:url(../../themes/new/assets/img/page.jpg) ">
                <div class="clearfix"></div>
                <div class="container hidden-xs hidden-sm">
                    <div class="carousel-caption text-center">
                        <h1 style="text-shadow: 0 7px 11px rgba(0,0,0,.5);padding: 0px">ADD YOUR BUSINESS</h1>
                        <div class="clearfix"></div>
                        <h4 style="text-shadow: 0 2px 6px rgba(0,0,0,2.5);color:#fff;">to grow exponentially</h4>
                        <div class="clearfix"></div>
                        <div class="form-group tabs">
                            <button id="hotels" class="btnz btn btn-default btn-lg showform"><i class="icon-building"></i> Add hotel</button>                                                                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container" +>
    <div class="panel-body" id="apply">
        <div class="well">
            <div class="col-xs-14 col-sm-14 col-md-14 col-lg-14">
                <form id="form1" class="form-horizontal" action="index.php" method="POST" >
                    <div class="panel-body">
                        <div class="col-md-10">
                            <fieldset>
                                <div id="emailAlert" hidden class="alert alert-danger"></div>
                                <div id="userAlert" hidden class="alert alert-danger"></div>
                                <div id="phoneAlert" hidden class="alert alert-danger"></div>
                                <div id="passAlert" hidden class="alert alert-danger"></div>
                                <div id="confPassAlert" hidden class="alert alert-danger"></div>
                                <div id="error" hidden class="alert alert-danger"></div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email Address</label>
                                    <div class="col-md-8">
                                        <input id="email" data-original-title="Email" data-toggle="tooltip" data-placement="top" class="form-control form" type="email" placeholder="eg.hima@gmail.com" name="email" value="" required >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">User Name</label>
                                    <div class="col-md-8">
                                        <input id="userName" data-original-title="User Name" data-toggle="tooltip" data-placement="top" class="form-control form" type="text" placeholder="eg. Hima_hotel" name="user_name" value="" required >
                                    </div>
                                </div>
                                <hr class="soften">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Phone Number</label>
                                    <div class="col-md-8">
                                        <input name="phone_number" id="phoneNumber" data-original-title="Phone" data-toggle="tooltip" data-placement="top" class="form-control form" type="text" placeholder="eg. 07708139028" name="mobile" value=""  >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Password</label>
                                    <div class="col-md-8">
                                        <input id="pass" data-original-title="password" data-toggle="tooltip" data-placement="top" class="form-control form" type="password" placeholder="Password" name="password" value="" required >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Confirm password</label>
                                    <div class="col-md-8">
                                        <input id="conf_pass" data-original-title="conf_password" data-toggle="tooltip" data-placement="top" class="form-control form" type="password" placeholder="Confirm Password" name="conf_password" value="" required >
                                    </div>
                                </div>
                                
                            </fieldset>
                        </div>
                    </div>
                    
                    <div class="panel-footer">
                       
                        <div class="clearfix"></div>
                        <br>
                        </form>
                        <button name="wtf" onclick="
                       
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
                        
                        " type="button" class="btn-block btn btn-lg btn-action center-block">Register</button>
                        <div class="clearfix"></div>
                        
                    </div>
                
            </div>
        </div>
    </div>
</div>
<div class="container">
        <h2 class="text-center h1-title">Hjuzati helps grow your business</h2>
    <hr class="hrs">
    <br><br>
    <div class="col-md-6 wow fadeInRight animated">
        <div class="col-md-2 icons_right"><i class="pull-left icon_set_2_icon-105 icons"></i></div>
        <div class="col-md-7">
            <h3 class="text-right"> Reach out to over 55 thousand travelers</h3>
        </div>
    </div>
    <div class="col-md-6 wow fadeInLeft animated">
        <div class="col-md-2">&nbsp;</div>
        <div class="col-md-2"><i class="pull-right icon_set_1_icon-12 icons"></i></div>
        <div class="col-md-7">
            <h3 class="text-left"> Receive customized sales advice</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <br>
    <div class="col-md-6 wow fadeInRight animated">
        <div class="col-md-2 icons_right"><i class="pull-left icon_set_1_icon-18 icons"></i></div>
        <div class="col-md-7">
            <h3 class="text-right"> Get direct bookings. no middle men!</h3>
        </div>
    </div>
    <div class="col-md-6 wow fadeInLeft animated">
        <div class="col-md-2">&nbsp;</div>
        <div class="col-md-2"><i class="pull-right icon_set_1_icon-30 icons"></i></div>
        <div class="col-md-7">
            <h3 class="text-left"> Listen and get insights no customer calls</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <br>
    <div class="col-md-6 wow fadeInRight animated">
        <div class="col-md-2 icons_right"><i class="pull-left icon_set_1_icon-35 icons"></i></div>
        <div class="col-md-7">
            <h3 class="text-right"> No listing fee. or hidden cost</h3>
        </div>
    </div>
    <div class="col-md-6 wow fadeInLeft animated">
        <div class="col-md-2">&nbsp;</div>
        <div class="col-md-2"><i class="pull-right icon_set_1_icon-63 icons"></i></div>
        <div class="col-md-7">
            <h3 class="text-left"> Get access to realtime dashboard</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <style>
        /*  .btn-default:hover, .btn-default:focus, .btn-default.focus, .btn-default:active, .btn-default.active, .open > .dropdown-toggle.btn-default {
        background-color: #FFFFFF;
        } */
        .icons {
        font-size: 60px !important;
        color: #0066FF !important;
        }
        .icons_right{
        float: right;
        margin-right: 126px;
        }
        body {
        background-color:#fff;
        }
        .btnz {
        min-width: 190px;
        border: 1px solid #fff;
        /* margin-right: 30px;*/
        height: 70px;
        background-color: rgba(0,0,0,.3);
        color: #fff;
        text-align: left;
        cursor: pointer;
        transition-duration: .5s;
        font-size:30px;
        }
        .btnz:hover {
        background-color: rgba(255, 255, 255, 0.3);
        border: 1px solid #fff;
        }
        .c-form--banner-bottom {
        position: absolute;
        bottom: 0;
        width: 100%;
        }
        .started {
        background-color: #f3f3f3;
        }
        .list {
        padding:15px 30px 15px 30px;border-radius:5px; box-shadow: 2px 2px 2px 0 rgba(44,49,55,.1)
        }
        .lapcon {
        position: absolute;
        font-size: 65px;
        margin-top: 25px;
        margin-left: 106px;
        color: #0066FF;
        }
        .hrs {
        margin-top: 14px;
        margin-bottom: 19px;
        border: 0;
        border-top: 4px solid #0066FF;
        margin-left: 35%;
        margin-right: 35%;
        }
        @media (max-width: 585px){.btnz{margin-bottom: 5px !important; width:100%;}}
        @media (max-width: 991px){.list{margin-bottom: 5px !important;}}
        @media (max-width: 1200px){.icons_right{margin-right: 110px !important;}}
        @media (max-width: 991px){.icons_right{margin-right:0px !important; float:none;}}
    </style>
</div>
<br><br>
<section class="started">
    <div class="container">
        <h2 class="text-center">Easy registration process</h2>
        <hr class="hrs">
        <div class="col-md-12">
            <div class="wow fadeInDown animated">
                <div class="step">
                    <div class="row-fluid img-thumbnail list">
                        <div class="col-md-4">
                            <img class="img-responsive" src="../../themes/new/assets/img/supplier/signup.png">
                        </div>
                        <div class="col-md-8">
                            <h3><strong>Sign Up</strong></h3>
                            <p>We show your service in a way that is relevant to guests around the world, in up to 40 countries. We also market your listings on search engines like Google, Bing and Yahoo to help you sell more with us and increase revenue!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wow fadeInDown animated">
                <div class="step">
                    <div class="row-fluid img-thumbnail list">
                        <div class="col-md-4">
                            <img class="img-responsive" src="../../themes/new/assets/img/supplier/verify.png">
                        </div>
                        <div class="col-md-8">
                            <h3><strong>Get Verified</strong></h3>
                            <p>Verify your business with us and get huge potential from our traffic where you get more revenue and better business online </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wow fadeInDown animated">
                <div class="step">
                    <div class="row-fluid img-thumbnail list">
                        <div class="col-md-4">
                            <img class="img-responsive" src="../../themes/new/assets/img/supplier/access.png">
                        </div>
                        <div class="col-md-8">
                            <h3><strong>Gain Access</strong></h3>
                            <p>Get access to your realtime dashboard and start managing your contents such as description, title, images, prices and availability dates.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="form-group">
        <div class="col-md-12">
            <br>
            <h3 class="text-center"><a class="btn btn-action btn-block btn-lg" href="#top"> Submit your business now </a></h3>
            <br><br>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $("#apply").hide();
        $("#hotelslabel").hide();
        $("#tourslabel").hide();
        $("#carslabel").hide();
        $(".showform").on("click",function(){
        var module = $(this).prop('id');
        $("#applyfor").val(module);
        $(".modulelabel").hide();
        $("#"+module+"label").show();
        $("#apply").slideDown();
        })
        })
</script></div> <!--/ .body-section -->


<div class="theme-hero-area mobside visible-lg">
    <div class="theme-hero-area-bg-wrap">
      <!--  <div class="theme-hero-area-bg-pattern theme-hero-area-bg-pattern-ultra-light" style="background-image:url(img/patterns/travel/1.png);"></div> -->
        <div class="theme-hero-area-grad-mask theme-hero-area-grad-mask-i"></div>
        <div class="theme-hero-area-inner-shadow theme-hero-area-inner-shadow-light"></div>
    </div>
    <div class="theme-hero-area-body">
        <div class="container">
            <div class="theme-page-section _p-0">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="theme-mobile-app">
                            <div class="row">
                                <div class="col-md-6 wow fadeIn">
                                    <div class="theme-mobile-app-section">
                                        <img class="theme-mobile-app-img" src="../../themes/new/assets/img/apps.png" alt="Image Alternative text" title="Image Title">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="theme-mobile-app-section">
                                        <div class="theme-mobile-app-body">
                                            <div class="theme-mobile-app-header go-text-right">
                                                <h2 class="theme-mobile-app-title">Get the mobile app!</h2>
                                                <p class="theme-mobile-app-subtitle">Our app has all your booking needs covered: Secure payment channels, easy 4-step booking process, and sleek user designs. What more could you ask for?</p>
                                            </div>
                                            <ul class="theme-mobile-app-btn-list">
                                                                                        <li>
                                                    <a class="btn btn-dark theme-mobile-app-btn" href="#">
                                                    <i class="theme-mobile-app-logo">
                                                    <img src="../../themes/new/assets/img/apple.png" alt="Image Alternative text" title="Image Title">
                                                    </i>
                                                    <span>Download on
                                                    <br>
                                                    <span>App Store</span>
                                                    </span>
                                                    </a>
                                                </li>
                                                                                                                                                <li>
                                                    <a class="btn btn-dark theme-mobile-app-btn" href="#">
                                                    <i class="theme-mobile-app-logo">
                                                    <img src="../../themes/new/assets/img/android.png" alt="Image Alternative text" title="Image Title">
                                                    </i>
                                                    <span>Download on
                                                    <br>
                                                    <span>Play Market</span>
                                                    </span>
                                                    </a>
                                                </li>
                                                                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="footer" class="">
    <aside class="footer-holder">
        <div class="container">
            <div class="row">
                <div class="footer-section">
                    <div class="col-md-6 col-xs-12 go-right">
                        <div class="nav-block">
                            <div class="row">
                                            <div class="wow fadeIn col-xs-4 col-md-3 footer-nav go-right" >
              <h2 class="title go-text-right"><strong>Company</strong></h2>
              <ul class="footerlist go-right go-text-right">
                                <li><a href="../../contact-us-2.php" target="" title="">Contact</a></li>
                                <li><a href="../../About-Us.php" target="" title="">About Us</a></li>
                                <li><a href="../../How-to-Book.php" target="" title="">How to Book</a></li>
                                <li><a href="../../Booking-Tips.php" target="" title="">Booking Tips</a></li>
                              </ul>
            </div>
                                            <div class="wow fadeIn col-xs-4 col-md-3 footer-nav go-right" >
              <h2 class="title go-text-right"><strong>Support</strong></h2>
              <ul class="footerlist go-right go-text-right">
                                <li><a href="../../Our-Partners.php" target="" title="">Our Partners</a></li>
                                <li><a href="../../Privacy-Policy.php" target="" title="">Privacy Policy</a></li>
                                <li><a href="../../Terms-of-Use.php" target="" title="">Terms of Use</a></li>
                              </ul>
            </div>
                                            <div class="wow fadeIn col-xs-4 col-md-3 footer-nav go-right" >
              <h2 class="title go-text-right"><strong>Business</strong></h2>
              <ul class="footerlist go-right go-text-right">
                                <li><a href="../../FAQ.php" target="" title="">FAQ</a></li>
                                <li><a href="../../supplier.php" target="_self" title="">Supplier Login</a></li>
                              </ul>
            </div>
                            </div>
                        </div>
                      <div class="clearfix"></div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="row custom-r">
                            <div class="col-lg-7 col-md-6 col-sm-6">
                                <div class="row-holder">
                                                                        <strong class="title go-text-right">Newsletter</strong>
                                    <div class="col-md-12">
                                        <div id="message-newsletter_2"></div>
                                        <form role="search" onsubmit="return false;">
                                        </form>
                                        <div class="row">
                                            <input type="email" class="form-control input-lg fccustom2 sub_email form-group" id="exampleInputEmail1" placeholder="Newsletter Enter your email" required>
                                            <div class="clearfix"></div>
                                            <button type="submit" class="btn btn-primary btn-block sub_newsletter ttu"> Subscribe</button>
                                        </div>
                                        <ul class="nav navbar-nav">
                                            <li>
                                                <a class="newstext" href="javascript:void(0);">
                                                    <div class="wow fadeIn subscriberesponse"></div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-6">
                                <div class="social-holder">
                                    <div class="social-block">
                                        <strong class="title">&nbsp;</strong>
                                        <ul class="social-networks">
                                                                                        <li>
                                                <a href="https://www.facebook.com/profile.php?id=100041696431520" data-toggle="tooltip" data-placement="top" title="Facebook" target="_blank"><img src="../../uploads/images/social/slufm6otpasooc.png" class="social-icons-footer" /></a>
                                            </li>
                                                                                        <li>
                                                <a href="https://twitter.com/HotelsIraq?s=09" data-toggle="tooltip" data-placement="top" title="Twitter" target="_blank"><img src="../../uploads/images/social/9ztbr148kh4o8c8.png" class="social-icons-footer" /></a>
                                            </li>
                                                                                        <li>
                                                <a href="https://www.youtube.com/channel/UCOfpvB28yUx2fbXmpolV3LA?view_as=subscriber" data-toggle="tooltip" data-placement="top" title="Youtube" target="_blank"><img src="../../uploads/images/social/2x0gv8uevg84484ggo.png" class="social-icons-footer" /></a>
                                            </li>
                                                                                        <li>
                                                <a href="https://www.instagram.com/iraq_hotels/?igshid=16jnaetj2pm82" data-toggle="tooltip" data-placement="top" title="Instagram" target="_blank"><img src="../../uploads/images/social/7akmdaaqxa4g8gs0k.png" class="social-icons-footer" /></a>
                                            </li>
                                                                                        <li>
                                                <a href="https://wa.me/962795522670" data-toggle="tooltip" data-placement="top" title="WhatsaApp" target="_blank"><img src="../../uploads/images/social/528076email.png.png" class="social-icons-footer" /></a>
                                            </li>
                                                                                    </ul>
                                    </div>
                                </div>
                                <div class="logo-block">
                                    <div class="stripe-holder">
                                        <img src="../../themes/new/assets/img/payments.png" class="img-responsive payments" alt="payments">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </aside>
    <!--
    <div class="hidden-xs hidden-sm">
    <div class="container">
    <div class="row">
    <div class="col-12 col-sm-12 col-md-2 text-right">
    <a href="https://www.Hjuzati.com/"><img src="https://www.Hjuzati.com/uploads/global/logo.png" class="pull-right img-responsive"/></a>
    </div>
    </div>
    </div>
    </div>
    -->

    <!-- ********************   Removing powered by linkback will result to cancellation of your support service.    ********************  
    <div class="hidden-xs hidden-sm" style="padding:10px;background:#8c1f02;">
      <div class="container">
       <div class="text-center"><strong>Powered by </strong><a href="https://www.Hjuzati.com" target="_blank"> <img src="https://www.Hjuzati.com/uploads/global/logo.png" style="height:22px" height="22" alt="Hjuzati" /> <strong>Hjuzati</strong></a></div>
      </div>
    </div>
    ********************   Removing powered by linkback will result to cancellation of your support service.    ********************  -->

    <footer class="footer-frame">
        <div class="container">
            <div class="row">
                <div class="col-md-6 hidden-xs">
                   <!-- <a class="btn btn-success go-text-right" style="background-color:#999900;" target="_blank" href="https://drive.google.com/drive/folders/1YHBet_qRjoq73fmnFHZhmMV7XS3Zrjur">Attach Contract<img src="https://www.Hjuzati.com/uploads/images/hotels/amenities/linkfile.png" style="height:23px; padding: 5px;" height="23"/></a> -->
                                        <a class="btn btn-warning" target="_blank" href="index.php">Supplier Sign Up</a>
                                        <a class="btn btn-success" target="_blank" href="../../supplier/index.php">Supplier Login</a>
                </div>
                <!--<ul class="phone-list" id="phone-list">
                                        <li class="go-right">
                    <i class="icon_set_1_icon-55 go-right align-M mrg5-R f-grey66 fs13"></i>
                    <span class="contact-no align-M">Call Now: <a href="#tel:00962795522670 , 0096265522670" class="number">00962795522670 , 0096265522670</a></span>
                    </li>
                                                            <li class="go-right">
                    <i class="fa fa-envelope-o go-right align-M mrg5-R f-grey66 fs13"></i>
                    <span class="tp-mail"><a title="Mail" href="mailto:support@Hjuzati.com">support@Hjuzati.com</a></span>
                    </li>
                                        </ul>-->
                <div class="col-md-6">
                    <div class="copyright text-right pull-right m_tc">
                        <h5 style="padding-right:25px">All Rights Reserved by Hjuzati</h5>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<div class="rightsdiv">
<!-- tripadvisors block -->
<!-- tripadvisors block -->

<div class="hidden-xs hidden-sm gotopDiv">
    <div class="container text-right">
        <a href="javascript:void" class="gotop scroll wow fadeInUp btn btn-default"><i class="icon-up-open-big"></i></a>
    </div>
</div>
</div>

<style>
.cc-window{opacity:1;transition:opacity 1s ease;}
.cc-link{text-decoration:underline;}
.cc-window{left:0;right:0;bottom:0px;position:fixed;overflow:hidden;box-sizing:border-box;font-size:16px;line-height:1.5em;display:-ms-flexbox;display:flex;-ms-flex-wrap:nowrap;flex-wrap:nowrap;z-index:9999;}
.cc-window.cc-banner{padding:1em 1.8em;width:100%;-ms-flex-direction:row;flex-direction:row;}
.cc-btn,.cc-link{cursor:pointer;}
.cc-link{opacity:.8;padding:.2em;}
.cc-link:hover{opacity:1;} .cc-link:active,.cc-link:visited{color:initial;}
.cc-btn{display:block;padding:.4em .8em;font-size:.9em;font-weight:700;border-width:2px;border-style:solid;text-align:center;white-space:nowrap;}
.cc-window.cc-banner{-ms-flex-align:center;align-items:center;}
.cc-banner .cc-message{display:block;-ms-flex:1 1 auto;flex:1 1 auto;max-width:100%;margin-right:1em;}
.cc-compliance{display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center;-ms-flex-line-pack:justify;align-content:space-between;}
@media print{
.cc-window{display:none;} } @media screen and (max-width:900px){
.cc-btn{white-space:normal;} } @media screen and (max-width:414px) and (orientation:portrait),screen and (max-width:736px) and (orientation:landscape){
.cc-window.cc-top{top:0;}
.cc-window.cc-banner{left:0;right:0;}
.cc-window.cc-banner{-ms-flex-direction:column;flex-direction:column;}
.cc-window.cc-banner .cc-compliance{-ms-flex:1 1 auto;flex:1 1 auto;}
.cc-window .cc-message{margin-bottom:1em;}
.cc-window.cc-banner{-ms-flex-align:unset;align-items:unset;}
.cc-window.cc-banner .cc-message{margin-right:0;} }
.cc-color-override--1961008818.cc-window{color:rgb(255, 255, 255);background-color:rgb(0, 0, 0);}
.cc-color-override--1961008818 .cc-link,.cc-color-override--1961008818
.cc-link:active,.cc-color-override--1961008818 .cc-link:visited{color:rgb(255, 255, 255);}
.cc-color-override--1961008818 .cc-btn{color:rgb(0, 0, 0);border-color:transparent;background-color:rgb(241, 214, 0);padding:5px 25px;}
.cc-color-override--1961008818 .cc-btn:hover,.cc-color-override--1961008818
.cc-btn:focus{background-color:rgb(255, 252, 38);}
</style>

<!-- <div id="cookyGotItBtnBox" style="display: none" data-wow-duration="0.5s" data-wow-delay="5s" role="dialog" class="wow fadeIn cc-window cc-banner cc-type-info cc-theme-block cc-color-override--1961008818 ">
<span id="cookieconsent:desc" class="cc-message">This website uses cookies to ensure you get the best experience on our website. <a aria-label="learn more about cookies" role="button" tabindex="0" class="cc-link" href="https://www.Hjuzati.com/cookies-policy" rel="noopener noreferrer nofollow" target="_blank">Learn more</a></span>
<div class="cc-compliance">
<button aria-label="dismiss cookie message" role="button" tabindex="0" class="cc-btn cc-dismiss" id="cookyGotItBtn">Got it!</button></div></div> -->

<script src="../../themes/new/assets/js/scripts.js"></script>
<script>
    const cookyDisablePeriodInDays = 100;
    function createCookie(cookieName,cookieValue,daysToExpire)
    {
        var date = new Date();
        date.setTime(date.getTime()+(daysToExpire*24*60*60*1000));
        document.cookie = cookieName + "=" + cookieValue + "; expires=" + date.toGMTString();
    }
    function accessCookie(cookieName)
    {
        var name = cookieName + "=";
        var allCookieArray = document.cookie.split(';');
        for(var i=0; i<allCookieArray.length; i++)
        {
            var temp = allCookieArray[i].trim();
            if (temp.indexOf(name)==0)
                return temp.substring(name.length,temp.length);
        }
        return "";
    }
    // If user accept cooky policy by clicking `Got It` button then do not show the button to the user.
    /*const cookyGotItStatus = accessCookie("cookyGotItButton");
    if (cookyGotItStatus != "" && cookyGotItStatus == "hide") {
        $("#cookyGotItBtnBox").css("display", "none");
    } else {
        setTimeout(function () {
            console.log('show');
            $("#cookyGotItBtnBox").css("display", "flex");
        }, 1000);
    }
    $("#cookyGotItBtn").click(function () {
        createCookie("cookyGotItButton", "hide", cookyDisablePeriodInDays);
        $("#cookyGotItBtnBox").css("display", "none");
    }); */

    // Travelport flight: start
    // First, checks if it isn't implemented yet.
    if (!String.prototype.format) {
     String.prototype.format = function() {
       var args = arguments;
       return this.replace(/{(\d+)}/g, function(match, number) {
         return typeof args[number] != 'undefined'
         ? args[number]
         : match
         ;
       });
     };
   }
   $(function(){
           var adult = parseInt($("[name='tadult']").val()); // Should be 1
           var children = parseInt($("[name='tchildren']").val());
           var infant = parseInt($("[name='tinfant']").val());
           var totalPassenger = (adult + children + infant);
           var triptype = 'oneway';
           var arrivalDatetimePicker = $("[name='arrival']");
           arrivalDatetimePicker.attr('disabled', 'disabled').css('background', '#d9d9d9');
           $(".trip-check label, .iCheck-helper").on('click', function() {
             triptype = $(this).parent().find("input").val();
             if (triptype == 'oneway') {
               arrivalDatetimePicker.attr('disabled', 'disabled').css('background', '#d9d9d9');
               arrivalDatetimePicker.removeAttr('required');
             } else {
               arrivalDatetimePicker.removeAttr('disabled').css('background', '#F9F9F9');
               arrivalDatetimePicker.attr('required', 'required');
             }
             arrivalDatetimePicker.val('');
           });
           
           $(".widget-select2").select2({
             placeholder: "Enter Location",
             minimumInputLength: 3,
             width: '100%',
             maximumSelectionSize: 1,
             ajax:{
               url: 'https://www.Hjuzati.com/Suggestions/airports/tport',
               dataType: 'json',
               data: function(term, page) {
                 return {
                   q: term
                 }
               },
               results: function(data, page) {
                 return {
                   results: data
                 }
               }
             },
             initSelection : function (element, callback) {
               var elementText = $(element).val();
               callback({"text": elementText, "id": elementText});
             }
           });

           var nowTemp = new Date();
           var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
           // Depature time
           var departureTime = $('.departureTime').datepicker({
             format: 'yyyy-mm-dd',
             onRender: function(date) {
               return date.valueOf() < now.valueOf() ? 'disabled' : '';
             }
           }).on('changeDate', function(e){
             $(this).datepicker('hide');
             if (triptype == 'round' || triptype == 'return') {
               var newDate = new Date(e.date);
               arrivalTime.setValue(newDate.setDate(newDate.getDate() + 1));
               $('.arrivalTime').focus();
             }
           }).data('datepicker');

         //  Arrival time
         var arrivalTime = $('.arrivalTime').datepicker({
           format: 'yyyy-mm-dd',
           onRender: function(date) {
             return date.valueOf() <= departureTime.date.valueOf() ? 'disabled' : '';
           }
         }).on('changeDate', function(){
           $(this).datepicker('hide');
         }).data('datepicker');

           // Default fill up date
           if($('.departureTime').length > 0){
            if(departureTime.element.val()) {
             departureTime.setValue(departureTime.element.val());
           }
         }
         if($('.arrivalTime').length > 0) {
           if(arrivalTime.element.val()) {
             arrivalTime.setValue(arrivalTime.element.val());
           }
         }

         $("[name='tadult']").on('change', function() { adult = parseInt($("[name='tadult']").val()); });
         $("[name='tchildren']").on('change', function() { children = parseInt($("[name='tchildren']").val()); });
         $("[name='tinfant']").on('change', function() { infant = parseInt($("[name='tinfant']").val()); });
         $("#tsumPassenger").on('click', function() {
           totalPassenger = (adult + children + infant);
           $("[name='ttotalPassenger']").val(totalPassenger);
         });

         $("form[name='flightSearch']").on('submit', function(e) {
           e.preventDefault();
           var payload = {
             triptype: triptype,
             cabinclass: $('[name="cabinclass"]').val(),
             passenger: {
               total: totalPassenger,
               adult: adult,
               children: children,
               infant: infant
             },
             origin: $(this).find("[name='origin']").val(),
             destination: $(this).find("[name='destination']").val(),
             departure: $(this).find("[name='departure']").val(),
             arrival: $(this).find("[name='arrival']").val(),
           };

           $('.loader-wrapper').show();
           $.post(base_url + 'flight/getLowFareFlights', payload, function(response) {
             $('.loader-wrapper').hide();
             $('#body-section').php(response.body);
             window.history.pushState("", "", get_path('flight/search', payload));
           });
         });
       });

function get_path(req, payload)
{
 var return_hash = "{0}/{1}/{2}/{3}".format(req, payload.origin, payload.destination, payload.departure);

 if (payload.arrival) {
   return_hash = "{0}/{1}".format(return_hash, payload.arrival)
 }
 if (payload.cabinclass) {
   return_hash = "{0}/{1}".format(return_hash, payload.cabinclass)
 }
 if (payload.passenger.adult) {
   return_hash = "{0}/{1}Adult".format(return_hash, payload.passenger.adult)
 }
 if (payload.passenger.children) {
   return_hash = "{0}/{1}Children".format(return_hash, payload.passenger.children)
 }
 if (payload.passenger.infant) {
   return_hash = "{0}/{1}Infant".format(return_hash, payload.passenger.infant)
 }

 return base_url + return_hash;
}
   // Travelport flight: end

   if (!String.prototype.format) {
    String.prototype.format = function() {
      var args = arguments;
      return this.replace(/{(\d+)}/g, function(match, number) {
        return typeof args[number] != 'undefined'
        ? args[number]
        : match
        ;
      });
    };
  }

  $(function(){

    var triptype = 'oneway';
    var manualtriptype = $('input[name=triptype]:checked').val();

    var arrivalDatetimePicker = $("[name='arrival']");
    arrivalDatetimePicker.attr('disabled', 'disabled').css('background', '#d9d9d9');
    $(".trip-check label, .iCheck-helper").on('click', function() {
      manualtriptype = $(this).parent().find("input").val();
      if (manualtriptype == 'oneway') {
        arrivalDatetimePicker.attr('disabled', 'disabled').css('background', '#d9d9d9');
        arrivalDatetimePicker.removeAttr('required');
      } else {
        arrivalDatetimePicker.removeAttr('disabled').css('background', '#F9F9F9');
        arrivalDatetimePicker.attr('required', 'required');
      }
      arrivalDatetimePicker.val('');
    });

    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
        // Depature time
        var departureTime = $('.departureTime').datepicker({
          format: 'yyyy-mm-dd',
          onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(e){
          $(this).datepicker('hide');
          if (manualtriptype == 'round') {
            var newDate = new Date(e.date);
            arrivalTime.setValue(newDate.setDate(newDate.getDate() + 1));
            $('.arrivalTime').focus();
          }
        }).data('datepicker');

        // Arrival time
        var arrivalTime = $('.arrivalTime').datepicker({
          format: 'yyyy-mm-dd',
          onRender: function(date) {
            return date.valueOf() <= departureTime.date.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(){
          $(this).datepicker('hide');
        }).data('datepicker');

        // Default fill up date
        if(departureTime != undefined) {
          if(departureTime.element.val()) {
            departureTime.setValue(departureTime.element.val());
          }
        }
        if(departureTime != undefined) {
          if(arrivalTime.element.val()) {
            arrivalTime.setValue(arrivalTime.element.val());
          }
        }
        var madult = parseInt($("[name='madult']").val()); // Should be 1
        var mchildren = parseInt($("[name='mchildren']").val());
        var minfant = parseInt($("[name='minfant']").val());
        var totalManualPassenger = (madult + mchildren + minfant);
        $("[name='madult']").on('change', function() { madult = parseInt($(this).val()); });
        $("[name='mchildren']").on('change', function() { mchildren = parseInt($(this).val()); });
        $("[name='minfant']").on('change', function() { minfant = parseInt($(this).val()); });
        $("#sumManualPassenger").on('click', function() {
          totalManualPassenger = (madult + mchildren + minfant);
          $("[name='totalManualPassenger']").val(totalManualPassenger);
        });



        // // iati origin
        // $('input[name="iorigin"]').select2('val', 'HEHEHE');
        // $('input[name="idestination"]').select2('val', 'HUHUHUHU');
        var adult = parseInt($("[name='iadult']").val()); // Should be 1
        var children = parseInt($("[name='ichildren']").val());
        var infant = parseInt($("[name='iinfant']").val());
        var xtotalManualPassenger = (adult + children + infant);
        $("[name='iadult']").on('change', function() { adult = parseInt($(this).val()); });
        $("[name='ichildren']").on('change', function() { children = parseInt($(this).val()); });
        $("[name='iinfant']").on('change', function() { infant = parseInt($(this).val()); });
        $("#isumPassenger").on('click', function() { 
          var xtotalManualPassenger = (adult + children + infant);
          $("[name='totalPassenger']").val(xtotalManualPassenger);
            // console.log(xtotalManualPassenger);
          });



        
        $('#location_from_code').val('{"code":null,"location":""}');
        $('#location_to_code').val('{"code":null,"location":""}');
        $('#location_from').select2(
        {
          placeholder: "Enter City Or Airport",
          minimumInputLength: 3,
          width:'100%', maximumSelectionSize: 1,
          initSelection: function (element, callback) {
            var data = {id: "1", text: ""};
            callback(data);
          },
          ajax: {
            url: "https://www.Hjuzati.com/admin/ajaxcalls/flightAjex",
            dataType: 'json',
            data: function (term, page) {
              return {
                        query: term, // search term

                      };
                    },
                    results: function (data, page) {

                      return {results: data};
                    }
                  }
                }
                );

        $('#location_from').on("select2-selecting", function(e) {
          $("#location_from_code").val(e.val);
          console.log(e.val);
        });




        $('#location_to').select2(
        {
          placeholder: "Enter City Or Airport",
          minimumInputLength: 3,
          width:'100%', maximumSelectionSize: 1,
          initSelection: function (element, callback) {
            var data = {id: "1", text: ""};
            callback(data);
          },
          ajax: {
            url: "https://www.Hjuzati.com/admin/ajaxcalls/flightAjex",
            dataType: 'json',
            data: function (term, page) {
              return {
                        query: term, // search term

                      };
                    },
                    results: function (data, page) {

                      return {results: data};
                    }
                  }
                }
                );

        $('#location_to').on("select2-selecting", function(e) {
         $("#location_to_code").val(e.val);
         console.log(e.val);
       });


        $("form[name='flightmanualSearch']").on('submit', function(e) {
          e.preventDefault();
          var payload = {
            triptype: manualtriptype,
            cabinclass: $('[name="cabinclass"]').val(),
            passenger: {
              total: totalManualPassenger,
              adult: madult,
              children: mchildren,
              infant: minfant
            },
            origin: jQuery.parseJSON($(this).find("[name='origin']").val()).code,
            destination: jQuery.parseJSON($(this).find("[name='destination']").val()).code,
            departure: $(this).find("[name='departure']").val(),
            arrival: $(this).find("[name='arrival']").val(),
          };
          $('.loader-wrapper').show();
          window.location.href = get_manual_path('flights', payload);
        });
        function get_manual_path(req, payload)
        {
          var return_hash = "{0}/{1}/{2}/{3}".format(req, payload.origin, payload.destination, payload.departure);

          if (payload.arrival) {
            return_hash = "{0}/{1}".format(return_hash, payload.arrival)
          }else{
            return_hash = "{0}/{1}".format(return_hash, 0)

          }
          if (payload.triptype) {
            return_hash = "{0}/{1}".format(return_hash, payload.triptype)
          }
          if (payload.cabinclass) {
            return_hash = "{0}/{1}".format(return_hash, payload.cabinclass)
          }
          if (payload.passenger.adult) {
            return_hash = "{0}/{1}".format(return_hash, payload.passenger.adult)
          }
          return_hash = "{0}/{1}".format(return_hash, payload.passenger.children);
          return_hash = "{0}/{1}".format(return_hash, payload.passenger.infant);
          return_hash = "{0}/{1}".format(return_hash, 0);
          return_hash = "{0}/{1}".format(return_hash, 0);
          return_hash = "{0}/{1}".format(return_hash, 0);

            // alert(JSON.stringify(payload.passenger));
        // alert(payload.passenger.children);
        return base_url + return_hash;
      }

    });

$(document).ready(function(){
        // Safari 3.0+ "[object HTMLElementConstructor]"
        var isSafari = Object.prototype.toString.call(window.phpElement).indexOf('Constructor') > 0 || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || safari.pushNotification);
        if(isSafari == true){
          $(".bg-warning").css("padding-bottom", "82px !important");
        }
      });

$(".car-startlocation").select2({
  placeholder: "Search for an Item",
  minimumInputLength: 3,
  width: '100%',
  maximumSelectionSize: 1,
  ajax: {
    url: 'https://www.Hjuzati.com/cartrawler/getLocations',
    dataType: 'json',
    type: "GET",
    quietMillis: 50,
    data: function (term) {
      return {
        term: term
      };
    },
    results: function (data) {
      return {
        results: $.map(data.locations, function (item) {
          return {
            text: item.locationName,
            code: item.locationCode,
            id: item.locationName
          }
        })
      };
    }
  }
});
$(".car-endlocation").select2({
  placeholder: "Search for an Item",
  minimumInputLength: 3,
  width: '100%',
  maximumSelectionSize: 1,
  ajax: {
    url: 'https://www.Hjuzati.com/cartrawler/getLocations',
    dataType: 'json',
    type: "GET",
    quietMillis: 50,
    data: function (term) {
      return {
        term: term
      };
    },
    results: function (data) {
      return {
        results: $.map(data.locations, function (item) {
          return {
            text: item.locationName,
            code: item.locationCode,
            id: item.locationName
          }
        })
      };
    }
  }
});

$(".car-startlocation").on("select2-selecting",function(e){
  $("input[name='pickupLocationId']").val(e.object.code);
  $("input[name='returnLocationId']").val(e.object.code);
  $('.car-endlocation').select2('data', {
    text: e.object.text,
    id: e.object.text
  });
});

var options = {
  url: function(phrase) {
   return "https://yasen.hotellook.com/autocomplete?lang=en-US&limit=10&term="+phrase;
 },
 categories:[{
  listLocation: "cities"
}],
list: {
  match: {
    enabled: false
  },
  maxNumberOfElements: 10
},
getValue: "fullname",
};
$("#citiesInput").easyAutocomplete(options);

var fmt = "dd/mm/yyyy";
var baseURL = "../../index.php";

// $(document).ready(function() {

  /* Wish list global function */
  $(".wishlistcheck").on("click",function(){
    var id = $(this).prop('id');
    var module = $(this).data('module');
    var userid = "";
    var action = "add";
    var thisdiv = $(this);
    if($(this).hasClass('fav')){
      action = "remove";
    }


    $.post(baseURL+'account/wishlist/'+action,{module: module, itemid: id, loggedin: userid},function(resp){
      var response = $.parseJSON(resp);
      if(response.isloggedIn){

        if(action == "remove"){
          $("."+module+"wishsign"+id).php("+");
        //$("."+module+"wishtext"+id).php("Add to Wishlist");
        $("."+module+"wishtext"+id).tooltip('hide').attr('data-original-title', "Add to wishlist").tooltip('fixTitle').tooltip('show');
        $("."+module+"wishsign"+id).removeClass("fav");
        thisdiv.removeClass('fav');

      }else{

        thisdiv.addClass('fav');
        $("."+module+"wishsign"+id).addClass("fav");
        $("."+module+"wishsign"+id).php("-");
        //$("."+module+"wishtext"+id).php("Remove From Wishlist");
        $("."+module+"wishtext"+id).tooltip('hide').attr('data-original-title', "Remove from wishlist").tooltip('fixTitle').tooltip('show');

      }

    }else{
      alert("Please Login to add to wishlist.");
    }

  });

  });
  /* End Wish list global function */


  /* tours ajax categories loader */
  
  /* cars ajax types loader */
  
  /* Datepicker */
  /* disabling dates */
  var nowTemp = new Date();
  var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
  var checkin = $('.dpd1').datepicker({
    format: fmt,
    onRender: function(date) {
      return date.valueOf() < now.valueOf() ? 'disabled' : '';
    }
  }).on('changeDate', function(ev) {
    // if (ev.date.valueOf() > checkout.date.valueOf()) {
      var newDate = new Date(ev.date);
      newDate.setDate(newDate.getDate() + 1);
      checkout.setValue(newDate);
    // }
    checkin.hide();
    $('.dpd2')[0].focus();
  }).data('datepicker');
  var checkout = $('.dpd2').datepicker({
    format: fmt,
    onRender: function(date) {
      return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
    }
  }).on('changeDate', function(ev) {
    var newDate = new Date(ev.date);
    checkout.hide();

  }).data('datepicker');

  /* disabling dates for rooms search */
  var nowTemprooms = new Date();
  var nowrooms = new Date(nowTemprooms.getFullYear(), nowTemprooms.getMonth(), nowTemprooms.getDate(), 0, 0, 0, 0);
  var checkinrooms = $('.dpd1rooms').datepicker({
    format: fmt,
    onRender: function(date) {
      return date.valueOf() < now.valueOf() ? 'disabled' : '';
    }
  }).on('changeDate', function(ev) {
    // if (ev.date.valueOf() > checkout.date.valueOf()) {
      var newDaterooms = new Date(ev.date);
      newDaterooms.setDate(newDaterooms.getDate() + 1);
      checkoutrooms.setValue(newDaterooms);
    // }
    checkinrooms.hide();
    $('.dpd2rooms')[0].focus();
  }).data('datepicker');
  var checkoutrooms = $('.dpd2rooms').datepicker({
    format: fmt,
    onRender: function(date) {
      return date.valueOf() <= checkinrooms.date.valueOf() ? 'disabled' : '';
    }
  }).on('changeDate', function(ev) {
    var newDaterooms = new Date(ev.date);
    checkoutrooms.hide();

  }).data('datepicker');

  /* Expedia datepicker */
    /* End Expedia Datepicker*/

  /* Dohop datepicker */
    /* End Dohop Datepicker*/

      



    /* Newsletter subscription */
    $(".sub_newsletter").on("click",function(){var e=$(".sub_email").val();$.post("../../index.php",{email:e},function(e){$(".subscriberesponse").php(e).fadeIn("slow"),setTimeout(function(){$(".subscriberesponse").fadeOut("slow")},2000)})});

    /* dropdown on hover */
    $("ul.nav li.dropdown").hover(function(){$(this).find(".dropdown-menu").stop(!0,!0).delay(200).fadeIn(200)},function(){$(this).find(".dropdown-menu").stop(!0,!0).delay(200).fadeOut(200)});

// }); end: $(function(){});

/* start change currency functionality */
function change_currency(element){
  var currency_id = $(element).data('code');
  $("#loadingbg").css("display","block"),
  $.post("../../admin/ajaxcalls/changeCurrency.php",{ id: currency_id}, function() {
    location.reload();
  }
  )};

  /* map iframe modal */
  function showMap(a,o){"modal"==o?($("#mapModal").modal("show"),$("#mapModal").on("shown.bs.modal",function(){$("#mapModal .mapContent").php('<iframe src="'+a+'" width="100%" height="450" frameborder="0" style="border:0"></iframe>')})):$("#"+o).php('<iframe src="'+a+'" width="100%" height="450" frameborder="0" style="border:0"></iframe>')}
</script>




</body>

</html>
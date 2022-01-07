<?php
session_start();
//Storing the user id of the hotel owner

require('../db.php');
require('gcp/cp/classes/guest.php');
require('services/booking.php');
require('services/cities.php');

if(isset($_SESSION['login_user'])){
    $user_id =  $_SESSION['login_user'];
}

if(isset($_SESSION['guest'])){
    $guest = unserialize($_SESSION['guest']);
}

?>

<header id="header" class="u-header u-header--dark-nav-links-xl u-header--show-hide-xl u-header--static-xl" data-header-fix-moment="500" data-header-fix-effect="slide" >
    <div class="u-header__section u-header__shadow-on-show-hide py-4 py-xl-0">
        <!-- Topbar -->
        <div class="container-fluid u-header__hide-content u-header__topbar u-header__topbar-lg border-bottom border-color-8">
            <div class="d-flex align-items-center">
                <ul class="list-inline list-inline-dark u-header__topbar-nav-divider--dark mb-0">
                    <span class="flaticon-call"></span>
                    <li class="list-inline-item mr-0"><a href="tel:(964) 770 - 8138928" class="u-header__navbar-link">(964) 770 - 813 -8928</a></li>
                    <!-- Email Address -->
                    <!-- <span class="flaticon-email"></span>
                    <li class="list-inline-item mr-0"><a href="mailto:info@hjuzati.com" class="u-header__navbar-link">info@himaHotels.com</a></li> -->
                        <li class="list-inline-item">
                            <a class="btn btn-xs btn-icon btn-pill btn-soft-dark btn-bg-transparent transition-3d-hover" href="https://www.facebook.com/HIMA.hotels" target="_blank">
                                <span class="fab fa-facebook-f btn-icon__inner"></span>
                            </a>
                        </li>
                        
                        <li class="list-inline-item">
                            <a class="btn btn-xs btn-icon btn-pill btn-soft-dark btn-bg-transparent transition-3d-hover" href="https://www.instagram.com/hima.hotels" target="_blank">
                                <span class="fab fa-instagram btn-icon__inner"></span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-xs btn-icon btn-pill btn-soft-dark btn-bg-transparent transition-3d-hover" href="https://wa.me/9647708138928" target="_blank">
                                <span class="fab fa-whatsapp btn-icon__inner"></span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-xs btn-icon btn-pill btn-soft-dark btn-bg-transparent transition-3d-hover" href="http://m.me/HIMA.hotels" target="_blank">
                                <span class="fab fa-facebook-messenger btn-icon__inner"></span>
                            </a>
                        </li>   
                </ul>
                <div class="ml-auto d-flex align-items-center">
            


        <!-- #############   Start of currency dropdown menue   ############# -->

                    <div class="position-relative pl-3 language-switcher dropdown-connector-xl u-header__topbar-divider--dark">
                        <a id="languageDropdownInvoker" class="dropdown-nav-link  d-flex align-items-center ml-1 " href="javascript:;" role="button" aria-controls="1languageDropdown" aria-haspopup="true" aria-expanded="false" data-unfold-event="hover" data-unfold-target="#1languageDropdown" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                            <span class="d-inline-block p-2">USD $ <i class="glyph-icon-usd flaticon-down-arrow" ></i></span>
                        </a>
                        <div id="1languageDropdown" class=" dropdown-menu dropdown-unfold dropdown-menu-right mt-0 " aria-labelledby="languageDropdownInvoker">
                            <a class="dropdown-item p-3 active" href="#">USD $</a>
                            <a class="dropdown-item p-3" href="#">IQD</a>
                        </div>
                    </div> 
                    <div class="position-relative pl-3 language-switcher dropdown-connector-xl u-header__topbar-divider--dark">
                        <a id="languageDropdownInvoker" class="dropdown-nav-link  d-flex align-items-center ml-1 " href="javascript:;" role="button" aria-controls="languageDropdown" aria-haspopup="true" aria-expanded="false" data-unfold-event="hover" data-unfold-target="#languageDropdown" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                            <span class="d-inline-block p-2">English<i class="glyph-icon-usd flaticon-down-arrow" ></i></span>
                        </a>
                        <div id="languageDropdown" class=" dropdown-menu dropdown-unfold dropdown-menu-right mt-0 " aria-labelledby="languageDropdownInvoker">
                            <a class="dropdown-item active p-3" href="#">العربية</a>
                            <a class="dropdown-item p-3" href="#">کوردی</a>
                        </div>
                    </div> 
                    <?php
                    
                    if (!isset($_SESSION['login_user']) && !isset ($_SESSION['login_guest'])) { ?> 
                    <div class="position-relative pl-3 language-switcher dropdown-connector-xl u-header__topbar-divider--dark">
                        <a id="languageDropdownInvoker" class="p-3 dropdown-nav-link d-flex align-items-center ml-1 " href="javascript:;" role="button" aria-controls="languageDropdown" aria-haspopup="true" aria-expanded="false" data-unfold-event="hover" data-unfold-target="#2languageDropdown" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                            <span class="d-inline-block p-2">Login<i class="glyph-icon-usd flaticon-down-arrow" ></i></span>
                        </a>
                        <div id="2languageDropdown" class=" dropdown-menu dropdown-unfold dropdown-menu-right mt-0 " aria-labelledby="languageDropdownInvoker">
                            <a class="dropdown-item p-3" href="gcp/"> Customer</a>
                            <a class="dropdown-item p-3" href="cp/"> hotel owner </a>
                        </div>
                    </div>
                    
                        <?php }
                        else if(isset($_SESSION['login_user'])) { ?>
                            <div class="position-relative pl-3 language-switcher dropdown-connector-xl u-header__topbar-divider--dark">
                            <a id="languageDropdownInvoker" class="dropdown-nav-link  d-flex align-items-center ml-1 " href="javascript:;" role="button" aria-controls="languageDropdown" aria-haspopup="true" aria-expanded="false" data-unfold-event="hover" data-unfold-target="#2languageDropdown" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                                <span class="d-inline-block"><?php echo $_SESSION['userName']; ?><i class="glyph-icon-usd flaticon-down-arrow" ></i></span>
                            </a>
                            <div id="2languageDropdown" class=" dropdown-menu dropdown-unfold dropdown-menu-right mt-0 " aria-labelledby="languageDropdownInvoker">
                                <a class="dropdown-item " href="cp/register/userprofile/index.php"> Dashboard</a>
                                <hr>
                                <a class="dropdown-item pl-4 pr-4" href=""> Setting</a>
                                <a class="dropdown-item " href="cp/logout.php"> Logout </a>
                            </div>
                        </div>
                    <?php }
                    else if(isset($_SESSION['login_guest'])) { ?>
                        <div class="position-relative pl-3 language-switcher dropdown-connector-xl u-header__topbar-divider--dark">
                            <a id="languageDropdownInvoker" class="dropdown-nav-link  d-flex align-items-center ml-1 " href="javascript:;" role="button" aria-controls="languageDropdown" aria-haspopup="true" aria-expanded="false" data-unfold-event="hover" data-unfold-target="#2languageDropdown" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                                <span class="d-inline-block"><?php echo $_SESSION['guestUserName']; ?><i class="glyph-icon-usd flaticon-down-arrow" ></i></span>
                            </a>
                            <div id="2languageDropdown" class=" dropdown-menu dropdown-unfold dropdown-menu-right mt-0 " aria-labelledby="languageDropdownInvoker">
                                <a class="dropdown-item " href="gcp/cp/"> Dashboard</a>
                                <hr>
                                <a class="dropdown-item pl-4 pr-4" href="gcp/cp/view_booking.php"> My Bookings</a>
                                <hr>
                                <a class="dropdown-item " href="gcp/cp/userInfo.php"> Setting</a>
                                <a class="dropdown-item " href="gcp/logout.php"> Logout </a>
                            </div>
                        </div>
                    <?php } ?>


            <!-- ################ End of currency dropdown menue  ############### -->

                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <div id="logoAndNav" class="container-fluid py-xl-2 border-bottom-xl">
            <!-- Nav -->
            <nav class="js-mega-menu navbar navbar-expand-xl u-header__navbar u-header__navbar--no-space">
                <!-- Logo -->
                <a class="navbar-brand u-header__navbar-brand-default u-header__navbar-brand-center u-header__navbar-brand-text-dark-xl" href="index.php" aria-label="MyTour">
                <!-- 
                    <img src="imgs/logo.png" style="width: 65px;height: 65px">
                -->
                    <span class="u-header__navbar-brand-text">Hjuzati Hotels</span>
                </a>
                <!-- End Logo -->

                <!-- Search Form -->

                <?php /*

                <div class="position-relative u-header__search-lg u-header__hide-content pl-2 ml-2 d-none d-lg-block" >
                    <a id="searchSlideDownInvoker" class="d-block u-search-slide-down-trigger" href="javascript:;" role="button" aria-haspopup="true" aria-expanded="false" aria-controls="searchSlideDown" data-unfold-type="css-animation" data-unfold-hide-on-scroll="false" data-unfold-target="#searchSlideDown" data-unfold-animation-in="active" data-unfold-animation-out="fadeOutUp" data-unfold-delay="0" data-unfold-duration="800" data-unfold-overlay='{ "className": "u-search-slide-down-bg-overlay", "background": "rgba(59, 68, 79, 0.851)", "animationSpeed": 400 }'>
                        <div class="d-flex align-items-center">
                            <span class="text-black min-width-220">Destination, tour, hotel, etc</span>
                            <span class="d-flex align-items-center text-black p-0">
                                <span class="flaticon-magnifying-glass font-size-20"></span>
                            </span>
                        </div>
                    </a>


                    <!-- Search Content -->
                    <div id="searchSlideDown" class="dropdown-unfold u-search-slide-down" aria-labelledby="searchSlideDownInvoker">
                        <form class="rounded-xs overflow-hidden">
                            <!-- Input Group -->
                            <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless u-search-slide-down__input rounded-0 px-1">
                                <input type="search" class="form-control" placeholder="Destination, tour, hotel, etc" aria-label="Destination, tour, hotel, etc">
                                <div class="input-group-append">
                                    <button type="submit" class="btn py-0">
                                        <span class="flaticon-magnifying-glass font-size-20"></span>
                                    </button>
                                </div>
                            </div>
                            <!-- End Input Group -->

                            <!-- Suggestions Content -->
                            <div class="rounded-0 bg-white u-search-slide-down__suggestions py-3">
                                <ul class="list-group list-group-flush list-group-borderless mb-1">
                                    <li>
                                        <a class="list-group-item list-group-item-action" href="index.php">
                                            <span class="btn btn-icon btn-medium btn-blue rounded-circle">
                                                <span class="flaticon-pin-1 btn-icon__inner"></span>
                                            </span>
                                            <span>Sulaymaniyah</span>
                                            <span class="ml-auto font-size-14 text-gray-1 mr-1">Kurdistan</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="list-group-item list-group-item-action" href="index.php">
                                            <span class="btn btn-icon btn-medium btn-yellow-light rounded-circle">
                                                <span class="flaticon-pin-1 btn-icon__inner"></span>
                                            </span>
                                            <span>Erbil</span>
                                            <span class="ml-auto font-size-14 text-gray-1 mr-1">Kurdistan</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="list-group-item list-group-item-action" href="index.php">
                                            <span class="btn btn-icon btn-medium btn-green-light rounded-circle">
                                                <span class="flaticon-pin-1 btn-icon__inner"></span>
                                            </span>
                                            <span>Dohuk</span>
                                            <span class="ml-auto font-size-14 text-gray-1 mr-1">Kurdistan</span>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>
                            <!-- End Suggestions Content -->
                        </form>
                    </div>
                    <!-- End Search Content -->
                </div>
                
                */
                
                ?>
                <!-- End Search Form -->


                <!-- Responsive Toggle Button -->
                <button type="button" class="navbar-toggler btn u-hamburger u-hamburger--white order-2 ml-3" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
                    <span id="hamburgerTrigger" class="u-hamburger__box">
                        <span class="u-hamburger__inner"></span>
                    </span>

                </button>
                
                
                <!-- End Responsive Toggle Button -->
                <!-- Responsive Toggle Button -->
                <button type="button" class="navbar-toggler btn u-hamburger u-hamburger--primary order-2 ml-3" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
                    <span id="hamburgerTrigger" class="u-hamburger__box">
                        <span class="u-hamburger__inner"></span>
                    </span>
                </button>
                <!-- End Responsive Toggle Button -->

                <!-- Navigation -->
                <div id="navBar" class="navbar-collapse u-header__navbar-collapse collapse order-2 order-xl-0 pt-4 p-xl-0 position-relative">
                    <ul class="navbar-nav u-header__navbar-nav">
                        <!-- Home -->
                        <li class="nav-item u-header__nav-item ">

                            <a id="homeMenu" class="nav-link u-header__nav-link u-header__nav-link-border active" href="index.php"  title="All Services"><i class="icon fad fa-home font-size-1.5"></i>&nbsp;Home</a>
                            <!-- #####   Temprory disabeld Home Submenu #######
                            
                            <ul id="homeSubMenu" class="hs-sub-menu u-header__sub-menu u-header__sub-menu-rounded u-header__sub-menu-bordered hs-sub-menu-right u-header__sub-menu--spacer" aria-labelledby="homeMenu" style="min-width: 230px;">
                                <li class="active"><a class="nav-link u-header__sub-menu-nav-link" href="index.php">All Services</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="tours.php">Tours</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="activities.php">Activities</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="rental.php">Rental</a></li>
                                        </ul>
                                        <-- End Home Submenu ->
                                        ####  Temprory disabeld  ######## -->
                            
                        </li>
                        <!-- End Home -->

                        <!-- Hotel -->
                        <li class="nav-item hs-has-sub-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                            <a id="hotelMenu" href="index.php" class="nav-link u-header__nav-link  u-header__nav-link-border" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-labelledby="hotelSubMenu">
                                <i class="icon fad fa-bed font-size-1.5"></i>&nbsp;Hotels
                                <!-- <i class="glyph-icon-nav flaticon-down-arrow" ></i> -->
                            </a>

                            <!-- Hotel Submenu -->
                                    
                            <!-- <ul id="hotelSubMenu" class="hs-sub-menu u-header__sub-menu u-header__sub-menu-rounded u-header__sub-menu-bordered hs-sub-menu-right u-header__sub-menu--spacer" aria-labelledby="hotelMenu" style="min-width: 230px;">
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="hotel-list.php">Sidebar</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="hotel-single-v1.php">Hotel</a></li>
                            </ul> -->

                            <!-- End Hotel Submenu -->
                        </li>
                        <!-- End Hotel -->

                        <!-- Login -->
                        <d  iv class=" d-block d-md-none">
                        <?php
                            if (!isset($_SESSION['login_user']) or !isset($_SESSION['login_guest'])) { ?> 
                            <li class="nav-item hs-has-sub-menu u-header__nav-item " data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                                <a id="hotelMenu" class="nav-link u-header__nav-link  u-header__nav-link-border" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-labelledby="hotelSubMenu">
                                    <i class="icon fad fa-bed font-size-1.5"></i>&nbsp;Login<i class="glyph-icon-nav flaticon-down-arrow" ></i></a>
                                <!-- Hotel Submenu -->

                                <ul id="hotelSubMenu" class="hs-sub-menu u-header__sub-menu u-header__sub-menu-rounded u-header__sub-menu-bordered hs-sub-menu-right u-header__sub-menu--spacer" aria-labelledby="hotelMenu" style="min-width: 230px;">
                                    <!-- <li><a class="nav-link u-header__sub-menu-nav-link" href="hotels.php">Search</a></li> -->
                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="gcp/">Customer</a></li>
                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="cp/">hotel Owner </a></li>                                        
                                </ul>
                                <!-- End Hotel Login Submenu -->
                            </li>
                            <?php }
                            //When guest is loged in
                            else if(isset($_SESSION['login_guest'])){ ?> 
                            <li class="nav-item hs-has-sub-menu u-header__nav-item " data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                                <a id="hotelMenu" class="nav-link u-header__nav-link  u-header__nav-link-border" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-labelledby="hotelSubMenu"><i class="icon fad fa-bed font-size-1.5">
                                </i>&nbsp;<?php echo $_SESSION['guestUserName']; ?><i class="glyph-icon-nav flaticon-down-arrow" ></i></a>

                                <!-- Hotel Submenu -->
                                        
                                <ul id="hotelSubMenu" class="hs-sub-menu u-header__sub-menu u-header__sub-menu-rounded u-header__sub-menu-bordered hs-sub-menu-right u-header__sub-menu--spacer" aria-labelledby="hotelMenu" style="min-width: 230px;">
                                    <!-- <li><a class="nav-link u-header__sub-menu-nav-link" href="hotels.php">Search</a></li> -->
                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="gcp/cp/"> Dashboard</a></li>
                                    <hr>
                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="#"> Setting</a></li>
                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="gcp/logout.php"> Logout</a></li>                                          
                                </ul>

                                <!-- End Hotel Login Submenu -->
                            </li>
                            <?php  } 
                            //When User is loged in
                            else if (isset($_SESSION['login_user'])) { ?>
                                <li class="nav-item hs-has-sub-menu u-header__nav-item " data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                                    <a id="hotelMenu" class="nav-link u-header__nav-link  u-header__nav-link-border" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-labelledby="hotelSubMenu"><i class="icon fad fa-bed font-size-1.5">
                                    </i>&nbsp;<?php echo $_SESSION['userName']; ?><i class="glyph-icon-nav flaticon-down-arrow" ></i></a>

                                    <!-- Hotel Submenu -->
                                            
                                    <ul id="hotelSubMenu" class="hs-sub-menu u-header__sub-menu u-header__sub-menu-rounded u-header__sub-menu-bordered hs-sub-menu-right u-header__sub-menu--spacer" aria-labelledby="hotelMenu" style="min-width: 230px;">
                                        <!-- <li><a class="nav-link u-header__sub-menu-nav-link" href="hotels.php">Search</a></li> -->
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="cp/register/userprofile/index.php"> Dashboard</a></li>
                                        <hr>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#"> Setting</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="cp/logout.php"> Logout</a></li>                                          
                                    </ul>

                                    <!-- End Hotel Login Submenu -->
                                </li>
                            <?php } ?>
                            </div>





                        
                        <!-- End Login -->



                        <?php
                        //hide until we activate it later

                            /* 

                        <!-- Motel -->
                        <li class="nav-item hs-has-sub-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                            <a id="hotelMenu" class="nav-link u-header__nav-link  u-header__nav-link-border" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-labelledby="hotelSubMenu"><i class="icon fad fa-hotel font-size-1.5"></i>&nbsp;Motels<i class="glyph-icon-nav flaticon-down-arrow" ></i></a>
                            <!-- Motel Submenu -->
                                    
                            <ul id="hotelSubMenu" class="hs-sub-menu u-header__sub-menu u-header__sub-menu-rounded u-header__sub-menu-bordered hs-sub-menu-right u-header__sub-menu--spacer" aria-labelledby="hotelMenu" style="min-width: 230px;">
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="motels.php">Search</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="hotel-list.php">Sidebar</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="hotel-single-v1.php">Hotel Single v1</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="hotel-booking.php">Hotel Booking</a></li>
                                
                                

                            </ul>

                            <!-- End Motel Submenu -->
                        </li>
                        <!-- End Motel; -->

                        <!-- Appartment -->
                        <li class="nav-item hs-has-sub-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                            <a id="hotelMenu" class="nav-link u-header__nav-link  u-header__nav-link-border" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-labelledby="hotelSubMenu"><i class="fad fa-building font-size-1.5"></i>&nbsp;Appartments<i class="glyph-icon-nav flaticon-down-arrow" ></i>    </a>
                            <!-- Appartment Submenu -->
                                    
                            <ul id="hotelSubMenu" class="hs-sub-menu u-header__sub-menu u-header__sub-menu-rounded u-header__sub-menu-bordered hs-sub-menu-right u-header__sub-menu--spacer" aria-labelledby="hotelMenu" style="min-width: 230px;">
                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="appartments.php">Search</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="hotel-list.php">Sidebar</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="hotel-single-v1.php">Hotel Single v1</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="hotel-booking.php">Hotel Booking</a></li>
                                
                                

                            </ul>

                            <!-- End Appartment Submenu -->
                        </li>
                        <!-- End Hotel -->
                        
                        */

                        //Hide temperory 

                        ?>

                        <!-- Tour -->

                        <!-- ###  temprory disable  
                            ###Note I have removed ! and - from all the comming comments

                        <li class="nav-item hs-has-mega-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut" data-max-width="722px" data-position="right">
                            <a id="tourMegaMenu" class="nav-link u-header__nav-link " href="javascript:;" aria-haspopup="true" aria-expanded="false">Tour</a>

                            <-- Tour - Mega Menu ->
                            <div class="hs-mega-menu u-header__sub-menu u-header__sub-menu-rounded u-header__mega-menu-position-right-fix-10" aria-labelledby="tourMegaMenu">
                                <div class="row">
                                    <div class="col-12 col-xl-3dot64">
                                        <span class="u-header__sub-menu-title">List Style</span>
                                        <ul class="u-header__sub-menu-nav-group u-header__sub-menu-bordered mb-3">
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="tour-list.php">Sidebar</a></li>
                                        </ul>
                                        <span class="u-header__sub-menu-title">Tour Booking</span>
                                        <ul class="u-header__sub-menu-nav-group u-header__sub-menu-bordered mb-3">
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="tour-booking.php">Tour Booking</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-xl-3dot64">
                                        <span class="u-header__sub-menu-title">Single</span>
                                        <ul class="u-header__sub-menu-nav-group u-header__sub-menu-bordered mb-3">
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="tour-single-v2.php">Tour Single v2</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-xl">
                                        <-- Banner Image ->
                                        <div class="u-header__banner u-header__banner-no-overlay rounded-xs" style="background-image: url(assets/img/240x243/img1.jpg);">
                                            <div class="u-header__banner-content u-header__banner-content-not-centered">
                                                <span class="u-header__banner-title">Special Offers</span>
                                                <p class="u-header__banner-text">Find Your Perfect Hotels Get the best prices on 20,000+ properties the best  prices on</p>
                                                <a class="btn btn-white text-blue btn-sm rounded-xs transition-3d-hover" href="#">See Deals</a>
                                            </div>
                                        </div>
                                        <-- End Banner Image ->
                                    </div>
                                </div>
                            </div>
                            <-- End Tour - Mega Menu ->
                        </li>
                        <-- End Tour ->

                        <-- Activity ->
                        <li class="nav-item hs-has-sub-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                            <a id="ActivityMenu" class="nav-link u-header__nav-link  u-header__nav-link-border" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-labelledby="ActivitySubMenu">Activity</a>
                            <-- Activity Submenu ->
                            <ul id="ActivitySubMenu" class="hs-sub-menu u-header__sub-menu u-header__sub-menu-rounded u-header__sub-menu-bordered hs-sub-menu-right u-header__sub-menu--spacer" aria-labelledby="ActivityMenu" style="min-width: 230px;">
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="activities-fullwidth.php">Full Width</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="activities-single-v2.php">Activity Single v2</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="activities-booking.php">Activity Booking</a></li>
                            </ul>
                            <-- End Activity Submenu ->
                        </li>
                        <-- End Activity ->

                        <-- Rental ->
                        <li class="nav-item hs-has-sub-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                            <a id="rentalMenu" class="nav-link u-header__nav-link  u-header__nav-link-border" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-labelledby="rentalSubMenu">Rental</a>
                            <-- Rental Submenu ->
                            <ul id="rentalSubMenu" class="hs-sub-menu u-header__sub-menu u-header__sub-menu-rounded u-header__sub-menu-bordered hs-sub-menu-right u-header__sub-menu--spacer" aria-labelledby="rentalMenu" style="min-width: 230px;">
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="rental-list-02.php">List With Map</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="rental-single-v2.php">Rental Single v2</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="rental-booking.php">Rental Booking</a></li>
                            </ul>
                            <-- End Rental Submenu ->
                        </li>
                        <-- End Rental ->
                        @by Hjuzati Hotels Co. 
                        @auther Mohammed S. Hazim
                        ## End the disable comment
                        ## Don't forget to add ! to the begining of each above comments and - to it's end to enable them again
                                -->

                        

                        <!-- Pages -->
                        <?php /* 
                        <li class="nav-item hs-has-mega-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut" data-max-width="722px" data-position="right">
                            <!-- <a id="pagesMegaMenu" class="nav-link u-header__nav-link " href="javascript:;" aria-haspopup="true" aria-expanded="false">Pages<i class="glyph-icon-nav flaticon-down-arrow" ></i></a> -->
                            <!-- Pages - Mega Menu -->
                            <div class="hs-mega-menu u-header__sub-menu u-header__sub-menu-rounded" aria-labelledby="pagesMegaMenu">
                                <div class="row">
                                    <div class="col-12 col-xl-4">
                                        <ul class="u-header__sub-menu-nav-group u-header__sub-menu-bordered mb-3">
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="destination.php">Destination</a></li>
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="about.php">About us</a></li>
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="contact.php">Contact</a></li>
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="terms-conditions.php">Terms of Use</a></li>
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="faq.php">FAQs</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-xl-4">
                                        <ul class="u-header__sub-menu-nav-group u-header__sub-menu-bordered mb-3">
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="blog-list.php">Blog</a></li>
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="blog-single.php">Blog Single</a></li>
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="become-expert.php">Become Expert</a></li>
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="404.php">404</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <!-- End Pages - Mega Menu -->
                        </li>
                        */ ?>
                        <!-- End Pages -->
                        
                    </ul>
                </div>
                <!-- End Navigation -->


                <?php /* Cart comment
                <!-- Shopping Cart -->
                <div class="pl-2 pl-md-4 ml-auto shopping-cart d-none d-lg-block">
                    <a id="shoppingCartDropdownInvoker" class="btn-text-secondary py-4 position-relative" href="javascript:;" role="button" aria-controls="shoppingCartDropdown" aria-haspopup="true" aria-expanded="false" data-unfold-event="hover" data-unfold-target="#shoppingCartDropdown" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                        <span class="flaticon-shopping-basket font-size-25 text-primary-max-lg"></span>
                    </a>

                    <div id="shoppingCartDropdown" class="dropdown-menu dropdown-unfold dropdown-menu-right dropdown-menu-right-fix-wd-10 p-0 mt-0 w-max-sm-100 u-unfold--css-animation font-size-16" aria-labelledby="shoppingCartDropdownInvoker" style="width: 500px; animation-duration: 300ms; right: 0px;">
                        <div class="card">
                            <!-- Header -->
                            <div class="card-header border-color-8 py-3 px-5">
                                <span class="font-weight-semi-bold">Your Cart</span>
                            </div>
                            <!-- End Header -->

                            <!-- Body -->
                            <div class="card-body p-0">
                                <div class="px-2 px-md-3 py-2 py-md-1 border-bottom border-color-8">
                                    <div class="media p-2 p-md-3">
                                        <div class="u-avatar u-lg-avatar-md mr-2 mr-md-3">
                                            <img class="img-fluid rounded-pill" src="assets/img/80x80/img1.jpg" alt="Image Description">
                                        </div>
                                        <div class="media-body position-relative pl-md-1">
                                            <div class="d-flex justify-content-between align-items-start mb-2 mb-md-3">
                                                <span class="d-block text-dark font-weight-bold">Hyatt Centric Times  Square</span>
                                                <button type="button" class="close close-rounded position-md-absolute right-0 ml-2" aria-label="Close">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                            <span class="d-block text-gray-1">Price  £590.00 </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-2 px-md-3 py-2 py-md-1 border-bottom border-color-8">
                                    <div class="media p-2 p-md-3">
                                        <div class="u-avatar u-lg-avatar-md mr-2 mr-md-3">
                                            <img class="img-fluid rounded-pill" src="assets/img/80x80/img2.jpg" alt="Image Description">
                                        </div>
                                        <div class="media-body position-relative pl-md-1">
                                            <div class="d-flex justify-content-between align-items-start mb-2 mb-md-3">
                                                <span class="d-block text-dark font-weight-bold">Hyatt Centric Times  Square</span>
                                                <button type="button" class="close close-rounded position-md-absolute right-0 ml-2" aria-label="Close">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                            <span class="d-block text-gray-1">Price  £590.00 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Body -->

                            <!-- Footer -->
                            <div class="card-footer border-0 p-3 px-md-5 py-md-4">
                                <div class="mb-4 pb-md-1">
                                    <span class="d-block font-weight-semi-bold">Subtotal: £1180.00</span>
                                </div>
                                <div class="d-md-flex button-inline-group-md mb-1">
                                    <a class="btn btn-block btn-md btn-gray-1 rounded-xs font-weight-bold transition-3d-hover" href="#">
                                        View cart
                                    </a>
                                    <a class="btn btn-block btn-md btn-blue-1 rounded-xs font-weight-bold transition-3d-hover mt-md-0 ml-md-5" href="#">
                                        Check Out
                                    </a>
                                </div>
                            </div>
                            <!-- End Footer -->
                        </div>
                    </div>
                </div>
                                */
                ?>
                <!-- End Shopping Cart -->

                <!-- Button -->
                <div class="pl-4 ml-1 u-header__last-item-btn u-header__last-item-btn-xl">
                    <a class="btn btn-wide rounded-xs btn-primary transition-3d-hover" href="../others/become-expert.php">Become Local Expert</a>
                </div>
                <!-- End Button -->
            </nav>
            <!-- End Nav -->
        </div>
    </div>
</header>

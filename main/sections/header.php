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

 <!-- Modal -->
 <div class="modal fade" id="languageModal" tabindex="-1000" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chose Language</h5>
                <button type="button" onclick="$('#languageModal').modal('hide')"
                 class="btn btn-outline-light text-dark p-2" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                
            </div>
        </div>
    </div>
</div>

<header id="header" class="u-header u-header--dark-nav-links-xl u-header--show-hide-xl u-header--static-xl" data-header-fix-moment="500" data-header-fix-effect="slide" >
    <div class="u-header__section u-header__shadow-on-show-hide py-4 py-xl-0">
        <!-- Topbar -->
        <div class="py-2 container-fluid u-header__hide-content u-header__topbar u-header__topbar-lg border-bottom border-color-8">
            <div class="d-flex align-items-center">
                <ul class="list-inline list-inline-dark u-header__topbar-nav-divider--dark mb-0">
                    <!-- Logo -->
                    <a  href="index.php" aria-label="Hjuzati" class="u-header__navbar-brand-text">
                        <span class="">Hjuzati</span>
                    </a>
                    <!-- End Logo -->
                    <span class="flaticon-call"></span>
                    <li class="list-inline-item mr-0"><a href="tel:(964) 770 - 8138928" class="u-header__navbar-link">(964) 770 - 813 -8928</a></li>
                    <!-- Email Address -->
                    <!-- <span class="flaticon-email"></span>
                    <li class="list-inline-item mr-0"><a href="mailto:info@hjuzati.com" class="u-header__navbar-link">info@hjuzati.com</a></li> -->
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
                                <span class="d-inline-block">
                                    <?php echo $_SESSION['guestUserName']; ?>
                                    <i class="glyph-icon-usd flaticon-down-arrow" ></i>
                                </span>
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
        <div id="logoAndNav" class="container-fluid py-xl-2 border-bottom-xl d-lg-none">
            <!-- Nav -->
            <nav class="js-mega-menu navbar navbar-expand-xl u-header__navbar u-header__navbar--no-space">
              

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


                <div class=" order-1">
                    <!-- Responsive Toggle Button -->
                    <button type="button" class="navbar-toggler btn u-hamburger u-hamburger--primary ml-3"
                    aria-label="Toggle navigation"
                    aria-expanded="false"
                    aria-controls="navBar"
                        data-toggle="collapse"
                        data-target="#navBar">
                        <span id="hamburgerTrigger" class="u-hamburger__box">
                            <span class="u-hamburger__inner"></span>
                        </span>
                    </button>
                    <!-- End Responsive Toggle Button -->

                    <?php if (isset($guest)) { ?>
                    <!-- Responsive Toggle Button -->
                    <button type="button" class="navbar-toggler btn u-hamburger u-hamburger--white  ml-3"
                    aria-label="Toggle navigation"
                    aria-expanded="false"
                    aria-controls="guestNavBar"
                        data-toggle="collapse"
                        data-target="#guestNavBar">
                        <i class="fas fa-user"></i>
                    </button>
                    <?PHP } else{ ?>
                        <a href="gcp/index.php" class="text-dark text-dark btn u-hamburger u-hamburger--white  ml-3">
                            <i class="fas fa-user"></i>
                        </a>
                    <?php } ?>
                    
                    <!-- End Responsive Toggle Button -->
                   
                </div>
                <div class="order-2">
                    <!-- Logo -->
                    <a  href="index.php" aria-label="Hjuzati">
                        <span class="u-header__navbar-brand-text">HJUZATI</span>
                    </a>
                    <!-- End Logo -->
                </div>
                <!-- Navigation -->
                <div id="navBar" class="navbar-collapse u-header__navbar-collapse collapse order-2 order-xl-0 pt-4 p-xl-0 position-relative">
                    <ul class="navbar-nav u-header__navbar-nav">
                        <h4>More</h4>
                        <!-- Home -->
                        <li class="nav-item u-header__nav-item ">
                            <a id="homeMenu" class="nav-link u-header__nav-link u-header__nav-link-border active" href="index.php"  
                            title="All Services"><i class="icon fad fa-home font-size-1.5"></i>&nbsp;Home</a>
                        </li>
                        <li class="nav-item u-header__nav-item ">
                            <i class="icon fad fa-globe font-size-1.5"></i>
                            &nbsp;
                            <span onclick="$('#languageModal').modal('show')" class="">
                                English
                            </span>
                        </li>
                        <!-- End Home -->    
                    </ul>
                </div>
                <!-- End Navigation -->

                <!-- Guest Navigation -->
                <div id="guestNavBar" class="pl-4 navbar-collapse u-header__navbar-collapse collapse order-2 order-xl-0 pt-4 p-xl-0 position-relative">
                    <ul class="navbar-nav u-header__navbar-nav">
                        <li class="nav-item u-header__nav-item p-2">
                            <div class="row">
                                <div class="col col-2">
                                    <?php if (!empty($guest->avatarImg)) { ?>
                                        <img src="<?php echo $guest->avatarImg; ?>"
                                         class="rounded-circle" alt="Cinque Terre" width="40" height="40"> 
                                    <?php } else{ ?>
                                        <i class="icon fad fa-user font-size-4"></i>
                                    <?php } ?>
                                   
                                </div>
                                <div class="col col-10">
                                    <div><?php echo $guest->fullName; ?></div>
                                    <div class="w-100"></div>
                                    <div>@<?php echo $guest->userName; ?></div>
                                </div>
                            </div>
                            <hr>
                        </li>
                        <li class="nav-item u-header__nav-item p-2">
                            <a id="homeMenu" class="nav-link u-header__nav-link u-header__nav-link-border active"
                             href="index.php"  
                            title="All Services">
                                <i class="icon fad fa-user font-size-1.5"></i>
                                <span class="pl-3"> Profile</span>
                            </a>
                        </li>
                        <li class="nav-item u-header__nav-item p-2">
                            <a id="homeMenu" class="nav-link u-header__nav-link u-header__nav-link-border active"
                             href="index.php"  
                            title="All Services">
                            <i class="icon far fa-suitcase font-size-1.5"></i>
                            <span class="pl-3"> Bookings</span>
                            </a>
                        </li>
                        <li class="nav-item u-header__nav-item p-2">
                            <a id="homeMenu" class="nav-link u-header__nav-link u-header__nav-link-border active"
                             href="index.php"  
                            title="All Services">
                            <i class="icon fad fa-heart font-size-1.5"></i>
                            <span class="pl-3"> Saved</span>
                            </a>
                        </li>
                        <li class="nav-item u-header__nav-item p-2">
                            <a id="homeMenu" class="nav-link u-header__nav-link u-header__nav-link-border active"
                             href="index.php"  
                            title="All Services">
                            <i class="icon fad fa-sign-out-alt font-size-1.5 text-danger"></i>
                            <span class="pl-3"> Sign out</span>

                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Button -->

               

            </nav>
            <!-- End Nav -->
        </div>
    </div>
</header>

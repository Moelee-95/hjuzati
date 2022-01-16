 <!-- Language Modal -->
 <div class="modal fade" id="languageModal" tabindex="-1000" aria-labelledby="languageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="languageModalLabel">Chose Language</h5>
                <button type="button" onclick="$('#languageModal').modal('hide')"
                 class="btn btn-outline-light text-dark p-2" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <div class="overflow-hidden">
                        <div onclick="changeLanguage('english')" class="row p-3 btn-outline-light text-dark mt-1 
                        <?php if($language == "english"){echo "bg-light";} ?>">
                            <div class="col col-1">
                                <i class="fas fa-flag-usa"></i>
                            </div>
                            <div class="col col-9">
                                <span class="text-dark">english</span>
                            </div>
                            <div class="col col-1 pl-1">
                                <?php if ($language == "english") { ?>
                                    <i class="fas fa-check text-success"></i>
                                <?php } ?>
                            </div>
                        </div>
                        <div onclick="changeLanguage('arabic')" class="row p-3 btn-outline-light text-dark mt-1 
                        <?php if($language == "arabic"){echo "bg-light";} ?>">
                            <div class="col col-1">
                                <i class="fas fa-flag-usa"></i>
                            </div>
                            <div class="col col-9">
                                <span class="text-dark">arabic</span>
                            </div>
                            <div class="col col-1 pl-1">
                                <?php if ($language == "arabic") { ?>
                                    <i class="fas fa-check text-success"></i>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
 <!-- Currency Modal -->
 <div class="modal fade" id="currencyModal" tabindex="-1000" aria-labelledby="currencyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="currencyModalLabel">Select Currency</h5>
                <button type="button" onclick="$('#currencyModal').modal('hide')"
                 class="btn btn-outline-light text-dark p-2" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <div class="overflow-hidden">
                    <div onclick="changeCurrency('USD')" class="row p-3 btn-outline-light text-dark mt-1 
                    <?php if($currency == "USD"){echo "bg-light";} ?>">
                        <div class="col col-1">
                            <i class="fas fa-flag-usa"></i>
                        </div>
                        <div class="col col-9">
                            <span class="text-dark">USD</span>
                        </div>
                        <div class="col col-1 pl-1">
                            <?php if ($currency == "USD") { ?>
                                <i class="fas fa-check text-success"></i>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row p-3 btn-outline-light text-dark mt-1"
                    onclick="changeCurrency('IQD')">
                        <div class="col col-1">
                            <i class="fas fa-flag-usa"></i>
                        </div>
                        <div class="col col-9">
                            <span class="text-dark">IQD</span>
                        </div>
                        <div class="col col-1 pl-1">
                            <?php if ($currency == "IQD") { ?>
                                <i class="fas fa-check text-success"></i>
                            <?php } ?>
                        </div>
                    </div>
                </div>
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
                    <div class="position-relative pl-3 u-header__topbar-divider--dark">
                        <a id="languageDropdownInvoker" onclick="$('#currencyModal').modal('show')" class="dropdown-nav-link  d-flex align-items-center ml-1 " href="javascript:;" role="button" aria-controls="1languageDropdown" aria-haspopup="true" aria-expanded="false" data-unfold-event="hover" data-unfold-target="#1languageDropdown" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                            <span class="d-inline-block p-2"><?php echo $currency; ?></span>
                        </a>
                    </div> 
                    <div class="position-relative pl-3 u-header__topbar-divider--dark">
                        <a onClick="$('#languageModal').modal('show')" id="languageDropdownInvoker" class="dropdown-nav-link  d-flex align-items-center ml-1 " href="javascript:;" role="button" aria-controls="languageDropdown" aria-haspopup="true" aria-expanded="false" data-unfold-event="hover" data-unfold-target="#languageDropdown" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                            <span class="d-inline-block p-2"><?php echo $language; ?></span>
                        </a>

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
                    <button type="button" class="navbar-toggler btn u-hamburger u-hamburger--white  ml-3"
                    aria-label="Toggle navigation"
                    aria-expanded="false"
                    aria-controls="cartNavBar"
                        data-toggle="collapse"
                        data-target="#cartNavBar">
                        <i class="far fa-shopping-cart"></i>
                    </button>
                    <!-- End Responsive Toggle Button -->
                   
                </div>
                <div class="order-2">
                    <!-- Logo -->
                    <a  href="index.php" aria-label="Hjuzati">
                        <span class="u-header__navbar-brand-text">HJUZATI</span>
                    </a>
                    <!-- End Logo -->
                </div>
                <!-- Main Navigation -->
                <div id="navBar" class="navbar-collapse u-header__navbar-collapse collapse order-2 order-xl-0 pt-4 p-xl-0 position-relative">
                    <ul class="navbar-nav u-header__navbar-nav">
                        <h4>More</h4>
                        <!-- Home -->
                        <li class="nav-item u-header__nav-item p-2">
                            <i class="icon fad fa-dollar-sign font-size-1.5"></i>
                            &nbsp;
                            <a href="#" onclick="$('#currencyModal').modal('show')" class="text-dark">
                                <?php echo $currency; ?>
                            </a>
                        </li>
                        <li class="nav-item u-header__nav-item p-2">
                            <i class="icon fad fa-globe font-size-1.5"></i>
                            &nbsp;
                            <a href="#" onclick="$('#languageModal').modal('show')" class="text-dark">
                            <?php echo $language; ?>
                            </a>
                        </li>
                        <!-- End Home -->    
                    </ul>
                </div>
                <!-- End main Navigation -->

                <!-- Cart Navigation -->
                <div id="cartNavBar" class="navbar-collapse u-header__navbar-collapse collapse order-2 order-xl-0 pt-4 p-xl-0 position-relative">
                    <ul class="navbar-nav u-header__navbar-nav">
                        <h4>My Bookings</h4>
                        <?php
                            if (isset($bookings)) {
                                foreach ($bookings as $key => $booking) { ?>
                                    <li class="nav-item u-header__nav-item p-2 row border border-light">
                                        <div class="col-6 pt-2 order-1">
                                            <div class="row"><span class="h5"><?php echo $booking->hotelName; ?></span></div>
                                            <div class="row"><span class="col-6 p-0"><?php echo Booking::dateConvert($booking->checkIn); ?>
                                             <span class="text-primary">|</span></span><span class="col-6 p-0"><?php echo Booking::dateConvert($booking->checkOut) ?></span></div>
                                        </div>
                                        <div class="col-2 pt-2 order-3">
                                            <button class="btn btn-outline-primary py-2 mt-1">
                                                <i class="far fa-pencil-alt"></i>
                                                
                                            </button>
                                        </div>
                                        <div class="col-4 pt-2 pb-0 order-2">
                                            <div class="alert alert-success px-2 text-center" role="alert">
                                                Confirmed
                                            </div>
                                        </div>
                                    </li>
                            <?php } 
                            }
                            else{
                            ?>
                                <div class="text-center p-4 border">
                                    <span class=""> You Don't have any Bookings for now</span>
                                    <div class="w-100 p-1"></div>
                                    <a class="text-primary" href="index.php"><i class="far fa-calendar-plus pr-1"></i>  New reservation</a>

                                </div>
                           <?php } ?>
                    </ul>
                </div>
                <!-- End Cart Navigation -->


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
                             href="gcp/cp/index.php"  
                            title="All Services">
                                <i class="icon fad fa-user font-size-1.5"></i>
                                <span class="pl-3"> Profile</span>
                            </a>
                        </li>
                        <li class="nav-item u-header__nav-item p-2">
                            <a id="homeMenu" class="nav-link u-header__nav-link u-header__nav-link-border active"
                             href="gcp/cp/view_booking.php"  
                            title="All Services">
                            <i class="icon far fa-suitcase font-size-1.5"></i>
                            <span class="pl-3"> Bookings</span>
                            </a>
                        </li>
                        <li class="nav-item u-header__nav-item p-2">
                            <a id="homeMenu" class="nav-link u-header__nav-link u-header__nav-link-border active"
                             href="gcp/cp/favirot.php"  
                            title="All Services">
                            <i class="icon fad fa-heart font-size-1.5"></i>
                            <span class="pl-3"> Saved</span>
                            </a>
                        </li>
                        <li class="nav-item u-header__nav-item p-2">
                            <a id="homeMenu" class="nav-link u-header__nav-link u-header__nav-link-border active"
                             href="gcp/logout.php"  
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

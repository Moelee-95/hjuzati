 <!-- ==========  PHP  ===========-->
<?php require('../db_connect.php');?>
<?php require 'sections/main.php';?>

<?php 
    // First Visit from hotel_list.php
    if (isset($_GET['hotel_id'])) {
        $hotel_id = $_GET['hotel_id'];
        
        if (isset( $_GET['hotel_date'])){
            $dates = $_GET['hotel_date'];
            $arr = explode( ' to ', $dates );
            // echo  $arr[0];

            $check_in = $arr[0];
            $check_out = $arr[1];
        } else {
            $check_in = $_GET['check_in'];
            $check_out = $_GET['check_out'];
        }
        $adults = $_GET['adults'];
        $child = $_GET['child'];
        $nights = $_GET['nights'];
        $roomsNum = $_GET['roomsNum'];

        // hotel photos
        $sql = "SELECT * FROM hotelsphotos WHERE hotels_hHotelID = '$hotel_id'";
        $query = mysqli_query($conn, $sql);
        $fetchHPhotos = mysqli_fetch_all($query, MYSQLI_ASSOC);
        //rooms info
        $rooms_info = "call rooms_info('$hotel_id')";
        $query2 = mysqli_query($conn, $rooms_info);
        $fetch_rooms = mysqli_fetch_all($query2, MYSQLI_ASSOC);

        // Using function to access the first photo of the hotel room
        function getRoomPic ($roomID){
            include('cp/db/db_connect.php');
            $roomPhoto = "SELECT * FROM roomsphotos WHERE rpRoomsID = '$roomID' LIMIT 0, 1";
            $query4 = mysqli_query($conn, $roomPhoto);
            $fRPhotos = mysqli_fetch_array($query4);
            $path = $fRPhotos['rpPhotoPath'];
            if (empty($path)) {
                $return = "../img/defaults/empty_img.jpg";
            }
            else {
                $return = $path;
            }

            return($return);

        }

        //function to get the minimum number of available rooms
        function available_rooms($room_ID, $check_in, $check_out){
            include('cp/db/db_connect.php');
            $statement = "call hima.available_rooms('$room_ID', '$check_in', '$check_out')";
            $query =  mysqli_query($conn, $statement);
            $fetch = mysqli_fetch_array($query);
            $result = $fetch['min_rooms'];
            return $result;                                            
        }

        // Main function to execute statements and return one single value
        function exe($stmt){
            include('cp/db/db_connect.php');
            $query =  mysqli_query($conn, $stmt);
            $fetch = mysqli_fetch_array($query);
            $result = $fetch[0];
            return $result;  
        }
        
        $main_pic = "cp/cp/".exe("SELECT hpPath FROM hotels h join hotelsphotos hp on h.hHotelID = hp.hotels_hHotelID where h.hMainPhotoID = hp.hpID and h.hHotelID = '$hotel_id'");
        
        //set hotel info
        include('cp/db/db_connect.php');
        $hotel_info ="SELECT * FROM hima.hotels WHERE hHotelID = '$hotel_id'";
        $query3 = mysqli_query($conn, $hotel_info);
        $fetch2 = mysqli_fetch_array($query3);
        // echo $hotel_id."<hr><hr><hr><hr><hr>";


        //auto fill user info if user were logged in
        $iFullName = '';$iPhoneNumber = '';$iEmail = '';$iAddress='Select City';
        if (isset($guest)) {
            $iFullName = $guest->fullName;
            $iPhoneNumber = $guest->phoneNumber;
            $iEmail = $guest->email;
            $iAddress = $guest->address;
        }

    }
    elseif (isset($_POST['phone_input'])) {  // reserve room request
        $hotel_id =  $_POST['hotel_id'];
        $check_in =  $_POST['check-in'];
        $check_out =  $_POST['check-out'];
        $nights =  $_POST['nights'];
        $psNumber =  $_POST['psNumber'];
        $chNumber =  $_POST['chNumber'];
        $totalPrice =  $_POST['totalPriceinput'];
        $fullName =  $_POST['fullName'];
        $phone =  $_POST['phone_input'];
        $email =  $_POST['email'];
        $city =  $_POST['city'];
        $paymentMethod =  $_POST['paymentMethod'];
        // insert all reserved rooms to an array $reservedRooms
        foreach ($_POST as $name => $value){
            // echo $name.":". $value."<br>";
            $rooms = explode("_", $name);
            if($rooms[0] == "roomsNum"){
                if ($value > 0){
                    $room_id = $rooms[1];
                    $totalRooms = $value;
                    $reservedRooms["$room_id"]= $value;
                } 
            }
        }
        
        if (!empty($_SESSION['login_guest'])) {
            $guestID = $_SESSION['login_guest'];
            $guest = unserialize($_SESSION['guest']);//guest object
            $b = new Booking($hotel_id,$hotel_name,$check_in,$check_out,$nights,$psNumber,$chNumber, $reservedRooms,'2',$totalPrice, $guestID,$fullName,$city,$phone,$email);//create booking
            if($b->bookingCreated){
                $guest->addBooking($b);
                $_SESSION['guest'] = serialize($guest); // store the guest with it's booking back to the session
                $_SESSION['bookingConf'] = serialize($b);//only used in confirmation.php
                
                header("Location: confirmation.php?createBookingPassword=false");
                die();
            }
        
        }
        else{
            $b = new Booking($hotel_id,$hotel_name,$check_in,$check_out,$nights,$psNumber,$chNumber, $reservedRooms,'2',$totalPrice, $guestID,$fullName,$city,$phone,$email);//create booking
            if($b->bookingCreated){
                if (!isset($_COOKIE['bookingConf'])) { // when creating first booking
                    $bookings = array(); // array to hold bookings objects
                    $bookings[] = $b;        //  adding booking to the array
                    $serialized = serialize(json_encode($bookings)); // incode then serialize
                    $_SESSION['bookingConf'] = serialize($b);//only used in confirmation.php
                    setcookie('bookingConf',$serialized, time()+60*60*30, "/");
                    header("Location: confirmation.php?createBookingPassword=true");
                    die();
                }
                elseif (isset($_COOKIE['bookingConf'])) { // when creating first booking
                    $bookings = json_decode(unserialize($_COOKIE['bookingConf'])); // unserialize->decode bokkings array
                    $bookings[] = $b;        //  adding booking to the array
                    $serialized = serialize(json_encode($bookings)); // incode then serialize
                    $_SESSION['bookingConf'] = serialize($b);
                    setcookie('bookingConf',$serialized, time()+60*60*30, "/"); // 30 days
                    header("Location: confirmation.php?createBookingPassword=true");
                    die();
                }
            }
        
        }
    } // END if ($_POST['phone_input'])
    else {
        echo "You can't access this page directly";
        header("Location: index.php");
        exit();
    }
    ?>

<!-- ========== END PHP  ===========-->

<!DOCTYPE html>
<html lang="en">
    
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>

        <!-- Title -->
        <title>Hjuzati | Reserve</title>

    <?php include('sections/head.html'); ?>
   

    </head>
    <body>
       <!-- ========== HEADER ========== -->
        <?php include('sections/header.php'); ?>
        <!-- ========== END HEADER ========== -->


        <!-- ========== MAIN CONTENT ========== -->
        <div class="modal fade" id="createBookingPasswordModal" tabindex="-1" role="dialog" aria-labelledby="createBookingPasswordLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createBookingPasswordLabel">Create Password For Your Booking</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body">
                        <form class="" style="display:block" id="createPasswordForm" method="post" action="confirmation.php">
                            <div class="row justify-content-center p-2">
                                <input name="newBookingPassword" type="text" class="form-control mb-2 inptFielsd" id="newBookingPassword" placeholder="Eg. Ahmed#1995" required data-msg="Please Enter valid password."
                                data-error-class="u-has-error"
                                data-success-class="u-has-success"  />
                            </div>
                            <div class="row justify-content-center p-2">
                                <button id="confirmPassword" type="button" class="btn btn-primary w-50" > Confirm </button>
                                <span id="counter2" class="text-primary"> </span>
                            </div>   
                            <div class="row justify-content-center p-2">
                                <span class="text-danger" id="passwordVerifyAlert"></span>
                            </div>
                        </form>
                    <div class="" id="passwordAlwaysMessageDiv">
                        <span class="col h6 p-1 text-danger" id="passwordAlwaysAlert"> </span> 
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        <main id="content">
            <!-- Breadcrumb -->
            <div class="border-bottom mb-7">
                <div class="container">
                    <nav class="py-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter mb-0 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="#">Hotels</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="#">Sulaymaniyah</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page"><?php echo $fetch2['hHotelName']; ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- End Breadcrumb -->
            <div class="modal fade room-photos" tabindex="-1" role="dialog" aria-labelledby="Room Photos" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <?php  ?>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="d-block d-md-flex flex-center-between align-items-start mb-2">
                            <div class="mb-3">
                                <!-- <ul class="list-unstyled mb-2 d-md-flex flex-lg-wrap flex-xl-nowrap mb-2">
                                    <li class="border border-brown bg-brown rounded-xs d-flex align-items-center text-lh-1 py-1 px-3 mr-md-2 mb-2 mb-md-0 mb-lg-2 mb-xl-0">
                                        <span class="font-weight-normal text-white font-size-14">Newly renovated</span>
                                    </li>
                                    <li class="border border-maroon bg-maroon rounded-xs d-flex align-items-center text-lh-1 py-1 px-3 mr-md-2 mb-2 mb-md-0 mb-lg-2 mb-xl-0 mb-md-0">
                                        <span class="font-weight-normal font-size-14 text-white">Free Wi-Fi</span>
                                    </li>
                                </ul> -->
                                <div class="d-block d-md-flex flex-horizontal-center mb-2 mb-md-0">
                                    <h4 class="font-size-23 font-weight-bold mb-1"><?php echo $fetch2['hHotelName']; ?></h4>
                                    <div class="ml-3 font-size-10 letter-spacing-2">
                                        <span class="d-block green-lighter ml-1">
                                            <span class="glyph-icon-star flaticon-star-3"></span>
                                            <span class="glyph-icon-star flaticon-star-3"></span>
                                            <span class="glyph-icon-star flaticon-star-3"></span>
                                            <span class="glyph-icon-star flaticon-star-3"></span>
                                            <span class="glyph-icon-star flaticon-star-3"></span>
                                        </span>
                                    </div>
                                </div>
                                <!-- <div class="d-block d-md-flex flex-horizontal-center font-size-14 text-gray-1">
                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i><?php echo $fetch2['hAddress']; ?>
                                    <a href="<?php echo $fetch2['hMapsLocation']; ?>" class="ml-1 d-block d-md-inline"> - View on map</a>
                                </div> -->
                            </div>

                        </div>
                        <div class="pb-4 mb-2">
                            <div class="position-relative">
                                <!-- Images Carousel -->
                                <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2"
                                    data-infinite="true"
                                    data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                                    data-arrow-left-classes="flaticon-back u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
                                    data-arrow-right-classes="flaticon-next u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
                                    data-nav-for="#sliderSyncingThumb">

                                    <?php foreach ($fetchHPhotos as  $photo) { ?>
                                        <div class="js-slide">
                                            <img class="img-fluid border-radius-3" src="<?php echo ('cp/'.substr($photo['hpPath'], 3)) ?>" alt="Image Description">
                                        </div>
                                    <?php } ?>
                                </div>

                                <div id="sliderSyncingThumb" class="js-slick-carousel u-slick u-slick--gutters-4 u-slick--transform-off"
                                    data-infinite="true"
                                    data-slides-show="6"
                                    data-is-thumbs="true"
                                    data-nav-for="#sliderSyncingNav"
                                    data-responsive='[{
                                        "breakpoint": 992,
                                        "settings": {
                                            "slidesToShow": 4
                                        }
                                    }, {
                                        "breakpoint": 768,
                                        "settings": {
                                            "slidesToShow": 3
                                        }
                                    }, {
                                        "breakpoint": 554,
                                        "settings": {
                                            "slidesToShow": 2
                                        }
                                    }]'>
                                     <?php foreach ($fetchHPhotos as  $photo) { ?>
                                        <div class="js-slide" style="cursor: pointer;">
                                            <img class="img-fluid border-radius-3 height-110" src="<?php echo ('cp/'.substr($photo['hpPath'], 3)) ?>" alt="Image Description">
                                        </div>
                                    <?php } ?>
                                    
                                </div>
                                <!-- End Images Carousel -->
                            </div>
                        </div>
                        <!-- Hotel description -->
                        <!-- <div class="border-bottom position-relative">
                            <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark">
                                Description
                            </h5>
                            <p>Hotel Description Here.</p>

                            <div class="collapse" id="collapseLinkExample">
                                <p>Details and more information about the hotel.</p>
                            </div>

                            <a class="link-collapse link-collapse-custom gradient-overlay-half mb-5 d-inline-block border-bottom border-primary" data-toggle="collapse" href="#collapseLinkExample" role="button" aria-expanded="false" aria-controls="collapseLinkExample">
                                <span class="link-collapse__default font-size-14">View More <i class="flaticon-down-chevron font-size-10 ml-1"></i></span>
                                <span class="link-collapse__active font-size-14">View Less <i class="flaticon-arrow font-size-10 ml-1"></i></span>
                            </a>
                        </div> -->
                        <!-- End Hotel description -->
                        
                        <!-- Edit Date modal -->
                        <div class="col-sm-12 col-lg-9 d-lg-flex d-block border border-secondary p-3 m-2 row">
                            <div class="col" >
                                <div class="row">
                                    <span class="font-weight-bold p-1 font-size-16" >Check-in Date</span>
                                </div>
                                <div class="row">
                                    <a class="font-size-18 text-primary  p-1" data-toggle="modal" data-target=".bd-example-modal-lg"
                                    ><?php echo $check_in ?></a>
                                </div>
                                <div class="row">
                                    <span class="font-size-14 text-secondary">from From 00:00 until 23:30</span>
                                </div>
                            </div>
                            <div class="col" >
                                <span class="row font-weight-bold p-1 font-size-16">Check-out Date</span>
                                <a class="font-size-18 row font-weight-bold text-primary  p-1" data-toggle="modal" data-target=".bd-example-modal-lg"
                                ><?php echo $check_out; ?></a>
                                <span class="font-size-14 text-secondary row"><?php echo $nights; ?>-night stay</span>
                            </div>
                            <div class="col" >
                                <span class="row font-weight-bold p-1 font-size-16">Guests</span>
                                <a class="font-size-18 row font-weight-bold text-primary p-1" data-toggle="modal" data-target=".bd-example-modal-lg"
                                ><?php echo $adults; ?> adult</a>
                                
                            </div>
                            <div class="col" >
                                <span class="row font-weight-bold p-1 font-size-16">Rooms</span>
                                <a class="font-size-18 row font-weight-bold text-primary p-1" data-toggle="modal" data-target=".bd-example-modal-lg"
                                ><?php echo $roomsNum; ?></a>
                                
                            </div>
                            <div class="col" >
                                <button class="btn btn-primary text-white" data-toggle="modal" data-target=".bd-example-modal-lg">Change Search</button>
                            </div>
                        </div>
                        
                        <div class="modal fa
                        de bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content p-4">
                                    <form class="js-validate" action="" method="get" name="edit_dates">
                                        <input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>" />
                                        <input type="hidden" name="nights" value="<?php echo $nights ?>" />
                                        
                                          <div style="" class="row d-block nav-select d-lg-flex mb-lg-3 px-2 px-lg-3 align-items-end">

                                            <div class="col-sm-12 col-lg-3dot7 col-xl-3gdot5 mb-4 mb-lg-0 ">
                                                <!-- Input -->
                                                <span class="d-block text-gray-1 text-left font-weight-normal mb-0">Check In - Out</span>
                                                <div class="border-bottom border-width-2 border-color-1">
                                                    <div id="datepickerWrapperFromOne" class="u-datepicker input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="d-flex align-items-center mr-2">
                                                              <i class="flaticon-calendar text-primary font-weight-semi-bold"></i>
                                                            </span>
                                                            <input required="required"
                                                            id="hotel_date" name="hotel_date"
                                                            class="font-size-16 shadow-none font-weight-medium form-control bg-transparent border-0 flatpickr-input"
                                                            type="text"
                                                            value='["<?php echo $check_in ?>" to "<?php echo $check_out; ?>"]'
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                        flatpickr('#hotel_date', {
                                                            "minDate": "today",
                                                            "mode": "range",
                                                            "allowInput":true,
                                                            "onOpen": function(selectedDates, dateStr, instance) {
                                                                $(instance.altInput).prop('readonly', true);
                                                            },
                                                            "onClose": function(selectedDates, dateStr, instance) {
                                                                $(instance.altInput).prop('readonly', false);
                                                                $(instance.altInput).blur();
                                                            }

                                                        });
                                                    </script>
                                                <!-- End Input -->
                                            </div>

                                            <div class="col-sm-12 col-xl-3 mb-4 mb-lg-0 dropdown-custom">
                                                <!-- Input -->
                                                <span class="d-block text-gray-1 text-left font-weight-normal mb-0">Rooms and Guests</span>
                                                <a id="basicDropdownClickInvoker" class="dropdown-nav-link dropdown-toggle d-flex pt-3 pb-2" href="javascript:;" role="button" aria-controls="basicDropdownClick" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-target="#basicDropdownClick" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                                                    <i class="glyph-icon-custom flaticon-plus d-flex align-items-center mr-3 font-size-18 text-primary font-weight-semi-bold"></i>
                                                    <span style="margin-top: 10px" class="text-black font-size-16 font-weight-semi-bold"><?php echo $roomsNum; ?> Rooms - <?php echo $adults; ?> Guests</span>
                                                </a>
                                                <div id="basicDropdownClick" class="dropdown-menu dropdown-unfold col-11 m-0 u-unfold--css-animation u-unfold--hidden fadeOut" aria-labelledby="basicDropdownClickInvoker" style="animation-duration: 300ms;">
                                                    <div class="w-100 py-2 px-3 mb-3">
                                                        <div class="js-quantity mx-3 row align-items-center justify-content-between">
                                                            <span class="d-block font-size-16 text-secondary font-weight-medium">Rooms</span>
                                                            <div class="d-flex">
                                                                <a class="js-minus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;">
                                                                    <small class="fad fa-minus btn-icon__inner"></small>
                                                                </a>
                                                                <input required="required" id="roomsNum" name="roomsNum" class="js-result form-control h-auto border-0 rounded p-0 max-width-6 text-center"
                                                                 type="text" 
                                                                value="<?php echo $roomsNum; ?>">
                                                                <a class="js-plus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;">
                                                                    <small class="fad fa-plus btn-icon__inner"></small>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="w-100 py-2 px-3 mb-3">
                                                        <div class="js-quantity mx-3 row align-items-center justify-content-between">
                                                            <span class="d-block font-size-16 text-secondary font-weight-medium">Adults</span>
                                                            <div class="d-flex">
                                                                <a class="js-minus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;">
                                                                    <small class="fad fa-minus btn-icon__inner"></small>
                                                                </a>
                                                                <input required="required" id="adults" name="adults" 
                                                                class="js-result form-control h-auto border-0 rounded p-0 max-width-6 text-center" type="text"
                                                                 value="<?php echo $adults; ?>">
                                                                <a class="js-plus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;">
                                                                    <small class="fad fa-plus btn-icon__inner"></small>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="w-100 py-2 px-3">
                                                        <div class="js-quantity mx-3 row align-items-center justify-content-between">
                                                            <span class="d-block font-size-16 text-secondary font-weight-medium">Child</span>
                                                            <div class="d-flex">
                                                                <a class="js-minus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;">
                                                                    <small class="fad fa-minus btn-icon__inner"></small>
                                                                </a>
                                                                <input required="" id="child" name="child" 
                                                                class="js-result form-control h-auto border-0 rounded p-0 max-width-6 text-center" type="text" 
                                                                value="<?php echo $child; ?>">
                                                                <a class="js-plus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;">
                                                                    <small class="fad fa-plus btn-icon__inner"></small>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="w-100 text-right py-1 pr-5">
                                                        <a class="text-primary font-weight-semi-bold font-size-16" href="#">Done</a>
                                                    </div>
                                                </div>
                                                <!-- End Input -->
                                            </div>

                                            <div class="col-sm-12 col-xl-2 align-self-lg-end text-md-right ml-10">
                                                <button type="submit" class="btn btn-primary border-radius-3 mb-xl-0 mb-lg-1 transition-3d-hover"><i class="flaticon-magnifying-glass font-size-20 mr-2"></i>Confirm</button>
                                            </div>
                                          </div>
                                          <!-- End Checkbox -->
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Edit Data modal -->
                            <!-- action="post.php" method="post" -->
                            <form  name="reserve_room" class="js-validate" id="reserve_room" method="post" action="booking_post.php" >
                                <input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $hotel_id; ?>" >
                                <input type="hidden" name="hotel_name" id="hotel_name" value="<?php echo $fetch2['hHotelName']; ?>" >
                                <input type="hidden" name="phone_input" id="phone_input" value="0" />
                                <!-- <input type="hidden" name="guest_id" id="guest_id" value="" > -->
                                <input type="hidden" name="check-in" id="check-in" value="<?php echo $check_in ?>" >                                <input type="hidden" name="check-in" value="<?php echo $check_in  ?>" >
                                <input type="hidden" name="check-out" id="check-out" value="<?php echo $check_out ?>" >
                                <input type="hidden" name="nights" id="nights" value="<?php echo $nights ?>" >
                                <input type="hidden" name="psNumber" id="psNumber" value="<?php echo $adults ?>" >
                                <input type="hidden" name= "chNumber" id="chNumber" value="<?php echo  $child  ?>" >
                                <input type="hidden" name="paymentMethod" id="paymentMethod" value="" >

                                <div class="container border-bottom py-4 position-relative" id="availability">
                                    <h5 id="scroll-specifications" class="font-size-21 font-weight-bold text-dark mb-4">
                                        Availability
                                    </h5>
                                    <div class="row" >
                                        <div class="col-xs-12 col-lg-9 p-3">
                                            <table class="table ">
                                                <thead class="bg-primary text-white">
                                                    <tr>
                                                        <th>Room Type</th>
                                                        <th>Sleeps</th>
                                                        <th>Price for <?php echo $nights ?> nights</th>
                                                        <th>Select rooms</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $increment = 0;
                                                        $allRooms =[];// To Store 
                                                    foreach ($fetch_rooms as $key => $room1) { ?>
                                                    <tr>
                                                        <!-- room id: <?php echo $room1['rRoomID']; ?> -->
                                                        <td><b><?php echo $room1['rtRoomTypeEn']; ?></b></br>
                                                        <?php echo $room1['rnRoomNameEn']; ?>
                                                        </td>
                                                        <td>
                                                            <?php //showing the number of guests as icons
                                                            for ($i=1; $i <= $room1['rMaxPas']; $i++) { ?>
                                                                <i class="fas fa-user"></i>
                                                            <?php } ?>
                                                        </td>

                                                        <td><p id="<?php echo $room1['rRoomID'] ?>" name="" class="text-primary" >
                                                            <?php
                                                                $roomID = $room1['rRoomID'];
                                                                $result = (exe("call hima.roomRate('$roomID', '$check_in', '$check_out');"));
                                                                if ( $result != null){
                                                                    echo $result."<b id='currency'> USD</b>";
                                                                    echo "<input name='price_$roomID' id='price_$roomID' type='hidden' value='$result'>";
                                                                }
                                                                else{ ?>
                                                                    <p class="text-muted">Not Available </p>
                                                                    <?php echo "<input name='price_$roomID' id='price_$roomID' type='hidden' value='0'>"; ?>
                                                            <?php } ?>
                                                            </td>
                                                        <td>
                                                            <!-- js-select selectpicker dropdown-select -->
                                                            <?php //getting the minimum number of available rooms between the checkin and checkout
                                                                $ii = available_rooms($room1['rRoomID'], $check_in, $check_out);?>
                                                            <select onchange="calculate();sumRooms()" name="roomsNum_<?php echo $roomID; ?>" id="roomsNum_<?php echo $roomID; ?>" class="min-width-100 w-100 w-md-auto border-radius-3 mb-3 mb-md-0 mr-md-5"
                                                        data-style="border border-width-2 border-color-8">
                                                                <?php 
                                                                $it = 0;
                                                                #if there are no available rooms for the the dates provided
                                                                if($ii == ""){ ?>
                                                                    <option class="border-bottom py-2 font-size-16" value="0" >0</option>
                                                            <?php }
                                                                else{
                                                                    for($ii; $ii > 0; $ii--){ ?>
                                                                        <option class="border-bottom py-2 font-size-16" value="<?php echo $it; ?>" ><?php echo $it; ?></option>
                                                                <?php $it ++;  }
                                                                    } ?>
                                                                
                                                            </select>
                                                            <?php
                                                                array_push($allRooms, $room1['rRoomID']);
                                                            ?>
                                                        </td>
                                                    <tr>
                                                    <?php $increment ++; } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        <div class="col-xs-12 col-lg-3 p-3 mw-25 border border-secondary">
                                            <div class="row p-3">
                                                <p class="col text-dark"> Total:</p>
                                                <p id="total_price" class="col font-weight-bold text-primary"></p>
                                                <input type="hidden" name="totalPriceinput" id="totalPriceinput" value="0" >
                                                <p id="currency" class="col font-weight-bold text-primary">USD</p>
                                            </div>
                                            <div class="row p-4">
                                                <button onclick="reserve()" type="button" class="col btn btn-outline-primary border-radius-3 border-width-2 font-weight-bold min-width-150 text-lh-lg">I will Reserve</button> 
                                            </div>
                                                
                                            <div class=" row p-3" style="display:none;" id="room_alert">
                                                <p class="text-danger p-3 col">Please Select at least one room</p>
                                            </div>
                                        </div>
                                        
                                        
                                        <script type="text/javascript">
                                            
                                            // to make it easy to call variable by id
                                            function _(variable){
                                                    return document.getElementById(variable);
                                                }

                                            // total number of selected rooms
                                            var totalRooms = 0;//original value
                                            function sumRooms(){
                                                var totalRooms = 0 // reset each time function is called
                                                //Looping through all select elements and put them into an array
                                                var selects = document.getElementsByTagName('select');
                                                var sel;
                                                var relevantSelects = [];
                                                for(var z=0; z<selects.length; z++){
                                                    sel = selects[z];
                                                    if(sel.name.indexOf('roomsNum_') === 0){
                                                        relevantSelects.push(sel);
                                                    }
                                                }
                                                //looping through the array select elements and sum their values
                                                for (var x=0; x<relevantSelects.length; x++){
                                                    el = relevantSelects[x];
                                                    totalRooms = totalRooms + parseInt(el.options[el.selectedIndex].text);
                                                }
                                                return totalRooms;
                                                
                                            }

                                            //Calculation of the total price for all rooms
                                                var total = 0; 
                                                const allRooms = <?php echo json_encode($allRooms); ?>;
                                                
                                            function calculate(){ 
                                                total = 0;
                                                allRooms.forEach(calTotal);
                                                _("total_price").innerHTML = total;
                                                _("totalPriceinput").value = total;
                                            }
                                            
                                            function calTotal(item, index) {
                                                var roomsNum = _("roomsNum_".concat(item));
                                                var price = _("price_".concat(item));
                                                total = total + parseInt(price.value)*parseInt(roomsNum.options[roomsNum.selectedIndex].value);
                                            }

                                            // Switching among diffent booking sections
                                            // ---> send user to enter customer info section
                                            function reserve(){
                                                //Making sure there is at least one room selected
                                                if (_("totalPriceinput").value > 0){
                                                    //hidding and showing the sections
                                                    _("availability").style.display = "none";
                                                    _("info").style.display = "block";
                                                    _("customer_info").style.display = "block";
                                                    _("payment_info").style.display = "none";
                                                    // _("confirmation").style.display = "none";
                                                    _("room_alert").style.display = "none";
                                                    //set the dates, other info for customer view
                                                    _("show_dates").innerHTML = _("check-in").value + " - " + _("check-in").value;
                                                    _("stay").innerHTML = _("nights").value + " Nights";
                                                    _("adult").innerHTML = _("psNumber").value;
                                                    _("roomsNumber").innerHTML = sumRooms();
                                                    _("pay_amount").innerHTML = _("totalPriceinput").value + " USD";
                                                    

                                                }
                                                else {
                                                    _("room_alert").style.display = "block";
                                                    
                                                }
                                                

                                            }
                                        </script>

                                    </div>
                                </div>

                                <div class="container" style="display:none;" id="info">
                                    <div class="row">
                                        <div class="col-lg-8 col-xl-9">
                                            <div class="mb-5 shadow-soft bg-white rounded-sm" style="display:none;" id="customer_info">
                                                <div class="py-3 px-4 px-xl-12 border-bottom">
                                                    <ul class="list-group flex-nowrap overflow-auto overflow-md-visble list-group-horizontal list-group-borderless flex-center-between pt-1">
                                                        <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                                            <div class="flex-content-center mb-3 width-40 height-40 bg-primary border-width-2 border border-primary text-white mx-auto rounded-circle">
                                                                1
                                                            </div>
                                                            <div class="text-primary">Customer information</div>
                                                        </li>
                                                        <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                                            <div class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                                                2
                                                            </div>
                                                            <div class="text-gray-1">Payment information</div>
                                                        </li>
                                                        <li class="list-group-item text-center flex-shrink-0 flex-md-shrink-1">
                                                            <div class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                                                3
                                                            </div>
                                                            <div class="text-gray-1">Booking is confirmed!</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="pt-4 pb-5 px-5">
                                                    <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-4">
                                                        Let us know who you are
                                                    </h5>
                                                    <!-- Contacts Form -->
                                                    <div>
                                                        <div class="row">
                                                            <!-- Input -->
                                                            <div class="col-sm-6 mb-4">
                                                                <div class="js-form-message">
                                                                    <label class="form-label">
                                                                        Full Name
                                                                    </label>
                                                                    <input type="text" class="form-control" name="fullName" id="fullName" placeholder="Ali Mohammed" aria-label="Ali Mohammed" required
                                                                    data-msg="Please enter your full name."
                                                                    data-error-class="u-has-error"
                                                                    data-success-class="u-has-success" value="<?php echo $iFullName;?>">
                                                                    </br>
                                                                    <span id="fullNameAlert" class="text-danger" ></span>
                                                                </div>
                                                            </div>
                                                            <!-- End Input -->

                                                            <!-- Input -->
                                                            <div class="col-sm-6 mb-4">
                                                                <div class="js-form-message">
                                                                    <label class="form-label">
                                                                        Email
                                                                    </label>

                                                                    <input type="email" class="form-control" name="email" id="email" placeholder="creativelayers088@gmail.com" aria-label="creativelayers088@gmail.com" 
                                                                    data-msg="Please enter a valid email address."
                                                                    data-error-class="u-has-error"
                                                                    data-success-class="u-has-success" value="<?php echo $iEmail ?>">
                                                                    </br>
                                                                    <span id="emailAlert" class="text-danger" ></span>
                                                                </div>
                                                            </div>
                                                            <!-- End Input -->

                                                            <!-- Input -->
                                                            <div class="col-sm-6 mb-4">
                                                                <div class="js-form-message">
                                                                    <label class="form-label">
                                                                        City
                                                                    </label>
                                                                    <select name="city" id="city" class="form-control js-select selectpicker dropdown-select" required="" data-msg="Please select city." data-error-class="u-has-error" data-success-class="u-has-success"
                                                                        data-live-search="true"
                                                                        data-style="form-control font-size-16 border-width-2 border-gray font-weight-normal">
                                                                        <option value ="<?php echo $iAddress; ?>" selected><?php echo $iAddress; ?></option>
                                                                        <?php
                                                                            foreach(Cities::getCities() as $city){ ?>
                                                                                <option value="<?php echo $city ?>"><?php echo $city ?></option> 
                                                                           <?php }

                                                                        ?>
                                                                    </select>
                                                                    </br>
                                                                    <span id="cityAlert" class="text-danger" ></span>
                                                                </div>
                                                            </div>
                                                            <!-- End Input -->

                                                            <div class="w-100"></div>
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <a onClick="back()" type="button" class="d-flex h1 py-3">
                                                                    <i class="fas fa-arrow-left"></i>
                                                                </a>
                                                            </div>
                                                            <div class="col-6">
                                                                <button id="nextPage" type="button" class="btn btn-primary rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3 w-100">NEXT PAGE</button>
                                                            </div>
                                                                
                                                            <div class="w-100"></div>
                                                        </div>
                                                     </div>
                                                    <!-- End Contacts Form -->
                                                </div>
                                                <div class="mb-5 shadow-soft bg-white rounded-sm " style="display:none;" id="payment_info">
                                                    <div class="py-3 px-4 px-xl-12 border-bottom">
                                                        <ul class="list-group flex-nowrap overflow-auto overflow-md-visble list-group-horizontal list-group-borderless flex-center-between pt-1">
                                                            <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                                                <a href="#" onClick="reserve()"class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                                                    1
                                                                </a>
                                                                <a onClick="reserve()" class="text-gray-1">Customer information</a>
                                                            </li>
                                                            <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                                                <div class="flex-content-center mb-3 width-40 height-40 bg-primary border-width-2 border border-primary text-white mx-auto rounded-circle">
                                                                    2
                                                                </div>
                                                                <div class="text-primary">Payment information</div>
                                                            </li>
                                                            <li class="list-group-item text-center flex-shrink-0 flex-md-shrink-1">
                                                                <div class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                                                    3
                                                                </div>
                                                                <div class="text-gray-1">Booking is confirmed!</div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="pt-4 pb-5 px-5">
                                                        <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-4">
                                                            Please Select your payment method:
                                                        </h5>
                                                        <!-- Nav Classic -->
                                                        <ul class="nav nav-classic nav-choose border-0 nav-justified border mx-n3" role="tablist">
                                                            <li class="nav-item mx-3 mb-4 mb-md-0 p-4">
                                                                <a class="rounded py-5 border-width-2 border nav-link font-weight-medium" id="CashOption" data-toggle="pill" href="#pills-one-example2" role="tab" aria-controls="pills-one-example2" aria-selected="false">
                                                                    <div class="height-25 width-25 flex-content-center bg-primary rounded-circle position-absolute left-0 top-0 ml-2 mt-2">
                                                                        <i class="flaticon-tick text-white font-size-15"></i>
                                                                    </div>
                                                                    <div class="d-md-flex justify-content-md-center align-items-md-center flex-wrap">
                                                                        <img class="img-fluid mb-3" src="cp/register/add_hotel/img/credit_cards/cash.png" alt="Cash on arrival">
                                                                        <div class="w-100 text-dark">Cash On Arrival</div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <!-- show only in mobile version -->
                                                            <div class="w-100 d-none d-xs-block"></div>
                                                            <li class="nav-item mx-3 mb-4 mb-md-0 p-4">
                                                                <a class="rounded py-5 border-width-2 border nav-link font-weight-medium" id="zainCashOption" data-toggle="pill" href="#pills-one-example2" role="tab" aria-controls="pills-one-example2" aria-selected="false">
                                                                    <div class="height-25 width-25 flex-content-center bg-primary rounded-circle position-absolute left-0 top-0 ml-2 mt-2">
                                                                        <i class="flaticon-tick text-white font-size-15"></i>
                                                                    </div>
                                                                    <div class="d-md-flex justify-content-md-center align-items-md-center flex-wrap">
                                                                        <img class="img-fluid mb-3" src="cp/register/add_hotel/img/credit_cards/zain-cash.png" alt="Zain Cash">
                                                                        <div class="w-100 text-dark">Zain Cash</div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <div class="w-100 d-none d-md-block"></div>
                                                            <li class="nav-item mx-3 p-4">
                                                                <a class="rounded py-5 border-width-2 border nav-link font-weight-medium" id="asiaHawalaOption" data-toggle="pill" href="#pills-two-example2" role="tab" aria-controls="pills-two-example2" aria-selected="false">
                                                                    <div class="height-25 width-25 flex-content-center bg-primary rounded-circle position-absolute left-0 top-0 ml-2 mt-2">
                                                                        <i class="flaticon-tick text-white font-size-15"></i>
                                                                    </div>
                                                                    <div class="d-md-flex justify-content-md-center align-items-md-center flex-wrap">
                                                                        <img class="img-fluid mb-3" src="cp/register/add_hotel/img/credit_cards/asia-hawala-en.png" alt="Asia Hawala">
                                                                        <div class="w-100 text-dark">Asia Hawala</div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item mx-3 p-4">
                                                                <a class="rounded py-5 border-width-2 border nav-link font-weight-medium" id="FastPayOption" data-toggle="pill" href="#pills-two-example2" role="tab" aria-controls="pills-two-example2" aria-selected="false">
                                                                    <div class="height-25 width-25 flex-content-center bg-primary rounded-circle position-absolute left-0 top-0 ml-2 mt-2">
                                                                        <i class="flaticon-tick text-white font-size-15"></i>
                                                                    </div>
                                                                    <div class="d-md-flex justify-content-md-center align-items-md-center flex-wrap">
                                                                        <img class="img-fluid mb-3" src="cp/register/add_hotel/img/credit_cards/fast-pay.png" alt="Fast Pay">
                                                                        <div class="w-100 text-dark">Fast Pay</div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <!-- End Nav Classic -->
                                                        <div class="w-100 d-none d-md-block p-4"></div>
                                                        <div calss="row">
                                                            <center class="text-danger" id="paymentAlert"> </center>
                                                        </div>
                                                        <div class="w-100 p-4"></div>


                                                        <div class="row">
                                                            <div class="col-6">
                                                                <a onClick="back()" type="button" class="d-flex h1 py-3">
                                                                    <i class="fas fa-arrow-left"></i>
                                                                </a>
                                                            </div>
                                                            <div class="col-6">
                                                                <a onClick="submit()" class="btn btn-primary rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3 w-100">CONFIRM BOOKING</a>
                                                            </div>
                                                                
                                                            <div class="w-100"></div>
                                                        </div>

                                                        <!-- <a onClick="submit()"  class="btn btn-primary text-white w-100 rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3">CONFIRM BOOKING</a>
                                                            </br>
                                                        <a  href="#info" class="font-size-10 py-3" >PREVIOUS PAGE</a> -->
                                                    </div>
                                                </div>
                                            </div>

                                            </form>
                                            <div class="col-lg-4 col-xl-3">
                                            <div class="shadow-soft bg-white rounded-sm">
                                                <div class="pt-5 pb-3 px-5 border-bottom">
                                                    <a href="#" class="d-block mb-3">
                                                        <img class="img-fluid rounded-xs" src="<?php echo $main_pic ?>" alt="Hotel Image,">
                                                    </a>
                                                    <p class="text-dark font-weight-bold pr-xl-1"><?php echo $fetch2['hAddress']; ?> </p>
                                                    <div class="my-1 flex-horizontal-center text-gray-1">
                                                        <i class="icon flaticon-pin-1 mr-2 font-size-15"></i> <?php echo $fetch2['hCity']; ?>
                                                    </div>
                                                </div>
                                                <!-- Basics Accordion -->
                                                <div id="basicsAccordion">
                                                    <!-- Card -->
                                                    <div class="card rounded-0 border-top-0 border-left-0 border-right-0">
                                                        <div class="card-header card-collapse bg-transparent border-0" id="basicsHeadingOne">
                                                            <h5 class="mb-0">
                                                                <button type="button" class="btn btn-link border-0 btn-block d-flex justify-content-between card-btn py-3 px-4 font-size-17 font-weight-bold text-dark"
                                                                    data-toggle="collapse"
                                                                    data-target="#basicsCollapseOne"
                                                                    aria-expanded="true"
                                                                    aria-controls="basicsCollapseOne">
                                                                    Booking Details

                                                                    <span class="card-btn-arrow font-size-14 text-dark">
                                                                        <i class="fas fa-chevron-down"></i>
                                                                    </span>
                                                                </button>
                                                            </h5>
                                                        </div>
                                                        <div id="basicsCollapseOne" class="collapse show"
                                                            aria-labelledby="basicsHeadingOne"
                                                            data-parent="#basicsAccordion">
                                                            <div class="card-body px-4 pt-0">
                                                                <!-- Fact List -->
                                                                <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                                                                    <li class="d-flex justify-content-between py-2">
                                                                        <span class="font-weight-medium" id="show_dates"><br>
                                                                            <span class="text-gray-1 font-weight-normal"></span>
                                                                        </span>                                                                    </li>
                                                                    <li class="d-flex justify-content-between py-2">
                                                                        <span class="font-weight-medium">Stay</span>
                                                                        <span class="text-secondary" id="stay"></span>
                                                                    </li>

                                                                    <li class="d-flex justify-content-between py-2">
                                                                        <span class="font-weight-medium">Rooms</span>
                                                                        <span class="text-secondary" id="roomsNumber">2 Room</span>
                                                                    </li>

                                                                    <li class="d-flex justify-content-between py-2">
                                                                        <span class="font-weight-medium">Adult</span>
                                                                        <span class="text-secondary" id="adult">0</span>
                                                                    </li>
                                                                </ul>
                                                                <!-- End Fact List -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Card -->
                                                    <!-- Card -->
                                                    <div class="card rounded-0 border-top-0 border-left-0 border-right-0">
                                                        <div class="card-header card-collapse bg-transparent border-0" id="basicsHeadingFour">
                                                            <h5 class="mb-0">
                                                                <button type="button" class="btn btn-link border-0 btn-block d-flex justify-content-between card-btn py-3 px-4 font-size-17 font-weight-bold text-dark"
                                                                    data-toggle="collapse"
                                                                    data-target="#basicsCollapseFour"
                                                                    aria-expanded="false"
                                                                    aria-controls="basicsCollapseFour">
                                                                    Payment

                                                                    <span class="card-btn-arrow font-size-14 text-dark">
                                                                        <i class="fas fa-chevron-down"></i>
                                                                    </span>
                                                                </button>
                                                            </h5>
                                                        </div>
                                                        <div id="basicsCollapseFour" class="collapse show"
                                                            aria-labelledby="basicsHeadingFour"
                                                            data-parent="#basicsAccordion">
                                                            <div class="card-body px-4 pt-0">
                                                                <!-- Fact List -->
                                                                <ul class="list-unstyled font-size-1 mb-0 font-size-16">

                                                                    <!-- <li class="d-flex justify-content-between py-2">
                                                                        <span class="font-weight-medium">Tax</span>
                                                                        <span class="text-secondary">0 %</span>
                                                                    </li> -->

                                                                    <li class="d-flex justify-content-between py-2 font-size-17 font-weight-bold">
                                                                        <span class="font-weight-bold">Pay Amount</span>
                                                                        <span class="text-primary" id="pay_amount">0 USD</span>
                                                                    </li>
                                                                </ul>
                                                                <!-- End Fact List -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Card -->
                                                </div>
                                                <!-- End Basics Accordion -->
                                            </div>
                                        </div>
                                        </div>
                                        


                                        <!-- Modal mobile verification -->
                                        <div class="modal fade" id="phoneVerificationModal" tabindex="-1" role="dialog" aria-labelledby="phoneVerificationModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="phoneVerificationModalLabel">Verify Your phone number</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form name="phone_verification" id="phone_verification" method="post" action="../send_sms/send.php" >
                                                            <div class="">
                                                                <div class="row justify-content-center p-2">
                                                                    <input name="phone" type="text" class="form-control mb-2 inptFielsd" id="phone" placeholder="0770XXXXXXX" pattern="[0-9]" required data-msg="Please enter a valid phone number."
                                                                    data-error-class="u-has-error"
                                                                    data-success-class="u-has-success"  />
                                                                </div>
                                                                <div class="row justify-content-center p-2">
                                                                    <button id="confirmBtn" type="button" class="btn btn-primary w-50" onClick="checkPhoneNumber()" > Confirm </button>
                                                                    <span id="counter2" class="text-primary"> </span>
                                                                </div>   
                                                                <div class="row justify-content-center p-2">
                                                                    <span class="text-danger" id="phoneVerifyAlert"></span>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <div class="" style="display:none" id="verifyDiv">
                                                            <div class="row justify-content-center p-2">
                                                                <span>Enter the code we have sent to: </span>
                                                                <div class="w-100"></div>    
                                                                <span class="h4 p-1 text-primary" id="destNumber"> </span> 
                                                                <a type="button" class="p-2" id="editNumber" onclick="editNumber()"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                            <div class="row justify-content-center p-2">
                                                                <input class="col-3 p-4 form-control" id="phoneVerifyCode" value="" placeholder="XXXX">
                                                                <div class="col-1 p-3">
                                                                    <button type="button" class="row h1 btn p-1" id="reSendCode" onclick="checkPhoneNumber()">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                                                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"></path>
                                                                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"></path>
                                                                    </svg></button>
                                                                    <span id="counter" > </span>
                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-center p-2">
                                                                <button type="button" class="btn btn-primary w-50" onclick="veifyCode()"> Verify </button>
                                                            </div>
                                                            <div class="row justify-content-center p-2">
                                                                <span class="text-danger" id="codeVerifyAlert"></span>
                                                            </div>
                                                        </div>
                                                        <div class="" style="display:none" id="verifiedDiv">
                                                            <div class="row justify-content-center p-2">
                                                                <span class="h4 text-success"> Phone Number is verified </span> 
                                                            </div>
                                                            <div class="row justify-content-center p-2">
                                                                <span class="col h4 p-1 text-primary" id="destNumber2"> </span> 
                                                                <a type="button" class="col p-2" id="" onclick="editNumber()"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                                                                    </svg>
                                                                 </a>
                                                            </div>
                                                        </div>
                                                        <div class="" id="alwaysMessageDiv">
                                                            <span class="col h6 p-1 text-danger" id="alwaysAlert"> </span> 
                                                        </div>
                                                            <!-- JAVASCRIPT CODE REQUIRED -->
                                                            <script type="text/javascript" >
                                                                var input = document.querySelector("#phone");// attach the country codes list to phone element
                                                                var phoneNumberObj = window.intlTelInput(input, {
                                                                    separateDialCode: true,
                                                                    hiddenInput: "full", //create an input to hold the country code + the phone number
                                                                    initialCountry:"iq",
                                                                    preferredCountries: ["iq","us", "gb"],
                                                                });
                                                                
                                                            
                                                                                                                                
                                                                
                                                            </script>
                                                            <!-- REQUIRED CDN  -->
                                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
                                                                integrity="sha512-BNZ1x39RMH+UYylOW419beaGO0wqdSkO7pi1rYDYco9OL3uvXaC/GTqA5O4CVK2j4K9ZkoDNSSHVkEQKkgwdiw=="
                                                                crossorigin="anonymous">
                                                            </script>
                                                        

                                                    </div>
                                                    <!-- <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End phone Number verification modal -->


                                        

                                    </div>
                                </div>
                                <!-- Hidden form for sending the data back to the server -->
                                <div id="hform">


                                </div>
                            
                            

                      <!--
                        <div class="border-bottom py-4 position-relative">
                            <h5 id="scroll-specifications" class="font-size-21 font-weight-bold text-dark mb-4">
                                Nearest Essentials
                            </h5>
                            <ul class="list-group list-group-borderless list-group-horizontal list-group-flush no-gutters row">
                                <li class="col-md-4 mb-5 list-group-item py-0">
                                    <div class="font-weight-bold text-dark mb-1">Airports</div>
                                    <div class="text-gray-1">London City Airport (LCY)</div>
                                    <div class="text-primary mb-2">14.4 km</div>
                                    <div class="text-gray-1">Heathrow Airport (LHR)</div>
                                    <div class="text-primary">21.2 km</div>
                                </li>
                                <li class="col-md-4 mb-5 list-group-item py-0">
                                    <div class="font-weight-bold text-dark mb-1">Public transportation</div>
                                    <div class="text-gray-1">Marble Arch Tube Station</div>
                                    <div class="text-primary mb-2">40 m</div>
                                    <div class="text-gray-1">Baker Street Tube Station</div>
                                    <div class="text-primary">9 m</div>
                                </li>
                                <li class="col-md-4 mb-5 list-group-item py-0">
                                    <div class="font-weight-bold text-dark mb-1">Hospital or clinic</div>
                                    <div class="text-gray-1">The Wellington Hospital</div>
                                    <div class="text-primary">2.1 km</div>
                                </li>
                                <li class="col-md-4 mb-5 list-group-item py-0">
                                    <div class="font-weight-bold text-dark mb-1">Horsepower (hp)</div>
                                    <div class="text-gray-1">200</div>
                                </li>
                                <li class="col-md-4 mb-5 list-group-item py-0">
                                    <div class="font-weight-bold text-dark mb-1">Transmission</div>
                                    <div class="text-gray-1">Manual</div>
                                </li>
                                <li class="col-md-4 mb-5 list-group-item py-0">
                                    <div class="font-weight-bold text-dark mb-1">Condition</div>
                                    <div class="text-gray-1">New</div>
                                </li>
                                <li class="col-md-4 mb-5 list-group-item py-0">
                                    <div class="font-weight-bold text-dark mb-1">Drive</div>
                                    <div class="text-gray-1">Rear</div>
                                </li>
                                <li class="col-md-4 mb-5 list-group-item py-0">
                                    <div class="font-weight-bold text-dark mb-1">Warranty</div>
                                    <div class="text-gray-1">Yes</div>
                                </li>
                                <li class="col-md-4 mb-5 list-group-item py-0">
                                    <div class="font-weight-bold text-dark mb-1">Hospital or clinic</div>
                                    <div class="text-gray-1">The Wellington Hospital</div>
                                    <div class="text-primary">2.1 km</div>
                                </li>
                            </ul>
                            <div class="collapse" id="collapseLinkExample2">
                                <ul class="list-group list-group-borderless list-group-horizontal list-group-flush no-gutters row">
                                    <li class="col-md-4 mb-5 list-group-item py-0">
                                        <div class="font-weight-bold text-dark mb-1">Airports</div>
                                        <div class="text-gray-1">London City Airport (LCY)</div>
                                        <div class="text-primary mb-2">14.4 km</div>
                                        <div class="text-gray-1">Heathrow Airport (LHR)</div>
                                        <div class="text-primary">21.2 km</div>
                                    </li>
                                    <li class="col-md-4 mb-5 list-group-item py-0">
                                        <div class="font-weight-bold text-dark mb-1">Public transportation</div>
                                        <div class="text-gray-1">Marble Arch Tube Station</div>
                                        <div class="text-primary mb-2">40 m</div>
                                        <div class="text-gray-1">Baker Street Tube Station</div>
                                        <div class="text-primary">9 m</div>
                                    </li>
                                    <li class="col-md-4 mb-5 list-group-item py-0">
                                        <div class="font-weight-bold text-dark mb-1">Shopping</div>
                                        <div class="text-gray-1">Harrods</div>
                                        <div class="text-primary">1.5 km</div>
                                    </li>
                                </ul>
                            </div>

                            <a class="link-collapse link-collapse-custom gradient-overlay-half mb-5 d-inline-block border-bottom border-primary" data-toggle="collapse" href="#collapseLinkExample2" role="button" aria-expanded="false" aria-controls="collapseLinkExample2">
                                <span class="link-collapse__default font-size-14">View More <i class="flaticon-down-chevron font-size-10 ml-1"></i></span>
                                <span class="link-collapse__active font-size-14">View Less <i class="flaticon-arrow font-size-10 ml-1"></i></span>
                            </a>
                        </div>
                        <div class="border-bottom py-4 position-relative">
                            <h5 id="scroll-specifications" class="font-size-21 font-weight-bold text-dark mb-4">
                                What's Nearby
                            </h5>
                            <ul class="list-group list-group-borderless list-group-horizontal list-group-flush no-gutters row">
                                <li class="col-md-4 list-group-item py-0">
                                    <div class="font-weight-bold text-dark mb-2">Popular landmarks</div>
                                    <div class="text-gray-1 mb-2 pt-1">Buckingham Palace - 1.84 km</div>
                                    <div class="text-gray-1 mb-2 pt-1">St. James's Park - 2.09 km</div>
                                    <div class="text-gray-1 mb-2 pt-1">British Museum - 2.32 km</div>
                                    <div class="text-gray-1 mb-2 pt-1">Westminster Abbey - 2.65 km</div>
                                    <div class="text-gray-1 mb-2 pt-1">Houses of Parliament - 2.78 km</div>
                                    <div class="text-gray-1 mb-2 pt-1">Camden Market - 3.31 km</div>
                                    <div class="text-gray-1 mb-2 pt-1">Tower Bridge - 5.85 km</div>
                                    <div class="text-gray-1 mb-2 pt-1">Tower of London - 5.76 km</div>
                                </li>
                                <li class="col-md-4 list-group-item py-0">
                                    <div class="font-weight-bold text-dark mb-2">Nearby landmarks</div>
                                    <div class="text-gray-1 mb-2 pt-1">Marble Arch Tube Station - 40 m</div>
                                    <div class="text-gray-1 mb-2 pt-1">Still Water Horse Head Statue - 70 m</div>
                                    <div class="text-gray-1 mb-2 pt-1">Marble Arch - 80 m</div>
                                    <div class="text-gray-1 mb-2 pt-1">Tyburn Tree - 140 m</div>
                                    <div class="text-gray-1 mb-2 pt-1">Speakers’ Corner - 160 m</div>
                                    <div class="text-gray-1 mb-2 pt-1">Homemade London - 220 m</div>
                                    <div class="text-gray-1 mb-2 pt-1">Salt Whisky Bar - 240 m</div>
                                    <div class="text-gray-1 mb-2 pt-1">Clarks - 280 m</div>
                                </li>
                            </ul>
                            <div class="collapse" id="collapseLinkExample3">
                                <ul class="list-group list-group-borderless list-group-horizontal list-group-flush no-gutters row">
                                    <li class="col-md-4 mb-2 list-group-item py-0">
                                        <div class="text-gray-1 mb-2 pt-1">Buckingham Palace - 1.84 km</div>
                                        <div class="text-gray-1 mb-2 pt-1">St. James's Park - 2.09 km</div>
                                        <div class="text-gray-1 mb-2 pt-1">British Museum - 2.32 km</div>
                                    </li>
                                    <li class="col-md-4 mb-2 list-group-item py-0">
                                        <div class="text-gray-1 mb-2 pt-1">Marble Arch Tube Station - 40 m</div>
                                        <div class="text-gray-1 mb-2 pt-1">Still Water Horse Head Statue - 70 m</div>
                                        <div class="text-gray-1 mb-2 pt-1">Marble Arch - 80 m</div>
                                    </li>
                                </ul>
                            </div>

                            <a class="link-collapse link-collapse-custom gradient-overlay-half mb-5 d-inline-block border-bottom border-primary" data-toggle="collapse" href="#collapseLinkExample3" role="button" aria-expanded="false" aria-controls="collapseLinkExample3">
                                <span class="link-collapse__default font-size-14">View More <i class="flaticon-down-chevron font-size-10 ml-1"></i></span>
                                <span class="link-collapse__active font-size-14">View Less <i class="flaticon-arrow font-size-10 ml-1"></i></span>
                            </a>
                        </div>
                        <div class="border-bottom py-4 position-relative">
                            <h5 id="scroll-specifications" class="font-size-21 font-weight-bold text-dark mb-4">
                                House Rules
                            </h5>
                            <ul class="list-group list-group-borderless list-group-horizontal list-group-flush no-gutters row">
                                <li class="col-md-4 list-group-item py-0">
                                    <div class="font-weight-bold text-dark mb-2">Check-in/Check-out</div>
                                    <div class="text-gray-1 mb-2 pt-1">Check-in from: 15:00</div>
                                    <div class="text-gray-1 mb-4 pt-1">Check-out until: 11:00</div>
                                    <div class="font-weight-bold text-dark mb-2">Getting around</div>
                                    <div class="text-gray-1 mb-4 pt-1">Distance from city center: 0 km</div>
                                    <div class="font-weight-bold text-dark mb-2">The property</div>
                                    <div class="text-gray-1 mb-2 pt-1">Number of floors: 8</div>
                                    <div class="text-gray-1 mb-2 pt-1">Number of rooms : 998</div>
                                    <div class="text-gray-1 mb-4 pt-1">Most recent renovation: 2019</div>
                                </li>
                                </li>
                                <li class="col-md-4 list-group-item py-0">
                                    <div class="font-weight-bold text-dark mb-2">Extras</div>
                                    <div class="text-gray-1 mb-2 pt-1">Breakfadt charge (unless included in room price): 20 GBP</div>
                                    <div class="text-gray-1 mb-4 pt-1">Still Water Horse Head Statue - 70 m</div>
                                    <div class="font-weight-bold text-dark mb-2">The property</div>
                                    <div class="text-gray-1 mb-2 pt-1">Number of floors: 8</div>
                                    <div class="text-gray-1 mb-2 pt-1">Number of rooms : 998</div>
                                    <div class="text-gray-1 mb-2 pt-1">Most recent renovation: 2019</div>
                                </li>
                            </ul>
                            <div class="collapse" id="collapseLinkExample4">
                                <ul class="list-group list-group-borderless list-group-horizontal list-group-flush no-gutters row">
                                    <li class="col-md-4 list-group-item py-0">
                                        <div class="font-weight-bold text-dark mb-2">Check-in/Check-out</div>
                                        <div class="text-gray-1 mb-2 pt-1">Check-in from: 15:00</div>
                                        <div class="text-gray-1 mb-4 pt-1">Check-out until: 11:00</div>
                                        <div class="font-weight-bold text-dark mb-2">Getting around</div>
                                        <div class="text-gray-1 mb-2 pt-1">Distance from city center: 0 km</div>
                                    </li>
                                    <li class="col-md-4 list-group-item py-0">
                                        <div class="font-weight-bold text-dark mb-2">Extras</div>
                                        <div class="text-gray-1 mb-2 pt-1">Breakfadt charge (unless included in room price): 20 GBP</div>
                                        <div class="text-gray-1 mb-4 pt-1">Still Water Horse Head Statue - 70 m</div>
                                        <div class="font-weight-bold text-dark mb-2">The property</div>
                                        <div class="text-gray-1 mb-2 pt-1">Number of floors: 8</div>
                                        <div class="text-gray-1 mb-2 pt-1">Number of rooms : 998</div>
                                        <div class="text-gray-1 mb-4 pt-1">Most recent renovation: 2019</div>
                                    </li>
                                </ul>
                            </div>

                            <a class="link-collapse link-collapse-custom gradient-overlay-half mb-5 d-inline-block border-bottom border-primary" data-toggle="collapse" href="#collapseLinkExample4" role="button" aria-expanded="false" aria-controls="collapseLinkExample4">
                                <span class="link-collapse__default font-size-14">View More <i class="flaticon-down-chevron font-size-10 ml-1"></i></span>
                                <span class="link-collapse__active font-size-14">View Less <i class="flaticon-arrow font-size-10 ml-1"></i></span>
                            </a>
                        </div>
                          -->
                        <!-- 
                        <div class="border-bottom py-4">
                            <h5 id="scroll-reviews" class="font-size-21 font-weight-bold text-dark mb-4">
                                Average Reviews
                            </h5>
                            <div class="row">
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <div class="border rounded flex-content-center py-5 border-width-2">
                                        <div class="text-center">
                                            <h2 class="font-size-50 font-weight-bold text-primary mb-0 text-lh-sm">
                                                4.2<span class="font-size-20">/5</span>
                                            </h2>
                                            <div class="font-size-25 text-dark mb-3">Very Good</div>
                                            <div class="text-gray-1">From 40 reviews</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <h6 class="font-weight-normal text-gray-1 mb-1">
                                                Cleanliness
                                            </h6>
                                            <div class="flex-horizontal-center mr-6">
                                                <div class="progress bg-gray-33 rounded-pill w-100" style="height: 7px;">
                                                    <div class="progress-bar rounded-pill" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="ml-3 text-primary font-weight-bold">
                                                    4.8
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <h6 class="font-weight-normal text-gray-1 mb-1">
                                                Facilities
                                            </h6>
                                            <div class="flex-horizontal-center mr-6">
                                                <div class="progress bg-gray-33 rounded-pill w-100" style="height: 7px;">
                                                    <div class="progress-bar rounded-pill" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="ml-3 text-primary font-weight-bold">
                                                    1.4
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <h6 class="font-weight-normal text-gray-1 mb-1">
                                                Value for money
                                            </h6>
                                            <div class="flex-horizontal-center mr-6">
                                                <div class="progress bg-gray-33 rounded-pill w-100" style="height: 7px;">
                                                    <div class="progress-bar rounded-pill" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="ml-3 text-primary font-weight-bold">
                                                    3.2
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <h6 class="font-weight-normal text-gray-1 mb-1">
                                                Service
                                            </h6>
                                            <div class="flex-horizontal-center mr-6">
                                                <div class="progress bg-gray-33 rounded-pill w-100" style="height: 7px;">
                                                    <div class="progress-bar rounded-pill" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="ml-3 text-primary font-weight-bold">
                                                    5.0
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="font-weight-normal text-gray-1 mb-1">
                                                Location
                                            </h6>
                                            <div class="flex-horizontal-center mr-6">
                                                <div class="progress bg-gray-33 rounded-pill w-100" style="height: 7px;">
                                                    <div class="progress-bar rounded-pill" role="progressbar" style="width: 86%;" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="ml-3 text-primary font-weight-bold">
                                                    4.8
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        -->

                        <div id="stickyBlockEndPoint">

                        </div>

                        <!-- <div class="border-bottom py-4">
                            <h5 class="font-size-21 font-weight-bold text-dark mb-8">
                                Showing 16 verified guest comments
                            </h5>
                            <div class="media flex-column flex-md-row align-items-center align-items-md-start mb-4">
                                <div class="mr-md-5">
                                    <a class="d-block" href="#">
                                        <img class="img-fluid mb-3 mb-md-0 rounded-circle" src="assets/img/85x85/img1.jpg" alt="Image-Description">
                                    </a>
                                </div>
                                <div class="media-body text-center text-md-left">
                                    <div class="mb-4">
                                        <h6 class="font-weight-bold text-gray-3">
                                            <a href="#">Helena</a>
                                        </h6>
                                        <div class="font-weight-normal font-size-14 text-gray-9 mb-2">April 25, 2019 at 10:46 am</div>
                                        <div class="d-flex align-items-center flex-column flex-md-row mb-2">
                                            <button type="button" class="btn btn-xs btn-primary rounded-xs font-size-14 py-1 px-2 mr-2 mb-2 mb-md-0">4.6 /5 </button>
                                            <span class="font-weight-bold font-italic text-gray-3">The worst hotel ever ”</span>
                                        </div>
                                        <p class="text-lh-1dot6 mb-0 pr-lg-5">Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere ultricies tortor imperdiet vitae. Curabitur lacinia neque non metus</p>
                                    </div>
                                    <div class="review">
                                        <div class="row no-gutters justify-content-between align-items-center border border-color-8 border-width-2 rounded-xs p-3 px-md-3 py-md-2 pr-xl-5">
                                            <div class="col">
                                                <div class="font-weight-normal font-size-14 text-gray-1 mx-lg-1 my-lg-1 mb-3 mb-md-0">Was This Review...?</div>
                                            </div>
                                            <div class="col-md-6 col-lg-7 col-xl-4">
                                                <div class="d-flex justify-content-between my-lg-1">
                                                    <a class="text-indigo-light" href="#">
                                                        <i class="flaticon-like-1 font-size-15 mr-1"></i>
                                                        <span class="font-size-14 font-weight-normal">Like</span>
                                                    </a>
                                                    <a class="text-gray-7" href="#">
                                                        <i class="flaticon-dislike font-size-15 mr-1"></i>
                                                        <span class="font-size-14 font-weight-normal">Dislike</span>
                                                    </a>
                                                    <a class="text-red-light-2" href="#">
                                                        <i class="flaticon-like font-size-15 mr-1"></i>
                                                        <span class="font-size-14 font-weight-normal">Love</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="media flex-column flex-md-row align-items-center align-items-md-start mb-0">
                                <div class="mr-md-5">
                                    <a class="d-block" href="#">
                                        <img class="img-fluid mb-3 mb-md-0 rounded-circle" src="assets/img/85x85/img2.jpg" alt="Image-Description">
                                    </a>
                                </div>
                                <div class="media-body text-center text-md-left">
                                    <div class="mb-4">
                                        <h6 class="font-weight-bold text-gray-3">
                                            <a href="#">Ashleigh</a>
                                        </h6>
                                        <div class="font-weight-normal font-size-14 text-gray-9 mb-2">April 25, 2019 at 10:46 am</div>
                                        <div class="d-flex align-items-center flex-column flex-md-row mb-2">
                                            <button type="button" class="btn btn-xs btn-primary rounded-xs font-size-14 py-1 px-2 mr-2 mb-2 mb-md-0">4.6 /5 </button>
                                            <span class="font-weight-bold font-italic text-gray-3">Was too noisy and not suitable for business meetings.”</span>
                                        </div>
                                        <p class="text-lh-1dot6 pr-lg-5 mb-0">Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere ultricies tortor imperdiet vitae. Curabitur lacinia neque non metus</p>
                                    </div>
                                    <div class="review">
                                        <div class="row no-gutters justify-content-between align-items-center border border-color-8 border-width-2 rounded-xs p-3 px-md-3 py-md-2 pr-xl-5">
                                            <div class="col">
                                                <div class="font-weight-normal font-size-14 text-gray-1 mx-lg-1 my-lg-1 mb-3 mb-md-0">Was This Review...?</div>
                                            </div>
                                            <div class="col-md-6 col-lg-7 col-xl-4">
                                                <div class="d-flex justify-content-between my-lg-1">
                                                    <a class="text-indigo-light" href="#">
                                                        <i class="flaticon-like-1 font-size-15 mr-1"></i>
                                                        <span class="font-size-14 font-weight-normal">Like</span>
                                                    </a>
                                                    <a class="text-gray-7" href="#">
                                                        <i class="flaticon-dislike font-size-15 mr-1"></i>
                                                        <span class="font-size-14 font-weight-normal">Dislike</span>
                                                    </a>
                                                    <a class="text-red-light-2" href="#">
                                                        <i class="flaticon-like font-size-15 mr-1"></i>
                                                        <span class="font-size-14 font-weight-normal">Love</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="py-4">
                            <h5 class="font-size-21 font-weight-bold text-dark mb-6">
                                Write a Review
                            </h5>
                            <div class="row">
                                <div class="col-md-4 mb-6">
                                    <h6 class="font-weight-bold text-dark mb-1">
                                        Cleanliness
                                    </h6>
                                    <span class="text-primary font-size-20 letter-spacing-3">
                                        <small class="far fa-smile"></small>
                                        <small class="far fa-smile"></small>
                                        <small class="far fa-smile"></small>
                                        <small class="far fa-smile text-muted"></small>
                                        <small class="far fa-smile text-muted"></small>
                                    </span>
                                </div>
                                <div class="col-md-4 mb-6">
                                    <h6 class="font-weight-bold text-dark mb-1">
                                        Facilities
                                    </h6>
                                    <span class="text-primary font-size-20 letter-spacing-3">
                                        <small class="far fa-smile"></small>
                                        <small class="far fa-smile"></small>
                                        <small class="far fa-smile"></small>
                                        <small class="far fa-smile text-muted"></small>
                                        <small class="far fa-smile text-muted"></small>
                                    </span>
                                </div>
                                <div class="col-md-4 mb-6">
                                    <h6 class="font-weight-bold text-dark mb-1">
                                        Value for money
                                    </h6>
                                    <span class="text-primary font-size-20 letter-spacing-3">
                                        <small class="far fa-smile"></small>
                                        <small class="far fa-smile"></small>
                                        <small class="far fa-smile"></small>
                                        <small class="far fa-smile"></small>
                                        <small class="far fa-smile"></small>
                                    </span>
                                </div>
                                <div class="col-md-4 mb-6">
                                    <h6 class="font-weight-bold text-dark mb-1">
                                        Service
                                    </h6>
                                    <span class="text-primary font-size-20 letter-spacing-3">
                                        <small class="far fa-smile"></small>
                                        <small class="far fa-smile"></small>
                                        <small class="far fa-smile"></small>
                                        <small class="far fa-smile text-muted"></small>
                                        <small class="far fa-smile text-muted"></small>
                                    </span>
                                </div>
                                <div class="col-md-4 mb-6">
                                    <h6 class="font-weight-bold text-dark mb-1">
                                        Location
                                    </h6>
                                    <span class="text-primary font-size-20 letter-spacing-3">
                                        <small class="far fa-smile"></small>
                                        <small class="far fa-smile"></small>
                                        <small class="far fa-smile"></small>
                                        <small class="far fa-smile text-muted"></small>
                                        <small class="far fa-smile text-muted"></small>
                                    </span>
                                </div>
                            </div>
                            <form class="js-validate" novalidate="novalidate">
                                <div class="row mb-5 mb-lg-0">
                                    
                                    <div class="col-sm-6 mb-5">
                                        <div class="js-form-message">
                                            <input type="text" class="form-control" name="name" placeholder="Name" aria-label="Jack Wayley" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                                        </div>
                                    </div>
                                    

                                    
                                    <div class="col-sm-6 mb-5">
                                        <div class="js-form-message">
                                            <input type="email" class="form-control" name="email" placeholder="Email" aria-label="jackwayley@gmail.com" required="" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-12 mb-5">
                                        <div class="js-form-message">
                                            <div class="input-group">
                                                <textarea class="form-control" rows="6" cols="77" name="text" placeholder="Comment" aria-label="Hi there, I would like to ..." required="" data-msg="Please enter a reason." data-error-class="u-has-error" data-success-class="u-has-success"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col d-flex justify-content-center justify-content-lg-start">
                                        <button type="submit" class="btn rounded-xs bg-blue-dark-1 text-white p-2 height-51 width-190 transition-3d-hover">Submit Review</button>
                                    </div>
                                </div>
                            </form>
                        </div> -->
                    </div>
                    
                </div>
                <!-- Product Cards Ratings With carousel -->
                <?php //comoment hotels nearby 
                /*
                <div class="product-card-block product-card-v3">
                    <div class="space-1">
                        <div class="w-md-80 w-lg-50 text-center mx-md-auto pb-4">
                            <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">Hotels Nearby</h2>
                        </div>
                        <div class="js-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3"
                            data-slides-show="4"
                            data-slides-scroll="1"
                            data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic v1 u-slick__arrow-classic--v1 u-slick__arrow-centered--y rounded-circle"
                            data-arrow-left-classes="fad fa-chevron-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left"
                            data-arrow-right-classes="fad fa-chevron-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right"
                            data-pagi-classes="d-lg-none text-center u-slick__pagination mt-4"
                            data-responsive='[{
                                "breakpoint": 1025,
                                "settings": {
                                    "slidesToShow": 3
                                }
                            }, {
                                "breakpoint": 992,
                                "settings": {
                                    "slidesToShow": 2
                                }
                            }, {
                                "breakpoint": 768,
                                "settings": {
                                    "slidesToShow": 1
                                }
                            }, {
                                "breakpoint": 554,
                                "settings": {
                                    "slidesToShow": 1
                                }
                            }]'>
                            <div class="js-slide py-3">
                                <div class="card transition-3d-hover shadow-hover-2 w-100 mt-2">
                                    <div class="position-relative">
                                        <a href="hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                            <img class="card-img-top" src="assets/img/300x230/img9.jpg" alt="Image Description">
                                        </a>
                                        <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                            <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-heart-1 font-size-20"></span>
                                            </button>
                                        </div>
                                        <div class="position-absolute bottom-0 left-0 right-0">
                                            <div class="px-4 pb-3">
                                                <a href="hotel-single-v1.html" class="d-block">
                                                    <div class="d-flex align-items-center font-size-14 text-white">
                                                        <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body px-4 pt-2 pb-3">
                                        <div class="mb-2">
                                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                <div class="green-lighter">
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">Empire Prestige Causeway Bay</a>
                                        <div class="mt-2 mb-3">
                                            <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                            <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                        </div>
                                        <div class="mb-0">
                                            <span class="mr-1 font-size-14 text-gray-1">From</span>
                                            <span class="font-weight-bold">£899.00</span>
                                            <span class="font-size-14 text-gray-1"> / night</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="js-slide py-3">
                                <div class="card transition-3d-hover shadow-hover-2 w-100 mt-2">
                                    <div class="position-relative">
                                        <a href="hotel-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                            <img class="card-img-top" src="assets/img/300x230/img10.jpg" alt="Image Description">
                                        </a>
                                        <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                            <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-heart-1 font-size-20"></span>
                                            </button>
                                        </div>
                                        <div class="position-absolute bottom-0 left-0 right-0">
                                            <div class="px-4 pb-3">
                                                <a href="hotel-single-v2.html" class="d-block">
                                                    <div class="d-flex align-items-center font-size-14 text-white">
                                                        <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Istanbul, Turkey
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body px-4 pt-2 pb-3">
                                        <div class="mb-2">
                                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                <div class="green-lighter">
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="card-title font-size-17 font-weight-medium text-dark">Park Avenue Baker Street London</p>
                                        <div class="mt-2 mb-3">
                                            <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                            <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                        </div>
                                        <div class="mb-0">
                                            <span class="mr-1 font-size-14 text-gray-1">From</span>
                                            <span class="font-weight-bold">£899.00</span>
                                            <span class="font-size-14 text-gray-1"> / night</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="js-slide py-3">
                                <div class="card transition-3d-hover shadow-hover-2 w-100 mt-2">
                                    <div class="position-relative">
                                        <a href="hotel-single-v3.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                            <img class="card-img-top" src="assets/img/300x230/img12.jpg" alt="Image Description">
                                        </a>
                                        <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                            <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-heart-1 font-size-20"></span>
                                            </button>
                                        </div>
                                        <div class="position-absolute bottom-0 left-0 right-0">
                                            <div class="px-4 pb-3">
                                                <a href="hotel-single-v3.html" class="d-block">
                                                    <div class="d-flex align-items-center font-size-14 text-white">
                                                        <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Istanbul, Turkey
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body px-4 pt-2 pb-3">
                                        <div class="mb-2">
                                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                <div class="green-lighter">
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="hotel-single-v3.html" class="card-title font-size-17 font-weight-medium text-dark">New Road Hotel</a>
                                        <div class="mt-2 mb-3">
                                            <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                            <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                        </div>
                                        <div class="mb-0">
                                            <span class="mr-1 font-size-14 text-gray-1">From</span>
                                            <span class="font-weight-bold">£899.00</span>
                                            <span class="font-size-14 text-gray-1"> / night</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="js-slide py-3">
                                <div class="card transition-3d-hover shadow-hover-2 w-100 mt-2">
                                    <div class="position-relative">
                                        <a href="hotel-single-v2.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                            <img class="card-img-top" src="assets/img/300x230/img11.jpg" alt="Image Description">
                                        </a>
                                        <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                            <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-heart-1 font-size-20"></span>
                                            </button>
                                        </div>
                                        <div class="position-absolute bottom-0 left-0 right-0">
                                            <div class="px-4 pb-3">
                                                <a href="hotel-single-v2.html" class="d-block">
                                                    <div class="d-flex align-items-center font-size-14 text-white">
                                                        <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Istanbul, Turkey
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body px-4 pt-2 pb-3">
                                        <div class="mb-2">
                                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                <div class="green-lighter">
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="hotel-single-v2.html" class="card-title font-size-17 font-weight-medium text-dark">New York Marriott Downtown</a>
                                        <div class="mt-2 mb-3">
                                            <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                            <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                        </div>
                                        <div class="mb-0">
                                            <span class="mr-1 font-size-14 text-gray-1">From</span>
                                            <span class="font-weight-bold">£899.00</span>
                                            <span class="font-size-14 text-gray-1"> / night</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="js-slide py-3">
                                <div class="card transition-3d-hover shadow-hover-2 w-100 mt-2">
                                    <div class="position-relative">
                                        <a href="hotel-single-v3.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                            <img class="card-img-top" src="assets/img/300x230/img9.jpg" alt="Image Description">
                                        </a>
                                        <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                            <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-heart-1 font-size-20"></span>
                                            </button>
                                        </div>
                                        <div class="position-absolute bottom-0 left-0 right-0">
                                            <div class="px-4 pb-3">
                                                <a href="hotel-single-v3.html" class="d-block">
                                                    <div class="d-flex align-items-center font-size-14 text-white">
                                                        <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body px-4 pt-2 pb-3">
                                        <div class="mb-2">
                                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                <div class="green-lighter">
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="hotel-single-v3.html" class="card-title font-size-17 font-weight-medium text-dark">Empire Prestige Causeway Bay</a>
                                        <div class="mt-2 mb-3">
                                            <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                            <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                        </div>
                                        <div class="mb-0">
                                            <span class="mr-1 font-size-14 text-gray-1">From</span>
                                            <span class="font-weight-bold">£899.00</span>
                                            <span class="font-size-14 text-gray-1"> / night</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="js-slide py-3">
                                <div class="card transition-3d-hover shadow-hover-2 w-100 mt-2">
                                    <div class="position-relative">
                                        <a href="hotel/single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                            <img class="card-img-top" src="assets/img/300x230/img12.jpg" alt="Image Description">
                                        </a>
                                        <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                            <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-heart-1 font-size-20"></span>
                                            </button>
                                        </div>
                                        <div class="position-absolute bottom-0 left-0 right-0">
                                            <div class="px-4 pb-3">
                                                <a href="hotel/single-v1.html" class="d-block">
                                                    <div class="d-flex align-items-center font-size-14 text-white">
                                                        <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Istanbul, Turkey
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body px-4 pt-2 pb-3">
                                        <div class="mb-2">
                                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                <div class="green-lighter">
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="hotel/single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">New Road Hotel</a>
                                        <div class="mt-2 mb-3">
                                            <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                            <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                        </div>
                                        <div class="mb-0">
                                            <span class="mr-1 font-size-14 text-gray-1">From</span>
                                            <span class="font-weight-bold">£899.00</span>
                                            <span class="font-size-14 text-gray-1"> / night</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="js-slide py-3">
                                <div class="card transition-3d-hover shadow-hover-2 w-100 mt-2">
                                    <div class="position-relative">
                                        <a href="hotel-single-v3.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                            <img class="card-img-top" src="assets/img/300x230/img9.jpg" alt="Image Description">
                                        </a>
                                        <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                            <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-heart-1 font-size-20"></span>
                                            </button>
                                        </div>
                                        <div class="position-absolute bottom-0 left-0 right-0">
                                            <div class="px-4 pb-3">
                                                <a href="hotel-single-v3.html" class="d-block">
                                                    <div class="d-flex align-items-center font-size-14 text-white">
                                                        <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body px-4 pt-2 pb-3">
                                        <div class="mb-2">
                                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                <div class="green-lighter">
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="hotel-single-v3.html" class="card-title font-size-17 font-weight-medium text-dark">Empire Prestige Causeway Bay</a>
                                        <div class="mt-2 mb-3">
                                            <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                            <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                        </div>
                                        <div class="mb-0">
                                            <span class="mr-1 font-size-14 text-gray-1">From</span>
                                            <span class="font-weight-bold">£899.00</span>
                                            <span class="font-size-14 text-gray-1"> / night</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="js-slide py-3">
                                <div class="card transition-3d-hover shadow-hover-2 w-100 mt-2">
                                    <div class="position-relative">
                                        <a href="hotel-single-v1.html" class="d-block gradient-overlay-half-bg-gradient-v5">
                                            <img class="card-img-top" src="assets/img/300x230/img11.jpg" alt="Image Description">
                                        </a>
                                        <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                            <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                                                <span class="flaticon-heart-1 font-size-20"></span>
                                            </button>
                                        </div>
                                        <div class="position-absolute bottom-0 left-0 right-0">
                                            <div class="px-4 pb-3">
                                                <a href="hotel-single-v1.html" class="d-block">
                                                    <div class="d-flex align-items-center font-size-14 text-white">
                                                        <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Istanbul, Turkey
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body px-4 pt-2 pb-3">
                                        <div class="mb-2">
                                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                                <div class="green-lighter">
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                    <small class="glyph-icon-star flaticon-star-3"></small>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="hotel-single-v1.html" class="card-title font-size-17 font-weight-medium text-dark">New York Marriott Downtown</a>
                                        <div class="mt-2 mb-3">
                                            <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                            <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                                        </div>
                                        <div class="mb-0">
                                            <span class="mr-1 font-size-14 text-gray-1">From</span>
                                            <span class="font-weight-bold">£899.00</span>
                                            <span class="font-size-14 text-gray-1"> / night</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Product Cards Ratings With carousel -->
                */ ?>
            </div>
        </main>
        <!-- ========== END MAIN CONTENT ========== -->


        <!-- ========== FOOTER ========== -->
       <?php include('sections/footer.php'); ?>
        <!-- ========== End FOOTER ========== -->

        <!-- Page Preloader -->
        <!-- <div id="jsPreloader" class="page-preloader">
            <div class="page-preloader__content-centered">
                <div class="spinner-grow text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div> -->
        <!-- End Page Preloader -->

        <!-- Go to Top -->
        <a class="js-go-to u-go-to-modern" href="#" data-position='{"bottom": 15, "right": 15 }' data-type="fixed" data-offset-top="400" data-compensation="#header" data-show-effect="slideInUp" data-hide-effect="slideOutDown">
            <span class="flaticon-arrow u-go-to-modern__inner"></span>
        </a>
        <!-- End Go to Top -->


        <!-- All scripts which is responsible for calculations -->
        <script src="assets\js\hotel_booking_js.js"></script>


        <!-- JS Global Compulsory -->
        <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
        <script src="assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
        <script src="assets/vendor/popper.js/dist/umd/popper.min.js"></script>
        <script src="assets/vendor/bootstrap/bootstrap.min.js"></script>

        <!-- JS Implementing Plugins -->
        <script src="assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
        <script src="assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="assets/vendor/slick-carousel/slick/slick.js"></script>
        <script src="assets/vendor/gmaps/gmaps.min.js"></script>
        <script src="assets/vendor/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
        <script src="assets/vendor/custombox/dist/custombox.min.js"></script>
        <script src="assets/vendor/custombox/dist/custombox.legacy.min.js"></script>
        <script src="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

        <!-- JS MyTravel -->
        <script src="assets/js/hs.core.js"></script>
        <script src="assets/js/components/hs.header.js"></script>
        <script src="assets/js/components/hs.unfold.js"></script>
        <script src="assets/js/components/hs.validation.js"></script>
        <script src="assets/js/components/hs.show-animation.js"></script>
        <script src="assets/js/components/hs.selectpicker.js"></script>
        <script src="assets/js/components/hs.range-slider.js"></script>
        <script src="assets/js/components/hs.go-to.js"></script>
        <script src="assets/js/components/hs.slick-carousel.js"></script>
        <script src="assets/js/components/hs.quantity-counter.js"></script>
        <script src="assets/js/components/hs.g-map.js"></script>
        <script src="assets/js/components/hs.modal-window.js"></script>
        <script src="assets/js/components/hs.malihu-scrollbar.js"></script>


        <!-- JS Plugins Init. -->
        <script>
            $(window).on('load', function () {
                // initialization of HSMegaMenu component
                $('.js-mega-menu').HSMegaMenu({
                    event: 'hover',
                    pageContainer: $('.container'),
                    breakpoint: 1199.98,
                    hideTimeOut: 0
                });

                // Page preloader
                setTimeout(function() {
                  $('#jsPreloader').fadeOut(500)
                }, 800);
            });

            $(document).on('ready', function () {
                // initialization of header
                $.HSCore.components.HSHeader.init($('#header'));

                // initialization of google map
                function initMap() {
                    $.HSCore.components.HSGMap.init('.js-g-map');
                }

                // initialization of autonomous popups
                $.HSCore.components.HSModalWindow.init('[data-modal-target]', '.js-modal-window', {
                    autonomous: true
                });

                // initialization of unfold component
                $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

                // initialization of show animations
                $.HSCore.components.HSShowAnimation.init('.js-animation-link');

                
                // initialization of forms
                $.HSCore.components.HSRangeSlider.init('.js-range-slider');

                // initialization of malihu scrollbar
                $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

                // initialization of select
                $.HSCore.components.HSSelectPicker.init('.js-select');

                // initialization of quantity counter
                $.HSCore.components.HSQantityCounter.init('.js-quantity');

                // initialization of slick carousel
                $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

                // initialization of go to
                $.HSCore.components.HSGoTo.init('.js-go-to');
            });
        </script>

        <!-- Get array from the php -->
        <script type="text/javascript">
            $(document).ready( function() {
                $('#buttonShow').click(function() {
                    var value = this.getAttribute('room_id');
                    alert(value);
                    // var roomID = this.getAttribute( "room" );
                    // alert(roomID);

                //     $.ajax({
                //         type: 'GET',
                //         url: 'get_rooms_photos.php',
                //         data: 'room_id='+ buttonShow,
                //         dataType: 'json',
                //         cache: false,
                //         success: function(result) {
                //             $('#content1').html(result[0]);
                //         },
                //     });
                 });
            });
        </script>

            </body>


</html>

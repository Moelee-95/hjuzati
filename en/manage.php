<?php include 'sections/main.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <!-- Title -->
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head>
        <title>Hjuzati | Manage Booking</title>
        <style type="text/css">
            /* Addition CSS */
            /* For making space between the arrow and language selection 8 */
            i.glyph-icon-usd.flaticon-down-arrow {
                padding: 10px;
            }
        </style>
        <?php include('sections/head.html'); ?>
    </head>
    <body>
       <!-- ========== HEADER ========== -->
        <?php include('sections/header.php'); ?>
        <?php 
            if(isset($_GET['manageBookingID']) && !empty($_GET['manageBookingID'])){
                $msg ='';
                $msgClass='';//used to show error or sucess messages
                foreach($bookings as $booking){ //getting the booking that should be managed
                    if ($booking->bookingID == $_GET['manageBookingID']) {
                        $manageBooking = $booking;
                    }
                }
                /* if (isset($_POST['newBookingPassword'])) {
                    if ($manageBooking->setBookingPassword($_POST['newBookingPassword'])) {
                        $msg = "password have been satup successfully!";
                        $msgClass = "alert alert-success";
                        $currentPassword = $_POST['newBookingPassword'];
                        // <<<<  Adding the booking back to the cookies bookings   >>>> //
                        $bookings = json_decode(unserialize($_COOKIE['bookings'])); // getting cookies bookings
                        $bookings[] = $manageBooking;
                        $serialized = serialize(json_encode($bookings)); // incode then serialize
                        setcookie('bookings',$serialized, time()+60*60*30, "/"); // 30 days
                        // <<<<  Adding the booking back to the cookies bookings   >>>> //

                    }   
                    else{
                        $msg = "Coudn't setup booking password";
                        $msgClass = "alert alert-danger";
                    }

                } */
                if (isset($_GET['createBookingPassword'])){
                    if ($_GET['createBookingPassword'] == "true"){ ?>
                        <script>var showPassword = true; </script>
                  <?php  }
                    else{ ?>
                        <script>var showPassword = false; </script>
                   <?php }
                }
                else{
                    ?><script>var showPassword = false; </script><?php 
                }
            } else {
                echo "<center class='alert alert-danger p-5'>
                <span class='h2 text-danger'>You have selected Wrong booking<span></br>
                <a href='index.php' class='h5 btn btn-primary p-2' >+ Add new Booking</a>
                </center>";
                $content = "none";
            }
        ?>
        <!-- ========== END HEADER ========== -->
        <!-- ========== MAIN CONTENT ========== -->
       <!-- ========== END HEADER ========== -->
       <div id="content" class="d-<?php echo $content; ?>">
             <!-- Modal Create Booking Password -->

        <!-- End Modal Create Booking Password  -->
            <div class="d-flex justify-content-center py-3 px-3 border-bottom shadow-soft ">
                <h2 clsass="">Manage Booking</h2> 
            </div>
            <div class="row">
                <!-- ========== GUEST INFORMATION ========== -->
                <div class="col col-sm-12 col-md-4  p-1 shadow-soft bg-white rounded-sm -none order-3" style="" id="guestInfo">
                    <div class="pt-4 pb-5 px-5 border-bottom">
                        <div class="row justify-content-between pb-2 mb-2 border-bottom">
                            <div class="col ">
                                <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-2">
                                Traveler Information
                                </h5>
                            </div>
                            <div class="">
                                <span class="h4"><button class="btn btn-primary py-2" id="editBookingDetails" onclick="$('#travelerInfoModal').modal('show')"><i class="fas fa-pencil-alt"></i></button></span>
                            </div>
                        </div>  
                        <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Full Name</span>
                                <span class="text-secondary text-right" id="alertFullName"><?php echo $manageBooking->fullName; ?></span>
                            </li>
                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Phone Number</span>
                                <span class="text-secondary text-right" id="alertPhoneNumber"><?php echo $manageBooking->phoneNumber; ?></span>
                            </li>

                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">E-mail address</span>
                                <span class="text-secondary text-right" id="alertEmailAddress"><?php echo $manageBooking->email; ?></span>
                            </li>

                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Town / City</span>
                                <span class="text-secondary text-right" id="alertCity"><?php echo $manageBooking->address; ?></span>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- ========== END GUEST INFORMATION ========== -->
                <!-- ========== BOOKING INFORMATION ========== -->
                <div class="col col-sm-12 col-md-4  p-1 shadow-soft bg-white rounded-sm -none order-2" style="" id="bookingInfo">
                    <div class="pt-4 pb-5 px-5 border-bottom">
                        <div class="row justify-content-between pb-2 mb-2 border-bottom">
                            <div class="">
                                <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-2">
                                    Booking Details
                                </h5>
                            </div>
                            <div class="">
                                <span class="h4"><button class="btn btn-primary py-2" id="editBookingDetails" onclick="$('#bookingInfoModal').modal('show')"><i class="fas fa-pencil-alt"></i></button></span>
                            </div>
                        </div>  
                        <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Booking number</span>
                                <span class="text-secondary text-right" id="alertBookingID" ><?php echo $manageBooking->bookingID; ?></span>
                            </li>
                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Booking Code</span>
                                <span class=" row text-secondary align-content-right" id="">
                                    <?php if (isset($manageBooking) && !empty($manageBooking->bPassword)) { echo $manageBooking->bPassword; } else{ echo "";}; ?>
                                    <a class=" btn-outline-primary px-1 mx-1" id="EditBookingPassword"
                                     onclick="$('#createPassModal').modal('show')"
                                      href="#"> 
                                        <i class="fas fa-pencil-alt"></i>
                                      </a>
                                </span>
                            </li>
                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Check In</span>
                                <span class="text-secondary text-right" id="alertBookingID" ><?php echo $manageBooking->checkIn; ?>
                                </span>
                            </li>

                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Check Out</span>
                                <span class="text-secondary text-right" id="alertFullName"><?php echo $manageBooking->checkOut; ?>
                                </span>
                            </li>
                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Number of Nights</span>
                                <span class="text-secondary text-right" id="alertPhoneNumber"><?php echo $manageBooking->nights; ?></span>
                            </li>

                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Number of Passengers</span>
                                <span class="text-secondary text-right" id="alertEmailAddress"><?php echo $manageBooking->adultNumber; ?>
                                </span>
                            </li>

                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Children Number</span>
                                <span class="text-secondary text-right" id="alertCity"><?php echo $manageBooking->childNumber; ?>
                                </span>
                            </li>
                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Number of rooms</span>
                                <span class="text-secondary text-right" id="alertCity"><?php
                                    echo $manageBooking->numberOfRooms;?>
                                </span>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- ========== END BOOKING INFORMATION ========== -->
                <!-- ========== BOOKING PAYMENT ========== -->
                <div class="col col-sm-12 col-md-4  p-1 shadow-soft bg-white rounded-sm order-1" style="">
                    <div class="pt-4 pb-5 px-5 border-bottom">
                        <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-3">
                            Payment
                        </h5>
                        <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                            <li class="d-flex justify-content-between py-1">
                                <span class="font-weight-medium">Paid</span>
                                <span class="text-success text-right" id="alertPaid"><?php echo $manageBooking->paidAmount; ?></span>
                            </li>
                            <li class="d-flex justify-content-between py-1">
                                <span class="font-weight-medium">Remaining</span>
                                <span class="text-warning text-right " id="alertRemaining"><?php echo $manageBooking->remainingAmount; ?></span>
                            </li>
                            <li class="d-flex justify-content-between py-1">
                                <span class="font-weight-medium">Total</span>
                                <span class="text-primary text-right" id="alertTotal"><?php echo $manageBooking->totalAmount; ?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="pt-4 pb-5 px-5 border-bottom ">
                        <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-3">
                            Hotel Information
                        </h5>
                        <ul class="list-unstyled font-size-1 mb-0 font-size-16 border p-3">
                            <div class="row justify-content-center"><a href="#"><?php echo $manageBooking->hotelName; ?></a></div>
                            <li class="d-flex justify-content-between py-1" >
                                <span class="font-weight-medium">Address</span>
                                <span class="text-success text-right" id="alertPaid"><?php echo $manageBooking->hotel->address; ?></span>
                            </li>
                            <li class="d-flex justify-content-between py-1">
                                <span class="font-weight-medium">Location on map</span>
                                <span class="text-warning text-right " id="alertRemaining"><a href="<?php echo $manageBooking->hotel->mapLocation; ?>"><i class="fas fa-map-marked"></i></a></span>
                            </li>
                            <li class="d-flex justify-content-between py-1">
                                <span class="font-weight-medium">Phone Number</span>
                                <span class="text-primary text-right" id="alertTotal"><?php echo $manageBooking->hotel->phoneNumber; ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                </div>
                 <!-- ========== END BOOKING PAYMENT ========== -->
            </div>

             <!-- Creating booking password -->
             <div class="modal fade" id="createPassModal" tabindex="-1" role="dialog" aria-labelledby="createBookingPasswordLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createBookingPasswordLabel">Create Password For Your Booking</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body">
                        <form class="" style="display:block" id="createPasswordForm" method="post" action="manage.php?manageBookingID=<?php echo $manageBooking->bookingID; ?>">
                            <div class="row justify-content-center p-2">
                                <input name="newBookingPassword" type="text" class="col-4 form-control mb-2 inptFielsd" id="newBookingPassword" placeholder="<?php if (isset($manageBooking) && !empty($manageBooking->bPassword)) { echo $manageBooking->bPassword; } else{ echo "XXXXXXXX";}; ?>" required data-msg="Please Enter valid password."
                                data-error-class="u-has-error" vlaue=""
                                data-success-class="u-has-success"  />
                            </div>
                            <div class="row justify-content-center p-2">
                                <button id="confirmPassword" onclick="confirmClick()" type="button" class="btn btn-primary w-25" > Confirm </button>
                                <span id="counter2" class="text-primary"> </span>
                            </div>   
                            <div class="row justify-content-center p-2">
                                <span class="text-danger" id="passwordVerifyAlert"></span>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Creating booking password -->

            <!-- Edit traveler information Modal -->
            <div class="modal fade" id="travelerInfoModal" tabindex="-1" role="dialog" aria-labelledby="travelerInfoLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="travelerInfoLabel">Edit Traveler information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="">Save changes</button>
                    </div>
                    </div>
                </div>
            </div>
            <!-- End Edit traveler information Modal -->

            <!-- Edit booking information Modal -->
            <div class="modal fade" id="bookingInfoModal" tabindex="-1" role="dialog" aria-labelledby="bookingInfoLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bookingInfoLabel">Edit Booking information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ..
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="">Save changes</button>
                    </div>
                    </div>
                </div>
            </div>
            <!-- End Edit booking information Modal -->


            <!-- End phone Number verification modal -->
        </div>

        <?php include 'sections/footer.php'; ?>


        <script>
            if (showPassword == true) {
                $("#createPassModal").modal('show');
            }
            function confirmClick(){
                var password = $("#newBookingPassword").val();
                if (password != "" && password.length >= 5){
                    $("#createPasswordForm").submit();
                }
                else{
                    $("#passwordVerifyAlert").text("Password must be more than 5 characters");
                }
            }
        </script>
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

        <!-- JS Hjuzati -->
        <script src="assets/js/hs.core.js"></script>
        <script src="assets/js/components/hs.header.js"></script>
        <script src="assets/js/components/hs.unfold.js"></script>
        <script src="assets/js/components/hs.validation.js"></script>
        <script src="assets/js/components/hs.show-animation.js"></script>
        <script src="assets/js/components/hs.range-datepicker.js"></script>
        <script src="assets/js/components/hs.selectpicker.js"></script>
        <script src="assets/js/components/hs.go-to.js"></script>
        <script src="assets/js/components/hs.slick-carousel.js"></script>
        <script src="assets/js/components/hs.quantity-counter.js"></script>

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

                // initialization of unfold component
                $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

                // initialization of show animations
                $.HSCore.components.HSShowAnimation.init('.js-animation-link');

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
    </body>
</html>

  


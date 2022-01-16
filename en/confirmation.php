<!-- ==========  PHP  ===========-->
<?php  include('../db_connect.php');?>
<?php require 'sections/main.php';?>

<!DOCTYPE html>
<html lang="en">
    
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Title -->
    <title>HIMA Hotels | </title>
        <?php include('sections/head.html'); ?>

    </head>
    <body>
       <!-- ========== HEADER ========== -->
        <?php include('sections/header.php'); ?>
        <?php 
            if(isset($_SESSION['bookingConf'])){
                $msg ='';
                $msgClass='';//used to show error or sucess messages
                $bookingConf = unserialize($_SESSION['bookingConf']);
                if (isset($_POST['newBookingPassword'])) {
                    if ($bookingConf->setBookingPassword($_POST['newBookingPassword'])) {
                        $msg = "password have been satup successfully!";
                        $msgClass = "alert alert-success";
                        $currentPassword = $_POST['newBookingPassword'];
                        $_SESSION['bookingConf'] = serialize($bookingConf);
                    }
                    else{
                        $msg = "Coudn't setup booking password";
                        $msgClass = "alert alert-danger";
                    }

                }
                if (isset($_GET['createBookingPassword'])){
                    if ($_GET['createBookingPassword'] == "true"){ ?>
                        <script>var showPassword = true; </script>
                  <?php  }
                    else{ ?>
                        <script>var showPassword = false; </script>
                   <?php }
                }
                else{
                    ?>
                        <script>var showPassword = false; </script>
                   <?php 
                }

                
            } else {
                echo "<span class='h1'>There is no booking created</span>";
                exit();
            }
        ?>
       

        <!-- ========== END HEADER ========== -->
        <div id="content">
             <!-- Modal Create Booking Password -->

        <!-- End Modal Create Booking Password  -->
            <div class="row">
                <!-- ========== GUEST INFORMATION ========== -->
                <div class="col col-lg-6 col-sm-12 p-4 shadow-soft bg-white rounded-sm -none " style="" id="guestInfo">
                    <div class="py-6 px-5 border-bottom">
                        <div class="flex-horizontal-center">
                            
                            <div class="ml-3">
                                <h3 class="font-size-18 font-weight-bold text-dark mb-0 text-lh-sm">
                                    Thank You. Your Booking Order is submitted Now.
                                </h3>
                                <p class="mb-0">A confirmation email has been sent to your provided email address.</p>
                                <span id="bookingPasswordAlert" class= "row <?php echo $msgClass ?>"><?php echo $msg ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5 border-bottom">
                        <div class="row">
                            <div class="col col-8">
                                <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-2">
                                Traveler Information
                                </h5>
                            </div>
                            <?Php if (isset($_SESSION['guest'])) { ?>
                                
                            <div class="col col-4">
                                <a id="viewBooking" href="http://localhost/main/gcp/cp/view_booking.php"> View booking in dashboard</a>
                            </div>
                            <?php } ?>
                        </div>  
                        
                        <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Full Name</span>
                                <span class="text-secondary text-right" id="alertFullName"><?php echo $bookingConf->fullName; ?></span>
                            </li>
                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Phone Number</span>
                                <span class="text-secondary text-right" id="alertPhoneNumber"><?php echo $bookingConf->phoneNumber; ?></span>
                            </li>

                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">E-mail address</span>
                                <span class="text-secondary text-right" id="alertEmailAddress"><?php echo $bookingConf->email; ?></span>
                            </li>

                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Town / City</span>
                                <span class="text-secondary text-right" id="alertCity"><?php echo $bookingConf->address; ?></span>
                            </li>

                        </ul>
                        
                    </div>
                </div>
                <!-- ========== END GUEST INFORMATION ========== -->
                <!-- ========== BOOKING INFORMATION ========== -->
                <div class="col col-lg-6 col-sm-12 p-4 shadow-soft bg-white rounded-sm -none " style="" id="bookingInfo">
                    <div class="pt-4 pb-5 px-5 border-bottom">
                        <div class="row">
                            <div class="col col-8">
                                <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-2">
                                    Booking Details
                                </h5>
                            </div>
                        </div>  
                        
                        <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Booking number</span>
                                <span class="text-secondary text-right" id="alertBookingID" ><?php echo $bookingConf->bookingID; ?></span>
                            </li>
                            <li class="d-flex justify-content-between py-2 pt-4">
                                <span class="font-weight-medium">Booking Code</span>
                                <span class=" row text-secondary align-content-right" id="">
                                    <?php if (isset($bookingConf) && !empty($bookingConf->bPassword)) { echo $bookingConf->bPassword; } else{ echo "";}; ?>
                                    <a class=" btn-outline-primary px-1 mx-1" id="EditBookingPassword"
                                     onclick="$('#createPassModal').modal('show')"
                                      href="#"> 
                                      <i class="fas fa-pencil-alt"></i>
                                      </a>
                                </span>
                            </li>
                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Check In</span>
                                <span class="text-secondary text-right" id="alertBookingID" ><?php echo $bookingConf->checkIn; ?></span>
                            </li>

                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Check Out</span>
                                <span class="text-secondary text-right" id="alertFullName"><?php echo $bookingConf->checkOut; ?></span>
                            </li>
                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Number of Nights</span>
                                <span class="text-secondary text-right" id="alertPhoneNumber"><?php echo $bookingConf->nights; ?></span>
                            </li>

                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Number of Passengers</span>
                                <span class="text-secondary text-right" id="alertEmailAddress"><?php echo $bookingConf->adultNumber; ?></span>
                            </li>

                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Children Number</span>
                                <span class="text-secondary text-right" id="alertCity"><?php echo $bookingConf->childNumber; ?></span>
                            </li>
                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Number of rooms</span>
                                <span class="text-secondary text-right" id="alertCity"><?php
                                    echo $bookingConf->numberOfRooms;
                                ?></span>
                            </li>
                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Total Amount</span>
                                <span class="text-primary text-right" id=""><?php echo $bookingConf->totalAmount; ?> $
                                </span>
                            </li>

                        </ul>
                        
                    </div>
                    <div class="pt-4 pb-5 px-5 border-bottom">
                        <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-3">
                            Payment
                        </h5>
                        <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                        <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Payment Status</span>
                                <span class="text-right alert alert-warning" id="">
                                    <?php $bookingConf->paymentStatus; ?>
                                </span>
                            </li>
                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium">Payment Method</span>
                                <span class="text-right" id=""><?php echo $bookingConf->paymentMethod; ?> 
                                </span>
                            </li>
                        </ul>

                    </div>
                </div>
                <!-- ========== END BOOKING INFORMATION ========== -->
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
                        <form class="" style="display:block" id="createPasswordForm" method="post" action="confirmation.php">
                            <div class="row justify-content-center p-2">
                                <input name="newBookingPassword" type="text" class="col-4 form-control mb-2 inptFielsd" id="newBookingPassword" placeholder="<?php if (isset($bookingConf) && !empty($bookingConf->bPassword)) { echo $bookingConf->bPassword; } else{ echo "XXXXXXXX";}; ?>" required data-msg="Please Enter valid password."
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
            <!-- End phone Number verification modal -->
        </div>

        <?php include('sections/footer.php'); ?>

        
        <!-- JS Global Compulsory -->
        <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
        <script src="assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
        <script src="assets/vendor/popper.js/dist/umd/popper.min.js"></script>
        <script src="assets/vendor/bootstrap/bootstrap.min.js"></script>

        <!-- JS Implementing Plugins -->
        <script src="assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
        <script src="assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="assets/vendor/flatpickr/dist/flatpickr.min.js"></script>
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
        <script src="assets/js/components/hs.range-datepicker.js"></script>
        <script src="assets/js/components/hs.selectpicker.js"></script>
        <script src="assets/js/components/hs.range-slider.js"></script>
        <script src="assets/js/components/hs.go-to.js"></script>
        <script src="assets/js/components/hs.slick-carousel.js"></script>
        <script src="assets/js/components/hs.quantity-counter.js"></script>
        <script src="assets/js/components/hs.g-map.js"></script>
        <script src="assets/js/components/hs.modal-window.js"></script>
        <script src="assets/js/components/hs.malihu-scrollbar.js"></script>



        <!-- Create Booking password Script -->
        <script>
        // if there is no guest logged prompt create booking password modal
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



    </body>


</html>

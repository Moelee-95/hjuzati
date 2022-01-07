<?php

session_start();
$display_msg = "none";
// require ('cp/classes/guest.php');
// include('../cp/db/db_connect.php');

if (!empty($_SESSION['login_guest'])) {
     header("location:cp/index.php");
}



?>


<!doctype html>
<html class="no-js" lang="">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hjuzati Hotels | Forrgot Password</title>
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
    
     <!-- Phone Number input requires -->
     <link rel="stylesheet" href="../assets/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
    <script src="../assets/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <!-- MD5 encryption -->
    <script src="../assets/libs/crypto-js/4.0.0/core.min.js"></script>
    <script src="../assets/libs/crypto-js/3.1.9-1/md5.js"></script>
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
                <div class="" style="display:block" id="verifyDiv">
                    <div class="row justify-content-center p-2">
                        <span>Enter the code we have sent to: </span>
                        <div class="w-100"></div>    
                        <span class="h4 p-1 text-primary" id="VerifyConfNumber"> </span> 
                    </div>
                    <div class="row justify-content-center p-2">
                        <input class="col-3 p-4 form-control" id="phoneVerifyCode" value="" placeholder="XXXX">
                        <div class="col-1 p-3">
                            <button type="button" class="row h1 btn p-1" id="reSendCode" onclick="sendSms()"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
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
                        <span class="text-danger" id="alwaysAlert"></span>
                    </div>
                </div>

                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div> -->
                </div>
        </div>
    </div>
    <!-- End phone Number verification modal -->

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
                                <h1>Welcome To Hjuzati Hotels forgot password</h1>
                            </div>
                            <div class="fxt-transformY-50 fxt-transition-delay-3">
                                <p>Reset your password and access it.</p>
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
                            <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="text-secondary"> 
                                <i class="fas fa-arrow-left"></i>
                                &nbsp;
                                <span class="font-weight-normal"> Back to Previous Page</span>
                                </a>
                        </div>
                        <div class="fxt-form border p-4" id="div1">
                            <div class="form-group">  
                                <label for="identifier" class="input-label">Enter Username, Phone Number, or Email Address</label>                                              
                                <input type="text" id="identifier" class="form-control" name="identifier" placeholder="" required="required">
                            </div>
                            <div class="form-group">
                                <span id="identifierAlert"></span>
                            </div>
                            <div class="form-group">
                                <button id="findAccount" onclick="getAccount()" type="button" class="fxt-btn-fill">Find My Account</button>
                            </div>
                        </div> 
                        <div class="fxt-form border p-4" id="div2" style="display:none">
                            <form method="POST" action="">
                                <div class="form-group"> 
                                    We Found your account:
                                </div>
                                <div class="form-group">  
                                    <label class="input-label d-flex justify-content-center h5 p-3" ><b id="fullName"> Mohammed Salahadin Hazim</label>                                              
                                </div>
                                <div class="form-group d-flex justify-content-center">  
                                    <button type="button" name="sms" id="sms" class="btn btn-outline-secondary col-10" onclick="sendSms();">
                                        <span> Send SMS message to: </span>
                                        </br>
                                        <b id="destNumber">+96477012312231</b>
                                        <input type="hidden" id="phoneNumberInput" name="phoneNumberInput" value=""/>
                                    </button>
                                </div>
                                <div class="form-group d-flex justify-content-center">  
                                    <button type="button" name="email" id="email" class="btn btn-outline-secondary col-12">
                                        <span> Send Email to </span>
                                        </br>
                                        <b id="destEmail">HjuzatiExample@Hjuzati.com</b>
                                        <input type="hidden" id="emailInput" name="emailInput" value=""/>
                                    </button>
                                </div>
                                <hr>
                                <div class="form-group d-flex justify-content-center">  
                                    <a href="#" id="notMe" onclick="showDiv('div1')" class="p-2">Not Your account?</a >
                                </div>
                            </form>                            
                        </div> 
                        <div class="fxt-form border p-4" id="div3" style="display:none">
                            <div class="form-group">  
                                <label for="newPassword" class="input-label">New password</label>                                               
                                <input id="newPassword" type="text" class="form-control" name="newPassword" placeholder="********" required="required">
                            </div>
                            <div class="form-group">  
                                <label for="confNewPassword" class="input-label">Confirm New password</label>                                               
                                <input id="confNewPassword" type="text" class="form-control" name="confNewPassword" placeholder="********" required="required">
                            </div>
                            <div class="form-group">
                                <span class="" id="newPasswordAlert" ></span>
                            </div>
                            <div class="form-group">
                                <button name="submit" onClick="newPassword()" type="submit" class="fxt-btn-fill">Reset Password</button>
                            </div>
                        </div> 
                        <div class="fxt-form border p-4" id="div4" style="display:none">
                            <form method="POST" action="">
                                <div class="form-group">  
                                    <center class="input-label d-flex justify-content-center h5 p-3 text-success" id="confirmation">
                                        Your password have been changed Sucessfully!
                                    </center>                                              
                                </div>
                                <div class="form-group d-flex justify-content-center">  
                                    <a href="index.php?userName=" id="" class="btn btn-success text-white col-12">
                                        Login Now
                                    </a>
                                </div>
                            </form>                            
                        </div> 
                        
                        <div class="fxt-footer p-4 border">
                            <p>Don't have an account?<a href="register.php" class="switcher-text" onclick="">Register</a></p>
                            <p>have an account?<a href="index.php" class="switcher-text" onclick="">Sign in</a></p>
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

    <!-- REQUIRED CDN  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    integrity="sha512-BNZ1x39RMH+UYylOW419beaGO0wqdSkO7pi1rYDYco9OL3uvXaC/GTqA5O4CVK2j4K9ZkoDNSSHVkEQKkgwdiw=="
    crossorigin="anonymous">
    </script>
    <!-- Modal Configiration -->



    <script>
        var code;//to store the verification code to compare it later (MD5 verification), setted in sendSms() 
        var destNumber = "+9647701231231"; // to store the desitination phone number after verification to use it around
        var email;
        var fullName;
        var guestID;
        var verifyState;

        function showDiv($div){
            $('#div1').css('display','none');
            $('#div2').css('display','none');
            $('#div3').css('display','none');
            $('#div4').css('display','none');
            $('#'+$div).css('display','block');

        }

        function veifyCode(){
            var userCode = $("#phoneVerifyCode").val();
            var encUserCode = CryptoJS.MD5(userCode).toString(); // encrypt user code to compare with encrypted code
            
            // console.log(encUserCode);
            if (encUserCode == code){
                verifyState = true; //
                // console.log("confirmed");//test
                // importing the desination number into phone_input hidden element
                $('#phoneVerificationModal').modal('hide');
                showDiv("div3");
            }
            else { $("#codeVerifyAlert").text("Wrong Entry, Please Try again!"); }
        }

        //this function sends an sms to the phone number and store it in code variable
        function sendSms(){
            $.post( 
                "../send_sms/send.php",
                {fNumber:destNumber} ,
                function( data ) {
                    code = 0;//reset the code
                    destNumber=0; // to hold incomming number
                    var dataArray = jQuery.parseJSON( data ); //convert to redable data
                    //to prevent multiple messages
                    if(dataArray.error == "0"){
                        if(dataArray.genCode != "0"){
                            code = dataArray.genCode;
                            destNumber = dataArray.destNumber;
                            console.log(dataArray.deCode);
                            $("#phoneVerificationModal").modal("show");
                            disableButtons();
                            $("#VerifyConfNumber").text(destNumber);
                        }
                        else{
                            $("#phoneVerifyAlert").text("Something is wrong, coudn't generate the code");
                        }
                    }
                    else{
                        $("#alwaysAlert").text(dataArray.errorMessage);
                    }
                } // send phone number function
            );
        }

        //disable the buttons and replace them with timer for 60 sec
        function disableButtons(){
            fewSeconds = 60;
            var reSendBtn = $('#reSendCode');
            var counter = $('#counter');
            var alwaysAlert =  $('#alwaysAlert');

            //setting timer for the send message
            var timeleft = 60;
            var downloadTimer = setInterval(function(){
            if(timeleft <= 0){
                clearInterval(downloadTimer);
                alwaysAlert.hide();
                counter.hide();
                reSendBtn.show();

            } else {
                alwaysAlert.hide();
                counter.show();
                counter.text(timeleft);
                reSendBtn.hide();
                
            }
            timeleft -= 1;
            }, 1000);
            reSendBtn.prop('disabled', true);
            alwaysAlert.hide();
            setTimeout(function(){
                counter.hide();
                reSendBtn.prop('disabled', false);
            }, fewSeconds*1000);
            
        }

        function getAccount(){
            var identifier = $("#identifier").val();
            if (identifier != "") {
                $.post( 
                    "forgotPasswordPost.php",
                    {identifier:identifier},
                    function( data ) {
                        var dataArray = jQuery.parseJSON( data ); //convert to redable data
                        // console.log( "Phone num: " + dataArray.gPhoneNumber );
                        //to prevent multiple messages
                        if(dataArray.error == 0){
                            destNumber = dataArray.gPhoneNumber;
                            fullName = dataArray.gFullName;
                            email = dataArray.gEmail;
                            guestID = dataArray.gGuestID;
                            $("#phoneNumberInput").val(destNumber);
                            $("#destNumber").text(destNumber);
                            $("#fullName").text(fullName);
                            $("#destEmail").text(email);
                            $("#emailInput").val(destNumber);
                            showDiv("div2");
                        }
                        else{
                            $("#identifierAlert").html("Coudn't find your account");
                            $("#identifierAlert").addClass("alert alert-danger row p-2");
                        }
                    } // send phone number function
                );
            }else{
                $("#identifierAlert").html("fill the input first");
                $("#identifierAlert").addClass("alert alert-danger row p-2");
            }
           

        }

        function newPassword(){
            var newPassword = $("#newPassword").val();
            var confNewPassword = $("#confNewPassword").val();
            if (newPassword == confNewPassword) {
                $.post( 
                    "forgotPasswordPost.php",
                    {newPassword:newPassword,
                    guestID:guestID
                    },
                    function( data ) {
                        console.log(data);
                        var dataArray = jQuery.parseJSON( data ); //convert to redable data
                        // console.log( "Phone num: " + dataArray.gPhoneNumber );
                        //to prevent multiple messages
                        if(dataArray.error == 0){
                            showDiv("div4");
                        }
                        else{
                            alert(dataArray.error);
                            $("#newPasswordAlert").html("Coudn't setup your new Account");
                            $("#newPasswordAlert").addClass("alert alert-danger row p-2");
                        }
                    } // send phone number function
                );
            }
            else{
                $("#newPasswordAlert").text("Passwords are not matching");
                $("#newPasswordAlert").addClass("alert alert-danger");
            }
        }


    </script>
    <!-- JS Plugins Init Configiration -->
    <!-- <script>
        $(window).on('load', function (){
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

            // initialization of datepicker
            $.HSCore.components.HSRangeDatepicker.init('.js-range-datepicker');

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
    </script> -->

</body>



</html>
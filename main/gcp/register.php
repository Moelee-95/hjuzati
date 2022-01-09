<?php
session_start();
include('../cp/db/db_connect.php');
require '../../db.php';
require 'cp/classes/guest.php';

if (isset($_COOKIE['login_guest'])) {
    $_SESSION['login_guest'] = $_COOKIE['login_guest']; 
    $_SESSION['guestUserName'] = $_COOKIE['guestUserName'];
    $_SESSION['guest'] = serialize(new Guest($_COOKIE['guestUserName'],$_COOKIE['guestPassword'])); // create guest object
    header("location:cp/index.php");
}

//storing returned error when registration fail 
if(isset($_GET['error'])){
    if($_GET['error'] == '1'){
        $errorMsg = $_GET['message'];
    }
}


?>

<!DOCTYPE HTML>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hjuzati Hotels | Register New User</title>
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
                <form name="phone_verification" id="phone_verification" method="post" action="send_sms/send.php" >
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
                            </svg> </a>
                    </div>
                    <div class="row justify-content-center p-2">
                        <input class="col-3 p-4 form-control" id="phoneVerifyCode" value="" placeholder="XXXX">
                        <div class="col-1 p-3">
                            <button type="button" class="row h1 btn p-1" id="reSendCode" onclick="checkPhoneNumber()"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
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
                <!-- Modal Configiration -->
                <script>
                    var code;//to store the verification code to compare it later (MD5 verification)
                    var destNumber; // to store the desitination phone number after verification to use it around
                    var verifyState = false; //to store verification state

                    function phoneValidation(){
                        inputtxt = $("#phone").val();
                        var phoneno = '^[0-9]{10,12}$';
                        if(inputtxt.match(phoneno)){
                            return true;
                            }
                            else{
                                return false;
                            }
                    }
                    function veifyCode(){
                        var userCode = $("#phoneVerifyCode").val();
                        var encUserCode = CryptoJS.MD5(userCode).toString(); // encrypt user code to compare with encrypted code
                        
                        $("#phoneVerificationModal").modal('show');

                        // console.log(encUserCode);
                        if (encUserCode == code){
                            verifyState = true; //
                            // console.log("confirmed");//test
                            // importing the desination number into phone_input hidden element
                            if($("#phone_number").val(destNumber) ){
                                $("#verifyDiv").css("display", "none");
                                $("#verifiedDiv").css("display", "block");
                                $('#phoneVerificationModal').modal('hide');
                                submit_form();

                            }
                            else { $("#codeVerifyAlert").text("Couldn't insert the number."); }
                        }
                        else { $("#codeVerifyAlert").text("Wrong Entry, Please Try again!"); }
                    }

                    //this function sends an sms to the phone number and store it in code variable
                    function checkPhoneNumber(){
                        $("#alwaysAlert").val("");
                        //checking weather he confimed his phone number or not
                        if(verifyState == false){ //didnt verify his phone number
                            //phone number verification
                            if(!phoneValidation()){
                                $("#phoneVerifyAlert").text("Please Insert correct number");
                                return false;
                            }
                            else{
                                var full_number = phoneNumberObj.getNumber(intlTelInputUtils.numberFormat.E164);
                                $.post( 
                                    "../send_sms/send.php",
                                    {fNumber:full_number} ,
                                    function( data ) {
                                        code = 0;//reset the code
                                        destNumber=0; // to hold incomming number
                                        var dataArray = jQuery.parseJSON( data ); //convert to redable data
                                        console.log( "Generated code: " + dataArray.genCode );//test
                                        console.log( "Destination num: " + dataArray.destNumber );
                                        console.log( "Destination num: " + dataArray.deCode );

                                        //to prevent multiple messages
                                        if(dataArray.error == "0"){
                                            if(dataArray.genCode != "0"){
                                                code = dataArray.genCode;
                                                destNumber = dataArray.destNumber;

                                                //show verification section and hide phone section
                                                if(document.getElementById("phone_verification").style.display = "none"){
                                                    document.getElementById("destNumber").innerHTML = destNumber; //setting destination number
                                                    document.getElementById("verifyDiv").style.display= "block";
                                                    $("#alwaysAlert").val("");
                                                    //disable buttons for 1 min
                                                    disableButtons();
                                                }
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
                            } //else phone number is valid
                        } // phone number is not verified verifyState = false
                        else{
                            alert('Phone number is verified!');
                        }
                        
                    }

                    //disable the buttons and replace them with timer for 60 sec
                    function disableButtons(){
                        fewSeconds = 60;
                        var reSendBtn = $('#reSendCode');
                        var confirmBtn = $('#confirmBtn');
                        var counter = $('#counter');
                        var counter2 = $('#counter2');
                        var alwaysAlert =  $('#alwaysAlert');

                        //setting timer for the send message
                        var timeleft = 60;
                        var downloadTimer = setInterval(function(){
                        if(timeleft <= 0){
                            clearInterval(downloadTimer);
                            alwaysAlert.hide();
                            counter.hide();
                            counter2.hide();
                            reSendBtn.show();
                            confirmBtn.show();

                        } else {
                            alwaysAlert.hide();
                            counter.show();
                            counter2.show();
                            counter.text(timeleft);
                            counter2.text(timeleft);
                            reSendBtn.hide();
                            confirmBtn.hide();
                            
                        }
                        timeleft -= 1;
                        }, 1000);
                        reSendBtn.prop('disabled', true);
                        confirmBtn.prop('disabled', true);
                        alwaysAlert.hide();
                        setTimeout(function(){
                            counter.hide();
                            counter2.hide();
                            reSendBtn.prop('disabled', false);
                            confirmBtn.prop('disabled', false);
                        }, fewSeconds*1000);
                        
                    }
                    function editNumber(){
                        document.getElementById("verifyDiv").style.display = "none";
                        document.getElementById("verifiedDiv").style.display = "none";
                        document.getElementById("phone_verification").style.display = "block";
                    }

                    

                </script>
                <!-- JS Plugins Init Configiration -->
                <script>
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
                </script>
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div> -->
                </div>
        </div>
    </div>
    <!-- End phone Number verification modal -->
    <div id="wrapper" class="wrapper">        
        <div class="fxt-template-animation fxt-template-layout4 has-animation">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-12 fxt-bg-wrap d-none d-md-block">
                        <div class="fxt-bg-img" data-bg-image="img/figure/bg4-r.jpg">
                            <div class="fxt-header">
                                <div class="fxt-transformY-50 fxt-transition-delay-1">
                                    <a href="index.php" class="fxt-logo"><img src="img/logo-2.png" alt="Logo"></a>
                                </div>
                                <div class="fxt-transformY-50 fxt-transition-delay-2">
                                    <h1>Welcome To Hjuzati Hotels</h1>
                                </div>
                                <div class="fxt-transformY-50 fxt-transition-delay-3">
                                    <p>After Regestration you will be redirected to a page where you create and manage your bookings.</p>
                                </div>
                            </div>
                            <ul class="fxt-socials">
                                <li class="fxt-facebook fxt-transformY-50 fxt-transition-delay-4"><a href="https://www.facebook.com/HIMA.hotels"
                                        title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="fxt-instagram fxt-transformY-50 fxt-transition-delay-5"><a href="https://www.instagram.com/hima.hotels" title="instagram"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li class="fxt-whatsapp fxt-transformY-50 fxt-transition-delay-6"><a style="background-color: #01cc66cc" href="https://wa.me/9647708138928" title="whatsapp"><i
                                            class="fab fa-whatsapp"></i></a></li>
                                <li class="fxt-transformY-50 fxt-transition-delay-7" ><a style="" href="https://m.me/HIMA.hotels"
                                        title="messenger"><i class="fab fa-messenger"></i></a></li>
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
                            <div class="fxt-form p-4 mb-2 bg-light">
                                <div id="fullNameAlert" style="display: none" class="alert alert-danger"></div>
                                <div id="passAlert" style="display: none" class="alert alert-danger"></div>
                                <div id="confPassAlert" style="display: none" class="alert alert-danger"></div>
                                <?php
                                    if (isset($errorMsg)){ ?>
                                            <div id="error" style="display: block" class="alert alert-danger">
                                <?php            echo $errorMsg;  ?>
                                            </div>
                                <?php } else{ ?>
                                            <div id="error" style="display: none" class="alert alert-danger"></div>
                                <?php
                                            }
                                ?>
                                <form id="form1" method="POST" action="register_post.php" >
                                    <input type="hidden" id="phone_number" name="phone_number"  required="required">
                                    <h3>Create an account for create and manage your bookings</h3>

                                    <div class="form-group" id="fullNameDiv">  
                                        <label for="fullname" class="input-label">Full Name</label>
                                        <input id="fullname" type="text" class="form-control pl-3" name="fullname" placeholder="eg. Rebaz Mohammed Ali" required="required">
                                    </div>
                                    <div class="form-group">  
                                        <label for="pass" class="input-label">Password</label>                                               
                                        <input id="pass" type="password" class="form-control pl-3" name="password" placeholder="********" required="required">
                                        <i toggle="#pass" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                    </div>
                                    <div class="form-group">  
                                        <label for="conf_pass" class="input-label">Confirm Password</label>                                              
                                        <input id="conf_pass" type="password" class="form-control pl-3" name="conf_password" placeholder="********" required="required">
                                        <i toggle="#conf_pass" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                    </div>
                                        
                                    <div class="form-group">
                                        <div class="fxt-checkbox-area">
                                            <div class="checkbox">
                                                <input id="checkbox1" type="checkbox">
                                                <label for="checkbox1">I agree with the terms and condition</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button id="submitBtn" type="button" class="fxt-btn-fill" onclick="">Register</button>
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
    <!-- Validation  -->
    <script>
        function _(el){
            return document.getElementById(el);
        }

        function submit_form(){

            var alrt_pw = _('passAlert');
            var alrt_cpw = _('confPassAlert');
            var fullNameAlert = _('fullNameAlert');
            
            var fullName = _('fullname');
            var phoneNumber =_('phone_number').value;
            var pass =_('pass').value;
            var conf_pass =_('conf_pass').value;

            var phoneno = /^\d{11}$/;//phone num validation from 11
            var illegalChars = /\W/; // allow letters, numbers, and underscores
            var fn; // full name
            var ph; // phone number
            var pw;//password
            var cpw; //confirm password

            

            if(fullName != ''){
                fn = 1;
            } else { 
                fn = 0;
                fullNameAlert.style.display ='block';
                fullNameAlert.innerHTML ='<strong>Full name is incorrect!</strong>';
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

            if (fn ==1 && pw ==1 && cpw ==1) {
                if( pass == conf_pass){
                    $('#form1').submit();
                    }
                    else{
                        alrt_pw.style.display ='block';
                        alrt_pw.innerHTML ='<strong>Passwords Are Not Matching!!</strong>';
                    }
            } 
        }

        $("#submitBtn").click(
            function (){
                if(verifyState == false){
                    $("#phoneVerificationModal").modal('show');
                }
                else{
                    $("#phone_number").val(destNumber);
                    submit_form();
                }
        });   
    </script>
 
    
</body>



</html>
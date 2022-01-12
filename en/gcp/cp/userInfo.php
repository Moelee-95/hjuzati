<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	 <meta name="author" content="HimaHotels by.Mohammed S. Hazim" />
	<title> | Hjuzati</title>

	<!-- Font Awesome -->
	<link rel="stylesheet" id="font-awesome.min-css" href="../../../bootstrap/fa/fontawesome-pro-5.12.0-web/css/all.min.css" type="text/css" media="all">

	<!-- icons -->
	<link href="assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/font-awesome/css/fontawesome.min.css" rel="stylesheet" type="text/css" />
	<!--bootstrap -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="assets/plugins/material/material.min.css">
	<link rel="stylesheet" href="assets/css/material_style.css">
	<!-- animation -->
	<link href="assets/css/pages/animate_page.css" rel="stylesheet">
	<!-- Template Styles -->
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/theme-color.css" rel="stylesheet" type="text/css" />
	<!-- dropzone -->
	<link href="assets/plugins/dropzone/dropzone.css" rel="stylesheet" media="screen">
	<!-- Date Time item CSS -->
	<link rel="stylesheet" href="assets/plugins/flatpicker/flatpickr.min.css">
	<!-- favicon -->
	<link rel="shortcut icon" href="assets/img/favicon.ico" />
</head>
<!-- END HEAD -->

<body
	class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
	<div class="page-wrapper">
		<!-- start header -->
		<?php include('sections/header.php'); ?>
		<!-- end header -->

		<?php 


		//if update info form submitted
		if (isset($_POST['fullNameInput'])){ 
			$alertMessage = "";
			// when data is updated
			$date = DateTime::createFromFormat('d/m/Y', $_POST['DOBInput']);
			$newDate =  $date->format('Y/m/d');
			
			if ($guest->setInfo($_POST['fullNameInput'], $_POST['genderInput'], $newDate)){
				$_SESSION['guest'] = serialize($guest); // store into session
				$guest = unserialize($_SESSION['guest']); // return the session for the rest of the code
				$alertMessage = "information have been updated!";
				$msgc = "alert label-success";
			}
			else{
				$alertMessage = "coudn't update information";
				$msgc = "alert label-danger";
			}
		}

		// password update
		if (isset($_POST['oldPasswordInput'])){
			if($guest->password = $_POST['newPwdInput1']){
				$_SESSION['guest'] = serialize($guest);
				$alertMessage = "Password have been updated!";
				$msgc = "alert label-success";
			}
			else{
				$alertMessage = "coudn't update Password";
				$msgc = "alert label-danger";
			}
		}

		//Email update 
		if (isset($_POST['email'])){
			if ($_SESSION['emailConfirmed'] == $_POST['email']){
				if($guest->email = $_POST['email']){
					$_SESSION['guest'] = serialize($guest);
					$alertMessage = "Email have been updated!";
					$msgc = "alert label-success";
				}
				else{
					$alertMessage = "coudn't update Email";
					$msgc = "alert label-danger";
				}
			}
			else{
				$alertMessage = "Email Address is not confirmed";
				$msgc = "alert label-danger";
			}
		}


		?>


		<!-- start page container -->
		<div class="page-container">
			<!-- start sidebar menu -->
			<?php include('sections/sidebar-container.php');?>
			<!-- end sidebar menu -->


			<!-- Phone Number input requires -->
			<link rel="stylesheet" href="../../assets/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
			<script src="../../assets/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
			<!-- MD5 encryption -->
			<script src="../../assets/libs/crypto-js/4.0.0/core.min.js"></script>
			<script src="../../assets/libs/crypto-js/3.1.9-1/md5.js"></script>

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

									//update phone number in the database
									$.post( 
									"../../../classes/submitPhoneNumber.php",
									{phoneNumber:destNumber} ,
										function( data ) {
											var dataArray = jQuery.parseJSON( data ); //convert to redable data
											console.log( "Generated code: " + dataArray.error );
											console.log( "Destination num: " + dataArray.message );
											if (dataArray.error == 0){
												$("#phoneSuccessAlert").text(dataArray.message);
												$('#phoneVerificationModal').modal('hide');
												if($("#phoneNumber").val(destNumber) ){
													$("#verifyDiv").css("display", "none");
													$("#verifiedDiv").css("display", "block");													}
											}
											else{
												$("#phoneSuccessAlert").text(dataArray.message);
											}
										} // send phone number function
									);
								}
									 // importing the desination number into phone_input hidden element
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
											"../../send_sms/send.php",
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
			<!-- End mobile verification modal -->
			
			<!-- Modal Change Password -->
			<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="changePasswordModalLabel">Change your password</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form name="changePassword" id="changePassword" method="post" action="userInfo.php" >
								<div class="display:block" id="oldPassowrdDiv">
									<div class="row justify-content-center p-2">
										<input name="oldPasswordInput" id="oldPasswordInput" type="text" class="form-control mb-2 inptFielsd col-6"  placeholder="************" required data-msg="Please enter a valid password."
										data-error-class="u-has-error"
										data-success-class="u-has-success"  />
									</div>
									<div class="row justify-content-center p-2">
										<button id="checkPwdBtn" type="button" class="btn btn-primary w-50" > Confirm </button>
									</div>   
									<div class="row justify-content-center p-2">
										<span class="text-danger" id="oldPwdAlert"></span>
									</div>
								</div>
								<div class="" style="display:none" id="newPasswordDiv">
									<div class="row justify-content-center p-2">
										<span>Enter Your new Password: </span>
										<div class="w-100"></div>    
									</div>
									<div class="row justify-content-center p-2">
										<input class="col-6 p-4 form-control" name="newPwdInput1" id="newPwdInput1" value="" placeholder=" Your new Password">
										<div class="w-100 p-2"></div>
										<input class="col-6 p-4 form-control" name="newPwdInput2" id="newPwdInput2" value="" placeholder=" Re-Write new Password">
									</div>
									<div class="row justify-content-center p-2">
										<button type="button" id="updatePwdBtn" class="btn btn-primary w-50" onclick=""> Verify </button>
									</div>
									<div class="row justify-content-center p-2">
										<span class="text-danger" id="codeVerifyAlert"></span>
									</div>
								</div>
								<div class="" id="passwordMessageAlertdiv">
									<span class="col h6 p-1 text-danger" id="passwordAlwaysAlert"> </span> 
								</div>
							</form>
						</div>
						<!-- <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						</div> -->
					</div>
				</div>
			</div>
			<!-- End Change password modal -->

			
			<!-- Modal Email Address verification -->
			<div class="modal fade" id="emailVerificationModal" tabindex="-1" role="dialog" aria-labelledby="emailVerificationModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="emailVerificationModalLabel">Verify Your Email Address</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<div class="modal-body">
					<form name="email_verification_form" id="email_verification_form" method="post" action="userInfo.php" >
						<div class="" style="display:block" id="emailDiv">
							<div class="row justify-content-center p-2">
								<input name="email" type="text" class="form-control mb-2 inptFielsd col-7" id="email" placeholder="john@mail.com" required data-msg="Please enter a valid Email address."
								data-error-class="u-has-error"
								data-success-class="u-has-success"  />
							</div>
							<div class="row justify-content-center p-2">
								<button id="confirmEmail" type="button" class="btn btn-primary w-50" > Confirm </button>
								<span id="counter2" class="text-primary"> </span>
							</div>   
							<div class="row justify-content-center p-2">
								<span class="text-danger" id="emailVerifyAlert"></span>
							</div>
						</div>
					
						<div class="" style="display:none" id="emailVerifyDiv">
							<div class="row justify-content-center p-2">
								<span>Enter the code we have sent to: </span>
								<div class="w-100"></div>    
								<span class="h4 p-1 text-primary" id="destEmail"> </span> 
								<a type="button" class="p-2" id="editEmail" onclick="editEmail()"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
									<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
									<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
									</svg> </a>
							</div>
							<div class="row justify-content-center p-2">
								<input class="col-3 p-4 form-control" id="emailVerifyCode" value="" placeholder="XXXX">
								<div class="col-1 ml-3">
									<button type="button" class="row h1 btn" id="reSendCode" onclick="checkEmailAddress()"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
									<path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"></path>
									<path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"></path>
									</svg></button>
									<span id="counter" > </span>
								</div>
							</div>
							<div class="row justify-content-center p-2">
								<button type="button" class="btn btn-primary w-50" onclick="emailVeifyCode()"> Verify </button>
							</div>
							<div class="row justify-content-center p-2">
								<span class="text-danger" id="emailCodeVerifyAlert"></span>
							</div>
						</div>
					</form>
					<div class="" id="emailAlwaysMessageDiv">
						<span class="col h6 p-1 text-danger" id="emailAlwaysAlert"> </span> 
					</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Email Address verification modal -->







			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<!-- <div class=" pull-left">
								<div class="page-title">Edit User Information</div>
							</div> -->
							<ol class="breadcrumb page-breadcrumb pull-left">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.php">Hjuzati</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">User</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Basic Information </li>
							</ol>
							
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>Basic Information</header>
									<div id="formAlert" class="m-4 col-11 alert  <?php if(isset($msgc)){ echo $msgc; } ?> alert-dismissible " role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="text-danger" aria-hidden="true">×</span></button>
										<?php if(isset($alertMessage)){ echo $alertMessage; } ?>
									</div>
									<!-- <button id="panel-button"
										class="mdl-button mdl-js-button mdl-button--icon pull-right"
										data-upgraded=",MaterialButton">
										<i class="material-icons">more_vert</i>
									</button>
									<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
										data-mdl-for="panel-button">
										<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
											here</li>
									</ul> -->

									<?php 
										// $result = $guest->setPassword('mm', 'mo');
										// if($result){
										// 	echo "password changed";
										// 	$_SESSION['guest'] = serialize($guest); // renew the session
										// }
										// else {
										// 	echo $guest->errorMessage;
										// }

									?>
								</div>

								<form class="card-body row" name="updateInfo" method="post" action="userInfo.php" >
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="fullNameInput" value="<?php echo $guest->fullName ?>"
												id="fullNameInput">
											<label class="mdl-textfield__label">Full Name</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select `getmdl-select__fix-height txt-full-width">
											<input class="mdl-textfield__input" type="text" id="genderInput" name="genderInput" value="<?php echo $guest->gender ?>"
												readonly tabIndex="-1">
											<label for="genderInput" class="pull-right margin-0">
												<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
											</label>
											<label for="genderInput" class="mdl-textfield__label">Gender</label>
											<ul data-mdl-for="genderInput"
												class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
												<li class="mdl-menu__item" data-val="DE">Male</li>
												<li class="mdl-menu__item" data-val="BY">Female</li>
											</ul>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input disabled class="mdl-textfield__input" type="email" id="txtemail"
												value="<?php echo $guest->email ?>">
												<a href="#" id="changeEmailBtn" class=" mt-2 p-2">change</a>
											<label class="mdl-textfield__label">Email</label>
											<span class="text-success" id="emailSuccessAlert"></br></span>
											<span class="mdl-textfield__error">Enter Valid Email Address!</span>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input disabled class="mdl-textfield__input" type="text" value="<?php echo $guest->phoneNumber ?>"
												pattern="-?[0-9]*(\.[0-9]+)?" id="phoneNumber">
											<a href="#" id="changePhoneBtn"  class=" mt-2 p-2">change</a>
											<label class="mdl-textfield__label" for="phoneNumber">Mobile Number</label>
											<span class="text-success" id="phoneSuccessAlert"></br></span>
											<!-- <span class="mdl-textfield__error" >Number required!</span> -->
											
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="DOBInput" id="date2"
												value="<?php
													/* $date = DateTime::createFromFormat('Y/m/d', $guest->DOB);
													$newDate =  $date->format('d/m/y');
													*/ echo $guest->DOB; 
												 ?>">
												
											<label class="mdl-textfield__label">Birth Date</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input disabled class="mdl-textfield__input" type="password" id="txtPwd"
												value="**********">
												<a href="#" id="changePwdBtn" class=" mt-2 p-2">change</a>
											<label class="mdl-textfield__label">Password</label>
											<span class="text-success" id="passwordSuccessAlert"></br></span>
										</div>
									</div>
									<div class = "col-lg-12 p-t-20">
										<div class="row p-t-20 text-left">
											<div class="col-10">
												<a type="button" href="index.php" class="h1 text-dark"> <i class="fas fa-arrow-left"></i></a>
												
											</div>
											<div class="col-2">
												<button type="submit"
												class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-primary w-100">Save</button>
											</div>
										</div>
									</div>

								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->
			<!-- start chat sidebar -->
			<div class="chat-sidebar-container" data-close-on-body-click="false">
				<div class="chat-sidebar">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a href="#quick_sidebar_tab_1" class="nav-link active tab-icon" data-toggle="tab">Theme
							</a>
						</li>
						<li class="nav-item">
							<a href="#quick_sidebar_tab_2" class="nav-link tab-icon" data-toggle="tab"> Chat
							</a>
						</li>
						<li class="nav-item">
							<a href="#quick_sidebar_tab_3" class="nav-link tab-icon" data-toggle="tab"> Settings
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane chat-sidebar-settings in show active animated shake" role="tabpanel"
							id="quick_sidebar_tab_1">
							<div class="slimscroll-style">
								<div class="theme-light-dark">
									<h6>Sidebar Theme</h6>
									<button type="button" data-theme="white"
										class="btn lightColor btn-outline btn-circle m-b-10 theme-button">Light
										Sidebar</button>
									<button type="button" data-theme="dark"
										class="btn dark btn-outline btn-circle m-b-10 theme-button">Dark
										Sidebar</button>
								</div>
								<div class="theme-light-dark">
									<h6>Sidebar Color</h6>
									<ul class="list-unstyled">
										<li class="complete">
											<div class="theme-color sidebar-theme">
												<a href="#" data-theme="white"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="dark"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="blue"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="indigo"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="cyan"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="green"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="red"><span class="head"></span><span
														class="cont"></span></a>
											</div>
										</li>
									</ul>
									<h6>Header Brand color</h6>
									<ul class="list-unstyled">
										<li class="theme-option">
											<div class="theme-color logo-theme">
												<a href="#" data-theme="logo-white"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="logo-dark"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="logo-blue"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="logo-indigo"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="logo-cyan"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="logo-green"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="logo-red"><span class="head"></span><span
														class="cont"></span></a>
											</div>
										</li>
									</ul>
									<h6>Header color</h6>
									<ul class="list-unstyled">
										<li class="theme-option">
											<div class="theme-color header-theme">
												<a href="#" data-theme="header-white"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="header-dark"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="header-blue"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="header-indigo"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="header-cyan"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="header-green"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="header-red"><span class="head"></span><span
														class="cont"></span></a>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- Start Doctor Chat -->
						<div class="tab-pane chat-sidebar-chat animated slideInRight" id="quick_sidebar_tab_2">
							<div class="chat-sidebar-list">
								<div class="chat-sidebar-chat-users slimscroll-style" data-rail-color="#ddd"
									data-wrapper-class="chat-sidebar-list">
									<div class="chat-header">
										<h5 class="list-heading">Online</h5>
									</div>
									<ul class="media-list list-items">
										<li class="media"><img class="media-object" src="assets/img/user/user3.jpg"
												width="35" height="35" alt="...">
											<i class="online dot"></i>
											<div class="media-body">
												<h5 class="media-heading">John Deo</h5>
												<div class="media-heading-sub">Spine Surgeon</div>
											</div>
										</li>
										<li class="media">
											<div class="media-status">
												<span class="badge badge-success">5</span>
											</div> <img class="media-object" src="assets/img/user/user1.jpg" width="35"
												height="35" alt="...">
											<i class="busy dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Rajesh</h5>
												<div class="media-heading-sub">Director</div>
											</div>
										</li>
										<li class="media"><img class="media-object" src="assets/img/user/user5.jpg"
												width="35" height="35" alt="...">
											<i class="away dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Jacob Ryan</h5>
												<div class="media-heading-sub">Ortho Surgeon</div>
											</div>
										</li>
										<li class="media">
											<div class="media-status">
												<span class="badge badge-danger">8</span>
											</div> <img class="media-object" src="assets/img/user/user4.jpg" width="35"
												height="35" alt="...">
											<i class="online dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Kehn Anderson</h5>
												<div class="media-heading-sub">CEO</div>
											</div>
										</li>
										<li class="media"><img class="media-object" src="assets/img/user/user2.jpg"
												width="35" height="35" alt="...">
											<i class="busy dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Sarah Smith</h5>
												<div class="media-heading-sub">Anaesthetics</div>
											</div>
										</li>
										<li class="media"><img class="media-object" src="assets/img/user/user7.jpg"
												width="35" height="35" alt="...">
											<i class="online dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Vlad Cardella</h5>
												<div class="media-heading-sub">Cardiologist</div>
											</div>
										</li>
									</ul>
									<div class="chat-header">
										<h5 class="list-heading">Offline</h5>
									</div>
									<ul class="media-list list-items">
										<li class="media">
											<div class="media-status">
												<span class="badge badge-warning">4</span>
											</div> <img class="media-object" src="assets/img/user/user6.jpg" width="35"
												height="35" alt="...">
											<i class="offline dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Jennifer Maklen</h5>
												<div class="media-heading-sub">Nurse</div>
												<div class="media-heading-small">Last seen 01:20 AM</div>
											</div>
										</li>
										<li class="media"><img class="media-object" src="assets/img/user/user8.jpg"
												width="35" height="35" alt="...">
											<i class="offline dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Lina Smith</h5>
												<div class="media-heading-sub">Ortho Surgeon</div>
												<div class="media-heading-small">Last seen 11:14 PM</div>
											</div>
										</li>
										<li class="media">
											<div class="media-status">
												<span class="badge badge-success">9</span>
											</div> <img class="media-object" src="assets/img/user/user9.jpg" width="35"
												height="35" alt="...">
											<i class="offline dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Jeff Adam</h5>
												<div class="media-heading-sub">Compounder</div>
												<div class="media-heading-small">Last seen 3:31 PM</div>
											</div>
										</li>
										<li class="media"><img class="media-object" src="assets/img/user/user10.jpg"
												width="35" height="35" alt="...">
											<i class="offline dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Anjelina Cardella</h5>
												<div class="media-heading-sub">Physiotherapist</div>
												<div class="media-heading-small">Last seen 7:45 PM</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- End Doctor Chat -->
						<!-- Start Setting Panel -->
						<div class="tab-pane chat-sidebar-settings animated slideInUp" id="quick_sidebar_tab_3">
							<div class="chat-sidebar-settings-list slimscroll-style">
								<div class="chat-header">
									<h5 class="list-heading">Layout Settings</h5>
								</div>
								<div class="chatpane inner-content ">
									<div class="settings-list">
										<div class="setting-item">
											<div class="setting-text">Sidebar Position</div>
											<div class="setting-set">
												<select
													class="sidebar-pos-option form-control input-inline input-sm input-small ">
													<option value="left" selected="selected">Left</option>
													<option value="right">Right</option>
												</select>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Header</div>
											<div class="setting-set">
												<select
													class="page-header-option form-control input-inline input-sm input-small ">
													<option value="fixed" selected="selected">Fixed</option>
													<option value="default">Default</option>
												</select>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Sidebar Menu </div>
											<div class="setting-set">
												<select
													class="sidebar-menu-option form-control input-inline input-sm input-small ">
													<option value="accordion" selected="selected">Accordion</option>
													<option value="hover">Hover</option>
												</select>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Footer</div>
											<div class="setting-set">
												<select
													class="page-footer-option form-control input-inline input-sm input-small ">
													<option value="fixed">Fixed</option>
													<option value="default" selected="selected">Default</option>
												</select>
											</div>
										</div>
									</div>
									<div class="chat-header">
										<h5 class="list-heading">Account Settings</h5>
									</div>
									<div class="settings-list">
										<div class="setting-item">
											<div class="setting-text">Notifications</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-1">
														<input type="checkbox" id="switch-1" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Show Online</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-7">
														<input type="checkbox" id="switch-7" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Status</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-2">
														<input type="checkbox" id="switch-2" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">2 Steps Verification</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-3">
														<input type="checkbox" id="switch-3" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="chat-header">
										<h5 class="list-heading">General Settings</h5>
									</div>
									<div class="settings-list">
										<div class="setting-item">
											<div class="setting-text">Location</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-4">
														<input type="checkbox" id="switch-4" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Save Histry</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-5">
														<input type="checkbox" id="switch-5" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Auto Updates</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-6">
														<input type="checkbox" id="switch-6" class="mdl-switch__input"
															checked>
													</label>
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
			<!-- end chat sidebar -->
		</div>
		<!-- end page container -->
		<!-- start footer -->
<?php include('sections/footer.php'); ?>
		<!-- end footer -->
	</div>
	<!-- start js include path -->
	<script src="assets/plugins/jquery/jquery.min.js"></script>
	<script src="assets/plugins/popper/popper.min.js"></script>
	<script src="assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
	<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- Common js-->
	<script src="assets/js/app.js"></script>
	<script src="assets/js/layout.js"></script>
	<script src="assets/js/theme-color.js"></script>
	<!-- Material -->
	<script src="assets/plugins/material/material.min.js"></script>
	<script src="assets/js/pages/material_select/getmdl-select.js"></script>
	<!-- dropzone -->
	<script src="assets/plugins/dropzone/dropzone.js"></script>
	<script src="assets/plugins/dropzone/dropzone-call.js"></script>
	<!-- date and time 	 -->
	<script src="assets/plugins/flatpicker/flatpickr.min.js"></script>
	<script src="assets/js/pages/datetime/datetime-data.js"></script>
	<!-- animation -->
	<script src="assets/js/pages/ui/animations.js"></script>

	<!-- Modal change password Script -->
	<script>  
		var oldGPW = "<?php echo md5($guest->password);?>";
		
		$("#checkPwdBtn").click(
			function(){
				var oldIPW = CryptoJS.MD5($("#oldPasswordInput").val()).toString();// encrypet and store input pw
				if(oldGPW == oldIPW){
					$("#oldPassowrdDiv").css("display","none")//hide old pw div
					$("#newPasswordDiv").css("display","block");;//show new pw div
				}
				else{
					$("#oldPwdAlert").html("Wrong Password, <a href='#' > forgot password?</a>");
				}
			}
		);
		$("#updatePwdBtn").click(
			function(){
				if($("#newPwdInput1").val() != ''){
					if($("#newPwdInput1").val() == $("#newPwdInput1").val()){
						$("#oldPassowrdDiv").css("display","block");//show old pw div
						$("#newPasswordDiv").css("display","none");//hide new pw div
						$("#changePassword").submit();

					}
					else {
					$("#passwordAlwaysAlert").text("Passwords are not matching");
					}
				} else {
					$("#passwordAlwaysAlert").text("Password field is empty");
				}
				
				
			}
		);
	</script>

	<!-- Email Address Modal Configiration -->
	<script>
		var code;//to store the verification code to compare it later (MD5 verification)
		var destEmail; // to store the desitination phone number after verification to use it around

		function validateEmail($email){
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			return emailReg.test($email);
		}
		function emailVeifyCode(){
			var encUserCode = CryptoJS.MD5($("#emailVerifyCode").val()).toString();
			$("#emailVerificationModal").modal('show');
			// console.log(encUserCode);
			if (encUserCode == code){
				verifyState = true; //
				// console.log("confirmed");//test
				//update phone number in the database
				$("#email_verification_form").submit();

				
			}
					// importing the desination number into phone_input hidden element
			else { $("#emailCodeVerifyAlert").text("Wrong Entry, Please Try again!"); }
		}
		//this function sends an sms to the phone number and store it in code variable
		function checkEmailAddress(){
			var email = $("#email").val();
			$("#emailAlwaysAlert").val("");
			//checking weather he confimed his phone number or not
			if(!validateEmail(email)){
				$("#emailVerifyAlert").text("incorrect Email Address");
				return false;
			}
			else{
				$.post( 	
					"../../send_email/send.php",
					{email:email} ,
					function( data ) {
						
						code = 0;//reset the code
						destEmail=""; // to hold incomming email address
						
						var dataArray = jQuery.parseJSON( data ); //convert to redable data
						// console.log(data);
						console.log( "Generated code: " + dataArray.genCode );//test
						console.log( "Destination num: " + dataArray.destEmail );
						console.log( "Message: " + dataArray.message );
						console.log( "unencrypted code: " + dataArray.deCode );

						//to prevent multiple messages
						
						if(dataArray.error == "0"){
							if(dataArray.genCode != "0"){
								code = dataArray.genCode; //setting the code to compare it in the next step
								destEmail = dataArray.destEmail;
								//show verification section and hide phone section
								if($("#emailDiv").css('display',"none")){
									$("#destEmail").html(destEmail); //setting destination number
									$("#emailVerifyDiv").css('display',"block")
									$("#emailAlwaysAlert").val("");
									//disable buttons for 1 min
									disableButtons();
								}
							}
							else{
								$("#emailVerifyAlert").text("Something is wrong, coudn't generate the code");
							}

						}
						else{
							$("#emailAlwaysAlert").text(dataArray.errorMessage);
						}

					} // send phone number function
				);
			}
				//else phone number is valid
			
		}
		//disable the buttons and replace them with timer for 60 sec
		function disableButtons(){
			fewSeconds = 60;
			var reSendBtn = $('#reSendCode');
			var confirmBtn = $('#confirmEmail');
			var counter = $('#counter');
			var counter2 = $('#counter2');
			var emailAlwaysAlert =  $('#emailAlwaysAlert');

			//setting timer for the send message
			var timeleft = 60;
			var downloadTimer = setInterval(function(){
			if(timeleft <= 0){
				clearInterval(downloadTimer);
				emailAlwaysAlert.hide();
				counter.hide();
				counter2.hide();
				reSendBtn.show();
				confirmBtn.show();

			} else {
				emailAlwaysAlert.hide();
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
			emailAlwaysAlert.hide();
			setTimeout(function(){
				counter.hide();
				counter2.hide();
				reSendBtn.prop('disabled', false);
				confirmBtn.prop('disabled', false);
			}, fewSeconds*1000);
			
		}
		function editEmail(){
			$("#emailVerifyDiv").css("display","none");
			$("#emailDiv").css("display","block");
		}

		$("#confirmEmail").click(function(){
			checkEmailAddress();
		});
	</script>

	<!-- Clicking Events -->
	<script>
		$("#changeEmailBtn").click(function(){
			$('#emailVerificationModal').modal('show')
		});

		$("#changePwdBtn").click(function(){
			$('#changePasswordModal').modal('show')
		});

		$("#changePhoneBtn").click(function(){
			$('#phoneVerificationModal').modal('show')
		});
	</script>



		
</body>

</html>
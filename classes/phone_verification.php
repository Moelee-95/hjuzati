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
                

            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div> -->
        </div>
    </div>
</div>
<!-- End phone Number verification modal -->

<script>
    var code;//to store the verification code to compare it later (MD5 verification)
    var destNumber; // to store the desitination phone number after verification to use it around
    var verifyState = false; //to store verification state

    function veifyCode(){
        var userCode = $("#phoneVerifyCode").val();
        var encUserCode = CryptoJS.MD5(userCode).toString(); // encrypt user code to compare with encrypted code
        
        $("#phoneVerificationModal").modal('show');

        // console.log(encUserCode);
        if (encUserCode == code){
            verifyState = true; //
            // console.log("confirmed");//test
            // importing the desination number into phone_input hidden element
            if($("#phone_input").val(destNumber) ){
                $("#verifyDiv").css("display", "none");
                $("#verifiedDiv").css("display", "block");
                $('#phoneVerificationModal').modal('hide');
                customer_info();
            }
            else {
            $("#codeVerifyAlert").text("Couldn't insert the number.");
                }
        }
        else {
            $("#codeVerifyAlert").text("Wrong Number");
        }
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
            var full_number = phoneNumberObj.getNumber(intlTelInputUtils.numberFormat.E164);
            $.post( 
                "send_sms/send.php",
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

                }
            );
        }
        else{
            customer_info();
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


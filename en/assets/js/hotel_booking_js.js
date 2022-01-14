

var code;//to store the verification code to compare it later (MD5 verification)
var destNumber; // to store the desitination phone number after verification to use it around
var verifyState = false; //to store verification state

// ---> Send user back to availablity page
function back(){
    _("availability").style.display = "block";
    _("info").style.display = "none";
    _("customer_info").style.display = "none";
    _("payment_info").style.display = "none";
    _("confirmation").style.display = "none";

} 

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



// ---> send user to select payment info section
function customer_info(){

    // 1 Step verify all inputs

    // 2 step send confirmation SMS and confirm using dialog

    // if both above steps were successfully done go 
    // to the next step
    
    //checking if phone number is confirmed
    if (verifyState == true) {
        _("availability").style.display = "none";
        _("info").style.display = "block";
        _("customer_info").style.display = "none";
        _("payment_info").style.display = "block";
        _("confirmation").style.display = "none";
        $("#phoneVerificationModal").modal('hide');
    }
    else{
        $("#phoneVerificationModal").modal('show');
    }

} 
// ---> send user to booking is submitted
function payment_info(){
    _("availability").style.display = "none";
    _("info").style.display = "block";
    _("customer_info").style.display = "none";
    _("payment_info").style.display = "none";
    _("confirmation").style.display = "block";
}


function submit(){
    //check if payment method is selected, it returns true when selected & false when nothing is selected
    if(checkPaymentMethod()){
        $("#reserve_room" ).submit();
    }
    else{
        console.log("checkPaymentMethod function returnd false");
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
            "../send_sms/send.php",
            {fNumber:full_number} ,
            function( data ) {
                code = 0;//reset the code
                destNumber=0; // to hold incomming number
                var dataArray = jQuery.parseJSON( data ); //convert to redable data
                console.log( "Generated code: " + dataArray.genCode );//test
                console.log( "Destination num: " + dataArray.destNumber );
                console.log( "Unencrypted code: " + dataArray.deCode );
                // $("#phoneVerifyCode").val(dataArray.deCode);
                alert(dataArray.deCode);

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

function veifyCode(){
    var userCode = $("#phoneVerifyCode").val();
    var encUserCode = CryptoJS.MD5(userCode).toString(); // encrypt user code to compare with encrypted code
    
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

function editNumber(){
    document.getElementById("verifyDiv").style.display = "none";
    document.getElementById("verifiedDiv").style.display = "none";
    document.getElementById("phone_verification").style.display = "block";
}

$("#nextPage").click(function(){
    if(InfoValidation()){
       customer_info();
    } 
    else{
        console.log('some fields are required')
    }
});


function InfoValidation(){
    var err1;var err2;var err3; // 
    var fullName =$("#fullName").val();
    var email = $("#email");//to use focus we just select element
    var city = $('#city').find(":selected").val();
    
    //name validation
    if(fullName.length == 0){
        $("#fullNameAlert").text("Name Field is empty");  
        err1 = true; 
    } else if(fullName.length < 5){
        $("#fullNameAlert").text("Please Enter valid name");
        console.log("less than 5");
        err1 = true;
    }   else {
        $("#fullNameAlert").text("");
        err1 = false;
    }
    //email validation
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(email.val().match(mailformat)) {
        $("#emailAlert").text("");
        err2 = false;
    }else{
        $("#emailAlert").text("Please Enter valid Email Address");
        email.focus();
        err2 = true;
    }

    if(city == "Select City"){
        $("#cityAlert").text("Please Select a city");
        err3 = true;
    } else{
        $("#cityAlert").text("");
        err3 = false;
    }

    if (err1 == false && err2 == false && err3 == false) {
        return true;
    }else{
        return false;
    }
}

// load prices each time the page loaded
calculate();
sumRooms()


//Payment Options, when selecting option wirte it down in  paymentMethod input
var paymentMethod = $("#paymentMethod");
$("#CashOption").click(function(){
    paymentMethod.val("4");
});
$("#zainCashOption").click(function(){
    paymentMethod.val("3");
});
$("#asiaHawalaOption").click(function(){
    paymentMethod.val("1");
});
$("#FastPayOption").click(function(){
    paymentMethod.val("2");
});


/* On confirm booking, check for paymentMethod input if empty or not
used inputs 1.paymentMethod input, 2.paymentAlert span */
function checkPaymentMethod(){
    var paymentMethod = $("#paymentMethod");
    var paymentAlert = $("#paymentAlert");
    if(paymentMethod.val() == ""){
        paymentAlert.text("please select one of the payment methods first");
        return false;
    }
    else{
        return true;
        paymentAlert.text("");
    }
}


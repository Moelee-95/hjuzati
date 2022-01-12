<!-- Modal Create Booking Password -->
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
            <div class="" style="display:block" id="passwordDiv">
                <div class="row justify-content-center p-2">
                    <input name="password" type="text" class="form-control mb-2 inptFielsd" id="password" placeholder="Eg. Ahmed#1995" required data-msg="Please Enter valid password."
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
            </div>
            <div class="" style="display:none" id="passwordInfoDiv">
                <div class="row justify-content-center p-2">
                   <span id="createdPassword" class= "p-2"></span>
                   <button type="button" id="editPassword" class="btn p-2">Edit</button>
                </div>
            </div>
        <div class="" id="passwordAlwaysMessageDiv">
            <span class="col h6 p-1 text-danger" id="passwordAlwaysAlert"> </span> 
        </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Create Booking Password  -->


<!-- Create Booking password Script -->
<script>
 $("#confirmPassword").onclick(function{
    var password = $("#password");
        $.post( 
            "../../../classes/create_booking_password.php",
            {password:password} ,
            function( data ) {
                var dataArray = jQuery.parseJSON( data ); //convert to redable data
                console.log( "error: " + dataArray.error );//test
                console.log( "Message: " + dataArray.message);

                if(dataArray.error == "0"){
                //show verification section and hide phone section
                    if($("#passwordDiv").css('display','none')){
                        $("#destNumber").text(password); //setting confirmed password
                        $("#passwordInfoDiv").css('display','block');
                        $("#passwordAlwaysAlert").val("");
                    }
                    else{
                        $("#passwordAlwaysAlert").text("Something is wrong while setting booking password!");
                    }
                }
                else{
                    $("#passwordAlwaysAlert").text(dataArray.errorMessage);
                }

            }
        );
 });

 $("#editPassword").onclick(
     function(){
        $("#passwordInfoDiv").css('display','none');
         $("#passwordDiv").css('display','block');
     }
 );

 $("#EditBookingPassword").onclick(function(){
     $("createBookingPasswordModal").modal('show');
 });

</script>
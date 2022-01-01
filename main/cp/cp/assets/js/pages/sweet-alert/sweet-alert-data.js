
$(function () {
    $('.btn-sweetalert-button').on('click', function () {
        var type = $(this).data('type');
        var roomId = $(this).data('id');
        if (type === 'basic') {
            showBasicMessage();
        }
        else if (type === 'with-title') {
            showWithTitleMessage();
        }
        else if (type === 'success') {
            showSuccessMessage();
        }
        //We are using this.
        else if (type === 'confirm') {
            showConfirmMessage(roomId);
        }
        else if (type === 'cancel') {
            showCancelMessage();
        }
        else if (type === 'with-custom-icon') {
            showWithCustomIconMessage();
        }
        else if (type === 'html-message') {
            showHtmlMessage();
        }
        else if (type === 'autoclose-timer') {
            showAutoCloseTimerMessage();
        }
        else if (type === 'prompt') {
            showPromptMessage();
        }
        else if (type === 'ajax-loader') {
            showAjaxLoaderMessage();
        }
    });
});

//These codes takes from http://t4t5.github.io/sweetalert/
function showError(){
    Swal({
      icon: 'error',
      title: 'Oops...',
      text: 'Something went wrong!',
    });
}

function showBasicMessage() {
    swal("Good Morning!");
}

function showWithTitleMessage() {
    swal("Here's a message!", "How Are You?");
}

function showSuccessMessage() {
    swal({
    title:"Great!",
     text:"You have added new room.",
     type: "success",
     confirmButtonText: "View Room!",
     closeOnConfirm: false
     },function(){
        window.location.replace("all_rooms.php");
 });
    
}

function showConfirmMessage(roomId) {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this Room again and all bookings and info will be deleted!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function () {
        $.get ('delete_room.php',
                {room_id:roomId}
                ,function(output) {
                    var arr = output.split(",");
                    var state = arr[0];
                    var roomId = arr[1];
                // alert("Requisted value is:"+output);
                if (state == 1) {
                    swal("Deleted!", "Room has been deleted.", "success");
                   
                    // alert("Yeah baybe it's removed output is:"+output);
                    $("#"+roomId).remove();
                }
                else if(state == 0 ){
                    swal("Not Deleted!", "Error when trying to remove the room.", "error");
                }
                else {
                    swal("got this data", state+roomId, "error");

                }
            });
            
                 
    });
}

function showCancelMessage() {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel plx!",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function (isConfirm) {
        if (isConfirm) {
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
        } else {
            swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
    });
}

function showWithCustomIconMessage() {
    swal({
        title: "Sweet!",
        text: "Here's a custom image.",
        imageUrl: "../assets/sweet-alert/thumbs_up.png"
    });
}

function showHtmlMessage() {
    swal({
        title: "HTML <small>Title</small>!",
        text: "A custom <span style=\"color: #CC0000\">html<span> message.",
        html: true
    });
}

function showAutoCloseTimerMessage() {
    swal({
        title: "Auto close alert!",
        text: "I will close in 2 seconds.",
        timer: 2000,
        showConfirmButton: false
    });
}

function showPromptMessage() {
    swal({
        title: "An input!",
        text: "Write something interesting:",
        type: "input",
        showCancelButton: true,
        closeOnConfirm: false,
        animation: "slide-from-top",
        inputPlaceholder: "Write something"
    }, function (inputValue) {
        if (inputValue === false) return false;
        if (inputValue === "") {
            swal.showInputError("You need to write something!"); return false
        }
        swal("Nice!", "You wrote: " + inputValue, "success");
    });
}

function showAjaxLoaderMessage() {
    swal({
        title: "Ajax request example",
        text: "Submit to run ajax request",
        type: "info",
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
    }, function () {
        setTimeout(function () {
            swal("Ajax request finished!");
        }, 2000);
    });
}
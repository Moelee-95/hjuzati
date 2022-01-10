<?php

if (isset($_POST['full'])){
  echo $_POST['full'];
}

?>


<!DOCTYPE html>
<html lang="en">
 <head>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
 </head>
 <body>
    <form method="post" action="index.php" id="form" >
      <!-- HTML INPUT FIELD -->
      <input name="phone" type="text" class="form-control mb-2 inptFielsd" id="phone"
       placeholder="07701234567" pattern="[0-9]{11}" required />
      <input type="submit" name="submit" value="submit" id="submit" />
    </form>
    <button onClick="getNumber" > Get Number</button>
      
    <!-- JAVASCRIPT CODE REQUIRED -->
    <script>
        var input = document.querySelector("#phone");// attach the country codes list to phone element
        window.intlTelInput(input, {
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

 </body>
</html>

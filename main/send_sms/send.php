<?php

require 'sendSms.php'; //for test porposes!


if(isset($_POST['fNumber'])){
    $destNumber = $_POST['fNumber']; 
    $seconds = 60;// 1 min
    //period between sending the messages
    if(isset($_SESSION['lastConfTime'])){
        $timeWithAddition = $_SESSION['lastConfTime'];// get last time sms sent
        $currentTime =  strtotime(date_default_timezone_get());
        $secRemain = ($timeWithAddition - $currentTime); // remaining seconds for the next verification
        // when there is no remaining seconds send another message
        if($secRemain <= 0){
            $data = SendSMS::verifyNumber($destNumber);
            if ($data['error'] == 0) {
                $destNumber = $data['destNumber'];          //Destination number
                $enCode = $data['enCode'];                  //encrypted code
                $code = $data['code'];                      //unencrypted code
                $_SESSION['phoneConfirmed'] = $destNumber;  //to access later to make sure it's confirmed
                $dataJson['error'] = $data['error'];        //returned error
                $dataJson['destNumber'] = $destNumber;      //returned destNumber;
                $dataJson['genCode'] = $enCode;              //returned encrypted code
                $dataJson['deCode'] = $code;                //returned unencrypted code for TEST porpuse
                $_SESSION['lastConfTime'] = strtotime(date_default_timezone_get())+$seconds; //
                echo json_encode($dataJson);                // Return data to json 

            } 
            else {
                $dataJson['error'] = "1";
                $dataJson['errorMessage'] = "Something went wrong with sending sms";
                echo json_encode($dataJson);
            }

        }
        else{   //when there are still remaining seconds to the next verification
            $dataJson['error'] = "1";
            $dataJson['errorMessage'] = "Please Wait for :".$secRemain." Seconds Then try again";
            echo json_encode($dataJson);
        }

    }
    else{
        $data = SendSMS::verifyNumber($destNumber);
        if ($data['error'] == 0) {
            $destNumber = $data['destNumber'];          //Destination number
            $enCode = $data['enCode'];                  //encrypted code
            $code = $data['code'];                      //unencrypted code
            $_SESSION['phoneConfirmed'] = $destNumber;  //to access later to make sure it's confirmed
            $dataJson['error'] = $data['error'];        //returned error
            $dataJson['destNumber'] = $destNumber;      //returned destNumber;
            $dataJson['genCode'] = $enCode;              //returned encrypted code
            $dataJson['deCode'] = $code;                //returned unencrypted code for TEST porpuse
            $_SESSION['lastConfTime'] = strtotime(date_default_timezone_get())+$seconds; //
            echo json_encode($dataJson);                // Return data to json 

        } 
        else {
            $dataJson['error'] = "1";
            $dataJson['errorMessage'] = "Something went wrong with sending sms";
            echo json_encode($dataJson);
        }
    }

}



?>

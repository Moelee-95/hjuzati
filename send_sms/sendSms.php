<?php

class SendSMS{
    public static function send($destNumber,$message){
        require_once __DIR__.'/vendor/autoload.php'; // include requried files
        // Public key = 'rm0CfahzLuYv0nQ/WJZOMAz3MMyBDcBkspnDpvqTX40=' //in case if we need it
        /* 
        \Telnyx\Telnyx::setApiKey('KEY017DB36C72E430D31C14C6271BEA1F70_cDzySR1p7vm3myVn6A3lxw');
        $your_telnyx_number = '+15732061611';
        $new_message = \Telnyx\Message::Create(['from' => $your_telnyx_number, 'to' => $destNumber, 'text' => $message]);
         */
        //check what $new_message returns when it is sent
        return true;
    }

    //accepts phone number and returns $data
    public static function verifyNumber($destNumber){
        $code = strval(rand ( 10000 , 99999 )); //reandom code
        $error; //  0 when no error, 1 when there is an error
        $data = array(); // retruining data
        $fullSMS = "your verification code for Hjuzati is:".$code;
        if(SendSMS::send($destNumber, $fullSMS)){
            $error = 0;
            $data = array("error"=>$error, "destNumber"=>$destNumber,"enCode"=>md5($code),"code"=>$code );
        }
        else {
            $error = 1;
            $data = array("error"=>$error,"destNumber"=>$destNumber);
        }
        return $data;

    }

} 

// $data = SendSMS::verifyNumber("+9647709999999");
// echo $data['enCode'];












?>
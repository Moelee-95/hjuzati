<?php
session_start();

class PhoneVerify extends db{
    public $phoneNumber;
    public $generatedCode;
    private $smsSent = false;
    public $code;


    public function __construct($phoneNumber){
        $this->phoneNumber = $phoneNumber;
        $this->sendSMS();
    }

    private function genCode(){
        $code = strval(rand ( 10000 , 99999 )); //reandom code
        $this->generatedCode = md5($code);      //encrypted code
        $this->code = $code;
        $fullSMS = "your verification code for Hjuzati is: ".$code;
        return $fullSMS;

    }

    private function sendSMS(){
        $fullSMS = $this->genCode();
        //create sms object and call send function and pass
        // $send = Send($this->phoneNumber, $this->fullSMS);
        $this->smsSent = true;

        return true;
    }

    public function verifyCode($code){
        if($this->smsSent){
            if(md5($code) == $this->generatedCode){
                return true;
            }
            else{
                return false;
            }
        }
        else {
            return false;
        }
    }

}


















?>
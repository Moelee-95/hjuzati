<?php

session_start();


class Email{
    public $email;
    public $encryptedCode;
    protected $code;
    public $error;
    public $message;

    public function generateCode(){
        $genCode = strval(rand ( 10000 , 99999 )); //reandom code
        $this->code = $genCode; 
       if ($this->encryptedCode = md5($genCode)){
           return true;
       }
       else{
           return false;
       }
   }

    public function __construct($email){
        $this->email = $email;
        //generate code
        if($this->generateCode()){
            if ($this->sendEmail()){
                $this->error = '0';
                $this->message = "Email have been sent";
            }
            else {
                $this->error = '1';
                $this->message = "Coudn't send email";
            }
        }
        else{
            $this->error = '1';
            $this->message = "Coudn't generate code!";
        }
        //send email
    }

    

    public function sendEmail(){
        $fullEmail = "your verification code for Hjuzati is: ".$this->code;
        //return true for test
        return true;

    }
    // for test porpuse, remove later
    public function getCode(){
        return $this->code;
    }
}


if($_POST['email']){
    $email = new Email($_POST['email']);
    if($email->error == 0){
        $_SESSION['emailConfirmed'] = $email->email;
        $data['error'] = $email->error;
        $data['message'] = $email->message;
        $data['destEmail'] = $email->email;//$destNumber;
        $data['genCode'] = $email->encryptedCode;//encrypt the destination number with MD5
        $data['deCode'] = $email->getCode();
        echo json_encode($data);
    }
    else{
        $data['error'] = $email->error;
        $data['message'] = $email->message;
        $data['destEmail'] = $email->email;//$destNumber;
        echo json_encode($data);
    }

}










?>
<?php

class db{
    private $sName = "localhost";
    private $uName = "hjuzati";
    private $pw = "WorldNeeds1@me.anytime";
    private $dbname = "hima";
    protected $conn;

    public function __construct(){
        $this->conn = new mysqli($this->sName, $this->uName,$this->pw,$this->dbname);//db connection
    }
    public function getConnection(){
        return $this->conn;
    }
}

//alert to show alert message with close button
class AlertMSG{
    public static function alert($type, $message){
        $result = "<div id='' class='m-1 col-11 alert alert-$type label-success show alert-dismissible' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span class='text-danger' aria-hidden='true'>×</span></button>
        $message</div>";
        return $result;
    }


}

?>

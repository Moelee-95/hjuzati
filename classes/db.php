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

//execute queires
class Execute{
    public $num_rows;
    public $result;
    public $conn;
    public function __construct($query, $type){
        $conn = new db();
        $conn = $conn -> getConnection();
        $this->conn = $conn;
        $result;
        switch ($type) {
            case 'execute':
                $result = $this->execute($query);
                break;
            case 'single':
                $result = $this->single($query);
                break;
            case 'array':
                $result = $this->array($query);
                break;
            case 'multi':
                $result = $this->multi($query);
                break;
            default:
                $result = "wrong method: $type, use execute,single,array or multi";
                break;
        }
        $this->result = $result;
    }

    public function single($query){
        $result = $this->conn -> query($query);
        $fetch = $result -> fetch_row();
        $this->conn->close();
        return $fetch[0];
    }

    public function array($query){
        $result = $this->conn -> query($query);
        $this->num_rows = $result->num_rows;
        $fetch = $result -> fetch_array();
        $this->conn->close();
        return $fetch;
    }
    public function multi($query){
        $result = $this->conn -> query($query);
        $this->num_rows = $result->num_rows;
        $fetch = $result -> fetch_all(MYSQLI_ASSOC);
        $this->conn->close();
        return $fetch;
    }

    public function execute($query){
        $results;
        $result = $this->conn -> query($query);
        if ($result){
            $results = true;
        } else { $results = false;}
        $this->conn->close();
        return $results;
    }
}

// $ex = new Execute("SELECT * FROM hima.visets where ipAddress = '::1'", "something else");
// print_r($ex->result);


//alert to show alert message with close button
class AlertMSG{
    public static function alert($type, $message){
        $result = "<div id='' class='m-1 col-11 alert alert-$type label-success show alert-dismissible' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span class='text-danger' aria-hidden='true'>×</span></button>
        $message</div>";
        return $result;
    }
}


class Calculate{

    //get number of nights between two dates
    public static function getNights($from, $to){
        $start_ts = strtotime($from); 
        $end_ts = strtotime($to); 
        $diff = $end_ts - $start_ts; 
        $nights =  round($diff / 86400);//Number of nights
        return $nights;
    }

}

?>

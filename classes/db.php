<?php

class db{
    private $sName = "127.0.0.1";
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

?>
<?php

class Room {
    public $id;
    public $type;
    public $name;
    public $quantity;
    public $photos = array();

    public function __construct(){
        $conn = new db();
        $conn = $conn->getConnection();
        
    }
}














?>
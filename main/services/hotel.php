<?php


class Hotel{
    public $id;
    public $name;
    public $rating;
    public $pictures = array();
    public $mainPicture;
    public $rooms = array();
    public $mapLocation;
    public $address;

    public function __construct(){
        $conn = new db();
        $conn = $conn->getConnection();
        //iterate through hotel rooms and create objects out of them and insert the object to the array
        
    }

}









?>
<?php 
class Guest{
    public $name;
    public $bookings = array();
    public function __construct($name){
        $this->name = $name;
    }
    public function getBookings(){
        return $this->bookings;
    }
   
}
class Booking {
    public $checkin;
    public function __construct($checkin){
        $this->checkin = $checkin;
    }
}
$g = new Guest("Mohammed");
$b = new Booking("2020-10-10");
$b1 = new Booking("2021-12-09");
$b3 = new Booking("1991-01-02");
$g->bookings[] = $b;
$g->bookings[] = $b1;
$g->bookings[] = $b3;

$bs = $g->getBookings();

foreach($bs as $booking){
    echo $booking->checkin;
}









?>
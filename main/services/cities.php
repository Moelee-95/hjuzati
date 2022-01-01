<?php

// require "../../db.php"; //just for test when using terminal
class Cities{
     
    public static function getCities(){
        $conn = new db();
        $conn = $conn->getConnection();
        $sql = "SELECT city FROM hima.cities";
        $result = $conn -> query($sql);
        $citiesArray = $result -> fetch_all(MYSQLI_ASSOC);
        $cities = array();
        foreach($citiesArray as $city){//convert multi dimentional array
             array_push($cities, $city["city"]);
        }
        return $cities;
    }
}
// $arr = Cities::getCities();
// print_r($arr);

?>
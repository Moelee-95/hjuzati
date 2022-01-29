<?php

require 'classes/db.php';


// if (isset($_COOKIE['language'])) {
//     if ($_COOKIE['language'] == "english"){
//         header("location: en/");
//         exit();
//     } elseif ($_COOKIE['language'] == "arabic"){
//         header("location: ar/");
//         exit();
//     }
// }else {
//     header("location: en/");//Default language
//     exit();
// }


//redirect to comming soon 

$conn = new db();
$conn = $conn->getConnection();

//http://api.ipstack.com/188.72.15.81?access_key=7b1d3bb9544f43d328b4192fcea2b149

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}


$url="http://api.ipstack.com/$ip?access_key=7b1d3bb9544f43d328b4192fcea2b149";
$result = file_get_contents($url);
$vars = json_decode($result, true);

$country = $vars['country_name'];;
$latitude =  $vars['latitude']."</br>";
$longitude =  $vars['longitude']."</br>";


$query = "INSERT INTO visets (`ipAddress`, `country`, `latitude`, `longitude`) 
VALUES ('$ip', '$country', '$latitude', '$longitude')";
$result = $conn ->query($query);
if ($result) {
    header("location: comming_soon.php");//Default language
    exit();
} else {
    header("location: comming_soon.php?Coudn'tInsertData");//Default language
    exit();
}



?>
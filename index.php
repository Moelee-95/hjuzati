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

//http://api.ipstack.com/188.72.15.81?access_key=7b1d3bb9544f43d328b4192fcea2b149

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

echo "<b>$ip</b>"
//header("location: comming_soon.php");//Default language
//     exit();

?>
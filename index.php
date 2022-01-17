<?php


if (isset($_COOKIE['language'])) {
    if ($_COOKIE['language'] == "english"){
        header("location: en/");
        exit();
    } elseif ($_COOKIE['language'] == "arabic"){
        header("location: ar/");
        exit();
    }
}else {
    header("location: en/");//Default language
    exit();
}



?>
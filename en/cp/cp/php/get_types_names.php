<?php
  // File: get_hotel_names.php 

  // Get POST gender value
  $types = $_POST["types"];

  // Connect to the database
  include('../../db/db_connect.php');

  // Query to run
  $query = mysqli_query($conn,
           "SELECT * FROM `hima`.roomsnames WHERE rnRoomTypeID = '$types'");

  // Create empty array to hold query results
  $someArray = [];

  // Loop through query and push results into $someArray;
  while ($row = mysqli_fetch_assoc($query)) {
    array_push($someArray, 
      [
        'rnRoomNameID'   => $row['rnRoomNameID'],
      'rnRoomNameEn' => $row['rnRoomNameEn']
      ]
    );
  }

  // Convert the Array to a JSON String and echo it
  $someJSON = json_encode($someArray);
  echo $someJSON;
?>

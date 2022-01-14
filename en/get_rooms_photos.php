<?php
if (isset($_GET['room_id'])) {
	$room_id = $_GET['room_id'];
require('cp/db/db_connect.php');

$sql = "call get_rooms_photos('".$room_id."')";
$query = mysqli_query($conn, $sql);
$fetch = mysqli_fetch_all($query,MYSQLI_ASSOC);

echo json_encode($fetch);

// echo "<pre>";
// // print_r($fetch);
// echo "</pre>";


}





?>
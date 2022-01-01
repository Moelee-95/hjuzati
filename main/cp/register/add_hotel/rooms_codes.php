<?php





include('db_connect.php');



function r_codes($code){

$t_room = "SELECT * FROM rooms_options WHERE rooms_types = '$code' ";
		$t_query = mysqli_query($conn, $t_room);
		$t_fetch = mysqli_fetch_array($t_query);
		echo $t_fetch['t_en'];
}






?>
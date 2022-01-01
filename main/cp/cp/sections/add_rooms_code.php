<?php 


## WE AREN'T USEING MOST OF THESE CODES ANYMORE.......

$getdata = "SELECT * FROM layout_pricing WHERE hotel_id ='$hotel_id'";
$queries = mysqli_query($conn, $getdata);
$fetch_all = mysqli_fetch_all($queries, MYSQLI_ASSOC);



 //select types section
#get rooms basic types
 $get_rooms = "SELECT rooms_types FROM rooms_options";
 $get_query = mysqli_query($conn, $get_rooms);
 $get_fetch = mysqli_fetch_all($get_query, MYSQLI_ASSOC);//use foreach with $get_fetch

#get rooms names codes
 $get_r_n = "SELECT rooms_names FROM rooms_options";
 $get_r_query = mysqli_query($conn, $get_r_n);
 $get_r_fetch = mysqli_fetch_all($get_r_query, MYSQLI_ASSOC);//use forach with $get_r_fetch


//functions Section

#to translate the room type code into a visual name For English language
 function r_codes($code){
	include('../db/db_connect.php'); 
	$t_room = "SELECT * FROM rooms_options WHERE rooms_types = '$code' ";
	$t_query = mysqli_query($conn, $t_room);
	$t_fetch = mysqli_fetch_array($t_query);
	echo $t_fetch['t_en'];
}


//show the type of each room type above it
function r_names_title($fullstr){
	include('../db/db_connect.php'); #connect to the database
	$t_r_room = "SELECT t_en FROM rooms_options WHERE rooms_names ='$fullstr' ";
	$t_r_query = mysqli_query($conn, $t_r_room);
	$t_r_fetch = mysqli_fetch_array($t_r_query);

print_r($t_r_fetch['0']);
#echo"____________";
#print_r($fullstr);
//$rooms_codes = $t_r_fetch['0'];
//$explod = explode(',', $rooms_codes);
//echo $explod[$key];

}

function r_names_title_val($room_name_val){
include('../db/db_connect.php'); #connect to the database
$t_r_room_val = "SELECT rooms_types FROM rooms_options WHERE rooms_names ='$room_name_val' ";
$t_r_query_val = mysqli_query($conn, $t_r_room_val);
$t_r_fetch_val = mysqli_fetch_array($t_r_query_val);

//print_r($t_r_fetch_val['0']);

//echo $t_r_fetch_val['0'];

$test_return = $t_r_fetch_val['0'];
return $test_return;

}


//to translate the room name code into a visual room name
function r_names($fullstr,$key){
include('../db/db_connect.php'); 
//print_r($n_code);

$t_r_room = "SELECT en FROM rooms_options WHERE rooms_names ='$fullstr' ";
$t_r_query = mysqli_query($conn, $t_r_room);
$t_r_fetch = mysqli_fetch_array($t_r_query);


$rooms_codes = $t_r_fetch['0'];
$explod = explode(',', $rooms_codes);
echo $explod[$key];
//print_r($explod);
//print_r($key);


}


//Remove all files from temp directory before because of duplications

$files = glob('../hotels/'.$hotel_id.'/tmp_rooms/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}



	if (isset($_GET['room_id'])) {
		$room_id = $_GET['room_id'];
		$view = "SELECT * FROM layout_pricing WHERE hotel_id ='$hotel_id' AND room_id='$room_id'";
		$query = mysqli_query($conn, $view);
		$row = mysqli_fetch_array($query);
		$valid_r_id = $row['room_id'];
		if (empty($valid_r_id)) {
			header('location:../layout_pricing.php');
		}
	}
	else{
		
	}

?>

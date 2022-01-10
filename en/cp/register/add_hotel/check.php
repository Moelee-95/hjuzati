<?php 
session_start();


include('../../db/db_connect.php');

	if($conn->connect_error){
	echo "something is wrong with connection to the database, the error is:".$conn->connect_error;
	}
else {
	//check if user name is available in the users table

	$ch_info = "SELECT * FROM profile WHERE hotel_id = $hotel_id";
	$info_query = mysqli_query($conn, $ch_info);
	$info_row = mysqli_fetch_array($info_query);


	$ch_layout = "SELECT * FROM layout_pricing WHERE hotel_id = $hotel_id";
	$layout_query= mysqli_query($conn, $ch_layout);
	$layout_row = mysqli_fetch_array($layout_query);



	$ch_f_s = "SELECT * FROM f_s WHERE hotel_id = $hotel_id";
	$f_s_query = mysqli_query($conn, $ch_f_s);
	$f_s_row = mysqli_fetch_array($f_s_query);


	$ch_amenities = "SELECT * FROM amenities WHERE hotel_id = $hotel_id";
	$amenities_query = mysqli_query($conn, $ch_amenities);
	$amenities_row = mysqli_fetch_array($amenities_query);

	$ch_photos = "SELECT * FROM photos WHERE hotel_id = '$hotel_id'";
	$photos_query = mysqli_query($conn, $ch_photos);
	$photos_row = mysqli_fetch_array($photos_query);

	$ch_policies = "SELECT * FROM policies WHERE hotel_id = '$hotel_id'";
	$policies_query = mysqli_query($conn, $ch_policies);
	$policies_row = mysqli_fetch_array($policies_query);


	$ch_payment = "SELECT * FROM payment WHERE hotel_id = '$hotel_id'";
	$payment_query = mysqli_query($conn, $ch_payment);
	$payment_row = mysqli_fetch_array($payment_query);








	if (!empty($info_row['name']&& $info_row['star_rating']&& $info_row['contact_name']&& $info_row['contact_phone']&& $info_row['country']&& $info_row['city']&& $info_row['address']&& $info_row['zip_code']&& $info_row['email'])) {
		 $b_info = "complete"; }
		 else{$b_info= "";}


	if (!empty($layout_row['room_id']&& $layout_row['room_type']&& $layout_row['no_of_rooms']&& $layout_row['price_guest_num'])) {
		 $b_layout = "complete";
		 $empty_state = "none";
		 $show_rooms = "block";
		 
		  }
		 else{
		 $b_layout= "";
		 $empty_state = "block";
		 $show_rooms = "none";
		}


	if (!empty($f_s_row['internet']&& $f_s_row['parking']&& $f_s_row['breakfast']&& $f_s_row['lang_spoken'])) {
		 $b_f_s = "complete"; }
		 else{$b_f_s= "";}


	if(!empty($amenities_row['Provide_extra_bed']&& $amenities_row['number_extra_beds']&& $amenities_row['amenities_most_requested']&& $amenities_row['all_aminites'])){
	$amenities ="complete";}
	else{$amenities = "";}

	if (!empty($photos_row['photos'])) {
		$photos = "complete";
	}
	else{$photos = "";}

	if (!empty($policies_row['cancel_free_days_prior']&& $policies_row['cancel_guest_payment'])) {
		 $p_policies = "complete"; }
		 else{$p_policies= "";}

	if (!empty($payment_row['invoice_recipient'])) {
		 $p_payment = "complete"; }
		 else{$p_payment= "";}
		 

}


?>
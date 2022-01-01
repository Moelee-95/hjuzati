<?php 
############################################################################################
#######################  IMPORTING INCOMING CHECKBOKSES INTO THE ARRAY #####################

			// $get_facilities = "SELECT code FROM facilities_options";
			// $query_facilities = mysqli_query($conn, $get_facilities);
			// $save_facilities = mysqli_fetch_all($query_facilities,MYSQLI_ASSOC);
			// $length = count($save_facilities);#counting the length of the rows
			// for($i=0;$i<$length;$i++){
			// $row_value = ($save_facilities[$i]['code']);

			// if (!empty($_POST[$row_value])) {
			// 	$save_facilities[$i]['code'] = $save_facilities[$i]['code'].":".$_POST[$row_value];
			// }
			// }
################## NOW THE MULTIDIMANTION ARRAY IS FILLED WITH RESULTS   #####################
#########################################+++##################################################
############## CONVERTING MULTIDIMATION ARRAY TO SINGLE DIMANTION THEN TO STRING #############
		// 	//to avoid getting empty string message
		// 	$all_arraies ="";
		// 	//printing all multi-dimentions arrays and single arrays inside them 
		// 	foreach ($save_facilities as $key => $single_arr) {
		// //printing multidimanetion array to be array and get the string using code coulumn
		// //The result is going to be single string assigning it to variable and make it update it's self
		// 		$all_arraies = $all_arraies.",".$single_arr['code'];
		// 	}
		// 	//remove the first comma (,) from the string using letrm function
		// 	$all_arraies = ltrim($all_arraies,',');
			
###################	NOW THE STRING IS READY TO BE SAVED INTO THE DATABASE ######################



	// 	$facilities = $all_arraies;
		
	// 	$internet = $_POST['internet'];
	// 	$parking= $_POST['parking'];
	// 	$breakfast_included= $_POST['breakfast_included'];
	// 	$lang_spoken_by_staff= $_POST['lang_spoken_by_staff'];

	// 	$sql = "UPDATE f_s SET internet='$internet',parking='$parking',breakfast='$breakfast_included',lang_spoken='$lang_spoken_by_staff',facilities='$facilities' WHERE hotel_id = '$hotel_id'";
	// 	$result = mysqli_query($conn, $sql); 
	// 	if ($result) {
	// 		echo "Added";
	// 		header("location:amenities.php");
	// 	}
	// 	else{
	// 		echo "Not Added";
	// 	}

	// }
	// else {
		
	// }

// $sel = "SELECT * FROM f_s WHERE hotel_id= '$hotel_id'";
// $querys = mysqli_query($conn, $sel);
// if (!empty($querys)) {
// 	$fetchs = mysqli_fetch_array($querys);
// 	$str_arr = explode(',', $fetchs['facilities']);

// 	function checker($check){
// 		if (!empty($check)) {
// 			$last_chars = substr($check, -2);
// 			if ($last_chars == "es") {
// 				echo "checked";
// 			}
// 			elseif ($last_chars == "no") {
// 				echo "unchecked";
// 			}
// 		}
// 		else {
// 			echo "unchecked";
// 		}	
// 	}




// }


// $netVal = $fetchs['internet'];
// if ($netVal=="free") {
// 	$net = "Yes, Free";
// }
// elseif ($netVal == "paid") {
// 	$net = "Yes, Paid";
// }
// elseif ($netVal == "no") {
// 	$net = "Not Available";
// }

// $parkVal = $fetchs['parking'];
// if ($parkVal=="free") {
// 	$park = "Yes, Free";
// }
// elseif ($parkVal == "paid") {
// 	$park = "Yes, Paid";
// }
// elseif ($parkVal == "no") {
// 	$park = "Not Available";
// }

// $breakVal = $fetchs['breakfast'];
// if ($breakVal=="included") {
// 	$break = "Yes, it's included in the price";
// }
// elseif ($breakVal == "optional") {
// 	$break = "Yes, it's optional";
// }
// elseif ($breakVal == "no") {
// 	$break = "Not Available";
// }
// $lang = $fetchs['lang_spoken'];


		
					
?>
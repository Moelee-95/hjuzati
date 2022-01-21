
<?php

session_start();


//check if user is loged in
if (!isset($_SESSION['login_user'])) {
	header("Location:../logout.php");
	exit();
}

$user_id =  $_SESSION['login_user'];
$hotel_id = $_SESSION['hotel_id'];
// echo "$user_id <br>";
// echo "$hotel_id  <br>";
include('../../../../db_connect.php'); 

if ($conn->connect_error) {
	echo "Something is wrong with connection to the database";
}
else {

// 	#print_r($save_most_requested['0']);
// 	if (!empty($_POST['submit'])) {
		
// 		$Provide_extra_bed = $_POST['can_provide_extra_bed'];
// 		$number_extra_beds = $_POST['number_extra_beds'];
// //using if to assign empty value to children_up_2_years_in_cots checkbox if no value submitted (Not-selected)
// 		if (empty($_POST['children_up_2_years_in_cots'])) {
// 			$children_up_2_years_in_cots = "";}
// 		else{$children_up_2_years_in_cots= $_POST['children_up_2_years_in_cots'];}### End if #####
// 		$price_per_night_per_child = $_POST['price_per_night_per_child'];
// //using if to assign empty value to children_extra_bed checkbox if no value submitted (Not-selected)
// 		if (empty($_POST['children_extra_bed'])) {
// 			$children_extra_bed = "";}
// 		else{$children_extra_bed= $_POST['children_extra_bed'];} ### End if #####
// 		$extra_bed_children_max_age = $_POST['extra_bed_children_max_age'];
// 		$extra_bed_children_price = $_POST['extra_bed_children_price'];
// //using if to assign empty value to children_extra_bed checkbox if no value submitted (Not-selected)
// 		if (empty($_POST['adults_extra_bed'])) {
// 			$adults_extra_bed = "";}
// 		else{$adults_extra_bed= $_POST['adults_extra_bed'];} ### End if #####
// 		$price_pernight_per_adult =$_POST['price_pernight_per_adult'];

// 		#######################################################################################################
// 				#####################  Most requisted submitting the data  ########################
// 		$execluded_col = "0";
// 		$get_most_requested = "SELECT services_types FROM amenities_options WHERE no = '$execluded_col'";
// 		$query_most_requested = mysqli_query($conn, $get_most_requested);
// 		$save_most_requested = mysqli_fetch_array($query_most_requested);
// 		//Explod the string that contains the strings and make it  array to be able to use it with foreach
// 		$most_requested_array = explode(',', $save_most_requested['0']);
// 		//assigning the values of the most requested services by using foreach because they were printed using it too.
// 		foreach ($most_requested_array as $key_index => $most_requested_string) {
// 			if (!empty($_POST[$most_requested_string])) {
// 				$most_requested_array[$key_index ] = $most_requested_array[$key_index].":".$_POST[$most_requested_string];
// 			}
// 		}
// 		#print_r($most_requested_array);
// 		//converting the array that has been updated to the database
// 		$most_requested = implode(',', $most_requested_array );

// 		######################################################################################################
// 			############################# Rooms ameniations submiting data ###############################
// 			//First method that I have started with just for test
		
// 			$room_col = "1";
// 			$get_room_amenities = "SELECT services_types FROM amenities_options WHERE no = '$room_col'";
// 			$query_room_amenities = mysqli_query($conn, $get_room_amenities);
// 			$save_room_amenities = mysqli_fetch_array($query_room_amenities);
// 			//Explod the string that contains the strings and make it  array to be able to use it with foreach
// 			$room_amenities_array = explode(',', $save_room_amenities['0']);
// 			//assigning the values of the most requested services by using foreach because they were printed using it too.
// 			foreach ($room_amenities_array as $key_index_r => $room_amenities_string) {
// 				if (!empty($_POST[$room_amenities_string])) {
// 					$room_amenities_array[$key_index_r ] = $room_amenities_array[$key_index_r].":".$_POST[$room_amenities_string];
// 				}
// 			}

// 			$rooms_amenities = implode(',', $room_amenities_array );

			
// 		####################################################################################################

// 		###################################################################################################
// 			############################# Best Solution fully dinamic  #############################
// 			$all_sql = "SELECT no FROM amenities_options WHERE no != '$execluded_col'";
// 			$query_all = mysqli_query($conn,$all_sql);
// 			$fetch_all = mysqli_fetch_all($query_all,MYSQLI_ASSOC);
// 			$all_aminites ="";
// 			//using foreach to go to all of the rows
// 			foreach ($fetch_all as $keys => $all_arr) {
// 				//this forech to specify the row
// 				foreach ($all_arr as $key => $one_by_one) {
// 					### For testing the output  echo $one_by_one."<br>";  ###
// 					$sql = "SELECT services_types FROM amenities_options WHERE no = '$one_by_one'";
// 					$query = mysqli_query($conn, $sql);
// 					$save = mysqli_fetch_array($query);
// 					$all_arr = explode(',', $save['0']);
// 					foreach ($all_arr as $key_all => $all_arr_string){
// 						if (!empty($_POST[$all_arr_string])) {
// 							$all_arr[$key_all ] = $all_arr[$key_all].":".$_POST[$all_arr_string];
// 						}
// 					}
// 					//each time when the loop goes on the rows, it brings the services_types  of that row and 
// 					//convert it to string and assign it to variable.. 
// 				$all_aminites = $all_aminites.",".implode(',', $all_arr);
				
// 				}
// 			}
// 			// Removing the first comma that have been generated to have clear data
// 			$all_aminites_str = ltrim($all_aminites, ','); 
// 			// Removing the Last comma that have been generated to have clear data
// 			$all_aminites_str_2 = rtrim($all_aminites_str, ",");
// 			$all_aminites = $all_aminites_str_2;
			

// 		####################################################################################################
// 		####################################################################################################

// 		$sql_save = "UPDATE amenities SET Provide_extra_bed='$Provide_extra_bed',number_extra_beds='$number_extra_beds',children_up_2_years_in_cots='$children_up_2_years_in_cots',price_per_night_per_child='$price_per_night_per_child', children_extra_bed='$children_extra_bed',extra_bed_children_max_age='$extra_bed_children_max_age',extra_bed_children_price='$extra_bed_children_price',adults_extra_bed='$adults_extra_bed',price_pernight_per_adult='$price_pernight_per_adult',amenities_most_requested='$most_requested',all_aminites='$all_aminites' WHERE hotel_id ='$hotel_id' ";
// 		$sql_result = mysqli_query($conn,$sql_save);
// 		if ($sql_result) {
// 		#header('location:photos.php');
// 		#header('location:amenities.php');
// 		#echo "Form Subbmition Works properly";
// 		}
// 		else {
// 			echo "Not updated";
// 		}





	// }



#Getting List of Amenities options from the database and store them to an array
$sql = "SELECT * FROM amenitiesoptions";
$query = mysqli_query($conn, $sql);
$amenitiesArr = mysqli_fetch_All($query,MYSQLI_ASSOC);

print_r($amenitiesArr);


}


//functions area

//function 
// function amenities_titles($service){
// include('../../db_connect.php'); 
// $t_r_room = "SELECT t_en FROM amenities_options WHERE services ='$service' ";
// $t_r_query = mysqli_query($conn, $t_r_room);
// $t_r_fetch = mysqli_fetch_array($t_r_query);

// print_r($t_r_fetch['0']);
#echo"____________";
#print_r($fullstr);
//$rooms_codes = $t_r_fetch['0'];
//$explod = explode(',', $rooms_codes);
//echo $explod[$key];

//}

// //function to get the exploded data from string

// //amenities_values($var);
// function names_function($key,$full_string){
// include('db_connect.php'); 
// $sql_amenities = "SELECT en FROM amenities_options WHERE services = '$full_string' ";
// $t_r_query = mysqli_query($conn, $sql_amenities);
// $t_r_fetch = mysqli_fetch_array($t_r_query);

// $ameniteis_names = $t_r_fetch['0'];
// $explod = explode(',', $ameniteis_names);
// echo $explod[$key];

// //print_r($explod);
// //print_r($key);
// }

// //this function is specified only for the row: most requiested to get the names(titles) of the string accourding
// //to it's key locating that have been got when function is sent
// function m_requested_titile($key){
// include('db_connect.php');
// $row_field = "most_req";
// $sql_amenities = "SELECT en FROM amenities_options WHERE services = '$row_field' ";
// $t_r_query = mysqli_query($conn, $sql_amenities);
// $t_r_fetch = mysqli_fetch_array($t_r_query);
// $ameniteis_names = $t_r_fetch['0'];
// $explod = explode(',', $ameniteis_names);
// echo $explod[$key];
// }

// //count function for counting how many checkboxes are available in each service 
// function count_services($amenities_value){
// include('db_connect.php');
// 	//will be counting according to the values, doesn't matter if using en or ar they are all equal and seperated
// $sql_counting = "SELECT services_types FROM amenities_options WHERE services = '$amenities_value'";
// $query_counting = mysqli_query($conn,$sql_counting);
// $fetch_countin = mysqli_fetch_array($query_counting);


// //exploding the string to an array to be able to count it;
// $services_types = explode(',', $fetch_countin['0']);
// //counting the length of the string using count() function
// $length = count($services_types);
// echo $length;



//} 

?>

<!DOCTYPE html>
<html>
<?php include('header.php'); ?>
<?php ?>
<?php include('nav.php'); ?>
<br>
<br>
<?php
 ?>
<div class="container">
	<div class="title">
		<legend class="big" style="font-weight:bold">Amenities</legend>
		<legend class="small">You are nearly done! We just need a few more details about the extra bed options you provide, plus any amenities or specific features and services available.</legend>
	</div>
	<div class="contents">
		<legend class="big">Extra bed options</legend>
		<legend class="note">These are the bed options that can be added upon request.</legend>
		<legend class="big">Can you provide extra beds?</legend>
		<form method="post" action="">
		<label class="radio_container"><p style="position: relative;top:5px;left: -2px">Yes</p>
		  <input value="yes" 
		  onclick="if(this.checked){
			document.getElementById('extra_bed').style.display = 'block';
			}"
			 type="radio"  type="radio" name="can_provide_extra_bed" id="check_yes">
		  <span class="radio_checkmark"></span>
		</label>
		<label class="radio_container"><p style="position: relative;top:5px;left: -2">No</p>
		  <input checked value="no" onclick="if(this.checked){
			document.getElementById('extra_bed').style.display = 'none';
			}" type="radio" name="can_provide_extra_bed" id="check_no">
		  <span class="radio_checkmark"></span>
		</label>
		<div id="extra_bed" style="display: none">
			<legend class="small">Select the number of extra beds that can be added.</legend>
			<select class="text" name="number_extra_beds">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
			</select>

			<legend class="small" style="font-weight:600">Tick the box if you can accommodate the following guests in extra beds.</legend>

			<label class="control control-checkbox">Children up to 2 years old in cots
            	<input type="checkbox" name="children_up_2_years_in_cots" value="yes" onclick="
            	if(this.checked){
				document.getElementById('children_up_2_y_c').style.display = 'block';}
				else{document.getElementById('children_up_2_y_c').style.display = 'none'}" />
     		   <div class="control_indicator"></div>
  			</label><br>
  			<div id="children_up_2_y_c" style="display: none">
  				<legend class="small inline_block" >Enter the price per night, per child</legend>

  				<div class="inline_block">
	  				<span class="required_text" id="price_span" style="border-radius: 2px;border: 1px solid #ccc; padding: 13px;background-color: #eee" >
					US$
					</span>	
					<input oninput="" min="1" max="99999"  id="" style="width: 100px" class="text" type="text" name="price_per_night_per_child" placeholder="0">
  				</div>
  				
  			</div>
  			<br>


  			<label class="control control-checkbox">Children
            	<input type="checkbox" name="children_extra_bed" value="yes" <?php // checker($str_arr['14']) ?>
            	onclick="
            	if(this.checked){
				document.getElementById('children').style.display = 'block';}
				else{document.getElementById('children').style.display = 'none'}"
            	 />
     		   <div class="control_indicator"></div>
  			</label><br>
  			<div id="children" style="display: none">
  				<select name="extra_bed_children_max_age" class="text" style="width: 180px;display: inline-block;">
  					<option value="up_12">Up to 12 years old</option>
  					<option value="up_16">Up to 16 years old</option>
  					<option value="up_6">Up to 6 years old</option>
  				</select>
  				<lable class="inline_block" style="">Enter the price per night, per child:</lable>
  				<div class="inline_block">
	  				<span class="required_text" id="price_span" style="border-radius: 2px;border: 1px solid #ccc; padding: 13px;background-color: #eee" >
					US$
					</span>	
					<input name="extra_bed_children_price" oninput="" min="1" max="99999"   id="extra_bed_children_price" style="width: 100px" class="text" type="text" name="" placeholder="0">
  				</div>
  			</div><br>

  			<label class="control control-checkbox">Adults
            	<input type="checkbox" name="adults_extra_bed" value="yes" 
            	onclick="
            	if(this.checked){
				document.getElementById('adults').style.display = 'block';}
				else{document.getElementById('adults').style.display = 'none'}"
            	 >
     		   <div class="control_indicator"></div>
  			</label><br>
  			<div id="adults" style="display: none">
  				<label class="small" style="display: inline-block;">Enter the price per night, per adult</label>
  				<div class="inline_block">
	  				<span class="required_text" id="price_span" style="border-radius: 2px;border: 1px solid #ccc; padding: 13px;background-color: #eee" >
					US$
					</span>	
					<input oninput="" min="1" max="99999"   id="" style="width: 100px" class="text" type="text" name="price_pernight_per_adult" placeholder="0">
  				</div>

  			</div>
		</div>
	</div>


	<div class="contents">
		
		<legend class="big">Amenities</legend>
		<legend class="small">Tell us about your amenities</legend>
		<div id="" style="padding:15px;border:1px solid #e6e6e6;" >
			<legend class="small" style="font-size: 16px;margin-top: 8px;">Most requested by guests</legend>
			<div class="amenites_checkbox" style="margin-left: 8px">
				
				 <?php foreach ($amenitiesArr as $key => $str_value) {?>
				 	<label class="control control-checkbox"><?php echo $str_value["aEn"] ?>
	            	<input <?php 
	            	//Check functin if the value the record is added or not, if added then check which record have been added the no or yes
	            		// if ($check_val == $str_value.":yes") {
	            		// 	echo "checked";
	            		// }


	            	  ?> id="<?php echo $str_value ?>" type="checkbox" name="<?php echo $str_value ?>" value="yes">
	     		   	<div class="control_indicator"></div>
	  			</label><br>
				<?php } ?>
				
	  			
			</div>
		</div>
		<br>
		
				  
		</div>
		<button style="" type="submit" name="submit" value="submit" class="btn button col-lg-9 col-m-12 col-sm-12 col-xs-12">Continue</button>
			</form>
	</div>
	
</div>

<script type="text/javascript" src="bootstrap/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<?php include('html/footer.html'); ?>
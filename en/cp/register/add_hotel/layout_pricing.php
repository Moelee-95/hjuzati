
<?php

session_start();

$hotel_id = $_SESSION['login_user'];

if (empty($hotel_id)) {
	header('location:../index.php');
}

else{
include ('db_connect.php');
if ($conn->connect_error) {
	echo "Something is wrong with connection to the database";
}
else {
	//check if user name is available in the users table
		include("user_check.php");
	


	if (isset($_POST['room_type'])) {
		$room_type = $_POST['room_type'];
		$room_name = $_POST['room_name'];
		$cusrom_name = $_POST['cusrom_name'];
		$smoking_policy = $_POST['smoking_policy'];
		$no_of_rooms = $_POST['no_of_rooms'];
		$beds_kinds = $_POST['beds_kinds'];
		$beds_kinds_2 = $_POST['beds_kinds_2'];
		$bed_num = $_POST['bed_num'];
		$bed_num_2 =$_POST['bed_num_2'];
		$guest_num = $_POST['guest_num'];
		$room_size = $_POST['room_size'];
		$price_guest_num = $_POST['price_guest_num'];
		$offer_lower_if_fewer_guest_num = $_POST['offer_lower_if_fewer_guest_num'];
		$discount_1_person = $_POST['discount_1_person'];



		$sql = "INSERT INTO layout_pricing(hotel_id,room_type,room_name,cusrom_name,smoking_policy,no_of_rooms,beds_kinds,bed_num,beds_kinds_2,bed_num_2,guest_num,room_size,price_guest_num,offer_lower_if_fewer_guest_num,discount_1_person) VALUES ('$hotel_id','$room_type','$room_name','$cusrom_name','$smoking_policy','$no_of_rooms','$beds_kinds','$bed_num','$beds_kinds_2','$bed_num_2','$guest_num','$room_size','$price_guest_num','$offer_lower_if_fewer_guest_num','$discount_1_person')";

 		$quer = mysqli_query($conn,$sql);
 		if ($quer) {
 			header('location:layout_pricing.php');
 		}
 		else
 		{
 			alert("Nothing has been posted!");
 		}

	}




}
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
include('db_connect.php'); 
$t_room = "SELECT * FROM rooms_options WHERE rooms_types = '$code' ";
		$t_query = mysqli_query($conn, $t_room);
		$t_fetch = mysqli_fetch_array($t_query);
		echo $t_fetch['t_en'];
}


//show the type of each room type above it
function r_names_title($fullstr){
include('db_connect.php'); #connect to the database
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




//to translate the room name code into a visual room name
function r_names($fullstr,$key){
include('db_connect.php'); 
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


?>









<!DOCTYPE html>
<html>
<?php include('header.php'); ?>
<?php ?>
<?php include('nav.php'); ?>

<br/>
<br/>

<div class="container" id="empty_state" style="display:<?php echo $empty_state; ?>;" >
	<div class="title">
		<legend class="big"><b>Layout &nbsp; Pricing</b></legend>
		<legend class="small">Tell us about your first room. After entering all the necessary info, you can fill in the details of your other rooms.</legend>
	</div>
	<div class="contents">
		<div name="" style="width: 160px; margin: auto; margin-top: 10px; margin-bottom: 30px;">
        	<img style="width: 100%; height: 100%;" src="img/empty_state.png" alt="">
        </div>
        <legend  class="small" style="text-align: center;">No rooms have been added to your property – start adding rooms to describe bed options, layout, and pricing for guests.
		</legend>
		<button class="button button_inline" onclick="show()" style="display: block; width:200px;height: 50px;position:relative;left: 40%">Insert Room</button>
	</div>
</div>

<div class="container" id="show_rooms" style="display:<?php echo $show_rooms; ?>;">
	<?php foreach($fetch_all as $fetch_one):?>
		<div class="contents">			
			<table id="table">
			  <tr>
			    <th class="th th1">
			    	<?php 
								if (!empty($fetch_one['cusrom_name'])) {
										echo $fetch_one['cusrom_name'];
								}
									if (empty($fetch_one['cusrom_name'])) {
										echo "<img src='img/room_logo.png' width='80px' hieght='80px' />";
									}
								 ?></th>
			    <th class="th th2">Number of this type:<?php echo $fetch_one['no_of_rooms']; ?></th>
			  	<th class="th th3"><a href="edit_room.php?room_id=<?php echo $fetch_one['room_id'] ?>"  class="edit" style="" href="#">Edit</a></th>
			    <th class="th th4"><a  href="delete_room.php?room_id=<?php echo $fetch_one['room_id'] ?>" class="delete" href="#">Delete</a></th>
			  </tr>
			</table>
		</div>
		<?php endforeach ?>
		<div class="contents" style="background-color: #efefef;border: none">

		<button name="" class="button button_inline float_right" style="width:150px;"><a style="text-decoration: none;color: white" href="facilities.php">Continue</a></button>
		<button name="" class="button button_inline float_right" onclick="show()" style="width: 200px;margin-right:10px;background-color:#e6e6e6;border: 1px solid black;color: black">Add Another room</button>
		
	</div>
</div>
	
<div class="container" id="insertForm" name="add" style="display: none;" onload="show_selected()" >
		<form  method="post" action="" >
			<legend class="big"><b>Layout &nbsp; Pricing</b></legend>
			<a class="hover_underline" href="" style="color: #6b6b6b;text-decoration: none"><b>Back to overview</b></a>
				<div class="contents" style="padding-left: 50px">
					<div id="error_header" class="alert_messages" hidden>
					</div>
					<legend class="big" id="display">Please select</legend>
					<div class="row">
						<div class="" style="display: inline-block;">
							<legend class="small">Room type</legend>
							<select required class="text" name="room_type" onchange="show_selected()" id="sell">
							    <option value="0" >Please select</option>
							    <?php foreach ($get_fetch as $fetch) {
							    	foreach ($fetch as $fet) {
							    	?>
							    <option style="font-size: 16px" value="<?php echo $fet ?>" ><?php r_codes($fet); ?></option>
							    <?php 
							    }
							    } 

							     ?>
							</select>
						</div>
						<div class="" style="display: inline-block;">
							<legend class="small" id="room_name_text" hidden>Room name</legend>
							<?php
							foreach ($get_r_fetch as $r_fetch) {
								?>
									<legend class="small"><?php //r_names_title($r_fetch['rooms_names']); ?></legend>
									<select required style="display: none;" class="text" name="room_name" id="<?php r_names_title($r_fetch['rooms_names']); ?>">
									<option value="0" class="hidden" selected="selected" >Please select</option>
								<?php 
								foreach ($r_fetch as  $r_fet) {
									$exploded = explode(',', $r_fet);
									foreach ($exploded as $key => $ex_names) {

									?>
									<option value="<?php echo $ex_names ?>"><?php r_names($r_fet,$key); ?></option>

									<?php
									}
								}
								?>
									</select>
								<?php
							}


							 ?>
						</div>
					</div>
					<div class="row">
						<div style="display: inline-block;">
							<legend class="small">Custom name (optional)</legend>
							<input class="text" id="custom_name" type="text" name="cusrom_name" />
						</div>
						<div style="display: inline-block;">
							<legend class="small">Smoking policy</legend>
							<select required class="text" name="smoking_policy" >
							    <option value="1">Non-smoking</option>
							    <option value="0">Smoking</option>
								<option value="2">I have both smoking and non-smoking options for this room type</option>
							</select>
						</div>
					</div>

						
					<br />
					<div id="more_options" class="row" style="display: none">
						<div class="alert col-lg-4 col-md-4 col-sm-12" style="display: inline-block;">
							<legend class="small">Number of bedrooms</legend>
							<select name="num_bed_rooms" class="text" style="width: 100px;">
								<option value="1" >1</option>
								<option value="2" >2</option>
								<option value="3" >3</option>
								<option value="4" >4</option>
								<option value="5" >5</option>
								<option value="6" >6</option>
								<option value="7" >7</option>
								<option value="8" >8</option>
								<option value="9" >9</option>
							</select> 
						</div>
						<div class="alert col-lg-4 col-md-4 col-sm-12" style="display: inline-block;">
							<legend class="small">Number of living rooms</legend>
								<select required  name="num_living_rooms" class="text"  style="width: 100px;" >
									<option value="1" >1</option>
									<option value="2" >2</option>
									<option value="3" >3</option>
									<option value="4" >4</option>
									<option value="5" >5</option>
								</select>
						</div>
						<div class="alert col-lg-4 col-md-4 col-sm-12" style="display: inline-block;">
							<legend class="small">Number of bathrooms</legend>
							<select required name="num_bathrooms" class="text" style="width: 100px;">
								<option value="1" >1</option>
								<option value="2" >2</option>
								<option value="3" >3</option>
								<option value="4" >4</option>
								<option value="5" >5</option>
								<option value="6" >6</option>
								<option value="7" >7</option>
								<option value="8" >8</option>
								<option value="9" >9</option>
							</select> 
						</div>
					</div>
					


					<legend class="small">Number of rooms (of this type)</legend>
					<input min="1" max="99999"  required id="num_this_type" class="text" type="text" name="no_of_rooms" style="width: 70px" />

				</div>
				<div class="contents" id="bed_options" style="display: none">
					<legend class="big">Bed Options</legend>
					<legend class="note">Tell us only about the existing beds in a room (don't include extra beds).</legend>
					<legend class="small">What kind of beds are available in this room?</legend>

					<div id="bd_options" name="bd_options">
						<div id="beds_1" name="bed_1">
							<select style="display: inline-block;width: 280px;" required class="text" name="beds_kinds" id="bed_kinds" onchange="add_guests()">
				                <option value="1" data-occupancy="1" data-name="Twin bed(s)">
				                Twin bed(s)
				                &nbsp;&nbsp;/&nbsp;&nbsp;90-130 cm wide
				                </option>
				                <option value="2" data-occupancy="2" data-name="Full bed(s)">
				                Full bed(s)
				                &nbsp;&nbsp;/&nbsp;&nbsp;131-150 cm wide
				                </option>
				                <option value="6" data-occupancy="2" data-name="Queen bed(s)">
				                Queen bed(s)
				                &nbsp;&nbsp;/&nbsp;&nbsp;151-180 cm wide
				                </option>
				                <option value="3" data-occupancy="2" data-name="King bed(s)">
				                King bed(s)
				                &nbsp;&nbsp;/&nbsp;&nbsp;181-210 cm wide
				                </option>
				                <option value="4" data-occupancy="1" data-name="Bunk bed">
				                Bunk bed
				                &nbsp;&nbsp;/&nbsp;&nbsp;Variable Size
				                </option>
				                <option value="5" data-occupancy="1" data-name="Sofa bed">
				                Sofa bed
				                &nbsp;&nbsp;/&nbsp;&nbsp;Variable Size
				                </option>
				                <option value="7" data-occupancy="1" data-name="Futon bed(s)">
				                Futon bed(s)
				                &nbsp;&nbsp;/&nbsp;&nbsp;Variable Size
				                </option>
		            		</select>
		            		<span style="margin-top: -10px;display: inline-block;padding: 15px"> x </span>
			            		<select required style="width: 230px;display: inline-block;" class="text" name="bed_num" id="bed_num" onchange=";add_guests()">
					            <option value="0" selected="" hidden="">Select the number of beds</option>

					            <option value="1">1</option>
					            <option value="2">2</option>
					            <option value="3">3</option>
					            <option value="4">4</option>
					            <option value="5">5</option>
					            <option value="6">6</option>
					            <option value="7">7</option>
					            <option value="8">8</option>
					            <option value="9">9</option>
					            <option value="10">10</option>
					            <option value="11">11</option>
					            <option value="12">12</option>
	     			  		 </select>	
	     			  		
						</div>
					</div>
					
					
					<div class="" id="add_bed_button" style="">

						<a  class="" onclick="add_bed_option()" style="text-decoration: none;color: #73beff;" href="#bed_2"><b style=";font-size: 20px;border-radius:50%;;background-color:#73beff;color:white;;"> &nbsp;+ </b> Add another bed</a>
					</div>

					<div style="margin-bottom:8px;">
						<legend class="" >How many guests can stay in this room?</legend>
						<div class="guest_num_log">
							<div id="guest_number" style="display: inline-block;">
								<input  min="1" max="99999" onchange="guest_no();logo_check_guset_number(this.value)" class="text" type="text" name="guest_num" id="guest_num" style="width: 80px;" >
							</div>
							<div id="guest_logo" style="margin-top:5px;margin-left:15px;display: inline-block;">

							</div>
						</div>
					</div>

				</div>

				<div class="contents" id="room_size" style="display: none" >
					<legend class="Big">Room size (optional)</legend>
					<input min="1" max="99999"  id="room_size_txt" class="text" style="width: 100px" type="text" name="room_size" />
				</div>

				<div class="contents" id="price_options" style="display: none" >
					<legend class="Big">Base price per night</legend>
					<div style="">
						<legend class="note">This is the lowest price that we automatically apply to this room for all dates. Before your property goes live, you can set seasonal pricing on your property dashboard.</legend>
					</div>
					<div style="">
						<div style="display: inline-block;margin-right:40px">
								
							<legend class="small" >Price for <b id="price_for" style="color: green"></b> person</legend>
					
								<span class="required_text" id="price_span" style="border-radius: 2px;border: 1px solid #ccc; padding: 13px;background-color: #eee" >
								<img src="img/us-flag.png" style="width:25px ;height: 15px;margin-bottom: -3px">
								US$/per night
							</span>	
							<input oninput="input_price()" min="1" max="99999"  required id="price_guest_num" style="width: 100px" class="text" type="text" name="price_guest_num" placeholder="0">
							
								


							<legend class="small" style="width: 320px">Do you offer a lower rate when there are fewer than <b id="disscount_for"></b> guests?</legend>

							<label class="radio_container"><p style="position: relative;top:-11px;left: -5px">Yes</p>
							  <input value="yes" onclick="if(this.checked){
													document.getElementById('div_diss_options').style.display = 'block';
													}" type="radio" name="offer_lower_if_fewer_guest_num" id="	">
							  <span class="radio_checkmark"></span>
							</label>
							<label class="radio_container"><p style="position: relative;top:-11px;left: -5px">No</p>
							  <input value="no" checked onclick="if(this.checked){
														document.getElementById('div_diss_options').style.display = 'none';
														}"  type="radio" name="offer_lower_if_fewer_guest_num" id="diss_no">
							  <span class="radio_checkmark"></span>
							</label>
							<br/>
							<div id="div_diss_options" style="display: none">
								<legend class="small">Discount for 1 person</legend>
								<input min="1" max="99999"  class="text" type="" name="discount_1_person" style="width: 50px">
								<select class="text" name="disscount_type" style="width: 100px" disabled>
			                    	<option value="percentage" >%</option>
			                    	<option value="cash" selected>US$</option>
		                   		</select>
							</div>
						</div>
						<div hidden id="last_message_box" style="border:1px solid green;left:20px;top:-40px;margin-bottom:70px;display:none;padding: 10px 10px;background-color: #e6e6e6;font-family:BlinkMacSystemFont,-apple-system,Segoe UI,Roboto,Helvetica,Arial,sans-serif">
							<div id="">
								<h4 style="margin:5px;padding: 10px">Price summary for:Hotel</h4>
								<div id="price-summary_price_table" >
									<div class="row price-summary_header" style="margin-left:10px">
										<div style="display: inline-block;padding:8px;">Number of guests</div>
										<div style="display: inline-block;padding:8px 15px;margin-left:10px;">Price</div>
									</div>
									<div class="row price-summary_content" style="margin-left:8px;padding:10px">
										<div id="guest_logo_2" style="position:relative;display: inline-block;padding:5px;top:5px">
											
										</div>
										<div id="final_price" style="display:inline-block;padding:5px 15px;margin-left:35px;color: #008009;font-weight:bold"></div>

									</div>
									<div class="row note" style="margin-left:8px;padding:10px;width: 350px">
									
											<legend style="font-size: 12px;color: #6b6b6b;box-sizing: border-box;" >

												After you have access to your Stars Hotels property dashboard, we'll ask you to double-check your price information before your property goes live on our website.
											</legend>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<div class="buttons_div" style="">

				<a id="save_button" onclick="check_fields();go()" name="save" class="button button_inline" style="width: 150px;float: right;font-size: 17px;background-color: #1d8900">Save</a>
				<button onclick="check_fields()" id="submit_button" type="submit" name="submit" class="button" style="width: 200px;float: right;font-size: 17px">Continue</button>
				<button  type="reset" onclick="hide()"class="button button_inline" style="display: inline-block;width: 200px;float: right;margin-right:10px;background-color:#e6e6e6;border: 1px solid black;color: black">Back to overview</button>
			</div>
			</form>
		</div>
	</div>
</div>
		






<br/>
<br/>
<br/>
<br/>

<?php include('html/footer.html'); ?>




<?php } ?>
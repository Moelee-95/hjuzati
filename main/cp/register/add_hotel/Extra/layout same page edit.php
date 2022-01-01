layout same page edit


		  function hideEdit(){
			var edit_form = document.getElementById("edit_form");
			var insertButton = document.getElementById("insertRoom");
			var rooms_div = document.getElementById("rooms_div");
			if (edit_form.style.display === "none") {
				edit_form.style.display = "block";
			}
			if (insertButton.style.display === "block" ) {
				insertButton.style.display = "none";
			}
			if (rooms_div.style.display === "block" ) {
				rooms_div.style.display = "none";
			}
		}
		
		function showEdit(){
			var edit_form = document.getElementById("edit_form");
			var insertButton = document.getElementById("insertRoom");
			var rooms_div = document.getElementById("rooms_div");
			if (edit_form.style.display === "none") {
				edit_form.style.display = "block";
			}
			
			if (insertButton.style.display === "block" ) {
				insertButton.style.display = "none";
			}
			if (rooms_div.style.display === "block" ) {
				rooms_div.style.display = "none";
			}
			

		}





		


<div id="edit_form" style="display: block;">
	<form  method="post" action="" name="edit" >
	<input class="" id="" name="hotel_id" type="text" value="Hotel ID:<?php echo $hotel_id ?>" disabled="disabled"><br/>
	<input class="" id="" name="room_id" value="true" type="hidden"><br/>
	<input class="" id="" name="room_type" type="text" placeholder="Room Type" ><br/>
	<input class="" id="" name="room_name" type="text" placeholder="Room Name" ><br/>
	<input class="" id="" name="cusrom_name" type="text" placeholder="Opetional Room Name" ><br/>
	<input class="" id="" name="smoking_policy" type="text" placeholder="Smoking Policy" ><br/>
	<input class="" id="" name="no_of_rooms" type="numbers" placeholder="Number of rooms of this type" ><br/>
	<input class="" id="" name="beds_kinds" type="text" placeholder="Bed Kinds" ><br/>
	<input class="" id="" name="bed_num" type="numbers" placeholder="Bed Numbers" ><br/>
	<input class="" id="" name="guest_num" type="numbers" placeholder="Maximum guests Numbers" ><br/>
	<input class="" id="" name="room_size" type="numbers" placeholder="Room size in sqare Matter" ><br/>
	<input class="" id="" name="price_guest_num" type="numbers" placeholder="Prices for the written guests numbers above" ><br/>
	<input class="" id="" name="offer_lower_if_fewer_guest_num" type="text" placeholder="Do you offer lower if guests are less" ><br/>
	<input class="" id="" name="discount_1_person" type="numbers" placeholder="Discount for one person" ><br/>
	
	
	<input type="submit" name="submit" value="Save">
	<button  type="reset" onclick="hideEdit()">Cancel</button>

</form>









/*,beds_kinds='$beds_kinds',bed_num='$bed_num',guest_num='$guest_num',room_size='$room_size',price_guest_num='$price_guest_num',offer_lower_if_fewer_guest_num='$offer_lower_if_fewer_guest_num',discount_1_person='$discount_1_person'*/ 



<?php if ($facilitie['0']=='restaurant:no') {echo "unchecked";} else{echo "checked";} ?>
<?php if ($facilitie['1']=='room_service:no') {echo "unchecked";} else{echo "checked";} ?>
<?php if ($facilitie['2']=='bar:no') {echo "unchecked";} else{echo "checked";} ?>
<?php if ($facilitie['2']=='sauna:no') {echo "unchecked";} else{echo "checked";} ?>
<?php if ($facilitie['3']=='fitness:no') {echo "unchecked";} else{echo "checked";} ?>
<?php if ($facilitie['4']=='garden:no') {echo "unchecked";} else{echo "checked";} ?>
<?php if ($facilitie['5']=='terrace:no') {echo "unchecked";} else{echo "checked";} ?>
<?php if ($facilitie['6']=='non_smoking_rooms:no') {echo "unchecked";} else{echo "checked";} ?>
<?php if ($facilitie['7']=='airport_shuttle:no') {echo "unchecked";} else{echo "checked";} ?>
<?php if ($facilitie['8']=='family_rooms:no') {echo "unchecked";} else{echo "checked";} ?>
<?php if ($facilitie['9']=='spa:no') {echo "unchecked";} else{echo "checked";} ?>
<?php if ($facilitie['10']=='hot_tub_Jacuzzi:no') {echo "unchecked";} else{echo "checked";} ?>
<?php if ($facilitie['11']=='air_conditioning:no') {echo "unchecked";} else{echo "checked";} ?>
<?php if ($facilitie['12']=='water_park:no') {echo "unchecked";} else{echo "checked";} ?>
<?php if ($facilitie['13']=='electric_vehicle_charging_station:no') {echo "unchecked";} else{echo "checked";} ?>
<?php if ($facilitie['14']=='swimming_pool:no') {echo "unchecked";} else{echo "checked";} ?>



room_service
bar
sauna
fitness
garden
terrace
non_smoking_rooms
airport_shuttle
family_rooms
spa
hot_tub_Jacuzzi
air_conditioning
water_park
electric_vehicle_charging_station
swimming_pool



<?php if (!empty($row['name']&& $row['star_rating']&& $row['contact_name']&& $row['contact_phone']&& $row['contact_phone_2']&& $row['country']&& $row['city']&& $row['address']&& $row['zip_code']&& $row['email'])) { echo "complete"; }?>


#0071c2



	<table class="table">
		<tr>
			<td><a href="profile.php">Basic Info:</a>
			<td><a href="layout_pricing.php" >Layout & Pricing</a></td>
			<td><a href="facitdties.php">Facitdties & Services</a></td>
			<td><a href="amenities.php">Amenities</a></td>
			<td><a href="photos.php">Photos</a></td>
			<td><a href="potdcies.php">Potdcies</a></td>
			<td><a href="payment.php">Payment</a></td>
			<td><a href="agreement.php">Agreement</a></td>
		</tr>
	</table>






	//Hover animated Button

	<style>
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>




<button class="button" style="vertical-align:middle"><span>Hover </span></button>















$ch_f_s = "SELECT * FROM f_s WHERE hotel_id = $hotel_id";



$f_s_query = mysqli_query($conn, $f_s);




$f_s_row = mysqli_fetch_array($f_s);








$room_types = $_POST('room_type');
		$room_names = $_POST('room_name');

		$sql = "INSERT INTO rooms_options(rooms_types, rooms_names) VALUES ('$room_types','$room_names')";
		$query = mysqli_query($conn, $sql);
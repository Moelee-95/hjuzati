<div style="display: none;">
	

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
include('../../db/db_connect.php'); 

		
if (isset($_POST["submit"])) {
	
	$cancel_free_days_prior = $_POST["cancel_free_days_prior"];
	$cancel_guest_payment = $_POST["cancel_guest_payment"];
	$checkin_start_preset = $_POST["checkin_start_preset"];
	$checkin_end_preset = $_POST["checkin_end_preset"];
	$checkout_start_preset =$_POST["checkout_start_preset"];
	$checkout_end_preset = $_POST["checkout_end_preset"];
	$children_allowed = $_POST["children_allowed"];
	$pets_allowed = $_POST["pets_allowed"];
	$pets_fee = $_POST["pets_fee"];

	//Multi dimentional array contains all the data
	$data = array (
	  array("1",$cancel_free_days_prior),
	  array("2",$cancel_guest_payment),
	  array("4",$checkin_start_preset),
	  array("5",$checkin_end_preset),
	  array("6",$checkout_start_preset),
	  array("7",$checkout_end_preset),
	  array("8",$children_allowed),
	  array("9",$pets_allowed),
	  array("10",$pets_fee),);	

	//iterate through all policies and insert/update them to the database
	foreach ($data as $key => $values) {
		$policies = "INSERT INTO hotels_has_policies (hotels_hHotelID, policiesoptions, policiesvalues_pID) VALUES('$hotel_id', '$values[0]', '$values[1]') ON DUPLICATE KEY UPDATE policiesvalues_pID=$values[1];";
		$query = mysqli_query($conn,$policies);
	if ($query) {
		//echo "submitted"."</br>";
		header('location:payment.php');
	}
	else{echo "something went wrong";}
	}
//colse statment

//close connection

}

function get_policies($policy_id){
	include('../../db/db_connect.php'); 
	$policy = "SELECT pID,pOptionEn FROM policiesvalues WHERE pPoliciesID = '$policy_id'";
	$p_query = mysqli_query($conn, $policy);
	$p_result = mysqli_fetch_all($p_query,MYSQLI_ASSOC);
return $p_result;
}

function get_selected_policies($hotel_id, $policy_id){
	include('../../db/db_connect.php'); 
	$query = "SELECT policiesvalues_pID, pOptionEn FROM hima.hotels_has_policies hp join policiesvalues pv on hp.policiesvalues_pID = pv.pID where hotels_hHotelID = '$hotel_id' and policiesoptions= '$policy_id' ";
	$p_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$p_result = mysqli_fetch_row($p_query);

	return $p_result;
}





/* Fetching the stored data from the database to the user interface */

$sql = "SELECT * FROM policies WHERE hotel_id ='$hotel_id'";
		$query_sql = mysqli_query($conn, $sql);
		$fetch = mysqli_fetch_array($query_sql);
		//echo $fetch["check_in_from"];
		//print_r($fetch);
 ?>
 </div>
<!DOCTYPE html>
<html>
<?php include('header.php'); ?>
<?php include('nav.php'); ?>
<script type="text/javascript">
	function _(el){
		return document.getElementById(el);
	}
	function ch_msg(){
		var days = _("cancel_free_days_prior").value;
		//alert(days);
		if(days == "day_of_arrival"){
			var msg ="The guest must cancel by 18:00 on the day of arrival or pay 100%";
		}
		else if (days=="1 day") {
			var msg ="The guest must cancel 1 day in advance or pay 100% ";
		}
		else if (days=="2 days") {
			var msg ="The guest must cancel 2 day in advance or pay 100% ";
		}
		else if (days=="3 days") {
			var msg ="The guest must cancel 3 day in advance or pay 100% ";
		}
		else if (days=="7 days") {
			var msg ="The guest must cancel 7 day in advance or pay 100% ";
		}
		else if (days=="14 days") {
			var msg ="The guest must cancel 14 day in advance or pay 100% ";
		}

		_("cancel_msg").innerHTML = msg +" "+_("cancel_guest_payment").value+".";
	}


</script>

<div class="container" style="">
	<div name="result test">
		<?php
			$selected_4 = get_selected_policies($hotel_id,4);
			echo $selected_4[1];
		 ?>
	</div>
	<div class="title">
		<legend style="font-weight:bold">Policies</legend>
		<legend class="small">Specify some basic policies. Do you allow children or pets? How flexible are you with cancellations?</legend>
	</div>
	
	<div class="contents">
		<legend class="">Cancellations</legend>
		
		<form action="policies.php" method="post" class="">
		<div class="row">
			<div class="column">
				<div class="form-group col-lg-6 col-md-9 col-sm-12 col-xs-12">
					<legend style="font-size: 15px">How many days in advance can guests cancel free of charge?</legend>

					<select onchange="ch_msg()" id="cancel_free_days_prior" name="cancel_free_days_prior" class="form-control text" style="">
						<?php
						// get cancel_free_days_prior policy values
						$policies_1 = get_policies('1');
						//get selected option
						$selected_1 = get_selected_policies($hotel_id,1);
						echo  "<option selected hidden value='". $selected_1[0]."'>".$selected_1[1] ."</option>" ;
						//iterate through 
						foreach ($policies_1 as $op => $key) {
							$id = $key['pID']; 
							$text = $key['pOptionEn'];

							// echo '<option selected value='+ $option[0] + '>'+$option[1]+'</option>'
							echo  "<option value='". $id."'>".$text ."</option>" ;

						}
						?>
					</select>
					
				</div>
			</div>
			<div class="column">
				<div class="form-group col-lg-6 col-md-9 col-sm-12 col-xs-12">
					<legend style="font-size: 15px">or guests will pay 100%</legend>
					<select id="cancel_guest_payment" name="cancel_guest_payment" class="form-control text" style="" onchange="ch_msg()">
						
							<?php
						// get cancel_free_days_prior policy values

						$policies_2 = get_policies('2');

						//get selected option
						$selected_2 = get_selected_policies($hotel_id,2);
						echo  "<option selected hidden value='". $selected_2[0]."'>".$selected_2[1] ."</option>" ;

						// print_r($policy1fetch);
						foreach ($policies_2 as $op => $key) {
							$id = $key['pID']; 
							$text = $key['pOptionEn'];

							// echo '<option selected value='+ $option[0] + '>'+$option[1]+'</option>'
							echo  "<option value='". $id."'>".$text ."</option>" ;

						}
						?>

					</select>
				</div>
			</div>
		</div>		
		<div class="row">
			<div id="cancellation_message" class="">
		        <div class="alert alert-info">
		            <i class="glyphicon glyphicon-bell" style="float: left; margin-right: 5px;"></i>
		            <p id="cancel_msg">The guest must cancel 14 days in advance or pay 100% of the price for the first night.</p>
		            <p class="help-block"> Please note: You'll be able to make changes to your policies later on. This is just to get you started.  </p>
		        </div>
		    </div>
		</div>	
	</div>
<!-- 	<div class="contents">
		<fieldset class="">
		    <div class="row">
		        <div class="col-md-10 col-sm-9 col-xs-8">
		            <legend>Protect against accidental bookings</legend>
		        </div>
		        <div class="col-md-2 col-sm-3 col-xs-4">
		        	<label class="control control-checkbox col-lg-5 col-md-5 col-sm-5 col-sm-12 hover_blue" style="font-size: 18px;;border-radius: 4px;margin-left:10px;width: 90px">
						<div style="margin-left:15px">
							
			            <p style="font-size: 12pt;margin-top: 10px" id="yes_no">
			            	<?php
							 if (!empty($fetch[3]) && $fetch[3] == "1") { ?>
							 	<?php echo "Yes" ?>
							 <?php }
							 else{
							 	echo "No";
							 } ?>

			            </p>
						</div>
						<input
						 <?php
							 if (!empty($fetch[3]) && $fetch[3] == "1") { ?>
							 	<?php echo "checked" ?>

							
							<?php } ?>
						  type="checkbox" name="protect_against_accidental_bookings" value="yes" 
			            	onclick="if (this.checked) {
			            	document.getElementById('yes_no').innerHTML = 'Yes';
			            	document.getElementById('yes_no').style.color = '#4CAF50';

			            	}

			            	else{
			            			document.getElementById('yes_no').innerHTML = 'No';
			            			document.getElementById('yes_no').style.color = '#e91e63';
			            	}">

		     		   <div class="control_indicator" style="margin-top: 10px;margin-left: 5px;"></div>
		     		   
	  				</label>


		        </div>
		    </div>
		    <div class="row">
		        <div class="col-md-12 col-xs-12 grace-period-policy">
		            <p class="help-block">To save you time handling accidental bookings, we automatically waive cancellation fees for guests that cancel within the first 24 hours of a booking being made. You can change this period of time later in your property management platform.</p>
		        </div>
		    </div>
		</fieldset>
	</div> -->
	<div class="contents">
		<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" style="border: 1px solid black;padding: 10px;display: inline-block;margin:5px">
			<legend style="position: relative;padding: 10px">Check-in</legend>
        	<label>from:</label>
                    <div class="">
                    	 <?php
						// get cancel_free_days_prior policy values
						$policies_4 = get_policies('4');
						foreach ($policies_4 as $op => $key) {
							$id = $key['pID'];
							$text = $key['pOptionEn'];

							//get selected option
							$selected_4 = get_selected_policies($hotel_id,4);
							if ($text == $selected_4[1]) {
								$check_4 = "checked";
							}else{
								$check_4 = "";
							}

							echo "<div class='btn-group' data-toggle=''>
                            <label class='btn btn-default'>
                                <input type='radio' ". $check_4 ." name='checkin_start_preset' value='". $id ."'>
                                ". $text."
	                            </label>
	                        </div>";
						}


						?>
                    </div>
        			<label>to:</label>
                    <div class="">
                    	 <?php
						// get cancel_free_days_prior policy values

						$policies_5 = get_policies('5');
						foreach ($policies_5 as $op => $key) {
							$id = $key['pID']; 
							$text = $key['pOptionEn'];

							//get selected option
							$selected_5 = get_selected_policies($hotel_id,5);
							if ($text == $selected_5[1]) {
								$check_5 = "checked";
							}else{
								$check_5 = "";
							}

							echo "<div class='btn-group' data-toggle=''>
                            <label class='btn btn-default'>
                                <input type='radio' ". $check_5 ." name='checkin_end_preset' value='". $id ."'>
                                ". $text."
	                            </label>
	                        </div>";
						}
						?>
                    </div>
		</div>
        
        <div class=" col-lg-5 col-md-5 col-sm-12 col-xs-12" style="border: 1px solid black;padding: 10px;display: inline-block;margin:5px;"> 
			 <legend style="position: relative;padding: 10px">Check-out</legend>
           
                        <label>from (optional):</label>
                        <div class="">
	                    	 <?php
							// get cancel_free_days_prior policy values
							$policies_6 = get_policies('6');
							foreach ($policies_6 as $op => $key) {
								$id = $key['pID']; 
								$text = $key['pOptionEn'];
								//get selected option
								$selected_6 = get_selected_policies($hotel_id,6);
								if ($text == $selected_6[1]) {
									$check_6 = "checked";
								}else{
									$check_6 = "";
								}
								echo "<div class='btn-group' data-toggle=''>
	                            <label class='btn btn-default'>
	                                <input type='radio' ". $check_6." name='checkout_start_preset' value='". $id ."'>
	                                ". $text."
		                            </label>
		                        </div>";
							}
							?>
                   		 </div>
                    
            	
                        <label>to:</label>
                        <div class="">
	                    	 <?php
							// get cancel_free_days_prior policy values
							$policies_7 = get_policies('7');
							foreach ($policies_7 as $op => $key) {
								$id = $key['pID']; 
								$text = $key['pOptionEn'];
								//get selected option
								$selected_7 = get_selected_policies($hotel_id,7);
								if ($text == $selected_7[1]) {
									$check_7 = "checked";
								}else{
									$check_7 = "";
								}
								echo "<div class='btn-group' data-toggle=''>
	                            <label class='btn btn-default'>
	                                <input type='radio' ". $check_7." name='checkout_end_preset' value='". $id ."'>
	                                ". $text."
		                            </label>
		                        </div>";
							}
							?>
                   		 </div>
            </div>
        
	
	</div>

	<div class="contents">
		<fieldset id="children_section">
                <legend>Children</legend>
                <div class="row">
                    <div class="form-group col-lg-12">
                            <label>Can you accommodate children? (You can specify the ages and prices later)</label>


						<div class="radio-block" id="children_allowed">
							<?php
								// get cancel_free_days_prior policy values
								$policies_8 = get_policies('8');
								foreach ($policies_8 as $op => $key) {
									$id = $key['pID']; 
									$text = $key['pOptionEn'];

									//get selected option
									$selected_8 = get_selected_policies($hotel_id,8);
									if ($text == $selected_8[1]) {
										$check_8 = "checked";
									}else{
										$check_8 = "";
									}

						    echo " <div class='btn-group' data-toggle=''>
						        <label class='btn btn-default'>
						            <input type='radio' ". $check_8." name='children_allowed' value='". $id."'>
						            <span>".$text."</span>
						        </label>
						    </div>
						    	";
						   		 }
						    ?>
						</div>






                    </div>
                </div>
            </fieldset>
	</div>
	<div class="contents">
		<fieldset id="pets_section" class="active">
    <legend>Pets</legend>
    <div class="row">
        <div class="describe-block">
            <p class="describe-text">Some guests like to travel with their furry friends. Indicate if you allow pets and if any charges apply.</p>
        </div>
    </div>

    <div id="policies_section">
        <div class="form-group row" id="pets">

            <div class="col-lg-4 col-md-4 col-sm-6">
                <label class="" for="pets_allowed">Do you allow pets?</label>
					<select id="pets_allowed" name="pets_allowed" class="form-control " style="" onchange="
					if (this.value=='yes' ||this.value=='upon_request' ) {document.getElementById('additional_charges').style.display = 'block'}
						else{document.getElementById('additional_charges').style.display = 'none'}
						">
						<?php if (!empty($fetch[9])) { ?>
							<option hidden selected value="<?php echo $fetch[9]; ?>"><?php echo $fetch[9]; ?></option>
						<?php } ?>
					    <?php
						// get cancel_free_days_prior policy values

						$policy9 = "SELECT pID,pOptionEn FROM policiesvalues WHERE pPoliciesID = 9";
						$policy9query = mysqli_query($conn, $policy9);
						$policy9results = mysqli_fetch_all($policy9query,MYSQLI_ASSOC);
						// print_r($policy1fetch);
						foreach ($policy9results as $op => $key) {
							$id = $key['pID']; 
							$text = $key['pOptionEn'];

							// echo '<option selected value='+ $option[0] + '>'+$option[1]+'</option>'
							echo  "<option value='". $id."'>".$text ."</option>" ;

						}
						?>
					</select>
					<span class="help-block"></span>




            </div>
            <div style="display:
            <?php 
	            if (!empty($fetch[9])){
	            	if ($fetch[9] == "yes" || $fetch[9] == "upon_request") {
	            		echo "block";
	            	}
	            	else{echo "none";}
	            } 
	        ?>" id="additional_charges" class="col-lg-4 col-md-4 col-sm-6 pet_cost_question">
                <label class="" for="pets_fee">Are there additional charges for pets?</label>
					<select id="pets_fee" name="pets_fee" class="form-control " style="">
						<?php
						// get cancel_free_days_prior policy values

						$policies_10 = get_policies('10');
						//get selected option
						$selected_10 = get_selected_policies($hotel_id,10);
						echo  "<option selected hidden value='". $selected_10[0]."'>".$selected_10[1] ."</option>" ;
						// print_r($policy1fetch);
						foreach ($policies_10 as $op => $key) {
							$id = $key['pID']; 
							$text = $key['pOptionEn'];

							// echo '<option selected value='+ $option[0] + '>'+$option[1]+'</option>'
							echo  "<option value='". $id."'>".$text ."</option>" ;

						}
						?>
					</select>
					<span class="help-block"></span>




            </div>
        </div>
    </div>
</fieldset>
	</div>
		<div class="contents" style="background-color:#efefef;border:none;">
			<button type="submit" name="submit" class="btn button" style="width: 100%">Contenue</button>
		</div>
	</form>
</div>












<script type="text/javascript" src="bootstrap/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<?php include('html/footer.html'); ?>
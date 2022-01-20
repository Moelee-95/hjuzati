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


//execuiting querys return 1 when successful 0 when something is wrong
function execute_query($query){
	include('../../db/db_connect.php'); 
	$result = mysqli_query($conn, $query);
	if ($query) {
		$status = '1';			
	}
	else{
		$status = '0';			
	}
	return $status;
}

//retrun checked when the hotel payment method have been selected and stored in the db
function check($hotel_id, $payment_id){
	include('../../db/db_connect.php'); 
	$result = "";
	$qu = "select * from hotels_has_payments where hotels_hHotelID = '$hotel_id' and payments_pID ='$payment_id';";
	$ex = mysqli_query($conn, $qu);
	$re = mysqli_fetch_row($ex);
	if ($re == null) {
		$result = "";
	}
	else{
		$result = "checked";
	}
	return $result;
}



if (isset($_POST["submit"])) {
		$result = "";

		if (!empty($_POST["1"])) {
			// $asia_hawala = $_POST["1"];
			 $result .= execute_query("INSERT INTO `hotels_has_payments` (`payments_pID`, `hotels_hHotelID`) VALUES ('1', '$hotel_id') ON DUPLICATE KEY UPDATE payments_pID='1';");

		}
		else{
			// $asia_hawala = 0;
			$result .= execute_query("DELETE FROM hotels_has_payments where hotels_hHotelID = '$hotel_id' and payments_pID = '1';");
		}
		
		if (!empty($_POST["2"])) {
			// $asia_hawala = $_POST["1"];
			 $result .= execute_query("INSERT INTO `hotels_has_payments` (`payments_pID`, `hotels_hHotelID`) VALUES ('2', '$hotel_id') ON DUPLICATE KEY UPDATE payments_pID='2';");
		}
		else{
			// $asia_hawala = 0;
			$result .= execute_query("DELETE FROM hotels_has_payments where hotels_hHotelID = '$hotel_id' and payments_pID = '2';");
		}
		if (!empty($_POST["3"])) {
			// $asia_hawala = $_POST["1"];
			 $result .= execute_query("INSERT INTO `hotels_has_payments` (`payments_pID`, `hotels_hHotelID`) VALUES ('3', '$hotel_id') ON DUPLICATE KEY UPDATE payments_pID='3';");
		}
		else{
			// $asia_hawala = 0;
			$result .= execute_query("DELETE FROM hotels_has_payments where hotels_hHotelID = '$hotel_id' and payments_pID = '3';");
		}


		if ($result = "111") {
			header('location:agreement.php');
		}
		else{
			echo "Some of the queries have not been executied successfuly!";
		}

	}


	//Gettig front end data from the database
	$local = "SELECT *  FROM payments;";
	$localQuery = mysqli_query($conn, $local);
	$localFetch = mysqli_fetch_all($localQuery, MYSQLI_ASSOC);






 ?>
 </div>

<!DOCTYPE html>
<html>
<?php include('header.php'); ?>
<?php include('nav.php'); ?>

<div class="container" style="background-color:none">
	<div class="title">
		<legend class="big" style="font-weight:bold">Payments</legend>
		<legend class="small">Specify the types of payment you accept, tax details and other options like additional charges.</legend>
		<legend style="font-size:14pt;font-weight: 400">Guest payment options</legend>
	</div>
	<div class=" contents alert alert-warning hover_blue row" style="">
        <span class="side-help-block_title">How do you want to get paid?</span>
        <p>We have all the methods that you think of in order to make it more easy!</p>
    </div>
	<div class="" style="margin:0">
		
		<form action="payment.php" method="post">
		<!-- Start of the first contents for Credit Card -->
		<div class="contents d-inline" style="display: none;">
		<div class="" style="margin:0" style="margin:0">
			<h4>Credit Card</h4>
			<legend style="font-size: 11pt">Can you charge credit cards at the property?</legend>
			<label class="radio_container" style="width:90px">
				<p style="position: relative;top:5px;left: -2px">Yes</p>
		  <input 
		  <?php if ($fetch["charge_credit_cards"] == '1') {echo "checked";} ?>
		   value="1" 
		  onclick="if(this.checked){
			document.getElementById('creditcard_section').style.display = 'block';
			}"
			 type="radio"  type="radio" name="charge_credit_cards" id="check_yes">
		  <span class="radio_checkmark"></span>
		</label>
		<label class="radio_container" style="width:90px"><p style="position: relative;top:5px;left: -2px">No</p>
		  <input <?php if ($fetch["charge_credit_cards"] == '0') {echo "checked";} ?> value="0" onclick="if(this.checked){
			document.getElementById('creditcard_section').style.display = 'none';
			}" type="radio" name="charge_credit_cards" id="check_no">
		  <span class="radio_checkmark"></span>
		</label>
		</div>
		<div class="" style="margin:0" id="creditcard_section" 
		<?php if ($fetch["charge_credit_cards"] == '1') {
			echo "";
		}
		else{
			echo "hidden";
		} ?>>

		<!-- Online Cards -->
			<div class="col-xs-12">
				
				<label class="control control-checkbox col-lg-5 col-md-5 col-sm-5 col-sm-12 hover_blue" style="font-size: 18px;;border-radius: 4px;margin-left:10px;">
					<div style="margin-left:15px">
						<img src="img/credit_cards/american-express.png" style="width: 65px;height:40px;" />
		            	
		            	<b style="font-size: 12pt;">American Express</b>
					</div>
					<input <?php if ($fetch["american_express"] == '1') {echo "checked";} ?> type="checkbox" name="american_express" value="1" 
		            	onclick="">
	     		   <div class="control_indicator" style="margin-top: 10px;margin-left: 5px;"></div>	   
	  			</label>
			
				<label class="control control-checkbox col-lg-5 col-md-5 col-sm-5 col-sm-12 hover_blue"  style="font-size: 18px;margin-top:6px;margin-left:10px;margin-left:10px">
					<div style="margin-left:15px">
					<img src="img/credit_cards/euro-mastercard.png" style="width: 65px;height:40px;margin-top: 0px" />
					   <b style="font-size: 12pt">Euro/Mastercard</b>
					</div>
	            	<input <?php if ($fetch["euro_mastercard"] == '1') {echo "checked";} ?> type="checkbox" name="euro_mastercard" value="1" 
	            	onclick="">
	     		   <div class="control_indicator" style="margin-top: 10px;margin-left: 5px"></div>
	  			</label>
				
	  			<label class="control control-checkbox col-lg-5 col-md-5 col-sm-5 col-sm-12 hover_blue"  style="font-size: 18px;margin-top:6px;margin-left:10px;margin-left:10px">
	  				<div style="margin-left:15px">
	  					<img src="img/credit_cards/jcb.png" style="width: 65px;height:40px;margin-top: 0px" />
	  					<b style="font-size: 12pt">JCB</b>
	  				</div>
	            	<input <?php if ($fetch["jcb"] == '1') {echo "checked";} ?> type="checkbox" name="jcb" value="1" 
	            	onclick="">
	            	 <div class="control_indicator" style="margin-top: 10px;margin-left: 5px"></div>
	  			</label>

	  			<label class="control control-checkbox col-lg-5 col-md-5 col-sm-5 col-sm-12 hover_blue"  style="font-size: 18px;margin-top:6px;margin-left:10px;margin-left:10px">
	  				<div style="margin-left:15px">
	  					<img src="img/credit_cards/discover.png" style="width: 65px;height:40px;margin-top: 0px" />
	  					  <b style="font-size: 12pt">Discover</b>
	  				</div>
	            	<input <?php if ($fetch["discover"] == '1') {echo "checked";} ?> type="checkbox" name="discover" value="1" 
	            	onclick="">
	     		   <div class="control_indicator" style="margin-top: 10px;margin-left: 5px"></div>
	  			</label>

	  			<label class="control control-checkbox col-lg-5 col-md-5 col-sm-5 col-sm-12 hover_blue"  style="font-size: 18px;margin-top:6px;margin-left:10px;margin-left:10px">
	  				<div style="margin-left:15px">
	  					<img src="img/credit_cards/union-pay.png" style="width: 65px;height:40px;margin-top: 0px" />
	  					 <b style="font-size: 12pt">UnionPay credit card</b>
	  				</div>
	            	<input <?php if ($fetch["union_pay_credit"] == '1') {echo "checked";} ?> type="checkbox" name="union_pay_credit" value="1" 
	            	onclick="">
	     		   <div class="control_indicator" style="margin-top: 10px;margin-left: 5px"></div>
	  			</label>

	  			<label class="control control-checkbox col-lg-5 col-md-5 col-sm-5 col-sm-12 hover_blue"  style="font-size: 18px;margin-top:6px;margin-left:10px;margin-left:10px">
	  				<div style="margin-left:15px">
	  					<img src="img/credit_cards/visa.png" style="width: 65px;height:40px;margin-top: 0px" />
	  					<b style="font-size: 12pt">Visa</b>
	  				</div>
	            	<input <?php if ($fetch["visa"] == '1') {echo "checked";} ?> type="checkbox" name="visa" value="1" 
	            	onclick="">
	     		   <div class="control_indicator" style="margin-top: 10px;margin-left: 5px"></div>
	  			</label>

	  			<label class="control control-checkbox col-lg-5 col-md-5 col-sm-5 col-sm-12 hover_blue"  style="font-size: 18px;margin-top:6px;margin-left:10px;margin-left:10px">
	  				<div style="margin-left:15px">
	  					<img src="img/credit_cards/diners.png" style="width: 65px;height:40px;margin-top: 0px" />
	  					  <b style="font-size: 12pt">Diners Club</b>
	  				</div>
	            	<input <?php if ($fetch["diners_club"] == '1') {echo "checked";} ?> type="checkbox" name="diners_club" value="1" 
	            	onclick="">
	     		   <div class="control_indicator" style="margin-top: 10px;margin-left: 5px"></div>
	  			</label>

	  			<label class="control control-checkbox col-lg-5 col-md-5 col-sm-5 col-sm-12 hover_blue"  style="font-size: 18px;margin-top:6px;margin-left:10px;margin-left:10px">
	  				<div style="margin-left:15px">
	  					<img src="img/credit_cards/maestro.png" style="width: 65px;height:40px;margin-top: 0px" />
	  					<b style="font-size: 12pt">Maestro</b>
	  				</div>
	            	<input <?php if ($fetch["maestro"] == '1') {echo "checked";} ?> type="checkbox" name="maestro" value="1" 
	            	onclick="">
	     		   <div class="control_indicator" style="margin-top: 10px;margin-left: 5px"></div>
	  			</label>

	  			<label class="control control-checkbox col-lg-5 col-md-5 col-sm-5 col-sm-12 hover_blue"  style="font-size: 18px;margin-top:6px;margin-left:10px;margin-left:10px">
	  				<div style="margin-left:15px">
	  					<img src="img/credit_cards/union-pay-dbt.png" style="width: 65px;height:40px;margin-top: 0px" />
	  					<b style="font-size: 12pt">UnionPay debit card</b>
	  				</div>
	            	<input <?php if ($fetch["unionPay_debit"] == '1') {echo "checked";} ?> type="checkbox" name="unionPay_debit" value="1" 
	            	onclick="">
	     		   <div class="control_indicator" style="margin-top: 10px;margin-left: 5px"></div>  
	  			</label>
	  			
			</div>
		</div>
	
	</div><!-- End of the first contents for Credit Card -->


			<!-- Start of the first contents for Credit Card -->
		<div class="contents d-inline">
		<div class="" style="margin:0" style="margin:0">
			<h4>Payment Systems in Iraq </h4>
			<legend style="font-size: 11pt">Choses Supported Payment methods in iraq</legend>
			<!-- <label class="radio_container" style="width:90px">
				<p style="position: relative;top:5px;left: -2px">Yes</p>
				<input <?php if ($fetch["iraq_payment"] == '1') {echo "checked";} ?> value="1" 
			  onclick="if(this.checked){
				document.getElementById('payment_services_section').style.display = 'block';
				}"
				 type="radio"  type="radio" name="iraq_payment" id="check_yes">
				<span class="radio_checkmark"></span>
			</label>
			<label class="radio_container" style="width:90px"><p style="position: relative;top:5px;left: -2px">No</p>
			  <input <?php if ($fetch["iraq_payment"] == '0') {echo "checked";} ?> value="0" onclick="if(this.checked){
				document.getElementById('payment_services_section').style.display = 'none';
				}" type="radio" name="iraq_payment" id="check_no">
			  <span class="radio_checkmark"></span>
			</label> -->
		</div>
		<div class="" style="margin:0" id="payment_services_section" 
		<?php 
		// if ($fetch["iraq_payment"] == '1') {
		// 	echo "";
		// }
		// else{
		// 	echo "hidden";
		// } 
		?> >


			<!-- Local Cards -->
			<div class="col-xs-12">
				
				
				<?php
					//Getting options from the database
					foreach ($localFetch as $key => $options) {
					$id = $options['pID'];
					$name = $options['pName'];
					$picpath = $options['pPath'];
					
					//check the box get the data from the database
					$check = check($hotel_id, $id);
						
					echo "<label class='control control-checkbox col-lg-5 col-md-5 col-sm-5 col-sm-12 hover_blue' style='font-size: 18px;;border-radius: 4px;margin-left:10px;'>
						<div style='margin-left:15px'>
							<img src='". $picpath."' style='width: 65px;height:40px;' />
			            	<b style='font-size: 12pt;'>".$name."</b>
						</div>
						<input type='checkbox' ". $check."  name='".$id."' value='1' 
			            	onclick=''>
		     		   <div class='control_indicator' style='margin-top: 10px;margin-left: 5px;'></div> 
		  			</label>";
		  			}
				?>
		
				<!-- <label class="control control-checkbox col-lg-5 col-md-5 col-sm-5 col-sm-12 hover_blue"  style="font-size: 18px;margin-top:6px;margin-left:10px;margin-left:10px">
					<div style="margin-left:15px">
					<img src="img/credit_cards/asia-hawala-en.png" style="width: 65px;height:40px;margin-top: 0px" />
					   <b style="font-size: 12pt">Asia Hawala</b>
				</div>
	            	<input <?php if ($fetch["asia_hawala"] == '1') {echo "checked";} ?> type="checkbox" name="asia_hawala" value="1" 
	            	onclick="">
	     		   <div class="control_indicator" style="margin-top: 10px;margin-left: 5px"></div>
	     		
	  			</label>
				
	  			
	  			 -->


	  			
			</div>
		</div>
	
	</div><!-- End of the first contents for Credit Card -->

	</div>
	

<!--     <div class="contents" style="">
    	<legend class="big" style="font-weight:600;">Commission payments<b style="font-weight: 200;font-size: 13pt" class="pull-right">At</b></legend>
    	<label class="big" style="font-weight:300 ">the beginning of each month we will send you an invoice for all complete bookings in the previous month.</label>

    	<div class="form-group" style="margin-top: 10px;margin-left: 10px">
    		<div class="row" style="margin:0">
    			<label style="font-weight:500">What name should be placed on the invoice (e.g. legal/company name)?</label>
    		</div>
    		<div class="row" style="margin:0">
    			<select id="invoice_recipient" name="invoice_recipient" class="form-control text col-lg-5" style="" data-hj-masked="" onchange="if (this.value =='company_name_create') {
    				document.getElementById('company_name_create').style.display = 'block';}
    				else{
    					document.getElementById('company_name_create').style.display = 'none';
    				}">
    				<?php
    				if ($fetch["invoice_recipient"] == "property_name") {
    					?> <option hidden value="property_name">Hotel</option><?php
    				}
    				else if ($fetch["invoice_recipient"] == "company_name_create") {
    					?><option hidden value="company_name_create">Legal company name (please specify)</option><?php
    				}


    				 ?>


			    <option value="property_name">Hotel</option>
			    <option value="company_name_create">Legal company name (please specify)</option>
			</select>
    		</div>
    	</div>
    	<div class="form-group" style="margin-left: 10px" id="company_name_create" 
    	<?php if ($fetch["invoice_recipient"] == 'company_name_create') {
			echo "";
		}
		else{
			echo "hidden";
		} ?>
		>
    		<div class="row" style="margin:0">
    			<label style="font-weight:500">Legal company name</label>
    		</div>
    		<div class="row" style="margin:0">
    			<input type="text" class ="text form-control" name="legal_company_name" value="
    			<?php if (!empty($fetch["legal_company_name"])) {
					echo $fetch["legal_company_name"];
				}
				 ?>

    			" placeholder="eg. Faruq Group">
    		</div>
    		 
    	</div>
    	
    </div> -->

    <div class="contents" style="background-color: #efefef;border: none">
    	    <button style="" type="submit" name="submit" value="submit" class="btn button ">Continue</button>
    </div>
</form>

</div>












<script type="text/javascript" src="bootstrap/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<?php include('html/footer.html'); ?>
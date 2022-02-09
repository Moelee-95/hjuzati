<?php require 'sections/main.php';?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	 <meta name="author" content="Hjuzati by.Mohammed S. Hazim" />
	<title>Hjuzati Hotels | Calendar</title>
	<!-- icons -->
	<link href="assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />

	<!--bootstrap -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- JQuery temp disabiling
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	-->
	

	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="assets/plugins/material/material.min.css">
	<link rel="stylesheet" href="assets/css/material_style.css">
	<!-- animation -->
	<link href="assets/css/pages/animate_page.css" rel="stylesheet">
	<!-- Template Styles -->
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/theme-color.css" rel="stylesheet" type="text/css" />
	<!-- favicon -->
	<link rel="shortcut icon" href="assets/img/favicon.ico" />
	<!-- Toggle Button Css -->
	<link href="assets/css/toggle_button.css" rel="stylesheet" type="text/css" />



	<!-- Link to Multi Select style from jquey -->
	<link rel="stylesheet" type="text/css" href="../../../bootstrap/multi_select_js/chosen.min.css">
	

	<!-- Always updated Jquery -->
	<script src="../../../bootstrap/jquery.min.js"></script>
	



	<style type="text/css">
		.no-border {
			outline: none;
		    border: 0;
		    box-shadow: none;
		    margin-left: 4px;
		    text-align:center;
		    font-size: 11pt;
		    width:60%;
		 }
		    /* remove Arrows Chrome, Safari, Edge, Opera */
			input::-webkit-outer-spin-button,
			input::-webkit-inner-spin-button {
			  -webkit-appearance: none;
			  margin: 0;
			}

			/* remove Arrows  Firefox */
			input[type=number] {
			  -moz-appearance: textfield;
			}
			.dollar{

				opacity: 0.5;
				font-size:10pt;
			}
			.form-group{
				padding-left: 10px;
			}
			.custom-checkbox{
				padding-left: 30px;
			}
			/* make checkboxes bigger */
			.custom-control-label::before, 
			.custom-control-label::after {
			    top: .2rem;
			    width: 1.40rem;
			    height: 1.40rem;
			}
			.panel-heading{
				padding: 2px 5px;
				background-color: #f9f9f9;
				cursor: pointer;
			}
			.panel-group{
				padding-top: 15px;
			}
			/* Icon when the collapsible content is shown 
			.icon:after {
			font-family: "Glyphicons Halflings";
			content: "\e114";
			float: right;
			margin-left: 15px;
			margin-top: -18px;
			}
			*/
			/* Icon when the collapsible content is hidden 
			.icon.collapsed:after {
			content: "\e080";
			}
			*/
			/* Add the blur effect when other element selected 
			.class:hover ~ .class{
			  filter: blur(2px);
			  -webkit-filter: blur(2px);
			}
			*/
			.icon-arrow-down:hover{
				color: #64a2ff;
				font-size: 14pt;
			}

			/* These codes to change the style of multy selection elements */
			.chosen-container{
				min-width: 100% !important;

			}

			#set_rs_type {
				padding: 10px
			}
			table tr th:hover{
				background-color: #f6f9fd;
			}
			


	</style>

	<!-- for the new callender from bootstrap -->
	<script src="assets/js/calendar/gijgo.min.js" type="text/javascript"></script>
    <link href="assets/css/calendar/gijgo.min.css" rel="stylesheet" type="text/css" />

</head>
<!-- END HEAD -->

<body
	class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
	<div class="page-wrapper">
		<!-- start header -->
<?php include('sections/header.php'); ?>
		<!-- end header -->
		<!-- Making data ready for inputs -->
<?php
	$get_rooms = "SELECT * FROM rooms WHERE rHotelID = '$hotel_id'";
	$queries = mysqli_query($conn, $get_rooms);
	$fetch_all = mysqli_fetch_all($queries, MYSQLI_ASSOC);

	//Function for getting the number of room
	function get_room_num($room_id){
		include('../../../db_connect.php');
		$get_rooms = "SELECT rRoomsNumbers FROM rooms WHERE rRoomID = '$room_id'";
		$queries = mysqli_query($conn, $get_rooms);
		$fetchRow = mysqli_fetch_row($queries);
		return $fetchRow;
	}

?>
		<!-- Button trigger modal -->
		

		<!-- single bulk edit select room Modal -->
		<div style="z-index:100000;background-color: #0000008c;" class="modal fade" id="select_room_type" tabindex="0" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Set Room Type</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <div class="row col-10">
		        	
		        	<select class="form-control" name="set_room_name" id="set_r_type" >
						<?php
							foreach($fetch_all as $fetch_one){
							?>
							<option value="<?php echo $fetch_one['rRoomID']; ?>">
								<?php
									if (!empty($fetch_one['rCustomName'])) {
									echo $fetch_one['rCustomName'];}
									else{
										echo $fetch_one['rRoomNameID'];
									} ?></option>
							</div>
							
							<?php
						}
						?>
					</select>
		        </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		        <button type="button" id="set_single_room" class="btn btn-success" onclick="set_room();">Set Room</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- end single bulk edit select rooms -->
		<!-- Mulatiple bulk edit select rooms Modal -->
		<div style="z-index:100000;background-color: #0000008c;" class="modal fade" id="select_multiple_rooms" tabindex="0" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Set Room Type</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-error">
		      	<div class="alert alert-danger" id="select_multiple_rooms_alert" style="display: none">
		      		<strong>Please select at least one room</strong>
		      	</div>
		      </div>
		      <div class="modal-body">
		        <div class="row col-10">
		        	<label>Select rooms:</label><br>
					<select multiple class="" name="set_rs_type" id="set_rs_type" >
						<?php 
							foreach($fetch_all as $fetch_one){
							?>
							<option value="<?php echo $fetch_one['rRoomID']; ?>">
								<?php
									if (!empty($fetch_one['rCustomName'])) {
									echo $fetch_one['rCustomName'];}
									else{
										echo $fetch_one['rRoomNameID'];
									} ?></option>
							</div>
							
							<?php
						}
						?>
					</select>
					<script type="text/javascript">
				        $(document).ready(function() {
				            $("#set_rs_type").chosen();
				        });
				    </script>
				   
		        </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		        <button type="button" id="set_single_room" class="btn btn-success" onclick="set_m_rooms();">Set Room</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- Mulatiple bulk edit select rooms Modal  -->
				<!-- Bulk Edit Modal -->
		<div class="modal fade " id="showDate" tabindex="0" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		    <div class="modal-content" style="padding: 10px">
		      <div class="modal-header"	style="padding-top: 1px">
		        <h3 class="modal-title" id="exampleModalLongTitle">Bulk Edit</h3>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">	
		      	<div class="row" style="padding-left: 20px;padding-right:150px">
		      		<div class="col" style="">
		      			<label>From:</label>
		      			<input onchange="if(this.value != ''){_('fromDateAlert').style.display ='none'}else{_('fromDateAlert').style.display ='block'}" name="fromDate" id="fromDate" value="<?php //echo date('m/d/Y');?>" width="250" placeholder="Eg: 4/18/2020" />
					    <script>
					        $('#fromDate').datepicker({
					            uiLibrary: 'bootstrap4'
					        });
					    </script>
					    <strong onclick="_('fromDate').focus();" id="fromDateAlert" style="color:#dc3545;padding-left: 5px;display: none">Please Select From Date</strong>
		      		</div>
		      		<div class="col" style="">
		      			<label>Up to and including:</label>
		      			<label>From:</label>
		      			<input onchange="if(this.value != ''){
		      			_('toDateAlert').style.display ='none'}else{_('toDateAlert').style.display ='block'}" name="toDate" id="toDate" value="" width="250"  placeholder="Eg: 5/18/2020" />
					    <script>
					        $('#toDate').datepicker({
					            uiLibrary: 'bootstrap4'
					        });
					    </script>
					    <strong onclick="_('toDate').focus();" id="toDateAlert" style="color:#dc3545;padding-left: 5px;display: none;">Please Select From Date</strong>
		      		</div>
		      	</div>
		      	<br>
		      	<label style="padding-left: 20px">Witch days of week you want to apply changes for?</label>
		      	<br>
		      	<div class="row" style="padding-left: 30px;padding-top: 10px">
		      		<div class="custom-control custom-checkbox">
						<input checked="checked" type="checkbox" class="custom-control-input" id="sun" value="sun">

						<label class="custom-control-label" for="sun" title="Sunday">&nbsp;Sun</label>
					</div>
		      		<div class="custom-control custom-checkbox">
						<input checked="checked" type="checkbox" class="custom-control-input" id="mon" value="mon">

						<label class="custom-control-label" for="mon" title="Monday">&nbsp;Mon</label>
					</div>
					<div class="custom-control custom-checkbox">
						<input checked="checked" type="checkbox" class="custom-control-input" id="tue" value="tue">
						<label class="custom-control-label" for="tue" title="Tuesday">&nbsp;Tue</label>
					</div>
					<div class="custom-control custom-checkbox">
						<input checked="checked" type="checkbox" class="custom-control-input" id="wed" value="wed">
						<label class="custom-control-label" for="wed" title="Wednesday">&nbsp;Wed</label>
					</div>
					<div class="custom-control custom-checkbox">
						<input checked="checked" type="checkbox" class="custom-control-input" id="thu" value="thu">
						<label class="custom-control-label" for="thu" id="Thursday">&nbsp;Thu</label>
					</div>
					<div class="custom-control custom-checkbox">
						<input checked="checked" type="checkbox" class="custom-control-input" id="fri" value="fri">
						<label class="custom-control-label" for="fri" title="Friday">&nbsp;Fri</label>
					</div>
					<div class="custom-control custom-checkbox">
						<input checked="checked" type="checkbox" class="custom-control-input" id="sat">
						<label class="custom-control-label" for="sat" title="Satrday">&nbsp;Sat</label>
					</div>
				</div>
				<div class="row" style="padding-left: 30px;padding-top: 10px">
					<strong onclick="_('sun').focus();" id="daysAlert" style="color:#dc3545;padding-left: 5px;display: none;">Plaese pick at least one day</strong>
				</div>
				<!-- Start Menues -->
				<div style="padding-top: 40px">
					<div class="borderBox light">
						<div class="tabbable-line">

							<ul class="nav nav-tabs">
								<li class="nav-item row" id="single_list">
									<input type="hidden" id="single_id" name="single_id" value="" onchange="">
									<a id="showeRName" style="padding-right: 50px" href="#borderBox_tab3" data-toggle="tab" class="active">Choose Room 	
									</a>
									<a onclick="_('showeRName').click();" class="" data-toggle="modal" data-target="#select_room_type" style="margin-left: -45px;border:1px "><span style="padding-top: 8px;margin-left: -4px;font-weight: bold" aria-hidden="true" class="icon-arrow-down"></span></a>
								</li>
								<li class="nav-item row" onclick="_('single_list').style.border = 'none';">
									<input type="hidden" id="multi_roms_vlas" value="">
									<a id="multiple_rooms" href="#borderBox_tab2"  style="padding-right: 50px"data-toggle="tab" class=""> Multiple rooms types </a>
									<a onclick="_('multiple_rooms').click();" class="" data-toggle="modal" data-target="#select_multiple_rooms" style="margin-left: -45px;border:1px "><span style="padding-top: 8px;margin-left: -4px;font-weight: bold" aria-hidden="true" class="icon-plus"></span></a>
								</li>
							</ul>
						</div>
						<div class="borderBox-body">
							<div class="tab-content">
								<div class="tab-pane" id="borderBox_tab2">
									
									<!-- Begain the collapse menues for rooms -->
									<div class="panel-group" id="accordion">
										<div class="row" id="div_in" style="padding: 12px;">
											<div style='width: 100%;cursor:pointer;background-color: #dee8eaa8;' data-toggle='modal' data-target='#select_multiple_rooms'>
												<h4 id="div_in_empty" style='color:#555;padding-left:43%;padding-right: 35%;'>Add Rooms <a style=';'>
												<span style='padding-top: 8px;margin-left:4px;font-weight: bold'aria-hidden='true' class='icon-plus'>
												</span></a></h4>
											</div>

										</div>
									    <div class="panel panel-default">
									      <div class="icon panel-heading collapsed" id="tm1" data-toggle="collapse" data-parent="#accordion" href="#collapsem1">
									      	<div class="row">
									      		<div class="col col-11" style="padding-left: 30px">
									      			<h4 style="margin-top: 3px;margin-bottom: 0px;" class="panel-title">Rooms to sell</h4>
									        		<span style="font-size: 9pt">Update the number of rooms to sell for this room type</span>
										      	</div>
										      	<div class="col col-1">
										      		<span id="tgm1" style="padding: 25px" aria-hidden="true" class="icon-arrow-down pull-right"></span>
										      	</div>
									      	</div>
									      </div>
									      <div id="collapsem1" class="panel-collapse collapse">
									        <div class="panel-body">
									        	<div class="form-group container">
									        		<label class="row" for="roomsNumbersMulti">Number of available rooms:
									        		</label>
									        		<div class="row">
									        			<div class="col-2">
											        		<input id="roomsNumbersMulti" name ="roomsNumbersMulti"class="form-control col-8" type="number">
											      		</div>
											      		<div class="col-3">
										        			<button onclick="bulk_multi('rNum')" id="setMultiRoomsNumbers" class="btn btn-primary">Save Changes</button>
												        	
												      	</div>
												      	
									        		</div>
									        	</div>
									        	<div class="row">
									        		<strong onclick="_('roomsNumbersMulti').focus();" id="roomsNumbersMultiAlert" style="color:#dc3545;padding-left: 5px;display: none">Invalid Input</strong>
									        	</div>
									        	<div id="multi_num_success" class="row" style="padding-left: 25px;display:none">
												      		<span class="alert alert-success">Rooms are succesfully updated</span>
												      		
											    </div>
									        </div>
									      </div>
									    </div>
									    <div class="panel panel-default">
									      <div id="tm2" class="icon panel-heading collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsem2">
									      	<div class="row">
									      		<div class="col col-11" style="padding-left: 30px">
									        		<h4 style="margin-top: 3px;margin-bottom: 0px;" class="panel-title">Prices</h4>
									        		<span style="font-size: 9pt">Edit the prices for any rate plans for this type</span>
									        	</div>
									        	<div class="col col-1">
										      		<span id="tgm2" style="padding: 25px" aria-hidden="true" class="icon-arrow-down pull-right"></span>
										      	</div>
									      	</div>
									      </div>
									      <div id="collapsem2" class="panel-collapse collapse">
									        <div class="panel-body">
									        	<div class="form-group row">
									        		<label class="col-12" for="roomsPrices">Price for:<br>
														<select class="" id="set_rates_multi" >
															<option value="sRate">Standerd Rate</option>
															<option value="bRate">Breakfast Rate </option>
														</select>
														<script type="text/javascript">
													        $(document).ready(function() {
													            $("#set_rates_multi").chosen();
													        });
													    </script>
													</label>
													<div class="row">
														<div class="col col-lg-4 col-md-3 col-sm-3">
										        			<div class="input-group">
										        				<span style="background-color: #f5f5f5;padding:5px;font-size:9pt;border: 1px solid #e7e7e7;" class="input-group-addon"><i style="color:#2fbe50" class="fa fa-dollar"></i></span>
										        				<input id="roomsPricesMulti" class="form-control" type="number" name="roomsPricesMulti">
										        			</div>
												      	</div>
												      	<div class="col col-3">
										        			<button id="setMultiRoomsPrices" class="btn btn-primary" onclick="bulk_multi(_('set_rates_multi').value)">Save Changes</button>
												      	</div>
													</div>
										        		
										        		
									        	</div>
									        	<div class="row">
									        		<strong onclick="_('roomsPricesMulti').focus();" id="roomsPricesMultiAlert" style="color:#dc3545;padding-left: 5px;display: none">Invalid Price</strong>
									        	</div>
									        	<div id="multi_price_success" class="row" style="padding-left: 25px;display: none;">
											  		<span class="alert alert-success">Prices are succesfully updated</span>
												</div>
									        </div>
									      </div>
									    </div>
									    <div class="panel panel-info">
									      <div id="tm3" class="icon panel-heading collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsem3">
									      	<div class="row">
									      		<div class="col col-11" style="padding-left: 30px">
									        		<h4 style="margin-top: 3px;margin-bottom: 0px;" class="panel-title">Room Status</h4>
									        		<span style="font-size: 9pt">Open or Close this room</span>
									        	</div>
									        	<div class="col col-1">
										      		<span id="tgm3" style="padding: 25px" aria-hidden="true" class="icon-arrow-down pull-right"></span>
										      	</div>
									      	</div>
									      </div>
									      <div id="collapsem3" class="panel-collapse collapse">
									        <div class="panel-body">
									        	<div class="row">
									        		<div class="col col-7" style="padding-left:23px">
									        			<label style="padding-top:8px">
									        				<span id="close_multiple">Close</span>
									        				/
									        				<span id="open_multiple">Open</span>:
									        			</label>
									        			<div class="row" style="padding:8px;padding-left: 25px">
									        				<input name="close_open_multi" class="toggle_input2" type="checkbox" id="close_open_multi">
									        				<label style="margin-top: 3px" class="toggle_label2" for="close_open_multi"  ></label>
									        				<div class="col" style="padding-left:50px">
											        			<button id="setMultiOpenClose" class="btn btn-primary" onclick="bulk_multi('open_close')">Save Changes</button>
													      	</div>
									        			</div>
									        		</div>
									        	</div>
									        	<div id="multi_Open_close_success" class="row" style="padding-left: 25px;display: none;">
										  			<span class="alert alert-success">States are updated succesfully</span>
												</div>
									        </div>
									      </div>
									    </div>
									  </div>
									<!-- End the collapse menues for multiple rooms -->
								</div>
								<!-- Begain collapse menue for single room -->
								<div class="tab-pane active" id="borderBox_tab3">
									<!-- begain -->
									<div class="panel-group" id="accordion">
									    <div class="panel panel-default">
									      <div class="icon panel-heading collapsed" id="t1" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
									      	<div class="row">
									      		<div class="col col-11" style="padding-left: 30px">
									      			<h4 style="margin-top: 3px;margin-bottom: 0px;" class="panel-title">Room to sell</h4>
									        		<span style="font-size: 9pt">Update the number of rooms to sell for this room type</span>
										      	</div>
										      	<div class="col col-1">
										      		<span id="tg1" style="padding: 25px" aria-hidden="true" class="icon-arrow-down pull-right"></span>
										      	</div>
									      	</div>
									      </div>
									      <div id="collapse1" class="panel-collapse collapse">
									        <div class="panel-body">
									        	<div class="form-group row">
									        		<label class="col-12" for="roomsNumbersSingle">Number of available rooms:</label>
									        		<div class="col col-2">
											        	<input id="roomsNumbersSingle" name="roomsNumbersSingle" class="form-control col-12" type="number">
											    
											      	</div>
									        		<div class="col col-1">
									        			<button onclick="bulk_single('rNum')" id="setSingleRoomsNum" class="btn btn-primary">Save Changes</button>
											        	
											      	</div>
									        	</div>
									        	<div class="row">
									        		<strong onclick="_('roomsNumbersSingle').focus();" id="sRoomsNumbersAlert" style="color:#dc3545;padding-left: 29px;display: none">Invalid Input!</strong>
									        	</div>
									        	<div id="single_num_success" class="row" style="padding-left: 25px;display: none">
												      		<span class="alert alert-success">Rooms are succesfully updated</span>
												      		
											    </div>
									        </div>
									      </div>
									    </div>
									    <div class="panel panel-default">
									      <div id="t2" class="icon panel-heading collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
									      	<div class="row">
									      		<div class="col col-11" style="padding-left: 30px">
									        		<h4 style="margin-top: 3px;margin-bottom: 0px;" class="panel-title">Prices</h4>
									        		<span style="font-size: 9pt">Edit the prices for any rate plans for this type</span>
									        	</div>
									        	<div class="col col-1">
										      		<span id="tg2" style="padding: 25px" aria-hidden="true" class="icon-arrow-down pull-right"></span>
										      	</div>
									      	</div>
									      </div>
									      <div id="collapse2" class="panel-collapse collapse">
									        <div class="panel-body">
									        	<div class="form-group row">
									        		<label class="col-12" for="roomsPrices">Price for:<br>
														<select class="" name="set_rates" id="set_rates" >
															<option value="sRate">Standerd Rate </option>
															<option value="bRate">Breakfast Rate </option>
														</select>
														<script type="text/javascript">
													        $(document).ready(function() {
													            $("#set_rates").chosen();
													        });
													    </script>
													</label>
									        		<div class="col col-lg-2 col-md-3 col-sm-3">
									        			<div class="input-group">
									        				<span style="background-color: #f5f5f5;padding:5px;font-size:9pt;border: 1px solid #e7e7e7;" class="input-group-addon"><i style="color:#2fbe50" class="fa fa-dollar"></i></span>
									        				<input id="sgl_rooms_prices" class="form-control col-12" type="number" name="roomsNumbers">
									        			</div>
											        	
											    
											      	</div>
									        		<div class="col col-1">
									        			<button id="setRoomsPrices" class="btn btn-primary" onclick="bulk_single(_('set_rates').value)">Save Changes</button>
											        	
											      	</div>
									        	</div>
									        	<div class="row">
									        		<strong onclick="_('sgl_rooms_prices').focus();" id="sRoomsPriceAlert" style="color:#dc3545;padding-left: 29px;display: none">Invalid Input!</strong>
									        	</div>
									        	<div id="single_price_success" class="row" style="padding-left: 25px;display: none">
												      		<span class="alert alert-success">Room Prices is succesfully updated</span>
												      		
											    </div>

									        </div>
									      </div>
									    </div>
									    <div class="panel panel-info">
									      <div id="t3" class="icon panel-heading collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
									      	<div class="row">
									      		<div class="col col-11" style="padding-left: 30px">
									        		<h4 style="margin-top: 3px;margin-bottom: 0px;" class="panel-title">Room Status</h4>
									        		<span style="font-size: 9pt">Open or Close this room</span>
									        	</div>
									        	<div class="col col-1">
										      		<span id="tg3" style="padding: 25px" aria-hidden="true" class="icon-arrow-down pull-right"></span>
										      	</div>
									      	</div>
									      </div>
									      <div id="collapse3" class="panel-collapse collapse">
									        <div class="panel-body">
									        	<div class="row">
									        		<div class="col col-7" style="padding-left:23px">
									        			<label style="padding-top:8px">Close/Open:</label>
									        			<div class="row" style="padding:8px;padding-left: 25px">
									        				<input class="toggle_input2" type="checkbox" id="open_close_single">
									        				<label style="margin-top: 3px" class="toggle_label2" for="open_close_single"></label>
									        				<div class="col col-1" style="padding-left:50px">
											        			<button id="setRoomState" class="btn btn-primary" onclick="bulk_single('open_close');">Save Changes</button>
													        	
													      	</div>
									        			</div>
									        		</div>
									        		<div class="col col-5">
									        			
									        		</div>
									        	</div>
									        	<div id="single_open_close_success" class="row" style="padding-left: 25px;display: none">
													<span class="alert alert-success">States are succesfully updated</span>
											    </div>
									        	<div class="row">
									        		<span style="padding-left: 10px; font-size:13px" >Select if you want to close or open 
									        			<span id="showeRName2" style="font-weight: bold">
									        			</span>
									        			 for
									        			 <span style="font-weight: bold">1-may-2020</span>
									        			 <span style="">Untill</span>
									        			 <span style="font-weight: bold">5-may-2020</span>
									        		</span>
									        	</div>
									        	
									        </div>
									      </div>
									    </div>
									  </div>
									<!-- End -->
									
								</div>
								<!-- End Collapse menue for single room -->
							</div>
						</div>
					</div>

				</div>
				<!-- End Menues -->
		        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- End Modal -->
		<!-- start page container -->
		<div class="page-container" >
			<!-- start sidebar menu -->
			<?php include('sections/sidebar-container.php');?>
			<!-- end sidebar menu -->
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<ol class="breadcrumb page-breadcrumb pull-left">
								<li><i class="fad fa-home"></i>&nbsp;<a class="parent-item"
										href="../../index.php">Hjuzati</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Rates & Availability</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Calendar</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="" >
							<div class="card-box" >
								<div class="card-head">
									<header>Rooms Rate</header>
								</div>
								
								<div class="" style="">
									<div class="card-box" style="margin-right: 0px;margin-left: 5px;padding:10px;padding-top:15px;">
										<div class="row">
											<?php 
											if (empty($fetch_all)) {
												echo "<h4 style='margin-left:10px;'>You don't have any rooms, Please Insert rooms first!</h4><br>";
												echo "<h4 style='margin-left:10px;' >To insert rooms please click <a href='add_room.php' style='color:red'>Here</a></h4> ";
												exit();
											}
											?>
										<!-- This script is to prevent users to escape the modal -->
										<script type="text/javascript">
											$('#ModalIDHere').modal({backdrop: 'static', keyboard: false})
										</script>

										<div class="d-flex flex-row-reverse">
											<!-- Set starting date column -->
											<div class="col order-3">
												<div class=""><label>From Date</label></div>
												<div class="">
													<input name="startDate" id="startDate" value="<?php echo date('m/d/Y');?>" width="220" />
													<script>
														$('#startDate').datepicker({
															uiLibrary: 'bootstrap4'
														});
													</script>
												</div>
											</div>
											<!-- Set room column -->
											<div class="col order-2">
												<div class="row"><label>Room Type:</label></div>
												<div class="row">
													<select class="form-control" name="set_room_name" id="set_room_name">
														<?php
															foreach($fetch_all as $fetch_one){
															?>
															<option value="<?php echo $fetch_one['rRoomID']; ?>">
																<?php
																	if (!empty($fetch_one['rCustomName'])) {
																	echo $fetch_one['rCustomName'];}
																	else{
																		echo $fetch_one['rRoomNameID'];
																	} ?></option>
															</div>
														<?php } ?>
													</select>
												</div>
											</div>
											<!-- Set Button -->
											<div class="col order-1 d-flex align-items-end">
												<button class="btn btn-primary" onclick="convert_set()">Set Period</button>
											</div>
										</div>	
									</div>
									<input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $hotel_id ?>">
									<input type="hidden" name="room_id" id="room_id" value="" placeholder="Room ID">
									<input type="hidden" name="room_name" id="room_name" value="" placeholder="Room name">
									
								</div> 

								<div class="" style="padding: 10px;">
									<div class="table-scrollable">
									<table class="table table-bordered" style="border-top: none;background-color:white">
									  <thead>
									  	<span style="padding: 10px;font-size: 18pt;font-weight: bold" id="room_name_lb" name="room_name_lb" class=""></span>
									  	<button id="bulk_edi" name="bulk_edit" class="btn blue-bgcolor btn-outline btn-lg m-b-10 pull-right" data-toggle="modal" data-target="#showDate">Bulk Edit</button>
									  	<tr style="border:none">
									  		<td style="border:none" class="" scope="col"></td>
										  	<td style="border:none" class="mth" id="1m" scope="col"></td>
										    <td style="border:none" class="mth" id="2m" scope="col"></td>
										    <td style="border:none" class="mth" id="3m" scope="col"></td>
										    <td style="border:none" class="mth" id="4m" scope="col"></td>
										    <td style="border:none" class="mth" id="5m" scope="col"></td>
										    <td style="border:none" class="mth" id="6m" scope="col"></td>
										    <td style="border:none" class="mth" id="7m" scope="col"></td>
										    <td style="border:none" class="mth" id="8m" scope="col"></td>
										    <td style="border:none" class="mth" id="9m" scope="col"></td>
										    <td style="border:none" class="mth" id="10m" scope="col"></td>
										    <td style="border:none" class="mth" id="11m" scope="col"></td>
										    <td style="border:none" class="mth" id="12m" scope="col"></td>
										    <td style="border:none" class="mth" id="13m" scope="col"></td>
										    <td style="border:none" class="mth" id="14m" scope="col"></td>
										    <td style="border:none" class="mth" id="15m" scope="col"></td>
										    <td style="border:none" class="mth" id="16m" scope="col"></td>
										    <td style="border:none" class="mth" id="17m" scope="col"></td>
										    <td style="border:none" class="mth" id="18m" scope="col"></td>
										    <td style="border:none" class="mth" id="19m" scope="col"></td>
										 </tr>
									    <tr>
									    	<td style="width: 110px;font-size: 10pt" scope="col">Date</td>
									    	<td class="" id="1" scope="col"></td>
											<td class="" id="2" scope="col"></td>
											<td class="" id="3" scope="col"></td>
											<td class="" id="4" scope="col"></td>
											<td class="" id="5" scope="col"></td>
											<td class="" id="6" scope="col"></td>
											<td class="" id="7" scope="col"></td>
											<td class="" id="8" scope="col"></td>
											<td class="" id="9" scope="col"></td>
											<td class="" id="10" scope="col"></td>
											<td class="" id="11" scope="col"></td>
											<td class="" id="12" scope="col"></td>
											<td class="" id="13" scope="col"></td>
											<td class="" id="14" scope="col"></td>
											<td class="" id="15" scope="col"></td>
											<td class="" id="16" scope="col"></td>
											<td class="" id="17" scope="col"></td>
											<td class="" id="18" scope="col"></td>
											<td class="" id="19" scope="col"></td>
											
									    </tr>
									  </thead>
									  <tbody>
									  	<tr>
											<th style="width: 100px;font-size: 10pt" >Room status</th>
											<td id="1state"> </td>
											<td id="2state"> </td>
											<td id="3state"> </td>
											<td id="4state"> </td>
											<td id="5state"> </td>
											<td id="6state"> </td>
											<td id="7state"> </td>
											<td id="8state"> </td>
											<td id="9state"> </td>
											<td id="10state"> </td>
											<td id="11state"> </td>
											<td id="12state"> </td>
											<td id="13state"> </td>
											<td id="14state"> </td>
											<td id="15state"> </td>
											<td id="16state"> </td>
											<td id="17state"> </td>
											<td id="18state"> </td>
											<td id="19state"> </td>
									    </tr>
									    <tr>
											<th style="width: 100px;font-size: 10pt;padding-top:2px;padding-bottom: 2px">Open/Close:</th>
											<th id="1opnclsh" class="for_hover">
												<input class="editable no-border toggle_input2" type="checkbox" id="1opncls" name="" >
												<label class="toggle_label2 toggler" for="1opncls" style="display: none;"></label>
												<div  id="1o_c_state" class="o_c_state">
													
												</div>
											</th>
											<th id="2opnclsh" class="for_hover">
												<input class="editable no-border toggle_input2" type="checkbox" id="2opncls" name="" >
												<label  class="toggle_label2 toggler" for="2opncls" style="display: none;"></label>
												<div  id="2o_c_state" class="o_c_state">
													
												</div>
											</th>
											<th id="3opnclsh" class="for_hover" scope="row">
												<input class="editable no-border toggle_input2" type="checkbox" id="3opncls" name="" >
												<label  class="toggle_label2 toggler" for="3opncls" style="display: none;"></label>
												<div  id="3o_c_state" class="o_c_state">
													
												</div>
											</th>
											<th id="4opnclsh" class="for_hover" scope="row">
												<input class="editable no-border toggle_input2" type="checkbox" id="4opncls" name="" >
												<label  class="toggle_label2 toggler" for="4opncls" style="display: none;"></label>
												<div  id="4o_c_state" class="o_c_state">
													
												</div>
											</th>
											<th id="5opnclsh" class="for_hover" scope="row">
												<input class="editable no-border toggle_input2" type="checkbox" id="5opncls" name="" >
												<label  class="toggle_label2 toggler" for="5opncls" style="display: none;"></label>
												<div  id="5o_c_state" class="o_c_state">
													
												</div>
											</th>
											<th id="6opnclsh" class="for_hover" scope="row">
												<input class="editable no-border toggle_input2" type="checkbox" id="6opncls" name="" >
												<label  class="toggle_label2 toggler" for="6opncls" style="display: none;"></label>
												<div  id="6o_c_state" class="o_c_state">
													
												</div>
											</th>
											<th id="7opnclsh" class="for_hover" scope="row">
												<input class="editable no-border toggle_input2" type="checkbox" id="7opncls" name="" >
												<label  class="toggle_label2 toggler" for="7opncls" style="display: none;"></label>
												<div  id="7o_c_state" class="o_c_state">
													
												</div>
											</th>
											<th id="8opnclsh" class="for_hover" scope="row">
												<input class="editable no-border toggle_input2" type="checkbox" id="8opncls" name="" >
												<label  class="toggle_label2 toggler" for="8opncls" style="display: none;"></label>
												<div  id="8o_c_state" class="o_c_state">
													
												</div>
											</th>
											<th id="9opnclsh" class="for_hover" scope="row">
												<input class="editable no-border toggle_input2" type="checkbox" id="9opncls" name="" >
												<label  class="toggle_label2 toggler" for="9opncls" style="display: none;"></label>
												<div  id="9o_c_state" class="o_c_state">
													
												</div>
											</th>
											<th id="10opnclsh" class="for_hover" scope="row">
												<input class="editable no-border toggle_input2" type="checkbox" id="10opncls" name="" >
												<label  class="toggle_label2 toggler" for="10opncls" style="display: none;"></label>
												<div  id="10o_c_state" class="o_c_state">
													
												</div>
											</th>
											<th id="11opnclsh" class="for_hover" scope="row">
												<input class="editable no-border toggle_input2" type="checkbox" id="11opncls" name="" >
												<label  class="toggle_label2 toggler" for="11opncls" style="display: none;"></label>
												<div  id="11o_c_state" class="o_c_state">
													
												</div>
											</th>
											<th id="12opnclsh" class="for_hover" scope="row">
												<input class="editable no-border toggle_input2" type="checkbox" id="12opncls" name="" >
												<label  class="toggle_label2 toggler" for="12opncls" style="display: none;"></label>
												<div  id="12o_c_state" class="o_c_state">
													
												</div>
											</th>
											<th id="13opnclsh" class="for_hover" scope="row">
												<input class="editable no-border toggle_input2" type="checkbox" id="13opncls" name="" >
												<label  class="toggle_label2 toggler" for="13opncls" style="display: none;"></label>
												<div  id="13o_c_state" class="o_c_state">
													
												</div>
											</th>
											<th id="14opnclsh" class="for_hover" scope="row">
												<input class="editable no-border toggle_input2" type="checkbox" id="14opncls" name="" >
												<label  class="toggle_label2 toggler" for="14opncls" style="display: none;"></label>
												<div  id="14o_c_state" class="o_c_state">
													
												</div>
											</th>
											<th id="15opnclsh" class="for_hover" scope="row">
												<input class="editable no-border toggle_input2" type="checkbox" id="15opncls" name="" >
												<label  class="toggle_label2 toggler" for="15opncls" style="display: none;"></label>
												<div  id="15o_c_state" class="o_c_state">
													
												</div>
											</th>
											<th id="16opnclsh" class="for_hover" scope="row">
												<input class="editable no-border toggle_input2" type="checkbox" id="16opncls" name="" >
												<label  class="toggle_label2 toggler" for="16opncls" style="display: none;"></label>
												<div  id="16o_c_state" class="o_c_state">
													
												</div>
											</th>
											<th id="17opnclsh" class="for_hover" scope="row">
												<input class="editable no-border toggle_input2" type="checkbox" id="17opncls" name="" >
												<label  class="toggle_label2 toggler" for="17opncls" style="display: none;"></label>
												<div  id="17o_c_state" class="o_c_state">
													
												</div>
											</th>
											<th id="18opnclsh" class="for_hover" scope="row">
												<input class="editable no-border toggle_input2" type="checkbox" id="18opncls" name="" >
												<label  class="toggle_label2 toggler" for="18opncls" style="display: none;"></label>
												<div  id="18o_c_state" class="o_c_state">
													
												</div>
											</th>
											<th id="19opnclsh" class="for_hover" scope="row">
												<input class="editable no-border toggle_input2" type="checkbox" id="19opncls" name="" >
												<label  class="toggle_label2 toggler" for="19opncls" style="display: none;"></label>
												<div id="19o_c_state" class="o_c_state">
													
												</div>
											</th>
									    </tr>
									    <tr>
											<th style="width: 100px;font-size: 10pt" ><b>Rooms to sell</b><br><span>Out of/ <?php echo(get_room_num($fetch_one['rRoomID'])[0]) ; ?></span></th>
											<th id="1rh" ><input class="editable no-border" type="number" id="1r" name="" ></th>
											<th id="2rh"><input class="editable no-border" type="number" id="2r" name="" ></th>
											<th id="3rh" scope="row"><input class="editable no-border" type="number" id="3r" name="" ></th>
											<th id="4rh" scope="row"><input class="editable no-border" type="number" id="4r" name="" ></th>
											<th id="5rh" scope="row"><input class="editable no-border" type="number" id="5r" name="" ></th>
											<th id="6rh" scope="row"><input class="editable no-border" type="number" id="6r" name="" ></th>
											<th id="7rh" scope="row"><input class="editable no-border" type="number" id="7r" name="" ></th>
											<th id="8rh" scope="row"><input class="editable no-border" type="number" id="8r" name="" ></th>
											<th id="9rh" scope="row"><input class="editable no-border" type="number" id="9r" name="" ></th>
											<th id="10rh" scope="row"><input class="editable no-border" type="number" id="10r" name="" ></th>
											<th id="11rh" scope="row"><input class="editable no-border" type="number" id="11r" name="" ></th>
											<th id="12rh" scope="row"><input class="editable no-border" type="number" id="12r" name="" ></th>
											<th id="13rh" scope="row"><input class="editable no-border" type="number" id="13r" name="" ></th>
											<th id="14rh" scope="row"><input class="editable no-border" type="number" id="14r" name="" ></th>
											<th id="15rh" scope="row"><input class="editable no-border" type="number" id="15r" name="" ></th>
											<th id="16rh" scope="row"><input class="editable no-border" type="number" id="16r" name="" ></th>
											<th id="17rh" scope="row"><input class="editable no-border" type="number" id="17r" name="" ></th>
											<th id="18rh" scope="row"><input class="editable no-border" type="number" id="18r" name="" ></th>
											<th id="19rh" scope="row"><input class="editable no-border" type="number" id="19r" name="" ></th>
											
									    </tr>
									    <tr>
									    	<th style="width: 100px;font-size: 10pt" >Standerd rate<br><span id="psNumbers" class=""></span><!-- <a style="padding-left: 4px" href="#someLink">Edit</a> --></th>
											<th id="1sh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="1sRate" name="" ></th>
											<th id="2sh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="2sRate" name="" ></th>
											<th id="3sh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="3sRate" name="" ></th>
											<th id="4sh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="4sRate" name="" ></th>
											<th id="5sh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="5sRate" name="" ></th>
											<th id="6sh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="6sRate" name="" ></th>
											<th id="7sh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="7sRate" name="" ></th>
											<th id="8sh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="8sRate" name="" ></th>
											<th id="9sh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="9sRate" name="" ></th>
											<th id="10sh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="10sRate" name="" ></th>
											<th id="11sh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="11sRate" name="" ></th>
											<th id="12sh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="12sRate" name="" ></th>
											<th id="13sh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="13sRate" name="" ></th>
											<th id="14sh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="14sRate" name="" ></th>
											<th id="15sh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="15sRate" name="" ></th>
											<th id="16sh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="16sRate" name="" ></th>
											<th id="17sh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="17sRate" name="" ></th>
											<th id="18sh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="18sRate" name="" ></th>
											<th id="19sh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="19sRate" name="" ></th>
									    </tr>
									    <?php //disable breakfast rate temperory

									     ?>
									    <tr hidden="hidden">
											<th style="width: 100px;font-size: 10pt"  scope="row">Breakfast rate<br><span id="psNumbers2" class=""></span><!-- <a style="padding-left: 4px" href="#someLink">Edit</a> --></th>

											<th id="1bh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="1bRate" name="" ></th>
											<th id="2bh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="2bRate" name="" ></th>
											<th id="3bh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="3bRate" name="" ></th>
											<th id="4bh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="4bRate" name="" ></th>
											<th id="5bh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="5bRate" name="" ></th>
											<th id="6bh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="6bRate" name="" ></th>
											<th id="7bh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="7bRate" name="" ></th>
											<th id="8bh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="8bRate" name="" ></th>
											<th id="9bh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="9bRate" name="" ></th>
											<th id="10bh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="10bRate" name="" ></th>
											<th id="11bh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="11bRate" name="" ></th>
											<th id="12bh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="12bRate" name="" ></th>
											<th id="13bh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="13bRate" name="" ></th>
											<th id="14bh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="14bRate" name="" ></th>
											<th id="15bh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="15bRate" name="" ></th>
											<th id="16bh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="16bRate" name="" ></th>
											<th id="17bh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="17bRate" name="" ></th>
											<th id="18bh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="18bRate" name="" ></th>
											<th id="19bh" scope="row"><span class="dollar">$</span><input class="editable no-border" type="number" id="19bRate" name="" ></th>
									    </tr>
									    
									  </tbody>
									</table>
									<a href="#decrease by 1 day" onclick="decrease_day()"  class="float-left btn btn-outline-primary" style="font-size: 20pt;" title="Go Back one day">
										<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
										  <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
										</svg> 
									</a>
									<a href="#increase 1 day" onclick="increase_day()"  class="float-right btn btn-outline-primary" style="font-size: 20pt;" title="Go Back one day">
										<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
										  <path fill-rule="evenodd" d="M4 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5A.5.5 0 0 0 4 8z"/>
										</svg>
									</a>
									</div><!-- end of div table scrolable -->
								</div>
	
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->
			<!-- start chat sidebar -->
			<div class="chat-sidebar-container" data-close-on-body-click="false">
				<div class="chat-sidebar">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a href="#quick_sidebar_tab_1" class="nav-link active tab-icon" data-toggle="tab">Theme
							</a>
						</li>
						<li class="nav-item">
							<a href="#quick_sidebar_tab_2" class="nav-link tab-icon" data-toggle="tab"> Chat
							</a>
						</li>
						<li class="nav-item">
							<a href="#quick_sidebar_tab_3" class="nav-link tab-icon" data-toggle="tab"> Settings
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane chat-sidebar-settings in show active animated shake" role="tabpanel"
							id="quick_sidebar_tab_1">
							<div class="slimscroll-style">
								<div class="theme-light-dark">
									<h6>Sidebar Theme</h6>
									<button type="button" data-theme="white"
										class="btn lightColor btn-outline btn-circle m-b-10 theme-button">Light
										Sidebar</button>
									<button type="button" data-theme="dark"
										class="btn dark btn-outline btn-circle m-b-10 theme-button">Dark
										Sidebar</button>
								</div>
								<div class="theme-light-dark">
									<h6>Sidebar Color</h6>
									<ul class="list-unstyled">
										<li class="complete">
											<div class="theme-color sidebar-theme">
												<a href="#" data-theme="white"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="dark"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="blue"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="indigo"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="cyan"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="green"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="red"><span class="head"></span><span
														class="cont"></span></a>
											</div>
										</li>
									</ul>
									<h6>Header Brand color</h6>
									<ul class="list-unstyled">
										<li class="theme-option">
											<div class="theme-color logo-theme">
												<a href="#" data-theme="logo-white"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="logo-dark"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="logo-blue"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="logo-indigo"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="logo-cyan"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="logo-green"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="logo-red"><span class="head"></span><span
														class="cont"></span></a>
											</div>
										</li>
									</ul>
									<h6>Header color</h6>
									<ul class="list-unstyled">
										<li class="theme-option">
											<div class="theme-color header-theme">
												<a href="#" data-theme="header-white"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="header-dark"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="header-blue"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="header-indigo"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="header-cyan"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="header-green"><span class="head"></span><span
														class="cont"></span></a>
												<a href="#" data-theme="header-red"><span class="head"></span><span
														class="cont"></span></a>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- Start Doctor Chat -->
						<div class="tab-pane chat-sidebar-chat animated slideInRight" id="quick_sidebar_tab_2">
							<div class="chat-sidebar-list">
								<div class="chat-sidebar-chat-users slimscroll-style" data-rail-color="#ddd"
									data-wrapper-class="chat-sidebar-list">
									<div class="chat-header">
										<h5 class="list-heading">Online</h5>
									</div>
									<ul class="media-list list-items">
										<li class="media"><img class="media-object" src="assets/img/user/user3.jpg"
												width="35" height="35" alt="...">
											<i class="online dot"></i>
											<div class="media-body">
												<h5 class="media-heading">John Deo</h5>
												<div class="media-heading-sub">Spine Surgeon</div>
											</div>
										</li>
										<li class="media">
											<div class="media-status">
												<span class="badge badge-success">5</span>
											</div> <img class="media-object" src="assets/img/user/user1.jpg" width="35"
												height="35" alt="...">
											<i class="busy dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Rajesh</h5>
												<div class="media-heading-sub">Director</div>
											</div>
										</li>
										<li class="media"><img class="media-object" src="assets/img/user/user5.jpg"
												width="35" height="35" alt="...">
											<i class="away dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Jacob Ryan</h5>
												<div class="media-heading-sub">Ortho Surgeon</div>
											</div>
										</li>
										<li class="media">
											<div class="media-status">
												<span class="badge badge-danger">8</span>
											</div> <img class="media-object" src="assets/img/user/user4.jpg" width="35"
												height="35" alt="...">
											<i class="online dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Kehn Anderson</h5>
												<div class="media-heading-sub">CEO</div>
											</div>
										</li>
										<li class="media"><img class="media-object" src="assets/img/user/user2.jpg"
												width="35" height="35" alt="...">
											<i class="busy dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Sarah Smith</h5>
												<div class="media-heading-sub">Anaesthetics</div>
											</div>
										</li>
										<li class="media"><img class="media-object" src="assets/img/user/user7.jpg"
												width="35" height="35" alt="...">
											<i class="online dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Vlad Cardella</h5>
												<div class="media-heading-sub">Cardiologist</div>
											</div>
										</li>
									</ul>
									<div class="chat-header">
										<h5 class="list-heading">Offline</h5>
									</div>
									<ul class="media-list list-items">
										<li class="media">
											<div class="media-status">
												<span class="badge badge-warning">4</span>
											</div> <img class="media-object" src="assets/img/user/user6.jpg" width="35"
												height="35" alt="...">
											<i class="offline dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Jennifer Maklen</h5>
												<div class="media-heading-sub">Nurse</div>
												<div class="media-heading-small">Last seen 01:20 AM</div>
											</div>
										</li>
										<li class="media"><img class="media-object" src="assets/img/user/user8.jpg"
												width="35" height="35" alt="...">
											<i class="offline dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Lina Smith</h5>
												<div class="media-heading-sub">Ortho Surgeon</div>
												<div class="media-heading-small">Last seen 11:14 PM</div>
											</div>
										</li>
										<li class="media">
											<div class="media-status">
												<span class="badge badge-success">9</span>
											</div> <img class="media-object" src="assets/img/user/user9.jpg" width="35"
												height="35" alt="...">
											<i class="offline dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Jeff Adam</h5>
												<div class="media-heading-sub">Compounder</div>
												<div class="media-heading-small">Last seen 3:31 PM</div>
											</div>
										</li>
										<li class="media"><img class="media-object" src="assets/img/user/user10.jpg"
												width="35" height="35" alt="...">
											<i class="offline dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Anjelina Cardella</h5>
												<div class="media-heading-sub">Physiotherapist</div>
												<div class="media-heading-small">Last seen 7:45 PM</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- End Doctor Chat -->
						<!-- Start Setting Panel -->
						<div class="tab-pane chat-sidebar-settings animated slideInUp" id="quick_sidebar_tab_3">
							<div class="chat-sidebar-settings-list slimscroll-style">
								<div class="chat-header">
									<h5 class="list-heading">Layout Settings</h5>
								</div>
								<div class="chatpane inner-content ">
									<div class="settings-list">
										<div class="setting-item">
											<div class="setting-text">Sidebar Position</div>
											<div class="setting-set">
												<select
													class="sidebar-pos-option form-control input-inline input-sm input-small ">
													<option value="left" selected="selected">Left</option>
													<option value="right">Right</option>
												</select>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Header</div>
											<div class="setting-set">
												<select
													class="page-header-option form-control input-inline input-sm input-small ">
													<option value="fixed" selected="selected">Fixed</option>
													<option value="default">Default</option>
												</select>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Sidebar Menu </div>
											<div class="setting-set">
												<select
													class="sidebar-menu-option form-control input-inline input-sm input-small ">
													<option value="accordion" selected="selected">Accordion</option>
													<option value="hover">Hover</option>
												</select>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Footer</div>
											<div class="setting-set">
												<select
													class="page-footer-option form-control input-inline input-sm input-small ">
													<option value="fixed">Fixed</option>
													<option value="default" selected="selected">Default</option>
												</select>
											</div>
										</div>
									</div>
									<div class="chat-header">
										<h5 class="list-heading">Account Settings</h5>
									</div>
									<div class="settings-list">
										<div class="setting-item">
											<div class="setting-text">Notifications</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-1">
														<input type="checkbox" id="switch-1" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Show Online</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-7">
														<input type="checkbox" id="switch-7" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Status</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-2">
														<input type="checkbox" id="switch-2" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">2 Steps Verification</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-3">
														<input type="checkbox" id="switch-3" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="chat-header">
										<h5 class="list-heading">General Settings</h5>
									</div>
									<div class="settings-list">
										<div class="setting-item">
											<div class="setting-text">Location</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-4">
														<input type="checkbox" id="switch-4" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Save Histry</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-5">
														<input type="checkbox" id="switch-5" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Auto Updates</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-6">
														<input type="checkbox" id="switch-6" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end chat sidebar -->
		</div>
		<!-- end page container -->
		<!-- start footer -->
<?php include('sections/footer.php'); ?>
		<!-- end footer -->
	</div>
	<!-- Calander js -->
	<script type="text/javascript">
	// Convert date from 4/9/2020 to 2020-09-04
	function convertDate(d){
		var array = d.split("/");
		var m = array[0];
		if (m.toString().length == 1) {
			m = 0+m;
		}
		var d = array[1];
		if (d.toString().length == 1) {
			d = 0+d;
		}
		var y = array[2];
		var date = y +"-"+ m +"-"+ d;
		return date;
	}
	// using shortcut _ instead of long codes get elelment by id
	function _(el){
		return document.getElementById(el);
	}

	//hide lock icon and show toggle for open/close room when hover

	$(".for_hover").hover(function(){
	    $(".o_c_state").css("display", "none");
	    $(".toggler").css("display", "block");
	    }, function(){
	    $(".o_c_state").css("display", "block");
	    $(".toggler").css("display", "none");
	  });

	// get the values from the database and print them into inputs
	function get_values(hotel_id,room_id,date,iName,iId){
		 $.post ('bookings_handler/get_rooms.php',
				{hotel_id: hotel_id,room_id:room_id,date:date,iName:iName}
				,function(output) {
		        //alert("Requisted value is:"+output);
		        //alert("  "+hotel_id+"  "+room_id+"  "+date+"  "+iName+"  "+iId+ "  "+output)
		        if (iName == "opncls") {
		        	if (output == 1) {

		        		_(iId).checked = true;
		        	}
		        	else if (output == 0) {
		        		_(iId).checked = false;
		        	}
		        }
		        else{
		        _(iId).value = output;
		    	}
		    });
	}
	//<li class='fad fa-lock-alt' style='color: red;font-size:18px'></li>
	function highLight(item,i,open_close){
		var value = _(item).value;
		var o_c = _(open_close).checked;
		if (o_c == true) {
			_(i+"o_c_state").innerHTML ="<li class='fad fa-lock-open-alt' style='color: green;font-size:15px;margin-left:7px'></li>";//open/close insert open lock div
			if (value <=0 || value == '') {
				_(i+"state").setAttribute("style", "background-color:#f5a3abe8");
				_(i+"state").innerHTML ="<div class='btn-circle btn-danger m-b-3'style='padding-left:8px;padding-right:2px;'>✘</div>";
				_(i+"rh").setAttribute("style", "background-color:#f5a3abe8");
				_(i+"sh").setAttribute("style", "background-color:#f5a3abe8");
				_(i+"bh").setAttribute("style", "background-color:#f5a3abe8");
				_(i+"opnclsh").setAttribute("style", "background-color:#f5a3abe8");//open/close th
				_(i+"r").setAttribute("style", "background-color:#fff0");//input
				_(i+"sRate").setAttribute("style", "background-color:#fff0");//input
				_(i+"bRate").setAttribute("style", "background-color:#fff0");//input
			}
			else{
				_(i+"state").setAttribute("style", "");
				_(i+"state").innerHTML ="<div class='' style='padding-left:12px;padding-right:2px;color: #00e634;font-size: 15pt;'>✔</div>";
				_(i+"rh").setAttribute("style", "");
				_(i+"sh").setAttribute("style", "");
				_(i+"bh").setAttribute("style", "");
				_(i+"opnclsh").setAttribute("style", "");//open/close th
				_(i+"r").setAttribute("style", "");//input
				_(i+"sRate").setAttribute("style", "");//input
				_(i+"bRate").setAttribute("style", "");//input
			}
		}
		else if (o_c == false) {
			_(i+"o_c_state").innerHTML ="<li class='fad fa-lock-alt' style='color: black;font-size:15px;margin-left:12px'></li>";//ocstate div
				_(i+"state").setAttribute("style", "background-color:#f5a3abe8");
				_(i+"state").innerHTML ="<div class='btn-circle btn-danger m-b-3'style='padding-left:12px;padding-right:2px;'>✘</div>";
				_(i+"rh").setAttribute("style", "background-color:#f5a3abe8");
				_(i+"sh").setAttribute("style", "background-color:#f5a3abe8");
				_(i+"bh").setAttribute("style", "background-color:#f5a3abe8");
				_(i+"opnclsh").setAttribute("style", "background-color:#f5a3abe8");//open/close th
				_(i+"r").setAttribute("style", "background-color:#fff0");//input
				_(i+"sRate").setAttribute("style", "background-color:#fff0");//input
				_(i+"bRate").setAttribute("style", "background-color:#fff0");//input
		}

			
	}



	function setDate(starting){
		start = new Date(starting);
		//var end = new Date("2016/12/20");
		for (var i = 1; i < 20; i++) {
			var a = (new Date(start));
			//to convert date to number of the day
			var r = a.getDate();
			//convert date to simple date
			var simple = a.toLocaleDateString();
			simple = convertDate(simple);
		    //alert(r + "increment :" +i);
		    //alert(fullDate);

		    //Detarmaining week days
		    var weekday = new Array(7);
			  weekday[0] = "Sun";
			  weekday[1] = "Mon";
			  weekday[2] = "Tue";
			  weekday[3] = "Wed";
			  weekday[4] = "Thu";
			  weekday[5] = "Fri";
			  weekday[6] = "Sat";
			var dayNum = a.getDay();
			if (dayNum ==0 || dayNum ==6) {
				var weight="bold";
			}	
			else{
				var weight="normal";
			}
		    var day = weekday[dayNum];

		    //Detaraining months 
		    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
				  "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
				];
			//Getting the nonth name
			var monthName = monthNames[a.getMonth()];
			var monthN = '';
			if (r == 1) {
				monthN = monthName;
			}
			else if (i==1) {
				monthN = monthName;
			}
		//Highlighting if the day was today
			var today = new Date();
			var cuurentDate = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

			var loopDate = a.getFullYear()+'-'+(a.getMonth()+1)+'-'+a.getDate();
			//first step is deleting the higlight of days to make sure not duplicated
			_(i).style.backgroundImage= ""; 
			_(i).title = loopDate;

			
			//alert(cuurentDate == loopDate);

			if (loopDate == cuurentDate) {
				_(i).style.backgroundImage= "linear-gradient(225deg, red, red 10px, transparent 10px, transparent)";  
				_(i).title = "Today";
			}
		//End of Highliting


		    _(i+"m").innerHTML = "<span style='font-weight:bold;' id='month'>"+monthN+"</span><br>";
			_(i).innerHTML = "<span style='font-weight:"+weight+";' id='1"+i+"day'>"+day+"</span><br>"+"<span class='pull-right'>"+r+"</span>";
			_(i+"r").setAttribute("name",simple+"_rNum");
			_(i+"opncls").setAttribute("name",simple+"_opncls");
			_(i+"sRate").setAttribute("name",simple+"_sRate");
			_(i+"bRate").setAttribute("name",simple+"_bRate");
			

			//Get data from the database and print it into the inputs
			var hotel_id = $("#hotel_id").val();
			var room_id = $("#room_id").val();

			//for available rooms
			var iName = _(i+"r").name;
			var array = iName.split("_");
			var date = array[0];
			var iName = array[1];
			var iId = i+"r";
			get_values(hotel_id,room_id,date,iName,iId);

			// for standerd price
			var iName2 = _(i+"sRate").name;
			var array2 = iName2.split("_");
			var date2 = array2[0];
			var iName2 = array2[1];
			var iId2 = i+"sRate";
			get_values(hotel_id,room_id,date2,iName2,iId2);

			// for breakfast price
			var iName3 = _(i+"bRate").name;
			var array3 = iName3.split("_");
			var date3 = array3[0];
			var iName3 = array3[1];
			var iId3 = i+"bRate";
			get_values(hotel_id,room_id,date3,iName3,iId3);
			
			// for Open/close statues value

			var iName4 = _(i+"opncls").name;
			var array4 = iName4.split("_");
			var date4 = array4[0];
			var iName4 = array4[1];
			var iId4 = i+"opncls";
			get_values(hotel_id,room_id,date4,iName4,iId4);

			//Increment days by 1
		    start.setDate( start.getDate() + 1 );
		    
		    //var item = i +"r";
			//highLight(item,i);
		}
		setTimeout(twentyLoop, 2000);
	}

	function convert_set(){
		//alert("Works");
		var sel = _("set_room_name");
		_("room_id").value = _("set_room_name").value;
		

		

		_("room_name").value = sel.options[sel.selectedIndex].text;
		_("room_name_lb").innerHTML = sel.options[sel.selectedIndex].text //+ " <span class='badge'>Num</span>"

		//show default name for bulk edit
		//_("showeRName").innerHTML = sel.options[sel.selectedIndex].text
		//_("single_id").value = _("set_room_name").value;//value of single bulk edit
		//_("showeRName").innerHTML = sel.options[sel.selectedIndex].text//bulk edit single name

		//get 1.number of guests

		var input = _('startDate').value;
		var sDate = input.replace(/-/g,"/");
		//alert(sDate);
		setDate(sDate);

		//RESETING GUESTS NUMBERS
		getData();
	}

	function sendData(hotel_id,room_id,room_name,date,iName,value){
		 // alert("Hotel ID:"+hotel_id+" Room ID:"+room_id+" Room Name:"+room_name+" Date:"+date+" Input Name:"+iName+" Value"+value);
		if (date.includes("/")) {
			var ndate = convertDate(date);
		}
		else{
			var ndate = date;
		}
		
		//alert(ndate);
		$.post ('bookings_handler/set_rooms.php',
			{hotel_id: hotel_id,room_id:room_id,room_name:room_name,date:ndate,iName:iName,value:value}
			,function(output) {
	         // alert(output);
	    })
	}
			//Insert customer logo
	function logo_check_guset_number(number){
	    var image = "<img src='img/icon-guest_retina.png' style='width:20px;height:auto;padding:3px'>"
	    var guest_logo = _("psNumbers");
	    var guest_logo_2 = _("psNumbers2");

		if (number == 1) {
			guest_logo.innerHTML = image;
	        guest_logo_2.innerHTML = image;
		}
		else if (number == 2) {
			guest_logo.innerHTML = image +image;
	        guest_logo_2.innerHTML = image +image;
		}
		else if (number == 3) {
			guest_logo.innerHTML = image +image+image;
	        guest_logo_2.innerHTML = image +image+image;
		}
		else if (number > 3) {
			guest_logo.innerHTML = image+ "<b style='position:relative;font-size:15px;padding:3px'>×</b>"+"<b style='position:relative;font-size:15px;padding:3px;top:2px'>"+number+"</b>";
	        guest_logo_2.innerHTML = image+ "<b style='position:relative;font-size:15px;padding:3px'>×</b>"+"<b style='position:relative;font-size:15px;padding:3px;top:2px'>"+number+"</b>";
		}
	}
	//Get data of the room
	function getData(){
		var room_id = $("#set_room_name").val();
		//alert(room_id);
		$.post ('bookings_handler/get_room_info.php',
			{room_id:room_id}
			,function(output) {
	        logo_check_guset_number(output);
	    })
	}
	$(document).ready(function(){
		$(".editable").change(function () {
			var name_date =$(this).attr("name");
			var hotel_id = $("#hotel_id").val();
			var room_id = $("#room_id").val();
			var room_name = $("#room_name").val();
			var array = name_date.split("_");
			var date = array[0];
			var iName = array[1];
			var value;
			

			//Determening values of the input name
			if ($(this).attr("type") == "checkbox") {
				//get checkbox states if checked or not
				var element = $(this).prop("checked");
				//detarmin the check box checking condition and assin neccesry value for it
				if (element == true) {
					value = "1";
				}
				else if(element == false){
					value = "0";
				}
			}
			else {
				value =$(this).val();
			}

			// For testing Don't Delete it
			//alert("Hotel Id:"+ hotel_id + "  Room ID:" + room_id +"  Room Name:"+room_name +"  values for date:"+date+"  input name:"+iName+"  input value:"+value);

			//set room guest numbers
			//alert("Hotel Id:"+hotel_id+"  Room ID:"+room_id+"   Room Name:"+room_name+"  Date:"+date+"  INput Name:"+iName+"  Value:"+value)
			sendData(hotel_id,room_id,room_name,date,iName,value);//Main function to send data

			setTimeout(twentyLoop, 2000);//of course to for highliting
		});
	})
	convert_set();

	//Alternative loop for all the functions
	function twentyLoop() {
		for (var i = 1; i < 20; i++) {
			//call highlight function
			var item = i +"r";
			var open_close = i +"opncls";
			highLight(item,i,open_close);
		}
	}


	//changing the icon when collapse toggle Yes!!!

	$(document).ready(function(){
		$(".icon").click(function(){
			var thId =$(this).attr("id");
			if (thId == "t1") {
				$("#tg1").toggleClass("icon-arrow-up");
			}
			if (thId == "t2") {
				$("#tg2").toggleClass("icon-arrow-up");
			}
			if (thId == "t3") {
				$("#tg3").toggleClass("icon-arrow-up");
			}
			if (thId == "tm1") {
				$("#tgm1").toggleClass("icon-arrow-up");
			}
			if (thId == "tm2") {
				$("#tgm2").toggleClass("icon-arrow-up");
			}
			if (thId == "tm3") {
				$("#tgm3").toggleClass("icon-arrow-up");
			}
		});
	}
		);

	getData();
	setTimeout(twentyLoop, 2000);
	//twentyLoop();
	</script>


	<!-- This section for increasing and decreasing date by one day to move across days -->
	<script type="text/javascript">


		//Increase the date and move the table 1 day forward
		function increase_day(){
			var dateString = _('startDate').value;
			var myDate = new Date(dateString);

			//add a day to the date
			myDate.setDate(myDate.getDate() + 1);
			increasedDate = formatDate(myDate);
			// alert(formatDate(myDate));

			//Return the date to the input
			_('startDate').value = increasedDate;
			//press the set period button function
			convert_set();
		}

		// Decrease the date and move the table 1 day background-color
		function decrease_day(){
			var dateString = _('startDate').value;
			var myDate = new Date(dateString);

			//add a day to the date
			myDate.setDate(myDate.getDate() - 1);
			decreasedDate = formatDate(myDate);
			// alert(formatDate(myDate));

			//Return the date to the input
			_('startDate').value = decreasedDate;
			//press the set period button function
			convert_set();

		}
		

		// Function to format the date format to yyy-mm-dd
		function formatDate(date) {
		    var d = new Date(date),
		        month = '' + (d.getMonth() + 1),
		        day = '' + d.getDate(),
		        year = d.getFullYear();

		    if (month.length < 2) 
		        month = '0' + month;
		    if (day.length < 2) 
		        day = '0' + day;

		    return [year, month, day].join('-');
		}


	</script>

	<!-- start js include path -->
	<!-- old jquery disable it for checking the functions
	<script src="assets/plugins/jquery/jquery.min.js"></script>
	-->
	

	<script src="assets/plugins/popper/popper.min.js"></script>
	<script src="assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
	<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
	<!-- bootstrap Scripts -->
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

	<!-- Common js-->
	<script src="assets/js/app.js"></script>
	<script src="assets/js/layout.js"></script>
	<script src="assets/js/theme-color.js"></script>
	<!-- Material -->
	<script src="assets/plugins/material/material.min.js"></script>
	<!-- animation -->
	<script src="assets/js/pages/ui/animations.js"></script>
	<!-- end js include path -->

	<!-- Calendar Bulk edit scripts -->
	<script type="text/javascript" src="assets/calendar_bulk_edit.js"></script>
	<!-- Gonna use it when setting up the bulk edit rooms -->
	<script type="text/javascript" src="assets/test.js"></script>
	<!-- Multi Select and single select jquery choosed -->
	<script type="text/javascript" src="../../../bootstrap/multi_select_js/chosen.jquery.min.js"></script>
	<!-- font awesome doesn't work adding it's script -->
	<script type="text/javascript" src="assets/plugins/font-awesome/js/all.js"></script>

	<!-- notifications Not using it for now
	<script src="assets/plugins/jquery-toast/dist/jquery.toast.min.js"></script>
	<script src="assets/plugins/jquery-toast/dist/toast.js"></script>
	<link rel="stylesheet" href="assets/plugins/jquery-toast/dist/jquery.toast.min.css">
	-->
	

</body>


</html>
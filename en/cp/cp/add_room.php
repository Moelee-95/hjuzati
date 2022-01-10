
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->


<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	 <meta name="author" content="HimaHotels by.Mohammed S. Hazim" />
	<title>HIMA Hotels | Add New Room</title>
	
	<!-- icons -->
	<link href="assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!--bootstrap -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- Material Design Lite CSS -->

	<link rel="stylesheet" href="assets/plugins/material/material.min.css">
	<link rel="stylesheet" href="assets/css/material_style.css">
	<!-- animation -->
	<link href="assets/css/pages/animate_page.css" rel="stylesheet">
	<!-- animation for sweet alert -->
	<link rel="stylesheet" href="assets/plugins/sweet-alert/sweetalert.min.css">
	<!-- Template Styles -->
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/theme-color.css" rel="stylesheet" type="text/css" />
	<!-- dropzone -->
	<link href="assets/plugins/dropzone/dropzone.css" rel="stylesheet" media="screen">
	<!-- favicon -->
	<link rel="shortcut icon" href="assets/img/favicon.ico" />
	<!-- Select dropdown style -->
	<link href="assets/css/select.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
		.under_line:hover{
		border-bottom: 4px solid #36c6d3;
		transition:0.2s ease-in;
		}
		
		#dropZone{
			border: 1px dashed #bdbdbd;
			 padding: 10px;
			 border-width: 2px;
			 background-color: #eeeeee69
		}
		#files {
			border: 1px dotted #a7a7a7;
			padding: 20px;
			width: 200px;
			display: none;	
		};
		#error{
			color:red;

		}
	
	</style>
	<script src="assets/plugins/jquery/jquery.min.js"></script>
	<script src="../../../bootstrap/jquery.form.js"></script>


</head>
<!-- END HEAD -->

<body
	class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
	<div class="page-wrapper">
		<!-- start header -->
		<?php include('sections/header.php');?>
		<!-- end header -->
		<!-- start page container -->
		<div class="page-container">
			<!-- start sidebar menu -->
			<?php include('sections/sidebar-container.php');?>
			<!-- end sidebar menu -->

			<!-- PHP Section #all Required functions and codes to get the data from the db -->
			<?php // include('sections/add_rooms_code.php');?>
			<!-- End PHP Section -->

			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">

					<!-- Large modal -->
					<div class="modal fade bd-example-modal-lg" id="summery" tabindex="-1" role="dialog" aria-labelledby="summeryTitle" aria-hidden="true">
					  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					    <div class="modal-content" style="background-color: #efefef;">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLongTitle"><h4 style="margin:5px;padding: 10px">Price summary for:<strong id="summery_room_type">hotel</strong></h4></h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <div id="price-summary_price_table" class="row">
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<table class="table table-hover table-checkable order-column full-width" id="summery_table">
										<tbody>
											<tr>
												<th>Number of guests</th>
												<th>Prices</th>
											</tr>
											<tr>
												<td>
													<div id="guest_logo_2" style="">
													</div>
												</td>
												<td>
													<div id="final_price" style="color: #008009;font-weight:bold"></div>
												</td>
											</tr>
										</tbody>
										
									</table>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<div class="row alert alert-info" style="margin-left:8px;padding:10px;width: 350px">
											<span style=";color: #6b6b6b;box-sizing: border-box;">
												These prices represent the minimum prices for the room type, when you finish submitting this room you can change the prices according to the date.
											</span>
									</div>
								</div>
							</div>
					      </div>
					      <div class="modal-footer">
							<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button> -->
				        	<button type="button" onclick="saveRoom()" class="btn btn-primary col-12">Save Room</button>
					      </div>
					    </div>
					  </div>
					</div>
					<!-- End Large Modal -->

					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<ol class="breadcrumb page-breadcrumb pull-left">
								<li><i class="fas fa-home"></i>&nbsp;<a class="parent-item"
										href="../../index.html">Hjuzati</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Rooms</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Add Room Details</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>Add New Room Details</header>
									<button id="panel-button"
										class="mdl-button mdl-js-button mdl-button--icon pull-right"
										data-upgraded=",MaterialButton">
										<i class="material-icons">more_vert</i>
									</button>
									<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
										data-mdl-for="panel-button">
										<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
											here</li>
									</ul>
								</div>
								<!-- Start Actual data -->
								<div class="container" id="insertForm" name="add" style="display: block;" onload="show_selected()" >
									<form  method="post" action="" enctype="multipart/form-data">
										<div class="" style="background-color: #0037ff00;padding:10px;margin:10px;;">
											<div id="error_header" class="alert_messages" hidden></div>
											<legend class="" id="display">Please select</legend>
											<div class="row mrg-top">
												<div class="col-lg-5 col-md-5 col-sm-12 d-inline" style="padding: 20px">
													<input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $hotel_id ?>">
													<label class="">Room type</label>
													<br>
													<?php 
														$types = "SELECT rtRoomTypeEn, rtRoomTypeID FROM `hima`.roomstypes;";
														$queries = mysqli_query($conn,$types);
														$fetch = mysqli_fetch_all($queries, MYSQLI_ASSOC);
														// print_r($fetch);

														 ?>


													<select required class="under_line form-control form-control-lg inpt_check" name="room_type" id="sell" style="width:100%">

														<option value="0" >Please select</option>


															<?php
														//Looping through the databse opetions and list
															 foreach ($fetch as $type) { ?>
															<option style="font-size: 16px" value="<?php echo $type['rtRoomTypeID'] ?>" ><?php echo $type ['rtRoomTypeEn'] ; // r_codes($info);

														 ?></option> <?php } ?>
													</select>
													<div class="valid-feedback">Looks good!</div>
													<div class="invalid-feedback">Please provide a valid Room Type.</div>
												</div>
												<div class="col-lg-5 col-md-5 col-sm-12 d-inline" style="padding:20px;">

												<!-- Start rooms names selection -->
												<div id="" style="">
														<label class="" id="room_name_text" style="">Room name</label>
														<select id="room_name" required style="width:100%" class="under_line form-control form-control-lg inpt_check" name="room_name" >
															<option value="0" class="hidden" selected="selected" >Please select</option>
														</select>
														 <div class="valid-feedback">Looks good!</div>
															<div class="invalid-feedback">Please provide a valid Room Name.</div>
													</div>

												<!-- end rooms names selection -->


												</div>
											</div>
											<div class="row mrg-top">
												<div class="col-lg-5 col-md-4 col-sm-12 d-inline" style="padding:20px;">
													<label class="">Custom name (optional)</label>
													<br>
													<input class="under_line tx-lg form-control form-control-lg inpt_check" id="custom_name" type="text" name="cusrom_name" style="width: 80%" />
													     <div class="valid-feedback">
													        Looks good!
													     </div>
													     <div class="invalid-feedback">
													        Please provide a valid Custom Room Name.
													      </div>

												</div>
												<div class="col-lg-5 col-md-4 col-sm-12 d-inline" style="padding:20px;">
													<label class="">Smoking policy</label>
													<br>
													<select required class="under_line form-control form-control-lg inpt_check" name="smoking_policy" >
													    <option value="1">Non-smoking</option>
													    <option value="2">Smoking</option>
														<option value="3">I have both options for this room type</option>
														<div class="valid-feedback">
														        Looks good!
														     </div>
														     <div class="invalid-feedback">
														        Please provide a valid Option.
														      </div>
													</select>
												</div>
											</div>

											<!-- More Options -->
											<div id="more_options" class="row mrg-top" style="display: none;padding-left: 30px;">
												<div class="col-lg-3 col-md-3 col-sm-12" style="display: inline-block;">
													<label class="">Number of bedrooms</label>
													<br>
													<select name="num_bed_rooms" class="under_line sel-md form-control form-control-lg inpt_check" style="">
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
													 <div class="valid-feedback">
												        Looks good!
												     </div>
												     <div class="invalid-feedback">
												        Please select a valid Number of bedrooms.
												      </div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-12" style="display: inline-block;">
													<label class="">Number of living rooms</label>
													<br>
														<select required  name="num_living_rooms" class="under_line sel-sm form-control form-control-lg inpt_check"  style="width: 100px;" >
															<option value="1" >1</option>
															<option value="2" >2</option>
															<option value="3" >3</option>
															<option value="4" >4</option>
															<option value="5" >5</option>
														</select>
														<div class="valid-feedback">
													        Looks good!
													     </div>
													     <div class="invalid-feedback">
													        Please select a valid Number of living.
													      </div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-12" style="display: inline-block;">
													<label class="">Number of bathrooms</label>
													<br>
													<select required name="num_bathrooms" class="under_line sel-sm form-control form-control-lg inpt_check" style="width: 100px;">
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
													<div class="valid-feedback">
												        Looks good!
												     </div>
												     <div class="invalid-feedback">
												        Please select a valid Number of bathrooms.
												      </div>
												</div>
											</div>
											<div class="row mrg-top">
												<div class="col-lg-4 col-md-4 col-sm-12" style="padding: 20px">
													<label class="">Number of rooms (of this type)</label>
													<br>
													<input min="1" max="99999"  required id="num_this_type" class="under_line tx-sm form-control form-control-lg inpt_check" type="number" name="no_of_rooms" style="" />
													<div class="valid-feedback">
												        Looks good!
												     </div>
												     <div class="invalid-feedback">
												        Please Provide a valid number of rooms of this type!
												      </div>

												</div>
											</div>
										</div>
										<hr><!-- end section one  -- start section tow -->
										<div class="row" id="bed_options" style="background-color: #0037ff00;padding:10px;margin:10px;;">
											<legend class="">Bed Options</legend>
											<div class="alert alert-info row">Tell us only about the existing beds in a room (don't include extra beds).</div>
											<div class="mrg-top0" style="padding: 15px">
												<label class="">What kind of beds are available in this room?</label>
												<div id="bd_options" class="" name="bd_options" style="">
													<div id="beds_1" name="bed_1" class="row">
														<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 d-inline">
															<select style="display: inline-block" required class=" under_line form-control form-control-lg" name="beds_kinds" id="bed_kinds" onchange="add_guests()">
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
														</div>
														<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12  d-inline" style="text-align: center;">
															<span style="text-align: center;">x</span>
														</div>
														<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12  d-inline">
															<select required style="" class=" under_line form-control form-control-lg" name="bed_num" id="bed_num" onchange=";add_guests()">
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
												</div>
											</div>
											<div class="mrg-top" style="padding: 15px">
												<label class="" >How many guests can stay in this room?</label>
												<div class="guest_num_log row" style="">
													<div id="guest_number" class="col-lg-2 col-md-2 col-sm-5 col-xs-5 d-inline" style="display: inline-block;margin-top: 8px;">
														<input  min="1" max="99999" onchange="guest_no();logo_check_guset_number(this.value)" class=" under_line form-control form-control-lg inpt_check" type="number" name="guest_num" id="guest_num" style="width:80px" >
														<div class="valid-feedback">
														Looks good!
														</div>
														<div class="invalid-feedback">
														Please provid how many guests can stay in this room!
														</div>
													</div>
													<div class="d-inline"  id="guest_logo" style="padding-left:50px;padding-top:10px"></div>
												</div>
											</div>
										</div>
										<!-- end section two  -- start section three -->
										<hr>
										<div class="" id="room_size" style="display: none;background-color: #0037ff00;padding:10px;margin:10px;;" >
											<div class="">
												<label class="Big">Room size (optional)</label>
												<br>
												<input min="1" max="99999"  id="room_size_txt" class="tx-xs under_line form-control form-control-lg" style="width: 100px" type="number" name="room_size" />
											</div>	
										</div>
										<!-- end section Three  -- start section foure -->
										<hr>
												<div class="contents" id="price_options" style="display: none;background-color: #0037ff00;padding:10px;margin:10px;" >
													<label class="Big">Base price per night</label>
													<div class="row alert alert-info" style="">
														This is the lowest price that we automatically apply to this room for all dates. Before your property goes live, you can set seasonal pricing on your property dashboard.
													</div>
													<div class="" style="margin-left: 10px">
														<div class="row">
															<label class="" >Price for <b id="price_for" style="color: green"></b> person
															</label>
														</div>
														<div class="row col-lg-6 col-md-6 col-sm-12 col-xs-12" >
															<div class="form-group row">
																<span class="required_text" id="price_span" style="border-radius: 2px;border: 1px solid #ccc;padding: 8px;background-color: #eee;font-size:13px;width: 150px;" >
																<img src="img/us-flag.png" style="width:25px ;height: 15px;">
																<b style="padding: 3px">US$/per night</b>
																
																</span>	
																<input oninput="input_price()" min="1" max="99999"  required id="price_guest_num" style="height: 40px" class="tx-sm under_line form-control form-control-lg inpt_check" type="number" name="price_guest_num" placeholder="0">
																<div class="valid-feedback">
															        Looks good!
															     </div>
															     <div class="invalid-feedback">
															        Please provid valid price for this room type!
															      </div>
															</div>
														</div>
														<div id="offer_lower_rate">
															<div class="row">
																	<label class="" style="">Do you offer a lower rate when there are fewer than <b id="disscount_for"></b> guests?</label>
															</div>
															<div class="custom-control custom-radio custom-control-inline">
															  <input type="radio" id="offer_yes" name="offer_lower_if_fewer_guest_num" class="custom-control-input" value="1">
															  <label class="custom-control-label" for="offer_yes">Yes</label>
															</div>
															<div class="custom-control custom-radio custom-control-inline">
															  <input checked type="radio" id="offer_no" name="offer_lower_if_fewer_guest_num" class="custom-control-input" value="0">
															  <label class="custom-control-label" for="offer_no">NO</label>
															</div>
															<div id="div_diss_options" style="display: none;" class="container">
																<div class="row">
																	<label class="">Discount for 1 person</label>
																</div>
																<div class="row">
																	<input  min="1" max="99999"  class="under_line form-control form-control-lg" type="number" name="discount_1_person" id="discount_1_person" style="width: 80px">
																	<select class="" name="disscount_type" style="width: 100px" disabled>
											                    	<option value="percentage" >%</option>
											                    	<option value="cash" selected>US$</option>
										                   			</select>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!-- end section foure -->
												<hr>
												
												<!-- Upload room images -->
												

												<div id="aniimated-thumbnials" class="list-unstyled row clearfix">

												</div>
												<br>
												<hr>
												<button type="button" id="submit_room" onclick="showInputs()" class="btn btn-primary btn-lg col-12">Submit Room</button>
									</form>
								</div>
							</div>
						</div><!-- End Actual data -->
					</div>
				</div>
			</div> <!-- End page-content-wrapper -->
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
											class="sidebar-pos-option form-control-lg input-inline input-sm input-small ">
											<option value="left" selected="selected">Left</option>
											<option value="right">Right</option>
										</select>
									</div>
								</div>
								<div class="setting-item">
									<div class="setting-text">Header</div>
									<div class="setting-set">
										<select
											class="page-header-option form-control-lg input-inline input-sm input-small ">
											<option value="fixed" selected="selected">Fixed</option>
											<option value="default">Default</option>
										</select>
									</div>
								</div>
								<div class="setting-item">
									<div class="setting-text">Sidebar Menu </div>
									<div class="setting-set">
										<select
											class="sidebar-menu-option form-control-lg input-inline input-sm input-small ">
											<option value="accordion" selected="selected">Accordion</option>
											<option value="hover">Hover</option>
										</select>
									</div>
								</div>
								<div class="setting-item">
									<div class="setting-text">Footer</div>
									<div class="setting-set">
										<select
											class="page-footer-option form-control-lg input-inline input-sm input-small ">
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
	
	<script type="text/javascript">
		function _(el){
			return document.getElementById(el);
		}
	</script>
	<!-- Sweet Alert -->
	<script src="assets/plugins/sweet-alert/sweetalert.min.js"></script>
	<script src="assets/js/pages/sweet-alert/sweet-alert-data.js"></script>

	<!-- start js include path -->

	<script src="assets/plugins/popper/popper.min.js"></script>
	<script src="assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
	<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- Common js-->
	<script src="assets/js/app.js"></script>
	<script src="assets/js/layout.js"></script>
	<script src="assets/js/theme-color.js"></script>
	<!-- Material -->
	<script src="assets/plugins/material/material.min.js"></script>
	<script src="assets/js/pages/material_select/getmdl-select.js"></script>

	<!-- animation -->
	<script src="assets/js/pages/ui/animations.js"></script>
	<!-- end js include path -->

	<!-- font awesome doesn't work adding it's script -->
	<script type="text/javascript" src="assets/plugins/font-awesome/js/all.js"></script>

	<!-- Layout Javascript codes -->
	<script type="text/javascript" src="assets/js/add_room.js"></script>

	<script type="text/javascript">
		$(document).ready(function () {

		//show the disscount menue if select yes
		 	$('input[type=radio][name=offer_lower_if_fewer_guest_num]').change(function() {
			    if (this.value == 'yes') {
			        //alert("val yes");
			        $("#div_diss_options").show(500);
			    }
			    else if (this.value == 'no') {
					//alert("VAl no");
					$("#div_diss_options").hide(500);
			    }
			});
		//Make area of input green after changing it's value if it's value was valid
		$('.inpt_check').change(function(){
			if (this.value != '' && this.value != 0) {
				//alert("input is valid!");
				$(this).removeClass("is-invalid");
				$(this).addClass("is-valid");
			}
			else{
				//alert("input is Not valid!");
				$(this).removeClass("is-valid");
				$(this).addClass("is-invalid");
			}
		});

		});

	</script>
	<!-- Uploading files Links -->
		<script type="text/javascript" src="assets/js/upload_files/js/vendor/jquery.ui.widget.js"></script>
		<script type="text/javascript" src="assets/js/upload_files/js/jquery.iframe-transport.js"></script>
		<script type="text/javascript" src="assets/js/upload_files/js/jquery.fileupload.js"></script>



<!-- will use it later -->

		<script type="text/javascript">

/*			//when hover on image
				$(".img_hver").hover(function(){
					alert("You hoverd over img");
				    }, function(){
				    alert("unhoverd!")
				    
				  });*/

//Check feilds
function checkFeilds(){
//Form Inputs
	var room_type = _("sell").value;
	//to get the value of the chiledren select located inside the div
	var room_name =   $("#room_name").val();
	var cusrom_name = _("custom_name").value;
	var smoking_policy = $("[name=smoking_policy]").val();

	var no_of_rooms = $("[name=no_of_rooms]").val();
	var beds_kinds = $("[name=beds_kinds]").val();
	var bed_num = $("[name=bed_num]").val();
	var guest_num = _("guest_num").value;
	var room_size = _("room_size_txt").value;
	var price_guest_num = _("price_guest_num").value;
	var offer_lower_if_fewer_guest_num = $("input[name='offer_lower_if_fewer_guest_num']:checked").val();
	var discount_1_person = $("[name=discount_1_person]").val();

//form inputs

	var state;
	var type=1;var name=1;var custom_name=1;var numberOfRooms=1;var guestNum=1;var price =1;disscount =1;var pic=1;
	if (room_type == 0) {
		type =0;
		_("sell").focus();
		_("sell").addClass("is-invalid");
		
	}
	if (room_name == 0) {
		name =0;
		$("[id2=sel_room_name]").children("select").focus();
		$("[id2=sel_room_name]").children("select").addClass("is-invalid");
	}
	if (no_of_rooms <= 0) {
		numberOfRooms=0;
		$("[name=no_of_rooms]").focus();
		$("[name=no_of_rooms]").addClass("is-invalid");
	}
	if (room_type != "si") {
		if (guest_num <= 0) {
			guestNum=0;
			_("guest_num").focus();
			_("guest_num").addClass("is-invalid");
		}
	}
	if (price_guest_num <= 0) {
		price = 0;
		_("price_guest_num").focus();
		_("price_guest_num").addClass("is-invalid");
	}
	if (offer_lower_if_fewer_guest_num == "yes") {
		if (discount_1_person <= 0) {
			disscount =0;
			$("[name=discount_1_person]").focus();
			$("[name=discount_1_person]").addClass("is-invalid");
		}
	}
	
	if (type==1 && name==1 && custom_name== 1&& numberOfRooms ==1 && guestNum==1 && price ==1 && disscount==1 && pic ==1) {
		state = 1;
	}
	else{
		state = 0;
	}
	// alert(state);
	return state;
}

//Submit room
function showInputs(){
	var guest_num = _("guest_num").value;
	var price_guest_num = _("price_guest_num").value;
	var offer_lower_if_fewer_guest_num = $("input[name='offer_lower_if_fewer_guest_num']:checked").val();
	var discount_1_person = $("[name=discount_1_person]").val();

	//check all feilds if there is any missing inputs
	var state = checkFeilds();
	if (state == 1) {
		//Remove previous rows from table
		$('.table_row').remove();
			// Set up room summery
		if (offer_lower_if_fewer_guest_num == "yes") {
			var price = parseInt(price_guest_num);
			var gNum = parseInt(guest_num);
			var disscount = parseInt(discount_1_person);
			var color;
			var nGNum = gNum;
			var nPrice = price;
			for (var i = 2; i <= gNum ; i++) {
				nGNum = nGNum - 1;
				nPrice = nPrice-disscount;
				if (nPrice < 0 || nPrice == 0 ) {
					nPrice = 0;
					color = "#e23434";//Red
				}
				else{
					color = "#008009";//Green
				}

				var nGNvalue = logo_maker(nGNum);
				 $('#summery_table').append("<tr class='table_row'><td>"+nGNvalue+"</td><td style='color:"+color+";font-weight:bold' >US$ "+nPrice+"</td></tr>");
			}
		}

		$('#summery').modal('show');
	}




}

function saveRoom(){
	var room_type = _("sell").value;
	//to get the value of the chiledren select located inside the div
	var room_name =   $("#room_name").val();
	var cusrom_name = _("custom_name").value;
	var smoking_policy = $("[name=smoking_policy]").val();
	var num_bed_rooms = $("[name=num_bed_rooms]").val();
	var num_living_rooms = $("[name=num_living_rooms]").val();
	var num_bathrooms = $("[name=num_bathrooms]").val();
	var no_of_rooms = $("[name=no_of_rooms]").val();
	var beds_kinds = $("[name=beds_kinds]").val();
	var bed_num = $("[name=bed_num]").val();
	var guest_num = _("guest_num").value;
	var room_size = _("room_size_txt").value;
	var price_guest_num = _("price_guest_num").value;
	var offer_lower_if_fewer_guest_num = $("input[name='offer_lower_if_fewer_guest_num']:checked").val();
	var discount_1_person = $("[name=discount_1_person]").val();



	$.post ('add_room_post.php',
		{room_type:room_type,room_name:room_name,cusrom_name:cusrom_name,smoking_policy:smoking_policy,num_bed_rooms:num_bed_rooms,num_living_rooms:num_living_rooms,num_bathrooms:num_bathrooms,no_of_rooms:no_of_rooms,beds_kinds:beds_kinds,bed_num:bed_num,guest_num:guest_num,room_size:room_size,price_guest_num:price_guest_num,offer_lower_if_fewer_guest_num:offer_lower_if_fewer_guest_num,discount_1_person:discount_1_person}
		,function(output) {
	        if (output == 1) {
	        	//show successfully Message
	        	// alert ("Successfully Added to the database"+output);
	        	showSuccessMessage();
	        	//reset all feilds


	        }
	        else{
	        	//show unsuccessful message
	        	alert("Something went wrong while trying to input data"+output);
	        	showError();

	        }
	    });



}


	
		</script>
<!-- Usefull codes for getting the text from the select element -->
	<!-- 	<script type="text/javascript">
//
			function show_selected(){
	            //Select the element with id sell
	            var selector = _('sell');
	            //get the text of the sell element
	            var value = selector[selector.selectedIndex].text;
	            //get the value of selected opetion in sell element
	            var value_0 = selector[selector.selectedIndex].value;
	            //show results
	            alert("Selected Text: "+value+" Selected Value: "+ value_0);
	            }
		</script> -->




		<!-- To get the rooms names of the selected type from the database -->
		<script>
		$("#sell").on("change", function() {

			//To send the values to the serverside then return with data
		  $.ajax({
		    type: "POST",
		    data: {
		      "types": $("#sell").val()
		    },
		    url: "php/get_types_names.php",
		    dataType: "json",
		    success: function(JSONObject) {
		      // var peopleHTML = "";
		      var selectEl = "";
		      selectEl = "<option value='0' class='' selected='selected'>Please select</option>";
		      // Loop through Object and create peopleHTML
		      for (var key in JSONObject) {
		        if (JSONObject.hasOwnProperty(key)) {
		         /* peopleHTML += "<tr>";
		            peopleHTML += "<td>" + JSONObject[key]["name"] + "</td>";
		            peopleHTML += "<td>" + JSONObject[key]["gender"] + "</td>";
		          peopleHTML += "</tr>";*/
		          selectEl += "<option value='"+JSONObject[key]["rnRoomNameID"] +"'>"+JSONObject[key]["rnRoomNameEn"] +"</option>";
		        }
		      }

		      // Replace table’s tbody html with peopleHTML
		      // $("#people tbody").html(peopleHTML);
		      $("#room_name").html(selectEl);
		    }
		  });

		  //to change the title of the page to the selected type
			$("#display").html($("#sell option:selected").text());

		});
		</script>
	<!-- To get the rooms names of the selected type from the database -->



	<!-- To enable more options when we have an appartment or suite room -->
		<script type="text/javascript">
			$(document).ready(function(){
			  $("#sell").change(function(){
			  	// if the values of the selection ar 7, 8, 10,11 then enable the addition info
			    var type_value =$(this).val();
			    if (type_value == 7 || type_value == 8 || type_value == 10 || type_value == 11) {
			    	 $("#more_options").show();
			    	 // alert(type_value);
			    }
			    else{
			    	 $("#more_options").hide();
			    }

			  });
			});
		</script>
	<!-- END To enable more options when we have an appartment or suite room -->

	<!--START To show the rest of the opetions when user selects the room type -->
	<script type="text/javascript">
		$(document).ready(function(){
			  $("#sell").change(function(){
			  	// if the values of the selection ar 7, 8, 10,11 then enable the addition info
			    var type_value =$(this).val();
			    if (type_value > 0) {
			    	 $("#room_size").show();
			    	 $("#price_options").show();
			    	 // alert(type_value);
			    }
			    else{
			    	 $("#room_size").hide();
			    	 $("#price_options").hide();
			    }

			  });
			});

	</script>
	<!--END To show the rest of the opetions when user selects the room type -->
		
</body>


</html>
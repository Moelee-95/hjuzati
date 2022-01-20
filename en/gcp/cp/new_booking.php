<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	 <meta name="author" content="Hjuzati by.Mohammed S. Hazim" />
	<title>Hjuzati | New Booking</title>
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
	<!-- Template Styles -->
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/theme-color.css" rel="stylesheet" type="text/css" />
	<!-- dropzone -->
	<link href="assets/plugins/dropzone/dropzone.css" rel="stylesheet" media="screen">
	<!-- Date Time item CSS -->
	<link rel="stylesheet" href="assets/plugins/flatpicker/flatpickr.min.css">
	<!-- favicon -->
	<link rel="shortcut icon" href="assets/img/favicon.ico" />
</head>
<!-- END HEAD -->

<body
	class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
	<div class="page-wrapper">
		<!-- start header -->
<?php include('sections/header.php'); ?>
		<!-- end header -->
		<!-- start page container -->
		<div class="page-container">
			<!-- start sidebar menu -->
			<?php include('sections/sidebar-container.php');?>
			<!-- end sidebar menu -->
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Add Room Booking</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Booking</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Add Booking</li>
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
											<div class="row mrg-top">
												<div class="col-lg-5 col-md-5 col-sm-12 d-inline" style="padding: 20px">
													<input type="text" name="hotel_id" id="hotel_id" value="<?php echo $hotel_id ?>">
													<input type="text" name="room_id" id="room_id" value="room id">
													<input type="text" name="">
													<label class="">Room type</label>
													<br>
													<input type="" name="">
													<div class="valid-feedback">Looks good!</div>
													<div class="invalid-feedback">Please provide a valid Room Type.</div>
												</div>
												<div class="col-lg-5 col-md-5 col-sm-12 d-inline" style="padding:20px;">
												<?php
													foreach ($get_r_fetch as $r_fetch) { ?>
													<div id="<?php r_names_title($r_fetch['rooms_names']); ?>" style="display: none;">
														<label class="" id="room_name_text" style="">Room name</label>
														<select required style="width:100%" class="under_line form-control form-control-lg inpt_check" name="room_name" >
															<option value="0" class="hidden" selected="selected" >Please select</option>
															<?php 
															foreach ($r_fetch as  $r_fet) {
																$exploded = explode(',', $r_fet);
																foreach ($exploded as $key => $ex_names) {  ?>
															<option value="<?php echo $ex_names ?>"><?php r_names($r_fet,$key); ?></option>
															<?php } } ?>
														</select>
														 <div class="valid-feedback">Looks good!</div>
															<div class="invalid-feedback">Please provide a valid Room Name.</div>
													</div>
															<?php  }  ?>
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
											<div id="more_options" class="row mrg-top" style="display: none;padding:10px">
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
													<div class="d-inline"  id="guest_logo" style=""></div>
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
															  <input type="radio" id="offer_yes" name="offer_lower_if_fewer_guest_num" class="custom-control-input" value="yes">
															  <label class="custom-control-label" for="offer_yes">Yes</label>
															</div>
															<div class="custom-control custom-radio custom-control-inline">
															  <input checked type="radio" id="offer_no" name="offer_lower_if_fewer_guest_num" class="custom-control-input" value="no">
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
												
							
												<button type="button" id="submit_room" onclick="showInputs();" class="btn btn-primary btn-lg col-12">Submit Room</button>
									</form>
								</div>
							</div>
						</div><!-- End Actual data -->
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
	<!-- start js include path -->
	<script src="assets/plugins/jquery/jquery.min.js"></script>
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
	<!-- dropzone -->
	<script src="assets/plugins/dropzone/dropzone.js"></script>
	<script src="assets/plugins/dropzone/dropzone-call.js"></script>
	<!-- date and time 	 -->
	<script src="assets/plugins/flatpicker/flatpickr.min.js"></script>
	<script src="assets/js/pages/datetime/datetime-data.js"></script>
	<!-- animation -->
	<script src="assets/js/pages/ui/animations.js"></script>
	<!-- end js include path -->
</body>

</html>
<?php

$current_page =(basename($_SERVER['PHP_SELF']));
?>

<div class="sidebar-container">
				<div class="sidemenu-container navbar-collapse collapse fixed-menu">
					<div id="remove-scroll">
						<ul class="sidemenu page-header-fixed p-t-20" data-keep-expanded="false" data-auto-scroll="true"
							data-slide-speed="200">
							<li class="sidebar-toggler-wrapper hide">
								<div class="sidebar-toggler">
									<span></span>
								</div>
							</li>
							<li class="sidebar-user-panel">
								<div class="user-panel">
									<div class="row">
										<div class="sidebar-userpic">
											<img src="assets/img/dp.jpg" class="img-responsive" alt=""> </div>
									</div>
									<div class="profile-usertitle">
										<div class="sidebar-userpic-name"> <?php echo $guestFName;?> </div>
										<!-- <div class="profile-usertitle-job"> Manager </div> -->
									</div>
									<div class="sidebar-userpic-btn">
										<!-- profile button -->
										<!-- <a class="tooltips" href="user_profile.php" data-placement="top"
											data-original-title="Profile">
											<i class="material-icons">person_outline</i>
										</a> -->
										<!-- Email and Chat dissabeld -->
											<!--
										<a class="tooltips" href="email_inbox.php" data-placement="top"
											data-original-title="Mail">
											<i class="material-icons">mail_outline</i>
										</a>
										<a class="tooltips" href="chat.php" data-placement="top"
											data-original-title="Chat">
											<i class="material-icons">chat</i>
										</a>
										-->
										<!-- End of mail and chat icons -->
										<!-- <a class="tooltips" href="logout.php" data-original-title="Switch Hotel">
										<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										  <path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z"/>
										</svg>

										 </a>
										<a class="tooltips" href="../logout.php" data-placement="top"
											data-original-title="Logout">
											<i class="material-icons">input</i>
										</a> -->
									</div>
								</div>
							</li>
							<li class="menu-heading">
								<span>Menue</span>
							</li>
							<li class="nav-item start <?php if($current_page=="index.php"){
								echo "active";
							} ?>">
								<a href="index.php" class="nav-link nav-toggle">
									<i class="material-icons">dashboard</i>
									<span class="title">Dashboard (Main)</span>
									<?php if($current_page=="index.php"){
											?><span class="selected"></span><?php } ?>
									<span class="arrow <?php if($current_page=="index.php"){
								echo "open";
							} ?>"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item <?php if($current_page=="index.php"){
								echo "active";}?>">
										<a href="index.php" class="nav-link ">
											<span class="title">Main</span>
											<?php if($current_page=="index.php"){
											?><span class="selected"></span><?php } ?>
											
										</a>
									</li>
									
								</ul>
							</li>
							
							<li class="nav-item <?php if($current_page=="new_booking.php" ||$current_page=="view_booking.php"  || $current_page=="edit_booking.php" ){
								echo "active";
							} ?>">
								<a href="#" class="nav-link nav-toggle">
									<i class="material-icons">payment</i>
									<span class="title">Payment</span>
									<span class="arrow <?php if($current_page=="paymentMethod.php" ||$current_page=="paymentMethod.php" ){
										echo "open";
										} ?>"></span>
								</a>
								<ul class="sub-menu ">
									<li class="nav-item <?php if($current_page=="paymentMethod.php"){
								echo "active";} ?>">
										<a href="paymentMethod.php" class="nav-link ">
											<span class="title">Payment Method</span>
											<?php if($current_page=="paymentMethod.php"){
											?><span class="selected"></span><?php } ?>
										</a>
									</li>
									
								</ul>
							</li>
							
							<li class="nav-item <?php if($current_page=="new_booking.php" ||$current_page=="view_booking.php"  || $current_page=="edit_booking.php" ){
								echo "active";
							} ?>">
								<a href="#" class="nav-link nav-toggle">
									<i class="far fa-heart"></i>
									<span class="title">Saved</span>
									<span class="arrow <?php if($current_page=="favirotHotels.php" ||$current_page=="favirotHotels.php" ){
										echo "open";
										} ?>"></span>
								</a>
								<ul class="sub-menu ">
									<li class="nav-item <?php if($current_page=="favirotHotels.php"){
								echo "active";} ?>">
										<a href="favirotHotels.php" class="nav-link ">
											<span class="title">Favirot Hotels</span>
											<?php if($current_page=="favirotHotels.php"){
											?><span class="selected"></span><?php } ?>
										</a>
									</li>
									
								</ul>
							</li>

							<li class="nav-item <?php if($current_page=="new_booking.php" ||$current_page=="view_booking.php"  || $current_page=="edit_booking.php" ){
								echo "active";
							} ?>">
								<a href="#" class="nav-link nav-toggle">
									<i class="material-icons">business_center</i>
									<span class="title">Booking</span>
									<span class="arrow <?php if($current_page=="new_booking.php" ||$current_page=="view_booking.php" || $current_page=="edit_booking.php" ){
										echo "open";
										} ?>"></span>
								</a>
								<ul class="sub-menu ">
									<li class="nav-item <?php if($current_page=="new_booking.php" ){
								echo "active";} ?>">
										<a href="../../index.php" class="nav-link">
											<span class="title">New Booking</span>
											<?php if($current_page=="new_booking.php"){
											?><span class="selected"></span><?php } ?>
										</a>
									</li>
									<li class="nav-item <?php if($current_page=="view_booking.php"){
								echo "active";} ?>">
										<a href="view_booking.php" class="nav-link ">
											<span class="title">View Booking</span>
											<?php if($current_page=="view_booking.php"){
											?><span class="selected"></span><?php } ?>
										</a>
									</li>
									<?php if($current_page=="edit_booking.php"){ ?>
									<li class="nav-item <?php if($current_page=="edit_booking.php" ){
								echo "active";} ?>">
										<a href="edit_booking.php" class="nav-link ">
											<span class="title">Edit Booking</span>
											<?php if($current_page=="edit_booking.php"){
											?><span class="selected"></span><?php } ?>
										</a>
									</li>
									<?php } ?>
								</ul>
							</li>
							 
							<!-- End of rates and availability -->
						

							
							<!-- ================== Photos  =================== -->
							<li class="nav-item <?php if($current_page=="setting.php" || $current_page=="chengePassword.php"  || $current_page=="userInfo.php"  ){
								echo "active";
							} ?>">
								<a href="#" class="nav-link nav-toggle">
									<i class="material-icons">settings</i>
									<span class="title">Setting</span>
									<span class="arrow <?php if($current_page=="setting.php" || $current_page=="chengePassword.php"  || $current_page=="userInfo.php" ){
								echo "open";
							} ?>"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item <?php if($current_page=="userInfo.php" ){
									echo "active";} ?>">
										<a href="userInfo.php" class="nav-link ">
											<span class="title">User Information</span>
											<?php if($current_page=="userInfo.php"){
											?><span class="selected"></span><?php } ?>
										</a>
									</li>
									
									<!-- <li class="nav-item <?php if($current_page=="setting.php" ){
								echo "active";} ?>">
										<a href="hotel_photos.php" class="nav-link ">
											<span class="title">Setting</span>
											<?php if($current_page=="hotel_photos.php"){
											?><span class="selected"></span><?php } ?>
										</a>
									</li>
									
									<li class="nav-item <?php if($current_page=="changePassword.php" ){
								echo "active";} ?>">
										<a href="rooms_photos.php" class="nav-link ">
											<span class="title">Change Password</span>
											<?php if($current_page=="rooms_photos.php"){
											?><span class="selected"></span><?php } ?>
										</a>
									</li> -->

									
								</ul>
							</li>
							 <!-- ======================= End Photos ======================= -->

							<!-- Staff & Transportation  (Disabled ) -->
							<!--

							<li class="nav-item <?php if($current_page=="ooooooo.php" ||$current_page=="oooooo.php"  || $current_page=="oooooo.php" ){
								echo "active";
							} ?>">
								<a href="#" class="nav-link nav-toggle">
									<i class="material-icons">group</i>
									<span class="title">Staff</span>
									<span class="arrow <?php if($current_page=="ooooooo.php" ||$current_page=="oooooo.php"  || $current_page=="oooooo.php" ){
								echo "open";
							} ?>"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="add_staff.php" class="nav-link ">
											<span class="title">Add Staff Details
									</li>
									<li class="nav-item">
										<a href="all_staffs.php" class="nav-link ">
											<span class="title">View All Staffs
									</li>
									<li class="nav-item">
										<a href="edit_staff.php" class="nav-link ">
											<span class="title">Edit Staff Details
									</li>
								</ul>
							</li>
							<li class="nav-item <?php if($current_page=="ooooooo.php" ||$current_page=="oooooo.php"  || $current_page=="oooooo.php" ){
								echo "active";
							} ?>">
								<a href="#" class="nav-link nav-toggle">
									<i class="material-icons">local_taxi</i>
									<span class="title">Transportation</span>
									<span class="arrow <?php if($current_page=="ooooooo.php" ||$current_page=="oooooo.php"  || $current_page=="oooooo.php" ){
								echo "open";
							} ?>"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="add_vehicle.php" class="nav-link ">
											<span class="title">Add Vehicle Details
									</li>
									<li class="nav-item">
										<a href="all_vehicles.php" class="nav-link ">
											<span class="title">View All Vehicle
									</li>
									<li class="nav-item">
										<a href="edit_vehicle.php" class="nav-link ">
											<span class="title">Edit Vehicle Details
									</li>
								</ul>
							</li>

							-->
						<!-- End of Staff & transportation section -->
							<!-- <li class="menu-heading m-t-20">
								<span>-- Layout, Apps &amp; Widget</span>
							</li>
							<li class="nav-item <?php if($current_page=="ooooooo.php" ||$current_page=="oooooo.php"  || $current_page=="oooooo.php" ){
								echo "active";
							} ?>">
								<a href="#" class="nav-link nav-toggle"> <i class="material-icons">desktop_mac</i>
									<span class="title">Layout</span> <span class="arrow <?php if($current_page=="ooooooo.php" ||$current_page=="oooooo.php"  || $current_page=="oooooo.php" ){
								echo "open";
							} ?>"></span>
									<?php if($current_page=="index.php"){
											?><span class="selected"></span><?php } ?>
								</a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="layout_boxed.php" class="nav-link "> <span class="title">Boxed</span>
											<?php if($current_page=="index.php"){
											?><span class="selected"></span><?php } ?>
										</a>
									</li>
									<li class="nav-item">
										<a href="layout_full_width.php" class="nav-link "> <span class="title">Full
												Width</span>
												<?php if($current_page=="index.php"){
											?><span class="selected"></span><?php } ?>
										</a>
									</li>
									<li class="nav-item">
										<a href="layout_collapse.php" class="nav-link "> <span class="title">Collapse
												Menu</span>
												<?php if($current_page=="index.php"){
											?><span class="selected"></span><?php } ?>
										</a>
									</li>
									<li class="nav-item">
										<a href="layout_right_sidebar.php" class="nav-link "> <span class="title">Right
												Sidebar</span>
												<?php if($current_page=="index.php"){
											?><span class="selected"></span><?php } ?>
										</a>
									</li>
									<li class="nav-item">
										<a href="layout_sidebar_hover_menu.php" class="nav-link "> <span
												class="title">Hover Sidebar Menu
									</li>
									<li class="nav-item">
										<a href="layout_mega_menu.php" class="nav-link "> <span class="title">Mega
												Menu</span>
												<?php if($current_page=="index.php"){
											?><span class="selected"></span><?php } ?>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item <?php if($current_page=="ooooooo.php" ||$current_page=="oooooo.php"  || $current_page=="oooooo.php" ){
								echo "active";
							} ?>">
								<a href="#" class="nav-link nav-toggle"> <i class="material-icons">grain</i>
									<span class="title">Apps</span> <span class="arrow <?php if($current_page=="ooooooo.php" ||$current_page=="oooooo.php"  || $current_page=="oooooo.php" ){
								echo "open";
							} ?>"></span>
									<?php if($current_page=="index.php"){
											?><span class="selected"></span><?php } ?>
								</a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="chat.php" class="nav-link "> <span class="title">Chat
									</li>
									<li class="nav-item">
										<a href="contact_list.php" class="nav-link "> <span class="title">Contact
												List</span>
												<?php if($current_page=="index.php"){
											?><span class="selected"></span><?php } ?>
										</a>
									</li>
									<li class="nav-item">
										<a href="contact_grid.php" class="nav-link "> <span class="title">Contact
												Grid</span>
												<?php if($current_page=="index.php"){
											?><span class="selected"></span><?php } ?>
										</a>
									</li>
									<li class="nav-item">
										<a href="gallery.php" class="nav-link "> <span class="title">Gallery</span>
											<?php if($current_page=="index.php"){
											?><span class="selected"></span><?php } ?>
										</a>
									</li>
									<li class="nav-item">
										<a href="support.php" class="nav-link "> <span class="title">Support</span>
											<?php if($current_page=="index.php"){
											?><span class="selected"></span><?php } ?>
										</a>
									</li>
									<li class="nav-item">
										<a href="calendar.php" class="nav-link "> <span class="title">Calendar</span>
											<?php if($current_page=="index.php"){
											?><span class="selected"></span><?php } ?>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item <?php if($current_page=="ooooooo.php" ){
								echo "active";
							} ?>">
								<a href="widget.php" class="nav-link nav-toggle"> <i class="material-icons">widgets</i>
									<span class="title">Widget</span>

								</a>
							</li> -->
						</ul>
					</div>
				</div>
			</div>
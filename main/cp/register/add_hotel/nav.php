<?php

if (isset($_COOKIE['login_user']) and isset($_COOKIE['userName']) and isset($_COOKIE['userPassword'])) {
    if (isset($_SESSION['login_user'])) {
		//pass
    }
    else{
        $_SESSION['login_user'] = $_COOKIE['login_user'];
        $_SESSION['userName'] = $_COOKIE['userName'];
    }
}
elseif (!isset($_COOKIE['login_user']) and !isset($_SESSION['login_user'])) {
	header("Location:../logout.php");
	exit();
  }

$actual_link = basename($_SERVER['PHP_SELF']);
if ($actual_link == "profile.php") {
	$active_profile = "active";
}
/*	if ($actual_link == "layout_pricing.php") {
	$active_layout = "active";
}*/
// if ($actual_link == "facilities.php") {
// 	$active_facilities = "active";
// }
// if ($actual_link == "amenities.php") {
// 	$active_amenities = "active";
// }
if ($actual_link == "photos.php") {
	$active_photos = "active";
}
if ($actual_link == "policies.php") {
	$active_policies = "active";
}
if ($actual_link == "payment.php") {
	$active_payment = "active";
}
if ($actual_link == "agreement.php") {
	$active_agreement = "active";
}
 ?>


<nav  style="max-width: 90%">
	<ul class="alert alert-info" >
		<li ><a id="<?php echo $active_profile ?>" class="<?php include('check.php'); echo $b_info ?>" href="profile.php"><b class="<?php echo $b_info ?>" hidden  > ✔️</b>
		   Basic Info 
		</a></li>
<!-- 		<li><a id="<?php /*echo $active_layout*/ ?>" class="<?php /*echo $b_layout*/ ?>" href="layout_pricing.php"> <b class="<?php /*echo $b_layout*/ ?>" hidden  > ✔️</b>  Layout & Pricing</a></li> -->
<!-- 		<li style="width: 170px;" ><a id="<?php echo $active_facilities ?>" class="<?php echo $b_f_s ?>" href="facilities.php"><b class="<?php  echo $b_f_s ?>" hidden  > ✔️</b>  Facilities & Services</a></li> -->

<!-- 		<li><a id="<?php echo $active_amenities ?>" class="<?php echo $amenities ?>" href="amenities.php"><b class="<?php  echo $amenities ?>" hidden  > ✔️</b>Amenities</a></li> -->

		<li><a id="<?php echo $active_photos ?>" href="photos.php" class="<?php echo $photos?>" ><b class="<?php  echo $photos ?>" hidden  > ✔️</b>Photos</a></li>

		<li ><a id="<?php echo $active_policies ?>" class="<?php echo $p_policies ?>" href="policies.php">
		<b class="<?php echo $p_policies ?>" hidden  > ✔️</b>Policies</a></li>

		<li><a id="<?php echo $active_payment ?>" class="<?php echo $p_payment ?>" href="payment.php">
		<b class="<?php echo $p_payment ?>" hidden  > ✔️</b>Payment</a></li>

		<li><a id="<?php echo $active_agreement ?>" href="agreement.php">Agreement</a></li>
	</ul>
</nav>
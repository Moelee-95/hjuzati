
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	 <meta name="author" content="HimaHotels by.Mohammed S. Hazim" />
	<title>Spice Hotel | Bootstrap 4 Admin Dashboard Template + UI Kit</title>
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
								<div class="page-title">Buttons</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">UI Elements</a>&nbsp;<i
										class="fa fa-angle-right"></i>
								</li>
								<li class="active">Buttons</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="card  card-box">
								<div class="card-head">
									<header>Default Buttons</header>
								</div>
								<div class="card-body ">
									<div class="row">
										<div class="col-md-12">
											<button type="button" class="btn btn-round btn-default">Default</button>
											<button type="button" class="btn btn-round btn-primary">Primary</button>
											<button type="button" class="btn btn-round btn-success">Success</button>
											<button type="button" class="btn btn-round btn-info">Info</button>
											<button type="button" class="btn btn-round btn-warning">Warning</button>
											<button type="button" class="btn btn-round btn-danger">Danger</button>
											<br>
											<h4 class="sub-title">Disable buttons</h4>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<button class="btn btn-default disabled m-b-10">Disabled</button>
											<button class="btn btn-primary disabled m-b-10">Disabled</button>
											<button class="btn btn-success disabled m-b-10">Disabled</button>
											<button class="btn btn-info disabled m-b-10">Disabled</button>
											<button class="btn btn-warning disabled m-b-10">Disabled</button>
											<button class="btn btn-danger disabled m-b-10">Disabled</button>
											<br>
											<h4 class="sub-title">Outline Buttons</h4>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<button type="button"
												class="btn default btn-outline m-b-10">Default</button>
											<button type="button" class="btn red btn-outline m-b-10">Red</button>
											<button type="button"
												class="btn blue-bgcolor btn-outline m-b-10">Blue</button>
											<button type="button" class="btn deepPink btn-outline m-b-10">Deep
												Pink</button>
											<button type="button" class="btn yellow btn-outline m-b-10">Yellow</button>
											<button type="button" class="btn purple btn-outline m-b-10">Purple</button>
											<button type="button" class="btn dark btn-outline m-b-10">Dark</button>
											<br>
											<h4 class="sub-title">Buttons Size</h4>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<button type="button" class="btn btn-default btn-lg m-b-10">Large
												Button</button>
											<button type="button" class="btn btn-primary m-b-10">Default
												Button</button>
											<button type="button" class="btn btn-success btn-sm m-b-10">Small
												Button</button>
											<button type="button" class="btn btn-info btn-xs m-b-10">Extra
												Small Button</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card  card-box">
								<div class="card-head">
									<header>Rounded Buttons</header>
								</div>
								<div class="card-body ">
									<div class="row">
										<div class="col-md-12">
											<button type="button" class="btn btn-circle btn-default">Default</button>
											<button type="button" class="btn btn-circle btn-primary">Primary</button>
											<button type="button" class="btn btn-circle btn-success">Success</button>
											<button type="button" class="btn btn-circle btn-info">Info</button>
											<button type="button" class="btn btn-circle btn-warning">Warning</button>
											<button type="button" class="btn btn-circle btn-danger">Danger</button>
											<br>
											<h4 class="sub-title">Disable Rounded Buttons</h4>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<button class="btn btn-circle btn-default disabled m-b-10">Disabled</button>
											<button class="btn btn-circle btn-primary disabled m-b-10">Disabled</button>
											<button class="btn btn-circle btn-success disabled m-b-10">Disabled</button>
											<button class="btn btn-circle btn-info disabled m-b-10">Disabled</button>
											<button class="btn btn-circle btn-warning disabled m-b-10">Disabled</button>
											<button class="btn btn-circle btn-danger disabled m-b-10">Disabled</button>
											<br>
											<h4 class="sub-title">Outline Rounded Buttons</h4>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<button type="button"
												class="btn default btn-outline btn-circle m-b-10">Default</button>
											<button type="button"
												class="btn red btn-outline btn-circle m-b-10">Red</button>
											<button type="button"
												class="btn blue-bgcolor btn-outline btn-circle m-b-10">Blue</button>
											<button type="button"
												class="btn deepPink btn-outline btn-circle m-b-10">Deep Pink</button>
											<button type="button"
												class="btn yellow btn-outline btn-circle m-b-10">Yellow</button>
											<button type="button"
												class="btn purple btn-outline btn-circle m-b-10">Purple</button>
											<button type="button"
												class="btn dark btn-outline btn-circle m-b-10">Dark</button>
											<br>
											<h4 class="sub-title">Rounded Buttons Size</h4>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<button type="button" class="btn btn-circle btn-default btn-lg m-b-10">Large
												button</button>
											<button type="button" class="btn btn-circle btn-primary m-b-10">Default
												button</button>
											<button type="button" class="btn btn-circle btn-success btn-sm m-b-10">Small
												button</button>
											<button type="button" class="btn btn-circle btn-info btn-xs m-b-10">Extra
												small button</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="card  card-box">
								<div class="card-head">
									<header>Group Buttons</header>
								</div>
								<div class="card-body ">
									<div class="row">
										<div class="col-md-12">
											<div class="btn-group">
												<button type="button" class="btn btn-default">Left</button>
												<button type="button" class="btn btn-default">Middle</button>
												<button type="button" class="btn btn-default">Right</button>
											</div>
											<div class="btn-group btn-group-solid">
												<button type="button" class="btn btn-info">Left</button>
												<button type="button" class="btn btn-warning">Middle</button>
												<button type="button" class="btn deepPink-bgcolor">Right</button>
											</div>
											<br>
											<h4 class="sub-title">Vertical buttons groups</h4>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="btn-group-vertical">
												<button class="btn btn-info" type="button">Top</button>
												<button class="btn deepPink-bgcolor" type="button">Middle</button>
												<button class="btn yellow" type="button">Bottom</button>
											</div>
											<br>
											<h4 class="sub-title">Group Checkbox</h4>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="btn-group" data-toggle="buttons">
												<label class="btn btn-primary deepPink-bgcolor">
													<input type="checkbox"> Option 1
												</label>
												<label class="btn btn-primary deepPink-bgcolor">
													<input type="checkbox"> Option 2
												</label>
												<label class="btn btn-primary deepPink-bgcolor">
													<input type="checkbox"> Option 3
												</label>
											</div>
											<br>
											<h4 class="sub-title">Multiple buttons group</h4>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="btn-toolbar mg-bottom-10">
												<div class="btn-group">
													<button type="button" class="btn btn-default">1</button>
													<button type="button" class="btn btn-default">2</button>
													<button type="button" class="btn btn-default">3</button>
													<button type="button" class="btn btn-default">4</button>
												</div>
												<div class="btn-group">
													<button type="button" class="btn btn-default">5</button>
													<button type="button" class="btn btn-default">6</button>
													<button type="button" class="btn btn-default">7</button>
												</div>
												<div class="btn-group">
													<button type="button" class="btn btn-default">8</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card  card-box">
								<div class="card-head">
									<header>Rounded Group Buttons</header>
								</div>
								<div class="card-body ">
									<div class="row">
										<div class="col-md-12">
											<div class="btn-group btn-group-circle">
												<button type="button" class="btn btn-default">Left</button>
												<button type="button" class="btn btn-default">Middle</button>
												<button type="button" class="btn btn-default">Right</button>
											</div>
											<div class="btn-group btn-group-circle btn-group-solid">
												<button type="button" class="btn btn-info">Left</button>
												<button type="button" class="btn btn-warning">Middle</button>
												<button type="button" class="btn deepPink-bgcolor">Right</button>
											</div>
											<br>
											<h4 class="sub-title">Vertical buttons groups</h4>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="btn-group-vertical btn-group-vertical-circle margin-right-10">
												<button class="btn btn-info" type="button">Top</button>
												<button class="btn deepPink-bgcolor" type="button">Middle</button>
												<button class="btn yellow" type="button">Bottom</button>
											</div>
											<br>
											<h4 class="sub-title">Group Checkbox</h4>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="btn-group btn-group-circle" data-toggle="buttons">
												<label class="btn btn-primary deepPink-bgcolor">
													<input type="checkbox"> Option 1
												</label>
												<label class="btn btn-primary deepPink-bgcolor">
													<input type="checkbox"> Option 2
												</label>
												<label class="btn btn-primary deepPink-bgcolor">
													<input type="checkbox"> Option 3
												</label>
											</div>
											<br>
											<h4 class="sub-title">Multiple buttons group</h4>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="btn-toolbar mg-bottom-10">
												<div class="btn-group btn-group-circle">
													<button type="button" class="btn btn-default">1</button>
													<button type="button" class="btn btn-default">2</button>
													<button type="button" class="btn btn-default">3</button>
													<button type="button" class="btn btn-default">4</button>
												</div>
												<div class="btn-group btn-group-circle">
													<button type="button" class="btn btn-default">5</button>
													<button type="button" class="btn btn-default">6</button>
													<button type="button" class="btn btn-default">7</button>
												</div>
												<div class="btn-group">
													<button type="button" class="btn btn-circle btn-default">8</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="card  card-box">
								<div class="card-head">
									<header>Buttons With Icons</header>
								</div>
								<div class="card-body ">
									<div class="row">
										<div class="col-md-12">
											<button type="button" class="btn btn-success"><i class="fa fa-plus"></i> Add
											</button>
											<button data-toggle="button" class="btn btn-primary"><i
													class="fa fa-thumbs-up "></i> 12</button>
											<button type="button" class="btn btn-info "><i class="fa fa-cogs"></i>
												Setting</button>
											<button type="button" class="btn btn-default "><i
													class="fa fa-cloud-upload"></i> Upload</button>
											<button data-toggle="button" class="btn btn-default"><i
													class="fa fa-font"></i>
											</button>
											<button data-toggle="button" class="btn btn-default"><i
													class="fa fa-search"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card  card-box">
								<div class="card-head">
									<header>Rounded Buttons With Icons</header>
								</div>
								<div class="card-body ">
									<div class="row">
										<div class="col-md-12">
											<button type="button" class="btn btn-circle btn-success"><i
													class="fa fa-plus"></i> Add </button>
											<button data-toggle="button" class="btn btn-circle btn-primary"><i
													class="fa fa-thumbs-up "></i> 12</button>
											<button type="button" class="btn btn-circle btn-info "><i
													class="fa fa-cogs"></i> Setting</button>
											<button type="button" class="btn btn-circle btn-default "><i
													class="fa fa-cloud-upload"></i> Upload</button>
											<button data-toggle="button" class="btn btn-circle btn-default"><i
													class="fa fa-font"></i>
											</button>
											<button data-toggle="button" class="btn btn-circle btn-default"><i
													class="fa fa-search"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="card  card-box">
								<div class="card-head">
									<header>Dropdowns Buttons</header>
								</div>
								<div class="card-body ">
									<div class="btn-group">
										<button data-toggle="dropdown" class="btn btn-default dropdown-toggle m-r-20"
											type="button">
											Default <span class="caret"></span>
										</button>
										<ul role="menu" class="dropdown-menu">
											<li><a href="#">New File</a>
											</li>
											<li><a href="#">Save as</a>
											</li>
											<li><a href="#">Open With</a>
											</li>
											<li class="divider"></li>
											<li><a href="#">Exit</a>
											</li>
										</ul>
									</div>
									<!-- button-group -->
									<div class="btn-group">
										<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle m-r-20"
											type="button">
											Primary <span class="caret"></span>
										</button>
										<ul role="menu" class="dropdown-menu">
											<li><a href="#">New File</a>
											</li>
											<li><a href="#">Save as</a>
											</li>
											<li><a href="#">Open With</a>
											</li>
											<li class="divider"></li>
											<li><a href="#">Exit</a>
											</li>
										</ul>
									</div>
									<!-- button-group -->
									<div class="btn-group">
										<button data-toggle="dropdown" class="btn btn-success dropdown-toggle m-r-20"
											type="button">
											Success <span class="caret"></span>
										</button>
										<ul role="menu" class="dropdown-menu">
											<li><a href="#">New File</a>
											</li>
											<li><a href="#">Save as</a>
											</li>
											<li><a href="#">Open With</a>
											</li>
											<li class="divider"></li>
											<li><a href="#">Exit</a>
											</li>
										</ul>
									</div>
									<!-- button-group -->
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card  card-box">
								<div class="card-head">
									<header>Rounded Buttons With Icons</header>
								</div>
								<div class="card-body ">
									<div class="btn-group">
										<button data-toggle="dropdown"
											class="btn btn-default btn-circle dropdown-toggle m-r-20" type="button">
											Default <span class="caret"></span>
										</button>
										<ul role="menu" class="dropdown-menu">
											<li><a href="#">New File</a>
											</li>
											<li><a href="#">Save as</a>
											</li>
											<li><a href="#">Open With</a>
											</li>
											<li class="divider"></li>
											<li><a href="#">Exit</a>
											</li>
										</ul>
									</div>
									<!-- button-group -->
									<div class="btn-group">
										<button data-toggle="dropdown"
											class="btn btn-primary btn-circle dropdown-toggle m-r-20" type="button">
											Primary <span class="caret"></span>
										</button>
										<ul role="menu" class="dropdown-menu">
											<li><a href="#">New File</a>
											</li>
											<li><a href="#">Save as</a>
											</li>
											<li><a href="#">Open With</a>
											</li>
											<li class="divider"></li>
											<li><a href="#">Exit</a>
											</li>
										</ul>
									</div>
									<!-- button-group -->
									<div class="btn-group">
										<button data-toggle="dropdown"
											class="btn btn-success btn-circle dropdown-toggle m-r-20" type="button">
											Success <span class="caret"></span>
										</button>
										<ul role="menu" class="dropdown-menu">
											<li><a href="#">New File</a>
											</li>
											<li><a href="#">Save as</a>
											</li>
											<li><a href="#">Open With</a>
											</li>
											<li class="divider"></li>
											<li><a href="#">Exit</a>
											</li>
										</ul>
									</div>
									<!-- button-group -->
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="card  card-box">
								<div class="card-head">
									<header>Split Dropdowns Button </header>
								</div>
								<div class="card-body ">
									<div class="btn-group">
										<button type="button" class="btn btn-default">Default</button>
										<button type="button" class="btn btn-default dropdown-toggle m-r-20"
											data-toggle="dropdown">
											<i class="fa fa-angle-down"></i>
										</button>
										<ul class="dropdown-menu" role="menu">
											<li><a href="#">New File</a>
											</li>
											<li><a href="#">Save as</a>
											</li>
											<li><a href="#">Open With</a>
											</li>
											<li class="divider"></li>
											<li><a href="#">Exit</a>
											</li>
										</ul>
									</div>
									<!-- button-group -->
									<div class="btn-group">
										<button type="button" class="btn btn-primary">Primary</button>
										<button type="button" class="btn btn-primary dropdown-toggle m-r-20"
											data-toggle="dropdown">
											<i class="fa fa-angle-down"></i>
										</button>
										<ul class="dropdown-menu" role="menu">
											<li><a href="#">New File</a>
											</li>
											<li><a href="#">Save as</a>
											</li>
											<li><a href="#">Open With</a>
											</li>
											<li class="divider"></li>
											<li><a href="#">Exit</a>
											</li>
										</ul>
									</div>
									<!-- button-group -->
									<div class="btn-group">
										<button type="button" class="btn btn-success">Success</button>
										<button type="button" class="btn btn-success dropdown-toggle m-r-20"
											data-toggle="dropdown">
											<i class="fa fa-angle-down"></i>
										</button>
										<ul class="dropdown-menu" role="menu">
											<li><a href="#">New File</a>
											</li>
											<li><a href="#">Save as</a>
											</li>
											<li><a href="#">Open With</a>
											</li>
											<li class="divider"></li>
											<li><a href="#">Exit</a>
											</li>
										</ul>
									</div>
									<!-- button-group -->
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card  card-box">
								<div class="card-head">
									<header>Split Dropdowns Rounded Button</header>
								</div>
								<div class="card-body ">
									<div class="btn-group btn-group-circle">
										<button type="button" class="btn btn-default">Default</button>
										<button type="button"
											class="btn btn-circle-right btn-default dropdown-toggle m-r-20"
											data-toggle="dropdown">
											<i class="fa fa-angle-down"></i>
										</button>
										<ul class="dropdown-menu" role="menu">
											<li><a href="#">New File</a>
											</li>
											<li><a href="#">Save as</a>
											</li>
											<li><a href="#">Open With</a>
											</li>
											<li class="divider"></li>
											<li><a href="#">Exit</a>
											</li>
										</ul>
									</div>
									<div class="btn-group btn-group-circle">
										<button type="button" class="btn btn-primary">Primary</button>
										<button type="button"
											class="btn btn-circle-right btn-primary dropdown-toggle m-r-20"
											data-toggle="dropdown">
											<i class="fa fa-angle-down"></i>
										</button>
										<ul class="dropdown-menu" role="menu">
											<li><a href="#">New File</a>
											</li>
											<li><a href="#">Save as</a>
											</li>
											<li><a href="#">Open With</a>
											</li>
											<li class="divider"></li>
											<li><a href="#">Exit</a>
											</li>
										</ul>
									</div>
									<div class="btn-group btn-group-circle">
										<button type="button" class="btn btn-success">Success</button>
										<button type="button"
											class="btn btn-circle-right btn-success dropdown-toggle m-r-20"
											data-toggle="dropdown">
											<i class="fa fa-angle-down"></i>
										</button>
										<ul class="dropdown-menu" role="menu">
											<li><a href="#">New File</a>
											</li>
											<li><a href="#">Save as</a>
											</li>
											<li><a href="#">Open With</a>
											</li>
											<li class="divider"></li>
											<li><a href="#">Exit</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="card  card-box">
								<div class="card-head">
									<header>Block level button</header>
								</div>
								<div class="card-body ">
									<button type="button" class="btn btn-default btn-block">Block level button</button>
									<button type="button" class="btn btn-warning btn-block">Block level button</button>
									<button type="button" class="btn btn-danger  btn-block">Block level button</button>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card  card-box">
								<div class="card-head">
									<header>Star Rating Example</header>
								</div>
								<div class="card-body ">
									<span class="rating"> <span class="star"></span> <span class="star"></span> <span
											class="star"></span> <span class="star"></span> <span class="star"></span>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card  card-box">
								<div class="card-head">
									<header>SOCIAL BUTTONS</header>
								</div>
								<div class="card-body ">
									<div class="button-list">
										<button type="button" class="btn btn-facebook waves-effect waves-light">
											<i class="fa fa-facebook"></i>
										</button>
										<button type="button" class="btn btn-twitter waves-effect waves-light">
											<i class="fa fa-twitter"></i>
										</button>
										<button type="button" class="btn btn-linkedin waves-effect waves-light">
											<i class="fa fa-linkedin"></i>
										</button>
										<button type="button" class="btn btn-dribbble waves-effect waves-light">
											<i class="fa fa-dribbble"></i>
										</button>
										<button type="button" class="btn btn-googleplus waves-effect waves-light">
											<i class="fa fa-google-plus"></i>
										</button>
										<button type="button" class="btn btn-instagram waves-effect waves-light">
											<i class="fa fa-instagram"></i>
										</button>
										<button type="button" class="btn btn-pinterest waves-effect waves-light">
											<i class="fa fa-pinterest"></i>
										</button>
										<button type="button" class="btn btn-dropbox waves-effect waves-light">
											<i class="fa fa-dropbox"></i>
										</button>
										<button type="button" class="btn btn-flickr waves-effect waves-light">
											<i class="fa fa-flickr"></i>
										</button>
										<button type="button" class="btn btn-tumblr waves-effect waves-light">
											<i class="fa fa-tumblr"></i>
										</button>
										<button type="button" class="btn btn-skype waves-effect waves-light">
											<i class="fa fa-skype"></i>
										</button>
										<button type="button" class="btn btn-youtube waves-effect waves-light">
											<i class="fa fa-youtube"></i>
										</button>
										<button type="button" class="btn btn-github waves-effect waves-light">
											<i class="fa fa-github"></i>
										</button>
										<br>
										<button type="button" class="btn btn-facebook waves-effect waves-light">
											<i class="fa fa-facebook m-r-5"></i> Facebook
										</button>
										<button type="button" class="btn btn-twitter waves-effect waves-light">
											<i class="fa fa-twitter m-r-5"></i> Twitter
										</button>
										<button type="button" class="btn btn-linkedin waves-effect waves-light">
											<i class="fa fa-linkedin m-r-5"></i> Linkedin
										</button>
										<button type="button" class="btn btn-dribbble waves-effect waves-light">
											<i class="fa fa-dribbble m-r-5"></i> Dribbble
										</button>
										<button type="button" class="btn btn-googleplus waves-effect waves-light">
											<i class="fa fa-google-plus m-r-5"></i> Google+
										</button>
										<button type="button" class="btn btn-instagram waves-effect waves-light">
											<i class="fa fa-instagram m-r-5"></i> Instagram
										</button>
										<button type="button" class="btn btn-pinterest waves-effect waves-light">
											<i class="fa fa-pinterest m-r-5"></i> Pinterest
										</button>
										<button type="button" class="btn btn-dropbox waves-effect waves-light">
											<i class="fa fa-dropbox m-r-5"></i> Dropbox
										</button>
										<button type="button" class="btn btn-flickr waves-effect waves-light">
											<i class="fa fa-flickr m-r-5"></i> Flickr
										</button>
										<button type="button" class="btn btn-tumblr waves-effect waves-light">
											<i class="fa fa-tumblr m-r-5"></i> Tumblr
										</button>
										<button type="button" class="btn btn-skype waves-effect waves-light">
											<i class="fa fa-skype m-r-5"></i> Skype
										</button>
										<button type="button" class="btn btn-youtube waves-effect waves-light">
											<i class="fa fa-youtube m-r-5"></i> Youtube
										</button>
										<button type="button" class="btn btn-github waves-effect waves-light">
											<i class="fa fa-github m-r-5"></i> Github
										</button>
									</div>
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
	<!-- animation -->
	<script src="assets/js/pages/ui/animations.js"></script>
	<!-- end js include path -->
</body>

</html>
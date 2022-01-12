

<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	 <meta name="author" content="HimaHotels by.Mohammed S. Hazim" />
	<title>Hjuzati || Rooms Photos </title>
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
	<!-- gallery -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
	<link rel="stylesheet" href="assets/gallery-grid.css">
	<!-- Template Styles -->
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/theme-color.css" rel="stylesheet" type="text/css" />
	<!-- favicon -->
	<link rel="shortcut icon" href="assets/img/favicon.ico" />
	<!-- for uploading photos from with coding passive incom -->
	<style type="text/css">
			#dropZone {
				border: 1px dashed #afb4bb;
				padding: 20px;
				margin-top: 10px;
			}

			#files {
				border: 1px dotted #0088cc;
				padding: 20px;
				width: 200px;
				display: none;
			}

            #error {
                color: red;
            }
		</style>

</head>
<!-- END HEAD -->

<body
	class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
	<div class="page-wrapper">
		<!-- start header -->
<?php include('sections/header.php'); ?>

<?php
  // Database connection
    include('../db/db_connect.php');
	require "../../../classes/removeFiles.php";
	$backPath = RemoveFiles::backPath();// back path

    //Setup session of the room id
    if (isset($_POST['roomID'])) {
    	$_SESSION['roomID'] = $_POST['roomID'];
    }
    //get the room photos paths from the database when the session have been setted
    if (isset($_SESSION['roomID'])) {
    	$roomID = $_SESSION['roomID'];
    	 // Bring the photos from the database
	    $sql = "SELECT * FROM roomsphotos WHERE rpRoomsID = '$roomID'";
	    $query = mysqli_query($conn, $sql);
	    $fetchAll = mysqli_fetch_all($query, MYSQLI_ASSOC);

    }


    if (isset($_FILES['attachments'])) {
    	$roomID = $_SESSION['roomID'];
        $msg = "";
        $targetFile = "$backPath/users/$login_user/hotels/$hotel_id/rooms/$roomID/" .time(). basename($_FILES['attachments']['name'][0]);
        if (file_exists($targetFile)){
            $msg = array("status" => 0, "msg" => "File already exists!");
        }

        else if (move_uploaded_file($_FILES['attachments']['tmp_name'][0], $targetFile)){
        		// Insert the photo path to the Database
    	 	$sql = "INSERT INTO `roomsphotos` (`rpRoomsID`, `rpPhotoPath`) VALUES ('$roomID', '$targetFile');";
    		$query = mysqli_query($conn, $sql);
    		if ($query) {
    			$msg = array("status" => 1, "msg" => "File Has Been Uploaded", "path" => $targetFile);
    		}
    		else {
    			$msg = array("status" => 0, "msg" => "Error adding path to the database!");
    		}
        }
       
	 exit(json_encode($msg));
    }

    //function to get the text name of the room Id 
    function getRoomName($roomID){
    	// Database connection
    	include('../db/db_connect.php');
    	//Get room name, type and custome name
    	$rooms = "SELECT r.rRoomID,r.rCustomName,rt.rtRoomTypeEn,rn.rnRoomNameEn FROM rooms r JOIN roomsnames rn on r.rRoomNameID = rn.rnRoomNameID JOIN roomstypes rt on rn.rnRoomTypeID = rt.rtRoomTypeID WHERE r.rRoomID = '$roomID'";
		$quer = mysqli_query($conn, $rooms);
		$fetch = mysqli_fetch_array($quer);

		if (!empty($fetch['rCustomName'])) {
			$return = $fetch['rCustomName'];
		}
		else {
			$return = $fetch['rtRoomTypeEn']."(".$fetch['rnRoomNameEn'].")";
		}
		return($return);
    }

   
?>

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
								<div class="page-title">Rooms Photos</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<!-- <li><a class="parent-item" href="#">Apps</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li> -->
								<li class="active">Rooms Photos</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header><?php if (isset($_SESSION['roomID'])) {
										echo getRoomName($_SESSION['roomID']);
									}; ?></header>
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
								<div class="card-body row">
									<div class="row" id="photos">
									            
									         </div>
									<div class="container gallery-container">
									    <center >

								            <?php
								            // Get list of the rooms, their names and types and custome names.
								            $rooms = "SELECT r.rRoomID,r.rCustomName,rt.rtRoomTypeEn,rn.rnRoomNameEn FROM rooms r JOIN roomsnames rn on r.rRoomNameID = rn.rnRoomNameID JOIN roomstypes rt on rn.rnRoomTypeID = rt.rtRoomTypeID WHERE r.rHotelID = '$hotel_id'";
								            $quer = mysqli_query($conn, $rooms);
								            $fetch_all = mysqli_fetch_all($quer, MYSQLI_ASSOC);
								            ?>

								            
											<div id="dropZone">
												<form action="rooms_photos.php" method="post" name="set_room" id="set_room">
												<div class="col-10">
									            	<h3>Select Rooms</h3>
									            	<div class="row" align="center" >
									            		<select  name="roomID" id="roomID" class="form-control" onchange="document.getElementById('set_room').submit();
">
										            	<?php foreach($fetch_all as $index => $room){
										            		//Select the text to be shown
										            		if (!empty($room['rCustomName'])) {
										            			$text = $room['rCustomName'];
										            		}
										            		else {
										            			$text = $room['rtRoomTypeEn']."(".$room['rnRoomNameEn'].")";
										            		}
										            		
										            	 ?>
										            	 <?php if (isset($_SESSION['roomID'])) { ?>
										            	 	<option value="<?php echo ($_SESSION['roomID']) ?>" selected hidden><?php echo getRoomName($_SESSION['roomID']); ?></option>
										            	 <?php }
										            	 else { ?>
										            	 		<option value="0" selected hidden> Please Select a room</option>
										            	 <?php } ?>
										            	 	
										            		<option value="<?php echo $room['rRoomID'] ?>"><?php echo $text; ?></option>
										            	<?php } ?>
										            	</select>
										            	<!-- <button type="submit" class="btn btn-primary form-control" name="submit">Set</button> -->
									            	</div>
									            	
									            	
								           		</div>
												</form>


								           		<hr>
												<h3>Drag & Drop Files...</h3>
												<label class="btn btn-primary" style="width: 200px">Add Photos 
													<input accept="" multiple type="file" class="form-control" name="attachments[]" id="fileupload" style="display: none;">
													<span class="glyphicon glyphicon-plus"></span>
												</label>
												
											</div>
											<h1 id="error"></h1>
											<h1 id="progress"></h1>
											<div id="files"></div>
										</center>
									    
									    <div class="tz-gallery">
									    	
									    	
									        <div class="row" id="photos">
									        	<?php if (isset($fetchAll)){ ?>
									        		<?php foreach ($fetchAll as $index => $info) { ?>
										            <div class="col-sm-6 col-md-4" id="<?php echo $info['rpPhotoPath']; ?>">
										            	<div id="options">
										            		<a class="btn btn-outline-danger" href="#" onclick="window.location.href = 'del_room_photo.php?photoID=<?php echo $info['rpPhotoID'];?>&photoPath=<?php echo $info['rpPhotoPath'];?>'"><i style="font-size: 13pt" class="material-icons">delete_forever</i></a>
										            		<!-- <a href="#" class="btn btn-outline-success"
										            		onclick="window.location.href ='hotel_set_main_photo.php?photoID=<?php echo $info['rpPhotoID']; ?>'" 
										            		>Set as main photo</a> -->
										            	</div>
										            	
										                <a class="lightbox" href="<?php echo $info['rpPhotoPath']; ?>">
										                    <img src="<?php echo $info['rpPhotoPath']; ?>" alt="" >
										                </a>
										            </div>
										            <?php  } ?>
									        	<?php }
									        	else {
									        		echo "<h2> Please Select A room first";
									        	} ?>
									        </div>
									        
									        

									    </div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->
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
	<!-- gallery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
	<script>
	    baguetteBox.run('.tz-gallery');
	</script>


<!-- ================================================================================================================= -->
	<!-- for uploading photos with coding passive incom -->
	<!-- #Note Scripts are saved in the assests folder as meantiond  -->
	<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
		<script src="assets/up_files/js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
		<script src="assets/up_files/js/jquery.iframe-transport.js" type="text/javascript"></script>
		<script src="assets/up_files/js/jquery.fileupload.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function () {
               var files = $("#files");
               $("#fileupload").fileupload({
                   url: 'rooms_photos.php',
                   dropZone: '#dropZone',
                   dataType: 'json',
                   autoUpload: false
               }).on('fileuploadadd', function (e, data) {
                   var fileTypeAllowed = /.\.(gif|jpg|png|jpeg)$/i;
                   var fileName = data.originalFiles[0]['name'];
                   var fileSize = data.originalFiles[0]['size'];

                   if (!fileTypeAllowed.test(fileName))
                        $("#error").html('Only images are allowed!');
                   else if (fileSize > 50000000)
                       $("#error").html('Your file is too big! Max allowed size is: 500KB');
                   else {
                       $("#error").html("");
                       data.submit();
                   }
               }).on('fileuploaddone', function(e, data) {
                    var status = data.jqXHR.responseJSON.status;
                    var msg = data.jqXHR.responseJSON.msg;
                    if (status == 1) {
                        var path = data.jqXHR.responseJSON.path;
                        
                        // Will Use referesh instead of append
                    } else
                        $("#error").html(msg);
               }).on('fileuploadprogressall', function(e,data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $("#progress").html("Completed: " + progress + "%");
                    if (progress == 100) {
                    	window.location.replace("rooms_photos.php");
                    }
               });
            });
        </script>
 <!-- ================================================================================================================= -->


	</body>


</html>
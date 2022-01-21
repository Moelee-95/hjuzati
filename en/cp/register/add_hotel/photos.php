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
include('../../../../db_connect.php'); 

	




 ?>
<!DOCTYPE html>
<html>
<?php include('header.php'); ?>

<style type="text/css">
	#dropZone {
		border: 3px dashed #0088cc;
		padding: 50px;
		width: 500px;
		margin-top: 20px;
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

    #image_view{
    	display:block;
    	width: 100%;
	    height: 100%; 
	    object-fit: contain;
    	margin-bottom: 7px;
    	border-radius: 3px;
    	border-bottom-left-radius: 0px;
    	border-bottom-right-radius:0px;
    }
    #img_div{
    	border: 1px solid #a0a0a0;
    	width: 180px;
    	height: 160px;
    	border-radius: 3px;
    }

</style>

<!-- Script to modify the picture to make it fit to the targeted canvas -->
<script type="text/javascript">


</script>
<?php include('nav.php'); ?>


<div class="container" style="">
	<div class="title">
		<legend class="big" style="font-weight:bold">Property photos </legend>
		<legend class="small">Great photos invite guests to get the full experience of your property, so upload some high-resolution photos that represent all your property has to offer. We will display these photos on your property's page on the Booking.com website.</legend>
	</div>
	<div class="alert contents" style="padding:8px;border:none;border-radius: 1px">
		 After you complete registration you will still be able to make changes to your listing before it goes live.
	</div>
	<div class="contents " style="margin-top: -8px">

	<!-- show this message using return value from the php code inform the user that their picture is uploaded 
	-->
		<h2 class="alert alert-success" id="status" style="display: none"></h2>


		<legend>Photo gallery</legend>

		<!-- to be linked with php code when upload at least one picture show this message -->
		<div id="great_thanks" name="great_thanks" class="alert alert-success" style="display: none;background-color: #f1fef2;border-color: #006607;border-radius: 1px;" >
			<p>
			    <span style="color: #333">
			        Great, thanks! You can now continue signing up. To increase your chances of getting more bookings, make sure to add additional photos later on — once you're up and running.
			    </span>
			</p>
		</div>
		<!-- End of Great thanks message -->

		<!-- Start of empty State aria form -->
		<!-- <div id="empty_state" ondrop="uploadFile()" ondragover="return false" style="border: 1px dashed #bdbdbd; padding: 10px;border-width: 
		2px;background-color: #eeeeee69"> -->
		<form id="upload_form" method="post" action="" role="form" class="form-horizontal" enctype="multipart/form-data">
			 <!-- <center>
			 	<legend class="big">Upload at least 1 photo</legend>
				<legend class="small">You will be able to upload more after regestration</legend>
			 </center> -->
			 <center>
			 	<!--  Drag and drop location 
			 	 <legend class="big" style="font-weight:500">Drag and Drop your photos here</legend> 
			 	<legend class="small" style="color: #7b7b7b">or</legend> -->
			 	
			    <label class="btn button" style="width: 200px">

				    Add Photos <input accept="" multiple type="file" class="form-control" name="attachments[]" id="fileupload" style="display: none">
				    <span class="glyphicon glyphicon-plus"></span>
				</label>
			   
				
				<p id="loaded_n_total"></p>
			 </center style="margin-bottom: 10px">
		</div>
		<!-- End of Empty state Aria state form -->

			<!-- <div id="dropZone">
				<h1>Drag & Drop Files...</h1>
				<input type="file" id="fileupload" name="attachments[]" multiple>
			</div>
			<h5 id="error"></h5><br><br>
			<h5 id="progress"></h5><br><br>
			<div id="files"></div>
		</center> -->

		<!-- <div class="form-group">

				</div>

			</form> -->
		<!-- End of not empty state div -->

		<!-- start of pictures dive view aria -->
			<div name="pictures_div" id="pictures_div" class="col-lg-12 clo-md-12 col-sm-12 col-xs-12 border" id="images_container" style="border: 1px solid #ccc;display: block;padding: 20px">
				<legend>Pictures that has been uploaded</legend>




				<?php
				$sql = "SELECT hpPath,hpID FROM hotelsphotos WHERE hotels_hHotelID ='$hotel_id'";
				$query = mysqli_query($conn,$sql);
				$fetch = mysqli_fetch_All($query,MYSQLI_ASSOC);
				
				//print_r($fetch);

				if (!empty($fetch)) {
					// Using Foreach to iterate through the list of the pictures 
					foreach ($fetch as $key => $picture){  ?>
						<div class="" style="display: inline-block;margin-top: 10px;margin-bottom: 15px" class="">
							<div id="img_div">
								<img id="image_view" name="<?php echo $picture ?>" class="" src="<?php echo $picture['hpPath']; ?>" style="" />

								<a  href="remove_picture.php?pic_id=<?php echo $picture['hpID']; ?>&url=<?php echo $picture['hpPath']; ?>"  href="delete hotel picture path" class="delete" style="padding:9px 82px 9px;border-top:none;border-top-right-radius: 0px;border-top-left-radius: 0px"><span class="glyphicon glyphicon-trash" style=""></span></a>
							</div>
						</div>		
				<?php } 
				}?>
				<!-- ### java script will add it, we don't need it ###
						<div id="progress_div" class='' style='display: none;margin-top: 0px;width: 180px'>
								<img id='image_view' src='' alt='image' style='display:block;width: 180px;height: 160px;margin-bottom: -2px;border-radius: 3px;border-bottom-left-radius: 0px;border-bottom-right-radius:0px;z-index: -1;opacity: 50%' />
								<div class='progress' style='margin-bottom: 8px;margin-top: 2px'>
									<div id='progressing' class='progress-bar progress-bar-success progress-bar-striped active' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100' style='width: 0%'>
										<span class='sr-only'>70% complete</span>
									</div>
								</div>
						</div>
					-->

			</div>

		<!-- End of Pictures view area -->

		<!-- start of pictures notes box -->
				<div id="photo-tips" class="contents" style="border: 1px solid #fff0e0;background-color: #fdf4d8">
	                
	                <h4>
	                    No professional photos? No problem.
	                </h4>

	                <ol>
	                	<!--
	                    <li>
	                        <i class="glyphicon glyphicon-chevron-right"></i>
	                        You can use:
	                        <i class="icon icon-mobilephone"></i>
	                        A smartphone
	                        <i class="icon icon-camera"></i>
	                        A digital camera
	                    </li>
	                    -->
	                    <li>
	                    
	                        <i class="glyphicon glyphicon-chevron-right"></i>
	                        <span>Our team are always ready to capture professional photos for. <b style="color:green">free</b>.
	                            <span >
	                                <a data-toggle="modal" data-target="#exampleModalLong"></a>
	                            </span>
	                        </span>
	                    </li>
	                    <li>
	                        <i class="glyphicon glyphicon-chevron-right"></i>
	                        We are going to help you to make your hotel look nicer.
	             		</li>
	             		 <li>
	                        <i class="glyphicon glyphicon-chevron-right"></i>
	                        We will use these pictures for making advertising for your hotel.
	             		</li>
	        		</ol>
                </div>
            <!-- End of Picture notes -->
              

		</div>
		<div class="contents col-lg-12 col-m-12 col-sm-12 col-xs-12" style="background-color:#efefef;border:none;margin-left: 0px">
		<a  href="policies.php" class="btn button" style="width: 100%">Contenue</a>
		</div>
		

</div>






<script type="text/javascript">
	function refresh(){
		document.location.reload(true);
	}
</script>

<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
<script src="js/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="js/jquery.fileupload.js" type="text/javascript"></script>

<script type="text/javascript">
    $(function () {
       var files = $("#files");

       $("#fileupload").fileupload({
           url: 'upload.php',
           dropZone: '#dropZone',
           dataType: 'json',
           autoUpload: false
       })
       .on('fileuploadadd', function (e, data) {
           var fileTypeAllowed = /.\.(gif|jpg|png|jpeg)$/i;
           var fileName = data.originalFiles[0]['name'];
           var fileSize = data.originalFiles[0]['size'];

           if (!fileTypeAllowed.test(fileName))
                $("#error").html('Only images are allowed!');
           else if (fileSize > 90000000)
               $("#error").html('Your file is too big! Max allowed size is: 500KB');
           else {
               $("#error").html("");
               data.submit();
           }
       })
       .on('fileuploaddone', function(e, data) {
            var status = data.jqXHR.responseJSON.status;
            var msg = data.jqXHR.responseJSON.msg;

            if (status == 1) {
                var path = data.jqXHR.responseJSON.path;
                // var uploadedImg = '<img src="'+path+'" />'
                // $("#img_div").fadeIn().append(uploadedImg);
                //alert('File is uploaded');
                location.reload();

            } else
                $("#error").html(msg);
       })
       .on('fileuploadprogressall', function(e,data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $("#progress").html("Completed: " + progress + "%");
       });
    });
</script>
		


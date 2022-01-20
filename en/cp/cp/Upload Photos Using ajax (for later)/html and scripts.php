

<!-- we will have a seprate section to upload the rooms pictures -->


<?php

//Previous method

// Move the stored rooms pictures from tmp_rooms folder to the main rooms folder
			// explode the pathes to be able to move them one by one
 			$files = explode(",.,",$pictures_paths);

 			foreach ($files as $value) {
 				rename("../users/$user_id/hotels/$hotel_id/rooms/tmp_rooms/$value", "../users/$user_id/hotels/$hotel_id/rooms/$roomID/$value");
 				//define the new path for moved picture
 				$newPicPath = "../users/$user_id/hotels/$hotel_id/rooms/$roomID/$value";
 				//Insert the path of the picture to the database
 				$insert_pic = "INSERT INTO `roomsphotos` (`rpRoomsID`, `rpPhotoPath`)
 				 VALUES ('$roomID', '$newPicPath')";
 				$insert_query = mysqli_query($conn, $insert_pic);
 				
?>



<!-- Upload room images -->
    		<!-- Start of empty State aria form -->
<div class="alert alert-danger" id="error" style="display: none"></div>
<div id="dropZone" >
	 <center>
	 	<legend class="big">Upload room photos</legend>
		<legend class="small">To help people see them.</legend>
	 </center>
	 <center>
	    <label class="btn btn-primary" style="width: 200px">
		    Add Photos <input accept="" multiple type="file" class="form-control" name="attachments[]" id="fileupload" style="display: block">
		    <span class="glyphicon glyphicon-plus"></span>
		</label>
		<p id="loaded_n_total"></p>
	 </center style="margin-bottom: 10px">
</div>
<input type="text" name="pictures_paths" id="pictures_paths" style="width: 100%">




<!-- Screpts  -->
<script type="text/javascript">
														
	$(function(){
	var files = $("#files");

	$("#fileupload").fileupload({
	url:'ad_room_img.php',
	dropZone: '#dropZone',
	dataType: 'json',
	autoUpload:false
	})
	.on('fileuploadadd', function(e, data){
	var fileTypeAllowed  = /.\.(gif|jpg|png|jpeg|wmv|3gp)$/i;
	var fileName = data.originalFiles[0]['name'];
	var fileSize = data.originalFiles[0]['size'];
	// alert("Some files has been uploaded!")
	// console.log(data.originalFiles[0]['name']);

	if (!fileTypeAllowed.test(fileName))
	$("#error").html('Only image files are allowed!');
	else if (false)//50000000 bit => 6250 MB => fileSize > 50000000
	$("#error").html("Your file is too big, Max file size is 500KB!");
	else {
	$("#error").html("");
	// alert(fileName);
	$("#aniimated-thumbnials").fadeIn().append('<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 m-b-20" id="tmp_div"><a href="'+URL.createObjectURL(event.target.files[0])+'" data-sub-html="Demo Description"><img style="opacity:0.3" class="img-fluid img-thumbnail" src="'+URL.createObjectURL(event.target.files[0])+'" alt=""><div class="progress" style="height: 25px;position: relative;top: -100px;left:20px;width:80%;" id="progress_bar_div"><div id="progress_bar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div></a></div>');
	// alert(URL.createObjectURL(event.target.files[0]));
	data.submit();
	}

	})
	.on('fileuploaddone', function(e, data){
	var status = data.jqXHR.responseJSON.status;
	var msg = data.jqXHR.responseJSON.msg;
	// alert(status + '  '+ msg  + '  '+ path);
	if (status == 1) {
	//Remove the temp picture with the Progress bar
	$('#tmp_div').remove();

	var path = data.jqXHR.responseJSON.path;
	var fileName = data.jqXHR.responseJSON.fileName;
	$("#aniimated-thumbnials").fadeIn().append('<div id="'+fileName+'_div" class="col-xl-3 col-lg-4 col-md-6 col-sm-12 m-b-20"><img class="img-fluid img-thumbnail" id="'+fileName+'_img" src="'+path+'" alt=""><div id="'+fileName+'" class="trash_hover" style="position: absolute;top: 4%;left: 9%;color:red;display:block;background-color:white;padding: 3px 7px;border-radius: 3%;opacity:0.7;cursor: pointer;" onclick="rm_img(&#39;'+fileName+'&#39;,&#39'+path+'&#39)"><i " class="fad fa-trash-alt fa-2x" style="opacity:1" id="remove_imgName"></i></div></div>');
	_("pictures_paths").value += path +",.,";
	//for rearranging path
	var paths = _("pictures_paths").value;
	_("pictures_paths").value = paths;
	}	
	else{
	$('#tmp_div').remove();
	//show message for 3 minutes
	$("#error").show();
	$("#error").html(msg);
	setTimeout(function() { $("#error").fadeOut("slow"); }, 3000);

	// alert(msg);
	}
	})
	.on('fileuploadprogressall',function(e, data){
	// var progressId = fileName+"_progress";
	// console.log(e);
	var progress = parseInt(data.loaded / data.total * 100, 10);
	// $("#progress_old").html("Completed: "+ progress +"%");
	document.getElementById('progress_bar').style.width = progress +"%";
	$("#progress_bar").html("Completed: "+ progress +"%");
	});

	});



	function rm_img(id, path){
	// var hotel_id = _("hotel_id").value;
	$.post ('rm_tmp_img.php',
	{path:path}
	,function(output) {
	if (output == 1) {
	var rm_div = id +"_div";
	// alert(rm_div);
	_(rm_div).remove();
	var paths = _("pictures_paths").value;
	paths = paths.replace(path, "");
	paths = arrangePath(paths);


	_("pictures_paths").value = paths;
	}
	else{
	alert("Something Went wrong while trying to remove the image!")
	}
	});
	}

	function arrangePath(paths){

	//to replace the first commas
	while(paths.charAt(0) == ',' && paths.charAt(1) == '.' && paths.charAt(2) == ','){
	paths = paths.substr(3);
	}

	//replace the last 3 commas if they werer there
	var lastThree = paths.substr(paths.length - 3);
	if (lastThree == ",.,") {
	paths = paths.substring(0, paths.length-3);
	}

	//replace extra commas in the middle using while to remove them all
	var i= 0;
	while(paths.length >= i){
	paths = paths.replace(",.,,.,",",.,");
	i++;
	}

	return paths;
	}
</script>












<?php 
	if (isset($_FILES['attachments'])) {
		$msg ="";
		$targetFile = "uploads/".basename($_FILES['attachments']['name'][0]);
		if (file_exists($targetFile))
			$msg = array('status' => 0, "msg" => "File is aleray exists!" );
		
		else if (move_uploaded_file($_FILES['attachments']['tmp_name'][0], $targetFile))
			$msg = array('status' => 1, "msg" => "File Has been uploaded", "path" => $targetFile );

		exit(json_encode($msg));
	}

?>


<!DOCTYPE html>
<html>
<head>

	<title>Upload</title>
	<style type="text/css">
		#dropZone{
			border: 3px dashed #a7a7a7;
			padding: 50px;
			width: 500px;
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
	<script src="jQuery-plugin-progressbar.js"></script>

</head>
<body align="center">
	<center>
		<legend>Upload you images</legend>
		<div id="dropZone">
			<h1>Drag and drop files</h1>
			<input type="file" id="fileupload" name="attachments[]" multiple>
		</div>
		<h1 id="error"></h1>
		<h1 id="progress"></h1>
		<div id="files"></div>

	</center>
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="js/vendor/jquery.ui.widget.js"></script>
		<script type="text/javascript" src="js/jquery.iframe-transport.js"></script>
		<script type="text/javascript" src="js/jquery.fileupload.js"></script>
		<script type="text/javascript">
			$(function(){
				var files = $("#files");

				$("#fileupload").fileupload({
					url:'index.php',
					dropZone: '#dropZone',
					dataType: 'json',
					autoUpload:false
				})
				.on('fileuploadadd', function(e, data){
					var fileTypeAllowed  = /.\.(gif|jpg|png|jpeg)$/i;
					var fileName = data.originalFiles[0]['name'];
					var fileSize = data.originalFiles[0]['size'];
					// alert("Some files has been uploaded!")
					// console.log(data.originalFiles[0]['name']);
					if (!fileTypeAllowed.test(fileName))
						$("#error").html('Only image files are allowed!');
					else if (fileSize > 50000000000)
						$("#error").html("Your file is too big, Max file size is 500KB!");
					else {
						$("#error").html("");
						data.submit();
					}
					
				})
				.on('fileuploaddone', function(e, data){
					var status = data.jqXHR.responseJSON.status;
					var msg = data.jqXHR.responseJSON.msg;
					if (status == 1) {
						var path = data.jqXHR.responseJSON.path;
						$("#files").fadeIn().append('<p><img src="'+path+'" style="width:100px;height:100px"/></p>')
					}
					else{
						$("#error").html = msg;
					}
				})
				.on('fileuploadprogressall',function(e, data){
					var progress = parseInt(data.loaded / data.total * 100, 10);
					$("#progress").html("Completed: "+ progress +"%");
				});

			});
		</script>

</body>
</html>
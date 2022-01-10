<?php



/*
//Specifies the direcory where the file is going to be placed
$target_dir = "uploads/";
//Specifiess the path oft hte file to be uploaded
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
//note used yet we will use it later
$uploadOk = 1;
//to hold the file extension of the file in lower case
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//CHECK if image file is a actural image or fake image

if (isset($_POST["submit"])) {
	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	//to check the file is real image
	if ($check !== false) {
		//echo "File is an image -".$check["mime"].".";
		$uploadOk = 1;
	}
	else{
		echo "File is not an image.";
		$uploadOk = 0;
	}
	//check if the picture name is alerady exisited or not
	if (file_exists($target_file)) {
		echo "Sorry, file is already exists.";
		$uploadOk = 0;
	}
	//Limit file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		echo "Sorry, Your file is larger then 500 KB!";
		$uploadOk =0;
	}
	//Limit file type fo only JPG, JPEG,PNG and GIF files
	if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
		echo "Sorry only JPG, JPEG,PNG and GIF image type files are allowed!";
		$uploadOk = 0;
	}
	//if everything is okay try to upload the files
	if ($uploadOk =0) {
		echo "Sorry your file was not uploaded ";
	}
	else{
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file: ".basename($_FILES["fileToUpload"]["name"])." has been uploaded";
		}
		else {
			echo "Sorry there was an error uploading your file";
		}
	}

}


*/
#mkdir("hotels/folder_name",0777,true);

//rename('refresh.html', 'hotels/refresh.html');

?>
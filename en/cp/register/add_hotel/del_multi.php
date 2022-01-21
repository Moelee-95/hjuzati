<?php 

session_start();
$hotel_id =$_SESSION['login_user'];
if (empty($hotel_id)) {
	header('location:../index.php');
}
else {
	include('../../../../db_connect.php'); 
	//check if user name is available in the users table
		include("user_check.php");
		
	if ($_GET['pictures_names']) {
	#########################################################################################
		###################### Removing the string from db #################################

		$sql = "SELECT photos FROM photos WHERE hotel_id = '$hotel_id'";
		$query = mysqli_query($conn,$sql);
		$fetch = mysqli_fetch_array($query);
		$dbstr= $fetch['0'];
		$remove = $_GET['pictures_names'];
		$remove = ltrim($remove, ',,,');
		$remove_array = explode(',,,', $remove);
		//echo "db string: $dbstr"."<br>";
		//echo "string to remove: $remove"."<br>";
		foreach ($remove_array as $key => $remove_str) {
			$dbstr = str_replace($remove_str, "", $dbstr);
			$dbstr = ltrim($dbstr,"***");
			$dbstr = rtrim($dbstr,"***");
			$dbstr = str_replace("******", "***", $dbstr);

			//echo $dbstr;
			$sql_upladte ="UPDATE photos SET photos ='$dbstr'";
			$result = mysqli_query($conn,$sql_upladte);
			if ($result) {
				rename("../hotels/$hotel_id/photos/$remove_str","../hotels/$hotel_id/photos/del/$remove_str");
				header('location:photos.php');
			}
			else
			{
				echo "picture has not been deleted";
			}
		}
		
		


	




	}
	else{
		header('location:photos.php');
	}

}
//$arrayName = array('0' => "hello.jpg",'1'=>"tow.jpg",'2'=>"something.jpg" );
//$str =implode('***', $arrayName);
//echo $str."<br>";
//$str2 =str_replace("tow.jpg"."***", "", $str);
//echo $str2;

?>
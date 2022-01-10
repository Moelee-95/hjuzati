<?php
session_start();
include ('db_connect.php'); 

if (!empty($_SESSION['login_user'])) {
	header("location:profile.php?$creating");
}
else {
if (!isset($_POST['submit'])) {

	}
elseif (isset($_POST['submit'])) {

	$email = htmlspecialchars($_POST['email']);
	$user_name = htmlspecialchars($_POST['user_name']);
		// Coverting email address and username to lowcase
	$email = strtolower($email) ;
	$user_name = strtolower($user_name);
	$password = htmlspecialchars($_POST['password']);
	$sql_e = "SELECT * FROM users WHERE email ='$email'";
	$sql_u = "SELECT * FROM users WHERE user_name ='$user_name'";
	$result_e = mysqli_query($conn, $sql_e) or die(mysqli_error($conn));
	$result_u = mysqli_query($conn, $sql_u) or die(mysqli_error($conn));
	
	if (mysqli_num_rows($result_e) > 0) {
		echo "Email is used before";
	}
	elseif (mysqli_num_rows($result_u) > 0) {
		echo "User Name is taken";
	}
	else {

		$sql = "INSERT INTO users(email,user_name,password) VALUES ('$email','$user_name','$password')";

	if ($conn->query($sql)) {
		
		$check="SELECT hotel_id FROM users WHERE email ='$email' ";
		$result=mysqli_query($conn,$check);
		$row = mysqli_fetch_array($result);
 		$hotel_id = $row['hotel_id'];
 		$hotel_row = "INSERT INTO profile(hotel_id) VALUES('$hotel_id')";
 		if ($conn->query($hotel_row)) {
 			$facilites = "INSERT INTO f_s(hotel_id) VALUES('$hotel_id')";
 			if ($conn->query($facilites)) {
 				$amenities = "INSERT INTO amenities(hotel_id) VALUES('$hotel_id')";
 				if ($conn->query($amenities)) {
 					$photos = "INSERT INTO photos(hotel_id) VALUES('$hotel_id')";
 					if ($conn->query($photos)) {
 						$policies = "INSERT INTO policies(hotel_id) VALUES('$hotel_id')";
 						if ($conn->query($policies)) {
 							$payment = "INSERT INTO payment(hotel_id) VALUES('$hotel_id')";
 							if ($conn->query($payment)) {
			 					$_SESSION['login_user'] = $hotel_id;
					 			//Creating folder with current user hotel name inside the hotels folder 
								mkdir("hotels/$hotel_id",0777,true);
								//Create folder name photos inside hotel name
								mkdir("hotels/$hotel_id/photos",0777,true);
								//Create folder for deleted files
								mkdir("hotels/$hotel_id/photos/del",0777,true);
								header('location:profile.php');
							}
						}
					}
 				}
 				
			}
			else {
				echo "Problem with inserting to the facilities table";
			}
 		
		}
		else {
			echo "Something went wrong while creating a record for hotels table";
		}
 		

		
	}
	else{
		echo "filed to register";
	}
	}
	


	
	}


?>


<!DOCTYPE html>
<html>
<?php include('header.php'); ?>
<!-- Hide Logout button -->
	<script type="text/javascript">
		document.getElementById('logout').style.display = "none";
	</script>
	
<br/>
<br/>
<a style="margin-left: 10px;" class="p-10" href="login.php">Back to Login</a>

<br/>
<br/>



	<form method="post" action="register.php">
		<input type="email" name="email" placeholder="Email Address">
		<input type="text" name="user_name" placeholder="User Name">
		<input type="text" name="password" placeholder="password">
		<input type="submit" name="submit">
	</form>
<br/>
<br/>
<br/>
<br/>
<br/>

<?php include('html/footer.html'); ?>

<?php } ?>
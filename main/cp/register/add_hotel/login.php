<?php

session_start();

include('db_connect.php');
if (!empty($_SESSION['login_user'])) {
	header("location:profile.php");
}
elseif (empty($_SESSION['login_user'])) {
	if (isset($_POST['submit'])) {
		$user_n_e = strtolower(htmlspecialchars($_POST['user_n_e']));
		$password = strtolower(htmlspecialchars($_POST['password']));

		echo "User Name or Email: $user_n_e <br>";
		echo "Password: $password<br/>";

		$sql = "SELECT hotel_id,user_name,email,password FROM users WHERE email = '$user_n_e'  OR user_name='$user_n_e' AND password= '$password' ";
		$query = mysqli_query($conn, $sql);
		$fetch = mysqli_fetch_array($query);
		$db_user_name =  $fetch['user_name'];
		$db_email = $fetch['email'];
		$db_password = $fetch['password'];
		$hotel_id = $fetch['hotel_id'];
			echo "DB User Name: "."$db_user_name".'<br/>';
			echo "DB Email Address: "."$db_email".'<br/>';
			echo "DB Password: "."$db_password".'<br/>';

		if ($db_user_name == $user_n_e || $db_email == $user_n_e) {
			if ($db_password == $password) {
				$_SESSION['login_user']=$hotel_id;
				header('location:profile.php');
			}
			else{
			echo "You have Enterd wrong password";
			}
		}
		else {
			echo "Incorrect User Name or Email";
		}
		




		
	}

}





?>



<!DOCTYPE html>
<html>
<?php include('header.php'); ?>



<br/>
<br/>
<br/>
<br/>
<center>
	<!-- Hide Logout button -->
	<script type="text/javascript">
		document.getElementById('logout').style.display = "none";
	</script>
		
<div class="container" >

	<center>
		
	<div class="contents" style="width: 50%" >

		<form method="post" action="login.php" align="center">
			<legend class="big" style="margin-bottom: 10px">Login to your account</legend>
			<input class="text" type="user_name" name="user_n_e" placeholder="User Name or Email Address"><br>
			<input class="text" type="password" name="password" placeholder="Enter Password"><br>
			<button class="btn btn-primary btn-md" style="width: 400px" type="submit" name="submit">Login</button><br>
			<div class="" style="margin-top: 8px;margin-bottom: 8px;">
				Dont have an account? 
				<a href="register.php">Sign Up</a>
			</div>
		</form>
		

	</div>
</center>
</div>
</center>
<br/>
<br/>
<br/>
<br/>

<?php include('html/footer.html'); ?>
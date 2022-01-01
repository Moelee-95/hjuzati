<?php


$conn = mysqli_connect('localhost','root','','stars_hotels');

if (!$conn) {
	echo "connection error ".mysqli_error();
}
$sql = "DELETE FROM login WHERE name = 'anyshit'";

if (mysqli_query($conn, $sql)) {
	echo "fucked up";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="add.php">
		<input type="text" name="name" placeholder="Name"><br/>
		<input type="text" name="user_name" placeholder="User Name"><br/>
		<input type="text" name="password" placeholder="password"><br/>
		<input type="text" name="rooms_types" placeholder="Rooms Types"><br/>
		<input type="submit" name="submit">
	</form>

</body>
</html>
<?php
include('../db/db_connect.php');
#fetching all users content from the database
$sql = "SELECT uUserID,uUserName,uStatus FROM users";
$query = mysqli_query($conn, $sql);
$allUsers = mysqli_fetch_all($query, MYSQLI_ASSOC);

//print_r($fetch);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

	<style type="text/css">
		
	</style>
</head>
<body>
	<div class="container">
		<div class="header">
			<h1>Here is the users</h1>
		</div>
		<table align="center" class="table  table-hover text-center">
			<tr>
		 		<td>User ID</td>
		 		<td>User Name</td>
		 		<td>Status</td>
		 		<td>Action</td>
		 	</tr>
		<?php
		foreach ($allUsers as $user) {
				echo "<tr>";
			foreach ($user as $info) {
				echo "<td>".$info."</td>";
			}
				echo "<td><a class='btn btn-danger' href='rmUser.php?userid=".$user['uUserID']."'>Remove</a>  <a class='btn btn-warning'>Disable</button></td>";
				echo "</tr>";
		}
		 ?>
		 </table>
	</div>
		
	 
	 	
	 	
	 		
	 	
	 

</body>
</html>
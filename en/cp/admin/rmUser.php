<?php

include('../../db_connect.php');
$sql = "call rm_user('58')";
$query = mysqli_query($conn, $sql);

if ($query) {
	// unlink($UserFolder);
	echo "Removed";
}
else{
	echo "Not Removed, Complete the code";
}




?>
<?php 


if (isset($_GET['photoID'])) {
    $photoID = $_GET['photoID'];
	$delPath= $_GET['photoPath'];
	echo "$photoID  and $delPath";

    include('../../../db_connect.php');

    if (unlink($delPath)){
        $del = "DELETE FROM roomsphotos WHERE (`rpPhotoID` = '$photoID')";
        $qu = mysqli_query($conn, $del);
        if ($qu) {
            echo "Photo deleted from db and location";
            header('location:rooms_photos.php');
        }
        else{
            echo "Error while deleting from db";

        }
    }
    echo "Couldn't delete photo from path";
}
else{
    echo "Wrong requoest";
}

header('location:rooms_photos.php');






?>
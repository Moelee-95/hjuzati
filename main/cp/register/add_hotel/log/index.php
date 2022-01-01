<?php 

//define('CatName', 'Chakchak');
//echo CatName;
//$CatName = 'chak';

///echo "<br><h1>".$CatName[0] ."</h1>";
//$length =strlen($CatName);	
//echo "$length";

//$age = 20.4;
//$age +=10;
//echo $age;


//echo "<br>";
//echo floor($age);

//$Hotels = ['avenue'=> '4 Stars','Shahram'=>'3 Stars', 'Halwachi'=>'4 Stars'];

//echo $Hotels['avenue'].'<br>';
//print_r($Hotels);

/* $hotels =[
	['name'=> 'Avenue', 'rating'=>'4 stars', 'single_rooms' => 20, 'double_rooms'=>15, 'single_room_price'=>22, 'room_price'=>18],
	['name'=>'Rawaz', 'rating'=>'4 Stars', 'single_rooms'=>22, 'double_rooms'=>10, 'single_room_price'=>30, 'room_price'=>80],
	['name'=>'hamwan','rating'=>'3 Stars', 'single_rooms'=>22, 'double_rooms'=>5, 'single_room_price'=>90, 'room_price'=>33],

];
*/
//foreach ($Hotels as $room) {
//	echo $room['name'].'-'.$room['single_rooms'].'<br>';
//}
//foreach ($hotels as $hotel) {
//	if ($hotel['single_room_price']<40 && $hotel['single_room_price']>5) {
//		echo $hotel['name'].':'.$hotel['single_room_price'].'<br/>';
//	}
//}

/*
function show($name,$price,$location){
	echo "$name Hotel is located in $location it's price is $price dollars per night";
}
show('shari Jawan',50,'Rzgari');
*/
$connection = mysqli_connect('localhost','root','','stars_hotels');

if (!$connection) {
	echo "Something is wrong with connection".mysqli_connect_error();
}
 // Write Query from all the login_user table, using *, to select specific column inseted of * use the coulmn name
$sql ='SELECT * FROM login_user';

//Make the query and get the result then save it to the $result variable, but it's not organizedd yet, you have to 
// this value could not be converted to string
$result = mysqli_query($connection, $sql);


//In order to to convert this value to an array by fetching this data to an associateive array using the following code..
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free the storing data inside the varibale
mysqli_free_result($result);

//close the connecton
mysqli_close($connection);



?>


<!DOCTYPE html>
<html>
<head>
	<title>any</title>
</head>
	<h4>Hotels!</h4>
	<div name="container">
		<div name="row"> 
			<?php foreach ($users as $user) : ?>
				<div name="col">
					<div name="card">
						<div name="card-content">
							<h2>Owner Name: <?php echo htmlspecialchars($user['name']); ?></h2>
							<div><h5>Available Rooms: </h5>
								<ol>
									<?php foreach ((explode(',', $user['rooms_types'])) as $type): ?>
										<li><?php echo htmlspecialchars($type); ?></li>
									<?php endforeach ?>
									

								</ol>
								
							</div>

						</div>
					</div> 
				</div>
			
			<?php endforeach ?>
		</div>
		<?php if (count($users)>2): ?>
		<p>There are more than 4 Hotels</p>
		<?php endif ?>
	</div>

</body>
</html>
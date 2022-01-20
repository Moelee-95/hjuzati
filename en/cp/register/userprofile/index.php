<?php session_start();


if (isset($_COOKIE['login_user']) and isset($_COOKIE['userName']) and isset($_COOKIE['userPassword'])) {
  if (isset($_SESSION['login_user'])) {
    $user_id =  $_SESSION['login_user'];
  }
  else{
      $_SESSION['login_user'] = $_COOKIE['login_user'];
      $_SESSION['userName'] = $_COOKIE['userName'];
      $user_id =  $_SESSION['login_user'];
  }
}
elseif (!isset($_COOKIE['login_user']) and !isset($_SESSION['login_user'])) {
  header("Location:../logout.php");
  exit();
}
 ?>
 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Hjuzati | User Profile</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/offcanvas/">

    <!-- Bootstrap core CSS -->
  <link href="../add_hotel/assets/dist/css/bootstrap.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="offcanvas.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  <a class="navbar-brand mr-auto mr-lg-0" href="#"><!-- <img src="../add_hotel/assets/logo.png"> --></a>
  <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Hjuzati <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Notifications</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Switch account</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">+ Accomidation</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">+ Hotel</a>
          <a class="dropdown-item" href="#">+ Motel</a>
          <a class="dropdown-item" href="#">+ Appartment</a>
        </div>
      </li> -->
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <div class="dropdown">
        <button class="btn dropdown-toggle" style="color: white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="../../cp/img/user.png" width="20px" height="20px">  <?php echo $_SESSION['userName']; ?>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<!-- 
          <a class="dropdown-item" href="#">Setting</a>
          <a class="dropdown-item" href="#">Edit Profile</a>
           -->
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../logout.php">Logout</a>
        </div>
      </div>
    </form>
  </div>
</nav>

<div class="nav-scroller bg-white shadow-sm ">
  <nav class="nav nav-underline ">
    <a class="nav-link active" href="#">Dashboard</a>
<!--     <a class="nav-link" href="#">
      <span class="badge badge-pill bg-light align-text-bottom">27</span>
    </a>
    <a class="nav-link" href="#">Explore</a>
    <a class="nav-link" href="#">Suggestions</a>
    <a class="nav-link" href="#">Link</a>
    <a class="nav-link" href="#">Link</a>
    <a class="nav-link" href="#">Link</a>
    <a class="nav-link" href="#">Link</a>
    <a class="nav-link" href="#">Link</a> -->
  </nav>
</div>

<main role="main" class="container">
  <div class="row" style="padding: 40px;text-align: center;">

    <div class="card text-center column" style="width: 18rem;">
      <img src="../add_hotel/assets/room.png" height="170px" width="120px" class="card-img-top" alt="...">
      <div class="card-img-overlay text-white" style="opacity:0.6;background-color: black">
        <h5 class="card-title" >Hotel</h5>
        <p>Add your hotel to one of the best websites</p>
        <a href="../create_hotel.php" class="btn btn-outline-primary">Add your hotel</a>
      </div>
    </div>
     
     <!-- <div class="card text-center column" style="width: 18rem;">
      <img src="../assets/room.png" height="170px" width="120px" class="card-img-top" alt="...">
      <div class="card-img-overlay text-white" style="opacity:0.9;background-color: black">
        <h5 class="card-title" >Motel</h5>
        <p>Add your hotel to one of the best websites</p>
        <a href="#" class="btn btn-outline-primary">Add your Motel</a>
      </div>
    </div>
     <div class="card text-center column" style="width: 18rem;">
      <img src="../assets/room.png" height="170px" width="120px" class="card-img-top" alt="...">
      <div class="card-img-overlay text-white" style="opacity:0.9;background-color: black">
        <h5 class="card-title" >Appartment</h5>
        <p>Add your hotel to one of the best websites</p>
        <a href="#" class="btn btn-outline-primary">Add your Appartment</a>
      </div>
    </div> -->
  </div>
  </div>
  



  <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">Hotels List</h6>
    <div class="table-responsive">
      <table class="table table-hover">
         <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Hotel Name</th>
      <th scope="col">Actions</th>
      <th scope="col">State</th>
    </tr>
  </thead>
  <tbody>
    <?php
      include('../../db/db_connect.php');
      $accomidation = "SELECT hHotelName,hHotelID,hState FROM hotels WHERE hUserID = '$user_id'";
      $query = mysqli_query($conn, $accomidation);
      $fetch = mysqli_fetch_all($query, MYSQLI_ASSOC);

      // print_r($fetch);

      // $array = array("Name" => "Mohammed","age" => "Ali");
    ?>
    <?php 
      foreach ($fetch as $key => $hotel) {
       ?>
        <tr>
          <th scope="row"><?php $key ++; echo $key ?></th>
          <td><?php echo $hotel['hHotelName']; ?></td>
          <td>
            <!-- <a href="#Remove Hotel" onclick="removeFunction();">Remove</a>/ -->
            <a class="btn btn-primary" href="../edit_hotel.php?hotel_id=<?php echo $hotel['hHotelID']; ?>">Edit</a> , 
            <a class="btn btn-success" href="../../cp/index.php?hotel_id=<?php echo $hotel['hHotelID'];?>">Manage</a> , 
            <a class="btn btn-outline-danger href="../../cp/index.php?hotel_id=<?php echo $hotel['hHotelID'];?>">Delete</a>
          </td>
          <td><?php
            if ($hotel['hState'] == "") {
              echo "<b class='text-danger'>Missing info </b><a href=../edit_hotel.php?hotel_id=".$hotel['hHotelID']." >Edit Now</a>";
            }
            elseif($hotel['hState'] == "1"){ 
                echo "<b class='text-warning'>Hotel is satup, not public </b>";
            }
            elseif($hotel['hState'] == "0"){
                echo "<b class='text-sucess'>Hotel is Online</b>";
            }
           ?></td>
        </tr>

       <?php
      }
    ?>
  </tbody>
      </table>
    <!-- </div>
    <small class="d-block text-right mt-3">
      <a href="../create_hotel.php">Add New Hotel</a>
    </small>
  </div> -->

<!--    Activate later when needed

  <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">Suggestions</h6>
    <div class="media text-muted pt-3">
      <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
      <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <div class="d-flex justify-content-between align-items-center w-100">
          <strong class="text-gray-dark">Full Name</strong>
          <a href="#">Follow</a>
        </div>
        <span class="d-block">@username</span>
      </div>
    </div>
    <div class="media text-muted pt-3">
      <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
      <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <div class="d-flex justify-content-between align-items-center w-100">
          <strong class="text-gray-dark">Full Name</strong>
          <a href="#">Follow</a>
        </div>
        <span class="d-block">@username</span>
      </div>
    </div>
    <div class="media text-muted pt-3">
      <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
      <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <div class="d-flex justify-content-between align-items-center w-100">
          <strong class="text-gray-dark">Full Name</strong>
          <a href="#">Follow</a>
        </div>
        <span class="d-block">@username</span>
      </div>
    </div>
    <small class="d-block text-right mt-3">
      <a href="#">All suggestions</a>
    </small>
  </div>

 -->
</main>
<!-- dialog box -->
<script>
function removeFunction() {
  var r = confirm("Are you sure you want to delete <?php echo $hotel['hHotelName']; ?>!");
  if (r == true) {
    window.location.replace("../remove_hotel.php?hotel_id=<?php echo $hotel['hHotelID'];?>");
  } else {
    //Canceled
  }
}
</script>
<!-- 
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
-->
<script src="../../../assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="../../../assets/vendor/bootstrap/bootstrap.min.js"></script>

  <script src="">
  <script>window.jQuery || document.write('<script src="../add_hotel/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
  <script src="../add_hotel/assets/dist/js/bootstrap.bundle.js"></script>
        <script src="offcanvas.js"></script></body>
</html>

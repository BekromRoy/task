<?php
session_start();
include 'DatabaseConnection.php';

if (isset($_SESSION['uid'])) {
  header('Location:dashboard/dashboard.php');
}

if (isset($_POST['login'])) {
	$uid = $_POST['uid'];
	$pass = $_POST['pass'];

	$sqlcheck = "SELECT * FROM `account` WHERE `uid`='$uid' AND `Password`='$pass'";
    $querycheck = mysqli_query($con, $sqlcheck);
    $rowscheck = mysqli_num_rows($querycheck);
    if ($rowscheck == 1) {
    	echo "
  			<input type='text' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' value='Login successful, redirecting to your dashboard ...' style='background: #080;color: #fff;font-size: 18px;height: 80px;text-align: center;' readonly>";
  		$userDetails = mysqli_fetch_assoc($querycheck);
  		$_SESSION['uid'] = $userDetails['uid'];

  		header("refresh:4;URL=dashboard/dashboard.php");
    }
    else{
		echo "
		<input type='text' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' value='Sorry! You are not registered with us ...' style='background: #b00;color: #fff;font-size: 18px;height: 80px;text-align: center;' readonly>";
    }
	
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="icon" type="image/ico" href="image/logo.png">
	<title>Student Management</title>
</head>
<body  style="background: url('image/image1.jpg'); background-size: cover;background-repeat: no-repeat;background-position: top right;background-attachment: fixed;">

<!--signup form-->
<div>
	<div class="container" style="padding: 60px;height: 100vh;position: relative;">
	    	<form style="color: #fff;position: absolute;top: 50%;transform: translate(-50%, -50%);left: 50%;width: 40%;" method="POST" action="index.php" enctype="multipart/form-data">
			  <div class="mb-3">
			    <label for="exampleInputEmail1" class="form-label">UID</label>
			    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="uid">
			  </div>
			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Password</label>
			    <input type="password" class="form-control" id="exampleInputPassword1" required name="pass">
			  </div>
			  <div class="mb-3 form-check">
			    <input type="checkbox" class="form-check-input" id="exampleCheck1" >
			    <label class="form-check-label" for="exampleCheck1">Remember Password</label>
			  </div>
			  <button type="submit" class="btn btn-primary" name="login">Login</button>
			  <div id="emailHelp" style="color: #fff;" class="form-text">We'll never share your details with anyone else.</div>
			  <div id="emailHelp" style="color: #fff;" class="form-text">New in the university! To create your account <a href="register.php" style="color: red;">click here</a>.</div>
			</form>
	    </div>
	</div>
</div>

<!--signup form-->
	<div class="container-fluid" style="background: linear-gradient(90deg, rgba(0,0,0,0.8) 0%, rgba(7,7,7,0) 100%);width: 100%;height: 100vh;position: absolute;top: 0;left: 0;z-index: -9;position: fixed;"></div>

<!--footer-->
<footer>
	<nav class="navbar navbar-expand navbar-light" style="margin: 6px;border-radius: 10px;padding-left: 20px;background: #fff0;color: #fff;">
	  <div class="container-fluid">
	    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          Copyright&#169;, e-Student | All rights reserved
	        </li>
	      </ul>
	      <form class="d-flex">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
				  <a class="nav-link" href="#"><i class="fa-brands fa-facebook fa-xl" style="color: #005eff;"></i></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="#"><i class="fa-brands fa-instagram fa-xl" style="color: #ff00bb;"></i></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="#"><i class="fa-brands fa-twitter fa-xl" style="color: #3d84ff;"></i></a>
				</li>
			</ul>
	      </form>
	    </div>
	  </div>
	</nav>
</footer>
<!--footer-->
<!--script-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/22884efc59.js" crossorigin="anonymous"></script>
</body>
</html>
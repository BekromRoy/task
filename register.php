<?php
session_start();
include 'DatabaseConnection.php';

if (isset($_SESSION['uid'])) {
  header('Location:dashboard/dashboard.php');
}

if (isset($_POST['signup'])) {
	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];
	$profilepic = $_FILES['profilepic'];

	$facename = $profilepic['name'];	
	$facetmp = $profilepic['tmp_name'];	
	$facetxt = explode('.', $facename);
	$facecheck = strtolower(end($facetxt));
	$facedestination = 'profile/'.$facename;
	move_uploaded_file($facetmp, $facedestination);

	if ($pass == $cpass) {
		$sqlcheck = "SELECT * FROM `account` WHERE `Email`='$email' AND `Mobile`='$mobile'";
	    $querycheck = mysqli_query($con, $sqlcheck);
	    $rowscheck = mysqli_num_rows($querycheck);
	    if ($rowscheck == 0) {
				$sql = "INSERT INTO `account`(`Name`, `Mobile`, `Email`, `Password`, `Profile`) VALUES ('$name','$mobile','$email','$pass','$facedestination')";
	  			$query = mysqli_query($con, $sql);
	  		if ($query) {
		    	$sql = "SELECT * FROM `account` WHERE `Name`='$name' AND `Mobile`='$mobile' AND `Email`='$email' AND `Password`='$pass'";
	  			$query = mysqli_query($con, $sql);
	  			$userDetails = mysqli_fetch_assoc($query);
	  			$uid = $userDetails['uid'];
	  			echo "
	  			<input type='text' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' value='University ID : $uid' style='background: #080;color: #fff;font-size: 18px;height: 80px;text-align: center;' readonly>";
	  		}
	  		else{
	  			echo "
	  			<input type='text' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' value='Oops! registration failed. Try again ...' style='background: #b00;color: #fff;font-size: 18px;height: 80px;text-align: center;' readonly>";
	  		}
	    }
	    else{
  			echo "
  			<input type='text' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' value='You are already registered with us ...' style='background: #b00;color: #fff;font-size: 18px;height: 80px;text-align: center;' readonly>";
	    }
	}
    else{
    	echo "
  		<input type='text' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' value='Passwords are not matching. Try again ...' style='background: #b00;color: #fff;font-size: 18px;height: 80px;text-align: center;' readonly>";
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
	<div class="container-fluid">
	  <div class="row">
	    <div class="col-xl-5 col-lg-8 col-md-10" style="padding: 60px;min-height: 100vh;">
	    	<form style="color: #fff;" method="POST" action="register.php" enctype="multipart/form-data">
			  <div class="mb-3">
			    <label for="exampleInputEmail1" class="form-label">Full Name</label>
			    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="name">
			  </div>
			  <div class="mb-3">
			    <label for="exampleInputEmail1" class="form-label">Mobile No</label>
			    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="mobile">
			  </div>
			  <div class="mb-3">
			    <label for="exampleInputEmail1" class="form-label">Email Id</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="email">
			  </div>
			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Password</label>
			    <input type="password" class="form-control" id="exampleInputPassword1" required name="pass">
			  </div>
			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
			    <input type="password" class="form-control" id="exampleInputPassword1" required name="cpass">
			  </div>
			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Profile Picture</label>
			    <input type="file" class="form-control" id="exampleInputPassword1" required name="profilepic" accept=".jpg,.jpeg">
			  </div>
			  <button type="submit" class="btn btn-primary" name="signup">Register</button>
			  <div id="emailHelp" style="color: #fff;" class="form-text">We'll never share your details with anyone else.</div>
			  <div id="emailHelp" style="color: #fff;" class="form-text">To login in your account <a href="index.php" style="color: red;">click here</a>.</div>
			</form>
	    </div>
	    <div class="col-lg-6"></div>
	  </div>
	</div>
</div>

<!--signup form-->
	<div class="container-fluid" style="background: linear-gradient(90deg, rgba(0,0,0,0.5) 0%, rgba(7,7,7,0) 100%);width: 100%;height: 100vh;position: absolute;top: 0;left: 0;z-index: -9;position: fixed;"></div>

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
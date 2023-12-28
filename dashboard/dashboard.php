<?php

include '../DatabaseConnection.php';
session_start();

if (!isset($_SESSION['uid'])) {
  header('Location:../login.php');
}

$uid = $_SESSION['uid'];

$sql = "SELECT * FROM `account` WHERE `uid`='$uid'";

$query = mysqli_query($con, $sql);
$rows = mysqli_num_rows($query);

if ($rows>0) {
  $userDetails = mysqli_fetch_assoc($query);
  $Name = $userDetails['Name'];
  $Mobile = $userDetails['Mobile'];
  $Email = $userDetails['Email'];
  $Profile = "../" . $userDetails['Profile'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome <?php echo $Name; ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="icon" type="image/ico" href="../image/logo.png">
</head>
<body style="background: aliceblue;">
<!--Navbar-->
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary" style="margin: 6px;border-radius: 10px;padding-left: 20px;">
  <div class="container-fluid">
    <a class="navbar-brand" href="dashboard.php">
    	<img src="<?php echo $Profile; ?>" alt="" width="50" height="50" class="d-inline-block align-text-top" style="border-radius: 50%;">
	</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contactus.php">Contact Us</a>
        </li>
      </ul>
      <form class="d-flex">
    		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
    			<li class="nav-item">
    			  <a class="nav-link" href="../logout.php">Logout</a>
    			</li>
    			<li class="nav-item">
    			  <a class="nav-link" href="#"></a>
    			</li>
    		</ul>
      </form>
    </div>
  </div>
</nav>
<!--div style="height: 90px;"></div-->
<!--Navbar-->
<!--Profile-->
<div class="container">
  <div class="row" style="height: 100vh;">
    <div class="col-md" style="height: 100%;position: relative;">
    	<img src="<?php echo $Profile; ?>" style="height: 400px;width:400px;position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);border-radius: 50%;">
    </div>
    <div class="col-md" style="height: 100%;position: relative;">
    	<div style="height: 70%;width:70%;position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);padding: 50px 30px;">
    		<div style="position: absolute;top: 50%;transform: translateY(-50%);font-size: 20px;">
	    		<p><b>UID : </b><?php echo $uid; ?></p>
	    		<p><b>Name : </b><?php echo $Name; ?></p>
	    		<p><b>Mobile : </b><?php echo $Mobile; ?></p>
	    		<p><b>Email : </b><?php echo $Email; ?></p>
    		</div>
    	</div>
    </div>
  </div>
</div>
<!--Profile-->
<!--footer-->
<footer>
	<nav class="navbar navbar-expand fixed-bottom navbar-light bg-light" style="margin: 6px;border-radius: 10px;padding-left: 20px;background: #fff;">
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
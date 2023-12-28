<?php

include '../DatabaseConnection.php';
session_start();


error_reporting(0);

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
<body style="background: url('../image/image1.jpg'); background-size: cover;background-repeat: no-repeat;background-position: top right;background-attachment: fixed;">
<div class="container-fluid" style="background: linear-gradient(90deg, rgba(0,0,0,0.5) 0%, rgba(7,7,7,0) 100%);width: 100%;height: 100vh;position: absolute;top: 0;left: 0;z-index: -9;position: fixed;"></div>
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
          <a class="nav-link " href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="contactus.php">Contact Us</a>
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
<div style="height: 90px;"></div>
<!--Navbar-->
<!--signup form-->
<div>
	<div class="container">
	  <div class="row" style="padding: 60px;min-height: 87vh;">
	    <div class="col-xl-5 col-lg-8 col-md-10">
	    	<form style="color: #fff;" method="POST" action="contactus.php" enctype="multipart/form-data">
			  <div class="mb-3">
			    <label for="exampleInputEmail1" class="form-label">UID</label>
			    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="uid" value="<?php echo $uid; ?>" readonly>
			  </div>
			  <div class="mb-3">
			    <label for="exampleInputEmail1" class="form-label">Full Name</label>
			    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="name" value="<?php echo $Name; ?>" readonly>
			  </div>
			  <div class="mb-3">
			    <label for="exampleInputEmail1" class="form-label">Mobile No</label>
			    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="mobile" value="<?php echo $Mobile; ?>" readonly>
			  </div>
			  <div class="mb-3">
			    <label for="exampleInputEmail1" class="form-label">Email Id</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="email" value="<?php echo $Email; ?>" readonly>
			  </div>
	    </div>
	    <div class="col-xl-5 col-lg-8 col-md-10" style="color: #fff;margin: 0 auto;">
			  <div class="mb-3">
			    <label for="exampleInputEmail1" class="form-label">Message/Thoughts/Problems</label>
			    <textarea type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="remarks" rows="9"></textarea>
			  </div>
			  <button type="submit" class="btn btn-primary" name="contact" style="padding: 10px 60px;">Submit</button>
	  		</form>
	  	</div>
	  		<div class="mb-3">
	  			<label for="exampleInputEmail1" class="form-label"></label>
			  	<?php

			  	if (isset($_POST['contact'])) {
						$uid = $_POST['uid'];
						$name = $_POST['name'];
						$mobile = $_POST['mobile'];
						$email = $_POST['email'];
						$remarks = $_POST['remarks'];

						$sql = "INSERT INTO `contact`(`uid`, `Name`, `Mobile`, `Email`, `Message`) VALUES ('$uid','$name','$mobile','$email','$remarks')";
		  			$query = mysqli_query($con, $sql);

		  			if ($query) {
		  				?>
		  				<input type="text" class="form-control" aria-describedby="emailHelp" value="Your remarks submitted successfully" readonly style="text-align: center;background: #0a0;font-weight: bolder;color: #fff;">
		  				<?php
		  				header("refresh:4;URL=contactus.php");
		  			}
		  			else{
		  				?>
		  				<input type="text" class="form-control" aria-describedby="emailHelp" value="Failed to submit your remarks" readonly style="text-align: center;background: #a00;font-weight: bolder;color: #fff;">
		  				<?php
		  				header("refresh:4;URL=contactus.php");
		  			}
			  	}

			  	?>
			</div>
	  </div>
	</div>
</div>
<!--signup form-->
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
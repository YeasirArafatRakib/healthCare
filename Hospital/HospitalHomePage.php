<?php
session_start();

	include('../config.php');
	
	if(isset($_SESSION['email'])){
		
		$HospitalEmail=$_SESSION['email'];
		//echo"$HospitalEmail";
		//$ID = $_SESSION['id'];
		//echo $ID;
		$resultss=mysqli_query($db,"SELECT * FROM hospitaldetails WHERE email='$HospitalEmail'");
		// $numberOfRequest = mysqli_query($db,"SELECT * FROM appoinments WHERE hospital_name='$HospitalEmail' AND conform_status= 0");
		// $rowcount=mysqli_num_rows($numberOfRequest);
	}else{
		header('location:LoginForHospital.php');
	}

	// if(!isset($_SESSION['email'])){
	// 	header('location:LoginForHospital.php');
	// }
?>	
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Online Booking</title>
		<link rel="stylesheet" href="../assets/bootstrap.min.css">
	</head>
	<body>

		<?php include('navbar.php') ?>
		<div class="container mt-2">
			<div class="row">
				<div class="col-md-4 mt-3">
					<?php include('sidenav.php') ?>
				</div>
				<div class="col-md-8 mt-3">
					<?php while($row=mysqli_fetch_assoc($resultss)){?>
						<div class="card mb-2">
							<div class="card-header text-center text-info">
								<?php echo $row['name']?>'s Informations
							</div>
							<div class="card-body">
								<h5 class="card-title">Hospital Name: <?php echo $row['name']?> </h5>
								<p class="card-text">Email: <?php echo $row['email']?></p>
								<p class="card-text">Phone Number: <?php echo $row['phone']?></p>
								<p class="card-text">Address: <?php echo $row['address']?></p>
								<p class="card-text">District: <?php echo $row['district']?></p>
								
								<?php  $_SESSION['email']= $row['email']; $_SESSION['id']= $row['id'];?>

								<a class="btn btn-primary" href="EditDetailsHospital.php">Edit Details </a>
							</div>
						</div>
					<?php } ?>
				</div>

			</div>
		</div>
	
	
	</body>
</html>	
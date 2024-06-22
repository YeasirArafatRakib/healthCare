<?php
session_start();

	include('../config.php');
	if(isset($_SESSION['email'])){
		
		$HospitalEmail=$_SESSION['email'];
		//echo"$HospitalEmail";
		$ID = $_SESSION['id'];
		//echo $ID;
		$result=mysqli_query($db,"SELECT * FROM hospital_doctor INNER JOIN doctordetails ON hospital_doctor.doctor_id=doctordetails.id WHERE hospital_doctor.hospital_id=$ID");
		$_SESSION['email']=$HospitalEmail;
		
		$_SESSION['id']=$ID;
	}else{
		header('location:LoginForHospital.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor Lists</title>
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
					<?php while($row=mysqli_fetch_assoc($result)){?>
						<div class="card mb-2">
							<div class="card-header text-center text-primary">
							<?php echo $row['name']?>'s Informations
							</div>
							<div class="card-body">
								<h5 class="card-title">Doctor Name: <?php echo $row['name']?> </h5>
								<p class="card-text">Email: <?php echo $row['study']?></p>
								<p class="card-text">Phone Number: <?php echo $row['phone']?></p>
								<p class="card-text">Address: <?php echo $row['specalist']?></p>
								<p class="card-text">Time: <?php echo $row['start_time']?><?php echo $row['time_range_start']?> - <?php echo $row['end_time']?><?php echo $row['time_range_end']?> </p>
								
								<a class="btn btn-info" href="EditTime.php?doctor=<?php echo $row['doctor_id'] ?>">Edit time </a>
								<a class="btn btn-info" onclick="return confirm('Are you sure?')" href="deleteDoctor.php?doctor=<?php echo $row['doctor_id'] ?>">Delete</a>
								
							</div>
						</div>
					<?php } ?>
				</div>

			</div>
		</div>
	</body>
</html>	
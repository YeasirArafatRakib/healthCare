<?php 
session_start();
include('../config.php');
 
    if (isset($_POST["submitdata"])) {
		
			$selected_date = $_POST['Patientdate'];
			$Speclist=$_POST['PatientName'];
			$HospitalEmail=$_SESSION['email'];
		    $ID = $_SESSION['id'];
			$result=mysqli_query($db,"SELECT * FROM appoinments WHERE hospital_name='$HospitalEmail' AND date='$selected_date' AND doctor_specilist='$Speclist' AND conform_status= 1");
			//echo $selected_date;
			$_SESSION['email']=$HospitalEmail;
			
		   } 
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
				<?php while($row=mysqli_fetch_assoc($result)){?>
					<div class="col-sm-12">
						<div class="card">
							<div class="card-header text-center text-success">
								Confirmed Appointment
							</div>
							<div class="card-body">
								<h5 class="card-title">Patient Name: <?php echo $row['patient_name']?></h5>
								<p class="card-text">Patient Email: <?php echo $row['patient_email']?></p>
								<p class="card-text">Doctor Name:<?php echo $row['doctor_name']?></p>
								<p class="card-text">Time: <?php echo $row['time']?></p>
								<p class="card-text">District: <?php echo $row['district']?></p>
								
								<a class="btn btn-primary" href="#" >Delete</a>
							</div>
						</div>
					</div>
				<?php  }  ?>
			</div>

		</div>
	</div>

	</body>
</html>
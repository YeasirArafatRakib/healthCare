
<?php
session_start();

	include('../config.php');
	if(isset($_SESSION['email'])){
		
		$HospitalEmail=$_SESSION['email'];
		$ID = $_SESSION['id'];
		
		
		$Result=mysqli_query($db,"SELECT * FROM doctor_speclist");
		
		 $_SESSION['id']=$ID;
		 $_SESSION['email']=$HospitalEmail;
	}else{
		header('location:LoginForHospital.php');
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
					<div class="card">
					
					<div class="card-header text-center text-success">
						Appointment Confirmed
					</div>
						
					<div class="card-body">
						<form action="AppointmentConformedBackend.php" method="POST">
							<div class="form-group">
								<label for="Patientdate">Select Appointment Date</label>
								<input type="date" class="form-control" id="Patientdate" name="Patientdate" required>
							</div>

							<div class="form-group">
								<label for="PatientName">Select Specialist</label>
								<select name="PatientName" id="PatientName" class="form-control">
								<option value="0">Select Specilist:</option>
								<?php while($row=mysqli_fetch_assoc($Result)){?>
								<option value="<?php echo  $row['specealist_name'] ?>" ><?php echo  $row['specealist_name'] ?></option>
								<?php } ?>
								</select>
							</div>
							<button type="submit" id="submitdata" name="submitdata" class="btn btn-primary btn-block btn-sm">List</button>
						</form>											
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
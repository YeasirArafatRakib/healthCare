
<?php
session_start();

	include('../config.php');
	if($_SESSION['email']==true){
		
		$HospitalEmail=$_SESSION['email'];
		//echo"$HospitalEmail";
		$ID = $_SESSION['id'];
		//echo $ID;
		
		$Result=mysqli_query($db,"SELECT * FROM doctor_speclist");
		$_SESSION['email']=$HospitalEmail;
		$_SESSION['id']=$ID ;
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
					<form action="NewDoctorInsertBackend.php" method="POST">								
						<div class="form-row">
							
							<div class="form-group col-md-12">
							<label for="DoctorName">Doctor's Name</label>
							<input type="text" class="form-control" name="DoctorName" id="DoctorName" placeholder="Enter Doctor name" required>
							</div>
						</div>
						<div class="form-row">
							
							<div class="form-group col-md-12">
							<label for="Study">Study details</label>
							<input type="text" class="form-control" name="Study" id="Study" placeholder="Enter Study Details" required>
							</div>
						</div>

						<div class="form-row">
							
							<div class="form-group col-md-12">
							<label for="BMDC">BMDC Number</label>
							<input type="text" class="form-control" name="BMDC" id="BMDC" placeholder="Enter BMDC Number" required>
							</div>
						</div>
						<div class="form-row">
							
							<div class="form-group col-md-12">
							<label for="Phone">Phone</label>
							<input type="text" class="form-control" name="Phone" id="Phone" placeholder="Enter Phone Number" required>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="number">Specalist</label>
								<select name="Specalist" id="Specalist" class="form-control">
								<option value="0">Select Specilist:</option>
								<?php while($row=mysqli_fetch_assoc($Result)){?>
								<option value="<?php echo  $row['specealist_name'] ?>" ><?php echo  $row['specealist_name'] ?></option>
								<?php } ?>
								</select>
								
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="PDuration">Patient Watching Duration</label>
								<input type="text" class="form-control" id="PDuration" name="PDuration" placeholder="Enter Watching Duration" required>
								
							</div>
						</div>	
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="Starting">Starting Time</label>
								<input type="text" class="form-control" id="Starting" name="Starting" placeholder="Enter Starting Time" required>
								<input type="radio" name="AM" value="AM" checked> AM
								<input type="radio" name="AM" value="PM"> PM
								
							</div>
						</div>
						<div class="form-row">
							
							<div class="form-group col-md-12">
							<label for="Ending">Ending Time</label>
							<input type="text" class="form-control" name="Ending" id="Ending" placeholder="Enter Ending Time" required>
							<input type="radio" name="EAM" value="AM"> AM
							<input type="radio" name="EAM" value="PM" checked> PM
							</div>
						</div>
						<div id="demo">

						</div>
						<button type="submit" id="submitdata" name="submitdata" class="btn btn-primary btn-block btn-sm col-md-12">Insert</button>

					</form>
				</div>
			</div>
		</div>						
	</body>
</html>
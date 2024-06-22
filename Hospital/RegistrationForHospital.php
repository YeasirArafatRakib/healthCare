
<?php
session_start();

	include('../config.php');
	if(isset($_SESSION['email'])) {
    header("Location:HospitalHomePage.php");
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
	<div class="row mt-2">
					
					<div class="col-md-8 mx-auto">
					
						<form action="RegistrationConformation.php" method="POST">

						
								
							<div class="form-row">
								
								<div class="form-group col-md-12">
								<label for="PatientName">Hospital's Name</label>
								<input type="text" class="form-control" name="PatientName" id="PatientName" placeholder="Enter hospital's name" required>
								</div>
							</div>
							<div class="form-row">
								
								<div class="form-group col-md-12">
								<label for="Patientemail">Hospital's Email</label>
								<input type="email" class="form-control" name="Patientemail" id="Patientemail" placeholder="Enter email" required>
								</div>
							</div>
							<div class="form-row">
								
								<div class="form-group col-md-12">
								<label for="address">Address</label>
								<input type="text" class="form-control" name="address" id="address" placeholder="Enter address" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="number">Phone Number</label>
									<input type="text" class="form-control" id="number" name="number" placeholder="Enter phone number" required>
									
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="password01">Password</label>
									<input type="password" class="form-control" id="password01" name="password01" placeholder="Enter password" required>
									
								</div>
							</div>	
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="password02">Confirm Password</label>
									<input type="password" class="form-control" id="password02" name="password02" placeholder="Enter password" required>
									
								</div>
							</div>
							<div class="form-row">
								
								<div class="form-group col-md-12">
								<label for="district">District</label>
								<input type="text" class="form-control" name="district" id="district" placeholder="Enter district" required>
								</div>
							</div>
							<div id="demo">
							
							</div>
							<button type="submit" id="submitdata" name="submitdata" class="btn btn-primary btn-block btn-sm col-md-12">Sing-Up</button>
							<a href="LoginForHospital.php" class="ca"> Already Have An Account </a>
						</form>					
					
					</div>
					
				</div>
	
	</body>
	
</html>
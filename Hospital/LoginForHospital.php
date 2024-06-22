<?php
session_start();
if(isset($_SESSION['email'])) {
    header("Location:HospitalHomePage.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Online Booking</title>
		<link rel="stylesheet" href="../assets/bootstrap.min.css">
		<script src="../assets/util.js"></script>
	</head>
	<body>

	<?php include('navbar.php') ?>


	
	<div class="row mt-2">
					
					<div class="col-md-8 mx-auto">
					<?php if(isset($_SESSION['login-message'])) {?>
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<?php echo $_SESSION['login-message']; ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							
						</div>	
					<?php unset($_SESSION['login-message']); } ?>
						<form action="LoginHospital.php" method="POST">

						
							<div class="form-row">
								
								<div class="form-group col-md-6">
								<label for="HospitalEmail">Hospital's Email</label>
								<input type="email" class="form-control" name="HospitalEmail" id="HospitalEmail" placeholder="Enter email" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="HospitalPassword">Password</label>
									<input type="password" class="form-control" id="HospitalPassword" name="HospitalPassword" placeholder="Enter password" required>
									
								</div>
							</div>	
							
							<div id="demo">
							
							</div>
							<button type="submit" id="submitdata" name="submitdata" class="btn btn-primary btn-block btn-sm col-md-6">LogIn</button>
							<a href="RegistrationForHospital.php" class="ca"> Create New Account </a>
						</form>					
					
					</div>
					
				</div>
		<script src="../assets/jquery.min.js"></script>
		<script src="../assets/popper.js"></script>
		<script src="../assets/bootstrap.min.js"></script>
		
	</body>
	
</html>
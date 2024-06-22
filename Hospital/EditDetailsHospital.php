<?php
session_start();

	include('../config.php');
	if($_SESSION['email']==true){
		
		$HospitalEmail=$_SESSION['email'];
		$ID = $_SESSION['id'];
		//echo"$ID";
		$resultss=mysqli_query($db,"SELECT * FROM hospitaldetails WHERE id=$ID and email='$HospitalEmail'");
		$Hospital=mysqli_fetch_assoc($resultss);
		 $_SESSION['id']=$ID;
		 $_SESSION['email']=$HospitalEmail;
	}
?>	
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Update Hospital Details</title>
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
					<form action="UpdateDetailsHospital.php" method="POST">		
						<div class="form-row">
							
							<div class="form-group col-md-12">
							<label for="PatientName">Hospital's Name</label>
							<input type="text" class="form-control" value="<?php echo $Hospital['name'] ?> "  name="PatientName" id="PatientName" >
							</div>
						</div>

						<div class="form-row">
							
							<div class="form-group col-md-12">
							<label for="address">Address</label>
							<input type="text" class="form-control" name="address" id="address" value="<?php echo $Hospital['address'] ?> ">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="number">Phone Number</label>
								<input type="text" class="form-control" id="number" name="number" value="<?php echo $Hospital['phone'] ?> ">
								
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="password01">Password</label>
								<input type="text" class="form-control" id="password01" name="password01" value="<?php echo $Hospital['password'] ?> ">
								
							</div>
						</div>	

						<div class="form-row">
							
							<div class="form-group col-md-12">
							<label for="district">District</label>
							<input type="text" class="form-control" name="district" id="district" value="<?php echo $Hospital['district'] ?> ">
							</div>
						</div>
						<div id="demo">

						</div>
						<button type="submit" id="submitdata" name="submitdata" class="btn btn-primary btn-block btn-sm col-md-12">Update Details</button>

					</form>	
				</div>
			</div>
		</div>
	</body>
</html>
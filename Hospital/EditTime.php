<?php
session_start();

	include('../config.php');
	if($_SESSION['email']==true){
		
		$doctor_id = $_GET['doctor'];
		$HospitalEmail=$_SESSION['email'];
		$ID = $_SESSION['id'];
		//echo"$ID";
		$result=mysqli_query($db,"SELECT * FROM hospital_doctor INNER JOIN doctordetails ON hospital_doctor.doctor_id=doctordetails.id WHERE hospital_doctor.doctor_id=$doctor_id");
		$Hospital=mysqli_fetch_assoc($result);
		$_SESSION['Hid']=$Hospital['hdid'];	
		//$_SESSION['email']=$HospitalEmail;
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

	<?php include('header.php') ?>
	<div class="row mt-2">
					
					<div class="col-md-8 mx-auto">
					
						<form action="UpdateTime.php" method="POST">

						
								
							<div class="form-row">
								
								<div class="form-group col-md-6">
								<label for="PatientName">Doctor's Name: </label>
								<label><?php echo $Hospital['name'] ?> </label>
								</div>
							</div>
							
							<div class="form-row">
								
								<div class="form-group col-md-6">
								<label for="address">Study: </label>
								<label><?php echo $Hospital['study'] ?> </label>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="number">Phone Number: </label>
									<label><?php echo $Hospital['phone'] ?> </label>
									
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="password01">Specilist: </label>
									<label><?php echo $Hospital['specalist'] ?> </label>
									
								</div>
							</div>	
							
							<div class="form-row">
								
								<div class="form-group col-md-6">
								<label for="district">Watching Time Duration: </label>
								<label><?php echo $Hospital['patient_watching_time'] ?> </label>
								</div>
							</div>
							<div class="form-row">
								
								<div class="form-group col-md-6">
								<label for="Stime">Starting Time : </label>
								<input type="text" class="form-control" name="Stime" id="Stime" value="<?php echo $Hospital['start_time'] ?> "> 
								<input type="text" class="form-control" name="StimeR" id="StimeR" value="<?php echo $Hospital['time_range_start'] ?> ">
								</div>
							</div>
							<div class="form-row">
								
								<div class="form-group col-md-6">
								<label for="Etime">Ending Time : </label>
								<input type="text" class="form-control" name="Etime" id="Etime" value="<?php echo $Hospital['end_time'] ?> "> 
								<input type="text" class="form-control" name="EtimeR" id="EtimeR" value="<?php echo $Hospital['time_range_end'] ?> ">
								</div>
							</div>
							<div id="demo">
							
							</div>
							<button type="submit" id="submitdata" name="submitdata" class="btn btn-primary btn-block btn-sm col-md-6">Update Time</button>
							
						</form>					
					
					</div>
					
	</div>
	
	</body>
</html>
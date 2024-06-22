<?php
session_start();

	include('config.php');
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		
		$hospitaid=$_SESSION['Hospitalid'];
		//echo"$hospitaid";
		
		$result=mysqli_query($db,"SELECT * FROM doctordetails WHERE id=$id");
		if($result)
		{
			// Hospital name
			$HospitalResult=mysqli_query($db,"SELECT * FROM hospitaldetails WHERE id=$hospitaid");
			$HospitalResultss=mysqli_fetch_assoc($HospitalResult);
			$Hos=$HospitalResultss['name'];
			
			// Doctor Name
			$Doctor=mysqli_fetch_assoc($result);
			$DocName=$Doctor['name'];
			
			
			// Time Calculation
			$resultss=mysqli_query($db,"SELECT * FROM hospital_doctor WHERE doctor_id=$id AND hospital_id=$hospitaid");
			$Divition=mysqli_fetch_assoc($resultss);
			
			$patient=mysqli_query($db,"SELECT * FROM appoinments WHERE hospital_name='$Hos' AND doctor_name='$DocName'");
			//$paTime= mysqli_fetch_assoc($patient);
			
			
			
			$start_time= (double)$Divition['start_time'];
			$end_time= (double) $Divition['end_time'];
			//$start_time=11.00;
			//$end_time=4.00;
			$time=$Doctor['patient_watching_time'];
			$timeFraction=$time/100;		
		}
	}
	
		$_SESSION['DoctorName']=$DocName;
		$_SESSION['Specalist']=$Doctor['specalist'];
		$_SESSION['HospitalName']=$HospitalResultss['name'];
		$_SESSION['Division']=$HospitalResultss['district'];

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Online Booking</title>
		<link rel="stylesheet" href="./assets/bootstrap.min.css">
	</head>
	<body>

	<?php include('./templates/navbar.php') ?>

	<?php include('./templates/header.php') ?>

		<div class="container">
		
		<div class="card">
			<div class="card-header text-center">
				Appointment Form
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-8 mx-auto">
						<div class="row">
							<div class="col-md-6">
								<h5 class="card-title">Doctor Name: <?php echo $Doctor['name']?></h5>
								<h5 class="card-title">Specalist: <?php echo $Doctor['specalist']?></h5>
							</div>
							<div class="col-md-6">
							<h5 class="card-title">Hospital Name: <?php echo $HospitalResultss['name']?></h5>
							<h5 class="card-title">Divisions: <?php echo $HospitalResultss['district']?></h5>
							</div>
						</div>
					</div>
					
				</div>
				<div class="row mt-2">
					
					<div class="col-md-8 mx-auto">
					
						<form action="appoinmentBackend.php" method="POST">

						<input type="hidden" id="doctor_name" name="doctor_name" value="<?php echo $DocName ?>">
						<input type="hidden" id="doctor_id" name="doctor_id" value="<?php echo $id ?>">
						<input type="hidden" id="hospital_id" name="hospital_id" value="<?php echo $hospitaid ?>">
							<div class="form-row">
								<div class="form-group col-md-6">
								<label for="PatientName">Patient's Name</label>
								<input type="text" class="form-control" name="PatientName" id="PatientName" required>
								</div>
								<div class="form-group col-md-6">
								<label for="Patientemail">Email</label>
								<input type="email" class="form-control" name="Patientemail" id="Patientemail" required>
								</div>
							</div>
							<div class="form-group">
								<label for="PatientAddress">District</label>
								<input type="text" class="form-control" id="PatientAddress" name="PatientAddress" placeholder="Enter address" required>
								
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
								<label for="inputEmail4">Select Appointment Date</label>
								<input type="date" class="form-control" id="Patientdate" name="Patientdate" required>
								</div>
								<div class="form-group col-md-6">
								<label for="inputPassword4">Check Available Date ..</label>
								<input type="button" class="form-control btn btn-info" required name="check_avail" id="check_avail" value="Check Available">
								</div>
							</div>
							<div id="demo">
							
							</div>
							<button type="submit" id="submitdata" name="submitdata" class="btn btn-primary btn-block btn-sm">Apply</button>
						</form>					
					
					</div>
					
				</div>
			</div>
			<div class="card-footer text-muted text-center">
				Online Appointment
			</div>
		</div>
		
	</div>

				
		
		<script src="./assets/jquery.min.js"></script>
		<script src="./assets/popper.js"></script>
		<script src="./assets/bootstrap.min.js"></script>
	</body>

	<script>
	$(document).ready(function(){

		$('#submitdata').click(function(){

			console.log($('input[type="radio"][name="available_time"]:checked').val());
			console.log($('#PatientName').val());
			console.log($('#Patientemail').val());
		});

		$('#check_avail').click(function(){
			var inputdate = $('#Patientdate').val();
			var doctor_name = $('#doctor_name').val();
			var doctor_id = $('#doctor_id').val();
			var hospital_id = $('#hospital_id').val();
			//console.log(doctor_name + doctor_id + hospital_id );
		//console.log(inputdate);
		$.ajax({
			type: "POST",
			url: "available_time.php",
			
			data: {text:inputdate,doctor_name:doctor_name,doctor_id:doctor_id,hospital_id:hospital_id},
			success:function(data){
				//console.log(data);
				if(data){
					$('#demo').html(data);
				}
				else{
					$('#demo').html("<h4>No Time Found</h4>");
				}
				
			}
			});
		});
	});
	</script>			

</html>
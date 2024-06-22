<?php
session_start();
include('config.php');

if(isset($_GET['id'])){
	$id=$_GET['id'];
	$result=mysqli_query($db,"SELECT * FROM hospital_doctor INNER JOIN doctordetails ON hospital_doctor.doctor_id=doctordetails.id WHERE hospital_doctor.hospital_id=$id");
	$_SESSION['Hospitalid']=$id;
	//$_SESSION['DoctorName']=$result['name'];
	
}
else echo"no";
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
			<div class="row">
			<?php while($row=mysqli_fetch_assoc($result)){?>
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title"><?php echo $row['name']?> | <span class="badge badge-info"><?php echo $row['specalist']?></span></h5>
							<p class="card-text"><?php echo $row['study']?></p>
							<p class="card-text"><?php echo $row['phone']?></p>
							<p class="card-text"><?php echo $row['start_time'],$row['time_range_start'],'-', $row['end_time'],$row['time_range_end']?></p>
							<a class="btn btn-info" href="AppointmentForUser.php?id=<?php echo $row['id'];?>">Appointment </a>
						</div>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>




		<script src="./assets/jquery.min.js"></script>
		<script src="./assets/popper.js"></script>
		<script src="./assets/bootstrap.min.js"></script>
	</body>
</html>
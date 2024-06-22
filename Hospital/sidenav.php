<?php

	include('../config.php');
    $date=date("Y-m-d");
	$numberOfRequest = mysqli_query($db,"SELECT * FROM appoinments WHERE hospital_name='$HospitalEmail' AND conform_status= 0 AND date >='$date' ");
	$rowcount=mysqli_num_rows($numberOfRequest);
    
?>

<div class="list-group">

    <a class="list-group-item list-group-item-action" href="AppointmentConformed.php">Patient's Appointment List</a>
    <a class="list-group-item list-group-item-action" href="appoinmentListBackend.php">Patient's Appointment Request <span class="badge badge-primary"><?php echo $rowcount; ?></span></a>
    <a class="list-group-item list-group-item-action" href="DoctorList.php">Doctor List</a>
    <a class="list-group-item list-group-item-action" href="NewDoctorInsert.php">Insert New Doctor</a>
</div>
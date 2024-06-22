<?php
session_start();

	include('../config.php');
	if (isset($_POST["submitdata"])) 
	{
		$ID = $_SESSION['id'];
		$HospitalEmail = $_SESSION['email'];
		$HID=$_SESSION['Hid'];
		echo $ID;
		echo $HID;
		
		$StartTime=$_POST['Stime'];
		$StartTimeRange=$_POST['StimeR'];
		$EndTime=$_POST['Etime'];
		$EndTimeRange=$_POST['EtimeR'];
		
		
		
		
		
			$result=mysqli_query($db,"UPDATE hospital_doctor SET start_time='$StartTime', time_range_start ='$StartTimeRange', end_time='$EndTime',
			time_range_end='$EndTimeRange' WHERE hospital_doctor.hdid= $HID ");
			if($result==true) 
				
				{
					
					//$_SESSION['email']=$HospitalEmail;
					//$_SESSION['id']=$HID;
					header('location:DoctorList.php');
					
					
					
				}
				
			else header('location:PasswordNotMatch.php');
		
	
	}
	
	
?>
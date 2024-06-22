<?php 
session_start();
include('../config.php');
 
   
			$PEmail=$_SESSION['patient_email'];
		    $date = $_SESSION['date'];
			$time=$_SESSION['time'];
			$doctor=$_SESSION['doctor_name'];
			$HospitalEmail=$_SESSION['email'];
			$result=mysqli_query($db,"UPDATE appoinments SET conform_status=1 WHERE hospital_name='$HospitalEmail' AND date='$date' AND time='$time' AND doctor_name='$doctor' ");
			$subject="Appointment Confirmed";
			
			$body=" Your request is accepted for date: '$date'. Doctor Name: '$doctor', Time: '$time' ";
			$headers = "From:yeasir.0008.arafat@gmail.com";
			$mail_send = mail('yeasir.0008.arafat@gmail.com', $subject,$body,$headers);
			if($mail_send) 
				header('location:HospitalHomePage.php');
			else
				echo "not confirmed";
			 
?> 
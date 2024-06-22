<?php
session_start();

	include('../config.php');
	if($_SESSION['email']==true){
		
		$HospitalEmail=$_SESSION['email'];
		//echo"$HospitalEmail";
		$ID = $_SESSION['id'];
		
		$DoctorName=$_POST['DoctorName'];
		//echo $DoctorName;
		$Study=$_POST['Study'];// echo $Study;
		$phone=$_POST['Phone'];// echo $phone;
		$Specalist=$_POST['Specalist']; //echo $Specalist;
		$watingDuration=$_POST['PDuration']; //echo $watingDuration;
		$Start=$_POST['Starting']; //echo $Start;
		$SD=$_POST['AM'];// echo $SD;
		$End=$_POST['Ending']; //echo $End;
		$ED=$_POST['EAM']; //echo $ED;
		$BMDC=$_POST['BMDC']; //echo $BMDC;
		
		$result=mysqli_query($db,"INSERT INTO doctordetails (name, study, phone, specalist, patient_watching_time, bmdc_no) VALUES ('$DoctorName', '$Study','$phone', '$Specalist', '$watingDuration', '$BMDC')");
		if($result==true)
		{
			
			$GetID=mysqli_query($db,"SELECT id FROM doctordetails WHERE bmdc_no= '$BMDC'");
			$IDD=mysqli_fetch_assoc($GetID);
			$DID= $IDD['id'];
			$InsertValue=mysqli_query($db,"INSERT INTO hospital_doctor (doctor_id, hospital_id, start_time, time_range_start, end_time, time_range_end) VALUES 
			($DID, $ID, '$Start','$SD', '$End','$ED')");
			if($InsertValue==true)
			{
				$_SESSION['email']=$HospitalEmail;
				$_SESSION['id']=$ID;
					header('location:HospitalHomePage.php');
			}
		}
		else 
		{
			$GetID=mysqli_query($db,"SELECT id FROM doctordetails WHERE bmdc_no= '$BMDC'");
			$IDD=mysqli_fetch_assoc($GetID);
			$DID= $IDD['id'];
			
			$InsertValue=mysqli_query($db,"INSERT INTO hospital_doctor (doctor_id, hospital_id, start_time, time_range_start, end_time, time_range_end) VALUES 
			($DID, $ID, '$Start','$SD', '$End','$ED')");
			if($InsertValue==true)
			{
				$_SESSION['email']=$HospitalEmail;
				$_SESSION['id']=$ID;
					header('location:HospitalHomePage.php');
			}
		}
		//echo $ID;
		
		//$Result=mysqli_query($db,"SELECT * FROM doctor_speclist");
		//$_SESSION['email']=$HospitalEmail;
		//$_SESSION['id']=$ID ;
	}
?>
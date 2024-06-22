<?php
session_start();

	include('../config.php');
	if (isset($_POST["submitdata"])) 
	{
		$HospitalName=$_POST['PatientName'];
		$HospitalAddress=$_POST['address'];
		$Hospitalphone=$_POST['number'];
		$HospitalEmail = $_POST['Patientemail'];
		$HospitalPass01=$_POST['password01'];
		$HospitalPass02=$_POST['password02'];
		$HospitalDistrict=$_POST['district'];
		
		if($HospitalPass01==$HospitalPass02)
		{
			$result=mysqli_query($db,"INSERT INTO hospitaldetails (name, address, phone, district, password, email) VALUES ('$HospitalName','$HospitalAddress','$Hospitalphone',
						'$HospitalDistrict','$HospitalPass01','$HospitalEmail')");
			if($result) 
				
				{
					$_SESSION['email']=$HospitalEmail;
					header('location:HospitalHomePage.php');
					
					
				}
				
			else header('location:PasswordNotMatch.php');
		}
	
	}
	
	
?>
<?php
session_start();

	include('../config.php');
	if (isset($_POST["submitdata"])) 
	{
		$ID = $_SESSION['id'];
		$HospitalEmail = $_SESSION['email'];
		$HospitalName=$_POST['PatientName'];
		$HospitalAddress=$_POST['address'];
		$Hospitalphone=$_POST['number'];
		
		$HospitalPass01=$_POST['password01'];
		
		$HospitalDistrict=$_POST['district'];
		
		
		
			$result=mysqli_query($db,"UPDATE hospitaldetails SET name='$HospitalName', address ='$HospitalAddress', phone='$Hospitalphone',
			district='$HospitalDistrict', password ='$HospitalPass01' WHERE hospitaldetails.id= $ID AND hospitaldetails.email='$HospitalEmail' ");
			if($result==true) 
				
				{
					
					$_SESSION['email']=$HospitalEmail;
					header('location:HospitalHomePage.php');
					echo $ID;
					
					
				}
				
			else header('location:PasswordNotMatch.php');
		
	
	}
	
	
?>
<?php
	session_start();
	include('../config.php');
	if (isset($_POST["submitdata"])) { 
		$email=$_POST['HospitalEmail'];
		$pass=$_POST['HospitalPassword'];
		$query = "SELECT * FROM hospitaldetails WHERE email='$email' AND password='$pass'";
		$result=mysqli_query($db,$query);
		$rowcount=mysqli_num_rows($result);
		//$_SESSION['rowcount']=$rowcount;
		//printf("Result set has %d rows.\n",$rowcount);
		if($rowcount == 1)
		{	
			$_SESSION['email']=$email;
			//$_SESSION['id']=$result['id'];
			$_SESSION['login-message']="Succeccfully Match";
			header('location:HospitalHomePage.php');
		}
		else
		{
			echo "Not found";
			$_SESSION['login-message']="No Match Found";
			header('location:LoginForHospital.php');
		} 
	}else{
		echo "No post method";
	}
?>
	
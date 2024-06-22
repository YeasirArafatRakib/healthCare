<?php 

include('config.php');
 
    if (isset($_POST["submitdata"])) { 
        $doctorId = $_POST['doctor_id'];
        $doctorName = $_POST['doctor_name'];
        $hospitalId = $_POST['hospital_id'];
        $patientName = $_POST['PatientName'];
        $patientEmail = $_POST['Patientemail'];
        $address = $_POST['PatientAddress'];
        $selected_date = $_POST['Patientdate'];
        $selected_time = "Not defined";
        if(isset($_POST["available_time"]))
        {
            $selected_time = $_POST['available_time'];
			// Hospital details
			$HospitalResult=mysqli_query($db,"SELECT * FROM hospitaldetails WHERE id=$hospitalId");
			$HospitalResultss=mysqli_fetch_assoc($HospitalResult);
			$Hos=$HospitalResultss['email'];
				// Doctor details 
				$Doctorresult=mysqli_query($db,"SELECT * FROM doctordetails WHERE id=$doctorId");
				$DoctorResultss=mysqli_fetch_assoc($Doctorresult);
				$DoctorName=$DoctorResultss['name'];
				$DoctorSplist=$DoctorResultss['specalist'];
				
				$insert=mysqli_query($db,"INSERT INTO appoinments (hospital_name, doctor_name, doctor_specilist, district, patient_name, patient_email, time, date) VALUES 
				('$Hos', '$DoctorName', '$DoctorSplist','$address', '$patientName','$patientEmail ','$selected_time ', '$selected_date ') ");
				
				
        }
        else{
            echo "time is not selected";
        }
        // $post_data = file_get_contents('php://input'); 
        //echo $doctorId," ",$doctorName," ",$hospitalId," ",$patientName," ",$patientEmail," ",$address," ",$selected_date," ",$selected_time;         
    } 
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
	
		<div class="row mt-2">
			<?php if ($insert) ?> <h4 class="card-title"> <?php echo" We will confome you very soon" ?>  </h4>
			
		</div>
	</div>

	</body>
</html>
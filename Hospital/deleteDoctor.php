<?php
include('../config.php');
if(isset($_GET['doctor'])){
    echo $_GET['doctor'];
    $doctor_id = $_GET['doctor'];

    $sql="DELETE FROM doctordetails WHERE doctordetails.id = $doctor_id";
    $res=mysqli_query($db,$sql);
    header('location:DoctorList.php');

}


?>
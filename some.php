<?php

include('config.php');

$doctor_name = $_POST['doctor_name'];
$doctor_id = $_POST['doctor_id'];
$hospital_id = $_POST['hospital_id'];
echo $doctor_name;
if(isset($_POST['text'])){
    $inputdate = $_POST['text'];
    //echo $inputdate;
    $result=mysqli_query($db,"SELECT time FROM appoinments WHERE date='$inputdate'");
    if($result)
    {
        while($TimeBooked=mysqli_fetch_assoc($result)){
            $gottime = $TimeBooked['time'];
            echo '<input type="radio" id="available_time" name="available_time" value="',$gottime,'"><label for="',$gottime,'">',$gottime,'</label>';
        }
    }else{
        echo "Result not found";
    }
}else
{
    echo "No Date Found";
}
?>

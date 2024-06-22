<?php

include('config.php');

$DocName = $_POST['doctor_name'];
$id = $_POST['doctor_id'];
$hospitaid = $_POST['hospital_id'];

if(isset($_POST['text'])){
    $inputdate = $_POST['text'];
    $result=mysqli_query($db,"SELECT * FROM doctordetails WHERE id=$id");
	if($result)
	{
		// Hospital name
		$HospitalResult=mysqli_query($db,"SELECT * FROM hospitaldetails WHERE id=$hospitaid");
		$HospitalResultss=mysqli_fetch_assoc($HospitalResult);
		$Hos=$HospitalResultss['name'];
			
        // Doctor Name
        $Doctor=mysqli_fetch_assoc($result);
        $DocName=$Doctor['name'];
        
        
        // Time Calculation
        $resultss=mysqli_query($db,"SELECT * FROM hospital_doctor WHERE doctor_id=$id AND hospital_id=$hospitaid");
        $Divition=mysqli_fetch_assoc($resultss);
        
        $patient=mysqli_query($db,"SELECT * FROM appoinments WHERE hospital_name='$Hos' AND doctor_name='$DocName' AND date='$inputdate'");
        //$paTime= mysqli_fetch_assoc($patient);
        
        
        
        $start_time= (double)$Divition['start_time'];
        $end_time= (double) $Divition['end_time'];
		$Start=$Divition['time_range_start'];
		$end=$Divition['time_range_end'];
        //$start_time=11.00;
        //$end_time=4.00;
        $time=$Doctor['patient_watching_time'];
        $timeFraction=$time/100;		
    }

    if ($start_time<$end_time)
				
	{
        while($start_time<$end_time)
        {
            $addtion=$start_time;
            $a=(int) 60/$time;
            $ck=0;
            while($paTime=mysqli_fetch_assoc($patient))
            {
                $papTime=(double)$paTime['time'];
                
                if((string)$papTime === (string) $addtion) {$ck=1;}
            }
            if($ck==0) {
                echo '<div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="available_time" name="available_time" value="',$addtion,$Start,'"><label class="form-check-label" for="',$addtion,'">',$addtion,$Start,'</label></div>';
            }
            
            $i=1;
            
            while ($i<$a)
            {
                
                mysqli_data_seek($patient,0);// for reset 
                
                $addtion=$addtion+$timeFraction;
                $mk=0;// for check if 
                
                while($paTime1=mysqli_fetch_assoc($patient))
                {
                    $papTime2=(double)$paTime1['time'];
                    //$d=$papTime2+1;
                    //echo "$papTime2 ";
                    //$mk=($addtion == $papTime2? 1);
                    if( (string)$addtion === (string) $papTime2 && $mk==0) {$mk=1; break;}
                    $papTime2=null;

                }
                if($mk==0) {
                    echo '<div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="available_time" name="available_time" value="',$addtion,$Start,'"><label class="form-check-label" for="',$addtion,'">',$addtion,$Start,'</label></div>';
                }
                //if($papTime!=$addtion)
                //echo "$addtion ";
                
                $i=$i+1; 
            }
            $start_time=$start_time+1;
            if ($start_time== $end_time) break;   
        }
    }
	else if ($start_time>$end_time)
    {
        while($start_time<=13)
        {
            $addtion=$start_time;
            $a=(int) 60/$time;
            //echo"$a";
            $ck=0;
            while($paTime=mysqli_fetch_assoc($patient))
            {
                $papTime=(double)$paTime['time'];
                
                if((string)$papTime === (string) $addtion) {$ck=1;}
            }
            if($ck==0) {
                echo '<div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="available_time" name="available_time" value="',$addtion, $Start,'"><label class="form-check-label" for="',$addtion,'">',$addtion, $Start,'</label></div>';
            }
            
            $i=1;
									
            while ($i<$a)
            {
                
                mysqli_data_seek($patient,0);// for reset 
                
                $addtion=$addtion+$timeFraction;
                $mk=0;// for check if 
                
                while($paTime1=mysqli_fetch_assoc($patient))
                {
                    $papTime2=null;
                    $papTime2=(double)$paTime1['time'];
                    //$d=$papTime2+1;
                    //echo "$papTime2 ";
                    //$mk=($addtion == $papTime2? 1);
                    if( (string)$addtion === (string) $papTime2 && $mk==0) {$mk=1; break;}
                    

                }
                if($mk==0) {
                    echo '<div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="available_time" name="available_time" value="',$addtion, $Start,'"><label class="form-check-label" for="',$addtion,'">',$addtion, $Start,'</label></div>';
                }
                
                
                $i=$i+1; 
                //echo"$i";
            }
            $start_time=$start_time+1;
        
            if ($start_time== 13) break;
								
		} 
        $one=1;
        while($one<=$end_time)
        {
            $addtion=(double)$one;
            $a=(int) 60/$time;
            
            $ck=0;
            while($paTime=mysqli_fetch_assoc($patient))
            {
                $papTime=(double)$paTime['time'];
                
                if($papTime == $addtion) {$ck=1;}
            }
            if($ck==0) {
                echo '<div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="available_time" name="available_time" value="',$addtion,$end,'"><label class="form-check-label" for="',$addtion,'">',$addtion, $end,'</label></div>';
            }
            
            $i=1;
                
                while ($i<$a)
                {
                    
                    mysqli_data_seek($patient,0);// for reset 
                    
                    $addtion=$addtion+$timeFraction;
                    $mk=0;// for check if 
                    
                    while($paTime1=mysqli_fetch_assoc($patient))
                    {
                        $papTime2=(double)$paTime1['time'];
                        //$d=$papTime2+1;
                        //echo "$papTime2 ";
                        //$mk=($addtion == $papTime2? 1);
                        if((string) $addtion === (string)$papTime2 && $mk==0) {$mk=1; break;}
                        $papTime2=null;
    
                    }
                    if($mk==0) {
                        echo '<div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="available_time" name="available_time" value="',$addtion,$end,'"><label class="form-check-label" for="',$addtion,'">',$addtion,$end,'</label></div>';
                    }
                    //if($papTime!=$addtion)
                    //echo "$addtion ";
                    
                    $i=$i+1; 
                }
            $one=$one+1;
            
            if ($one== $end_time) break;
            
        }
    }
}
?> 
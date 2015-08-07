<?php include('db.php');
date_default_timezone_set("Asia/Kolkata");
$date = $_POST['date'];
$date1=date("Y-m-d");
function h2m($hours) { 
            $t = EXPLODE(".", $hours); 
            $h = $t[0]; 
            IF (ISSET($t[1])) { 
                $m = $t[1]; 
            } ELSE { 
                $m = "00"; 
            } 
            $mm = ($h * 60)+$m; 
            return $mm; 
    }
function m2h($time, $format = '%d.%02s') {
    settype($time, 'integer');
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
	
    return sprintf($format, $hours, $minutes);
}
			if($date==$date1){
				$fromtime1=date("H.i");
				$fromtim=explode(".",$fromtime1);
				$subfromtim=substr($fromtim[1],1,1);
				$subfromti=substr($fromtim[1],0,1);
				$subfromtih=$fromtim[0];
				
				if($subfromtim==0){ $subfromtim1=0; $subfromtimh1=$subfromti; }
				else{
				if($subfromtim==1 || $subfromtim==2 || $subfromtim==3 || $subfromtim==4 || $subfromtim==5){
					$subfromtim1=5;
					$subfromtimh1=$subfromti;
				}
				if($subfromtim==6 || $subfromtim==7 || $subfromtim==8 || $subfromtim==9){
					$subfromtim1=0;
					$subfromtimh1=$subfromti+1;
				}
				}
				$subfrommin2=$subfromtimh1.$subfromtim1;
				$subfrommin=$subfrommin2+15;
				//echo $subfrommin;
				if($subfrommin<="15"){ $subfrommin1="15"; $subfromtih1=$subfromtih; }
				elseif($subfrommin>"15" && $subfrommin<="30"){ $subfrommin1="30"; $subfromtih1=$subfromtih; }
				elseif($subfrommin>"30" && $subfrommin<="45"){ $subfrommin1="45"; $subfromtih1=$subfromtih; }
				else{  $subfrommin1=00; $subfromtih1=$subfromtih+1; }
				$fromtime2=$subfromtih1.".".$subfrommin1;
				
				$from_time1[]=$fromtime2;
				//print_r($fromtim);
			}
			else{
				$from_time1[]="00.00";
			}
			
			$to_time1[]=23.45;
			$time_interval1[]=15;
			$count=count($from_time1);
			 $n=0;
			 
			 for($n=0; $count>$n; $n++){
			$fromtime[$n] = h2m($from_time1[$n]);
			$totime[$n] =  h2m($to_time1[$n]);
			$interval[$n] = $time_interval1[$n];
			$difmin[$n]=$totime[$n]-$fromtime[$n];
			$intervalmin[$n]=$difmin[$n]/$interval[$n];
			for($i=0; $i<$intervalmin[$n]; $i++){
				$fromtime[$n] = $fromtime[$n]+$interval[$n];
				$time = m2h($fromtime[$n]);
				$currentDate = strtotime($time);
				$timing[] = date("h:i A", $currentDate);
			}
			}
			 echo json_encode($timing);
?>

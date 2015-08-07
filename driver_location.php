<?php
include("db.php");
date_default_timezone_set("Asia/Kolkata");
if($_POST){
    //print_r($_POST);
	$time=date("Y-m-d H:i:s");
	$driver_id=$_POST['driver_id'];
	$lat=$_POST['lat'];
	$lon=$_POST['lon'];
	$sq=("select * from driver_location where driver_id='$driver_id'");
	$s=mysql_query($sq);
	if(mysql_num_rows($s)==0){
		$query1= "insert into driver_location values(id,'".$time."','".$driver_id."','".$lat."','".$lon."','0')";
	}
	else{
		$query1= "update driver_location set time='".$time."',latitude='".$lat."',longitude='".$lon."' where driver_id='".$driver_id."'";
	}
    //echo $query1;
  
$result=mysql_query($query1);
if($result){
$query2= "select * from driver_location where driver_id='$driver_id' and status='2'";
$result1=mysql_query($query2);
	if(mysql_num_rows($result1)!=0){
	$query3= "update driver_location set status='0' where driver_id='".$driver_id."'";
	$result2=mysql_query($query3);
	}
$line["status"] = "Successfully Registered";
$cusid[] = $line;
echo json_encode($cusid);
}else{
$line["status"] = "Registration Failed";
$faild[] = $line;
echo json_encode($faild);
}
}

?>
<?php
include("db.php");
date_default_timezone_set("Asia/Kolkata");
if($_POST){
    //print_r($_POST);
	$date=date("d/m/Y");
	$time=date("H:i");
	$driver_mobile = $_REQUEST['driver_mobile'];
    $driver_password = $_REQUEST['driver_password'];
	$driver_gcm = $_REQUEST['driver_gcm'];
    $sq=("select * from driver_reg where mobile='$driver_mobile' and password='$driver_password'");
	$s=mysql_query($sq);
	if(mysql_num_rows($s)==0){
	$line["status"] = "Login Failed";
	$faild[] = $line;
	echo json_encode($faild);
	}
	else{
	$sq7=("select * from driver_reg where mobile='$driver_mobile'");
	$s7=mysql_query($sq7);
	while($re=mysql_fetch_array($s7)){
	$driver_id = $re["id"];
	$line["driver_id"] = $driver_id;
	$line["driver_name"] = $re["driver_name"];
	$line["status"] = "Successfully Login";
	$cusid[] = $line;
	$sql=mysql_query("UPDATE driver_reg SET gcm_id='$driver_gcm' WHERE id='".$driver_id."'");
	}
	echo json_encode($cusid);
}
}
?>
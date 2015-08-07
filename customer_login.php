<?php
include("db.php");
date_default_timezone_set("Asia/Kolkata");
if($_POST){
    //print_r($_POST);
	$date=date("d/m/Y");
	$time=date("H:i");
	$customer_mobile = $_REQUEST['customer_mobile'];
    $customer_password = $_REQUEST['customer_password'];
	$customer_pushid = $_REQUEST['customer_pushid'];
    $sq=("select * from registration where mobile='$customer_mobile' and password='$customer_password' and status='1'");
	$s=mysql_query($sq);
	if(mysql_num_rows($s)==0){
	$line["status"] = "Login Failed";
	$faild[] = $line;
	echo json_encode($faild);
	}
	else{
	$sq7=("select * from registration where mobile='$customer_mobile'");
	$s7=mysql_query($sq7);
	while($re=mysql_fetch_array($s7)){
	$customer_id = $re["id"];
	$line["customer_id"] = $customer_id;
	$line["customer_name"] = $re["name"];
	$line["status"] = "Successfully Login";
	$cusid[] = $line;
	$sql=mysql_query("UPDATE registration SET push_id='$customer_pushid' WHERE id='".$customer_id."'");
	}
	echo json_encode($cusid);
}
}
?>
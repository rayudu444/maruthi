<?php
include("db.php");
date_default_timezone_set("Asia/Kolkata");
if($_POST){
    //print_r($_POST);
	$date=date("Y-m-d");
	$customer_name = $_POST['customer_name'];
	$customer_email = $_POST['customer_email'];
	$customer_mobile = $_POST['customer_mobile'];
	$customer_password = $_POST['customer_password'];
	$customer_pushid = $_POST['customer_pushid'];
	$sq=("select * from registration where mobile='$customer_mobile'");
	$s=mysql_query($sq);
	if(mysql_num_rows($s)==0){
	$query1="insert into registration (id,crdate,name,email,mobile,password,push_id) values 
	(id,'".$date."','".$customer_name."','".$customer_email."','". $customer_mobile."','". $customer_password."','". $customer_pushid."')";
	$result=mysql_query($query1);
	if($result){
	$sq7=("select * from registration where mobile='$customer_mobile'");
	$s7=mysql_query($sq7);
	while($re=mysql_fetch_array($s7)){
	$line["customer_id"] = $re["id"];
	$line["status"] = "Successfully Registered";
	$cusid[] = $line;
	}
	echo json_encode($cusid);
	} else{
	$line["status"] = "Registration Failed";
	$faild[] = $line;
	echo json_encode($faild);
	}
	}
	else{
	$line["status"] = "Mobile Number Already Exist";
	$faild[] = $line;
	echo json_encode($faild);
	}

	

}

?>
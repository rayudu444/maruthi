<?php
include("db.php");
date_default_timezone_set("Asia/Kolkata");

if($_POST){
    //print_r($_GET);
	$user_id=$_POST['user_id'];
	$otp=$_POST['otp'];
	$push_id=$_POST['push_id'];
	
	$sq=("select * from registration where id='$user_id' and otp='$otp'");
	$s=mysql_query($sq);
	if(mysql_num_rows($s)==1){
		$sql=("update registration set status='1',push_id='$push_id' where id='$user_id'");
		$sl=mysql_query($sql);
		if($sl){
			$line["user_id"] = $user_id;
			$line["status"] = "Successfully Registered";
		}
		else{
			$line["status"] = "Not Registered";
		}
		$faild[] = $line;
		echo json_encode($faild);
	}
	else{
		$line["status"] = "OTP Check Failed";
		$faild[] = $line;
		echo json_encode($faild);
}
}
?>
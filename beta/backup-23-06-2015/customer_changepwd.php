<?php include("db.php");
date_default_timezone_set("Asia/Kolkata");
if($_POST){
    //print_r($_POST);
	$date=date("d/m/Y");
	$time=date("H:i");
	$customer_oldpassword = $_REQUEST['customer_oldpassword'];
	$customer_newpassword = $_REQUEST['customer_newpassword'];
	$customer_id = $_REQUEST['customer_id'];
	
$sql="SELECT * FROM registration WHERE password = '".$customer_oldpassword."' and id = '".$customer_id."'";
	//echo $sql;
	$result = mysql_query($sql);
	$numofrows=mysql_num_rows($result);  
	$result1=mysql_fetch_array($result);
	if($numofrows==0){
	$line["status"] = "Invalid Password.";
	$faild[] = $line;
	echo json_encode($faild);
	}
	else{
	$update=mysql_query("update registration set password='".$customer_newpassword."' where id='".$customer_id."'");
	if($update)
	{
	$line["status"] = "Successfully Changed New Password.";
	$faild[] = $line;
	echo json_encode($faild);
	}
	else{
	$line["status"] = "Password Change Failed.";
	$faild[] = $line;
	echo json_encode($faild);
	}
	
	}
	}
?>
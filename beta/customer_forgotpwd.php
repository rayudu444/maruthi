<?php include("db.php");
date_default_timezone_set("Asia/Kolkata");
if($_POST){
    //print_r($_POST);
	$date=date("d/m/Y");
	$time=date("H:i");
	$customer_email = $_REQUEST['customer_email'];
	
$sql="SELECT * FROM registration WHERE email = '".$customer_email."'";
	//echo $sql;
	$result = mysql_query($sql);
	$numofrows=mysql_num_rows($result);  
	$result1=mysql_fetch_array($result);
	if($numofrows==0){
	$line["status"] = "Invalid Emailid.";
	$faild[] = $line;
	echo json_encode($faild);
	}
	else{
	$to = $customer_email;
	$fullname=$result1['name'];
	$pass=$result1['password'];
$subject = "Maruthi Cabs Password Confirmation mail";
$message = "
<html>
<head>
<title>Password Confirmation</title>
</head>
<body>
<p>Dear $fullname,</p>
<p>We have received Your Requst. Your Password is $pass</p>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers

$headers .= "From: <noreply@beecabs.com>\r\n" . "X-Mailer: PHP/" . phpversion();

$email = mail($to,$subject,$message,$headers);
	
	if($email){
	$line["status"] = "Successfully sent Email.";
	$faild[] = $line;
	echo json_encode($faild);
	}else{
	$line["status"] = "Email sent Failed.";
	$faild[] = $line;
	echo json_encode($faild);
	}
	}
	}
?>
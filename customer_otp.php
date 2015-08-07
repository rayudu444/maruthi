<?php
include("db.php");
date_default_timezone_set("Asia/Kolkata");

if($_POST){
    //print_r($_GET);
	$user_id=$_POST['user_id'];
	
	$sq=("select * from registration where id='$user_id'");
	$s=mysql_query($sq);
	if(mysql_num_rows($s)==0){
		$line["status"] = "OTP Sent Failed";
		$faild[] = $line;
		echo json_encode($faild);
	}
else{
	$arr=mysql_fetch_array($s);
	$mobile=$arr['mobile'];
	$otp=rand(99999,1000000);
	$sql=("update registration set otp='$otp',status='0' where id='$user_id'");
	$sl=mysql_query($sql);
	if($sl){
		//$from = 'MCABSS';
		$from = 'MACABS';
		$to=$mobile;
		$msg="Thanks for registering Maruthi Cabs. Your OTP is $otp ";
		/* $URL = "http://sms1.brandebuzz.in/API/sms.php";
		$post_fields = array(
			'username' => 'Mcabs',
			'password' => 'Mcabs@2015',
			'from' => $from,
			'to' => $to,
			'msg' => urlencode($msg)
		);

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $URL);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_exec($ch); */

	$url = "http://bsms.slabs.mobi/spanelv2/api.php?username=MARUTHI&password=689891&to=".$to."&from=".$from."&message=".urlencode($msg);
	//echo $url;
	$ret = file($url); 

	$line["user_id"] = $user_id;
	$line["status"] = "Successfully Sent OTP";
	}
        $cusid[] = $line;
	echo json_encode($cusid);
}
}
?>
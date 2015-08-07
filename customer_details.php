<?php
include("db.php");
if($_POST){
    //print_r($_POST);
	$customer_id=$_POST['customer_id'];
	$sq=("select * from registration where id='$customer_id'");
	$s=mysql_query($sq);
	if(mysql_num_rows($s)!=0){
while($re=mysql_fetch_array($s)){
$line["customer_name"] = $re["name"];
$line["customer_mobile"] = $re["mobile"];
$line["customer_email"] = $re["email"];
$line["customer_password"] = $re["password"];
$line["status"] = "Already Registered";
$cusid[] = $line;
echo json_encode($cusid);
}
}
else{
$line["status"] = "Not Registered";
$faild[] = $line;
echo json_encode($faild);
}
}
?>
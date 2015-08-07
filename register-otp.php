<?php 
include("header.php");
include("menu.php");
?>
<section class="register">
  <h3>Registration</h3>
  <script type="text/javascript" src="admin/js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript">
function validdata()
{
var otp=document.f1.otp.value;
if(otp==""){ alert("Please OTP"); return false; }
return true;
}
</script>
 <?php 
 $user_id=$_GET['user_id'];
 $sql1=mysql_query("select * from registration where id='$user_id'");
 $arr=mysql_fetch_array($sql1);
 $mobile=$arr['mobile'];
  if(isset($_POST['submit'])){
	  //print_r($_POST);
	  extract($_POST);
	$sq=("select * from registration where id='$user_id' and otp='$otp'");
	$s=mysql_query($sq);
	if(mysql_num_rows($s)==1){
		$sql=("update registration set status='1' where id='$user_id'");
		$sl=mysql_query($sql);
		if($sl){
			echo "<div class='admin_success'>Successfully Registered.</div>";
			$from = 'MACABS';
		$to=$mobile;
		$msg="Welcome to Maruthicabs! You have successfully registered with us!!!";
		$url = "http://bsms.slabs.mobi/spanelv2/api.php?username=MARUTHI&password=689891&to=".$to."&from=".$from."&message=".urlencode($msg);
		//echo $url;
		$ret = file($url); 
		
			$to=$arr["email"];
			$name=$arr["name"];
			$subject = "Registration Confirmation";
			$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<table bgcolor='#F4F4F4' align='center' cellspacing='0' cellpadding='0' border='0' style='width:600px'>
<tbody>
<tr>
<td width='600' style='border:1px solid #ccc;'>

<table align='center' cellspacing='0' cellpadding='0' border='0' style='width:100%'>
<tbody>
<tr><td><a target='_blank' href='http://maruthicabs.com/images/logo.png'><img border='0' alt='maruthicabs' src='http://maruthicabs.com/images/logo.png' width='25%'height='60' style='padding:5px;'></a></td></tr>
</tbody>
</table>
<table bgcolor='#ffffff' align='center' cellspacing='0' cellpadding='0' border='0' style='width:600px'>
<tbody>
<tr>
<td height='32' align='center' colspan='2' style='background:#f0c004'>
<a target='_blank' style='color:#fff;font-weight:bold; font-family:Arial; font-size:20px; text-decoration:none; padding:0px 15px'>Registration Confirmation</a>
</td>
</tr>
<tr>
<td colspan='2' height='15'>&nbsp;</td>
</tr>
<tr>
<td>
<table cellspacing='0' cellpadding='0' border='0' style='width:600px'>
<tbody>
<tr>
<td width='15' height='100%'>&nbsp;</td>
<td valign='top'>

<p style='margin-top:5px;font-family:Arial;color: #333;'>Dear $name, </p>
<p style='margin-top:5px;font-family:Arial;color: #333;'>Welcome to Maruthicabs! You have successfully registered with us!!! </p>
<div style='clear:both;'></div>
<div style='clear:both;'></div>
<p style='margin-top:15px; margin-bottom:2px;font-family:Arial;color: #333;'>Regards</p>

<p style='margin-top:1px;font-family:Arial;color: #333;'>Maruthi Cabs Team</p>
</td>
<div style='clear:both;'></div>
<td width='15' height='100%'>&nbsp;</td>
</tr>

<tr>
<td colspan='2' height='15'>&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>

<table cellspacing='0' cellpadding='0' border='0' style='width:600px'>
<tr>
<td bgcolor='#f4f4f4' align='center' style='font-family:Arial;font-size:12px;line-height:20px; padding:10px 0px; color:#666;'>
<span style='color:#6a6a6a'>
&copy;2015, <a target='_blank' href='http://maruthicabs.com/'>Maruthi Cabs</a> All Rights Reserved. </span> <br>
</td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>
</body>
</html>
";
// Always set content-type when sending HTML email
 $headers='';
 $headers.='MIME-Version: 1.0'."\r\n";
 $headers.='Content-type: text/html; charset=iso-8859-1'."\r\n";
 $headers.='From: Mcabs.ee<'.mcabs.'>'."\r\n";

 $mail = mail($to,$subject,$message,$headers);
			
			echo"<script>window.location='index.php';</script>";
		}
	else{ echo "<div class='admin_faile'>Verification Failed.</div>"; }
  }
  else{ echo "<div class='admin_faile'>Verification Failed.</div>"; }
  }
  ?>
  <form action="" class="form1" method="post" name="f1" onSubmit="return validdata()">
    <input type="text" placeholder="OTP" name="otp">
    <div class="clear"></div>
    <button type="submit" name="submit" id="sub">Submit</button>
  </form>
  <div>Re-generate otp <a href='resend-otp.php?user_id=<?php echo $user_id; ?>' style="text-decoration:underline;">Click Here.</a></div>
</section>

<?php 
include("footer.php");
?>
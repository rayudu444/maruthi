<?php 
include("header.php");
include("menu.php");
?>
<section class="register">
  <h3>Re-Generate OTP</h3>
  <script type="text/javascript" src="admin/js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript">
function validdata()
{
var mobile=document.f1.mobile.value;
if(mobile==""){ alert("Please Enter Mobile"); return false; }
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
	$sq=("select * from registration where id='$user_id'");
	$s=mysql_query($sq);
	if(mysql_num_rows($s)==1){
		$otp=rand(99999,1000000);
		$from = 'MACABS';
		$to=$mobile;
		$msg="Thanks for registering Maruthi Cabs. Your OTP is $otp ";
		$url = "http://bsms.slabs.mobi/spanelv2/api.php?username=MARUTHI&password=689891&to=".$to."&from=".$from."&message=".urlencode($msg);
		//echo $url;
		$ret = file($url);
		$sql=("update registration set status='0',otp='$otp',mobile='$mobile' where id='$user_id'");
		$sl=mysql_query($sql);
		if($sl){
			echo "<div class='admin_success'>Successfully Re-generated OTP.</div>";
			echo"<script>window.location='register-otp.php?user_id=$user_id';</script>";
		}
	else{ echo "<div class='admin_faile'>Re-generated OTP Failed.</div>"; }
  }
  else{ echo "<div class='admin_faile'>User Not Found.</div>"; }
  }
  ?>
  <form action="" class="form1" method="post" name="f1" onSubmit="return validdata()">
    <input type="text" placeholder="Mobile" name="mobile" value="<?php echo $mobile; ?>" readonly>
    <div class="clear"></div>
    <button type="submit" name="submit" id="sub">Submit</button>
  </form>
 
</section>

<?php 
include("footer.php");
?>
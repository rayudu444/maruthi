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
var username=document.f1.username.value;
var email=document.f1.email.value;
var mobile=document.f1.mobile.value;
var password=document.f1.password.value;
var cpassword=document.f1.cpassword.value;
if(username==""){ alert("Please enter Name"); return false; }
if(password!=cpassword) { alert("Please enter same  password"); return false; }
if(email==""){ alert("Please enter Email"); return false; }
if(mobile==""){ alert("Please enter Mobile"); return false; }
if(password==""){ alert("Please enter password"); return false; }
if(cfmpassword=="") { alert("Please enter Confirm password"); return false; }

return true;
}
</script>
  <script type="text/javascript">
  $.noConflict();
jQuery( document ).ready(function( $ ) {
		$(function() {
			$('#mobile').blur(function(){
		var mobile= $(this).val();
		$.ajax({
			type: "POST",
			url: "admin/admin-mobile-ajax.php",
			data: {"mobile" : mobile},
			success: function(msg){
				if(msg!=""){
					document.getElementById("error3").innerHTML = "Mobile Number Already Exist.";
					$("#sub").hide();
				}
				else{ $("#sub").show(); }
			}
			});
		});
		});
		$(function() {
			$('#email').blur(function(){
		var email= $(this).val();
		$.ajax({
			type: "POST",
			url: "admin/admin-email-ajax1.php",
			data: {"email" : email},
			success: function(msg){
				if(msg!=""){
					document.getElementById("error4").innerHTML = "Email Already Exist.";
					$("#sub").hide();
				}
				else{ $("#sub").show(); }
			}
			});
		});
		});
		});
</script>
  <?php 
  if(isset($_POST['submit'])){
	  //print_r($_POST);
	  extract($_POST);
	  $crdate=date("Y-m-d");
	  $sql=mysql_query("INSERT INTO `registration`(`id`, `crdate`, `name`, `email`, `mobile`, `password`, `push_id`) VALUES ('id','$crdate','$username','$email','$mobile','$password','')");
	  //if($sql){ echo "<div class='admin_success'>Successfully Registered.<br> <span style='font-weight:normal; font-size:12px;'>Note: You want push notifications login with app only.</span></div>"; }
	  if($sql){ echo "<div class='admin_success'>Successfully Registered.</div>"; }
	else{ echo "<div class='admin_faile'>Registration Failed.</div>"; }
  }
  ?>
  <form action="" class="form1" method="post" name="f1" onSubmit="return validdata()">
    <input type="text" placeholder="User Name" name="username">
	<div id="error3" style="color:red; font-size:12px;"></div>
    <input type="text" placeholder="Mobile No" name="mobile" id="mobile">
	<div id="error4" style="color:red; font-size:12px;"></div>
    <input type="email" placeholder="Email Id" name="email" id="email">
    <input type="password" placeholder="Password" name="password">
    <input type="password" placeholder="Confirm Password" name="cpassword">
    <div class="clear"></div>
    <button type="submit" name="submit" id="sub">Submit</button>
  </form>
</section>

<?php 
include("footer.php");
?>
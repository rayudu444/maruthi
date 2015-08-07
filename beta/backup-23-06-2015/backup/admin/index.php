<?php 
include("admin-header.php");
?>
<div class="contact-div">
<div class="content">

<div class="login-main-box">

   <div class="login">
   <div class="login-text">
   <div class="login-right-box">
   <img src="images/mlogo.png" />
   <h2>Login</h2>
   <div class="clear"></div>
   <p>Power Maruthi Cabs</p>
   </div>
   <div class="login-right-box">
   <i class="fa fa-sign-in fa-3x"></i>
   </div>
    <div class="clear"></div>
   </div>
   <div class="login-bg">
   <div class="login-text">
	<?php 
	if(isset($_POST['submit'])){
		extract($_POST);
		$sql=mysql_query("select * from admin where email='$username' and password='$password'");
		if(mysql_num_rows($sql)==1){
			$sq=mysql_fetch_array($sql);
			$id=$sq['id'];
			$status=$sq['status'];
			if($status==1){
			$_SESSION['ses_admin_id'] = $id;
			
			echo"<div class='admin_success'>Successfully Login.</div>";
			echo'<script>window.location="admin-dashboard.php";</script>';
			}
			else{ echo"<div class='admin_faile'>Your Not Active Admin. Please contact super Admin.</div>"; }
		}
		else{ echo "<div class='admin_faile'>Invalid Username or Password</div>"; }
	}
	?>
   <form class="form1" method="post" action="">
   <div class="inp-box">
   <input type="text" placeholder="User Name" name="username" />
   </div>
     <div class="inp-box">
   <input type="password" placeholder="Password" name="password" />
   </div>
     <div class="inp-box">
   <input type="submit" value="Sign in" class="btn" name="submit" />
   </div>
   
   </form>
   </div>
   </div>
   </div>
   </div>
   
   </div>
   <div class="clear"></div>
</div>

</section>

</body>
</html>
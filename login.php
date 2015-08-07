<?php 
include("header.php");
include("menu.php");
?>
<style>
body {
	background: url(images/login.png) no-repeat;
	background-size: cover;
}
</style>
<div class="login">
  <div class="form-div">
    <h1 class="head3">Login</h1>
	<?php 
	if(isset($_POST['submit'])){
		//print_r($_POST);
		extract($_POST);
		$sql=mysql_query("select * from registration where mobile='$username' and password='$password'");
		if(mysql_num_rows($sql)==1){
			$sq=mysql_fetch_array($sql);
			$id=$sq['id'];
			$_SESSION['ses_user_id'] = $id;
			echo"<div class='admin_success'>Successfully Login.</div>";
			//echo'<script>window.location="my-account.php";</script>';
echo'<script>window.location="index.php";</script>';
		}
		else{ echo "<div class='admin_faile'>Invalid Username or Password</div>"; }
	}
	?>
    <form action="" class="form1" method="post">
      <input type="text" placeholder="Mobile Number" name="username">
      <input type="password" placeholder="Password" name="password">
      <div class="clear"></div>
      <button type="submit" name="submit">Submit</button>
    </form>
    <div class="clear"></div>
  </div>
</div>
<?php 
include("footer.php");
?>
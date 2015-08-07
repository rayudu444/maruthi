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
    <form action="" class="form1" method="post">
      <input type="text" placeholder="User Name">
      <input type="password" placeholder="Password">
      <div class="clear"></div>
      <button type="submit">Submit</button>
    </form>
    <div class="clear"></div>
  </div>
</div>
<?php 
include("footer.php");
?>
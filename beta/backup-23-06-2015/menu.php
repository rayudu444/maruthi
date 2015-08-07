<?php 
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$link1=explode("/",$actual_link);
$link = end($link1);
?>
<nav class="navbar navbar-inverse" role="banner">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="collapse navbar-collapse navbar-right">
        <ul class="nav navbar-nav">
          <li <?php if($link=="index.php" || $link==""){ echo 'class="active"'; } ?>><a href="index.php">Home</a></li>
          <li <?php if($link=="Download-app.php"){ echo 'class="active"'; } ?>><a href="download-app.php">Download app</a></li>
          <li <?php if($link=="login.php"){ echo 'class="active"'; } ?>><a href="login.php">Login</a></li>
          <li <?php if($link=="registration.php"){ echo 'class="active"'; } ?>><a href="registration.php">Registration</a></li>
          <li <?php if($link=="fares.php"){ echo 'class="active"'; } ?>><a href="fares.php">Fares</a></li>
          <li <?php if($link=="contact-us.php"){ echo 'class="active"'; } ?>><a href="contact-us.php">Contact Us</a></li>
        </ul>
      </div>
    </div>
    <!--/.container--> 
  </nav>
  <!--/nav--> 
  
</header>
<!--/header-->
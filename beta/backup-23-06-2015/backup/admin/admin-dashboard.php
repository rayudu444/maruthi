<?php 
include("admin-header.php");
if($_SESSION['ses_admin_id']==''){ echo'<script>window.location="index.php";</script>'; }
$refid=$_SESSION['ses_admin_id'];
?>
<div class="contact-div">
    <div class="content">
	<?php include("admin-menu.php"); ?>
       <div class="offer-right-div">
        <div class="content-total-box">
           <h3>Map View</h3>
           <form class="upload-form">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30454.729250238426!2d78.4696212!3d17.419409000000016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb975b6be8d3fd%3A0xc60e45ce91d25b84!2sKhairatabad%2C+Hyderabad%2C+Telangana!5e0!3m2!1sen!2sin!4v1432281154848" width="1000" height="430" frameborder="0" style="border:0" class="map" ></iframe>
          </form>
           <div class="clear"></div>
         </div>
      </div>
	  <?php include("admin-footer.php"); ?>
       
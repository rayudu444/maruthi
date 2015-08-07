<?php 
include("admin-header.php");
if($_SESSION['ses_admin_id']==''){ echo'<script>window.location="index.php";</script>'; }
$refid=$_SESSION['ses_admin_id'];
?>
<div class="contact-div">
    <div class="content">
	<?php include("admin-menu.php"); ?>
       <div class="offer-right-div">
        <div class="content-total-box" style="width:60%; margin-left:5%;">
          <h3>Travels</h3>
          <div class="main-table">
            <div class="table-header">
              <h4>View Trip</h4>
              <div class="clear"></div>
            </div>
		<?php 
		if($_GET['id']){
			$id=$_GET['id'];
			$sql=mysql_query("select * from trip_reg where id='$id'");
			$arr=mysql_fetch_array($sql);
			extract($arr);
		}
		?>
            <div class="table2" style="width:80%;margin:0px auto;">
              <form class="upload-form" method="post" action="">
                <div class="upload-pro">
                  <label>Mobile No</label>
                  <input type="text" placeholder="Mobile No" name="mobile" id="mobile" value="<?php echo $mobile; ?>" readonly>
                  <div class="clear"></div>
                </div>
                <div class="upload-pro">
                  <label>Name</label>
                  <input type="text" placeholder="Name" name="username" id="username" value="<?php echo $name; ?>" readonly>
                  <div class="clear"></div>
                </div>
                <div class="upload-pro">
                  <label>Email Id</label>
                  <input type="text" placeholder="Email Id" name="email" id="email" value="<?php echo $email; ?>" readonly>
                  <div class="clear"></div>
                </div>
                <div class="upload-pro">
                  <label>Start Date</label>
                  <input type="text" placeholder="Start Date" value="<?php echo $start_date; ?>" readonly>
                  <div class="clear"></div>
                </div>
                <div class="upload-pro">
                  <label>Start Time</label>
                  <div class="time-input">
				   <?php $start_time1=explode(" ",$start_time);
				 $start_time2=explode(":",$start_time1[0]);
				 ?>
                    <input type="text" placeholder="Hours"  name="fhours" id="fhours" value="<?php echo $start_time2[0]; ?>" readonly>
                    <input type="text" placeholder="Minutes" name="fminutes" id="fminutes" value="<?php echo $start_time2[1]; ?>" readonly>
                    <select class="am" name="fam" disabled>
                      <option <?php if($start_time1[1]=="AM"){ echo "selected='selected'"; } ?>>AM</option>
                      <option <?php if($start_time1[1]=="PM"){ echo "selected='selected'"; } ?>>PM</option>
                    </select>
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="upload-pro">
                  <label>Pickup Location</label>
                  <input type="text" placeholder="Pickup Location" name="start_location" value="<?php echo $start_location; ?>" readonly>
                  <div class="clear"></div>
                </div>
                <div class="upload-pro">
                  <label>Car Type </label>
                  <select name="cartype" disabled>
                    <option>-- Select Car Type --</option>
                    <option <?php if($cartype=="Santro"){ echo "selected='selected'"; } ?>>Santro</option>
                    <option <?php if($cartype=="Indica"){ echo "selected='selected'"; } ?>>Indica</option>
                    <option <?php if($cartype=="SUV"){ echo "selected='selected'"; } ?>>SUV</option>
                  </select>
                  <div class="clear"></div>
                </div>
                <div class="upload-pro">
                  <label>Drop Location</label>
                  <input type="text" placeholder="Drop Location" name="end_location" value="<?php echo $end_location; ?>" readonly>
                  <div class="clear"></div>
                </div>
               
              </form>
              <div class="clear"></div>
            </div>
          </div>
         <div class="clear"></div>
		 </body>
		 <html>
        </div>
      </div>
	  <?php include("admin-footer.php"); ?>
       
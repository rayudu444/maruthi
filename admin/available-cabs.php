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
          <h3>Travels</h3>
          <div class="main-table">
            <div class="table-header">
              <h4>Available Cabs</h4>
              <div class="clear"></div>
            </div>
            <div class="header-sub">
              <div class="header-inp">
                <label>Search</label>
                <input type="text" placeholder="Search" />
              </div>
              <div class="clear"></div>
            </div>
            <div class="table2" >
              <table class="order-tab">
                <tr>
                  <th>Driver Name</th>
                  <th>Mobile No</th>
                  <th>Cab No.</th>
                  <th>Available Since</th>
				          <th>Track</th>
                  <th>Action</th>
                </tr>
				<?php 
				$sql=mysql_query("select * from driver_location where status='1' order by id desc");
				if(mysql_num_rows($sql)==0){ echo "<div class='admin_faile'>Presently No Cabs found.</div>"; }
				else{
				while($re=mysql_fetch_array($sql)){
					$driver_id=$re['driver_id'];
					$lat=$re['latitude'];
					$lon=$re['longitude'];
					$geocode=file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lon&sensor=false");
					$output= json_decode($geocode);
					$address = $output->results[0]->formatted_address;
					$sq=mysql_query("select * from driver_reg where id='$driver_id'");
					$ar=mysql_fetch_array($sq);
					$driver_name=$ar['driver_name'];
					$driver_mobile=$ar['mobile'];
					$cab_id=$ar['cab_id'];
					$sql2=mysql_query("select * from cab_reg where id='$cab_id'");
					$arr1=mysql_fetch_array($sql2);
					$cab_type=$arr1['cartype'];
					$cab_no=$arr1['vehicle_reg'];
					
				?>
                <tr>
                  <td><?php echo $driver_name; ?></td>
                  <td><?php echo $driver_mobile; ?></td>
                  <td><?php echo $cab_no; ?></td>
                  <td></td>
                   <td><a href="">track</a></td>                   
                  <td><a href="#"><p class="fa fa-eye edit"></p></a></td>
                </tr>
				<?php } } ?>
              </table>
              <ul class="pagination">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
              <div class="clear"></div>
            </div>
          </div>
          <div class="clear"></div>
        </div>
      </div>
	  <?php include("admin-footer.php"); ?>
       
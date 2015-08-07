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
              <h4> Running Trips</h4>
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
			<?php 
			/*if($_GET['id']) {
			$id3=$_GET['id'];
			$upd=mysql_query("update driver_location set status='0' where driver_id='".$id3."'");
			if($upd) {
			echo "<div class='admin_success'>Successfully Completed Trip.</div>";
			} else { die(mysql_error()); } }*/
			?>
              <table class="order-tab">
                <tr>
                  <th>Trip ID</th>
                  <th>Customer Name </th>
                  <th>Mobile No</th>
                  <th>Driver Name</th>
                  <th>Mobile</th>
                  <th>Cab No.</th>
                  <th>Status</th>
                  <th>Track</th>
				          <th>Action</th>
                 <!--  <th class="edit-center">View</th>
				          <th class="edit-center">Complete</th> -->
                </tr>
				<?php 
				/*$sql=mysql_query("select * from driver_location where status='1' order by id desc");
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
					$sql1=mysql_query("select * from trip_reg where driver_id='$driver_id' and status='0' order by id desc");
					//if(mysql_num_rows($sql1)==0){ echo "<div class='admin_faile'>Presently No Cabs found.</div>"; }
					$arr=mysql_fetch_array($sql1);
					$trip_id=$arr['id'];
					$cab_id=$arr['cab_id'];
					$sql2=mysql_query("select * from cab_reg where id='$cab_id'");
					$arr1=mysql_fetch_array($sql2);
					$cab_type=$arr1['cartype'];
					$cab_no=$arr1['vehicle_reg'];*/
          $count = get_row_count_by_condition("trip_reg","where status <> 0");
          if($count>0){
          $arr = select_columns_rows_by_condition("trip_reg t INNER JOIN driver_reg d INNER JOIN cab_reg c","t.*,d.driver_name,d.mobile as driver_mobile, c.vehicle_reg","on t.cab_id=c.id and t.driver_id=d.id where t.status <> 0"); 
          foreach ($arr as $row) {
            if($row['status']==0){$status_loc="Pending";}
            else if($row['status']==1){$status_loc="Cab assigned";}
            else if($row['status']==2){$status_loc="In travel";}
            else if($row['status']==3){$status_loc="completed";}
            else if($row['status']==4){$status_loc="In transit";}
            else if($row['status']==5){$status_loc="Reached";}            
				?>
                <tr>

                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['mobile']; ?></td>
                  <td><?php echo $row['driver_name']; ?></td>
                  <td><?php echo $row['driver_mobile']; ?></td>
                  <td><?php echo $row['vehicle_reg']; ?></td>
                  <td><?=$status_loc?></td>
                  <td><a href="">track</a></td>

                 <!--  <td><a href="admin-view-map.php?id=<?php echo $trip_id; ?>"><p class="fa fa-times edit"></p></a></td> -->
				          <td><a href="#"><p class="fa fa-eye edit"></p></a></td>
                </tr>
				<?php } }else{ ?>
          <tr><td colspan="9">There is no Running Trips</td></tr>
        <?php }?>
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
       
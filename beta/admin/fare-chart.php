<?php 
include("admin-header.php");
if($_SESSION['ses_admin_id']==''){ echo'<script>window.location="index.php";</script>'; }
$refid=$_SESSION['ses_admin_id'];
error_reporting(0);
?>
<div class="contact-div">
    <div class="content">
	<?php include("admin-menu.php"); ?>
       <div class="offer-right-div">
        <div class="content-total-box">
                <h3>Fare Chart</h3>
                <div class="main-table">
            <div class="table-header">
                    <h4>Fare Chart</h4>
                    <div class="clear"></div>
                  </div>
           
            <div class="table2" >
			
                    <table class="order-tab">
					<tr>
                        <th class="edit-center">Category</th>
                        <th class="edit-center">Car Type</th>
                        <th class="edit-center">Minimum Bill in RS.</th>
                        <th class="edit-center">Minimum first kms</th>
                        <th class="edit-center">Extra Per km in RS.</th>
                        <th class="edit-center">Waiting time charges</th>
                        <th class="edit-center">Ride time charges</th>
                        <th class="edit-center">Edit</th>
                    </tr>
			<?php 
			$sql=mysql_query("select * from fare_chart order by id asc");
			while($re=mysql_fetch_array($sql)){
			?>
			<tr>
                <td class="edit-center"><?php echo $re['category']; ?></td>
                <td class="edit-center"><?php echo $re['cartype']; ?></td>
                <td class="edit-center"><?php echo $re['min_bill']; ?></td>
                <td class="edit-center"><?php echo $re['min_kms']; ?></td>
                <td class="edit-center"><?php echo $re['extra_kms']; ?></td>
                <td class="edit-center"><?php echo $re['waiting_charges']; ?></td>
                <td class="edit-center"><?php echo $re['ride_charges']; ?></td>
                <td><a href="edit-fare-chart.php?id=<?php echo $re['id']; ?>"><p class="fa fa-edit edit"></p></a></td>
            </tr>
			<?php
			}
			?>
              </table>
                    <div class="clear"></div>
                  </div>
          </div>
                <div class="clear"></div>
              </div>
      </div>
            
	  <?php include("admin-footer.php"); ?>
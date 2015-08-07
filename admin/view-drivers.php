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
                <h3>Travels</h3>
                <div class="main-table">
            <div class="table-header">
                    <h4>Pending Trips</h4>
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
			if($_GET['del']) {
			$del=$_GET['del'];
			$upd=mysql_query("delete from driver_reg where id='".$del."'");
			if($upd) {
			echo "<div class='admin_success'>Successfully Deleted Driver.</div>";
			} else { die(mysql_error()); } }
			?>
                    <table class="order-tab">
                <tr>
                        <th class="edit-center">Driver Id</th>
                        <th class="edit-center">Driver Name</th>
                        <th class="edit-center">Mobile Number</th>
                        <th class="edit-center">Edit</th>
                        <th class="edit-center">Delete</th>
                      </tr>
			<?php 
			$sql=mysql_query("select * from driver_reg");
			while($re=mysql_fetch_array($sql)){
			?>
			<tr>
                <td class="edit-center"><?php echo $re['driver_type']."-".$re['id']; ?></td>
                <td class="edit-center"><?php echo $re['driver_name']; ?></td>
                <td class="edit-center"><?php echo $re['mobile']; ?></td>
                <td><a href="edit-drivers.php?id=<?php echo $re['id']; ?>"><p class="fa fa-edit edit"></p></a></td>
                <td><a href="view-drivers.php?del=<?php echo $re['id']; ?>" onclick="return confirm('Do you want delete this Driver');"><p class="fa fa-times edit"></p></a></td>
            </tr>
			<?php
			}
			?>
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
       
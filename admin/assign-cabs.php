<?php 
include("admin-header.php");
if($_SESSION['ses_admin_id']==''){ echo'<script>window.location="index.php";</script>'; }
$refid=$_SESSION['ses_admin_id'];
error_reporting(0);
?>
<div class="contact-div">
<div class="content">
<?php include("admin-menu.php"); 
$cabs=$_GET['cabs'];
?>
<div class="offer-right-div">
        <div class="content-total-box">
           <h3>TRAVELS</h3>
           <div class="main-table">
            <div class="table-header">
               <h4>View Cabs</h4>
               <div class="header-right">
                <div class="clear"></div>
              </div>
               <div class="clear"></div>
             </div>
			 <script>
				$(document).ready(function(){
					$("#cabs").change(function(){
						var cabs=$(this).val();
						window.location="assign-cabs.php?cabs="+cabs;
					});
				});
			 </script>
            <div class="header-sub">
               <div class="header-sub">
                <select style="width:150px;" id="cabs" name="cabs">
                   <option value="assign" <?php if($cabs=="assign"){ echo "selected='selected'"; } ?>>Assigned Cabs</option>
                   <option value="unassign" <?php if($cabs=="unassign"){ echo "selected='selected'"; } ?>>UnAssign Cabs</option>
                 </select>
				
              </div>
               <div class="clear"></div>
             </div>
            <div class="table2" >
			<?php 
			if($_GET['del']) {
			$del=$_GET['del'];
			$upd=mysql_query("delete from cab_reg where id='".$del."'");
			if($upd) {
			echo "<div class='admin_success'>Successfully Deleted Cab.</div>";
			} else { die(mysql_error()); } }
			?>
			
            <?php 
			if($cabs=="unassign"){
			?>  
			<table class="order-tab">
                <tr>
                   <th class="edit-center">Vehicle Id</th>
                   <th class="edit-center">Vehicle No</th>
                   <th class="edit-center">Vehicle Type</th>
                   <th class="edit-center">Assign</th>
                 </tr>
				 <?php 
			$sql=mysql_query("select * from cab_reg where status='0'");
			while($re=mysql_fetch_array($sql)){
			?>
                <tr>
                   <td class="edit-center"><?php echo $re['owned_by']."-".$re['id']; ?></td>
                   <td class="edit-center"><?php echo $re['vehicle_reg']; ?></td>
                   <td class="edit-center"><?php echo $re['cartype']; ?></td>
                   <td class="edit-center"><a href="assign-cab.php?id=<?php echo $re['id']; ?>"><p class="fa fa-sign-in edit"></p></a></td>
				</tr>
			<?php
			}
			?>
            </table>
            <?php } 
			if($cabs=="assign" || $cabs==''){
			?>  
			<table class="order-tab">
                <tr>
                   <th class="edit-center">Vehicle Id</th>
                   <th class="edit-center">Vehicle No</th>
                   <th class="edit-center">Vehicle Type</th>
                   <th class="edit-center">Driver Name</th>
                   <th class="edit-center">Driver Mobile</th>
                   <th class="edit-center">Re-Assign</th>
                 </tr>
				 <?php 
			$sql=mysql_query("select * from cab_reg where status='1'");
			while($re=mysql_fetch_array($sql)){
			?>
                <tr>
                   <td class="edit-center"><?php echo $re['owned_by']."-".$re['id']; ?></td>
                   <td class="edit-center"><?php echo $re['vehicle_reg']; ?></td>
                   <td class="edit-center"><?php echo $re['cartype']; ?></td>
                   <td class="edit-center"><?php $cab_id=$re['id'];
				   $sql7=mysql_query("select * from cab_drivers where cab_id='$cab_id' order by id desc");
				   $arr=mysql_fetch_array($sql7);
				   $driver_id=$arr['driver_id'];
				   $sql8=mysql_query("select * from driver_reg where id='$driver_id' order by id desc");
				   $arr1=mysql_fetch_array($sql8);
				   echo $arr1['driver_name'];
				   ?></td>
                   <td class="edit-center"><?php echo $arr1['mobile']; ?></td>
                   <td class="edit-center"><a href="assign-cab.php?id=<?php echo $re['id']; ?>"><p class="fa fa-sign-in edit"></p></a></td>
            </tr>
			<?php
			}
			?>
                
              </table>
            <?php } ?>  
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
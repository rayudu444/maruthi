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

			if($_GET['id']) {

			$id3=$_GET['id'];

			$upd=mysql_query("update trip_reg set status='3',end_location='Trip Cancelled' where id='".$id3."'");

			if($upd) {

			echo "<div class='admin_success'>Successfully Cancelled Traking.</div>";

			echo "<script>window.location='pending-trip.php';</script>";

			} else { die(mysql_error()); } }

			?>

                    <table class="order-tab">

                <tr>

                        <th class="edit-center">Book Id</th>

                        <th class="edit-center">Start Date</th>

                        <th class="edit-center">Start Time</th>

                        <th class="edit-center">Start Location</th>

                        <th class="edit-center">Customer Name</th>

                        <th class="edit-center">Mobile</th>

                        <th class="edit-center">View</th>

                        <th class="edit-center">Edit</th>

                        <th class="edit-center">Assign</th>

                        <th class="edit-center">Cancel</th>

                      </tr>

			<?php 

			$sql=mysql_query("select * from trip_reg where status='0' order by id desc");

			while($re=mysql_fetch_array($sql)){

			?>

			<tr>

                 <td class="edit-center"><?php echo $re['id']; ?></td>
                <td class="edit-center"><?php echo $re['start_date']; ?></td>

                <td class="edit-center"><?php echo $re['start_time']; ?></td>

                <td><?php echo $re['start_location']; ?></td>

                <td class="edit-center"><?php echo $re['name']; ?></td>

                <td class="edit-center"><?php echo $re['mobile']; ?></td>

                <td><a href="view-trip.php?id=<?php echo $re['id']; ?>"><p class="fa fa-eye edit"></p></a></td>

                <td><a href="edit-trip.php?id=<?php echo $re['id']; ?>"><p class="fa fa-edit edit"></p></a></td>

                <td><a href="assign-trip.php?id=<?php echo $re['id']; ?>"><p class="fa fa-external-link edit"></p></a></td>

                <td><a href="pending-trip.php?id=<?php echo $re['id']; ?>"><p class="fa fa-times edit"></p></a></td>

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

       
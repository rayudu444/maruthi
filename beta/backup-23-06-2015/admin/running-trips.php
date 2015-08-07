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
              <table class="order-tab">
                <tr>
                  <th  width="15%">Current Location </th>
                  <th width="15%">Driver Name </th>
                  <th width="12%">Mobile</th>
                  <th width="12%">Vehical Type</th>
                  <th width="12%" class="edit-center">View</th>
                </tr>
                <tr>
                  <td>Hyderabad</td>
                  <td>Pavan Kumar</td>
                  <td>2550822563</td>
                  <td>Santro</td>
                  <td><p class="fa fa-eye edit"></p></td>
                </tr>
                <tr>
                  <td>Somajiguda</td>
                  <td>Pavan Kumar</td>
                  <td>2550282563</td>
                  <td>Santro</td>
                  <td><p class="fa fa-eye edit"></p></td>
                </tr>
                <tr>
                  <td>Ameerpet</td>
                  <td>Pavan Kumar</td>
                  <td>5698635456</td>
                  <td>Santro</td>
                  <td><p class="fa fa-eye edit"></p></td>
                </tr>
                <tr>
                  <td>Ameerpet</td>
                  <td>Pavan Kumar</td>
                  <td>5698635456</td>
                  <td>Santro</td>
                  <td><p class="fa fa-eye edit"></p></td>
                </tr>
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
       
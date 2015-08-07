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
          <h3>Fare Chart</h3>
          <div class="main-table">
            <div class="table-header">
              <h4>Edit Fare Chart</h4>
              <div class="clear"></div>
            </div>
		<?php 
		if(isset($_POST['submit'])){
			$id1=$_GET['id'];
			extract($_POST);
	  $sql=mysql_query("UPDATE `fare_chart` SET `min_bill`='$min_bill',`min_kms`='$min_kms',`extra_kms`='$extra_kms',`waiting_charges`='$waiting_charges',`ride_charges`='$ride_charges' WHERE id='$id1'");
	  if($sql){ echo "<div class='admin_success'>Successfully Updated.</div>"; 
	  echo "<script>window.location='fare-chart.php';</script>"; }
	else{ echo "<div class='admin_faile'>Update Failed.</div>"; }
		}
		?>
		<?php 
		if($_GET['id']){
			$id=$_GET['id'];
			$sql=mysql_query("select * from fare_chart where id='$id'");
			$arr=mysql_fetch_array($sql);
			extract($arr);
		}
		?>
		<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript">
function validdata()
{
var category=document.f1.category.value;
var cartype=document.f1.cartype.value;
var min_bill=document.f1.min_bill.value;
var min_kms=document.f1.min_kms.value;
var extra_kms=document.f1.extra_kms.value;
var waiting_charges=document.f1.waiting_charges.value;
var ride_charges=document.f1.ride_charges.value;
if(category==""){ alert("Please Select Category"); return false; }
if(cartype=="") { alert("Please Select Car Type"); return false; }
if(min_bill==""){ alert("Please Enter Minimum Bill"); return false; }
if(min_kms==""){ alert("Please Enter Minimum first kms"); return false; }
if(extra_kms==""){ alert("Please Enter Extra Per km"); return false; }
if(waiting_charges=="") { alert("Please Enter Waiting time charges"); return false; }
if(ride_charges=="") { alert("Please Enter Ride time charges"); return false; }

return true;
}
</script>
		<script type="text/javascript">
		  function isNumberKey(evt){
				var charCode = (evt.which) ? evt.which : evt.keyCode;
				if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;
				return true;
			}
		</script>
            <div class="table2" style="width:80%;margin:0px auto;">
              <form class="upload-form" method="post" action="" name="f1" onSubmit="return validdata()">
                <div class="upload-pro">
                  <label>Category</label>
                  <input type="text" placeholder="Category" name="category" value="<?php echo $category; ?>" readonly>
                  <div class="clear"></div>
                </div>
                <div class="upload-pro">
                  <label>Car Type</label>
                  <input type="text" placeholder="Car Type" name="cartype" id="cartype" value="<?php echo $cartype; ?>" readonly>
                  <div class="clear"></div>
                </div>
                <div class="upload-pro">
                  <label>Minimum Bill in RS.</label>
                  <input type="text" placeholder="Minimum Bill in RS." name="min_bill" value="<?php echo $min_bill; ?>" onkeypress="return isNumberKey(event);">
                  <div class="clear"></div>
                </div>
                <div class="upload-pro">
                  <label>Minimum first kms</label>
                  <input type="text" placeholder="Minimum first kms" name="min_kms" value="<?php echo $min_kms; ?>" onkeypress="return isNumberKey(event);"/>
                  <div class="clear"></div>
                </div>
                <div class="upload-pro">
                  <label>Extra Per km in RS.</label>
                  <input type="text" placeholder="Extra Per km in RS." name="extra_kms" value="<?php echo $extra_kms; ?>" onkeypress="return isNumberKey(event);"/>
                  <div class="clear"></div>
                </div> 
				<div class="upload-pro">
                  <label>Waiting time charges</label>
                  <input type="text" placeholder="Waiting time charges" name="waiting_charges" value="<?php echo $waiting_charges; ?>" onkeypress="return isNumberKey(event);"/>
                  <div class="clear"></div>
                </div>
				<div class="upload-pro">
                  <label>Ride time charges</label>
                  <input type="text" placeholder="Ride time charges" name="ride_charges" value="<?php echo $ride_charges; ?>" onkeypress="return isNumberKey(event);"/>
                  <div class="clear"></div>
                </div>
                
                <br />
                <label >
                  <input type="submit" value="submit" name="submit" class="sub" />
                </label>
              </form>
              <div class="clear"></div>
            </div>
          </div>
         <div class="clear"></div>
        </div>
      </div>
	  <?php include("admin-footer.php"); ?>
       
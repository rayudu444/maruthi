<?php 
include("header.php");
include("menu.php");
?>
<section class="register">
  <h3>Fare Chart</h3>
  <script type="text/javascript" src="admin/js/jquery-1.7.2.min.js"></script>
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
  <?php 
  if(isset($_POST['submit'])){
	  //print_r($_POST);
	  extract($_POST);
	  $sql=mysql_query("INSERT INTO `fare_chart`(`id`, `category`, `cartype`, `min_bill`, `min_kms`, `extra_kms`, `waiting_charges`, `ride_charges`) VALUES ('id','$category','$cartype','$min_bill','$min_kms','$extra_kms','$waiting_charges','$ride_charges')");
	  if($sql){ echo "<div class='admin_success'>Successfully Registered.</div>"; }
	else{ echo "<div class='admin_faile'>Registration Failed.</div>"; }
  }
  ?>
  <form action="" class="form1" method="post" name="f1" onSubmit="return validdata()">
	<select name="category" class="select">
	<option value="">Select Category</option>
	<option>Standard Rate</option>
	<option>Airport Rate</option>
	</select>
	<select name="cartype" class="select">
	<option value="">Select Car Type</option>
	<option>Sadan</option>
	<option>Mini</option>
	<option>SUV</option>
	</select>
    <input type="text" placeholder="Minimum Bill in RS." name="min_bill" onkeypress="return isNumberKey(event);">
    <input type="text" placeholder="Minimum first kms" name="min_kms" onkeypress="return isNumberKey(event);">
    <input type="text" placeholder="Extra Per km" name="extra_kms" onkeypress="return isNumberKey(event);">
    <input type="text" placeholder="Waiting time charges (post 10 Min)" name="waiting_charges" onkeypress="return isNumberKey(event);">
    <input type="text" placeholder="Ride time charges (post 10 Min)" name="ride_charges" onkeypress="return isNumberKey(event);">
    <div class="clear"></div>
    <button type="submit" name="submit" id="sub">Submit</button>
  </form>
</section>

<?php 
include("footer.php");
?>
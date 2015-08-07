<?php 
include("admin-header.php");
if($_SESSION['ses_admin_id']==''){ echo'<script>window.location="index.php";</script>'; }
$refid=$_SESSION['ses_admin_id'];
?>
<script type="text/javascript">
function validdata()
{
var owned_by=document.f1.owned_by.value;
var cartype=document.f1.cartype.value;
var vehicle_brand=document.f1.vehicle_brand.value;
var vehicle_model=document.f1.vehicle_model.value;
var vehicle_reg=document.f1.vehicle_reg.value;
var vehicle_chassis=document.f1.vehicle_chassis.value;
if(owned_by==""){ alert("Please Select Owned By"); return false; }
if(cartype=="") { alert("Please Select Car Type"); return false; }
if(vehicle_brand==""){ alert("Please Enter Vehicle Brand"); return false; }
if(vehicle_model==""){ alert("Please Enter Vehicle Modal"); return false; }
if(vehicle_reg==""){ alert("Please Enter Vehicle Reg No"); return false; }
if(vehicle_chassis==""){ alert("Please Enter Vehicle Chassis No"); return false; }
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
<div class="contact-div">
<div class="content">
<?php include("admin-menu.php"); ?>
<div class="offer-right-div">
        <div class="content-total-box" style="width:60%; margin-left:5%;">
          <h3>Travels</h3>
          <div class="main-table">
            <div class="table-header">
              <h4> Add Cabs</h4>
              <div class="clear"></div>
            </div>
            <div class="table2" style="width:80%;margin:0px auto;">
			<?php 
		if(isset($_POST['submit'])){
			extract($_POST);
			$id1=$_GET['id'];
				$sql=mysql_query("UPDATE `cab_reg` SET `owned_by`='$owned_by',`cartype`='$cartype',`vehicle_brand`='$vehicle_brand',`vehicle_model`='$vehicle_model',`vehicle_reg`='$vehicle_reg',`vehicle_chassis`='$vehicle_chassis' WHERE id='$id1'");
				if($sql){ echo "<div class='admin_success'>Successfully Updated.</div>"; }
				else{ echo "<div class='admin_faile'>Update Failed.</div>"; }
		}
		if($_GET['id']){
			$id=$_GET['id'];
			$sql=mysql_query("select * from cab_reg where id='$id'");
			$arr=mysql_fetch_array($sql);
			extract($arr);
		}
		?>
              <form class="upload-form" method="post" action="" name="f1" onSubmit="return validdata()">
              <div class="upload-pro">
                    <label>Owned By</label>
                    <div class="redio">
                      <div class="radio-box">
                        <label class="SingleClick"><span>Maruthi Cab</span>
                          <input type="radio" name="owned_by" value="MO" <?php if($owned_by=="MO"){ echo "checked='checked'"; } ?>/>
                        </label>
                      </div>
                      <div class="radio-box">
                        <label class="flip"><span>Other</span>
                          <input type="radio" name="owned_by" value="OT" <?php if($owned_by=="OT"){ echo "checked='checked'"; } ?>/>
                        </label>
                      </div>
					  <div class="radio-box">
                        <label class="flip"><span>Vendor</span>
                          <input type="radio" name="owned_by" value="VR" <?php if($owned_by=="VR"){ echo "checked='checked'"; } ?>/>
                        </label>
                      </div>
                    </div>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                  <label>Vehicle Type </label>
                  <select name="cartype">
                    <option value="">-- Select Car Type --</option>
                    <option <?php if($cartype=="Sedan"){ echo "selected='selected'"; } ?>>Sedan</option>
                    <option <?php if($cartype=="Hatchback"){ echo "selected='selected'"; } ?>>Hatchback</option>
                    <option <?php if($cartype=="SUV"){ echo "selected='selected'"; } ?>>SUV</option>
                  </select>
                  <div class="clear"></div>
                </div>
                <div class="upload-pro">
                  <label>Vehicle Brand</label>
                  <input type="text" placeholder="Vehicle Brand" name="vehicle_brand" value="<?php echo $vehicle_brand; ?>"/>
                  <div class="clear"></div>
                </div>
                <div class="upload-pro">
                  <label>Vehicle Modal </label>
                  <input type="text" placeholder="Vehicle Modal" name="vehicle_model" value="<?php echo $vehicle_model; ?>"/>
                  <div class="clear"></div>
                </div>
                <div class="upload-pro">
                  <label>Vehicle Reg No</label>
                  <input type="text" placeholder="Vehicle Reg No" name="vehicle_reg" value="<?php echo $vehicle_reg; ?>"/>
                  <div class="clear"></div>
                </div>
                <div class="upload-pro">
                  <label>Vehicle Chassis No</label>
                  <input type="text" placeholder="Vehicle Chassis No" name="vehicle_chassis" value="<?php echo $vehicle_chassis; ?>"/>
                  <div class="clear"></div>
                </div>
                <br />
                <label>
                  <input type="submit" value="submit" class="sub" name="submit"/>
                </label>
                <br />
              </form>
              <div class="clear"></div>
            </div>
          </div>
          <div class="clear"></div>
        </div>
      </div>
<?php include("admin-footer.php"); ?>
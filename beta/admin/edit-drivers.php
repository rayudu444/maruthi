<?php 
include("admin-header.php");
if($_SESSION['ses_admin_id']==''){ echo'<script>window.location="index.php";</script>'; }
$refid=$_SESSION['ses_admin_id'];
?>
<script>
$(function() {
$( "#datepicker1" ).datepicker({ changeMonth: true, changeYear: true, maxDate: "0D", dateFormat:"yy-mm-dd"});
$( "#datepicker2" ).datepicker({ changeMonth: true, changeYear: true, dateFormat:"yy-mm-dd"});
$( "#datepicker3" ).datepicker({ changeMonth: true, changeYear: true, dateFormat:"yy-mm-dd"});
$( "#datepicker4" ).datepicker({ changeMonth: true, changeYear: true, maxDate: "0D", dateFormat:"yy-mm-dd"});
});
</script>
<script type="text/javascript">
		$(function() {
		var dates = $("#txtFrom1, #txtTo1").datepicker({
		minDate: '',
		maxDate: '',
		changeMonth: true, 
		changeYear: true,
		dateFormat:"yy-mm-dd",
		onSelect: function(selectedDate) {
		var option = this.id == "txtFrom1" ? "minDate" : "maxDate",
		instance = $(this).data("datepicker"),
		date = $.datepicker.parseDate(
		instance.settings.dateFormat ||
		$.datepicker._defaults.dateFormat,
		selectedDate, instance.settings);
		dates.not(this).datepicker("option", option, date);
		}
		});
		});
</script>
<script type="text/javascript">
function validdata()
{
var driver_type=document.f1.driver_type.value;
var driver_name=document.f1.driver_name.value;
var mobile=document.f1.mobile.value;
if(driver_type==""){ alert("Please Select Driver Type"); return false; }
if(driver_name=="") { alert("Please Enter Name"); return false; }
if(mobile==""){ alert("Please Enter Mobile Number"); return false; }
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
        <div class="content-total-box">
          <h3>TRAVELS</h3>
          <div class="main-table">
            <div class="table-header">
              <h4>Add Drivers</h4>
              <div class="clear"></div>
            </div>
            <div class="header-sub">
			<?php 
		if(isset($_POST['submit'])){
			extract($_POST);
			$id1=$_GET['id'];
				$sql=mysql_query("UPDATE `driver_reg` SET `driver_type`='$driver_type',`driver_name`='$driver_name',`mobile`='$mobile',`dob`='$dob',`blood_group`='$blood_group',`agreement_number`='$agreement_number',`subscriber_id`='$subscriber_id',`license_number`='$license_number',`license_expiry_date`='$license_expiry_date',`badge_number`='$badge_number',`badge_expiry_date`='$badge_expiry_date',`bank_name`='$bank_name',`branch_name`='$branch_name',`account_number`='$account_number',`ifsc_code`='$ifsc_code',`pancard_number`='$pancard_number',`personal_details`='$personal_details',`verified_by`='$verified_by',`verified_number`='$verified_number',`verified_date`='$verified_date',`joining_date`='$joining_date',`exit_date`='$exit_date' WHERE id='$id1'");
				if($sql){ echo "<div class='admin_success'>Successfully Updated.</div>"; }
				else{ echo "<div class='admin_faile'>Update Failed.</div>"; }
			 
		}
		if($_GET['id']){
			$id=$_GET['id'];
			$sql=mysql_query("select * from driver_reg where id='$id'");
			$arr=mysql_fetch_array($sql);
			extract($arr);
		}
		?>
              <form class="upload-form" style="padding:10px;" method="post" action="" name="f1" onSubmit="return validdata()">
                <div class="form-inbox">
				<div class="upload-pro">
                    <label>Name</label>
					<select name="driver_type">
					<option value="">Driver Type</option>
					<option value="MO" <?php if($driver_type=="MO"){ echo "selected='selected'"; } ?>>Maruthi Driver</option>
					<option value="OT" <?php if($driver_type=="OT"){ echo "selected='selected'"; } ?>>Other</option>
					</select>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Name</label>
                    <input type="text" placeholder="Name" name="driver_name" value="<?php echo $driver_name; ?>"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Mobile No</label>
                    <input type="text" placeholder="Mobile No" name="mobile" onkeypress="return isNumberKey(event);" value="<?php echo $mobile; ?>"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>D.O.B</label>
                    <input type="text" placeholder="D O B" name="dob" id="datepicker1" value="<?php echo $dob; ?>"/>
                    <div class="clear"></div>
                  </div>
				  <div class="upload-pro">
                    <label>Blood Group</label>
                    <input type="text" placeholder="Blood Group" name="blood_group" value="<?php echo $blood_group; ?>"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Agreement Number</label>
                    <input type="text" placeholder="Agreement Number" name="agreement_number" value="<?php echo $agreement_number; ?>"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Subscriber ID</label>
                    <input type="text" placeholder="Subscriber ID" name="subscriber_id" value="<?php echo $subscriber_id; ?>"/>
                    <div class="clear"></div>
                  </div>
				  <div class="upload-pro">
                    <label>License Number</label>
                    <input type="text" placeholder="License Number" name="license_number" value="<?php echo $license_number; ?>"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>License Expiry Date</label>
                    <input type="text" placeholder="License Expiry Date" name="license_expiry_date" id="datepicker2" value="<?php echo $license_expiry_date; ?>"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Badge Number </label>
                    <input type="text" placeholder="Badge Number" name="badge_number" value="<?php echo $badge_number; ?>"/>
                    <div class="clear"></div>
                  </div>
				  <div class="upload-pro">
                    <label>Badge Expiry Date</label>
                    <input type="text" placeholder="Badge Expiry Date" name="badge_expiry_date" id="datepicker3" value="<?php echo $badge_expiry_date; ?>"/>
                    <div class="clear"></div>
                  </div>
                  
                </div>
                <div class="form-inbox">
                  <div class="upload-pro">
                    <label>Bank Name</label>
                    <input type="text" placeholder="Bank Name" name="bank_name" value="<?php echo $bank_name; ?>"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Branch Name </label>
                    <input type="text" placeholder="Branch Name" name="branch_name" value="<?php echo $branch_name; ?>"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Account Number</label>
                    <input type="text" placeholder="Account Number" name="account_number" onkeypress="return isNumberKey(event);" value="<?php echo $account_number; ?>"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>IFSC Code</label>
                    <input type="text" placeholder="IFSC Code" name="ifsc_code" value="<?php echo $ifsc_code; ?>"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Pan Card Number</label>
                    <input type="text" placeholder="Pan Card Number" name="pancard_number" value="<?php echo $pancard_number; ?>"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Personal Details</label>
                    <div class="redio">
                      <div class="radio-box">
                        <label><span>Married</span>
                          <input type="radio" name="personal_details" value="Married" <?php if($personal_details=="Married"){ echo "checked='checked'"; } ?>/>
                        </label>
                      </div>
                      <div class="radio-box">
                        <label><span>Unmarried</span>
                          <input type="radio" name="personal_details" value="Unmarried" <?php if($personal_details=="Unmarried"){ echo "checked='checked'"; } ?>/>
                        </label>
                      </div>
                    </div>
                    <div class="clear"></div>
                  </div>
				  <div class="upload-pro">
                    <label>Verified by</label>
                    <input type="text" placeholder="Verified by" name="verified_by" value="<?php echo $verified_by; ?>"/>
                    <div class="clear"></div>
                  </div>
				  <div class="upload-pro">
                    <label>Verification Number</label>
                    <input type="text" placeholder="Verification Number" name="verified_number" value="<?php echo $verified_number; ?>"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Date of Verification</label>
                    <input type="text" placeholder="Date of Verification" name="verified_date" id="datepicker4" value="<?php echo $verified_date; ?>"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Date of Joining </label>
                    <input type="text" placeholder="Joining Date" ID="txtFrom1" name="joining_date" value="<?php echo $joining_date; ?>"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Date of Exit </label>
                    <input type="text" placeholder="Exit Date" ID="txtTo1" name="exit_date" value="<?php echo $exit_date; ?>"/>
                    <div class="clear"></div>
                  </div>
                </div>
              <div class="form-inbox">
				<br />
                  <label>
                    <input type="submit" value="submit" name="submit" class="sub" />
                  </label>
				</div>
			  </form>
              <div class="clear"></div>
            </div>
            <div class="table2" >
              <div class="clear"></div>
            </div>
          </div>
        </div>
      </div>
<?php include("admin-footer.php"); ?>
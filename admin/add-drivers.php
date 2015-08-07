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
			$sq3=mysql_query("select * from driver_reg where mobile='$mobile'");
			$arr=mysql_fetch_array($sq3);
			$driver_id=$arr['id'];
			if($driver_id!=''){ echo "<div class='admin_faile'>Mobile Number Already Exist.</div>"; }
			else{
				$sql=mysql_query("INSERT INTO `driver_reg`(`id`, `driver_type`, `driver_name`, `mobile`, `dob`, `blood_group`, `password`, `agreement_number`, `subscriber_id`, `license_number`, `license_expiry_date`, `badge_number`, `badge_expiry_date`, `bank_name`, `branch_name`, `account_number`, `ifsc_code`, `pancard_number`, `personal_details`, `verified_by`, `verified_number`, `verified_date`, `joining_date`, `exit_date`) VALUES ('id','$driver_type','$driver_name','$mobile','$dob','$blood_group','driver','$agreement_number','$subscriber_id','$license_number','$license_expiry_date','$badge_number','$badge_expiry_date','$bank_name','$branch_name','$account_number','$ifsc_code','$pancard_number','$personal_details','$verified_by','$verified_number','$verified_date','$joining_date','$exit_date')");
				if($sql){ echo "<div class='admin_success'>Successfully Registered.</div>"; }
				else{ echo "<div class='admin_faile'>Registration Failed.</div>"; }
			 }
		}
		?>
              <form class="upload-form" style="padding:10px;" method="post" action="" name="f1" onSubmit="return validdata()">
                <div class="form-inbox">
				<div class="upload-pro">
                    <label>Name</label>
					<select name="driver_type">
					<option value="">Driver Type</option>
					<option value="MO">Maruthi Driver</option>
					<option value="OT">Other</option>
					</select>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Name</label>
                    <input type="text" placeholder="Name" name="driver_name"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Mobile No</label>
                    <input type="text" placeholder="Mobile No" name="mobile" onkeypress="return isNumberKey(event);"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>D.O.B</label>
                    <input type="text" placeholder="D O B" name="dob" id="datepicker1"/>
                    <div class="clear"></div>
                  </div>
				  <div class="upload-pro">
                    <label>Blood Group</label>
                    <input type="text" placeholder="Blood Group" name="blood_group"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Agreement Number</label>
                    <input type="text" placeholder="Agreement Number" name="agreement_number"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Subscriber ID</label>
                    <input type="text" placeholder="Subscriber ID" name="subscriber_id"/>
                    <div class="clear"></div>
                  </div>
				  <div class="upload-pro">
                    <label>License Number</label>
                    <input type="text" placeholder="License Number" name="license_number"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>License Expiry Date</label>
                    <input type="text" placeholder="License Expiry Date" name="license_expiry_date" id="datepicker2"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Badge Number </label>
                    <input type="text" placeholder="Badge Number" name="badge_number"/>
                    <div class="clear"></div>
                  </div>
				  <div class="upload-pro">
                    <label>Badge Expiry Date</label>
                    <input type="text" placeholder="Badge Expiry Date" name="badge_expiry_date" id="datepicker3"/>
                    <div class="clear"></div>
                  </div>
                  
                </div>
                <div class="form-inbox">
                  <div class="upload-pro">
                    <label>Bank Name</label>
                    <input type="text" placeholder="Bank Name" name="bank_name"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Branch Name </label>
                    <input type="text" placeholder="Branch Name" name="branch_name"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Account Number</label>
                    <input type="text" placeholder="Account Number" name="account_number" onkeypress="return isNumberKey(event);"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>IFSC Code</label>
                    <input type="text" placeholder="IFSC Code" name="ifsc_code"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Pan Card Number</label>
                    <input type="text" placeholder="Pan Card Number" name="pancard_number"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Personal Details</label>
                    <div class="redio">
                      <div class="radio-box">
                        <label><span>Married</span>
                          <input type="radio" name="personal_details" value="Married"/>
                        </label>
                      </div>
                      <div class="radio-box">
                        <label><span>Unmarried</span>
                          <input type="radio" name="personal_details" value="Unmarried"/>
                        </label>
                      </div>
                    </div>
                    <div class="clear"></div>
                  </div>
				  <div class="upload-pro">
                    <label>Verified by</label>
                    <input type="text" placeholder="Verified by" name="verified_by"/>
                    <div class="clear"></div>
                  </div>
				  <div class="upload-pro">
                    <label>Verification No.</label>
                    <input type="text" placeholder="Verification Number" name="verified_number"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Date of Verification</label>
                    <input type="text" placeholder="Date of Verification" name="verified_date" id="datepicker4"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Date of Joining </label>
                    <input type="text" placeholder="Joining Date" ID="txtFrom1" name="joining_date"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Date of Exit </label>
                    <input type="text" placeholder="Exit Date" ID="txtTo1" name="exit_date"/>
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
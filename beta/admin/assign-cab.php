<?php 
include("admin-header.php");
if($_SESSION['ses_admin_id']==''){ echo'<script>window.location="index.php";</script>'; }
$refid=$_SESSION['ses_admin_id'];
?>
<script>
$(function() {
$( "#datepicker1" ).datepicker({ changeMonth: true, changeYear: true, minDate: "0D", dateFormat:"yy-mm-dd"});
});
</script>
<script>
		$(function() {
		$('#mobile').blur(function(){
		var mobile= $(this).val();
		$.ajax({
			type: "POST",
			url: "cab-mobile-ajax.php",
			data: {"mobile" : mobile},
			success: function(msg){
			$("#driver_name").val(msg);
			}
			});
		});
		$('#fhours').keyup(function(){
		var fhours= parseInt($('#fhours').val());
		if(fhours!='' && fhours!=null){
		if(fhours<=12){ }
		else{ $(this).val(''); alert("Hours Lessthan 12"); } }
		});
		$('#fminutes').keyup(function(){
		var fminutes= parseInt($('#fminutes').val());
		if(fminutes!='' && fminutes!=null){
		if(fminutes<=59){ }
		else{ $(this).val(''); alert("Minutes Lessthan 59"); } }
		});
		});						
		</script>
<script type="text/javascript">
function validdata()
{
var mobile=document.f1.mobile.value;
var driver_name=document.f1.driver_name.value;
var crdate=document.f1.crdate.value;
var fhours=document.f1.fhours.value;
var fminutes=document.f1.fminutes.value;
if(mobile==""){ alert("Please Enter Mobile Number"); return false; }
if(driver_name=="") { alert("Please Driver Enter Name"); return false; }
if(crdate==""){ alert("Please Select Date"); return false; }
if(fhours==""){ alert("Please Enter Hours"); return false; }
if(fminutes==""){ alert("Please Enter Minutes"); return false; }
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
			$id=$_GET['id'];
		if(isset($_POST['submit'])){
			extract($_POST);
			$sql1=mysql_query("select * from driver_reg where mobile='$mobile'");
			$arr1=mysql_fetch_array($sql1);
			$driver_id=$arr1['id'];
			$cab_id=$_GET['id'];
			$time=$fhours.":".$fminutes." ".$fam;
				$sql=mysql_query("INSERT INTO `cab_drivers`(`id`, `crdate`, `time`, `cab_id`, `driver_id`) VALUES ('id','$crdate','$time','$cab_id','$driver_id')");
				if($sql){ $res=mysql_query("UPDATE `cab_reg` SET `status`='1' WHERE id='$cab_id'");
					echo "<div class='admin_success'>Successfully Assign Cab.</div>"; }
				else{ echo "<div class='admin_faile'>Assign Failed.</div>"; }
		}
		?>
              <form class="upload-form" style="padding:10px;" method="post" action="" name="f1" onSubmit="return validdata()">
                <div class="form-inbox">
				<div class="upload-pro">
                    <label>Vehicle Number</label>
					<?php 
					$sql=mysql_query("select * from cab_reg where id='$id'");
					$arr=mysql_fetch_array($sql);
					$vehicle_reg=$arr['vehicle_reg'];
					?>
                    <input type="text" placeholder="Vehicle No" name="cab_no" value="<?php echo $vehicle_reg; ?>" readonly>
                    <div class="clear"></div>
                  </div>
				  <div class="upload-pro">
                    <label>Driver Mobile</label>
                    <input type="text" placeholder="Driver Mobile No" name="mobile" id="mobile" onkeypress="return isNumberKey(event);"/>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Driver Name</label>
                    <input type="text" placeholder="Driver Name" name="driver_name" id="driver_name" readonly>
                    <div class="clear"></div>
                  </div>
                  <div class="upload-pro">
                    <label>Date</label>
                    <input type="text" placeholder="Assign Date" name="crdate" id="datepicker1"/>
                    <div class="clear"></div>
                  </div>
				  <div class="upload-pro">
                  <label>Start Time</label>
                  <div class="time-input">
                    <input type="text" placeholder="Hours"  name="fhours" id="fhours"/>
                    <input type="text" placeholder="Minutes" name="fminutes" id="fminutes"/>
                    <select class="am" name="fam">
                      <option>AM</option>
                      <option>PM</option>
                    </select>
                  </div>
                  <div class="clear"></div>
                </div>
                </div>
				<div class="clear"></div>
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
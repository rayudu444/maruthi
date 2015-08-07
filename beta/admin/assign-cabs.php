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
               <h4>Assign Cabs</h4>
               <div class="header-right">
                <div class="clear"></div>
              </div>
               <div class="clear"></div>
             </div>
            <div class="header-sub">
               <div class="header-sub">
                <label class="feed">
                   <input type="text" placeholder="Vehicle No" />
                   <input type="button" class="feed-btn" value="search">
                 </label>
                <div class="clear"></div>
              </div>
               <div class="clear"></div>
             </div>
            <div class="table2" >
               <table class="order-tab">
                <tr>
                   <th  width="15%">Vehicle No</th>
                   <th width="15%">Driver Name</th>
                   <th  width="10%">Date</th>
                   <th width="10%" class="edit-center">Status</th>
                   <th width="18%"></th>
                 </tr>
                <tr>
                   <td>AP29 9089</td>
                   <td>Pavan Kumar</td>
                   <td>25/06/2015</td>
                   <td><input type="submit"  value="Submit" class="submit"/></td>
                 </tr>
                <tr>
                   <td>AP29 9089</td>
                   <td>Pavan Kumar</td>
                   <td>25/06/2015</td>
                   <td><input type="submit"  value="Submit" class="submit"/></td>
                 </tr>
                <tr>
                   <td>AP29 9089</td>
                   <td>Pavan Kumar</td>
                   <td>25/06/2015</td>
                   <td><input type="submit"  value="Submit" class="submit"/></td>
                 </tr>
                <tr>
                   <td>AP29 9089</td>
                   <td>Pavan Kumar</td>
                   <td>25/06/2015</td>
                   <td><input type="submit"  value="Submit" class="submit"/></td>
                 </tr>
                <tr>
                   <td>AP29 9089</td>
                   <td>Pavan Kumar</td>
                   <td>25/06/2015</td>
                   <td><input type="submit"  value="Submit" class="submit"/></td>
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
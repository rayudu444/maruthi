<?php 
include("admin-header.php");
if($_SESSION['ses_admin_id']==''){ echo'<script>window.location="index.php";</script>'; }
$refid=$_SESSION['ses_admin_id'];
?>
<div class="contact-div">
    <div class="content">
	<?php include("admin-menu.php"); ?>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
<script>
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.
var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};
function initialize() {
  // Create the autocomplete object, restricting the search
  // to geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
      { types: ['geocode'] });
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('autocomplete1')),
      { types: ['geocode'] });
  // When the user selects an address from the dropdown,
  // populate the address fields in the form.
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    fillInAddress();
  });
}
    </script>
       <div class="offer-right-div">
        <div class="content-total-box" style="width:60%; margin-left:5%;">
          <h3>Travels</h3>
		  <html>
		<head>
		</head>
		<body onload="initialize()">
          <div class="main-table">
            <div class="table-header">
              <h4>Edit Trip</h4>
              <div class="clear"></div>
            </div>
			<script>
		$(function() {
		$('#mobile').blur(function(){
		var mobile= $(this).val();
		$.ajax({
			type: "POST",
			url: "admin-mobile-ajax.php",
			data: {"mobile" : mobile},
			success: function(msg){
			$("#username").val(msg);
			}
			});
		});
		$('#username').blur(function(){
		var mobile= $('#mobile').val();
		$.ajax({
			type: "POST",
			url: "admin-email-ajax.php",
			data: {"mobile" : mobile},
			success: function(msg){
			$("#email").val(msg);
			}
			});
		});
		$('#fhours').keyup(function(){
		var fhours= parseInt($('#fhours').val());
		if(fhours!='' && fhours!=null){
		if(fhours<=12){ }
		else{ $(this).val(''); alert("Hours Lessthan 12"); } }
		});
		$('#thours').keyup(function(){
		var thours= parseInt($('#thours').val());
		if(thours!='' && thours!=null){
		if(thours<=12){ }
		else{ $(this).val(''); alert("Hours Lessthan 12"); } }
		});
		$('#fminutes').keyup(function(){
		var fminutes= parseInt($('#fminutes').val());
		if(fminutes!='' && fminutes!=null){
		if(fminutes<=59){ }
		else{ $(this).val(''); alert("Minutes Lessthan 59"); } }
		});
		$('#tminutes').keyup(function(){
		var tminutes= parseInt($('#tminutes').val());
		if(tminutes!='' && tminutes!=null){
		if(tminutes<=59){ }
		else{ $(this).val(''); alert("Minutes Lessthan 59"); } }
		});
		});						
		</script>
		<?php 
		if(isset($_POST['submit'])){
			extract($_POST);
			if($fhours!=''){ $start_time=$fhours.":".$fminutes." ".$fam; 
			if($fminutes!=''){ $start_time=$fhours.":".$fminutes." ".$fam;}
			}
			$sq3=mysql_query("select * from registration where mobile='$mobile'");
			$arr=mysql_fetch_array($sq3);
			$user_id=$arr['id'];
			if($user_id==''){ echo "<div class='admin_faile'>Please provide valid Mobile Number.</div>"; }
			else{
			if($mobile!='' && $start_date!='' && $start_time!='' && $email!='' && $username!='' && $start_location!=''){
				$id1=$_GET['id'];
				$sql=mysql_query("UPDATE `trip_reg` SET `start_date`='$start_date',`start_time`='$start_time',`start_location`='$start_location',`cartype`='$cartype',`end_location`='$end_location' WHERE id='$id1'");
				if($sql){ echo "<div class='admin_success'>Successfully Updated.</div>"; }
				else{ echo "<div class='admin_faile'>Update Failed.</div>"; }
			}
			else{ echo "<div class='admin_faile'>Please fill all fields.</div>"; } }
		}
		?>
		<?php 
		if($_GET['id']){
			$id=$_GET['id'];
			$sql=mysql_query("select * from trip_reg where id='$id'");
			$arr=mysql_fetch_array($sql);
			extract($arr);
		}
		?>
            <div class="table2" style="width:80%;margin:0px auto;">
              <form class="upload-form" method="post" action="">
                <div class="upload-pro">
                  <label>Mobile No</label>
                  <input type="text" placeholder="Mobile No" name="mobile" id="mobile" value="<?php echo $mobile; ?>" readonly>
                  <div class="clear"></div>
                </div>
                <div class="upload-pro">
                  <label>Name</label>
                  <input type="text" placeholder="Name" name="username" id="username" value="<?php echo $name; ?>" readonly>
                  <div class="clear"></div>
                </div>
                <div class="upload-pro">
                  <label>Email Id</label>
                  <input type="text" placeholder="Email Id" name="email" id="email" value="<?php echo $email; ?>" readonly>
                  <div class="clear"></div>
                </div>
                <div class="upload-pro">
                  <label>Start Date</label>
                  <input type="text" placeholder="Start Date" ID="txtFrom" name="start_date" id="fdate" value="<?php echo $start_date; ?>"/>
                  <div class="clear"></div>
                </div>
                <div class="upload-pro">
                  <label>Start Time</label>
                  <div class="time-input">
				   <?php $start_time1=explode(" ",$start_time);
				 $start_time2=explode(":",$start_time1[0]);
				 ?>
                    <input type="text" placeholder="Hours"  name="fhours" id="fhours" value="<?php echo $start_time2[0]; ?>"/>
                    <input type="text" placeholder="Minutes" name="fminutes" id="fminutes" value="<?php echo $start_time2[1]; ?>"/>
                    <select class="am" name="fam">
                      <option <?php if($start_time1[1]=="AM"){ echo "selected='selected'"; } ?>>AM</option>
                      <option <?php if($start_time1[1]=="PM"){ echo "selected='selected'"; } ?>>PM</option>
                    </select>
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="upload-pro">
                  <label>Pickup Location</label>
                  <input type="text" placeholder="Pickup Location" name="start_location" id="autocomplete" onFocus="geolocate()" value="<?php echo $start_location; ?>"/>
                  <div class="clear"></div>
                </div>
                <div class="upload-pro">
                  <label>Car Type </label>
                  <select name="cartype">
                    <option>-- Select Car Type --</option>
                    <option <?php if($cartype=="Sedan"){ echo "selected='selected'"; } ?>>Sedan</option>
                    <option <?php if($cartype=="Mini"){ echo "selected='selected'"; } ?>>Mini</option>
                    <option <?php if($cartype=="SUV"){ echo "selected='selected'"; } ?>>SUV</option>
                  </select>
                  <div class="clear"></div>
                </div>
                <div class="upload-pro">
                  <label>Drop Location</label>
                  <input type="text" placeholder="Drop Location" name="end_location" id="autocomplete1" onFocus="geolocate()" value="<?php echo $end_location; ?>"/>
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
		 </body>
		 <html>
        </div>
      </div>
	  <?php include("admin-footer.php"); ?>
       
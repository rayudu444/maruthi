<?php 
include("header.php");
include("menu.php");
?>
<link type="text/css" href="admin/css/jquery-ui-1.8.19.custom.css" rel="stylesheet" />
<script type="text/javascript" src="admin/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="admin/js/jquery-ui-1.8.19.custom.min.js"></script>
<script type="text/javascript">
$.noConflict();
jQuery( document ).ready(function( $ ) {
		$(function() {
			$('#mobile').blur(function(){
		var mobile= $(this).val();
		$.ajax({
			type: "POST",
			url: "admin/admin-mobile-ajax.php",
			data: {"mobile" : mobile},
			success: function(msg){
				if(msg==""){
					document.getElementById("error3").innerHTML = "Mobile Number Not Registered.";
				}
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
			
		var dates = $("#txtFrom, #txtTo").datepicker({
		minDate: '0',
		maxDate: '',
		dateFormat:"yy-mm-dd",
		onSelect: function(selectedDate) {
		var option = this.id == "fdate" ? "minDate" : "maxDate",
		instance = $(this).data("datepicker"),
		date = $.datepicker.parseDate(
		instance.settings.dateFormat ||
		$.datepicker._defaults.dateFormat,
		selectedDate, instance.settings);
		dates.not(this).datepicker("option", option, date);
		}
		});
		
		});
		});
</script>

<section id="main-slider" class="no-margin banner">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="serach-box-main effect8">
          <div class="bs-example bs-example-tabs">
            <ul class="nav nav-tabs" id="myTab">
              <p class="active1 tab-p"><a data-toggle="tab" href="#Book">Book Local</a></p>
              <p class="tab-p"><a data-toggle="tab" href="#Inter">Inter City</a></p>
            </ul>
            <div class="tab-content" id="myTabContent">
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
	<html>
		<head>
		</head>
		<body onload="initialize()">
		<?php 
		if(isset($_POST['submit'])){
			extract($_POST);
			if($fhours!=''){ $start_time=$fhours.":".$fminutes." ".$fam; 
			if($fminutes!=''){ $start_time=$fhours.":".$fminutes." ".$fam;}
			}
			
			$sq3=mysql_query("select * from registration where mobile='$mobile'");
			$arr=mysql_fetch_array($sq3);
			$user_id=$arr['id'];
			$username=$arr['name'];
			$email=$arr['email'];
			if($user_id==''){ echo "<div class='admin_faile'>Please provide valid Mobile Number.</div>"; }
			else{
			if($mobile!='' && $start_date!='' && $start_time!='' && $email!='' && $username!='' && $start_location!=''){
				$sql=mysql_query("INSERT INTO `trip_reg`(`id`, `mobile`, `name`, `email`, `start_date`, `start_time`, `start_location`, `cartype`, `end_location`, `status`) VALUES ('id','$mobile','$username','$email','$start_date','$start_time','$start_location','$cartype','$end_location','0')");
				if($sql){ echo "<div class='admin_success'>Successfully Registered.</div>"; }
				else{ echo "<div class='admin_faile'>Registration Failed.</div>"; }
			}
			else{ echo "<div class='admin_faile'>Please fill all fields.</div>"; } }
		}
		?>
              <div id="Book" class="tab-pane fade active in">
                <form  method="post" action="">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="input-group bn-inp-box"> <span class="input-group-addon inp-color"><span class="fa fa-mobile"></span> Mobile</span>
                        <input type="text" class="form-control bn-inp" placeholder="Tracking Mobile No" name="mobile" id="mobile">
                      </div>
					  <div id="error3" style="color:red; font-size:12px; margin-top:-13px;"> &nbsp </div>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group  bn-inp-box">
                        <div class="input-group-addon inp-color"><span class="fa fa-map-marker"></span>Location</div>
                        <input type="text" class="form-control bn-inp" placeholder="Pickup Location" name="start_location" id="autocomplete" onFocus="geolocate()">
                      </div>
                    </div>
                    
					<div class="col-md-12">
                      <div class="input-group bn-inp-box">
                        <div class="input-group-addon inp-color"><span class="fa fa-calendar"></span> Date</div>
                        <input type="text" class="form-control bn-inp" id="txtFrom" name="start_date" placeholder="Date" name="start_date"/>
                      </div>
                    </div>
                    
                    <div class="col-md-6" style="padding-right:0px;">
                      <div class="input-group bn-inp-box"> <span class="input-group-addon inp-color"> <i class="fa fa-clock-o"></i>Time</span>
                        <input type="text" class="form-control date"  placeholder="Hours"  name="fhours" id="fhours">
                      </div>
                    </div>
                    <div class="col-md-3 car-inp">
                        <input type="text" class="form-control" placeholder="Minutes" name="fminutes" id="fminutes">
                    </div>
                    <div class="col-md-3 car-inp" >
                        <select class="am" name="fam">
                        <option>AM</option>
                        <option>PM</option>
                        </select>
                    </div>
                    <div class="clearfix"></div>
					
					 <div class="col-md-12">
                      <div class="input-group bn-inp-box">
                        <div class="input-group-addon inp-color"><span class="fa fa-taxi"></span>Car Type</div>
                       <select class="car-select" name="cartype">
                        <option>-- Select Car Type --</option>
						<option>Sedan</option>
						<option>Mini</option>
						<option>SUV</option>
                       </select>
                      </div>
                    </div>
					
                    <div class="col-md-12">
                      <div class="input-group bn-inp-box">
                        <div class="input-group-addon inp-color"><span class="fa fa-map-marker"></span> Location</div>
                        <input type="text" class="form-control bn-inp" placeholder="Drop Location" name="end_location" id="autocomplete1" onFocus="geolocate()">
                      </div>
                    </div>
                   
                        
                    
                    <div class="form-group col-xs-offset-2">
					 <input type="submit" value="Continue Car Reservation" name="submit" class="btn btn-primary btn-md" />
                      
                    </div>
                  </div>
                </form>
              </div>
			  
			  <div class="clear"></div>
		 </body>
		 </html>
              <div id="Inter" class="tab-pane fade ">
                <form>
                  <div class="row">
                    <div class="col-xs-7" style="padding-right:0px;">
                      <div class="input-group bn-inp-box"> <span class="input-group-addon inp-color"><span class="fa fa-calendar"></span> Date</span>
                        <input type="text" class="form-control" placeholder="Date"  id="example1">
                      </div>
                    </div>
                    <div class="col-xs-5" style="padding-right:25px;">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Time">
                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span> </div>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group bn-inp-box">
                        <div class="input-group-addon inp-color"><span class="fa fa-map-marker"></span> City</div>
                        <input type="text" class="form-control bn-inp" placeholder="Enter City" >
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group  bn-inp-box">
                        <div class="input-group-addon inp-color"><span class="fa fa-map-marker"></span> Area</div>
                        <input type="text" class="form-control bn-inp" placeholder="Enter Area" >
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group bn-inp-box">
                        <div class="input-group-addon inp-color"><span class="fa fa-map-marker"></span> Address</div>
                        <input type="text" class="form-control bn-inp" placeholder="Enter Address" >
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group bn-inp-box"> <span class="input-group-addon inp-color"><span class="fa fa-mobile"></span> Mobile</span>
                        <input type="text" class="form-control bn-inp" placeholder="Tracking Mobile No" >
                      </div>
                    </div>
                    <div class="form-group col-xs-offset-2">
                      <button class="btn btn-primary btn-lg" required="required" name="submit" type="submit"><b>Continue Car Reservation</b> </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="banner-text">
          <h1>Luxury  Cars on Rent From Rs.99 </h1>
          <h2>Treat Your Self In Hyderabad !</h2>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/#main-slider-->

<section id="feature" >
  <div class="container">
    <div class="wow fadeInDown car-services">
      <h2>Services</h2>
    </div>
    <div class="row wow fadeInDown">
      <div class="car-box">
        <div class="col-xs-12 col-sm-4 col-md-4" >
          <div class="recent-work-wrap"> <img class="img-responsive" src="images/portfolio/recent/item1.png" alt="">
            <div class="overlay">
              <div class="recent-work-inner">
                <h3><a href="#">One Tap to Ride</a> </h3>
                <p> Mcabs uses your phone's GPS to detect your location and connects you with the nearest available driver. </p>
                <a class="preview" href="images/portfolio/recent/item1.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> </div>
            </div>
          </div>
          <div class="car-name" >
            <h2>Local</h2>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
          <div class="recent-work-wrap"> <img class="img-responsive" src="images/portfolio/recent/item2.png" alt="">
            <div class="overlay">
              <div class="recent-work-inner">
                <h3><a href="#">One Tap to Ride</</a></h3>
                <p>Mcabs uses your phone's GPS to detect your location and connects you with the nearest available driver.</p>
                <a class="preview" href="images/portfolio/recent/item2.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> </div>
            </div>
          </div>
          <div class="car-name" >
            <h2>Luxury Cars</h2>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
          <div class="recent-work-wrap"> <img class="img-responsive" src="images/portfolio/recent/item3.png" alt="">
            <div class="overlay">
              <div class="recent-work-inner">
                <h3><a href="#">Your Ride On Demand </a></h3>
                <p>Uber uses your phone's GPS to detect your location and connects you with the nearest available driver.</p>
                <a class="preview" href="images/portfolio/recent/item3.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> </div>
            </div>
          </div>
          <div class="car-name" >
            <h2>Inter City</h2>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <!--/.container--> 
</section>
<!--/#feature-->

<section id="recent-works">
  <div class="container">
    <div class="row wow fadeInDown">
      <div class="col-md-8 col-sm-12" >
        <h2>About us</h2>
        <div class="feature-wrap">
          <div class="pull-left"> <img class="img-responsive" src="images/driver.jpg"> </div>
          <div class="media-body">
            <h4>Choice is a beautiful thing</h4>
            <p><b>M Cabs  is evolving the way the world moves. By seamlessly connecting riders to drivers through our apps, we make cities more accessible, opening up more possibilities for riders and more business for drivers.</b> </p>
            <p> From our founding in 2009 to our launches in hundreds of cities today, Mcab's rapidly expanding global presence continues to bring people and their cities closer.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <h2>Latest Offers</h2>
        <img src="images/cab.jpg" class="img-responsive img-rounded"> </div>
    </div>
    <!--/.row--> 
  </div>
  <!--/.container--> 
</section>
<!--/#recent-works-->

<section id="services" class="service-item">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-8">
        <div class="media">
          <div class="pull-left cab-driver"> <img class="img-circle" alt="" src="images/cab-map.jpg"> </div>
          <div class="media-body">
            <h1>Quick &  Safe</h1>
            <h2>Airport Transfers</h2>
            <p class="lead">When you request a ride, we’ll find a driver and let you track their location on the map. Feel free to put away your phone – we’ll text you when your ride arrives. Your driver’s name and car details appear in the app, and you can message or call if you need to.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6" >
        <div class="feature-wrap"> <i class="fa fa-bullhorn"></i>
          <h2>VIP Services</h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
          <img src="images/white-line.png" class="img-responsive white"> <i class="fa fa-bullhorn"></i>
          <h2>Special Offers</h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
        </div>
      </div>
    </div>
    <!--/.row--> 
  </div>
  <!--/.container--> 
</section>
<!--/#services-->

<section id="middle" style="padding:0px;">
  <div class="contact-box">
    <div id="map" data-position-latitude="17.4100091" data-position-longitude="78.4607027"></div>
    <div class="container">
      <div class="contact-form1 col-md-3">
        <div class="col-md-12 col-sm-12">
          <div class="contact-inbox">
            <h2>Maruthi Cabs</h2>
            <p>Flat No : 101,102 Purni Plaza ,</p>
            <p>Opp. Shadan Collage ,</p>
            <p>Khairatabad,</p>
            <p>Hyderabad ,</p>
            <p>Telanga - 500004.</p>
            <p><i class="fa fa-envelope"></i>&nbsp; info@maruthicabs.co.in</p>
            <p><i class="fa fa-phone"></i>&nbsp; + 91 40 – 69996989</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!--/.container--> 
  
</section>
<!--/#middle-->
<?php 
include("footer.php");
?>
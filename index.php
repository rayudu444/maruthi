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

		

		$('#mobile').blur(function(){

		var mobile= $(this).val();

		$.ajax({

			type: "POST",

			url: "admin/admin-mobile-ajax.php",

			data: {"mobile" : mobile},

			success: function(msg){

			$("#username").val(msg);

			}

			});

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

		$.ajax({

						   type: "POST",

						   url: "dateresult.php",

						   data: {"date" : selectedDate},

						   success: function(msg){

							   //alert(msg);

							$("#ftime").empty();

							var option = "<option value=''>Select Time</option>";

							$("#ftime").append(option);

							var data=JSON.parse( msg );

							$.each(data,function(index,value){

							option = "<option>"+value+"</option>";

							$("#ftime").append(option);

							});

						   }

						 });

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

              <!--<p class="tab-p"><a data-toggle="tab" href="#Inter">Inter City</a></p>-->

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

			$sq3=mysql_query("select * from registration where mobile='$mobile'");

			$arr=mysql_fetch_array($sq3);

			$user_id=$arr['id'];

			if($username==""){

				$username=$arr['name'];

			}

			$email=$arr['email'];

			if($user_id==''){ echo "<div class='admin_faile'>Please provide valid Mobile Number.</div>"; }

			else{

			if($mobile!='' && $start_date!='' && $start_time!='' && $email!='' && $username!='' && $start_location!=''){

				$sql=mysql_query("INSERT INTO `trip_reg`(`id`, `mobile`, `name`, `email`, `start_date`, `start_time`, `start_location`, `cartype`, `end_location`, `status`) VALUES ('id','$mobile','$username','$email','$start_date','$start_time','$start_location','$cartype','$end_location','0')");

				if($sql){ echo "<div class='admin_success'>Successfully Registered.</div>";

				$sql1=mysql_query("select * from trip_reg where mobile='$mobile' order by id desc");

				$arr1=mysql_fetch_array($sql1);

				$trip_id=$arr1['id'];

				$to=$mobile;
        $msg="Welcome to Maruthicabs! Your booking has been confirmed, your ref No: $trip_id, you will receive cab details 20Mins before your trip start.";
        //$url = "http://bsms.slabs.mobi/spanelv2/api.php?username=MARUTHI&password=689891&to=".$to."&from=".$from."&message=".urlencode($msg);
        $url = "http://sms1.brandebuzz.in/API/sms.php?username=marutiindia9&password=marutiindia9&from=MARUTI&to=".$to."&msg=".urlencode($msg)."&type=1&dnd_check=0";

        $ret = file($url); 

        $msg1="Dear Admin, $username has booked a cab ref No: $trip_id.";
        $url1 = "http://sms1.brandebuzz.in/API/sms.php?username=marutiindia9&password=marutiindia9&from=MARUTI&to=9849020292&msg=".urlencode($msg1)."&type=1&dnd_check=0";
        $ret = file($url1);  

				

				$to=$email;

				$name=$username;

				$subject = "Trip Registration Confirmation";

				$message = "

<html>

<head>

<title>HTML email</title>

</head>

<body>

<table bgcolor='#F4F4F4' align='center' cellspacing='0' cellpadding='0' border='0' style='width:600px'>

<tbody>

<tr>

<td width='600' style='border:1px solid #ccc;'>



<table align='center' cellspacing='0' cellpadding='0' border='0' style='width:100%'>

<tbody>

<tr><td><a target='_blank' href='http://maruthicabs.com/images/logo.png'><img border='0' alt='maruthicabs' src='http://maruthicabs.com/images/logo.png' width='25%'height='60' style='padding:5px;'></a></td></tr>

</tbody>

</table>

<table bgcolor='#ffffff' align='center' cellspacing='0' cellpadding='0' border='0' style='width:600px'>

<tbody>

<tr>

<td height='32' align='center' colspan='2' style='background:#f0c004'>

<a target='_blank' style='color:#fff;font-weight:bold; font-family:Arial; font-size:20px; text-decoration:none; padding:0px 15px'>Trip Registration Confirmation</a>

</td>

</tr>

<tr>

<td colspan='2' height='15'>&nbsp;</td>

</tr>

<tr>

<td>

<table cellspacing='0' cellpadding='0' border='0' style='width:600px'>

<tbody>

<tr>

<td width='15' height='100%'>&nbsp;</td>

<td valign='top'>



<p style='margin-top:5px;font-family:Arial;color: #333;'>Dear $name, </p>

<p style='margin-top:5px;font-family:Arial;color: #333;'>Welcome to Maruthicabs! Your booking has been confirmed, your ref No: $trip_id, you will receive cab details 20Mins before your trip start. </p>

<div style='clear:both;'></div>

<div style='clear:both;'></div>

<p style='margin-top:15px; margin-bottom:2px;font-family:Arial;color: #333;'>Regards</p>



<p style='margin-top:1px;font-family:Arial;color: #333;'>Maruthi Cabs Team</p>

</td>

<div style='clear:both;'></div>

<td width='15' height='100%'>&nbsp;</td>

</tr>



<tr>

<td colspan='2' height='15'>&nbsp;</td>

</tr>

</tbody>

</table>

</td>

</tr>

</tbody>

</table>



<table cellspacing='0' cellpadding='0' border='0' style='width:600px'>

<tr>

<td bgcolor='#f4f4f4' align='center' style='font-family:Arial;font-size:12px;line-height:20px; padding:10px 0px; color:#666;'>

<span style='color:#6a6a6a'>

&copy;2015, <a target='_blank' href='http://maruthicabs.com/'>Maruthi Cabs</a> All Rights Reserved. </span> <br>

</td>

</tr>

</table>

</td>

</tr>

</tbody>

</table>

</body>

</html>

";

// Always set content-type when sending HTML email

 $headers='';

 $headers.='MIME-Version: 1.0'."\r\n";

 $headers.='Content-type: text/html; charset=iso-8859-1'."\r\n";

 $headers.='From: Mcabs.ee<'.mcabs.'>'."\r\n";



 $mail = mail($to,$subject,$message,$headers);





				}

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

                        <div class="input-group-addon inp-color"><span class="fa fa-map-marker"></span> Name</div>

                        <input type="text" class="form-control bn-inp" placeholder="Traveller Name" name="username" id="username">

                      </div>

                    </div>

                    <div class="col-md-12">

                      <div class="input-group  bn-inp-box">

                        <div class="input-group-addon inp-color"><span class="fa fa-map-marker"></span>Location</div>

                        <input type="text" class="form-control bn-inp" placeholder="Pickup Location" name="start_location" id="autocomplete" onFocus="geolocate()">

                      </div>

                    </div>

					

					<div class="col-md-12">

                      <div class="input-group bn-inp-box">

                        <div class="input-group-addon"><span class="fa fa-calendar"></span></div>

                        <input type="text" class="form-control bn-inp" id="txtFrom" name="start_date" placeholder="Date" style="width:100px !important; float:left; border-radius:4px; margin-right:10px;"/>

						<div class="input-group-addon" style="border-radius:4px;"><span class="fa fa-clock-o"></span></div>

						<select class="car-select" style="width:110px ;float:left;" name="start_time" id="ftime">

						<option value="">Select Time</option>

						</select>

                      </div>

					</div>

                    

					<!--<div class="col-md-12">

                      <div class="input-group bn-inp-box">

                        <div class="input-group-addon inp-color"><span class="fa fa-calendar"></span> Date</div>

                        <input type="text" class="form-control bn-inp" id="txtFrom" name="start_date" placeholder="Date" name="start_date"/>

                      </div>

                    </div>

					

					<div class="col-md-12">

                      <div class="input-group bn-inp-box">

                        <div class="input-group-addon inp-color"><span class="fa fa-clock-o"></span> Time</div>

						<select class="car-select" name="start_time" id="ftime">

						<option value="">Select Time</option>

						</select>

                      </div>

                    </div>-->

					

					 <div class="col-md-12">

                      <div class="input-group bn-inp-box">

                        <div class="input-group-addon inp-color"><span class="fa fa-taxi"></span>Car Type</div>

                       <select class="car-select" name="cartype">

                        <option>-- Select Car Type --</option>

						<option>Sedan</option>

						<option>Hatchback</option>

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
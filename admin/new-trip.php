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

              <h4> New  Trip</h4>

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

		

		var dates = $("#txtFrom1, #txtTo").datepicker({

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

						   url: "../dateresult.php",

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

		</script>

		<?php 

		if(isset($_POST['submit'])){

			extract($_POST);

			

			/*$sq3=mysql_query("select * from registration where mobile='$mobile'");

			$arr=mysql_fetch_array($sq3);

			$user_id=$arr['id'];

			if($username==""){

				$username=$arr['name'];

			}

			$email=$arr['email'];

			if($user_id==''){ echo "<div class='admin_faile'>Please provide valid Mobile Number.</div>"; }

			else{*/

			if($mobile!='' && $start_date!='' && $start_time!='' && $cartype != '' && $package != '' && $email!='' && $username!='' && $start_location!=''){

				$sql=mysql_query("INSERT INTO `trip_reg`(`id`, `mobile`, `name`, `email`, `start_date`, `start_time`, `start_location`, `cartype`,`package`, `end_location`, `status`,`service_provider`,`mobile1`,`mobile2`) VALUES ('id','$mobile','$username','$email','$start_date','$start_time','$start_location','$cartype','$package','$end_location','0','$service_provider','$mobile1','$mobile2')");

				if($sql){ echo "<div class='admin_success'>Successfully Registered.</div>";

				$sql1=mysql_query("select * from trip_reg where mobile='$mobile' order by id desc");

				$arr1=mysql_fetch_array($sql1);

				$trip_id=$arr1['id'];

				
				$to=$mobile.",".$mobile1.",".$mobile2;

				//$from = 'MACABS';	

				if($service_provider==1)
				{			

					$msg="Welcome to Maruthicabs! Your booking has been confirmed, your ref No: $trip_id, you will receive cab details 20Mins before your trip start.";

					$url = "http://sms1.brandebuzz.in/API/sms.php?username=marutiindia9&password=marutiindia9&from=MARUTI&to=".$to."&msg=".urlencode($msg)."&type=1&dnd_check=0";
					//$url = "http://bsms.slabs.mobi/spanelv2/api.php?username=MARUTHI&password=689891&to=".$to."&from=MACABS&message=".urlencode($msg);
					$ret = file($url);

				}
				
				if($service_provider==2)
				{			

					$msg1="Welcome to Maruthi Travels! Your booking has been confirmed, your ref No: $trip_id, you will receive cab details 20Mins before your trip start.";

					$url = "http://sms1.brandebuzz.in/API/sms.php?username=marutiindia9&password=marutiindia9&from=MARUTI&to=".$to."&msg=".urlencode($msg1)."&type=1&dnd_check=0";
					$ret = file($url);

				}
				
				if($service_provider==3)
				{			

					$msg2="Welcome to Deepthi Logistics! Your booking has been confirmed, your ref No: $trip_id, you will receive cab details 20Mins before your trip start.";

					$url = "http://sms1.brandebuzz.in/API/sms.php?username=deepthi&password=Advit@2015&from=DEEPTI&to=".$to."&msg=".urlencode($msg2)."&type=1&dnd_check=0";
					$ret = file($url);

				}
				
				if($service_provider==4)
				{			

					$msg3="Welcome to Moulika Travels! Your booking has been confirmed, your ref No: $trip_id, you will receive cab details 20Mins before your trip start.";

					$url = "http://sms1.brandebuzz.in/API/sms.php?username=molikaindia&password=g5wbx52k&from=MOLIKA&to=".$to."&msg=".urlencode($msg3)."&type=1&dnd_check=0";
					$ret = file($url);

				}
				//echo $url;

				 

				

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

		//}

		?>

            <div class="table2" style="width:80%;margin:0px auto;">

              <form class="upload-form" method="post" action="">

                <div class="upload-pro">

                  <label>Mobile No</label>

                  <input type="text" placeholder="Mobile No" name="mobile" id="mobile"/>

                  <div class="clear"></div>

                </div>

                <div class="upload-pro">

                  <label>Name</label>

                  <input type="text" placeholder="Name" name="username" id="username"/>

                  <div class="clear"></div>

                </div>

                <div class="upload-pro">

                  <label>Email Id</label>

                  <input type="text" placeholder="Email Id" name="email" id="email"/>

                  <div class="clear"></div>

                </div>

                <div class="upload-pro">

                  <label>Select Date</label>

                  <input type="text" placeholder="Select Date" ID="txtFrom1" name="start_date"/>

                  <div class="clear"></div>

                </div>

				<div class="upload-pro">

                  <label>Start Time</label>

                  <select name="start_time" id="ftime">

						<option value="">Select Time</option>

						</select>

                  <div class="clear"></div>

                </div>

                <div class="upload-pro">

                  <label>Pickup Location</label>

                  <input type="text" placeholder="Pickup Location" name="start_location" id="autocomplete" onFocus="geolocate()"/>

                  <div class="clear"></div>

                </div>

                <div class="upload-pro">

                  <label>Car Type</label>

                  <select name="cartype">

                    <option value="">-- Select Car Type --</option>

                    <option>Sedan</option>

                    <option>Hatchback</option>

                    <option>SUV</option>

                  </select>

                  <div class="clear"></div>

                </div>
                
                 <div class="upload-pro">

                  <label>Package</label>

                  <select name="package">

                    <option value="">-- Select Package --</option>

                    <option value="Standard Rate">Standard Package</option>

                    <option value="Airport Rate">Airport Package</option>

                  </select>

                  <div class="clear"></div>

                </div>
                

                <div class="upload-pro">

                  <label>Drop Location</label>

                  <input type="text" placeholder="Drop Location" name="end_location" id="autocomplete1" onFocus="geolocate()"/>

                  <div class="clear"></div>

                </div>

                 <div class="upload-pro">

                  <label>Service By</label>

                  <select name="service_provider">

                    <option value="">--Select Service--</option>

                    <option value="1">Maruthi Cabs</option>

                    <option value="2">Maruthi Travels</option>

                    <option value="3">Deepthi Logistics</option>

                    <option value="4">Moulika Travels</option>

                  </select>

                  <div class="clear"></div>

                </div>

                <div class="upload-pro">

                  <label>Optional Mobile #</label>

                  <input type="number" placeholder="Optional Mobile Number" maxlength="10" name="mobile1" id="autocomplete" onFocus="geolocate()"/>

                  <div class="clear"></div>

                </div>

                <div class="upload-pro">

                  <label>Optional Mobile #</label>

                  <input type="number" placeholder="Optional Mobile Number"  maxlength="10" name="mobile2" id="autocomplete" onFocus="geolocate()"/>

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

		 </html>

        </div>

      </div>

	  <?php include("admin-footer.php"); ?>

       
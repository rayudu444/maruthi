<?php 
include("admin-header.php");
include_once 'includes/gcm.php';

if($_SESSION['ses_admin_id']==''){ echo'<script>window.location="index.php";</script>'; }
$refid=$_SESSION['ses_admin_id'];

		if($_GET['id']){
			$id=$_GET['id'];
		}
?>
<div class="contact-div">
    <div class="content">
	<?php include("admin-menu.php"); ?>
       <div class="offer-right-div">
        <div class="content-total-box" style="width:60%; margin-left:5%;">
          <h3>Travels</h3>
          <div class="main-table">
            <div class="table-header">
              <h4>Assign Trip</h4>
              <div class="clear"></div>
            </div>
		<?php 
		if(isset($_POST['submit'])){
			extract($_POST);
			$driver_name1=explode("(",$driver_name);
			$driver_name2=str_replace(")","",$driver_name1[1]);
			//echo $driver_name2;
			$sql=mysql_query("select * from cab_reg where vehicle_reg='$driver_name2'");
			$arr=mysql_fetch_array($sql);
			$cab_id=$arr['id'];
			$vehicle_reg=$arr['vehicle_reg'];
			$vehicle_type=$arr['cartype'];
			//getting cab drivers 
			$sql1=mysql_query("select * from cab_drivers where cab_id='$cab_id' order by id desc");
			if(mysql_num_rows($sql1)!=0){
			$arr1=mysql_fetch_array($sql1);
			$driver_id=$arr1['driver_id'];
			
			
			
			$sql2=mysql_query("UPDATE `trip_reg` SET `driver_id`='$driver_id',`cab_id`='$cab_id',status='1' WHERE id='$id'");
			if($sql){ echo "<div class='admin_success'>Successfully Assigned.</div>";
			
			
			//updating driver status
			$sql = "UPDATE `driver_reg` SET  driver_availability = 2 where id= $driver_id";
			$statement = $dbh->prepare($sql);
			$statement->execute();
			
			//getting driver  registration details
			$sql3=mysql_query("select * from driver_reg where id='$driver_id'");
			$arr2=mysql_fetch_array($sql3);
			$drivername=$arr2['driver_name'];
			$driver_number=$arr2['mobile'];
			$driver_gcm_id = $arr2['gcm_id'];
			
			//getting trip registration details
			$sql4=mysql_query("select * from trip_reg where id='$id'");
			$arr3=mysql_fetch_array($sql4);
			$user_name=$arr3['name'];
			$user_mobile=$arr3['mobile'];
			$user_email=$arr3['email'];
			$user_time=$arr3['start_date']." at ".$arr3['start_time'];
			$user_location=$arr3['start_location'];
			
			if($driver_number!=''){
				$from = 'MACABS';
				$to=$driver_number;
				$msg="Welcome to Maruthi cabs! Trip id: $id is assigned to you. Traveller Name: $user_name, Traveller Number: $user_mobile, Traveller Booking Time: $user_time, Pickup Location: $user_location.";
				$url = "http://bsms.slabs.mobi/spanelv2/api.php?username=MARUTHI&password=689891&to=".$to."&from=".$from."&message=".urlencode($msg);
				//echo $url;
				$ret = file($url); 
			}
			if($user_mobile!=''){
				$from = 'MACABS';
				$to=$user_mobile;
				$msg="Thank you for choosing Maruthi cabs for $user_time, Cab No: $vehicle_reg, Chauffer: $drivername, Cell: $driver_number will reach you.  Conditions Apply.";
				$url = "http://bsms.slabs.mobi/spanelv2/api.php?username=MARUTHI&password=689891&to=".$to."&from=".$from."&message=".urlencode($msg);
				//echo $url;
				$ret = file($url); 
			}
			
			if($driver_gcm_id != '')
			{
				$gcm = new GCM();
				$user['Traveler_name'] = $user_name;
				$user['Traveler_mobile'] = $user_mobile;
				$user['Pickup_address']  = $user_location;
				$user['Travel_time'] = $user_time;
				$user['Vehicle_type'] = '';
				$user['From'] = $user_location;
				$user['To'] = '';
				$user['Trip_id'] = $id;
				$user['ridestatus'] = 'RideLater';
				$user['Packages'] = '';
				
				$notification['message'][] = $user;
				$notifications = json_encode($notification);
				$message = "Customer Name : $user_name,Mobile : $user_mobile,Pickup Location : $user_location,Strat Time : $user_time";
				$gcm->send_notification(array($driver_gcm_id),$notifications);
			}
				$to=$user_email;
				$name=$user_name;
				$subject = "Trip Assign Confirmation";
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
<a target='_blank' style='color:#fff;font-weight:bold; font-family:Arial; font-size:20px; text-decoration:none; padding:0px 15px'>Trip Assign Confirmation</a>
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
<p style='margin-top:5px;font-family:Arial;color: #333;'>Thank you for choosing Maruthicabs for $user_time, Cab No: $vehicle_reg, Chauffer: $drivername, Cell: $driver_number will reach you.  Conditions Apply. </p>
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
			else{ echo "<div class='admin_faile'>Assigned Failed.</div>"; }
			}
			else{ echo "<div class='admin_faile'>Please Enter Valid Driver.</div>"; }
		}
		?>
		
            <div class="table2" style="width:80%;margin:0px auto;">
              <form class="upload-form" method="post" action="">
				<div class="upload-pro">
                  <label>Trip Id</label>
                  <input type="text" placeholder="Trip Id" name="trip_id" id="trip_id" value="<?php echo $id; ?>" readonly>
                  <div class="clear"></div>
                </div>
                <div class="upload-pro">
                  <label>Driver Name</label>
                  <input type="text" placeholder="Driver Name" name="driver_name" id="driver_name" >
				  <link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
<script type="text/javascript" src="../js/jquery1.js"></script>
<script type="text/javascript" src="../js/jquery.autocomplete.js"></script>
<script>
var dom = {};
dom.query = jQuery.noConflict( true );
dom.query(document).ready(function(){
	dom.query("#driver_name").autocomplete("driver_assign.php", {
		extraParams: {trip_id: dom.query('#trip_id').val()},
		selectFirst: true,
		minChars: 1,
		
		});
	
});
</script>
                  <div class="clear"></div>
                </div>
                <br />
                <label >
                  <input type="submit" value="submit" name="submit" class="sub" />
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
       
<?php 
include("admin-header.php");
if($_SESSION['ses_admin_id']==''){ echo'<script>window.location="index.php";</script>'; }
$refid=$_SESSION['ses_admin_id'];
error_reporting(0);
?>
<div class="contact-div">
    <div class="content">
	<?php include("admin-menu.php"); ?>
       <div class="offer-right-div">
        <div class="content-total-box">
		<h3>Map View</h3>
		<?php 
		$id=$_GET['id'];
		$sql=mysql_query("select * from trip_reg where id='$id'");
		if(mysql_num_rows($sql)==0){ echo "<div class='admin_faile'>Presently No Cabs found.</div>"; }
		else{
		?>
		<html>
<head>
<meta http-equiv="refresh" content="30" />
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<?php
$mrk_cnt = 0;	
while($re=mysql_fetch_array($sql)){
	$driver_id=$re['driver_id'];
	$cab_id=$re['cab_id'];
	$start_location=$re['start_location'];
	$end_location=$re['end_location'];
	$sql2=mysql_query("select * from cab_reg where id='$cab_id'");
	$arr2=mysql_fetch_array($sql2);
	$cab_no[]=$arr2['vehicle_reg'];
	$cab_type[]=$arr2['cartype'];
	
	$sql3=mysql_query("select * from driver_reg where id='$driver_id'");
	$arr3=mysql_fetch_array($sql3);
	$driver_name[]=$arr3['driver_name'];
	$driver_mobile[]=$arr3['mobile'];
	
	$sql1=mysql_query("select * from driver_location where driver_id='$driver_id'");
	$arr=mysql_fetch_array($sql1);
	$lat[]=$arr['latitude'];
	$lng[]=$arr['longitude'];
	$current_time[] = $arr['crdate']." ".$arr['time']; 
	$mrk_cnt++;
}
?>

<script type='text/javascript'>
var point;
var mrktx;
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
function load3() {
	directionsDisplay = new google.maps.DirectionsRenderer();
   addTo = 0;
   var latlng = new google.maps.LatLng("<?php echo $lat[0]; ?>","<?php echo $lng[0]; ?>");
   var myOptions = {
      zoom: 12,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
   };
   // NOTE: all values: latitude, longitude, zoom, etc.
   //       should also come from the database for flexibility
       
   var map = new google.maps.Map(document.getElementById("map"), myOptions);
	directionsDisplay.setMap(map);		
  var start = "<?php echo $start_location; ?>";
  var end = "<?php echo $end_location; ?>";
  var request = {
      origin:start,
      destination:end,
      travelMode: google.maps.TravelMode.DRIVING
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    }
  });		  
// This next block of JavaScript needs to be generated by PHP 
// to 'add-in' the information from the arrays

<?php
for ($lcnt = 0; $lcnt < $mrk_cnt; $lcnt++)
{
    echo "var point$lcnt = new google.maps.LatLng($lat[$lcnt], $lng[$lcnt]);\n";
	 
    echo "var mrktx$lcnt = \"<span style='font-size: 12px; text-align:center; display:block;'>Time: $current_time[$lcnt]<br>Name: $driver_name[$lcnt]<br>Mobile: $driver_mobile[$lcnt]<br>Cab No: $cab_no[$lcnt]<br>Cab Type: $cab_type[$lcnt]</span>\";\n";
	echo "var infowindow$lcnt = new google.maps.InfoWindow({
   			content: mrktx$lcnt
			});";
    echo "var marker$lcnt = new google.maps.Marker({position: point$lcnt, map: map});\n";
	echo "google.maps.event.addListener(marker$lcnt, 
         'mouseover', function() {
   		     infowindow$lcnt.open(map,marker$lcnt);
          });\n";
}
?>
}
</script>
	
</head>
<body onload='load3()'>			
			<div id="map" class="map" style="height: 500px; margin: 1%; border: 1px solid #ccc;"></div>
			
</body>
</html>	
        <?php } ?>
		 <div class="clear"></div>
       
       </div>
	  </div>
	  <?php include("admin-footer.php"); ?>
<?php 
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$link1=explode("/",$actual_link);
$link = end($link1);
?>
<div class="offer-left-div">
        <div id='cssmenu'>
           <ul>
            <li><a><span>Navigation</span></a></li>
            <li> <i class="fa fa-dashboard icon1"></i><a><span>Dashboard</span></a>
               <ul <?php if(strpos($link, "admin-dashboard.php")===false){} else{ echo 'style="display:block;"'; } if(strpos($link, "running-trips.php")===false){} else{ echo 'style="display:block;"'; } if(strpos($link, "available-cabs.php")===false){} else{ echo 'style="display:block;"'; } ?>>
                <li <?php if(strpos($link, "admin-dashboard.php")===false){} else{ echo 'class="text-bold"';} ?>><i class="fa fa-map-marker icon1"></i><a href="admin-dashboard.php">Map</a></li>
                <li <?php if(strpos($link, "running-trips.php")===false){} else{ echo 'class="text-bold"';} ?>><i class="fa fa-car icon1"></i> <a href="running-trips.php"> Running Trip</a></li>
                <li <?php if(strpos($link, "available-cabs.php")===false){} else{ echo 'class="text-bold"';} ?>><i class="fa fa-cab icon1"></i><a href="available-cabs.php">Available Cabs</a></li>
              </ul>
             </li>
            <li> <i class="fa fa-keyboard-o icon"></i><a><span>Add Trips</span></a>
               <ul <?php if(strpos($link, "new-trip.php")===false){} else{ echo 'style="display:block;"'; } if(strpos($link, "pending-trip.php")===false){} else{ echo 'style="display:block;"'; } ?>>
                <li <?php if(strpos($link, "new-trip.php")===false){} else{ echo 'class="text-bold"';} ?>><i class="fa fa-plus icon1"></i><a href="new-trip.php">New Trip</a></li>
                <li <?php if(strpos($link, "pending-trip.php")===false){} else{ echo 'class="text-bold"';} ?>><i class="fa fa-ticket icon1"></i><a href="pending-trip.php">Pending Trips</a></li>
              </ul>
             </li>
            <li> <i class="fa fa-keyboard-o icon"></i><a><span>Trip History</span></a>
               <ul>
                <li><i class="fa fa-calendar icon1"></i><a href="#">Today</a></li>
                <li><i class="fa fa-check icon1"></i><a href="#">Completed Trips</a></li>
              </ul>
             </li>
             <li> <i class="fa fa-keyboard-o icon"></i><a><span>Drivers</span></a>
              <ul <?php if(strpos($link, "add-drivers.php")===false){} else{ echo 'style="display:block;"'; } if(strpos($link, "view-drivers.php")===false){} else{ echo 'style="display:block;"'; } ?>>
                <li <?php if(strpos($link, "add-drivers.php")===false){} else{ echo 'class="text-bold"';} ?>><i class="fa fa-plus icon1"></i><a href="add-drivers.php">Add Drivers</a></li>
                <li <?php if(strpos($link, "view-drivers.php")===false){} else{ echo 'class="text-bold"';} ?>><i class="fa fa-eye icon1"></i><a href="view-drivers.php">View Drivers</a></li>
              </ul>
            </li>
            <li> <i class="fa fa-keyboard-o icon"></i><a><span>Cabs</span></a>
              <ul <?php if(strpos($link, "add-cabs.php")===false){} else{ echo 'style="display:block;"'; } if(strpos($link, "view-cabs.php")===false){} else{ echo 'style="display:block;"'; } if(strpos($link, "assign-cabs.php")===false){} else{ echo 'style="display:block;"'; } ?>>
                <li <?php if(strpos($link, "add-cabs.php")===false){} else{ echo 'class="text-bold"';} ?>><i class="fa fa-plus icon1"></i><a href="add-cabs.php">Add Cabs</a></li>
				<li <?php if(strpos($link, "view-cabs.php")===false){} else{ echo 'class="text-bold"';} ?>><i class="fa fa-eye icon1"></i><a href="view-cabs.php">View Cabs</a></li>
				<li <?php if(strpos($link, "assign-cabs.php")===false){} else{ echo 'class="text-bold"';} ?>><i class="fa fa-eye icon1"></i><a href="assign-cabs.php">Assigned Cabs</a></li>
              </ul>
            </li>
            <li> <i class="fa fa-keyboard-o icon"></i><a><span>Roles</span></a>
              <ul>
                <li><i class="fa fa-plus icon1"></i><a href="#">Add Roles</a></li>
                <li><i class="fa fa-edit icon1"></i><a href="#">Edit Roles</a></li>
              </ul>
            </li>
			<li> <i class="fa fa-keyboard-o icon"></i><a><span>Fare Chart</span></a>
               <ul <?php if(strpos($link, "fare-chart.php")===false){} else{ echo 'style="display:block;"'; } ?>>
                <li <?php if(strpos($link, "fare-chart.php")===false){} else{ echo 'class="text-bold"';} ?>><i class="fa fa-plus icon1"></i><a href="fare-chart.php">Fare Chart</a></li>
              </ul>
             </li>
            <li> <i class="fa fa-keyboard-o icon"></i><a><span>Report</span></a>
               <ul>
                <li><i class="fa fa-level-up icon1"></i><a href="#">Trip Wise</a></li>
                <li><i class="fa fa-user icon1"></i><a href="#">Driver Wise</a></li>
                <li><i class="fa fa-map-marker icon1"></i><a href="#">Location Wise</a></li>
                <li><i class="fa fa-car icon1"></i><a href="#">Vehicle Type Wise</a></li>
                <li><i class="fa fa-user icon1"></i><a href="#">Customer Wise</a></li>
              </ul>
             </li>
            <li> <i class="fa fa-keyboard-o icon"></i><a><span>Feed Back</span></a>
               <ul>
                <li><i class="fa fa-user icon1"></i><a href="#">Drivers Feedback</a></li>
                <li><i class="fa fa-user icon1"></i><a href="#">Customer Feedback</a></li>
              </ul>
             </li>
			<li><i class="fa fa-keyboard-o icon"></i><a href='admin-logout.php'><span style="margin-left:20px; background:none;">Log Out</span></a></li>
          </ul>
         </div>
        <div class="tech"><a href="http://tiqs.in/"><br />
          Powered By<img src="images/tiqs.png" /></a> </div>
      </div>
       
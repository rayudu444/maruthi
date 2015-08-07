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
               <ul <?php if($link=="admin-dashboard.php" || $link=="running-trips.php" || $link=="available-cabs.php"){ echo 'style="display:block;"'; }  ?>>
                <li <?php if($link=="admin-dashboard.php"){ echo 'class="text-bold"'; } ?>><i class="fa fa-map-marker icon1"></i><a href="admin-dashboard.php">Map</a></li>
                <li <?php if($link=="running-trips.php"){ echo 'class="text-bold"'; } ?>><i class="fa fa-car icon1"></i> <a href="running-trips.php"> Running Trip</a></li>
                <li <?php if($link=="available-cabs.php"){ echo 'class="text-bold"'; } ?>><i class="fa fa-cab icon1"></i><a href="available-cabs.php">Available Cabs</a></li>
              </ul>
             </li>
            <li> <i class="fa fa-keyboard-o icon"></i><a><span>Add Trips</span></a>
               <ul <?php if($link=="new-trip.php" || $link=="pending-trip.php"){ echo 'style="display:block;"'; } ?>>
                <li <?php if($link=="new-trip.php"){ echo 'class="text-bold"'; } ?>><i class="fa fa-plus icon1"></i><a href="new-trip.php">New Trip</a></li>
                <li <?php if($link=="pending-trip.php"){ echo 'class="text-bold"'; } ?>><i class="fa fa-ticket icon1"></i><a href="pending-trip.php">Pending Trips</a></li>
              </ul>
             </li>
            <li> <i class="fa fa-keyboard-o icon"></i><a><span>Trip History</span></a>
               <ul>
                <li><i class="fa fa-calendar icon1"></i><a href="#">Today</a></li>
                <li><i class="fa fa-check icon1"></i><a href="#">Completed Trips</a></li>
              </ul>
             </li>
             <li> <i class="fa fa-keyboard-o icon"></i><a><span>Drivers</span></a>
              <ul>
                <li><i class="fa fa-plus icon1"></i><a href="#">Add Drivers</a></li>
                <li><i class="fa fa-eye icon1"></i><a href="#">View Drivers</a></li>
              </ul>
            </li>
            <li> <i class="fa fa-keyboard-o icon"></i><a><span>Cabs</span></a>
              <ul>
                <li><i class="fa fa-plus icon1"></i><a href="#">Add Cabs</a></li>
                <li><i class="fa fa-sign-in icon1"></i><a href="#">Assign Cabs</a></li>
                 <li><i class="fa fa-eye icon1"></i><a href="#">View Cabs</a></li>
              </ul>
            </li>
            <li> <i class="fa fa-keyboard-o icon"></i><a><span>Roles</span></a>
              <ul>
                <li><i class="fa fa-plus icon1"></i><a href="#">Add Roles</a></li>
                <li><i class="fa fa-edit icon1"></i><a href="#">Edit Roles</a></li>
              </ul>
            </li>
            <li> <i class="fa fa-keyboard-o icon"></i><a><span>Report</span></a>
               <ul>
                <li><i class="fa fa-level-up icon1"></i><a href="#">Trip Wise</a></li>
                <li><i class="fa fa-user icon1"></i><a href="#">Driver Wise</a></li>
                <li><i class="fa fa-map-marker icon1"></i><a href="#">Location Wise</a></li>
                <li><i class="fa fa-car icon1"></i><a href="#">Vehile Type Wise</a></li>
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
       
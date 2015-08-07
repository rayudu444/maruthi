<?php 
include("header.php");
include("menu.php");
?>
<script src="js/jquery.js"></script> 
<script src="js/my-account-tabs.js"></script>
<section id="contact-info" >
  <div class="center">
    <h2>MY ACCOUNT</h2>
  </div>
  <div class="container">
    <div class="media">
    <div class="col-md-12 content-para">
		<div class="my-account-div">
                                <div class="profile-total-div">
	                                <div class="profile-div">
                                    	<img src="images/profile-icon.png" class="profile-icon">
                                        <span class="account-text">Sarath</span>
                                        <div class="wallet-balance-div">
                                        	<img src="images/wallet-icon.png" class="wallet-icon">
                                            <p class="balance-text">
                                                 <span>Rs 0</span><br>
                                                 Your Wallet Balance
                                             </p>
	                                    	 <div class="clear"></div>	                                             
                                        </div>
                                    	<div class="clear"></div>	
                                    </div>
                                                                        <div class="add-money-div">
                                    	ADD MONEY TO WALLET
                                        <form action="" method="post">
                                        	<input type="text" placeholder="Enter Amount" name="amount">
											<input type="hidden" name="firstname" value="surya">
											<input type="hidden" name="phone" value="9052220004">
											<input type="hidden" name="key" value="GvcMMI">
											<input type="hidden" name="txnid" value="paymet78_55aa4ff010ae4">
											<input type="hidden" name="productinfo" value="Payment for Wallet">
											<input type="hidden" name="email" value="jayasurya.developer@gmail.com">
                                            <!--<a href="#" class="promo-code-text">Have A Promo Code?</a>-->
                                            <button type="submit" name="submit3" value="submit3">Add Money To Wallet</button>
                                            <div class="clear"></div>
                                        </form>
                                        <div class="clear"></div>
                                    </div>
                                	<div class="clear"></div>
                                </div>
                                <div class="clear"></div>
								<div class="my-account-left-total-div">
                                <div class="my-account-ul-div">
                                    <ul>
                                        <li><a href="#" class="active">My Details</a></li>
                                        <li class="trip-li"><a href="#">Trip History</a>
                                        	<ul class="submenu-ul">
                                                <li><a href="#" class="">Completed Rides</a></li>
                                                <li><a href="#" class="">Pending Rides</a></li>
	                                        </ul>
                                        </li>
                                        <li><a href="#" class="">My Wallet<br/> (Transaction details)</a></li>
										<li><a href="#">Log Out</a></li>
                                        <div class="clear"></div>
                                    </ul>
                                                  
                                    <div class="clear"></div>
                                </div>
							</div>

								<!--My Details-->

                                <div class="details-div">
                                
                                    <ul class="list1">
                                        <li class="detailsDiv detailsDiva details-div-ul-li-active" target="a">Personal Info</li>
                                        <li class="detailsDiv detailsDivb" target="b">Change Password</li>
                                        <div class="clear"></div>
                                    </ul>
                                    <div class="clear"></div>
                                    <div class="details-content-div">
                                    
                                    	<div class="targetDiv1" id="diva">
											<div class="personal-info-div1">
	                                            <p>
	                                                Email ID<br>
	                                        		<span>Sarath.designer@gmail.com</span>
                                                </p>
                                                <p>
                                                	Mobile Number<br>
	                                                <span> 7416030518</span>
                                                </p>
                                               <div class="clear"></div>
                                            </div>
                                            <div class="personal-info-div2" style="display:none;">
                                            <a class="edit-text2" style="display:none;">Cancel</a>
											
                                            	<form action="" class="form2" method="post" name="f1" onsubmit="return validdata()">
                                                    <input type="text" placeholder="Name" name="fullname" value="surya">
                                                    <input type="email" placeholder="Email Address" name="email" value="jayasurya.developer@gmail.com">
                                                    <input type="text" placeholder="Mobile Number" name="number" value="9052220004">
                                                    <div class="clear"></div>
                                                    <button type="submit" name="submit">Update</button>
                                                    <div class="clear"></div>
                                                 </form>
                                                 <div class="clear"></div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="targetDiv1" id="divb" style="display:none;">
                                        	<form action="" class="form2" method="post" name="f2" onsubmit="return validdat()">
                                                <input type="text" placeholder="Old Password" name="oldpassword">
                                                <input type="text" placeholder="New Password" name="newpassword">
                                                <input type="text" placeholder="Confirm Password" name="cfmpassword">
                                                <div class="clear"></div>
                                                <button type="submit" name="submit1">Save</button>
                                                <div class="clear"></div>
                                            </form>
                                        </div>
                                    	<div class="clear"></div>	
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <!--My Details-->
                                <div class="clear-30"></div>
                                <!--Trip History-->
		
        						<div class="details-div">
                                    <ul class="list1">
                                        <li class="ridesDiv ridesDiv1 rides-div-ul-li-active" target="1">Completed Rides</li>
                                        <li class="ridesDiv ridesDiv2" target="2">Pending Rides</li>
                                        <div class="clear"></div>
                                    </ul>
                                    <div class="clear"></div>
                                    <div class="details-content-div">
                                
                                    	<div class="targetRides" id="div1">
											<table class="table1">
                                            	<tr>
                                                	<th>Date</th>
                                                    <th>Location</th>
                                                	<th>Vehicle Type</th>
                                                    <th>Start Time</th>
                                                	<th>Total Amount</th>
                                                    <th>Print Bill</th>
                                                </tr>
                                                <tr>
                                                	<td>20-07-2015</td>
                                                    <td>Hyderabad</td>
                                                    <td>Sedan</td>
                                                    <td>10.30</td>
                                                    <td>200 Rs</td>
                                                    <td><a href="#"><img src="images/print.png" class="print-img"/></a></td>
                                                </tr>
                                                <tr>
                                                	<td>20-07-2015</td>
                                                    <td>Hyderabad</td>
                                                    <td>Sedan</td>
                                                    <td>10.30</td>
                                                    <td>200 Rs</td>
                                                    <td><a href="#"><img src="images/print.png" class="print-img"/></a></td>
                                                </tr>
                                                <tr>
                                                	<td>20-07-2015</td>
                                                    <td>Hyderabad</td>
                                                    <td>Sedan</td>
                                                    <td>10.30</td>
                                                    <td>200 Rs</td>
                                                    <td><a href="#"><img src="images/print.png" class="print-img"/></a></td>
                                                </tr>
                                                <tr>
                                                	<td>20-07-2015</td>
                                                    <td>Hyderabad</td>
                                                    <td>Sedan</td>
                                                    <td>10.30</td>
                                                    <td>200 Rs</td>
                                                    <td><a href="#"><img src="images/print.png" class="print-img"/></a></td>
                                                </tr>
                                            </table>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="targetRides" id="div2" style="display:none;">
                                        	<table class="table1">
                                            	<tr>
                                                	<th>Date</th>
                                                    <th>Location</th>
                                                	<th>Vehicle Type</th>
                                                    <th>Start Time</th>
                                                	<th>Edit</th>
                                                    <th>Cancel</th>
                                                </tr>
                                                <tr>
                                                	<td>20-07-2015</td>
                                                    <td>Hyderabad</td>
                                                    <td>Sedan</td>
                                                    <td>10.30</td>
                                                    <td><a href="#"><img src="images/edit-img.png" class="print-img"/></a></td>
                                                    <td><a href="#"><img src="images/cancel.png" class="print-img"/></a></td>
                                                </tr>
                                                <tr>
                                                	<td>20-07-2015</td>
                                                    <td>Hyderabad</td>
                                                    <td>Sedan</td>
                                                    <td>10.30</td>
                                                    <td><a href="#"><img src="images/edit-img.png" class="print-img"/></a></td>
                                                    <td><a href="#"><img src="images/cancel.png" class="print-img"/></a></td>
                                                </tr>
                                                <tr>
                                                	<td>20-07-2015</td>
                                                    <td>Hyderabad</td>
                                                    <td>Sedan</td>
                                                    <td>10.30</td>
                                                    <td><a href="#"><img src="images/edit-img.png" class="print-img"/></a></td>
                                                    <td><a href="#"><img src="images/cancel.png" class="print-img"/></a></td>
                                                </tr>
                                                <tr>
                                                	<td>20-07-2015</td>
                                                    <td>Hyderabad</td>
                                                    <td>Sedan</td>
                                                    <td>10.30</td>
                                                    <td><a href="#"><img src="images/edit-img.png" class="print-img"/></a></td>
                                                    <td><a href="#"><img src="images/cancel.png" class="print-img"/></a></td>
                                                </tr>
                                            </table>
                                        </div>
                                    	<div class="clear"></div>	
                                    </div>
                                    <div class="clear"></div>
                                </div>
        
                                <!--Trip History-->
                                
                                <div class="clear-30"></div>
                                
								<!--My Details-->

                                <div class="details-div">
                                    <div class="details-content-div">
                                        <table class="table1">
                                            	<tr>
                                                	<th>Date</th>
                                                    <th>Transaction Type</th>
                                                	<th>Transaction No.</th>
                                                    <th>Amount</th>
                                                	<th>Status</th>
                                                    <th>Balance</th>
                                                </tr>
                                                <tr>
                                                	<td>20-07-2015</td>
                                                    <td>Visa Card</td>
                                                    <td>123456</td>
                                                    <td>200 Rs</td>
                                                    <td>Confirmed</td>
                                                    <td>1000 Rs</td>
                                                </tr>
                                                <tr>
                                                	<td>20-07-2015</td>
                                                    <td>Visa Card</td>
                                                    <td>123456</td>
                                                    <td>200 Rs</td>
                                                    <td>Confirmed</td>
                                                    <td>1000 Rs</td>
                                                </tr>
                                                <tr>
                                                	<td>20-07-2015</td>
                                                    <td>Visa Card</td>
                                                    <td>123456</td>
                                                    <td>200 Rs</td>
                                                    <td>Confirmed</td>
                                                    <td>1000 Rs</td>
                                                </tr>
                                                <tr>
                                                	<td>20-07-2015</td>
                                                    <td>Visa Card</td>
                                                    <td>123456</td>
                                                    <td>200 Rs</td>
                                                    <td>Confirmed</td>
                                                    <td>1000 Rs</td>
                                                </tr>
                                            </table>
                                    	<div class="clear"></div>	
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <!--My Details-->                                
								<div class="clear-30"></div>
                            </div>
      
      </div>
    </div>
    <br>
   
  </div>
</section>

<section id="bottom">
  <div class="container ">
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <div class="widget">
          <h3>About Us</h3>
          <ul>
            <li><a href="about.php">About Mcabs</a></li>
            <li><a href="#">Customer Support</a></li>
            <li><a href="faq.php">FAQ</a></li>
          </ul>
        </div>
      </div>
      <!--/.col-md-3-->
      
      <div class="col-md-3 col-sm-6">
        <div class="widget">
          <h3>NEED Help?</h3>
          <ul>
            <li><a href="#">Why Mcabs</a></li>
            <li><a href="#">Offers</a></li>
            <li><a href="#">Forum</a></li>
          </ul>
        </div>
      </div>
      <!--/.col-md-3-->
      
      <div class="col-md-3 col-sm-6">
        <div class="widget">
          <h3>Drive With Mcabs</h3>
          <ul>
            <li><a href="terms.php">Terms & Conditions</a></li>
            <li><a href="cancellation.php">Cancellation</a></li>
            <li><a href="contact-us.php">Contact Us</a></li>
          </ul>
        </div>
      </div>
      <!--/.col-md-3-->
      
      <div class="col-md-3 col-sm-6">
        <div class="widget">
          <h3>Follow On Us</h3>
          <div class="social">
            <ul class="social-share">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a href="#"><i class="fa fa-skype"></i></a></li>
            </ul>
          </div>
          <div class="clearfix"></div>
          <br>
          <div class="search">
            <form role="form">
              <input type="text" class="search-form inp-fotter" autocomplete="off" placeholder="Search">
              <i class="fa fa-search"></i>
            </form>
          </div>
        </div>
      </div>
      <!--/.col-md-3--> 
      
    </div>
  </div>
</section>
<!--/#bottom-->

<footer id="footer" class="midnight-blue">
  <div class="container">
    <div class="row">
      <p> &copy; 2015 <a target="_blank" href="" title="">Maruthi Cabs</a>. All Rights Reserved.</p>
    </div>
  </div>
  <p  class="back-to-top fa fa-chevron-circle-up fa-3x"></p>
</footer>
<!--/#footer-->


<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.prettyPhoto.js"></script> 
<script src="js/jquery.isotope.min.js"></script> 
<script src="js/main.js"></script> 
<script src="js/wow.min.js"></script> 
		
</body>
</html>
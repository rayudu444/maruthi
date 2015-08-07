<?php 
include("header.php");
include("menu.php");
?>
<section id="contact-info" >
  <div class="center">
    <h2>How to Reach Us?</h2>
  </div>
  <div class="container">
    <div class="media">
    <div class="col-md-10">
    <div class="rate">
      <table class="table" style="margin-bottom:0px;">
        <caption class="rate-text"><label>Standard Rate</label></caption>
        <thead>
          <tr>
            <th>Category</th>
            <th>Minimum Bill</th>
            <th>Extra km charges</th>
            <th>Wait time charges</th>
            <th>Ride time charges</th>
          </tr>
        </thead>
        <tbody>
		<?php 
		$sql=mysql_query("select * from fare_chart where category='Standard Rate'");
		while($re=mysql_fetch_array($sql)){
		?>
          <tr>
            <td><?php echo $re['cartype']; ?></td>
            <td>Rs <?php echo $re['min_bill']; ?> for first <?php echo $re['min_kms']; ?> Km</td>
            <td>Rs <?php echo $re['extra_kms']; ?> per Km</td>
            <td>Rs <?php echo $re['waiting_charges']; ?> per Min (Post 10 Min)</td>
            <td>Rs <?php echo $re['ride_charges']; ?> per Min</td>
          </tr>
		<?php } ?>
          
        </tbody>
      </table>
      </div>
      <br>
         <div class="rate">
      
      <table class="table" style="margin-bottom:0px;">
        <caption class="rate-text"><label>Airport Rate</label></caption>
        <thead>
          <tr>
            <th>Category</th>
            <th>Minimum Bill</th>
            <th>Extra km charges</th>
            <th>Wait time charges</th>
            <th>Ride time charges</th>
          </tr>
        </thead>
        <tbody>
          <?php 
		$sql=mysql_query("select * from fare_chart where category='Airport Rate'");
		while($re=mysql_fetch_array($sql)){
		?>
          <tr>
            <td><?php echo $re['cartype']; ?></td>
            <td>Rs <?php echo $re['min_bill']; ?> for first <?php echo $re['min_kms']; ?> Km</td>
            <td>Rs <?php echo $re['extra_kms']; ?> per Km</td>
            <td>Rs <?php echo $re['waiting_charges']; ?> per Min (Post 10 Min)</td>
            <td>Rs <?php echo $re['ride_charges']; ?> per Min</td>
          </tr>
		<?php } ?>
          
        </tbody>
      </table>
      </div>
      </div>
      <div class="col-md-2">
        <div class="img-rounded"><img src="images/add.jpg" class="img-responsive"></div>
      </div>
    </div>
    <br>
    <ul>
    <li> Wait time includes time taken to board the cab after pickup time as well as waiting during the trip.</li>
    <li>Ride time includes total time from the pickup time to drop time.</li>
    <li> Tolls and tax will be charged as applicable. For details click here</li>
    </ul>
  </div>
</section>

<?php 
include("footer.php");
?>
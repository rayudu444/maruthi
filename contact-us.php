<?php 
include("header.php");
include("menu.php");
?>
<section id="contact-info" style="padding-bottom:0px;">
        <div class="center">                
            <h2>How to Reach Us?</h2>
        </div>
        <div class="gmap-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <div class="gmap">
                            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=JoomShaper,+Dhaka,+Dhaka+Division,+Bangladesh&amp;aq=0&amp;oq=joomshaper&amp;sll=37.0625,-95.677068&amp;sspn=42.766543,80.332031&amp;ie=UTF8&amp;hq=JoomShaper,&amp;hnear=Dhaka,+Dhaka+Division,+Bangladesh&amp;ll=23.73854,90.385504&amp;spn=0.001515,0.002452&amp;t=m&amp;z=14&amp;iwloc=A&amp;cid=1073661719450182870&amp;output=embed"></iframe>
                        </div>
                    </div>

                    <div class="col-sm-8 map-content">
                        <ul class="row">
                            <li class="col-sm-6">
                                <address>
                                    <h5>Head Office</h5>
                                    <p>1537 Flint Street <br>
                                    Tumon, MP 96911</p>
                                    <p>Phone:670-898-2847 <br>
                                    Email Address:info@domain.com</p>
                                </address>

                            </li>


                            <li class="col-sm-6">
                                <address>
                                    <h5>Zone#2 Office</h5>
                                    <p>1537 Flint Street <br>
                                    Tumon, MP 96911</p>
                                    <p>Phone:670-898-2847 <br>
                                    Email Address:info@domain.com</p>
                                </address>

                                
                            </li>
                        </ul>
                        
                                        <h2>Drop Your Message</h2>
   

                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="">
                    <div class="col-md-6">
                        <div class="form-group">
                             <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                               <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" placeholder="Name" required>
                        </div>
                        <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email </label>
                              <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            
                         <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Mobile</label>
                              <div class="col-sm-10">
                            <input type="number" class="form-control" placeholder="Mobile" required>
                            </div>
                            
                         <div class="clearfix"></div>
                        </div>
                             <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Subject</label>
                                  <div class="col-sm-10">
                            <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                            </div>
                             <div class="clearfix"></div>
                        </div>       
                                    
                    </div>
                    <div class="col-sm-6">
                        
                        <div class="form-group">
                            <label>Message *</label>
                            <textarea name="message" id="message" required class="form-control" rows="4" placeholder="Massage"></textarea>
                        </div>                        
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-sm" required="required">Submit</button>
                        </div>
                    </div>
                </form> 
            </div>
                </div>
            </div>
        </div>
    </section>  <!--/gmap_area -->

<?php 
include("footer.php");
?>
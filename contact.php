<?php
	$title = 'Contact'; //page title
	
	//include the templates
	include 'v-templates/header.php';
	include 'v-templates/navbar.php';
?>
<!-- body starts here -->
<div class="container-fluid contact_info_outline">
	<div class="col-md-12">
        <h1 class="page-header contact_heading">Conatct Us</h1>
    </div>
	<div class="col-md-8">
    	<h3>Contact Us</h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
    	<form role="form">
        	<div class="row">
        	<div class="form-group col-lg-4">
                <label for="input1">Name</label>
                <input type="text" name="contact_name" class="form-control" id="input1">
            </div>
            <div class="form-group col-lg-4">
                <label for="input2">Email Address</label>
                <input type="email" name="contact_email" class="form-control" id="input2">
            </div>
            <div class="form-group col-lg-4">
                <label for="input3">Phone Number</label>
                <input type="phone" name="contact_phone" class="form-control" id="input3">
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-lg-12">
                <label for="input4">Message</label>
                <textarea name="contact_message" class="form-control" rows="6" id="input4"></textarea>
            </div>
            <div class="form-group col-lg-12">
                <input type="hidden" name="save" value="contact">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div>
            </div>
        </form>
    </div>
    <div class="col-md-4">
    	<h4>LOREM IPSUM</h4>
        <p>
            House 112<br>
            Road 12th Sector 9<br>
            India 1230<br>
        </p>
        <p><i class="fa fa-phone"></i> <abbr title="Phone">P</abbr>: 99999999999</p>
          <p><i class="fa fa-envelope-o"></i> <abbr title="Email">E</abbr>: <a href="#">info@abcd.com</a></p>
          <p><i class="fa fa-clock-o"></i> <abbr title="Hours">H</abbr>: Monday - Friday: 9:00 AM to 5:00 PM</p>
          <ul class="list-unstyled list-inline list-social-icons">
            <li class="tooltip-social facebook-link"><a href="#facebook-page" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-square fa-2x"></i></a></li>
            <li class="tooltip-social linkedin-link"><a href="#linkedin-company-page" data-toggle="tooltip" data-placement="top" title="LinkedIn"><i class="fa fa-linkedin-square fa-2x"></i></a></li>
            <li class="tooltip-social twitter-link"><a href="#twitter-profile" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter-square fa-2x"></i></a></li>
            <li class="tooltip-social google-plus-link"><a href="#google-plus-page" data-toggle="tooltip" data-placement="top" title="Google+"><i class="fa fa-google-plus-square fa-2x"></i></a></li>
          </ul>
    </div>
</div>

<div class="container-fluid contact-map">
	<iframe class="col-lg-12 col-xs-12 col-sm-12 contact-map" height="500px;" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=kolkata&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=49.490703,107.138672&amp;ie=UTF8&amp;hq=&amp;hnear=Kolkata,+West+Bengal,+India&amp;t=m&amp;z=10&amp;ll=22.572646,88.363895&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=kolkata&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=49.490703,107.138672&amp;ie=UTF8&amp;hq=&amp;hnear=Kolkata,+West+Bengal,+India&amp;t=m&amp;z=10&amp;ll=22.572646,88.363895" style="color:#0000FF;text-align:left">View Larger Map</a></small>
</div>
<!-- body ends here -->

<?php
	//include the footer template
	include 'v-templates/footer.php';
?>
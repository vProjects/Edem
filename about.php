<?php
	$title = 'About'; //page title
	
	//include the templates
	include 'v-templates/header.php';
	include 'v-templates/navbar.php';
?>
<!-- body starts here -->
		<div class="container-fluid about-founder">
			<div class="col-lg-6">
				<h3>State of the art application</h3>
				<p>Lorem ipsum dolor sit amet, consectetuer as adip cing elit, sed diam nonummy nibhuis a mod tin cid unt ut laoreet dolore magna aliq uam erat vol ut pat. Ut wisi enim ad minim ve niam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea comm odo consequat.</p>
				
			</div>
			<div class="col-lg-6">
				<img src="images/edem.png" class="img-responsive" alt="about edem" />
			</div>
			
		</div>
		<div class="container-fluid step-panel">
			<div class="row">
				<div class="col-lg-12 step-content">
					<h2>OUR MISSION</h2>
					<P>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy</P>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<img src="images/process1.png" alt="process1" class="img-responsive"/>
					<P>Lorem ipsum dolor sit amet</P>
				</div>
				<div class="col-lg-4">
					<img src="images/process2.png" alt="process1" class="img-responsive"/>
					<P>Lorem ipsum dolor sit amet</P>
				</div>
				<div class="col-lg-4">
					<img src="images/process3.png" alt="process1" class="img-responsive"/>
					<P>Lorem ipsum dolor sit amet</P>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<img src="images/process4.png" alt="process1" class="img-responsive"/>
					<P>Lorem ipsum dolor sit amet</P>
				</div>
				<div class="col-lg-4">
					<img src="images/process5.png" alt="process1" class="img-responsive"/>
					<P>Lorem ipsum dolor sit amet</P>
				</div>
				<div class="col-lg-4">
					<img src="images/process6.png" alt="process1" class="img-responsive"/>
					<P>Lorem ipsum dolor sit amet</P>
				</div>
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
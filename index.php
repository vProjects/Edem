<?php
	$title = 'Home'; //page title
	
	//include the templates
	include 'v-templates/header.php';
	include 'v-templates/navbar.php';
?>
	<div class="parallax">
		<ul id="scene" class="scene"
            data-calibrate-x="false"
            data-calibrate-y="false"
            data-invert-x="false"
            data-invert-y="true"
            data-limit-x="false"
            data-limit-y="10"
            data-scalar-x="2"
            data-scalar-y="8"
            data-friction-x="0.2"
            data-friction-y="0.8">		
			
			<li class="layer" data-depth="1.00"><img class="img-responsive" src="images/slide1.png" alt="slide1"></li>
			<li class="layer" data-depth="0.00">
				<div class="jumbotron">
				  <h1>Manage Cources in a New Way</h1>
				  <h2>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam.</h2>
				  <h2>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam.</h2>
				  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing.</p>
				  <p><button type="button" class="btn btn-success btn-lg btn-black" data-toggle="modal" data-target="#videoBox">Take a tour</button></p>
				</div>
			</li>
		</ul>
	</div>
		<!-- slider ends here -->
		<!-- panel starts here -->
		<div class="container-fluid step-panel">
			<div class="row">
				<div class="col-lg-12 step-content">
					<h2>Lorem ipsum dolor sit amet</h2>
					<P>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy</P>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 step-box">
					<div class="step-ins">
						<img src="images/step1.png" alt="first step" />
						<h3>STEP I</h3>
						<p>Sign Up to create an account</p>
					</div>
				</div>
				<div class="col-lg-4 step-box">
					<div class="step-ins">
						<img src="images/step2.png" alt="second step" />
						<h3>STEP II</h3>
						<p>Create an Instituion</p>
					</div>
				</div>
				<div class="col-lg-4 step-box">
					<div class="step-ins">
						<img src="images/step3.png" alt="third step" />
						<h3>STEP III</h3>
						<p>Manage Instituion from anywhere</p>
					</div>
				</div>
			</div>
			
			
			
		</div>		
		<!-- panel endss here -->
		<!-- state of art section starts here -->
		<div class="container-fluid state-art">
			<div class="col-lg-6">
				<h3>State of the art application</h3>
				<p>Lorem ipsum dolor sit amet, consectetuer as adip cing elit, sed diam nonummy nibhuis a mod tin cid unt ut laoreet dolore magna aliq uam erat vol ut pat. Ut wisi enim ad minim ve niam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea comm odo consequat.</p>
				
			</div>
			<div class="col-lg-6">
				<img src="images/stateofart.png" class="img-responsive" alt="stat of the art" />
			</div>
			
		</div>
		
		<div class="container-fluid state-art mng-inst">
			<div class="col-lg-6">
				<img src="images/inst.png" class="img-responsive" alt="institution" />
			</div>
			
			<div class="col-lg-6">
				<h3>Manage Whole Institution</h3>
				<p>Lorem ipsum dolor sit amet, consectetuer as adip cing elit, sed diam nonummy nibhuis a mod tin cid unt ut laoreet dolore magna aliq uam erat vol ut pat. Ut wisi enim ad minim ve niam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea comm odo consequat.</p>
				
			</div>
			
		</div>
		<div class="container-fluid step-panel">
			<div class="row">
				<div class="col-lg-12 newsletter">
					<h2>Ready to start using our application?</h2>
					<P>Create an account by filling up the form.</P>
				</div>
			</div>
			<div class="row">
				<form class="form-inline" role="form">
				  <div class="form-group">
				    <label class="sr-only" for="exampleInputEmail2">Email address</label>
				    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
				  </div>
				  <div class="form-group">
				    <label class="sr-only" for="exampleInputPassword2">Password</label>
				    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
				  </div>
				  <button type="submit" class="btn btn-success">Sign Up</button>
				</form>				
			</div>
		</div>

<?php
	//include the footer template
	include 'v-templates/footer.php';
?>
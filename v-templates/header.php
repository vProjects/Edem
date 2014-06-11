<?php include 'config/page-config.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php if( isset($title)){ echo $title; } else { echo $defaultTitle;}  ?></title>
		<meta name="description" content="">
		<meta name="author" content="vasu naman">
		
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		

		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Caption' rel='stylesheet' type='text/css'>
		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		
	</head>

	<body>
		<!--modal for login-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title login-header" id="myModalLabel">Login</h4>
              </div>
              <div class="modal-body">
              	<div class="input-group v-form-element">
                	<p class="grey_text">Please login to continue using the application.</p>
                </div>
              	<!--form components starts here-->
                <div class="input-group v-form-element">
                    <span class="input-group-addon glyphicon glyphicon-user"></span>
                    <input type="text" class="form-control v-textbox" placeholder="Username">
                </div>
                <div class="input-group v-form-element">
                    <span class="input-group-addon glyphicon glyphicon-info-sign"></span>
                    <input type="password" class="form-control v-textbox" placeholder="Password">
                </div>
                <!--form component ends here-->
              </div>
              <div class="modal-footer">
                <!--<button type="button" class="btn btn-default btn-black" data-dismiss="modal">Close</button>-->
                <button type="button" class="btn btn-default btn-black">LOGIN</button>
              </div>
            </div>
          </div>
        </div>
        <!--modal for login ends here-->
        <!--modal for sign up box-->
        <div class="modal fade" id="mySignUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title login-header" id="mySignUpLabel">Sign Up</h4>
              </div>
              <div class="modal-body">
              	<div class="input-group v-form-element">
                	<p class="grey_text">Please sign up to explore the wide range of management tools we provide.</p>
                </div>
              	<!--form components starts here-->
                <div class="input-group v-form-element">
                    <span class="input-group-addon glyphicon glyphicon-envelope"></span>
                    <input type="text" class="form-control v-textbox" placeholder="Email">
                </div>
                <div class="input-group v-form-element">
                    <span class="input-group-addon glyphicon glyphicon-user"></span>
                    <input type="text" class="form-control v-textbox" placeholder="Username">
                </div>
                <div class="input-group v-form-element">
                    <span class="input-group-addon glyphicon glyphicon-info-sign"></span>
                    <input type="password" class="form-control v-textbox" placeholder="Password">
                </div>
                <div class="input-group v-form-element">
                    <span class="input-group-addon glyphicon glyphicon-info-sign"></span>
                    <input type="password" class="form-control v-textbox" placeholder="Confirm Password">
                </div>
                <!--form component ends here-->
              </div>
              <div class="modal-footer">
                <!--<button type="button" class="btn btn-default btn-black" data-dismiss="modal">Close</button>-->
                <button type="button" class="btn btn-default btn-black">Sign Up</button>
              </div>
            </div>
          </div>
        </div>
        <!--modal for sign up box ends here-->
        <!--modal for take a tour box-->
        <div class="modal fade bs-example-modal-lg" id="videoBox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title login-header" id="mySignUpLabel">Take a tour.</h4>
              </div>
              <div class="modal-body">
              	<!--form components starts here-->
                <div class="video_container">
                    <div class="video_box">
                    	<iframe width="100%" height="100%" src="//www.youtube.com/embed/VRuoR--LdqQ" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <!--form component ends here-->
              </div>
            </div>
          </div>
        </div>
        <!--modal for take a tour box ends here-->
        <!-- main container for whole body  #starts -->
		<div class="container-fluid main-container">
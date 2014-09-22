<?php
	$title = 'Create Courses';
	//checking for login status
	if(!isset($GLOBALS['_COOKIE']['course_management']) && !isset($_SESSION['user_id']))
	{
		header("Location: ../index.php");
	}
	//include the template files
	include 'v-templates/header.php';
	//checkingfor level
	if($level > 1)
	{
		header("Location: admin.php");
	}
	//include other files
	include 'v-templates/header-text.php';
	include 'v-templates/sidebar.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Update Curriculum</h1>
            <h4 class="cs_page_info">Please create your own currinculum here.</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    
  <?php
		//print the result of institute creation
		if( isset( $_SESSION['result'] ) && !empty( $_SESSION['result'] ) )
		{
			echo '<div class="alert alert-success alert-dismissable">
  					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
			echo $_SESSION['result'];
			echo '</div>';
			unset( $_SESSION['result'] );
		}
	?>
	<!-- fresh year block start-->
	<div class="row">
		<div class="col-lg-3">
			<div class="dropdown">
			  <button class="btn btn-default btn-block dropdown-block dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
			    FRESHMAN YEAR
			    <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu dropdwn-bg" role="menu" aria-labelledby="dropdownMenu1">
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Composition I</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Prep for Excellence</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">College Algebra</a></li>
			    <li role="presentation" class="divider"></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">World History</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Essentials of the Christian Faith</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Princ/Appl of Physical Science</a></li>
			    <li role="presentation" class="divider"></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Intro to Atmospheric Science</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Composition II</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Introduction to Sociology</a></li>
			    <li role="presentation" class="divider"></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Computer Appl And Prog</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Survey of U.S. History</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Princ & App of Bio Science</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Environmental Science</a></li>
			  </ul>
			</div>			
		</div>
		 <!-- sophomore year block start-->
		<div class="col-lg-3">
			<div class="dropdown">
			  <button class="btn btn-default btn-block dropdown-block dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
			    SOPHOMORE YEAR
			    <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu dropdwn-bg" role="menu" aria-labelledby="dropdownMenu1">
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Introduction to Literature</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">African Amarican History</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Values and Society</a></li>
			    <li role="presentation" class="divider"></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Art Appreciation</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Music Appreciation</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Elementary French I</a></li>
			    <li role="presentation" class="divider"></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Elementary Spanish I</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Fund and Tech of Activities I</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Elementary French II</a></li>
			    <li role="presentation" class="divider"></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Elementary Spanish II</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Problems of Philosophy</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">World Religion</a></li>
			    <li role="presentation" class="divider"></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Intro To Psychology</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Social Science Statictics</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Fund and Tech of Activities II</a></li>			 		     
			  </ul>
			</div>
		</div>
	<!-- sophomore year block end-->
	 <!-- junior year block start-->
		<div class="col-lg-3">
			<div class="dropdown">
			  <button class="btn btn-default btn-block dropdown-block dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
			    JUNIOR YEAR
			    <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu dropdwn-bg" role="menu" aria-labelledby="dropdownMenu1">
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Deviant Behavior</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Marriage and the Family</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Cultural Anthropology</a></li>
			    <li role="presentation" class="divider"></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Intro to Social Work</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Sociology and Aging</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Sociology of Health & Medicine</a></li>
			    <li role="presentation" class="divider"></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">General Elective</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Social Psychology</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Sociological Theory</a></li>
			    <li role="presentation" class="divider"></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">United State Government</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">State/Local Government</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Community and Urban Life</a></li>
			    <li role="presentation" class="divider"></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Sociology of Organizations</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">General Elective</a></li>			   		 		     
			  </ul>
			</div>
		</div>
	 <!-- junior year block end-->
	 <!-- senior year block start-->
		<div class="col-lg-3">
			<div class="dropdown">
			  <button class="btn btn-default btn-block dropdown-block dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
			    SENIOR YEAR
			    <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu dropdwn-bg" role="menu" aria-labelledby="dropdownMenu1">
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Demography</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Soc. of the Black Experience</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Methods of Research</a></li>
			    <li role="presentation" class="divider"></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Minority Groups</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">General Elective</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Sociology of Health & Medicine</a></li>
			    <li role="presentation" class="divider"></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">General Elective</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">General Economics</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">World Geography</a></li>
			    <li role="presentation" class="divider"></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Senior Field Paper</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">General Elective</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">General Elective</a></li>			  		   		 		     
			  </ul>
			</div>
		</div>
	<!-- senior year block end-->
</div><!--  dropdown row end-->
	<!--textboxrow start-->
    <div class="row textbox-topgap">
		<div class="col-lg-3">
			<div class="form-group">
			    <label for="exampleInputEmail1" class="sr-only">Select Subject</label>
			    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Choose Your Subject">
			 </div>
			 <button type="submit" class="btn btn-default submit-btn center-block" data-toggle="modal" data-target="#updCurri">Submit</button>
		</div>
		<div class="col-lg-3">
			<div class="form-group">
			    <label for="exampleInputEmail1" class="sr-only">Select Subject</label>
			    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Choose Your Subject">
			 </div>
			 <button type="submit" class="btn btn-default submit-btn center-block" data-toggle="modal" data-target="#updCurri">Submit</button>
		</div>
		<div class="col-lg-3">
			<div class="form-group">
			    <label for="exampleInputEmail1" class="sr-only">Select Subject</label>
			    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Choose Your Subject">
			 </div>
			 <button type="submit" class="btn btn-default submit-btn center-block" data-toggle="modal" data-target="#updCurri">Submit</button>
		</div>
		<div class="col-lg-3">
			<div class="form-group">
			    <label for="exampleInputEmail1" class="sr-only">Select Subject</label>
			    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Choose Your Subject">
			 </div>
			 <button type="submit" class="btn btn-default submit-btn center-block" data-toggle="modal" data-target="#updCurri">Submit</button>
		</div>
	</div>
	<!--textboxrow end-->
   
	<!--second dropdown row start-->
	<div class="row selected-subject-row">
		<div class="col-lg-3">
			<div class="dropdown">
			  <button class="btn btn-default btn-block selected-subject-dropdown dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
			    Selected Subject
			    <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu selected-subject-dropdown-bg" role="menu" aria-labelledby="dropdownMenu1">
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 1</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 2</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 3</a></li>
			    <li role="presentation" class="divider"></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 4</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 5</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 6</a></li>
			    <li role="presentation" class="divider"></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 7</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 8</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 9</a></li>			    
			  </ul>
			</div>			
		</div>
		<div class="col-lg-3">
			<div class="dropdown">
			  <button class="btn btn-default btn-block selected-subject-dropdown dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
			    Selected Subject
			    <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu selected-subject-dropdown-bg" role="menu" aria-labelledby="dropdownMenu1">
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 1</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 2</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 3</a></li>
			    <li role="presentation" class="divider"></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 4</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 5</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 6</a></li>
			    <li role="presentation" class="divider"></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 7</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 8</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 9</a></li>			    
			  </ul>
			</div>			
		</div>
		<div class="col-lg-3">
			<div class="dropdown">
			  <button class="btn btn-default btn-block selected-subject-dropdown dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
			    Selected Subject
			    <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu selected-subject-dropdown-bg" role="menu" aria-labelledby="dropdownMenu1">
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 1</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 2</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 3</a></li>
			    <li role="presentation" class="divider"></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 4</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 5</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 6</a></li>
			    <li role="presentation" class="divider"></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 7</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 8</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 9</a></li>			    
			  </ul>
			</div>			
		</div>
		<div class="col-lg-3">
			<div class="dropdown">
			  <button class="btn btn-default btn-block selected-subject-dropdown dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
			    Selected Subject
			    <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu selected-subject-dropdown-bg" role="menu" aria-labelledby="dropdownMenu1">
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 1</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 2</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 3</a></li>
			    <li role="presentation" class="divider"></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 4</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 5</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 6</a></li>
			    <li role="presentation" class="divider"></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 7</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 8</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Subject 9</a></li>			    
			  </ul>
			</div>			
		</div>
	</div>
		
	<!--second dropdown row end-->
   
   
    
    
</div>
<!-- /#page-wrapper -->

		<!--modal for login-->
        <div class="modal fade" id="updCurri" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title login-header" id="myModalLabel">Information for subject change</h4>
              </div>
              <form action="#" method="post">
	              <div class="modal-body">
	              	<div class="form-group">
	              		<div class="col-sm-1"><span class="glyphicon glyphicon-info-sign text-glyph-sign success-glyph"></span></div>
	              		<div class="col-sm-11">Bootstrap (currently v3.2.0) has a few easy ways to quickly get started</div>
	              		<div class="clearfix"></div>
	              	</div>
	              	<div class="form-group">
	              		<div class="col-sm-1"><span class="glyphicon glyphicon-info-sign text-glyph-sign danger-glyph"></span></div>
	              		<div class="col-sm-11">Bootstrap (currently v3.2.0) has a few easy ways to quickly get started</div>
	              		<div class="clearfix"></div>
	              	</div>
	              	<div class="form-group">
	              		<div class="col-sm-1"><span class="glyphicon glyphicon-info-sign text-glyph-sign info-glyph"></span></div>
	              		<div class="col-sm-11">Bootstrap (currently v3.2.0) has a few easy ways to quickly get started</div>
	              		<div class="clearfix"></div>
	              	</div>
	              </div>
	              <div class="modal-footer">
	                <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
	                <button type="button" class="btn btn-default btn-success">Continue</button>
	              </div>
              </form>
            </div>
          </div>
        </div>
        <!--modal for login ends here-->

<?php
	//footer
	include 'v-templates/footer.php';
?>
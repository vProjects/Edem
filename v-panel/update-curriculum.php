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
			  <ul id ="one" class="dropdown-menu dropdwn-bg" role="menu" aria-labelledby="dropdownMenu1">
			  	<?php
					//get the course of the student
					$courseId1 = $BLL_Obj->getCourseIdOfStudent($_SESSION['user_id']);
					//get the curriculum of the student
					$curriculums1 = $BLL_Obj->getCurriculumListOfStudent($courseId1, 1);
					if(!empty($curriculums1))
					{
						foreach ($curriculums1 as $curriculumid => $curriculum) 
						{
							echo '<li id ='.$curriculumid.' role="presentation"><a role="menuitem" tabindex="-1" href="#">'.$curriculum.'</a></li>';
						}	
					}
				?>
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
			  <ul id ="two" class="dropdown-menu dropdwn-bg" role="menu" aria-labelledby="dropdownMenu1">
			  	<?php
					//get the course of the student
					$courseId2 = $BLL_Obj->getCourseIdOfStudent($_SESSION['user_id']);
					//get the curriculum of the student
					$curriculums2 = $BLL_Obj->getCurriculumListOfStudent($courseId2, 2);
					if(!empty($curriculums2))
					{
						foreach ($curriculums2 as $curriculumid => $curriculum) 
						{
							echo '<li role="presentation"><a role="menuitem" tabindex="-1" href="#">'.$curriculum.'</a></li>';
						}	
					}
				?>  
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
			  <ul id ="three" class="dropdown-menu dropdwn-bg" role="menu" aria-labelledby="dropdownMenu1">
			    <?php
					//get the course of the student
					$courseId4 = $BLL_Obj->getCourseIdOfStudent($_SESSION['user_id']);
					//get the curriculum of the student
					$curriculums4 = $BLL_Obj->getCurriculumListOfStudent($courseId4, 4);
					if(!empty($curriculums4))
					{
						foreach ($curriculums4 as $curriculumid => $curriculum) 
						{
							echo '<li role="presentation"><a role="menuitem" tabindex="-1" href="#">'.$curriculum.'</a></li>';
						}	
					}
				?>			   		 		     
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
			  <ul id ="four" class="dropdown-menu dropdwn-bg" role="menu" aria-labelledby="dropdownMenu1">
			     <?php
					//get the course of the student
					$courseId5 = $BLL_Obj->getCourseIdOfStudent($_SESSION['user_id']);
					//get the curriculum of the student
					$curriculums5 = $BLL_Obj->getCurriculumListOfStudent($courseId5, 5);
					if(!empty($curriculums5))
					{
						foreach ($curriculums5 as $curriculumid => $curriculum) 
						{
							echo '<li role="presentation"><a role="menuitem" tabindex="-1" href="#">'.$curriculum.'</a></li>';
						}	
					}
				?>		  		   		 		     
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
			    <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Choose Your Subject">
			 </div>
			 <button type="submit" class="btn btn-default submit-btn center-block" data-toggle="modal" data-target="#updCurri">Submit</button>
		</div>
		<div class="col-lg-3">
			<div class="form-group">
			    <label for="exampleInputEmail1" class="sr-only">Select Subject</label>
			    <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Choose Your Subject">
			 </div>
			 <button type="submit" class="btn btn-default submit-btn center-block" data-toggle="modal" data-target="#updCurri">Submit</button>
		</div>
		<div class="col-lg-3">
			<div class="form-group">
			    <label for="exampleInputEmail1" class="sr-only">Select Subject</label>
			    <input type="text" class="form-control" id="exampleInputEmail4" placeholder="Choose Your Subject">
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
                <h4 class="modal-title login-header" id="myModalLabel">Information regarding the changes made.</h4>
              </div>
              <form action="#" method="post">
	              <div class="modal-body">
	              	<div class="mdl-bd-brdr-cont">
	              		Thanks for submitting your subject choices and the following color code shows it possibility.
	              		<br /><br />
		              	<div class="form-group">
		              		<div class="col-sm-1"><span class="glyphicon glyphicon-asterisk text-glyph-sign info-glyph"></span></div>
		              		<div class="col-sm-11">Not sure may or may not be allowed.</div>
		              		<div class="clearfix"></div>
		              	</div>
	              	</div>
	              </div>
	              <div class="modal-footer">
	              	<div class="row">
	              		<div class="col-sm-8">
	              			<div class="form-group mrgn-cust-mdl">
			              		<div class="col-sm-1"><span class="glyphicon glyphicon-asterisk text-glyph-sign success-glyph"></span></div>
			              		<div class="col-sm-11 txt-lt">High chance of getting allowed.</div>
			              		<div class="clearfix"></div>
			              	</div>
			              	<div class="form-group mrgn-cust-mdl">
			              		<div class="col-sm-1"><span class="glyphicon glyphicon-asterisk text-glyph-sign info-glyph"></span></div>
			              		<div class="col-sm-11 txt-lt">Not sure may or may not be allowed.</div>
			              		<div class="clearfix"></div>
			              	</div>
			              	<div class="form-group mrgn-cust-mdl">
			              		<div class="col-sm-1"><span class="glyphicon glyphicon-asterisk text-glyph-sign danger-glyph"></span></div>
			              		<div class="col-sm-11 txt-lt">Hign chance of rejection.</div>
			              		<div class="clearfix"></div>
			              	</div>
	              		</div>
	              		<div class="col-sm-4">
			                <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Cancel</button>
			                <button type="button" class="btn btn-default btn-success">Continue</button>
	              		</div>
	              	</div>
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
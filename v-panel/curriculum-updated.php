<?php
	$title = 'Curriculum';
	//checking for login status
	if(!isset($GLOBALS['_COOKIE']['course_management']) && !isset($_SESSION['user_id']))
	{
		header("Location: ../index.php");
	}
	$level=1;
	//include the template files
	include 'v-templates/header.php';
	//checkingfor level
	if($level < 3)
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
            <h1 class="page-header">Curriculum selected by students</h1>
            <h4 class="cs_page_info">List shows the curriculum according to the number of people selected it.</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
	
		
	<!--selectboxrow start-->
    <div class="row selectbox-row">		
		<div class="col-lg-3">
			<select class="form-control selectbox-modified">
			  <option> Select Department</option>
			  <option>Physics Honours</option>
			  <option>Chemistry Honours</option>
			  <option>Maths Honours</option>
			  <option>History Honours</option>
			</select>
		</div>
		<div class="col-lg-3">
			<select class="form-control selectbox-modified">
			  <option>Select Year</option>
			  <option>2011</option>
			  <option>2012</option>
			  <option>2013</option>
			  <option>2014</option>
			</select>
		</div>
	</div>
	<!--selectboxrow end-->
	<!-- students and schedule-->
	  <div class="row student-no-block">
	  	<div class="col-lg-8 col-lg-offset-2">
        	<div class="blue-block">
        		<div class="student-number text-center">
        			<a href="#"><p><b>59</b> students selected
        			<span class="glyphicon glyphicon-arrow-right indicate-arrow"></span>
        			<span>Schedule 1</span></p></a>
        		</div>
            </div>
        </div> 
	  </div>
	  <div class="row selectbox-row">
		  <div class="col-lg-8 col-lg-offset-2">
	        	<div class="blue-block">
	        		<div class="student-number text-center">
	        			<a href="#"><p><b>21</b> students selected
	        			<span class="glyphicon glyphicon-arrow-right indicate-arrow"></span>
	        			<span>Schedule 2</span></p></a>
	        		</div>
	            </div>
	        </div> 
	  </div>
  	<div class="row selectbox-row">
	  <div class="col-lg-8 col-lg-offset-2">
        	<div class="blue-block">
        		<div class="student-number text-center">
        			<a href="#"><p><b>40</b> students selected
        			<span class="glyphicon glyphicon-arrow-right indicate-arrow"></span>
        			<span>Schedule 3</span></p></a>
        		</div>
            </div>
        </div> 
  	</div>
	<div class="row selectbox-row">
	  <div class="col-lg-8 col-lg-offset-2">
        	<div class="blue-block">
        		<div class="student-number text-center">
        			<a href="#"><p><b>51</b> students selected
        			<span class="glyphicon glyphicon-arrow-right indicate-arrow"></span>
        			<span>Schedule 4</span></p></a>
        		</div>
            </div>
        </div> 
  	</div>
	<div class="row selectbox-row">
	  <div class="col-lg-8 col-lg-offset-2">
        	<div class="blue-block">
        		<div class="student-number text-center">
        			<a href="#"><p><b>60</b> students selected
        			<span class="glyphicon glyphicon-arrow-right indicate-arrow"></span>
        			<span>Schedule 5</span></p></a>
        		</div>
            </div>
        </div> 
	  </div>
	 <div class="row selectbox-row">
	  <div class="col-lg-8 col-lg-offset-2">
        	<div class="blue-block">
        		<div class="student-number text-center">
        			<a href="#"><p><b>45</b> students selected
        			<span class="glyphicon glyphicon-arrow-right indicate-arrow"></span>
        			<span>Schedule 6</span></p></a>
        		</div>
            </div>
        </div> 
	  </div>
	<!--students and schedule end-->
   
	
   
   
    
    
</div>
<!-- /#page-wrapper -->
<?php
	//footer
	include 'v-templates/footer.php';
?>
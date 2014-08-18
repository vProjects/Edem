<?php
	$title = 'Create Room';
	//checking for login status
	if(!isset($GLOBALS['_COOKIE']['course_management']) && !isset($_SESSION['user_id']))
	{
		header("Location: ../index.php");
	}
	//include the template files
	include 'v-templates/header.php';
	//checkingfor level
	if($level < 1)
	{
		header("Location: admin.php");
	}
	//include other files
	include 'v-templates/header-text.php';
	include 'v-templates/sidebar.php';
	
	//get event details
	if(!empty($GLOBALS["_GET"]))
	{
		$event_detail = $BLL_Obj->getEventDetails($GLOBALS["_GET"]["eid"]);
	}
?>
	<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Event Details</h1>
                <h4 class="cs_page_info">Get the full details of the events.</h4>
            </div>
            <!-- /.col-lg-12 -->
        </div><!-- /.col-lg-6 -->
        <!-- /.row -->
        <div class="row stu_adm_row">
	    	<div class="col-lg-12">
	        	<div class="panel panel-info">
	                <div class="panel-heading">Event Name: <?php echo $event_detail['event_name']; ?></div>
	                <div class="panel-body">
	                	<div class="row">
	                		<div class="col-lg-6">
		                		<p><strong>Chairperson</strong>: <?php echo $event_detail['chairperson_id']; ?></p>
			                	<p><strong>Faculty</strong>: <?php echo $event_detail['faculty_id']; ?></p>
			                	<p><strong>Group</strong>: <?php echo $event_detail['group_id']; ?></p>
		                	</div>
		                	<div class="col-lg-6">
		                		<p><strong>Date</strong>: <?php echo $event_detail['date']; ?></p>
			                	<p><strong>Time</strong>: <?php echo $event_detail['time']; ?></p>
			                	<p><strong>Duration</strong>: <?php echo $event_detail['duration']; ?></p>
			                	<p><strong>Venue</strong>: <?php echo $event_detail['room']; ?></p>
		                	</div>
	                	</div>
	               	</div>
	            </div>
	           
	        </div>
	    </div>
    <!-- /.row -->
        
    </div>
    <!-- /#page-wrapper -->
<?php
	//footer
	include 'v-templates/footer.php';
?>
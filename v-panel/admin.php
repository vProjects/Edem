<?php
	$title = 'Dashboard';
	//checking for login status
	if(!isset($GLOBALS['_COOKIE']['course_management']) && !isset($_SESSION['user_id']))
	{
		header("Location: ../index.php");
	}
	//include the template files
	include 'v-templates/header.php';
	include 'v-templates/header-text.php';
	include 'v-templates/sidebar.php';
?>
	<!-- include the calendar for the events -->
	
	<!-- page content starts here -->
        <div id="page-wrapper">
        	<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php if(isset($_SESSION['type'])){echo $_SESSION['type'];} ?> Schedule</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <div class="pull-right form-inline">
                            <div class="btn-group">
                                <button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
                                <button class="btn btn-default" data-calendar-nav="today">Today</button>
                                <button class="btn btn-primary" data-calendar-nav="next">Next >></button>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-warning" data-calendar-view="year">Year</button>
                                <button class="btn btn-warning active" data-calendar-view="month">Month</button>
                                <button class="btn btn-warning" data-calendar-view="week">Week</button>
                                <button class="btn btn-warning" data-calendar-view="day">Day</button>
                            </div>
                        </div>
                        <h3 class="ss_month_name"></h3>
					</div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                	<div id="calendar"></div>
                </div>
            </div>
        </div>
        <!-- page content end here-->
        
    </div>
    <!-- /#wrapper --> 

<?php
	//footer
	include 'v-templates/footer.php';
?>
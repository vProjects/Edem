<?php
	$title = 'Curriculum Change Log';
	//checking for login status
	if(!isset($GLOBALS['_COOKIE']['course_management']) && !isset($_SESSION['user_id']))
	{
		header("Location: ../index.php");
	}
	//include the template files
	include 'v-templates/header.php';
	//include other files
	include 'v-templates/header-text.php';
	include 'v-templates/sidebar.php';
?>
	<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Curriculum Change Log</h1>
                <h4 class="cs_page_info">You can see list data about curriculum change</h4>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <!-- /.row -->
        <div class="row stu_adm_row">
        	<div class="col-sm-12">
            	<ul class="pagination pull-right list-pagination">
                  <li><a href="#">&laquo;</a></li>
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
            <div class="col-lg-12">
            	<div class="table-responsive">
                	<table class="table table-bordered table-striped">
                    	<thead>
                        	<tr>
                            	<th>Sl.No.</th>
                                <th>Curriculum</th>
                                <th>From Year</th>
                                <th>To Year</th>
                                <th>User IP</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php
								//getting curriculum change log list
								$BLL_Obj->getCurriculumChangeList($_SESSION['user_id']);
							?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
<?php
	//footer
	include 'v-templates/footer.php';
?>
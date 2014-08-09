<?php
	$title = 'Course List';
	//include the template files
	include 'v-templates/header.php';
	include 'v-templates/sidebar.php';
?>
	<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Course List</h1>
                <h4 class="cs_page_info">You can see list data about chair course</h4>
            </div>
            <!-- /.col-lg-12 -->
        </div>
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
                            	<th>Name</th>
                                <th>Institute</th>
                                <th>Created By</th>
                                <th>Created On</th>
                                <th>Course Category</th>
                                <th>Availability</th>
                                <th>Edit</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php
								//getting course list
								$BLL_Obj->getCourseList();
							?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
<?php
	//footer
	include 'v-templates/footer.php';
?>
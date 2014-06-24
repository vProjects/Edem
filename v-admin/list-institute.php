<?php
	$title = 'Institute List';
	//include the template files
	include 'v-templates/header.php';
	include 'v-templates/sidebar.php';
?>
	<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Institute List</h1>
                <h4 class="cs_page_info">You can see list data about chair institute</h4>
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
            <div class="col-lg-12">
            	<div class="table-responsive">
                	<table class="table table-bordered table-striped">
                    	<thead>
                        	<tr>
                            	<th>Name</th>
                                <th>Email Id</th>
                                <th>Type</th>
                                <th>Mobile</th>
                                <th>Edit</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php
								//getting institutem list
								$BLL_Obj->getInstituteList();
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
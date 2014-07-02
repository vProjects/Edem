<?php
	$title = 'Create Student Status';
	//include the template files
	include 'v-templates/header.php';
	include 'v-templates/sidebar.php';
	
	$status_name = "";

	//get the id for the student status
	if( count($GLOBALS["_GET"]) > 0 )
	{
		$status_id = $_GET['id'];
		
		//get the status name
		$status_name = $BLL_Obj->getStudentStatusFromId($status_id);
	}
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Student Status</h1>
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
        <div class="col-lg-6">
        	<form role="form" action="v-includes/functions/function.create-student-status.php" method="post">
            	<h4 class="cs_page_form_caption">Update status Name</h4>
                <div class="form-group">
                    <label class="cs_form_label">Status Name</label>
                    <input type="text" class="form-control cs_form_textbox" name="student_status" value="<?php if( isset($status_name)){ echo $status_name; } ?>">
                </div>
                <button type="submit" class="btn btn-success btn-lg">Submit Data</button>
                <button type="reset" class="btn btn-danger btn-lg">Reset Data</button>
            </form>
        </div>
    </div>
    <div class="row">
    	<div class="col-lg-12">
        	<div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-plus-circle fa-fw"></i> Avialable Status for students(Click to update).</div>
                <div class="panel-body">
                	<?php
                		//get the values from the database
                		$BLL_Obj->getStudentStatus();
                	?>
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
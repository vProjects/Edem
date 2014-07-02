<?php
	$title = 'Create Groups';
	//include the template files
	include 'v-templates/header.php';
	include 'v-templates/sidebar.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create Groups</h1>
            <h4 class="cs_page_info">Create groups by selecting multiple students.</h4>
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
        	<form role="form" action="v-includes/functions/function.create-course.php" method="post">
            	<h4 class="cs_page_form_caption">Select students for the group.</h4>
            	<div class="form-group">
                    <label class="cs_form_label">Group Name</label>
                    <input type="text" class="form-control cs_form_textbox" name="name">
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Select Institution</label>
                    <select class="form-control cs_form_textbox" name="advisor[]">
                    	<?php
                    		//get the faculty from the BLL
                    		$BLL_Obj->getInstitute_SelectBox();
						?> 
                    </select>
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Select Session</label>
                    <select class="form-control cs_form_textbox" name="institute_id">
                    	<?php
                    		//get the institute from the BLL
                    		$BLL_Obj->getInstitute_SelectBox();
                    	?>
                    </select>
                </div>
                <div class="row">
                	<div class="col-lg-5">
		                <div class="form-group">
		                    <label class="cs_form_label">Select Students</label>
		                    <select class="form-control cs_form_textbox add_stu_selectbx" name="institute_id" multiple="multiple">
		                    	<option value="1">Student Name</option>
		                    	<option value="1">Student Name</option>
		                    	<option value="1">Student Name</option>
		                    	<option value="1">Student Name</option>
		                    	<option value="1">Student Name</option>
		                    </select>
		                </div>
                	</div>
                	<div class="col-lg-2">
                		<div class="add_student_arrow">
                			<button type="button" class="btn btn-success btn_add"> >> </button>
                			<button type="button" class="btn btn-success btn_add"> << </button>
                		</div>
                	</div>
                	<div class="col-lg-5">
		                <div class="form-group">
		                    <label class="cs_form_label">Selected Students</label>
		                    <select class="form-control cs_form_textbox add_stu_selectbx" name="institute_id" multiple="multiple">
		                    </select>
		                </div>                		
                	</div>
                </div>
                <button type="submit" class="btn btn-success btn-lg">Submit Data</button>
                <button type="reset" class="btn btn-danger btn-lg">Reset Data</button>
            </form>
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
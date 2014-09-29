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
	if($level < 2)
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
            <h1 class="page-header">Create Courses</h1>
            <h4 class="cs_page_info">You can add data about courses manualy or you can just upload file directly.</h4>
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
        	<form role="form" action="v-includes/functions/function.create-course.php" method="post">
            	<h4 class="cs_page_form_caption">Fill Up Course Details</h4>
            	<div class="form-group">
                    <label class="cs_form_label">Course Name</label>
                    <input type="text" class="form-control cs_form_textbox" name="name">
                </div>
                <!-- Debo -->
                <div class="form-group">
                    <label class="cs_form_label">Course Number</label>
                    <input type="text" class="form-control cs_form_textbox" name="course_no">
                </div>
                <!-- Debo -->
                <div class="form-group">
                    <label class="cs_form_label">Add Advisor</label>
                    <select class="form-control cs_form_textbox" multiple="multiple" name="advisor[]">
                    	<?php
                    		//get the advisors names
                    		$BLL_Obj->getAdvisors($_SESSION['user_id']);
						?>	
                    </select>
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Institute</label>
                    <select class="form-control cs_form_textbox" name="institute_id">
                    	<?php
                    		$instituteId = $BLL_Obj->getInstituteId($_SESSION['user_id']);
                    		//get the institute from the BLL
                    		$BLL_Obj->getInstitute_SelectBox();
                    	?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Course Details</label>
                    <textarea rows="4" class="form-control ae_form_textarea" name="details"></textarea>
                </div>
                <!-- debo -->
                <div class="form-group">
                    <label class="cs_form_label">Annoucement Title</label>
                    <input type="text" class="form-control cs_form_textbox" name="announcement_title">
                </div>
                <div class="form-group">
	                    <label class="cs_form_label">Course Category</label>
	                    <select class="form-control cs_form_textbox" name="edu_level">
	                    	<?php
	                    		//get the institute from the BLL
	                    		$BLL_Obj->getStudentStatus_SelectBox();
	                    	?>
	                    </select>
	            </div>
	            <div class="form-group">
	                    <label class="cs_form_label">Availability</label>
	                    <select class="form-control cs_form_textbox" name="availability">
	                    	<?php
	                    		//get the institute from the BLL
	                    		$BLL_Obj->getavailability_SelectBox();
	                    	?>
	                    </select>
	            </div>
                <!-- debo -->
                <input type = "hidden" name = "institute_id" value = <?php echo $instituteId;?> />
                <button type="submit" class="btn btn-success btn-lg">Submit Data</button>
                <button type="reset" class="btn btn-danger btn-lg">Reset Data</button>
            </form>
        </div>
        <!-- /.col-lg-6 -->
        <div class="col-lg-6">	
        	<form role="form" enctype="multipart/form-data">
            	<h4 class="cs_page_form_caption">Upload The File</h4>
                <div class="form-group">
                    <label class="cs_form_label">Information File</label>
                    <input type="file">
                </div>
                <div class="form-group">
                    <label class="cs_form_label">NOTE</label>
                    <input type="text" class="form-control cs_form_textbox" placeholder="Upload Info">
                </div>
                <button type="submit" class="btn btn-success btn-lg">Submit</button>
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
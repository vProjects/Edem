<?php
	$title = 'Edit Courses';
	//include the template files
	include 'v-templates/header.php';
	include 'v-templates/sidebar.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Courses</h1>
            <h4 class="cs_page_info">You can edit data about courses.</h4>
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
    <?php
		//get the course id from query string
		$course_id = $GLOBALS['_GET']['cid'];
		//get values from bll
		$getValues = $BLL_Obj->getUserInfo('course_info','course_id',$course_id);
	?>
    <!-- /.row -->
    <div class="row stu_adm_row">
        <div class="col-lg-6">
        	<form role="form" action="v-includes/functions/function.edit-course.php" method="post">
            	<h4 class="cs_page_form_caption">Fill Up Course Details</h4>
            	<div class="form-group">
                    <label class="cs_form_label">Course Name</label>
                    <input type="text" class="form-control cs_form_textbox" name="name" value="<?php echo $getValues[0]['name'] ?>">
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Course Number</label>
                    <input type="text" class="form-control cs_form_textbox" name="course_no" value="<?php echo $getValues[0]['course_no'] ?>">
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Institute</label>
                    <select class="form-control cs_form_textbox" name="institute_id" id="course_inst">
                    	<?php
							//get the institute from the BLL
							$BLL_Obj->getSelectedItemList('institute_info','institute_id',$getValues[0]['institute_id'],'name');
						?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Faculty Assigned</label>
                    <select class="form-control cs_form_textbox" multiple="multiple" name="advisor[]" id="course_adv">
                    	<?php
							//getting multiple selected item
							$advisor_list = explode(',',$getValues[0]['advisor']);
							//get multiple select box
							//$BLL_Obj->getSelectedMultipleItemName('faculty_info','user_id',$advisor_list);
							$instituteId = $getValues[0]['institute_id'];
							$condition_column_names = array('institute_id');
							$condition_column_values = array($instituteId);
							$BLL_Obj->getSelectedFromList('faculty_info', 'user_id', $advisor_list, 'f_name','m_name','l_name', $condition_column_names, $condition_column_values);
						?>  
                    </select>
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Course Description</label>
                    <textarea rows="4" class="form-control ae_form_textarea" name="details"><?php echo $getValues[0]['detail'] ?></textarea>
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Annoucement Title</label>
                    <input type="text" class="form-control cs_form_textbox" name="announcement_title" value="<?php echo $getValues[0]['announcement_title'] ?>">
                </div>
                <div class="form-group">
	                    <label class="cs_form_label">Course Category</label>
	                    <select class="form-control cs_form_textbox" name="edu_level">
	                    	<?php
	                    		//get the course category from the BLL
	                    		$BLL_Obj->getSelectedItemList('student_status','id',$getValues[0]['edu_level'],'status_name');
	                    	?>
	                    </select>
	            </div>
	            <div class="form-group">
	                    <label class="cs_form_label">Availability</label>
	                    <select class="form-control cs_form_textbox" name="availability">
	                    	<?php
	                    		//get the availability from the BLL
	                    		$BLL_Obj->getSelectedItemList('availability','id',$getValues[0]['availability'],'availability_name');
	                    	?>
	                    </select>
	            </div>
                <input type="hidden" name="user_id" value="<?php echo $course_id; ?>" />
                <input type="hidden" name="op" value="cou_info" />
                <button type="submit" class="btn btn-success btn-lg">Update Data</button>
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
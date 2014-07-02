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
		//get faculty user id from get method
		$user_id = $GLOBALS['_GET']['cid'];
		//get values from bll
		$getValues = $BLL_Obj->getUserInfo('course_info','course_id',$user_id);
	?>
    <!-- /.row -->
    <div class="row stu_adm_row">
        <div class="col-lg-6">
        	<form role="form" action="v-includes/functions/function.edit-course.php" method="post">
            	<h4 class="cs_page_form_caption">Fill Up Course Details</h4>
            	<div class="form-group">
                    <label class="cs_form_label">Name</label>
                    <input type="text" class="form-control cs_form_textbox" name="name" value="<?php echo $getValues[0]['name'] ?>">
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Edit Advisor</label>
                    <select class="form-control cs_form_textbox" multiple="multiple" name="advisor[]">
                    	<?php
								//getting multiple selected item
								$advisor_list = explode(',',$getValues[0]['advisor']);
								//get multiple select box
								$BLL_Obj->getSelectedMultipleItemList('faculty_info','user_id',$advisor_list,'name');
							?>  
                    </select>
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Institute</label>
                    <select class="form-control cs_form_textbox" name="institute_id">
                    	<?php
							//get the institute from the BLL
							$BLL_Obj->getSelectedItemList('institute_info','institute_id',$getValues[0]['institute_id'],'name');
						?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Session</label>
                    <input type="text" class="form-control cs_form_textbox" name="session" value="<?php echo $getValues[0]['session'] ?>">
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Time Duration</label>
                    <input type="text" class="form-control cs_form_textbox" name="duration" value="<?php echo $getValues[0]['hours'] ?>">
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Course Details</label>
                    <textarea rows="4" class="form-control ae_form_textarea" name="details"><?php echo $getValues[0]['detail'] ?></textarea>
                </div>
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
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
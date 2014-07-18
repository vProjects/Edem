<?php
	$title = 'Edit Groups';
	//include the template files
	include 'v-templates/header.php';
	include 'v-templates/sidebar.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Groups</h1>
            <h4 class="cs_page_info">Edit Gropups Information.</h4>
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
		//get group id from get method
		$group_id = $GLOBALS['_GET']['gid'];
		//get values from bll
		$getValues = $BLL_Obj->getUserInfo('group_info','group_id',$group_id);
	?>
    <!-- /.row -->
    <div class="row stu_adm_row">
        <div class="col-lg-12">
        	<form role="form" action="v-includes/functions/function.edit-group.php" method="post">
            	<h4 class="cs_page_form_caption">Edit Information About Group.</h4>
            	<div class="form-group">
                    <label class="cs_form_label">Group Name</label>
                    <input type="text" class="form-control cs_form_textbox" name="name" value="<?php echo $getValues[0]['group_name'] ?>">
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Select Institution</label>
                    <select class="form-control cs_form_textbox" name="institute_id" id="group_inst">
                    	<option value="-1">-- Select An Institute --</option>
                    	<?php
							//get the institute from the BLL
							$BLL_Obj->getSelectedItemList('institute_info','institute_id',$getValues[0]['institute_id'],'name');
						?> 
                    </select>
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Select Session</label>
                    <select class="form-control cs_form_textbox" name="session" id="group_session">
                    	<?php
							//get session list
							$BLL_Obj->getSessionListForEditGroup($getValues[0]['institute_id'],$getValues[0]['session']);
						?> 
                    </select>
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Faculty</label>
                    <select class="form-control cs_form_textbox" multiple="multiple" name="advisor[]" id="group_fac">	
                    	<?php
							//getting multiple selected item
							$advisor_list = explode(',',$getValues[0]['faculty']);
							//get multiple select box
							$BLL_Obj->getForeignValueMultipleItemList('faculty_info','institute_id',$getValues[0]['institute_id'],'user_id',$advisor_list,'name');
						?>  
                    </select>
                </div>
                <div class="row">
                	<div class="col-lg-5">
		                <div class="form-group">
		                    <label class="cs_form_label">Select Students</label>
		                    <select class="form-control cs_form_textbox add_stu_selectbx" name="stu_list[]" multiple="multiple" id="grp_student">
                            <?php
								//getting multiple selected item
								$student_list = explode(',',$getValues[0]['students']);
								//get multiple select box
								$BLL_Obj->getForeignValueMultipleItemList('students_info','institute_id',$getValues[0]['institute_id'],'user_id',$student_list,'name');
							?> 
		                    </select>
		                </div>
                	</div>
                	<div class="col-lg-2">
                		<div class="add_student_arrow">
                			<button type="button" class="btn btn-success btn_add" id="stu_select"> &gt;&gt; </button>
                			<button type="button" class="btn btn-success btn_add" id="stu_deselect"> &lt;&lt; </button>
                		</div>
                	</div>
                	<div class="col-lg-5">
		                <div class="form-group">
		                    <label class="cs_form_label">Selected Students</label>
		                    <select class="form-control cs_form_textbox add_stu_selectbx" name="selected_stu[]" multiple="multiple" id="selected_student">
                            	<?php
									//getting multiple selected item
									$selected_student_list = explode(',',$getValues[0]['students']);
									//get multiple select box
									$BLL_Obj->getSelectedValues('students_info','user_id',$selected_student_list,'name');
								?>  
		                    </select>
		                </div>                		
                	</div>
                </div>
                <input type="hidden" name="group_id" value="<?php echo $group_id; ?>" />
                <input type="hidden" name="op" value="grp_info" />
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
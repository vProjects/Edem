<?php
	$title = 'Edit Events';
	//include the template files
	include 'v-templates/header.php';
	include 'v-templates/sidebar.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Events</h1>
            <h4 class="cs_page_info">Edit Events Information.</h4>
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
		$event_id = $GLOBALS['_GET']['eid'];
		//get values from bll
		$getValues = $BLL_Obj->getUserInfo('event_info','event_id',$event_id);
	?>
    <!-- /.row -->
    <div class="row stu_adm_row">
        <div class="col-lg-10">
        	<form role="form" action="v-includes/functions/function.edit-event.php" method="post">
            	<h4 class="cs_page_form_caption">Edit Information About Group.</h4>
            	<div class="form-group">
                    <label class="cs_form_label">Event Name</label>
                    <input type="text" class="form-control cs_form_textbox" name="name" value="<?php echo $getValues[0]['event_name']; ?>" />
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Select Institution</label>
                    <select class="form-control cs_form_textbox" name="institute_id" id="event_inst">
                    	<option value="-1">-- Select An Institute --</option>
                    	<?php
							//get the institute from the BLL
							$BLL_Obj->getSelectedItemList('institute_info','institute_id',$getValues[0]['institute_id'],'name');
						?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Event Date</label>
                    <input type="text" class="form-control cs_form_textbox" id="calender_date" name="date" value="<?php echo $getValues[0]['date']; ?>">
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Event Time</label>
                    <input type="text" class="form-control cs_form_textbox" name="time" value="<?php echo $getValues[0]['time']; ?>">
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Chairperson</label>
                    <select class="form-control cs_form_textbox" multiple="multiple" name="chairperson[]" id="event_chair">
                    	<?php
							//getting multiple selected item
							$chair_list = explode(',',$getValues[0]['chairperson_id']);
							//get multiple select box
							$BLL_Obj->getForeignValueMultipleItemList('chairperson_info','institute_id',$getValues[0]['institute_id'],'user_id',$chair_list,'name');
						?> 
                    	
                    </select>
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Faculty</label>
                    <select class="form-control cs_form_textbox" multiple="multiple" name="advisor[]" id="event_fac">
                    	<?php
							//getting multiple selected item
							$advisor_list = explode(',',$getValues[0]['faculty_id']);
							//get multiple select box
							$BLL_Obj->getForeignValueMultipleItemList('faculty_info','institute_id',$getValues[0]['institute_id'],'user_id',$advisor_list,'name');
						?> 
                    </select>
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Room No</label>
                    <select class="form-control cs_form_textbox" name="room" id="event_room">
                    	<?php
							//getting multiple selected item
							$rooms = array($getValues[0]['room']);
							//get multiple select box
							$BLL_Obj->getForeignValueMultipleItemList('rooms','institute_id',$getValues[0]['institute_id'],'room_name',$rooms,'room_name');
						?> 
                    </select>
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Duration</label>
                    <input type="text" class="form-control cs_form_textbox" name="duration" value="<?php echo $getValues[0]['duration']; ?>">
                </div>
                <div class="row">
                	<div class="col-lg-5">
		                <div class="form-group">
		                    <label class="cs_form_label">Select Group</label>
		                    <select class="form-control cs_form_textbox add_stu_selectbx" name="grp_list[]" multiple="multiple" id="event_grp">
		                    	<?php
									//getting multiple selected item
									$group_list = explode(',',$getValues[0]['group_id']);
									//get multiple select box
									$BLL_Obj->getForeignValueMultipleItemList('group_info','institute_id',$getValues[0]['institute_id'],'group_id',$group_list,'group_name');
								?>
		                    </select>
		                </div>
                	</div>
                	<div class="col-lg-2">
                		<div class="add_student_arrow">
                			<button type="button" class="btn btn-success btn_add" id="grp_select"> &gt;&gt; </button>
                			<button type="button" class="btn btn-success btn_add" id="grp_deselect"> &lt;&lt; </button>
                		</div>
                	</div>
                	<div class="col-lg-5">
		                <div class="form-group">
		                    <label class="cs_form_label">Selected Group(s)</label>
		                    <select class="form-control cs_form_textbox add_stu_selectbx" name="selected_grp[]" multiple="multiple" id="selected_grp">
                            	<?php
									//getting multiple selected item
									$selected_group_list = explode(',',$getValues[0]['group_id']);
									//get multiple select box
									$BLL_Obj->getSelectedValues('group_info','group_id',$selected_group_list,'group_name');
								?>  
		                    </select>
		                </div>                		
                	</div>
                </div>
                <input type="hidden" name="event_id" value="<?php echo $event_id; ?>" />
                <input type="hidden" name="op" value="eve_info" />
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
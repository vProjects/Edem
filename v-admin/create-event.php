<?php
	$title = 'Create Groups';
	//include the template files
	include 'v-templates/header.php';
	include 'v-templates/sidebar.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create Events</h1>
            <h4 class="cs_page_info">Create Events by filling up the form.</h4>
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
        <div class="col-lg-10">
        	<form role="form" action="v-includes/functions/function.create-event.php" method="post">
            	<h4 class="cs_page_form_caption">Select Groups and create event.</h4>
            	<div class="form-group">
                    <label class="cs_form_label">Event Name</label>
                    <input type="text" class="form-control cs_form_textbox" name="name">
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Select Institution</label>
                    <select class="form-control cs_form_textbox" name="institute_id" id="event_inst">
                    	<option value="-1">-- Select An Institute --</option>
                    	<?php
                    		//get the faculty from the BLL
                    		$BLL_Obj->getInstitute_SelectBox();
						?> 
                    </select>
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Event Date</label>
                    <input type="text" class="form-control cs_form_textbox" id="calender_date" name="date">
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Event Time</label>
                    <input type="text" class="form-control cs_form_textbox" name="time">
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Chairperson</label>
                    <select class="form-control cs_form_textbox" multiple="multiple" name="chairperson[]" id="event_chair">
                    	
                    </select>
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Faculty</label>
                    <select class="form-control cs_form_textbox" multiple="multiple" name="advisor[]" id="event_fac">
                    	
                    </select>
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Room No</label>
                    <select class="form-control cs_form_textbox" name="room" id="event_room">
                    	
                    </select>
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Duration</label>
                    <input type="text" class="form-control cs_form_textbox" name="duration">
                </div>
                <div class="row">
                	<div class="col-lg-5">
		                <div class="form-group">
		                    <label class="cs_form_label">Select Group</label>
		                    <select class="form-control cs_form_textbox add_stu_selectbx" name="grp_list[]" multiple="multiple" id="event_grp">
		                    	
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
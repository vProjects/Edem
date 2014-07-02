<?php
	$title = 'Edit Faculty';
	//include the template files
	include 'v-templates/header.php';
	include 'v-templates/sidebar.php';
?>
	<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Faculty</h1>
                <h4 class="cs_page_info">You can edit data about faculty.</h4>
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
			$user_id = $GLOBALS['_GET']['uid'];
			//get values from bll
			$getValues = $BLL_Obj->getUserInfo('faculty_info','user_id',$user_id);
		?>
        <!-- /.row -->
        <div class="row stu_adm_row">
            <div class="col-lg-6">
            	<form role="form" action="v-includes/functions/function.edit-faculty.php" method="post">
                	<h4 class="cs_page_form_caption">Fill Up Faculty Information</h4>
                	<div class="form-group">
	                    <label class="cs_form_label">Faculty Name</label>
	                    <input type="text" class="form-control cs_form_textbox" name="name" value="<?php echo $getValues[0]['name'] ?>">
	                </div>
	                <div class="form-group">
	                    <label class="cs_form_label">Email</label>
	                    <input type="text" class="form-control cs_form_textbox" name="email" value="<?php echo $getValues[0]['email'] ?>">
	                </div>
                     <div class="form-group">
	                    <label class="cs_form_label">Institute</label>
	                    <select class="form-control cs_form_textbox" name="institute">
	                    	<?php
	                    		//get the institute from the BLL
	                    		$BLL_Obj->getSelectedItemList('institute_info','institute_id',$getValues[0]['institute_id'],'name');
	                    	?>
	                    </select>
	                </div>
                    <div class="form-group">
                        <label class="cs_form_label">Date of birth</label>
                        <input type="text" class="form-control cs_form_textbox" id="calender_date" name="dob" value="<?php echo $getValues[0]['dob'] ?>">
                    </div>
                    <div class="form-group">
                    	<label class="cs_form_label cs_form_radio_label">Sex</label>
                        <label class="radio-inline">
                            <input type="radio" name="sex" id="sex1" value="male" <?php if($getValues[0]['sex'] == 'male') { echo 'checked="ckecked"'; } ?>>Male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="sex" id="sex2" value="female" <?php if($getValues[0]['sex'] == 'female') { echo 'checked="ckecked"'; } ?>>Female
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="cs_form_label">Mobile No.</label>
                        <input type="text" class="form-control cs_form_textbox" name="mobile" value="<?php echo $getValues[0]['mobile'] ?>">
                    </div>
                    <div class="form-group">
	                    <label class="cs_form_label">Edit Courses</label>
	                    <select class="form-control cs_form_textbox" multiple="multiple" name="course[]">
	                    	<?php
								//getting multiple selected item
								$course_list = explode(',',$getValues[0]['course']);
								//get multiple select box
								$BLL_Obj->getSelectedMultipleItemList('course_info','course_id',$course_list,'name');
							?>                  	
	                    </select>
	                </div>
                    <div class="form-group">
                        <label class="cs_form_label">Division</label>
                        <input type="text" class="form-control cs_form_textbox" name="division" value="<?php echo $getValues[0]['division'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="cs_form_label">Joining Date</label>
                        <input type="text" class="form-control cs_form_textbox" name="joining_date" value="<?php echo $getValues[0]['joining_date'] ?>">
                    </div>
                    <div class="form-group">
                    <label class="cs_form_label">Address Line 1</label>
                    <input type="text" class="form-control cs_form_textbox" name="address_l_1" value="<?php echo $getValues[0]['address_l_1'] ?>">
	                </div>
	                <div class="form-group">
	                    <label class="cs_form_label">Address Line 2</label>
	                    <input type="text" class="form-control cs_form_textbox" name="address_l_2" value="<?php echo $getValues[0]['address_l_2'] ?>">
	                </div>
					<div class="form-group">
		                <label class="cs_form_label">Country</label>
		                <select id="country" class="form-control cs_form_textbox" name="country">
		                    <?php
	                    		//get the country from the BLL
	                    		$BLL_Obj->getSelectedItemList('country','id',$getValues[0]['country'],'name');
	                    	?>
		                </select>
		            </div>
		            <div class="form-group">
	                    <label class="cs_form_label">State/Province</label>
	                    <select id="province" class="form-control cs_form_textbox" name="state">
                        	<?php
	                    		//get the country from the BLL
	                    		$BLL_Obj->getSelectedItemList('zone','id',$getValues[0]['state'],'name');
	                    	?>
	                    </select>
	                </div>
	                <div class="form-group">
	                    <label class="cs_form_label">City</label>
	                    <input type="text" class="form-control cs_form_textbox" name="city" value="<?php echo $getValues[0]['city'] ?>">
	                </div>
	                <div class="form-group">
	                    <label class="cs_form_label">Postal Code</label>
	                    <input type="text" class="form-control cs_form_textbox" name="postal_code" value="<?php echo $getValues[0]['postal_code'] ?>">
	                </div>
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
                    <input type="hidden" name="op" value="fac_info" />
                    <button type="submit" class="btn btn-success btn-lg">Update Data</button>
                </form>
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">	
            	<form action="v-includes/functions/function.edit-faculty.php" method="post">
                	<h4 class="cs_page_form_caption">Change Password</h4>
                    <div class="form-group">
	                    <label class="cs_form_label">Old Password</label>
	                    <input type="password" class="form-control cs_form_textbox" name="old_password">
	                </div>
                    <div class="form-group">
	                    <label class="cs_form_label">New Password</label>
	                    <input type="password" class="form-control cs_form_textbox" name="new_password">
	                </div>
	                <div class="form-group">
	                    <label class="cs_form_label">Confirm Password</label>
	                    <input type="password" class="form-control cs_form_textbox" name="con_password">
	                </div>
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
                    <input type="hidden" name="op" value="fac_cred" />
                    <button type="submit" class="btn btn-success btn-lg">Update</button>
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
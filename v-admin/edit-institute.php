<?php
	$title = 'Edit Institute';
	//include the template files
	include 'v-templates/header.php';
	include 'v-templates/sidebar.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Institute</h1>
            <h4 class="cs_page_info">You can edit data about institute.</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    
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
		$getValues = $BLL_Obj->getUserInfo('institute_info','institute_id',$user_id);
	?>
	
    <div class="row stu_adm_row">
        <div class="col-lg-6">
        	<form role="form" action="v-includes/functions/function.edit-institute.php" method="post">
            	<h4 class="cs_page_form_caption">Fill Up Institute Details</h4>
            	<div class="form-group">
                    <label class="cs_form_label">Institute Name</label>
                    <input type="text" class="form-control cs_form_textbox" name="name" value="<?php echo $getValues[0]['name'] ?>">
                </div>
                <div class="form-group">
                    <label class="cs_form_label">Email</label>
                    <input type="text" class="form-control cs_form_textbox" name="email" value="<?php echo $getValues[0]['email'] ?>">
                </div>
                <div class="form-group">
	                    <label class="cs_form_label">Street 1</label>
	                    <input type="text" class="form-control cs_form_textbox" name="street_1" value="<?php echo $getValues[0]['street_1']; ?>">
	                </div>
	                 <div class="form-group">
	                    <label class="cs_form_label">Street 2</label>
	                    <input type="text" class="form-control cs_form_textbox" name="street_2" value="<?php echo $getValues[0]['street_2']; ?>">
	                </div>
                    <!-- <div class="form-group">
                        <label class="cs_form_label">Session</label>
                        <input type="text" class="form-control cs_form_textbox" name="session" value="<?php echo $getValues[0]['session']; ?>">
                    </div>
                    <div class="form-group">
                        <label class="cs_form_label">Joining Date</label>
                        <input type="text" class="form-control cs_form_textbox" name="joining_date" value="<?php echo $getValues[0]['joining_date']; ?>">
                    </div> -->
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
	                <!-- <div class="form-group">
	                    <label class="cs_form_label">State/Province</label>
	                    <select id="province" class="form-control cs_form_textbox" name="state" value="<?php echo $getValues[0]['state']; ?>">
	                    </select>
	                </div> -->
	                <div class="form-group">
	                    <label class="cs_form_label">City</label>
	                    <input type="text" class="form-control cs_form_textbox" name="city" value="<?php echo $getValues[0]['city']; ?>">
	                </div>
	                <div class="form-group">
	                    <label class="cs_form_label">Zip/Postal Code</label>
	                    <input type="text" class="form-control cs_form_textbox" name="postal_code" value="<?php echo $getValues[0]['postal_code']; ?>">
	                </div>
		            <div class="form-group">
	                    <label class="cs_form_label">Website</label>
	                    <input type="text" class="form-control cs_form_textbox" name="website" value="<?php echo $getValues[0]['website']; ?>">
	                </div>
	                <div class="form-group">
	                    <label class="cs_form_label">Home Phone</label>
	                    <input type="text" class="form-control cs_form_textbox" name="home_phone" value="<?php echo $getValues[0]['home_phone']; ?>">
	                </div>
	                
	                <div class="form-group">
	                    <label class="cs_form_label">Work Phone</label>
	                    <input type="text" class="form-control cs_form_textbox" name="work_phone" value="<?php echo $getValues[0]['work_phone']; ?>">
	                </div>
	                
	                <div class="form-group">
	                    <label class="cs_form_label">Work Fax</label>
	                    <input type="text" class="form-control cs_form_textbox" name="work_fax" value="<?php echo $getValues[0]['work_fax']; ?>">
	                </div>
	                
	                <div class="form-group">
	                    <label class="cs_form_label">Cellular Phone</label>
	                    <input type="text" class="form-control cs_form_textbox" name="cellular_phone" value="<?php echo $getValues[0]['cellular_phone']; ?>">
	                </div>
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
                <input type="hidden" name="op" value="ins_info" />
                <button type="submit" class="btn btn-success btn-lg">Update Data</button>
            </form>
        </div>
        <!-- /.col-lg-6 -->
        <div class="col-lg-6">	
        	<form action="v-includes/functions/function.edit-institute.php" method="post">
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
                <input type="hidden" name="op" value="ins_cred" />
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
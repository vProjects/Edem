<?php
	$title = 'Create Faculty';
	//include the template files
	include 'v-templates/header.php';
	include 'v-templates/sidebar.php';
?>
	<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Create Faculty</h1>
                <h4 class="cs_page_info">You can add data about faculty manualy or you can just upload file directly.</h4>
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
            	<form role="form" action="v-includes/functions/function.create-faculty.php" method="post">
                	<h4 class="cs_page_form_caption">Fill Up Faculty Information</h4>
                	<div class="form-group">
	                    <label class="cs_form_label">Faculty Name</label>
	                    <input type="text" class="form-control cs_form_textbox" name="name">
	                </div>
	                <div class="form-group">
	                    <label class="cs_form_label">Email</label>
	                    <input type="text" class="form-control cs_form_textbox" name="email">
	                </div>
	                <div class="form-group">
	                    <label class="cs_form_label">Username</label>
	                    <input type="text" class="form-control cs_form_textbox" name="username">
	                </div>
	                <div class="form-group">
	                    <label class="cs_form_label">Password</label>
	                    <input type="password" class="form-control cs_form_textbox" name="password">
	                </div>
	                <div class="form-group">
	                    <label class="cs_form_label">Confirm Password</label>
	                    <input type="password" class="form-control cs_form_textbox" name="r_password">
	                </div>
                     <div class="form-group">
	                    <label class="cs_form_label">Institution</label>
	                    <select class="form-control cs_form_textbox" name="institute">
	                    	<?php
	                    		//get the institute from the BLL
	                    		$BLL_Obj->getInstitute_SelectBox();
	                    	?>
	                    </select>
	                </div>
                    <div class="form-group">
                        <label class="cs_form_label">Date of birth</label>
                        <input type="text" class="form-control cs_form_textbox" id="calender_date" name="dob">
                    </div>
                    <div class="form-group">
                    	<label class="cs_form_label cs_form_radio_label">Gender</label>
                        <label class="radio-inline">
                            <input type="radio" name="sex" id="sex1" value="male" checked="checked">Male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="sex" id="sex2" value="female">Female
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="cs_form_label">Contact No.</label>
                        <input type="text" class="form-control cs_form_textbox" name="mobile">
                    </div>
                    <div class="form-group">
	                    <label class="cs_form_label">Add Courses</label>
	                    <select class="form-control cs_form_textbox" multiple="multiple" name="course[]">
	                    	<?php
	                    		//get the courses from the BLL
	                    		$BLL_Obj->getCourse_SelectBox();
							?>                    	
	                    </select>
	                </div>
                    <div class="form-group">
                        <label class="cs_form_label">Division</label>
                        <input type="text" class="form-control cs_form_textbox" name="division">
                    </div>
                    <div class="form-group">
                        <label class="cs_form_label">Joining Date</label>
                        <input type="text" class="form-control cs_form_textbox" name="joining_date">
                    </div>
                    <div class="form-group">
                    <label class="cs_form_label">Address Line 1</label>
                    <input type="text" class="form-control cs_form_textbox" name="address_l_1">
	                </div>
	                <div class="form-group">
	                    <label class="cs_form_label">Address Line 2</label>
	                    <input type="text" class="form-control cs_form_textbox" name="address_l_2">
	                </div>
					<div class="form-group">
		                <label class="cs_form_label">Country</label>
		                <select id="country" class="form-control cs_form_textbox" name="country">
		                    <?php
		                    	$BLL_Obj->getGeoSelectBox('country',"null");
		                    ?>
		                </select>
		            </div>
		            <div class="form-group">
	                    <label class="cs_form_label">State/Province</label>
	                    <select id="province" class="form-control cs_form_textbox" name="state">
	                    </select>
	                </div>
	                <div class="form-group">
	                    <label class="cs_form_label">City</label>
	                    <input type="text" class="form-control cs_form_textbox" name="city">
	                </div>
	                <div class="form-group">
	                    <label class="cs_form_label">Postal Code</label>
	                    <input type="text" class="form-control cs_form_textbox" name="postal_code">
	                </div>
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
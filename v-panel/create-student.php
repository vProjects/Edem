<?php
	$title = 'Create Student';
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
                <h1 class="page-header">Create Student</h1>
                <h4 class="cs_page_info">You can add data about student manualy or you can just upload file directly.</h4>
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
            	<form role="form" action="v-includes/functions/function.create-student.php" method="post">
                	<h4 class="cs_page_form_caption">Fill Up Faculty Information</h4>
                	<div class="form-group">
	                    <label class="cs_form_label">Student Name</label>
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
	                    <label class="cs_form_label">Institute</label>
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
                    	<label class="cs_form_label cs_form_radio_label">Sex</label>
                        <label class="radio-inline">
                            <input type="radio" name="sex" id="sex1" value="male" checked="checked">Male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="sex" id="sex2" value="female">Female
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="cs_form_label">Mobile No.</label>
                        <input type="text" class="form-control cs_form_textbox" name="mobile">
                    </div>
                    <div class="form-group">
                        <label class="cs_form_label">Curriculum</label>
                        <select name="curriculum[]" class="form-control cs_form_textbox" multiple="multiple">
                        	<option value="asd">Lorem Ipsum</option>
                        	<option value="ds">Lorem Ipsum</option>
                        	<option value="asdf">Lorem Ipsum</option>
                        	<option value="qwdsa">Lorem Ipsum</option>
                        	<option value="asdca">Lorem Ipsum</option>
                        	<option value="asdwq">Lorem Ipsum</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="cs_form_label">Session</label>
                        <input type="text" class="form-control cs_form_textbox" name="session">
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
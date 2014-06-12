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
        <!-- /.row -->
        <div class="row stu_adm_row">
            <div class="col-lg-6">
            	<form role="form">
                	<h4 class="cs_page_form_caption">Fill Up Student Information</h4>
                	<div class="form-group">
                        <label class="cs_form_label">Name</label>
                        <input type="text" class="form-control cs_form_textbox">
                    </div>
                    <div class="form-group">
                        <label class="cs_form_label">Email Id</label>
                        <input type="text" class="form-control cs_form_textbox">
                    </div>
                    <div class="form-group">
                        <label class="cs_form_label">Date of birth</label>
                        <input type="text" class="form-control cs_form_textbox" id="calender_date">
                    </div>
                    <div class="form-group">
                    	<label class="cs_form_label cs_form_radio_label">Sex</label>
                        <label class="radio-inline">
                            <input type="radio" name="sex" id="sex1" value="male" checked>Male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="sex" id="sex2" value="female">Female
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="cs_form_label">Mobile No.</label>
                        <input type="text" class="form-control cs_form_textbox">
                    </div>
                    <div class="form-group">
                        <label class="cs_form_label">Subject</label>
                        <input type="text" class="form-control cs_form_textbox">
                    </div>
                    <div class="form-group">
                        <label class="cs_form_label">Division</label>
                        <input type="text" class="form-control cs_form_textbox">
                    </div>
                    <div class="form-group">
                        <label class="cs_form_label">Joining Date</label>
                        <input type="text" class="form-control cs_form_textbox">
                    </div>
                    <div class="form-group">
                        <label class="cs_form_label">Address Line 1</label>
                        <input type="text" class="form-control cs_form_textbox">
                    </div>
                    <div class="form-group">
                        <label class="cs_form_label">Address Line 2</label>
                        <input type="text" class="form-control cs_form_textbox">
                    </div>
                    <div class="form-group">
                        <label class="cs_form_label">Country</label>
                        <input type="text" class="form-control cs_form_textbox">
                    </div>
                    <div class="form-group">
                        <label class="cs_form_label">State</label>
                        <input type="text" class="form-control cs_form_textbox">
                    </div>
                    <div class="form-group">
                        <label class="cs_form_label">City</label>
                        <input type="text" class="form-control cs_form_textbox">
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
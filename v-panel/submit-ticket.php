<?php
	$title = 'Submit Ticket';
	//checking for login status
	if(!isset($GLOBALS['_COOKIE']['course_management']) && !isset($_SESSION['user_id']))
	{
		header("Location: ../index.php");
	}
	//include the template files
	include 'v-templates/header.php';
	//include other files
	include 'v-templates/header-text.php';
	include 'v-templates/sidebar.php';
?>
	<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Submit Ticket</h1>
                <h4 class="cs_page_info">You can submit a ticket for your query</h4>
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
            <div class="col-lg-8">
            	<form role="form" action="v-includes/functions/function.submit-ticket.php" method="post">
                	<h4 class="cs_page_form_caption">Fill Up Information For Submitting Ticket</h4>
                	<div class="form-group">
	                    <label class="cs_form_label">Title</label>
	                    <input type="text" class="form-control cs_form_textbox" name="title">
	                </div>
	                <div class="form-group">
	                    <label class="cs_form_label">Subject</label>
	                    <input type="text" class="form-control cs_form_textbox" name="subject">
	                </div>
                    <div class="form-group">
	                    <label class="cs_form_label">Submit Ticket</label>
	                    <textarea class="form-control cs_form_textbox" name="msg" rows="5"></textarea>
	                </div>
                    <button type="submit" class="btn btn-success btn-lg">Submit Data</button>
                    <button type="reset" class="btn btn-danger btn-lg">Reset Data</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
<?php
	//footer
	include 'v-templates/footer.php';
?>
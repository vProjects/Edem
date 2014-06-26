<?php
	$title = 'Ticket Details';
	//include the template files
	include 'v-templates/header.php';
	include 'v-templates/sidebar.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ticket Details</h1>
            <h4 class="cs_page_info">You can see details of ticket.</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <?php
		//get values from GET method
		$ticket_id = $GLOBALS['_GET']['id'];
		//geting ticket detail info
		$ticket_details = $BLL_Obj->getTicketDetails($ticket_id);
	?>
	
    <div class="row stu_adm_row">
        <div class="col-lg-8">
        	<h4 class="cs_page_form_caption">Detail Information Of Ticket</h4>
            <div class="form-group">
                <label class="cs_form_label">Email Id</label>
                <div class="form-control"><?php echo $ticket_details[0][0]['email'] ?></div>
            </div>
            <div class="form-group">
                <label class="cs_form_label">User Type</label>
                <div class="form-control"><?php echo $ticket_details[1][0]['user_type']; ?></div>
            </div>
            <div class="form-group">
                <label class="cs_form_label">Title</label>
                <div class="form-control"><?php echo $ticket_details[0][0]['title']; ?></div>
            </div>
            <div class="form-group">
                <label class="cs_form_label">Subject</label>
                <div class="form-control"><?php echo $ticket_details[0][0]['subject']; ?></div>
            </div>
            <div class="form-group">
                <label class="cs_form_label">Message</label>
                <div class="form-control details_textarea"><?php echo $ticket_details[0][0]['message']; ?></div>
            </div>
            <div class="form-group">
                <label class="cs_form_label">Sending Date & Time</label>
                <div class="form-control"><?php echo $ticket_details[0][0]['date'].' | '.$ticket_details[0][0]['time']; ?></div>
            </div>
            <div class="form-group">
				<?php 
					if($ticket_details[0][0]['status'] == 1)
					{
						echo '<button class="btn btn-success btn-lg">Ticket Is Open</button>';
					}
					else
					{
						echo '<button class="btn btn-danger btn-lg">Ticket Is Closed</button>';
					}
				?>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
<?php
	//footer
	include 'v-templates/footer.php';
?>
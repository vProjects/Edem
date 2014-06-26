<?php
	$title = 'Ticket List';
	//include the template files
	include 'v-templates/header.php';
	include 'v-templates/sidebar.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ticket List</h1>
            <h4 class="cs_page_info">You can see list of ticket submitted.</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    
    <div class="row">
        <div class="col-lg-12">
            <div class="nav nav-tabs panel-nav-tab pull-right">
            	<button class="btn btn-success active" href="#Open_ticket" data-toggle="tab">Open Tickets</button>
                <button class="btn btn-danger" href="#Closed_ticket" data-toggle="tab">Closed Tickets</button>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
	
    <div class="row stu_adm_row">
        <div class="col-lg-12 table-responsive tab-content">
        	<div class="tab-pane active" id="Open_ticket">
        	<table class="table table-bordered table-striped">
            	<thead>
                	<tr class="success">
                        <th>Email Id</th>
                        <th>User Type</th>
                        <th>Title</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                	<?php
						//get open tickets list
						$BLL_Obj->getTicketList(1);
					?>
                </tbody>
            </table>
            </div>
            <div class="tab-pane" id="Closed_ticket">
            <table class="table table-bordered table-striped tab-pane">
            	<thead>
                	<tr class="danger">
                    	<th>Email Id</th>
                        <th>User Type</th>
                        <th>Title</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                	<?php
						//get closed tickets list
						$BLL_Obj->getTicketList(0);
					?>
                </tbody>
            </table>
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
<?php
	$title = 'Event List';
	//include the template files
	include 'v-templates/header.php';
	include 'v-templates/sidebar.php';
?>
	<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Event List</h1>
                <h4 class="cs_page_info">You can see list data about event</h4>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        
        <div class="row">
            <div class="col-lg-12">
                <div class="nav nav-tabs panel-nav-tab">
                    <button class="btn btn-success active" href="#Open_event" data-toggle="tab">Open Events</button>
                    <button class="btn btn-danger" href="#Closed_event" data-toggle="tab">Closed Events</button>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        
        <div class="row stu_adm_row">
        	<div class="col-sm-12">
            	<ul class="pagination pull-right list-pagination">
                  <li><a href="#">&laquo;</a></li>
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
            <div class="col-lg-12 table-responsive tab-content">
                <div class="tab-pane active" id="Open_event">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="success">
                            <th>Name</th>
                            <th>Institute</th>
                            <th>Created By</th>
                            <th>Created On</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Faculty</th>
                            <th>Group</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            //get open events list
                            $BLL_Obj->getOpenEventList();
                        ?>
                    </tbody>
                </table>
                </div>
                <div class="tab-pane" id="Closed_event">
                <table class="table table-bordered table-striped tab-pane">
                    <thead>
                        <tr class="danger">
                            <th>Name</th>
                            <th>Institute</th>
                            <th>Created By</th>
                            <th>Created On</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Faculty</th>
                            <th>Group List</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            //get closed events list
                            $BLL_Obj->getClosedEventList();
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
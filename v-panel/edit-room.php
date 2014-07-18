<?php
	$title = 'Create Room';
	//checking for login status
	if(!isset($GLOBALS['_COOKIE']['course_management']) && !isset($_SESSION['user_id']))
	{
		header("Location: ../index.php");
	}
	//include the template files
	include 'v-templates/header.php';
	//checkingfor level
	if($level < 4)
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
                <h1 class="page-header">Edit Room</h1>
                <h4 class="cs_page_info">You can edit data about room manualy.</h4>
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
			$room_name = "";

			//get the id for the student status
			if( count($GLOBALS["_GET"]) > 0 )
			{
				$room_id = $_GET['id'];
				
				//get the status name
				$room_name = $BLL_Obj->getRoomInfo($room_id);
			}
		?>
        <!-- /.row -->
        <div class="row stu_adm_row">
            <div class="col-lg-8">
            	<form role="form" action="v-includes/functions/function.edit-room.php" method="post">
                	<h4 class="cs_page_form_caption">Fill Up Room Information</h4>
                	<div class="form-group">
                        <label class="cs_form_label">Room Number</label>
                        <input type="text" class="form-control cs_form_textbox" name="name" value="<?php echo $room_name; ?>">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $room_id ?>" />
                    <button type="submit" class="btn btn-success btn-lg">Submit Data</button>
                </form>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
        <div class="row stu_adm_row">
    	<div class="col-lg-12">
        	<div class="panel panel-info">
                <div class="panel-heading"><i class="fa fa-plus-circle fa-fw"></i> Avialable Rooms of Your Institute(Click to update).</div>
                <div class="panel-body">
                	<?php
                		//get the values from the database
                		$BLL_Obj->getRoomList();
                	?>
               	</div>
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
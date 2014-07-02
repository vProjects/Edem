<?php
	$title = 'Control Access';
	//include the template files
	include 'v-templates/header.php';
	include 'v-templates/sidebar.php';
?>
	<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Access Control</h1>
                <h4 class="cs_page_info">Control the access the different section accessed by the users.</h4>
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
		<div class="table-responsive">
			<table class="table table-bordered">
		      <thead>
		        <tr>
		          <th>User Category</th>
		          <th>Section Allowed</th>
		          <th>Level</th>
		        </tr>
		      </thead>
		      <tbody>
		        <tr>
		          <td>Admin</td>
		          <td>Unlimited</td>
		          <td>Super</td>
		        </tr>
		        <tr>
		          <td>Insitute</td>
		          <td>Manage All</td>
		          <td>4</td>
		        </tr>
		        <tr>
		          <td>Chairperson</td>
		          <td>Manage:<br/> - Chairperson <br/> - Faculty <br/> - Students <br/> - Course <br/> - Curriculum</td>
		          <td>3</td>
		        </tr>
		        <tr>
		          <td>Faculty</td>
		          <td>Manage:<br/> - Faculty <br/> - Students  <br/> - Course <br/> - Curriculum</td>
		          <td>2</td>
		        </tr>
		        <tr>
		          <td>Students</td>
		          <td>Manage:<br/> -Student</td>
		          <td>1</td>
		        </tr>
		      </tbody>
		    </table>
		</div>
	</div><!--page-wrapper ends here-->
<?php
	//footer
	include 'v-templates/footer.php';
?>
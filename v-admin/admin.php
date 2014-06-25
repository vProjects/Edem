<?php
	$title = 'Dashboard';
	//include the template files
	include 'v-templates/header.php';
	include 'v-templates/sidebar.php';
?>
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
            <h4 class="cs_page_info">Widgets about application data.</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    
    <div class="row stu_adm_row">
    	
        <div class="col-lg-3">
        	<div class="panel panel-primary">
            	<div class="panel-heading cat_counter_heading">Total Insititute : 
                	<?php
						//get total active member
						$BLL_Obj->getTotalCategory('institute_info',array('institute_status'),array(1));
					?>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3">
        	<div class="panel panel-primary">
            	<div class="panel-heading cat_counter_heading">Total Chair Person: 
                	<?php
						//get total active member
						$BLL_Obj->getTotalCategory('chairperson_info',array('chairman_status'),array(1));
					?>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3">
        	<div class="panel panel-primary">
            	<div class="panel-heading cat_counter_heading">Total Faculty: 
                	<?php
						//get total active member
						$BLL_Obj->getTotalCategory('faculty_info',array('teachers_status'),array(1));
					?>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3">
        	<div class="panel panel-primary">
            	<div class="panel-heading cat_counter_heading">Total Student: 
                	<?php
						//get total active member
						$BLL_Obj->getTotalCategory('students_info',array('student_status'),array(1));
					?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<?php
	//footer
	include 'v-templates/footer.php';
?>
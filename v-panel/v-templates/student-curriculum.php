<?php
	//checking if student has changed his curriculum or not
	$curriculum_change = $BLL_Obj->checkingCurriculumChange($_SESSION['user_id']);
	?>
<!-- fresh year block start-->
<div class="row">
	<div class="col-lg-12">
		<h3 class="dashboard-heading">FRESHMAN YEAR</h3>
	</div>
</div>
<!--<div class="row stu_adm_row"> 	
    <div class="col-lg-3">
    	<div class="black-block">
    		<div class="course-group text-center">
    			<a href="#"><p>Composition I<br /><span>3</span></p></a>
    		</div>
        </div>
    </div>
    <div class="col-lg-3">
    	<div class="red-block">
    		<div class="course-group text-center">
    			<a href="#"><p>College Algebra<br /><span>3</span></p></a>
    		</div>
        </div>
    </div>
    <div class="col-lg-3">
    	<?php 
    		//static codes
    		$sub_status = $BLL_Obj->getStudentSubjectStatus(1);
    	?>
    	<div class="<?php echo $sub_status[0]; ?>">
    		<div class="course-group text-center">
    			<a href="#"><p>World History<br /><span>3</span></p></a>
    		</div>
        </div>
    </div>   
</div>
<div class="row stu_adm_row">
	<div class="col-lg-3">
    	<?php 
    		//static codes
    		$sub_status = $BLL_Obj->getStudentSubjectStatus(2);
    	?>
    	<div class="<?php echo $sub_status[0]; ?>">
    		<div class="course-group text-center">
    			<a href="#"><p>Essentials of the Christian Faith<br /> <span>2</span></p></a>
    		</div>
        </div>
    </div>
    
    <div class="col-lg-3">
    	<?php 
    		//static codes
    		$sub_status = $BLL_Obj->getStudentSubjectStatus(2);
    	?>
    	<div class="<?php echo $sub_status[0]; ?>">
    		<div class="course-group text-center">
    			<a href="#"><p>Princ/Appl of Physical Science<br /><span>OR</span></p></a>
    		</div>
        </div>
    </div>
</div>-->
<div class="row stu_adm_row">
<?php
	if($curriculum_change == 0)
	{
		//get the course of the student
		$courseId1 = $BLL_Obj->getCourseIdOfStudent($_SESSION['user_id']);
		//get the curriculum of the student
		$curriculums1 = $BLL_Obj->getCurriculumListOfStudent($courseId1, 1);
		if(!empty($curriculums1))
		{
			$count = 0;	
			foreach ($curriculums1 as $curriculumid => $curriculum) 
			{
				if(($count % 4) == 0 && $count!=0)
				{
					echo '</div><div class="row stu_adm_row">';
				}	
				echo '<div class="col-lg-3">
						<div class="blue-block">
				    		<div class="course-group text-center">
				    			<a href="#"><p>'.$curriculum.'</p></a>
				    		</div>
				        </div>
					  </div>';
				$count++;	  
			}	
		}
	}
	else 
	{
		$count = 0;	
		$curriculum_change['freshman'] = explode(',', $curriculum_change['freshman']);
		foreach ($curriculum_change['freshman'] as $key => $value) 
		{
			$curriculum_name = $BLL_Obj->getCurriculumName($value);	
			if(($count % 4) == 0 && $count!=0)
			{
				echo '</div><div class="row stu_adm_row">';
			}	
			echo '<div class="col-lg-3">
					<div class="blue-block">
			    		<div class="course-group text-center">
			    			<a href="#"><p>'.$curriculum_name.'</p></a>
			    		</div>
			        </div>
				  </div>';
			$count++;	  
		}	
	}
?>
</div>
<!-- fresh year block end-->
<!-- sophomore year block start-->
<div class="row">
	<div class="col-lg-12">
		<h3 class="dashboard-heading">SOPHOMORE YEAR</h3>
	</div>
</div>
<div class="row stu_adm_row">
<?php
	if($curriculum_change == 0)
	{
		//get the course of the student
		$courseId2 = $BLL_Obj->getCourseIdOfStudent($_SESSION['user_id']);
		//get the curriculum of the student
		$curriculums2 = $BLL_Obj->getCurriculumListOfStudent($courseId2, 2);
		if(!empty($curriculums2))
		{
			$count = 0;	
			foreach ($curriculums2 as $curriculumid => $curriculum) 
			{
				if(($count % 4) == 0 && $count!=0)
				{
					echo '</div><div class="row stu_adm_row">';
				}	
				echo '<div class="col-lg-3">
						<div class="blue-block">
				    		<div class="course-group text-center">
				    			<a href="#"><p>'.$curriculum.'</p></a>
				    		</div>
				        </div>
					  </div>';
				$count++;	  
			}	
		}
	}
	else 
	{
		$count = 0;	
		$curriculum_change['sophomore'] = explode(',', $curriculum_change['sophomore']);
		foreach ($curriculum_change['sophomore'] as $key => $value) 
		{
			$curriculum_name = $BLL_Obj->getCurriculumName($value);	
			if(($count % 4) == 0 && $count!=0)
			{
				echo '</div><div class="row stu_adm_row">';
			}	
			echo '<div class="col-lg-3">
					<div class="blue-block">
			    		<div class="course-group text-center">
			    			<a href="#"><p>'.$curriculum_name.'</p></a>
			    		</div>
			        </div>
				  </div>';
			$count++;	  
		}	
	}
?>
</div>
<!-- sophomore year block end-->
<!-- junior year block start-->
<div class="row">
	<div class="col-lg-12">
		<h3 class="dashboard-heading">JUNIOR YEAR</h3>
	</div>
</div>
<div class="row stu_adm_row">
<?php
	if($curriculum_change == 0)
	{
		//get the course of the student
		$courseId4 = $BLL_Obj->getCourseIdOfStudent($_SESSION['user_id']);
		//get the curriculum of the student
		$curriculums4 = $BLL_Obj->getCurriculumListOfStudent($courseId4, 4);
		if(!empty($curriculums4))
		{
			$count = 0;	
			foreach ($curriculums4 as $curriculumid => $curriculum) 
			{
				if(($count % 4) == 0 && $count!=0)
				{
					echo '</div><div class="row stu_adm_row">';
				}	
				echo '<div class="col-lg-3">
						<div class="blue-block">
				    		<div class="course-group text-center">
				    			<a href="#"><p>'.$curriculum.'</p></a>
				    		</div>
				        </div>
					  </div>';
				$count++;	  
			}	
		}
	}
	else 
	{
		$count = 0;	
		$curriculum_change['junior'] = explode(',', $curriculum_change['junior']);
		foreach ($curriculum_change['junior'] as $key => $value) 
		{
			$curriculum_name = $BLL_Obj->getCurriculumName($value);	
			if(($count % 4) == 0 && $count!=0)
			{
				echo '</div><div class="row stu_adm_row">';
			}	
			echo '<div class="col-lg-3">
					<div class="blue-block">
			    		<div class="course-group text-center">
			    			<a href="#"><p>'.$curriculum_name.'</p></a>
			    		</div>
			        </div>
				  </div>';
			$count++;	  
		}	
	}	
?>
</div>
<!-- junior year block end-->
<!-- senior year block start-->
<div class="row">
	<div class="col-lg-12">
		<h3 class="dashboard-heading">SENIOR YEAR</h3>
	</div>
</div>
<div class="row stu_adm_row">
<?php
	if($curriculum_change == 0)
	{
		//get the course of the student
		$courseId5 = $BLL_Obj->getCourseIdOfStudent($_SESSION['user_id']);
		//get the curriculum of the student
		$curriculums5 = $BLL_Obj->getCurriculumListOfStudent($courseId5, 5);
		if(!empty($curriculums5))
		{
			$count = 0;	
			foreach ($curriculums5 as $curriculumid => $curriculum) 
			{
				if(($count % 4) == 0 && $count!=0)
				{
					echo '</div><div class="row stu_adm_row">';
				}	
				echo '<div class="col-lg-3">
						<div class="blue-block">
				    		<div class="course-group text-center">
				    			<a href="#"><p>'.$curriculum.'</p></a>
				    		</div>
				        </div>
					  </div>';
				$count++;	  
			}	
		}
	}
	else 
	{
		$count = 0;	
		$curriculum_change['senior'] = explode(',', $curriculum_change['senior']);
		foreach ($curriculum_change['senior'] as $key => $value) 
		{
			$curriculum_name = $BLL_Obj->getCurriculumName($value);	
			if(($count % 4) == 0 && $count!=0)
			{
				echo '</div><div class="row stu_adm_row">';
			}	
			echo '<div class="col-lg-3">
					<div class="blue-block">
			    		<div class="course-group text-center">
			    			<a href="#"><p>'.$curriculum_name.'</p></a>
			    		</div>
			        </div>
				  </div>';
			$count++;	  
		}	
	}
?>		
</div>
<!-- senior year block end-->
<!-- transfer year block start-->
<div class="row">
	<div class="col-lg-12">
		<h3 class="dashboard-heading">TRANSFER YEAR</h3>
	</div>
</div>
<div class="row stu_adm_row">
<?php
	if($curriculum_change == 0)
	{
		//get the course of the student
		$courseId6 = $BLL_Obj->getCourseIdOfStudent($_SESSION['user_id']);
		//get the curriculum of the student
		$curriculums6 = $BLL_Obj->getCurriculumListOfStudent($courseId6, 6);
		if(!empty($curriculums6))
		{
			$count = 0;	
			foreach ($curriculums6 as $curriculumid => $curriculum) 
			{
				if(($count % 4) == 0 && $count!=0)
				{
					echo '</div><div class="row stu_adm_row">';
				}	
				echo '<div class="col-lg-3">
						<div class="blue-block">
				    		<div class="course-group text-center">
				    			<a href="#"><p>'.$curriculum.'</p></a>
				    		</div>
				        </div>
					  </div>';
				$count++;	  
			}	
		}
	}
	else 
	{
		$count = 0;	
		$curriculum_change['transfer'] = explode(',', $curriculum_change['transfer']);
		foreach ($curriculum_change['transfer'] as $key => $value) 
		{
			$curriculum_name = $BLL_Obj->getCurriculumName($value);	
			if(($count % 4) == 0 && $count!=0)
			{
				echo '</div><div class="row stu_adm_row">';
			}	
			echo '<div class="col-lg-3">
					<div class="blue-block">
			    		<div class="course-group text-center">
			    			<a href="#"><p>'.$curriculum_name.'</p></a>
			    		</div>
			        </div>
				  </div>';
			$count++;	  
		}	
	}
?>
</div>
<!-- transfer year block end-->
<!-- graduate year block start-->
<div class="row">
	<div class="col-lg-12">
		<h3 class="dashboard-heading">GRADUATE YEAR</h3>
	</div>
</div>
<div class="row stu_adm_row">
<?php
	if($curriculum_change == 0)
	{
		//get the course of the student
		$courseId7 = $BLL_Obj->getCourseIdOfStudent($_SESSION['user_id']);
		//get the curriculum of the student
		$curriculums7 = $BLL_Obj->getCurriculumListOfStudent($courseId7, 7);
		if(!empty($curriculums7))
		{
			$count = 0;	
			foreach ($curriculums7 as $curriculumid => $curriculum) 
			{
				if(($count % 4) == 0 && $count!=0)
				{
					echo '</div><div class="row stu_adm_row">';
				}	
				echo '<div class="col-lg-3">
						<div class="blue-block">
				    		<div class="course-group text-center">
				    			<a href="#"><p>'.$curriculum.'</p></a>
				    		</div>
				        </div>
					  </div>';
				$count++;	  
			}	
		}
	}
	else 
	{
		$count = 0;	
		$curriculum_change['graduate'] = explode(',', $curriculum_change['graduate']);
		foreach ($curriculum_change['graduate'] as $key => $value) 
		{
			$curriculum_name = $BLL_Obj->getCurriculumName($value);	
			if(($count % 4) == 0 && $count!=0)
			{
				echo '</div><div class="row stu_adm_row">';
			}	
			echo '<div class="col-lg-3">
					<div class="blue-block">
			    		<div class="course-group text-center">
			    			<a href="#"><p>'.$curriculum_name.'</p></a>
			    		</div>
			        </div>
				  </div>';
			$count++;	  
		}	
	}
?>
</div>
<!-- graduate year block end-->
<?php
	session_start();
	//include the DAL library and create object
	include '../library/library.DAL.php';
	$DAL_Obj = new DAL_Library() ;
	
	if( $_SERVER['REQUEST_METHOD'] == 'POST' )
	{
		$name = $_POST['name'] ;
		$course_no = $_POST['course_no'];
		$advisor = $_POST['advisor'] ;
		$details = $_POST['details'] ;
		$institute_id = $_POST['institute_id'];
		$announcement_title = $_POST['announcement_title'];
		$edu_level = $_POST['edu_level'];
		$availability = $_POST['availability'];
		$creatorName = $_POST['creator_name'];
	}
	
	//initialize the variable
	$advisor_str = "" ;
	
	if( !empty($advisor) )
	{
		foreach ($advisor as $val)
		{
				$advisor_str .= $val.",";
		}
		
		$advisor_str = substr($advisor_str, 0, -1);
	}
	
	//generate the course id
	$course_id = "COU".uniqid();
	
	if( !empty($name) && !empty($course_no) && !empty($advisor) && !empty($details) && !empty($institute_id) && !empty($announcement_title) && !empty($edu_level) && !empty($availability) && !empty($creatorName))
	{
		$insert_course = array(
						'table' => 'course_info' ,
						'values' => array(
										'course_id' => $course_id ,
										'institute_id' => $institute_id ,
										'created_by' => $creatorName ,
										'course_no' => $course_no ,
										'name' => $name ,
										'announcement_title' => $announcement_title ,
										'edu_level' => $edu_level ,
										'advisor' => $advisor_str ,
										'created_on' => date('Y-m-d') ,
										'detail' => $details ,
										'availability' => $availability ,
										'course_status' => 1
									)
						);
						
		$return = $DAL_Obj->insertValue($insert_course);
		
		if( $return > 0 )
		{
			$result = "Course Id: ".$course_id."<br/>Course addedd successfully.";
		}
		else
		{
			$result = "Error!! <br/> Please try again.";
		}
	}
	else
	{
		$result = "Please fill the form properly";	
	}
	
	
	//store the values in sessions
	$_SESSION['result'] = $result;
	
	//redirect
	header('Location: ../../create-course.php');
?>
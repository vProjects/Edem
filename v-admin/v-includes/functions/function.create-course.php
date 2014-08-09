<?php
	session_start();
	//include the DAL library and create object
	include '../library/library.DAL.php';
	$DAL_Obj = new DAL_Library() ;
	
	if( $_SERVER['REQUEST_METHOD'] == 'POST' )
	{
		$name = $_POST['name'] ;
		$advisor = $_POST['advisor'] ;
		$institute_id = $_POST['institute'];
		$detail = $_POST['details'] ;
		$course_no = $_POST['course_no'] ;
		$announcement_title = $_POST['announcement_title'] ;
		$edu_level = $_POST['edu_level'] ;
		$availability = $_POST['availability'] ;
		
		//as this is created by the admin
		$created_user_id = 'admin';
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
	
	if( !empty($name) && !empty($advisor_str) && !empty($created_user_id) )
	{
		$insert_course = array(
						'table' => 'course_info' ,
						'values' => array(
										'course_id' => $course_id ,
										'advisor' => $advisor_str ,
										'institute_id' => $institute_id ,
										'created_by' => $created_user_id ,
										'created_on' => date('Y-m-d') ,
										'name' => $name ,
										'course_no' => $course_no ,
										'detail' => $detail ,
										'announcement_title' => $announcement_title ,
										'edu_level' => $edu_level ,
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
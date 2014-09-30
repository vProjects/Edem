<?php
	session_start();
	//include the DAL library and create object
	include '../library/library.DAL.php';
	$DAL_Obj = new DAL_Library() ;
	
	//function to convert array into string separated by commas
	function convertArrayToString($val_array)
	{
		if( !empty($val_array) )
		{
			$val_str = "";
			
			foreach ($val_array as $val)
			{
					$val_str .= $val.",";
			}
			
			return substr($val_str, 0, -1);
		}
	}
	
	if( $_SERVER['REQUEST_METHOD'] == 'POST' )
	{
		$name = $_POST['name'] ;
		$course = $_POST['course'];
		$advisor = $_POST['advisor'] ;
		$session = $_POST['session'] ;
		$duration = $_POST['duration'] ;
		$details = $_POST['details'] ;
		$institute_id = $_POST['institute_id'];
		$created_by = $_POST['creator_name'];
		
	}
	
	//array to string
	$advisor_str = convertArrayToString($advisor);
	$course_str = convertArrayToString($course);
	
	//generate the course id
	$curriculum_id = "CUR".uniqid();
	
	if( !empty($name) && !empty($advisor_str) && !empty($course_str) && !empty($duration) && !empty($session) && !empty($institute_id) && !empty($created_by)  )
	{
		$insert_curriculum = array(
						'table' => 'curriculum_info' ,
						'values' => array(
										'curriculum_id' => $curriculum_id ,
										'institute_id' => $institute_id ,
										'created_by' => $created_by ,
										'created_on' => date('Y-m-d') ,
										'name' => $name ,
										'course' => $course_str ,
										'advisor' => $advisor_str ,
										'session' => $session ,
										'hours' => $duration ,
										'detail' => $details ,
										'curriculum_status' => 1
									)
						);
						
		$return = $DAL_Obj->insertValue($insert_curriculum);
		
		if( $return > 0 )
		{
			$result = "Curriculum Id: ".$curriculum_id."<br/>Curriculum addedd successfully.";
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
	header('Location: ../../create-curriculum.php');
?>
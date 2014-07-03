<?php
    session_start();
	//include the DAL library and create object
	include '../library/library.DAL.php';
	$DAL_Obj = new DAL_Library() ;
	
	if( !empty($_POST['student_status']))
	{
		$insert = array(
						'table' => 'student_status' ,
						'values' => array(
										'status_name' => $_POST['student_status'] 
									)
						);
						
		$DAL_Obj->insertValue($insert);
		
		$result = "Student Status addedd successfully.";
	}
	else
	{
		$result = "Please fill the form properly";	
	}
	
	//store the values in sessions
	$_SESSION['result'] = $result;
	
	//redirect
	header('Location: ../../create-student-status.php');
?>
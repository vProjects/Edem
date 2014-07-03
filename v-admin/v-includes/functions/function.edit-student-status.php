<?php
    session_start();
	//include the DAL library and create object
	include '../library/library.DAL.php';
	$DAL_Obj = new DAL_Library() ;
	
	if(isset($_POST['student_status']) && !empty($_POST['student_status']))
	{
		$update = $DAL_Obj->updateValueWhere('student_status','status_name',$_POST['student_status'],'id',$_POST['id']);
	}
	
	$result = "Student Status updated successfully.";
	//store the values in sessions
	$_SESSION['result'] = $result;
	
	//redirect
	header('Location: ../../edit-student-status.php?id='.$_POST['id']);
?>
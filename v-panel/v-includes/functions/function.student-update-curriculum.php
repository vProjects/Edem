<?php
    session_start();
	//include the DAL library and create object
	include '../library/library.DAL.php';
	$DAL_Obj = new DAL_Library() ;
	
	//get values using switch case
	switch ($GLOBALS['_POST']['op'])
	{
		case 'studentUpdateCurriculum':
		{
			$student_id = $GLOBALS['_POST']['studentid'];
			$srcYear = $GLOBALS['_POST']['fromyear'];
			$destYear = $GLOBALS['_POST']['toyear'];
			$curriculumId = $GLOBALS['_POST']['curriculumid'];
			echo "src year:".$srcYear."<br>";
			echo "dest year:".$destYear."<br>";
			echo "curriculumId:".$curriculumId."<br>";
			echo "studentId:".$student_id."<br>";
			break;
		}
		default:
		{
			break;
		}	
	}
	
	//store the values in sessions
	//$_SESSION['result'] = $result;
	
	//redirect
	//header('Location: ../../edit-curriculum.php?cid='.$GLOBALS['_POST']['user_id']);
?>
<?php
	session_start();
	//include the DAL library and create object
	include '../library/library.DAL.php';
	$DAL_Obj = new DAL_Library() ;
	$curriculumChangeInsert = array();
	$jsonData = $GLOBALS['_POST']['data'];
	$jsonData = stripslashes($jsonData);
	$json_decoded = json_decode($jsonData);
	$jsonCurriChangeData = $GLOBALS['_POST']['curriculumChangeData'];
	$jsonCurriChangeDataDecoded = json_decode($jsonCurriChangeData);
	
	//get the year change
	$yearChange = key($json_decoded);
	
	//get from year
	$fromYear = substr($yearChange, 0, 1);
		
	//get to year
	$toYear = substr($yearChange, 2, 1);
	
	//get curriculumId
	$curriculum_id = $json_decoded->$yearChange;
	
	//insert curriculum change log data into database
	$insert_change_log = array(
							'table' => 'curriculum_change_log' ,
							'values' => array(
											'user_id' =>	$_SESSION['user_id'],
											'curriculum_id' => $curriculum_id,
											'from_edulevel' => $fromYear,
											'to_edulevel' => $toYear,
											'user_ip' => $_SERVER['REMOTE_ADDR'],
											'datetime' => date('Y-m-d h:i:s A')
										)
						);
	$DAL_Obj->insertValue($insert_change_log);
	
	//inserting curriculum change data into database
	$courseNew_id = 'NCOU'.uniqid();
	
	//from stdobject to php array
	foreach ($jsonCurriChangeDataDecoded as $key => $value) {
		foreach ($value as $key1 => $value1) {
			$curriculumChangeInsert[$key][$key1] = $value1;
		}
	}
	
	//unset curriculum id from the from year
	foreach ($curriculumChangeInsert as $key2 => $value2) {
		if($key2 == $fromYear)
		{
			foreach($value2 as $key3 => $value3)
			{
				if($value3 == $curriculum_id)
				{
					unset($curriculumChangeInsert[$key2][$key3]);
				}
			}
		}
	}
	
	//inserting new curriculum id into the to year
	foreach ($curriculumChangeInsert as $key4 => $value4) {
		if($key4 == $toYear)
		{
			$curriculumChangeInsert[$key4][] = $curriculum_id;
		}
	}
	$freshmanCurriString = $sophomoreCurriString = $juniorCurriString = $seniorCurriString = $transferCurriString = $graduateCurriString = "";
	
	//making curriculum_id strings with respect to the edulevels
	foreach ($curriculumChangeInsert as $key5 => $value5) {
			if($key5 == 1)
			{
				foreach ($value5 as $key6 => $value6) {
					$freshmanCurriString = $freshmanCurriString.$value6.',';
				}
				$freshmanCurriString = rtrim($freshmanCurriString, ',');
			}
			if($key5 == 2)
			{
				foreach ($value5 as $key6 => $value6) {
					$sophomoreCurriString = $sophomoreCurriString.$value6.',';
				}
				$sophomoreCurriString = rtrim($sophomoreCurriString, ',');
			}
			if($key5 == 4)
			{
				foreach ($value5 as $key6 => $value6) {
					$juniorCurriString = $juniorCurriString.$value6.',';
				}
				$juniorCurriString = rtrim($juniorCurriString, ',');
			}
			if($key5 == 5)
			{
				foreach ($value5 as $key6 => $value6) {
					$seniorCurriString = $seniorCurriString.$value6.',';
				}
				$seniorCurriString = rtrim($seniorCurriString, ',');
			}
			if($key5 == 6)
			{
				foreach ($value5 as $key6 => $value6) {
					$transferCurriString = $transferCurriString.$value6.',';
				}
				$transferCurriString = rtrim($transferCurriString, ',');
			}
			if($key5 == 7)
			{
				foreach ($value5 as $key6 => $value6) {
					$graduateCurriString = $graduateCurriString.$value6.',';
				}
				$graduateCurriString = rtrim($graduateCurriString, ',');
			}
	}
		
	//checking if student has changed his curriculum or not
	$curriculum_change = $DAL_Obj->getValueWhere('curriculum_change', '*', 'student_id', $_SESSION['user_id']);
	if($curriculum_change == 0)
	{
		//inserting curriculum ids into their respective edulevels
		$studentData = $DAL_Obj->getValueWhere('students_info', '*', 'user_id', $_SESSION['user_id']);
		$studentCourseId = $studentData[0]['course_id'];
		$insert_curriculum_change = array(
										'table' => 'curriculum_change' ,
										'values' => array(
														'student_id' =>	$_SESSION['user_id'],
														'course_id' => $studentCourseId,
														'parent_curriculum_id' => $curriculum_id,
														'new_course_id' => $courseNew_id,
														'freshman' => $freshmanCurriString,
														'sophomore' => $sophomoreCurriString,
														'junior' => $juniorCurriString,
														'senior' => $seniorCurriString,
														'transfer' => $transferCurriString,
														'graduate' => $graduateCurriString,
													)
									);
		$DAL_Obj->insertValue($insert_curriculum_change);
	}
	else
	{
		$DAL_Obj->updateValueWhere('curriculum_change', 'parent_curriculum_id', $curriculum_id, 'student_id', $_SESSION['user_id']);
		$DAL_Obj->updateValueWhere('curriculum_change', 'new_course_id', $courseNew_id, 'student_id', $_SESSION['user_id']);
		$DAL_Obj->updateValueWhere('curriculum_change', 'freshman', $freshmanCurriString, 'student_id', $_SESSION['user_id']);
		$DAL_Obj->updateValueWhere('curriculum_change', 'sophomore', $sophomoreCurriString, 'student_id', $_SESSION['user_id']);
		$DAL_Obj->updateValueWhere('curriculum_change', 'junior', $juniorCurriString, 'student_id', $_SESSION['user_id']);
		$DAL_Obj->updateValueWhere('curriculum_change', 'senior', $seniorCurriString, 'student_id', $_SESSION['user_id']);
		$DAL_Obj->updateValueWhere('curriculum_change', 'transfer', $transferCurriString, 'student_id', $_SESSION['user_id']);
		$DAL_Obj->updateValueWhere('curriculum_change', 'graduate', $graduateCurriString, 'student_id', $_SESSION['user_id']);
	}		
	
		
?>

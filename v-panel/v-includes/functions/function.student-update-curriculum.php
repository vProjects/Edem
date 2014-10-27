<?php
	session_start();
	//include the DAL library and create object
	include '../library/library.DAL.php';
	$DAL_Obj = new DAL_Library() ;
	
	$jsonData = $GLOBALS['_POST']['data'];
	$jsonData = stripslashes($jsonData);
	$json_decoded = json_decode($jsonData);
	
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
	$curriculumNew_id = 'CUR'.uniqid();
	$studentData = $DAL_Obj->getValueWhere('students_info', '*', 'user_id', $_SESSION['user_id']);
	$studentCourseId = $studentData[0]['course_id'];
	$insert_curriculum_change = array(
									'table' => 'curriculum_change' ,
									'values' => array(
													'student_id' =>	$_SESSION['user_id'],
													'parent_curriculum_id' => $curriculum_id,
													'new_curriculum_id' => $curriculumNew_id,
													'freshman' => $freshmanCurriString,
													'sophomore' => $sophomoreCurriString,
													'junior' => $juniorCurriString,
													'senior' => $seniorCurriString,
													'transfer' => $transferCurriString,
													'graduate' => $graduateCurriString,
												)
								);
	$DAL_Obj->insertValue($insert_curriculum_change);
?>

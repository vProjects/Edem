<?php
	session_start();
	//include the DAL library and create object
	include '../library/library.DAL.php';
	$DAL_Obj = new DAL_Library() ;
	
	$jsonData = $GLOBALS["_POST"];
	$json_decoded = json_decode($jsonData['data'], 1);
	print_r($json_decoded);
	
	//get the year change
	$yearChange = key($json_decoded);
	//get from year
	$fromYear = substr($yearChange, 0, 1);	
	//get to year
	$toYear = substr($yearChange, 2, 1);
	echo $_SERVER['REMOTE_ADDR'];
	//get curriculumId
	$curriculum_id = $json_decoded[$yearChange];	
	//insert curriculum change log data into database
	$insert_change_log = array(
							'table' => 'curriculum_change_log' ,
							'values' => array(
											'user_id' =>	$_SESSION['user_id'],
											'curriculum_id' => $curriculum_id,
											'from_edulevel' => $fromYear,
											'to_edulevel' => $toYear,
											'user_ip' => $_SERVER['REMOTE_ADDR'],
											'datetime' => date('Y-m-d h:i:s')
										)
						);
	$DAL_Obj->insertValue($insert_change_log);
	
?>

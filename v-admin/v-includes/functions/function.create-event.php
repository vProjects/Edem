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
	
	//generate the user id
	$event_id = "EVENT".uniqid();
	
	//array to string for chair person
	$chairperson_str = convertArrayToString($_POST['chairperson']);
	
	//array to string for faculty
	$faculty_str = convertArrayToString($_POST['advisor']);
	
	//array to string for group
	$group_str = convertArrayToString($_POST['selected_grp']);
	
	
	if( !empty($_POST['name']) && $_POST['institute_id'] != -1 && !empty($_POST['date']) && !empty($_POST['time']) && $_POST['room'] != -1 && $_POST['duration'] && !empty($chairperson_str) && !empty($faculty_str) && !empty($group_str))
	{
		$insert = array(
						'table' => 'event_info' ,
						'values' => array(
										'event_id' => $event_id ,
										'event_name' => $_POST['name'] ,
										'institute_id' => $_POST['institute_id'] ,
										'group_id' => $group_str ,
										'room' => $_POST['room'] ,
										'date' => $_POST['date'] ,
										'time' => $_POST['time'] ,
										'chairperson_id' => $chairperson_str ,
										'faculty_id' => $faculty_str ,
										'duration' => $_POST['duration'] ,
										'created_by' => 'admin' ,
										'created_on' => date('Y-m-d') ,
										'event_status' => 1 
									)
						);
						
		$DAL_Obj->insertValue($insert);
		
		$result = "Event Id: ".$event_id."<br/>Event addedd successfully.";
	}
	else
	{
		$result = "Please fill the form properly";	
	}
	
	//store the values in sessions
	$_SESSION['result'] = $result;
	
	//redirect
	header('Location: ../../create-event.php');
?>
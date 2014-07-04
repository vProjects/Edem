<?php
    session_start();
	//include the DAL library and create object
	include '../library/library.DAL.php';
	$DAL_Obj = new DAL_Library() ;
	
	if( !empty($_POST['name']))
	{
		$insert = array(
						'table' => 'rooms' ,
						'values' => array(
										'institute_id' => $_SESSION['user_id'] ,
										'room_name' => $_POST['name'] 
									)
						);
						
		$DAL_Obj->insertValue($insert);
		
		$result = "Room addedd successfully.";
	}
	else
	{
		$result = "Please fill the form properly";	
	}
	
	//store the values in sessions
	$_SESSION['result'] = $result;
	
	//redirect
	header('Location: ../../create-room.php');
?>
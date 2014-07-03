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
	$group_id = "GRP".uniqid();
	
	//array to string for faculty
	$faculty_str = convertArrayToString($_POST['advisor']);
	
	//array to string for student
	$stu_str = convertArrayToString($_POST['selected_stu']);
	
	
	if( !empty($_POST['name']) && !empty($_POST['institute_id']) && !empty($faculty_str) && !empty($stu_str))
	{
		$insert = array(
						'table' => 'group_info' ,
						'values' => array(
										'group_id' => $group_id ,
										'group_name' => $_POST['name'] ,
										'institute_id' => $_POST['institute_id'] ,
										'created_by' => 'admin' ,
										'created_on' => date('Y-m-d') ,
										'faculty' => $faculty_str ,
										'students' => $stu_str ,
										'group_status' => 1 
									)
						);
						
		$DAL_Obj->insertValue($insert);
		
		$result = "Group Id: ".$group_id."<br/>Group addedd successfully.";
	}
	else
	{
		$result = "Please fill the form properly";	
	}
	
	//store the values in sessions
	$_SESSION['result'] = $result;
	
	//redirect
	header('Location: ../../create-group.php');
?>
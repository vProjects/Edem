<?php
    session_start();
	//include the DAL library and create object
	include '../library/library.DAL.php';
	$DAL_Obj = new DAL_Library() ;
	
	//getting user id
	$user_id = 'CHP53a31121c645d';
	//getting user credentials
	$user_cred = $DAL_Obj->getValueWhere('users','*','user_id',$user_id);
	if($user_cred[0]['user_type'] == 'institute')
	{
		$table_name = 'institute_info';
		$column_name = 'institute_id';
	}
	else if($user_cred[0]['user_type'] == 'faculty')
	{
		$table_name = 'faculty_info';
		$column_name = 'user_id';
	}
	else if($user_cred[0]['user_type'] == 'student')
	{
		$table_name = 'students_info';
		$column_name = 'user_id';
	}
	else if($user_cred[0]['user_type'] == 'chairperson')
	{
		$table_name = 'chairperson_info';
		$column_name = 'user_id';
	}
	//getting email id
	$user_info = $DAL_Obj->getValueWhere($table_name,'*',$column_name,$user_id);
	//getting date and time
	$curdate = date('y-m-d');
	$curtime = date('h:i:s a');
	//ticket status
	$status = 1;
	
	//inserting the values to database
	$insert_ticket = array(
						'table' => 'submit_ticket' ,
						'values' => array(
								'title' => $_POST['title'] ,
								'subject' => $_POST['subject'] ,
								'message' => $_POST['msg'] ,
								'email' => $user_info[0]['email'] ,
								'created_by' => $user_id ,
								'date' => date('y-m-d') ,
								'time' => date('h:i:s a') ,
								'status' => 1
						)
					);
	$DAL_Obj->insertValue($insert_ticket);
	
	$result = "Your Ticket Successfully Submitted.";
	
	//store the values in sessions
	$_SESSION['result'] = $result;
	
	//redirect
	header('Location: ../../submit-ticket.php');
?>
<?php
	//start session
	session_start();
	
	//include the DAL library
	include '../library/library.DAL.php';
	
	//create the database object
	$DAL_Obj = new DAL_Library();
	
	
	//declare the public variables
	$username = "";
	$password = "";
	$err_msg = "";
	$_index_redirect = 1;
	
	//get the values
	if( $_SERVER['REQUEST_METHOD'] == 'POST' )
	{
		$username = $_POST['uname'];
		$password = $_POST['password'];
	}
	
	if( !empty($username) && !empty($password) )
	{
		//get the password from the database
		$details_db = $DAL_Obj->getValueWhere('users','*','username',$username);
		
		if( $details_db[0]['password'] == $password )
		{
			if( $details_db[0]['user_status'] == 1 )
			{
				//set the session variables
				$_SESSION['user_id'] = $details_db[0]['user_id'];
				$_SESSION['type'] = $details_db[0]['user_type'];
				
				//set login expiry time
				$cookie_exp_time = time() + (2*24*3600);
				//set cookie for user login
				setcookie('course_management',$details_db[0]['user_id'],$cookie_exp_time,'/');
				
				//check the user_type and redirect
				if( $details_db[0]['user_type'] == 'admin' )
				{
					$_index_redirect = 0;	//#false
					
					header('Location: ../../v-admin/admin.php');
				}
				else
				{
					$_index_redirect = 0;	//#false
					
					header('Location: ../../v-panel/admin.php');
				}
			}
			else
			{
				$err_msg = "Account deactivated.";
			}
		}
		else
		{
			$err_msg = "Wrong username or password.";
		}
	}
	else
	{
		$err_msg = "Please fill the form.";	
	}
	
	if( $_index_redirect == 1 )
	{
		header('Location: ../../');
	}
	
?>
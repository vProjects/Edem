<?php
	session_start();
	
	//include the BLL library
	include 'v-includes/library/library.BLL.php';
	
	//create the BLL object to create the UI
	$BLL_Obj = new BLL_Library();
	
	//getting login credentails from cookie or session
	if(isset($GLOBALS['_COOKIE']['course_management']) && !isset($_SESSION['user_id']))
	{
		//getting user details
		$userInfo = $BLL_Obj->setUserCredentials($GLOBALS['_COOKIE']['course_management']);
		$_SESSION['user_id'] = $GLOBALS['_COOKIE']['course_management'];
		$_SESSION['type'] = $userInfo[0]['user_type'];
	}
	else if(!isset($GLOBALS['_COOKIE']['course_management']) && isset($_SESSION['user_id']))
	{
		//set login expiry time
		$cookie_exp_time = time() + (2*24*3600);
		//set cookie for user login
		setcookie('course_management',$_SESSION['user_id'],$cookie_exp_time,'/');
	}
	
	//including config file
	include 'v-templates/user-config.php';
?>
<?php
	session_start();
	unset($_SESSION['user_id']);
	unset($_SESSION['type']);
	//unset the user id cookie
	setcookie('course_management','',time() - 3600,'/');
	
	header("Location: ../../index.php");
?>
<?php
	//checking for user type
	if($_SESSION['type'] == 'student')
	{
		$level = 1;
	}
	else if($_SESSION['type'] == 'faculty')
	{
		$level = 2;
	}
	else if($_SESSION['type'] == 'chairperson')
	{
		$level = 3;
	}
	else if($_SESSION['type'] == 'institute')
	{
		$level = 4;
	}
	
?>
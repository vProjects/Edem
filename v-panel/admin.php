<?php
	$title = 'Dashboard';
	//checking for login status
	if(!isset($GLOBALS['_COOKIE']['course_management']) && !isset($_SESSION['user_id']))
	{
		header("Location: ../index.php");
	}
	//include the template files
	include 'v-templates/header.php';
	include 'v-templates/header-text.php';
	include 'v-templates/sidebar.php';
?>
<?php
	//footer
	include 'v-templates/footer.php';
?>
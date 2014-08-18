<?php
	//include the template files
	include 'v-templates/header.php';
	
	$eventJson = $BLL_Obj->getEventJson($_SESSION['user_id'],$_SESSION['type']);
	echo $eventJson;
	
	
?>

<?php
	
	include 'v-includes/class/class.DAL.php';
	
	$manage_content = new ManageContent_DAL();
	
	$table_name = 'chairperson_info';
	
	$institute__list_info = $this->manage_content(ManageContent_DAL);
	
?>
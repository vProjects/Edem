<?php

	include 'v-includes/class/class.DAL.php';

	$manage_content = new ManageContent_DAL();

	$table_name = 'curriculum_info';

		$curid_cur_info=$_POST['curid_cur_info'];
		$userid_cur_info=$_POST['userid_cur_info'];
		$name_cur_info=$_POST['name_cur_info'];
		$sem_cur_info=$_POST['sem_cur_info'];
		$session_cur_info=$_POST['session_cur_info'];
		$cur_status_cur_info=$_POST['cur_status_cur_info'];

		$column_name = array('curriculum_id','user_id','name','semester','session','curriculum_status');
		$column_values = array($curid_cur_info,$userid_cur_info,$name_cur_info,$sem_cur_info,$session_cur_info,$cur_status_cur_info);

		$insertInstitute_info = $manage_content->insertValue($table_name,$column_name,$column_values);

?>
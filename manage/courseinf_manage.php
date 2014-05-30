<?php

	include 'v-includes/class/class.DAL.php';

	$manage_content = new ManageContent_DAL();

	$table_name = 'course_info';

		$courseid_course_info=$_POST['courseid_course_info'];
		$curriculumid_course_info=$_POST['curriculumid_course_info'];
		$name_course_info=$_POST['name_course_info'];
		$session_course_info=$_POST['session_course_info'];
		$hours_course_info=$_POST['hours_course_info'];
		$course_status_course_info=$_POST['course_status_course_info'];

		$column_name = array('course_id','curriculum_id','name','session','hours','course_status');
		$column_values = array($courseid_course_info,$curriculumid_course_info,$name_course_info,$session_course_info,$hours_course_info,$course_status_course_info);

		$insertInstitute_info = $manage_content->insertValue($table_name,$column_name,$column_values);

?>
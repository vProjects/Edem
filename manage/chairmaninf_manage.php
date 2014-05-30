<?php

	include 'v-includes/class/class.DAL.php';

	$manage_content = new ManageContent_DAL();

	$table_name = 'chairperson_info';

		$userid_chper_info=$_POST['userid_chper_info'];
		$instituteid_chper_info=$_POST['instituteid_chper_info'];
		$curriculumid_chper_info=$_POST['curriculumid_chper_info'];
		$name_chper_info=$_POST['name_chper_info'];
		$address1_chper_info=$_POST['address1_chper_info'];
		$address2_chper_info=$_POST['address2_chper_info'];
		$mobile_chper_info=$_POST['mobile_chper_info'];
		$city_chper_info=$_POST['city_chper_info'];
		$states_chper_info=$_POST['states_chper_info'];
		$country_chper_info=$_POST['country_chper_info'];
		$division_chper_info=$_POST['division_chper_info'];
		$chairman_status_chper_info=$_POST['chairman_status_chper_info'];

		$column_name = array('user_id','institute_id','curriculum_id','name','address_|_1','address_|_2','mobile','city','state','country','division','chairman_status');
		$column_values = array($userid_chper_info,$instituteid_chper_info,$curriculumid_chper_info,$name_chper_info,$address1_chper_info,$address2_chper_info,$mobile_chper_info,$city_chper_info,$states_chper_info,$country_chper_info,$division_chper_info,$chairman_status_chper_info);

		$insertInstitute_info = $manage_content->insertValue($table_name,$column_name,$column_values);

?>
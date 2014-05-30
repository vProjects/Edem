<?php

	include 'v-includes/class/class.DAL.php';

	$manage_content = new ManageContent_DAL();

	$table_name = 'institute_info';

		$name_inst_info=$_POST['name_inst_info'];
		$instituteid_inst_info=$_POST['instituteid_inst_info'];
		$institutetype_inst_info=$_POST['institutetype_inst_info'];
		$address1_inst_info=$_POST['address1_inst_info'];
		$address2_inst_info=$_POST['address2_inst_info'];
		$mobile_inst_info=$_POST['mobile_inst_info'];
		$city_inst_info=$_POST['city_inst_info'];
		$states_inst_info=$_POST['states_inst_info'];
		$country_inst_info=$_POST['country_inst_info'];
		$institute_status_institute_info=$_POST['institute_status_institute_info'];

		$column_name = array('name','institute_id','institute_type','address_|_1','address_|_2','mobile','city','state','country','institute_status');
		$column_values = array($name_inst_info,$instituteid_inst_info,$institutetype_inst_info,$address1_inst_info,$address2_inst_info,$mobile_inst_info,$city_inst_info,$states_inst_info,$country_inst_info,$institute_status_institute_info);

		$insertInstitute_info = $manage_content->insertValue($table_name,$column_name,$column_values);

?>
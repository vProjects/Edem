<?php

	include 'v-includes/class/class.DAL.php';

	$manage_content = new ManageContent_DAL();

	$table_name = 'event_info';

		$eventid_event_info=$_POST['eventid_event_info'];
		$instituteid_event_info=$_POST['instituteid_event_info'];
		$groupid_event_info=$_POST['groupid_event_info'];
		$date_event_info=$_POST['date_event_info'];
		$time_event_info=$_POST['time_event_info'];
		$chairpersonid_event_info=$_POST['chairpersonid_event_info'];
		$teacherid_event_info=$_POST['teacherid_event_info'];
		$duration_event_info=$_POST['duration_event_info'];
		$event_status_event_info=$_POST['event_status_event_info'];

		$column_name = array('event_id','institute_id','group_id','date','time','chairperson_id','teacher_id','duration','event_status');
		$column_values = array($eventid_event_info,$instituteid_event_info,$groupid_event_info,$date_event_info,$time_event_info,$chairpersonid_event_info,$teacherid_event_info,$duration_event_info,$event_status_event_info);

		$insertInstitute_info = $manage_content->insertValue($table_name,$column_name,$column_values);

?>
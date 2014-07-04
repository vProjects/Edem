<?php
    session_start();
	//include the DAL library and create object
	include '../library/library.DAL.php';
	$DAL_Obj = new DAL_Library() ;
	
	//function to convert array into string separated by commas
	function convertArrayToString($val_array)
	{
		if( !empty($val_array) )
		{
			$val_str = "";
			
			foreach ($val_array as $val)
			{
					$val_str .= $val.",";
			}
			
			return substr($val_str, 0, -1);
		}
	}
	
	//get values using switch case
	switch ($GLOBALS['_POST']['op'])
	{
		case 'eve_info':
		{
			$event_id = $GLOBALS['_POST']['event_id'];
			if(isset($_POST['name']) && !empty($_POST['name']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('event_info','event_name',$_POST['name'],'event_id',$event_id);
			}
			if(isset($_POST['institute_id']) && !empty($_POST['institute_id']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('event_info','institute_id',$_POST['institute_id'],'event_id',$event_id);
			}
			if(isset($_POST['date']) && !empty($_POST['date']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('event_info','date',$_POST['date'],'event_id',$event_id);
			}
			if(isset($_POST['time']) && !empty($_POST['time']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('event_info','time',$_POST['time'],'event_id',$event_id);
			}
			if(isset($_POST['chairperson']) && !empty($_POST['chairperson']))
			{
				//get chair person list
				$chairperson_str = convertArrayToString($_POST['chairperson']);
				$upd1 = $DAL_Obj->updateValueWhere('event_info','chairperson_id',$chairperson_str,'event_id',$event_id);
			}
			if(isset($_POST['advisor']) && !empty($_POST['advisor']))
			{
				//get advisor list
				$advisor_str = convertArrayToString($_POST['advisor']);
				$upd1 = $DAL_Obj->updateValueWhere('event_info','faculty_id',$advisor_str,'event_id',$event_id);
			}
			if(isset($_POST['room']) && !empty($_POST['room']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('event_info','room',$_POST['room'],'event_id',$event_id);
			}
			if(isset($_POST['duration']) && !empty($_POST['duration']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('event_info','duration',$_POST['duration'],'event_id',$event_id);
			}
			if(isset($_POST['selected_grp']) && !empty($_POST['selected_grp']))
			{
				//get advisor list
				$grp_str = convertArrayToString($_POST['selected_grp']);
				$upd1 = $DAL_Obj->updateValueWhere('event_info','group_id',$grp_str,'event_id',$event_id);
			}
			
			break;
		}
		default:
		{
			break;
		}	
	}
	
	//store the values in sessions
	//$_SESSION['result'] = $result;
	
	//redirect
	header('Location: ../../edit-event.php?eid='.$GLOBALS['_POST']['event_id']);
?>
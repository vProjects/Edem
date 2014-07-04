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
		case 'grp_info':
		{
			$group_id = $GLOBALS['_POST']['group_id'];
			if(isset($_POST['name']) && !empty($_POST['name']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('group_info','group_name',$_POST['name'],'group_id',$group_id);
			}
			if(isset($_POST['institute_id']) && !empty($_POST['institute_id']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('group_info','institute_id',$_POST['institute_id'],'group_id',$group_id);
			}
			if(isset($_POST['advisor']) && !empty($_POST['advisor']))
			{
				//get advisor list
				$advisor_str = convertArrayToString($_POST['advisor']);
				$upd1 = $DAL_Obj->updateValueWhere('group_info','faculty',$advisor_str,'group_id',$group_id);
			}
			if(isset($_POST['selected_stu']) && !empty($_POST['selected_stu']))
			{
				//get student list
				$stu_str = convertArrayToString($_POST['selected_stu']);
				$upd1 = $DAL_Obj->updateValueWhere('group_info','students',$stu_str,'group_id',$group_id);
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
	header('Location: ../../edit-group.php?gid='.$GLOBALS['_POST']['group_id']);
?>
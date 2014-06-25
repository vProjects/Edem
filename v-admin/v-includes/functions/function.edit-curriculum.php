<?php
    session_start();
	//include the DAL library and create object
	include '../library/library.DAL.php';
	$DAL_Obj = new DAL_Library() ;
	
	//get values using switch case
	switch ($GLOBALS['_POST']['op'])
	{
		case 'cur_info':
		{
			$user_id = $GLOBALS['_POST']['user_id'];
			if(isset($_POST['name']) && !empty($_POST['name']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('curriculum_info','name',$_POST['name'],'curriculum_id',$user_id);
			}
			if(isset($_POST['course']) && !empty($_POST['course']))
			{
				$course = $_POST['course'];
				//initialize the variable
				$course_string = "" ;
				
				if( !empty($course) )
				{
					foreach ($course as $val)
					{
							$course_string .= $val.",";
					}
					
					$course_string = substr($course_string, 0, -1);
				}
				$upd1 = $DAL_Obj->updateValueWhere('curriculum_info','course',$course_string,'curriculum_id',$user_id);
			}
			if(isset($_POST['advisor']) && !empty($_POST['advisor']))
			{
				$advisor = $_POST['advisor'];
				//initialize the variable
				$advisor_string = "" ;
				
				if( !empty($advisor) )
				{
					foreach ($advisor as $val)
					{
							$advisor_string .= $val.",";
					}
					
					$advisor_string = substr($advisor_string, 0, -1);
				}
				$upd1 = $DAL_Obj->updateValueWhere('curriculum_info','advisor',$advisor_string,'curriculum_id',$user_id);
			}
			if(isset($_POST['institute_id']) && !empty($_POST['institute_id']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('curriculum_info','institute_id',$_POST['institute_id'],'curriculum_id',$user_id);
			}
			if(isset($_POST['session']) && !empty($_POST['session']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('curriculum_info','session',$_POST['session'],'curriculum_id',$user_id);
			}
			if(isset($_POST['duration']) && !empty($_POST['duration']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('curriculum_info','hours',$_POST['duration'],'curriculum_id',$user_id);
			}
			if(isset($_POST['details']) && !empty($_POST['details']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('curriculum_info','detail',$_POST['details'],'curriculum_id',$user_id);
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
	header('Location: ../../edit-curriculum.php?cid='.$GLOBALS['_POST']['user_id']);
?>
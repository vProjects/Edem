<?php
    session_start();
	//include the DAL library and create object
	include '../library/library.DAL.php';
	$DAL_Obj = new DAL_Library() ;
	
	//get values using switch case
	switch ($GLOBALS['_POST']['op'])
	{
		case 'cou_info':
		{
			$user_id = $GLOBALS['_POST']['user_id'];
			if(isset($_POST['name']) && !empty($_POST['name']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('course_info','name',$_POST['name'],'course_id',$user_id);
			}
			if(isset($_POST['course_no']) && !empty($_POST['course_no']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('course_info','course_no',$_POST['course_no'],'course_id',$user_id);
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
				$upd1 = $DAL_Obj->updateValueWhere('course_info','advisor',$advisor_string,'course_id',$user_id);
			}
			if(isset($_POST['details']) && !empty($_POST['details']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('course_info','detail',$_POST['details'],'course_id',$user_id);
			}
			if(isset($_POST['announcement_title']) && !empty($_POST['announcement_title']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('course_info','announcement_title',$_POST['announcement_title'],'course_id',$user_id);
			}
			if(isset($_POST['institute_id']) && !empty($_POST['institute_id']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('course_info','institute_id',$_POST['institute_id'],'course_id',$user_id);
			}
			if(isset($_POST['edu_level']) && !empty($_POST['edu_level']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('course_info','edu_level',$_POST['edu_level'],'course_id',$user_id);
			}
			if(isset($_POST['availability']) && !empty($_POST['availability']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('course_info','availability',$_POST['availability'],'course_id',$user_id);
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
	header('Location: ../../edit-course.php?cid='.$GLOBALS['_POST']['user_id']);
?>
<?php
    session_start();
	//include the DAL library and create object
	include '../library/library.DAL.php';
	$DAL_Obj = new DAL_Library() ;
	
	//get values using switch case
	switch ($GLOBALS['_POST']['op'])
	{
		case 'fac_info':
		{
			$user_id = $GLOBALS['_POST']['user_id'];
			if(isset($_POST['f_name']) && !empty($_POST['f_name']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('faculty_info','f_name',$_POST['f_name'],'user_id',$user_id);
			}
			if(isset($_POST['m_name']) && !empty($_POST['m_name']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('faculty_info','m_name',$_POST['m_name'],'user_id',$user_id);
			}
			if(isset($_POST['l_name']) && !empty($_POST['l_name']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('faculty_info','l_name',$_POST['l_name'],'user_id',$user_id);
			}
			if(isset($_POST['suffix']) && !empty($_POST['suffix']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('faculty_info','suffix',$_POST['suffix'],'user_id',$user_id);
			}
			if(isset($_POST['o_name']) && !empty($_POST['o_name']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('faculty_info','o_name',$_POST['o_name'],'user_id',$user_id);
			}
			if(isset($_POST['email']) && !empty($_POST['email']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('faculty_info','email',$_POST['email'],'user_id',$user_id);
			}
			if(isset($_POST['institute']) && !empty($_POST['institute']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('faculty_info','institute_id',$_POST['institute'],'user_id',$user_id);
			}
			if(isset($_POST['dob']) && !empty($_POST['dob']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('faculty_info','dob',$_POST['dob'],'user_id',$user_id);
			}
			if(isset($_POST['gender']) && !empty($_POST['gender']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('faculty_info','gender',$_POST['gender'],'user_id',$user_id);
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
				$upd1 = $DAL_Obj->updateValueWhere('faculty_info','course',$course_string,'user_id',$user_id);
			}
			if(isset($_POST['department']) && !empty($_POST['department']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('faculty_info','department',$_POST['department'],'user_id',$user_id);
			}
			if(isset($_POST['street_1']) && !empty($_POST['street_1']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('faculty_info','street_1',$_POST['street_1'],'user_id',$user_id);
			}
			if(isset($_POST['street_2']) && !empty($_POST['street_2']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('faculty_info','street_2',$_POST['street_2'],'user_id',$user_id);
			}
			if(isset($_POST['country']) && !empty($_POST['country']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('faculty_info','country',$_POST['country'],'user_id',$user_id);
			}
			if(isset($_POST['state']) && !empty($_POST['state']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('faculty_info','state',$_POST['state'],'user_id',$user_id);
			}
			if(isset($_POST['city']) && !empty($_POST['city']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('faculty_info','city',$_POST['city'],'user_id',$user_id);
			}
			if(isset($_POST['postal_code']) && !empty($_POST['postal_code']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('faculty_info','postal_code',$_POST['postal_code'],'user_id',$user_id);
			}
			if(isset($_POST['website']) && !empty($_POST['website']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('faculty_info','website',$_POST['website'],'user_id',$user_id);
			}
			if(isset($_POST['home_phone']) && !empty($_POST['home_phone']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('faculty_info','home_phone',$_POST['home_phone'],'user_id',$user_id);
			}
			if(isset($_POST['work_phone']) && !empty($_POST['work_phone']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('faculty_info','work_phone',$_POST['work_phone'],'user_id',$user_id);
			}
			if(isset($_POST['work_fax']) && !empty($_POST['work_fax']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('faculty_info','work_fax',$_POST['work_fax'],'user_id',$user_id);
			}
			if(isset($_POST['cellular_phone']) && !empty($_POST['cellular_phone']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('faculty_info','cellular_phone',$_POST['cellular_phone'],'user_id',$user_id);
			}
			break;
		}
		case 'fac_cred':
		{
			$user_id = $GLOBALS['_POST']['user_id'];
			//get old password
			$old_pass = $DAL_Obj->getValueWhere('users','*','user_id',$user_id);
			if($old_pass[0]['password'] == $_POST['old_password'])
			{
				if($_POST['new_password'] == $_POST['con_password'])
				{
					$upd1 = $DAL_Obj->updateValueWhere('users','password',$_POST['new_password'],'user_id',$user_id);
				}
				else
				{
					$_SESSION['result'] = 'Password Is Not Matched';
				}
			}
			else
			{
				$_SESSION['result'] = 'Old Password Is Not Matched';
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
	header('Location: ../../edit-faculty.php?uid='.$GLOBALS['_POST']['user_id']);
?>
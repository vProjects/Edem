<?php
    session_start();
	//include the DAL library and create object
	include '../library/library.DAL.php';
	$DAL_Obj = new DAL_Library() ;
	
	//get values using switch case
	switch ($GLOBALS['_POST']['op'])
	{
		case 'stu_info':
		{
			$user_id = $GLOBALS['_POST']['user_id'];
			if(isset($_POST['name']) && !empty($_POST['name']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('students_info','name',$_POST['name'],'user_id',$user_id);
			}
			if(isset($_POST['email']) && !empty($_POST['email']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('students_info','email',$_POST['email'],'user_id',$user_id);
			}
			if(isset($_POST['institute']) && !empty($_POST['institute']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('students_info','institute_id',$_POST['institute'],'user_id',$user_id);
			}
			if(isset($_POST['dob']) && !empty($_POST['dob']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('students_info','dob',$_POST['dob'],'user_id',$user_id);
			}
			if(isset($_POST['sex']) && !empty($_POST['sex']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('students_info','sex',$_POST['sex'],'user_id',$user_id);
			}
			if(isset($_POST['mobile']) && !empty($_POST['mobile']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('students_info','mobile',$_POST['mobile'],'user_id',$user_id);
			}
			if(isset($_POST['curriculum']) && !empty($_POST['curriculum']))
			{
				$curriculum = $_POST['curriculum'];
				//initialize the variable
				$curriculum_string = "" ;
				
				if( !empty($curriculum) )
				{
					foreach ($curriculum as $val)
					{
							$curriculum_string .= $val.",";
					}
					
					$curriculum_string = substr($curriculum_string, 0, -1);
				}
				$upd1 = $DAL_Obj->updateValueWhere('students_info','curriculum_id',$curriculum_string,'user_id',$user_id);
			}
			if(isset($_POST['session']) && !empty($_POST['session']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('students_info','session',$_POST['session'],'user_id',$user_id);
			}
			if(isset($_POST['joining_date']) && !empty($_POST['joining_date']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('students_info','joining_date',$_POST['joining_date'],'user_id',$user_id);
			}
			if(isset($_POST['address_l_1']) && !empty($_POST['address_l_1']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('students_info','address_l_1',$_POST['address_l_1'],'user_id',$user_id);
			}
			if(isset($_POST['address_l_2']) && !empty($_POST['address_l_2']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('students_info','address_l_2',$_POST['address_l_2'],'user_id',$user_id);
			}
			if(isset($_POST['country']) && !empty($_POST['country']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('students_info','country',$_POST['country'],'user_id',$user_id);
			}
			if(isset($_POST['state']) && !empty($_POST['state']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('students_info','state',$_POST['state'],'user_id',$user_id);
			}
			if(isset($_POST['city']) && !empty($_POST['city']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('students_info','city',$_POST['city'],'user_id',$user_id);
			}
			if(isset($_POST['postal_code']) && !empty($_POST['postal_code']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('students_info','postal_code',$_POST['postal_code'],'user_id',$user_id);
			}
			break;
		}
		case 'stu_cred':
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
	header('Location: ../../edit-student.php?uid='.$GLOBALS['_POST']['user_id']);
?>
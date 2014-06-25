<?php
    session_start();
	//include the DAL library and create object
	include '../library/library.DAL.php';
	$DAL_Obj = new DAL_Library() ;
	
	//get values using switch case
	switch ($GLOBALS['_POST']['op'])
	{
		case 'ins_info':
		{
			$user_id = $GLOBALS['_POST']['user_id'];
			if(isset($_POST['name']) && !empty($_POST['name']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('institute_info','name',$_POST['name'],'institute_id',$user_id);
			}
			if(isset($_POST['email']) && !empty($_POST['email']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('institute_info','email',$_POST['email'],'institute_id',$user_id);
			}
			if(isset($_POST['mobile']) && !empty($_POST['mobile']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('institute_info','mobile',$_POST['mobile'],'institute_id',$user_id);
			}
			if(isset($_POST['address_l_1']) && !empty($_POST['address_l_1']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('institute_info','address_l_1',$_POST['address_l_1'],'institute_id',$user_id);
			}
			if(isset($_POST['address_l_2']) && !empty($_POST['address_l_2']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('institute_info','address_l_2',$_POST['address_l_2'],'institute_id',$user_id);
			}
			if(isset($_POST['country']) && !empty($_POST['country']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('institute_info','country',$_POST['country'],'institute_id',$user_id);
			}
			if(isset($_POST['state']) && !empty($_POST['state']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('institute_info','state',$_POST['state'],'institute_id',$user_id);
			}
			if(isset($_POST['city']) && !empty($_POST['city']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('institute_info','city',$_POST['city'],'institute_id',$user_id);
			}
			if(isset($_POST['postal_code']) && !empty($_POST['postal_code']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('institute_info','postal_code',$_POST['postal_code'],'institute_id',$user_id);
			}
			break;
		}
		case 'ins_cred':
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
	header('Location: ../../edit-institute.php?uid='.$GLOBALS['_POST']['user_id']);
?>
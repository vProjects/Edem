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
			if(isset($_POST['street_1']) && !empty($_POST['street_1']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('institute_info','street_1',$_POST['street_1'],'institute_id',$user_id);
			}
			if(isset($_POST['street_2']) && !empty($_POST['street_2']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('institute_info','street_2',$_POST['street_2'],'institute_id',$user_id);
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
			if(isset($_POST['website']) && !empty($_POST['website']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('institute_info','website',$_POST['website'],'institute_id',$user_id);
			}
			if(isset($_POST['home_phone']) && !empty($_POST['home_phone']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('institute_info','home_phone',$_POST['home_phone'],'institute_id',$user_id);
			}
			if(isset($_POST['work_phone']) && !empty($_POST['work_phone']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('institute_info','work_phone',$_POST['work_phone'],'institute_id',$user_id);
			}
			if(isset($_POST['work_fax']) && !empty($_POST['work_fax']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('institute_info','work_fax',$_POST['work_fax'],'institute_id',$user_id);
			}
			if(isset($_POST['cellular_phone']) && !empty($_POST['cellular_phone']))
			{
				$upd1 = $DAL_Obj->updateValueWhere('institute_info','cellular_phone',$_POST['cellular_phone'],'institute_id',$user_id);
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
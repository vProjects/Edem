<?php
    session_start();
	//include the DAL library and create object
	include '../library/library.DAL.php';
	$DAL_Obj = new DAL_Library() ;
	
	if( $_SERVER['REQUEST_METHOD'] == 'POST' )
	{
		$f_name = $_POST['f_name'] ;
		$m_name = $_POST['m_name'] ;
		$l_name = $_POST['l_name'] ;
		$suffix = $_POST['suffix'] ;
		$o_name = $_POST['o_name'] ;
		$email = $_POST['email'] ;
		$dob = $_POST['dob'] ;
		$institute = $_POST['institute'] ;
		$edu_level = $_POST['edu_level'] ;
		$gender = $_POST['gender'] ;
		$department = $_POST['department'] ;
		$street_1 = $_POST['street_1'] ;
		$street_2 = $_POST['street_2'] ;
		$city = $_POST['city'] ;
		$state = $_POST['state'] ;
		$country = $_POST['country'] ;
		$postal_code = $_POST['postal_code'] ;
		
		//new fields added later
		$website = $_POST['website'] ;
		$home_phone = $_POST['home_phone'] ;
		$work_phone = $_POST['work_phone'] ;
		$work_fax = $_POST['work_fax'] ;
		$cellular_phone = $_POST['cellular_phone'] ;
		
		//username and the password
		$username = $_POST['username'];
		$password = $_POST['password'];
		$r_password = $_POST['r_password'];
	}
	
	//generate the user id
	$user_id = "CHR".uniqid();
	
	//codes for inserting the username and password of the institute
	if(!empty($username) && !empty($password) && !empty($r_password))
	{
		if( $password == $r_password )
		{
			$insert_user = array(
						'table' => 'users' ,
						'values' => array(
								'username' => $username ,
								'user_id' => $user_id ,
								'password' => $password ,
								'date' => date('Y-m-d') ,
								'user_type' => 'chairperson' ,
								'user_status' => 1
						)
					);
			$query_result = $DAL_Obj->insertValue($insert_user);
		}
	} 
	
	if( !empty($f_name) && !empty($email) && !empty($user_id) && ($query_result >= 1))
	{
		$insert_chairperson = array(
						'table' => 'chairperson_info' ,
						'values' => array(
										'user_id' => $user_id ,
										'institute_id' => $institute ,
										'curriculum_id' => "" ,
										'f_name' => $f_name ,
										'm_name' => $m_name ,
										'l_name' => $l_name ,
										'suffix' => $suffix ,
										'o_name' => $o_name ,
										'email' => $email ,
										'dob' => $dob ,
										'edu_level' => $edu_level ,
										'gender' => $gender ,
										'department' => $department ,
										'street_1' => $street_1 ,
										'street_2' => $street_2 ,
										'city' => $city ,
										'state' => $state ,
										'country' => $country ,
										'postal_code' => $postal_code ,
										'website' => $website ,
										'home_phone' => $home_phone ,
										'work_phone' => $work_phone ,
										'work_fax' => $work_fax ,
										'home_phone' => $home_phone ,
										'cellular_phone' => $cellular_phone ,
										'chairperson_status' => 1 ,
										'status' => 1
									)
						);
		
		$DAL_Obj->insertValue($insert_chairperson);
		
		$result = "Chairperson Id: ".$user_id."<br/>Chairperson addedd successfully.";
	}
	else
	{
		$result = "Please fill the form properly";	
	}
	
	//store the values in sessions
	$_SESSION['result'] = $result;
	
	//redirect
	header('Location: ../../create-chairperson.php');
?>
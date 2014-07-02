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
	
	if( $_SERVER['REQUEST_METHOD'] == 'POST' )
	{
		$name = $_POST['name'] ;
		$email = $_POST['email'] ;
		$institute = $_POST['institute'] ;
		$dob = $_POST['dob'] ;
		$sex = $_POST['sex'] ;
		$joining_date = $_POST['joining_date'] ;
		$division = $_POST['division'] ;
		$course = $_POST['course'];
		$mobile = $_POST['mobile'] ;
		$address_l_1 = $_POST['address_l_1'] ;
		$address_l_2 = $_POST['address_l_2'] ;
		$city = $_POST['city'] ;
		$state = $_POST['state'] ;
		$country = $_POST['country'] ;
		$postal_code = $_POST['postal_code'] ;
		
		//username and the password
		$username = $_POST['username'];
		$password = $_POST['password'];
		$r_password = $_POST['r_password'];
	}
	//array to string
	$course_str = convertArrayToString($course);

	//generate the user id
	$user_id = "CHP".uniqid();
	
	//initialize the variables
	$username_insert_flg = 0 ;
	
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
			$DAL_Obj->insertValue($insert_user);		
			$username_insert_flg = 1;
		}
	} 
	
	if( !empty($name) && !empty($email) && !empty($mobile) && !empty($user_id) && ($username_insert_flg == 1))
	{
		$insert_cp = array(
						'table' => 'chairperson_info' ,
						'values' => array(
										'user_id' => $user_id ,
										'institute_id' => $institute ,
										'name' => $name ,
										'email' => $email ,
										'dob' => $dob ,
										'sex' => $sex ,
										'mobile' => $mobile ,
										'course' => $course_str ,
										'division' => $division ,
										'joining_date' => $joining_date ,
										'address_l_1' => $address_l_1 ,
										'address_l_2' => $address_l_2 ,
										'city' => $city ,
										'state' => $state ,
										'country' => $country ,
										'postal_code' => $postal_code ,
										'chairman_status' => 1
									)
						);
						
		$DAL_Obj->insertValue($insert_cp);
		
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
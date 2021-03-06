<?php
	session_start();
	//include the DAL library and create object
	include '../library/library.DAL.php';
	$DAL_Obj = new DAL_Library() ;
	
	if( $_SERVER['REQUEST_METHOD'] == 'POST' )
	{
		$name = $_POST['name'] ;
		$email = $_POST['email'] ;
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
		
	
	//generate the institute id
	$institute_id = "INS".uniqid();
	
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
								'user_id' => $institute_id ,
								'password' => $password ,
								'date' => date('Y-m-d') ,
								'user_type' => 'institute' ,
								'user_status' => 1
						)
					);
			$DAL_Obj->insertValue($insert_user);		
			$username_insert_flg = 1;
		}
	} 
	
	if( !empty($name) && !empty($email) && !empty($mobile) && !empty($institute_id) && ($username_insert_flg == 1))
	{
		$insert_institute = array(
						'table' => 'institute_info' ,
						'values' => array(
										'name' => $name ,
										'institute_id' => $institute_id ,
										'email' => $email ,
										'address_l_1' => $address_l_1 ,
										'address_l_2' => $address_l_2 ,
										'mobile' => $mobile ,
										'city' => $city ,
										'state' => $state ,
										'country' => $country ,
										'postal_code' => $postal_code ,
										'institute_status' => 1
									)
						);
						
		$DAL_Obj->insertValue($insert_institute);
		
		$result = "Institute Id: ".$institute_id."<br/>Institute addedd successfully.";
	}
	else
	{
		$result = "Please fill the form properly";	
	}
	
	//store the values in sessions
	$_SESSION['result'] = $result;
	
	//redirect
	header('Location: ../../create-institute.php');
?>
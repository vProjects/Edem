<?php
    session_start();
	//include the DAL library and create object
	include '../library/library.DAL.php';
	$DAL_Obj = new DAL_Library() ;
	
	switch ($_POST['action']) {
		
		case 'chairpersonFile':
			
			if(!empty($_FILES['chrInfoFile']['name']))
			{
				//include the phpexcel file
				include '../library/library.InsertExcel.php';
				$insert_excel_obj = new Insert_Excel_Library();
				//include the class upload file 
				include '../library/class.upload_file.php';
			    $upload = new FileUpload();
				//declaring the path to upload
				$path = "../../../phpexcel/excelfiles/admin_excel/";
				//getting filename without extension
				$fileName = explode('.', $_FILES['chrInfoFile']['name']);
				$desired_file_name = $fileName[0];
				//uploading the file with desired filename and desired path
				$upload->upload_file($desired_file_name, $_FILES['chrInfoFile'], $path);
				//copying contents from file to database
				//declaring the table name
				$tablename = "chairperson_info";
				// //declaring the column names
				$column_names_arr = array('First Name','Middle Name','Last Name','Suffix',
											 'Other Name','Email','DOB(YYYY-MM-DD)','Gender',
											'Department','Street 1','Street 2','City','State','Country',
											'Postal Code','Website','Home Phone','Work Phone','Work Fax','Cellular Phone',
											'User Name','Password');
				//declaring filename with path
				$inputFileNameWithPath = $path.$_FILES['chrInfoFile']['name'];
				//inserting file contents into database
				$result = $insert_excel_obj->insertExcelChairperson($tablename, $column_names_arr, $inputFileNameWithPath);
				echo $result;
			}
			else
			{
				$result = "Select a file";
			}	
			break;
			
		case 'chairpersonForm':
			
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
			
			break;
		
		default:
			{
				$result = "Please give your info by submitting form or uploading file";
			}
		
			break;
	}
	
	//store the values in sessions
	$_SESSION['result'] = $result;
	
	//redirect
	header('Location: ../../create-chairperson.php');
?>
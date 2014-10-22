<?php
    session_start();
	//include the DAL library and create object
	include '../library/library.DAL.php';
	$DAL_Obj = new DAL_Library() ;
	
	switch ($_POST['action']) {
		
		case 'facultyFile':
			
			//include the phpexcel file
			include '../library/library.InsertExcel.php';
			$insert_excel_obj = new Insert_Excel_Library();
			//include the class upload file 
			include '../library/class.upload_file.php';
		    $upload = new FileUpload();
			//declaring the path to upload
			$path = "../../../phpexcel/excelfiles/";
			//getting filename without extension
			$fileName = explode('.', $_FILES['facInfoFile']['name']);
			$desired_file_name = $fileName[0];
			//uploading the file with desired filename and desired path
			$upload->upload_file($desired_file_name, $_FILES['facInfoFile'], $path);
			//copying contents from file to database
			//declaring the table name
			$tablename = "faculty_info";
			// //declaring the column names
			$column_names_arr = array('Course','Curriculum','First Name','Middle Name','Last Name','Suffix',
										 'Other Name','Email','DOB(YYYY-MM-DD)','EduLevel','Gender',
										'Department','Street 1','Street 2','City','State','Country',
										'Postal Code','Website','Home Phone','Work Phone','Work Fax','Cellular Phone',
										'User Name','Password');
			//declaring filename with path
			$inputFileNameWithPath = $path.$_FILES['facInfoFile']['name'];
			//inserting file contents into database
			$result = $insert_excel_obj->insertExcelFaculty($tablename, $column_names_arr, $inputFileNameWithPath);
			echo $result;
			break;
			
		case 'facultyForm':
		
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
				$f_name = $_POST['f_name'] ;
				$m_name = $_POST['m_name'] ;
				$l_name = $_POST['l_name'] ;
				$suffix = $_POST['suffix'] ;
				$o_name = $_POST['o_name'] ;
				$email = $_POST['email'] ;
				$dob = $_POST['dob'] ;
				$institute = $_POST['institute'] ;
				$course = $_POST['course'];
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
			//array to string
			$course_str = convertArrayToString($course);
			
			//generate the user id
			$user_id = "FAC".uniqid();
			
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
										'user_type' => 'faculty' ,
										'user_status' => 1
								)
							);
					$query_result = $DAL_Obj->insertValue($insert_user);		
				}
			} 
			
			if( !empty($f_name) && !empty($email) && !empty($user_id) && ($query_result >= 1))
			{
				$insert_faculty = array(
								'table' => 'faculty_info' ,
								'values' => array(
												'user_id' => $user_id ,
												'course_id' => $course_str,
												'curriculum_id' => "" ,
												'institute_id' => $institute ,
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
												'cellular_phone' => $cellular_phone ,
												'faculty_status' => 1 ,
												'status' => 1
											)
								);
								
				$DAL_Obj->insertValue($insert_faculty);
				
				$result = "Faculty Id: ".$user_id."<br/>Faculty addedd successfully.";
			}
			else
			{
				$result = "Please fill the form properly";	
			}
		
			break;
			
		default:
			
			break;
	}
	
	
	//store the values in sessions
	$_SESSION['result'] = $result;
	
	//redirect
	//header('Location: ../../create-faculty.php');
?>
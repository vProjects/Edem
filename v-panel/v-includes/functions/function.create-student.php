<?php
    session_start();
	//include the DAL library and create object
	include '../library/library.DAL.php';
	$DAL_Obj = new DAL_Library() ;
	
	switch ($_POST['action']) {
		
		case 'studentFile':
			
			//include the phpexcel file
			include '../library/library.InsertExcel.php';
			$insert_excel_obj = new Insert_Excel_Library();
			//include the class upload file 
			include '../library/class.upload_file.php';
		    $upload = new FileUpload();
			//declaring the path to upload
			$path = "../../../phpexcel/excelfiles/";
			//getting filename without extension
			$fileName = explode('.', $_FILES['stdInfoFile']['name']);
			$desired_file_name = $fileName[0];
			//uploading the file with desired filename and desired path
			$upload->upload_file($desired_file_name, $_FILES['stdInfoFile'], $path);
			//copying contents from file to database
			//declaring the table name
			//$tablename = "excel1";
			//$column_names_arr = array('FILE', 'LINENO', 'ACTION');
			$tablename = "students_info";
			// //declaring the column names
			$column_names_arr = array('Course','Curriculum','First Name','Middle Name','Last Name','Suffix',
										 'Other Name','Email','Student Id','DOB(YYYY-MM-DD)','EduLevel','Gender',
										'Department','Street 1','Street 2','City','State','Country',
										'Postal Code','Website','Home Phone','Work Phone','Work Fax','Cellular Phone');
			//declaring filename with path
			$inputFileNameWithPath = $path.$_FILES['stdInfoFile']['name'];
			//inserting file contents into database
			$result = $insert_excel_obj->insertExcel($tablename, $column_names_arr, $inputFileNameWithPath);
			echo $result;
			break;
			
		case 'studentForm':
			
			if( $_SERVER['REQUEST_METHOD'] == 'POST' )
			{
				$f_name = $_POST['f_name'] ;
				$m_name = $_POST['m_name'] ;
				$l_name = $_POST['l_name'] ;
				$suffix = $_POST['suffix'] ;
				$o_name = $_POST['o_name'] ;
				$email = $_POST['email'] ;
				$student_id = $_POST['student_id'] ;
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
			
			//generate the user id
			$user_id = "STU".uniqid();
			
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
										'user_type' => 'student' ,
										'user_status' => 1
								)
							);
					$query_result = $DAL_Obj->insertValue($insert_user);		
				}
			} 
			
			if( !empty($f_name) && !empty($email) && !empty($user_id) && ($query_result >= 1))
			{
				$insert_student = array(
								'table' => 'students_info' ,
								'values' => array(
												'user_id' => $user_id ,
												'institute_id' => $institute ,
												'course_id' => $course,
												'curriculum_id' => "" ,
												'f_name' => $f_name ,
												'm_name' => $m_name ,
												'l_name' => $l_name ,
												'suffix' => $suffix ,
												'o_name' => $o_name ,
												'email' => $email ,
												'student_id' => $student_id ,
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
												'student_status' => 1 ,
												'status' => 1
											)
											
								);
								
				$DAL_Obj->insertValue($insert_student);
				
				$result = "Student Id: ".$user_id."<br/>Student added successfully.";
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
	//header('Location: ../../create-student.php');
?>
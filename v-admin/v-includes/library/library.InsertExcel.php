<?php
	/*
	Always upload the file first so that then it can be loaded by the phpexcel class  
	*/
	
	//include the PHPExcel file
	include '../../../phpexcel/Classes/PHPExcel.php';
	class Insert_Excel_Library
    {
    	public $_DAL_Obj;
		public $_PHP_EXCEL_Obj;
		
		function __construct()
		{
			//create the DAL
			$this->_DAL_Obj = new DAL_Library();
			$this->_PHP_EXCEL_Obj = new PHPExcel();
		}
		
		/*
		- Method to insert Excel files content into database table without checking but more faster
		  Use this if you are sure about the format given by the user
		  No need to write keys
		- Auth: Debojyoti
		*/	
		function insertExcelAuto($tablename, $inputFileName)
		{
			//$inputFileName must have the path written with it also.
			$this->_PHP_EXCEL_Obj->setActiveSheetIndex(0);
			$this->_PHP_EXCEL_Obj = PHPExcel_IOFactory::load($inputFileName);
			$data = $this->_PHP_EXCEL_Obj->getActiveSheet()->toArray();
			if(!empty($data[0]))
			{
				for($i=0;$i<count($data);$i++) 
				{
					$insert_arr = array(
				
					'table' => $tablename,
					'values' => array()
					);
					for($j=0;$j<count($data[0]);$j++)
					{
						$insert_arr['values'][$data[0][$j]] = $data[$i][$j];
					}
					$this->_DAL_Obj->insertValue($insert_arr);
				}	
			}
		}
		
		/*
		- Method to insert Student Excel files into database table and send back the 
		  particular row in excel format to user if there is any error in the format of the row
		- Auth: Debojyoti 
		*/
		function insertExcelStudent($tablename, $column_names_arr, $inputFileNameWithPath)
		{
			$this->_PHP_EXCEL_Obj->createSheet();	
			$this->_PHP_EXCEL_Obj->setActiveSheetIndex(0);
			$this->_PHP_EXCEL_Obj = PHPExcel_IOFactory::load($inputFileNameWithPath);
			$data = $this->_PHP_EXCEL_Obj->getActiveSheet()->toArray();
			//checking column count
			if((count($column_names_arr)) != (count($data[0])))
			{
				return 'Check the column count.';
			}
			
			for($j=0;$j<count($data[0]);$j++)
			{
				//checking if user heading name matches	the heading names in the format in the same order
				if($data[0][$j] != $column_names_arr[$j])
				{
					//checking if user heading name is present in the heading name format	
					if(in_array($data[0][$j], $column_names_arr))
					{
						for($k=0;$k<count($data[0]);$k++)
						{
							//finding out the appropriate key of the misplaced column	
							if($column_names_arr[$k] == $data[0][$j])
							{
								$key = $k;
								//checking the array value before it is exchanged and moved earlier 
								//inside the array and then cant be checked anymore because of the iteration
								if(!in_array($data[0][$k], $column_names_arr))
								{
									return 'Check the format of '.$data[0][$k];
								}
								for($l=0;$l<count($data);$l++)
								{
									//replacing the misplaced column with the position of the another misplaced 
									//column where it should have been placed according to format	
									$temp[$l][0] = $data[$l][$k];
									$data[$l][$k] = $data[$l][$j];
									$data[$l][$j] = $temp[$l][0];
								}
							}
						}
					}	
					else 
					{
						return 'Check the format of '.$data[0][$j];	
					}
				}
			}
			//forming the server side data
			//getting the institute id
			if($_SESSION['type'] == 'chairperson')
			{
				$instituteId = $this->_DAL_Obj->getValueWhere('chairperson_info', '*', 'user_id', $_SESSION['user_id']);
				$instituteId = $instituteId[0]['institute_id'];
			}
			else if($_SESSION['type'] == 'institute')
			{
				$instituteId = $_SESSION['user_id'];
			}
			else if($_SESSION['type'] == 'faculty')
			{
				$instituteId = $this->_DAL_Obj->getValueWhere('faculty_info', '*', 'user_id', $_SESSION['user_id']);
				$instituteId = $instituteId[0]['institute_id'];
			}
			//getting course id from course name and putting it in place of course name
			for($m=1;$m<count($data);$m++)
			{
				$course_name = $data[$m][0];
				$column_name = array('name', 'institute_id', 'course_status');
				$column_values = array($course_name, $instituteId, 1);
				$course_id = $this->_DAL_Obj->getValueMultipleCondtn('course_info', '*', $column_name, $column_values);
				if(!empty($course_id[0]))
				{
					$data[$m][0] = $course_id[0]['course_id'];
				}
				else 
				{
					$data[$m][0] = "";	
				}
			}
			//getting edulevel number from edulevel name and putting it in place of edulevel name
			for($m=1;$m<count($data);$m++)
			{
				$edulevel_name = $data[$m][10];
				$edulevel_no = $this->_DAL_Obj->getValueWhere('student_status', '*', 'status_name', $edulevel_name);
				if(!empty($edulevel_no[0]))
				{
					$data[$m][10] = $edulevel_no[0]['id'];
				}
				else 
				{
					$data[$m][10] = "";	
				}
			}
			//getting state number from state name and putting it in place of state name
			for($m=1;$m<count($data);$m++)
			{
				$state_name = $data[$m][16];
				$state_no = $this->_DAL_Obj->getValueWhere('zone', '*', 'name', $state_name);
				if(!empty($state_no[0]))
				{
					$data[$m][16] = $state_no[0]['id'];
				}
				else 
				{
					$data[$m][16] = "";	
				}
			}
			//getting country number from country name and putting it in place of country name
			for($m=1;$m<count($data);$m++)
			{
				$country_name = $data[$m][17];
				$country_no = $this->_DAL_Obj->getValueWhere('country', '*', 'name', $country_name);
				if(!empty($country_no[0]))
				{
					$data[$m][17] = $country_no[0]['id'];
				}
				else 
				{
					$data[$m][17] = "";	
				}
			}
			//converting excel date format(string) to custom format
			for($n=1;$n<count($data);$n++)
			{
				$data[$n][9] = date('Y-m-d',strtotime($data[$n][9]));
			}
			
			//inserting values
			//Checking content availability in user input file
			//Not checking the row containing the headers
			$dataAvai = 0;
			for($a=0;$a<count($data[1]);$a++)
			{
				if(!empty($data[1][$a]))
				{
					$dataAvai = 1;
				}
			}
			if($dataAvai == 1)
			{
				for($i=1;$i<count($data);$i++) 
				{
					//initializing a flag variable to check whether a field in a row has a null value or not	
					$empty_variable = 0;	
					//generate the user id
					$user_id = "STU".uniqid();	
					//initializing the variable named excel_column_names which will be sent along
					//with data in excel format if any null value is found in the input file.This
					//particular array key and its values will not be inserted in database table. 
					$insert_arr = array(
				
					'table' => $tablename,
					'excel_column_names' => $column_names_arr,
					'values' => array(
					
						'user_id' => $user_id,
						'institute_id' => $instituteId,
						'course_id' => $data[$i][0],
						'curriculum_id' => $data[$i][1],
						'f_name' => $data[$i][2],
						'm_name' => $data[$i][3],
						'l_name' => $data[$i][4],
						'suffix' => $data[$i][5],
						'o_name' => $data[$i][6],
						'email' => $data[$i][7],
						'student_id' => $data[$i][8],
						'dob' => $data[$i][9],
						'edu_level' => $data[$i][10],
						'gender' => $data[$i][11],
						'department' => $data[$i][12],
						'street_1' => $data[$i][13],
						'street_2' => $data[$i][14],
						'city' => $data[$i][15],
						'state' => $data[$i][16],
						'country' => $data[$i][17],
						'postal_code' => $data[$i][18],
						'website' => $data[$i][19],
						'home_phone' => $data[$i][20],
						'work_phone' => $data[$i][21],
						'work_fax' => $data[$i][22],
						'cellular_phone' => $data[$i][23],
						'student_status' => 1,
						'status' => 1,
						)
					);
					//checking whether a field has a null value or not
					for($j=0;$j<=23;$j++)
					{
						if(empty($data[$i][$j]))
						{
							$empty_variable = 1;
						}
					}
					if($empty_variable == 0)
					{
						//inserting data in table students info	
						$rowCount = $this->_DAL_Obj->insertValue($insert_arr);
						//inserting data in table users
						$insert_user = array(
								'table' => 'users' ,
								'values' => array(
										'username' => $data[$i][24] ,
										'user_id' => $user_id ,
										'password' => $data[$i][25] ,
										'date' => date('Y-m-d') ,
										'user_type' => 'student' ,
										'user_status' => 1
								)
							);
						$this->_DAL_Obj->insertValue($insert_user);	
					}
					else
					{
						//not sending the server-side made keys	
						unset($insert_arr['table']);
						unset($insert_arr['values']['user_id']);
						unset($insert_arr['values']['institute_id']);
						unset($insert_arr['values']['student_status']);
						unset($insert_arr['values']['status']);
						$insert_arr['values']['username'] = $data[$i][24];
						$insert_arr['values']['password'] = $data[$i][25];
						
						//getting course name from course id
						$courseName = $this->_DAL_Obj->getValueWhere('course_info', '*', 'course_id', $insert_arr['values']['course_id']);
						if(!empty($courseName[0]))
						{
							$insert_arr['values']['course_id'] = $courseName[0]['name'];
						}
						
						//getting edulevel name from edulevel no.
						$eduName = $this->_DAL_Obj->getValueWhere('student_status', '*', 'id', $insert_arr['values']['edu_level']);
						if(!empty($eduName[0]))
						{
							$insert_arr['values']['edu_level'] = $eduName[0]['status_name'];
						}
						
						//getting state name from state no.
						$stateName = $this->_DAL_Obj->getValueWhere('zone', '*', 'id', $insert_arr['values']['state']);
						if(!empty($stateName[0]))
						{
							$insert_arr['values']['state'] = $stateName[0]['name'];
						}

						//getting country name from country no.
						$countryName = $this->_DAL_Obj->getValueWhere('country', '*', 'id', $insert_arr['values']['country']);
						if(!empty($countryName[0]))
						{
							$insert_arr['values']['country'] = $countryName[0]['name'];
						}
						
						//creating a new excel sheet to send to user to inform him of his error
						//in filling up the fields
						$this->_PHP_EXCEL_Obj->createSheet();
						$this->_PHP_EXCEL_Obj->setActiveSheetIndex(1);
						$this->_PHP_EXCEL_Obj->getActiveSheet()->fromArray($insert_arr, null, 'A1');
        
				        // Rename worksheet
				        $this->_PHP_EXCEL_Obj->getActiveSheet()->setTitle('All fields are compulsory.');
				        
				        //auto sizing the columns
				        for($col = 'A'; $col !== 'AA'; $col++) 
				        {
						    $this->_PHP_EXCEL_Obj->getActiveSheet()
						        ->getColumnDimension($col)
						        ->setAutoSize(true);
						}
				        
				        // Save Excel 2007 file
				        $objWriter = PHPExcel_IOFactory::createWriter($this->_PHP_EXCEL_Obj, 'Excel2007');
				        $objWriter->save('../../../phpexcel/excelfiles/StuExcel'.$i.'.xlsx');	
						//not inserting the present row(sending it to user) and moving 
						//towards the next row	
						continue;	
					}
				}
				if($rowCount == 0)
				{
					return "Student Addition Unsuccessful";
				}
				else
				{
					return "Student Added Successfully.";
				}	
			}
			else
			{
				return 'Give some content to your file or start your content from the second row, having headers in the first row.';	
			}
		}

		/*
		- Method to insert faculty Excel files into database table and send back the 
		  particular row to user in excel format if there is any error in the format of the row   
		- Auth: Debojyoti 
		*/
		function insertExcelFaculty($tablename, $column_names_arr, $inputFileNameWithPath)
		{
			$this->_PHP_EXCEL_Obj->createSheet();	
			$this->_PHP_EXCEL_Obj->setActiveSheetIndex(0);
			$this->_PHP_EXCEL_Obj = PHPExcel_IOFactory::load($inputFileNameWithPath);
			$data = $this->_PHP_EXCEL_Obj->getActiveSheet()->toArray();
			//checking column count
			
			if((count($column_names_arr)) != (count($data[0])))
			{
				return 'Check the column count.';
			}
			
			for($j=0;$j<count($data[0]);$j++)
			{
				//checking if user heading name matches	the heading names in the format in the same order
				if($data[0][$j] != $column_names_arr[$j])
				{
					//checking if user heading name is present in the heading name format	
					if(in_array($data[0][$j], $column_names_arr))
					{
						for($k=0;$k<count($data[0]);$k++)
						{
							//finding out the appropriate key of the misplaced column	
							if($column_names_arr[$k] == $data[0][$j])
							{
								$key = $k;
								//checking the array value before it is exchanged and moved earlier 
								//inside the array and then cant be checked anymore because of the iteration
								if(!in_array($data[0][$k], $column_names_arr))
								{
									return 'Check the format of '.$data[0][$k];
								}
								for($l=0;$l<count($data);$l++)
								{
									//replacing the misplaced column with the position of the another misplaced 
									//column where it should have been placed according to format	
									$temp[$l][0] = $data[$l][$k];
									$data[$l][$k] = $data[$l][$j];
									$data[$l][$j] = $temp[$l][0];
								}
							}
						}
					}	
					else 
					{
						return 'Check the format of '.$data[0][$j];	
					}
				}
			}
			//forming the server side data
			//getting course id array elements and converting them to a single string
			$courseid_string = "";
			foreach ($_POST['course'] as $course_id) {
				$course_string .= $course_id.',';
			}
			$courseid_string = substr($course_string, 0, -1);
			
			//getting edulevel number from edulevel name and putting it in place of edulevel name
			for($m=1;$m<count($data);$m++)
			{
				$edulevel_name = $data[$m][9];
				$edulevel_no = $this->_DAL_Obj->getValueWhere('student_status', '*', 'status_name', $edulevel_name);
				if(!empty($edulevel_no[0]))
				{
					$data[$m][9] = $edulevel_no[0]['id'];
				}
				else 
				{
					$data[$m][9] = "";	
				}
			}
			//getting state number from state name and putting it in place of state name
			for($m=1;$m<count($data);$m++)
			{
				$state_name = $data[$m][15];
				$state_no = $this->_DAL_Obj->getValueWhere('zone', '*', 'name', $state_name);
				if(!empty($state_no[0]))
				{
					$data[$m][15] = $state_no[0]['id'];
				}
				else 
				{
					$data[$m][15] = "";	
				}
			}
			//getting country number from country name and putting it in place of country name
			for($m=1;$m<count($data);$m++)
			{
				$country_name = $data[$m][16];
				$country_no = $this->_DAL_Obj->getValueWhere('country', '*', 'name', $country_name);
				if(!empty($country_no[0]))
				{
					$data[$m][16] = $country_no[0]['id'];
				}
				else 
				{
					$data[$m][16] = "";	
				}
			}
			//converting excel date format(string) to custom format
			for($n=1;$n<count($data);$n++)
			{
				$data[$n][8] = date('Y-m-d',strtotime($data[$n][8]));
			}
			
					
			//inserting values
			//Checking content availability in user input file
			//Not checking the row containing the headers
			$dataAvai = 0;
			for($a=0;$a<count($data[1]);$a++)
			{
				if(!empty($data[1][$a]))
				{
					$dataAvai = 1;
				}
			}
			if($dataAvai == 1)
			{
				for($i=1;$i<count($data);$i++) 
				{
					//initializing a flag variable to check whether a field in a row has a null value or not	
					$empty_variable = 0;	
					//generate the user id
					$user_id = "FAC".uniqid();	
					//initializing the variable named excel_column_names which will be sent along
					//with data in excel format if any null value is found in the input file.This
					//particular array key and its values will not be inserted in database table. 
					
					$insert_arr = array(
				
					'table' => $tablename,
					'excel_column_names' => $column_names_arr,
					'values' => array(
					
						'user_id' => $user_id,
						'institute_id' => $_POST['institute'],
						'course_id' => $courseid_string,
						'curriculum_id' => "",
						'f_name' => $data[$i][0],
						'm_name' => $data[$i][1],
						'l_name' => $data[$i][2],
						'suffix' => $data[$i][3],
						'o_name' => $data[$i][4],
						'email' => $data[$i][5],
						'dob' => $data[$i][6],
						'edu_level' => $data[$i][7],
						'gender' => $data[$i][8],
						'department' => $data[$i][9],
						'street_1' => $data[$i][10],
						'street_2' => $data[$i][11],
						'city' => $data[$i][12],
						'state' => $data[$i][13],
						'country' => $data[$i][14],
						'postal_code' => $data[$i][15],
						'website' => $data[$i][16],
						'home_phone' => $data[$i][17],
						'work_phone' => $data[$i][18],
						'work_fax' => $data[$i][19],
						'cellular_phone' => $data[$i][20],
						'faculty_status' => 1,
						'status' => 1,
						)
					);
				
					//checking whether a field has a null value or not
					for($j=0;$j<=20;$j++)
					{
						if(empty($data[$i][$j]))
						{
							$empty_variable1 = 1;
						}
						
					}
					if($empty_variable1 == 0)
					{
						//inserting data in table students info	
						$rowCount = $this->_DAL_Obj->insertValue($insert_arr);
						//inserting data in table users
						$insert_user = array(
								'table' => 'users' ,
								'values' => array(
										'username' => $data[$i][21] ,
										'user_id' => $user_id ,
										'password' => $data[$i][22] ,
										'date' => date('Y-m-d') ,
										'user_type' => 'faculty' ,
										'user_status' => 1
								)
							);
						$this->_DAL_Obj->insertValue($insert_user);	
					}
					else
					{
						//not sending the server-side made keys	
						unset($insert_arr['table']);
						unset($insert_arr['values']['user_id']);
						unset($insert_arr['values']['faculty_status']);
						unset($insert_arr['values']['status']);
						$insert_arr['values']['username'] = $data[$i][21];
						$insert_arr['values']['password'] = $data[$i][22];
						
						//getting course name from course id
						$course_name_string = "";
						$course_id_arr = explode(',', $insert_arr['values']['course_id']); 
						foreach ($course_id_arr as $course_id) {
							$courseName = $this->_DAL_Obj->getValueWhere('course_info', '*', 'course_id', $course_id);
							if(!empty($courseName[0]))
							{
								$course_name_string = $course_name_string.$courseName[0]['name'].',';
							}	
						}
						$course_name_string = substr($course_name_string, 0, -1);
						//setting course name string in the sending value array
						$insert_arr['values']['course_id'] = $course_name_string;
						//getting edulevel name from edulevel no.
						$eduName = $this->_DAL_Obj->getValueWhere('student_status', '*', 'id', $insert_arr['values']['edu_level']);
						if(!empty($eduName[0]))
						{
							$insert_arr['values']['edu_level'] = $eduName[0]['status_name'];
						}
						
						//getting state name from state no.
						$stateName = $this->_DAL_Obj->getValueWhere('zone', '*', 'id', $insert_arr['values']['state']);
						if(!empty($stateName[0]))
						{
							$insert_arr['values']['state'] = $stateName[0]['name'];
						}

						//getting country name from country no.
						$countryName = $this->_DAL_Obj->getValueWhere('country', '*', 'id', $insert_arr['values']['country']);
						if(!empty($countryName[0]))
						{
							$insert_arr['values']['country'] = $countryName[0]['name'];
						}
						
						//creating a new excel sheet to send to user to inform him of his error
						//in filling up the fields
						$this->_PHP_EXCEL_Obj->createSheet();
						$this->_PHP_EXCEL_Obj->setActiveSheetIndex(1);
						$this->_PHP_EXCEL_Obj->getActiveSheet()->fromArray($insert_arr, null, 'A1');
        
				        // Rename worksheet
				        $this->_PHP_EXCEL_Obj->getActiveSheet()->setTitle('All fields are compulsory.');
				        
				        //auto sizing the columns
				        for($col = 'A'; $col !== 'Z'; $col++) 
				        {
						    $this->_PHP_EXCEL_Obj->getActiveSheet()
						        ->getColumnDimension($col)
						        ->setAutoSize(true);
						}
				        
				        // Save Excel 2007 file
				        $objWriter = PHPExcel_IOFactory::createWriter($this->_PHP_EXCEL_Obj, 'Excel2007');
				        $objWriter->save('../../../phpexcel/excelfiles/FACExcel'.$i.'.xlsx');	
						//not inserting the present row(sending it to user) and moving 
						//towards the next row	
						continue;	
					}

				}
				if($rowCount == 0)
				{
					return "Faculty Addition Unsuccessful";
				}
				else
				{
					return "Faculty Added Successfully.";
				}	
			}
			else
			{
				return 'Give some content to your file or start your content from the second row, having headers in the first row.';	
			}
		}

		
		/*
		- Method to insert Chairperson Excel files into database table and send back the 
		  particular row in excel format to user if there is any error in the format of the row
		- Auth: Debojyoti 
		*/
		function insertExcelChairperson($tablename, $column_names_arr, $inputFileNameWithPath)
		{
			$this->_PHP_EXCEL_Obj->createSheet();	
			$this->_PHP_EXCEL_Obj->setActiveSheetIndex(0);
			$this->_PHP_EXCEL_Obj = PHPExcel_IOFactory::load($inputFileNameWithPath);
			$data = $this->_PHP_EXCEL_Obj->getActiveSheet()->toArray();
			
			//checking column count
			if((count($column_names_arr)) != (count($data[0])+1))
			{
				return 'Check the column count.';
			}
			for($j=0;$j<count($data[0]);$j++)
			{
				//checking if user heading name matches	the heading names in the format in the same order
				if($data[0][$j] != $column_names_arr[$j])
				{
						
					//checking if user heading name is present in the heading name format	
					if(in_array($data[0][$j], $column_names_arr))
					{
						for($k=0;$k<count($data[0]);$k++)
						{
							//finding out the appropriate key of the misplaced column	
							if($column_names_arr[$k] == $data[0][$j])
							{
								$key = $k;
								//checking the array value before it is exchanged and moved earlier 
								//inside the array and then cant be checked anymore because of the iteration
								if(!in_array($data[0][$k], $column_names_arr))
								{
									return 'Check the format of '.$data[0][$k];
								}
								for($l=0;$l<count($data);$l++)
								{
									//replacing the misplaced column with the position of the another misplaced 
									//column where it should have been placed according to format	
									$temp[$l][0] = $data[$l][$k];
									$data[$l][$k] = $data[$l][$j];
									$data[$l][$j] = $temp[$l][0];
									
								}
								
							}
						}
					}	
					else 
					{
						return 'Check the format of '.$data[0][$j];	
					}
				}
			}

			//forming the server side data
			//getting state number from state name and putting it in place of state name
			for($m=1;$m<count($data);$m++)
			{
				$state_name = $data[$m][13];
				$state_no = $this->_DAL_Obj->getValueWhere('zone', '*', 'name', $state_name);
				if(!empty($state_no[0]))
				{
					$data[$m][13] = $state_no[0]['id'];
				}
				else 
				{
					$data[$m][13] = "";	
				}
			}
			
			//getting country number from country name and putting it in place of country name
			for($m=1;$m<count($data);$m++)
			{
				$country_name = $data[$m][14];
				$country_no = $this->_DAL_Obj->getValueWhere('country', '*', 'name', $country_name);
				if(!empty($country_no[0]))
				{
					$data[$m][14] = $country_no[0]['id'];
				}
				else 
				{
					$data[$m][14] = "";	
				}
			}
			
			//converting excel date format(string) to custom format
			for($n=1;$n<count($data);$n++)
			{
				$data[$n][6] = date('Y-m-d',strtotime($data[$n][6]));
			}
					
			//inserting values
			//Checking content availability in user input file
			//Not checking the row containing the headers
			$dataAvai = 0;
			for($a=0;$a<count($data[1]);$a++)
			{
				if(!empty($data[1][$a]))
				{
					$dataAvai = 1;
				}
			}
			if($dataAvai == 1)
			{
				for($i=1;$i<count($data);$i++) 
				{
					//initializing a flag variable to check whether a field in a row has a null value or not	
					$empty_variable = 0;	
					//generate the user id
					$user_id = "CHR".uniqid();	
					//initializing the variable named excel_column_names which will be sent along
					//with data in excel format if any null value is found in the input file.This
					//particular array key and its values will not be inserted in database table. 
					$insert_arr = array(
				
					'table' => $tablename,
					'excel_column_names' => $column_names_arr,
					'values' => array(
					
						'user_id' => $user_id,
						'institute_id' => $_POST['institute'],
						'f_name' => $data[$i][0],
						'm_name' => $data[$i][1],
						'l_name' => $data[$i][2],
						'suffix' => $data[$i][3],
						'o_name' => $data[$i][4],
						'email' => $data[$i][5],
						'dob' => $data[$i][6],
						'gender' => $data[$i][7],
						'department' => $data[$i][8],
						'street_1' => $data[$i][9],
						'street_2' => $data[$i][10],
						'city' => $data[$i][11],
						'state' => $data[$i][12],
						'country' => $data[$i][13],
						'postal_code' => $data[$i][14],
						'website' => $data[$i][15],
						'home_phone' => $data[$i][16],
						'work_phone' => $data[$i][17],
						'work_fax' => $data[$i][18],
						'cellular_phone' => $data[$i][19],
						'chairperson_status' => 1,
						'status' => 1,
						)
					);
					//checking whether a field has a null value or not
					for($j=0;$j<=19;$j++)
					{
						if(empty($data[$i][$j]))
						{
							$empty_variable = 1;
						}
					}
					if($empty_variable == 0)
					{
						//inserting data in table chairpersons info	
						$rowCount = $this->_DAL_Obj->insertValue($insert_arr);
						//inserting data in table users
						$insert_user = array(
								'table' => 'users' ,
								'values' => array(
										'username' => $data[$i][20] ,
										'user_id' => $user_id ,
										'password' => $data[$i][21] ,
										'date' => date('Y-m-d') ,
										'user_type' => 'chairperson' ,
										'user_status' => 1
								)
							);
						$this->_DAL_Obj->insertValue($insert_user);	
					}
					else
					{
						//not sending the server-side made keys	
						unset($insert_arr['table']);
						unset($insert_arr['values']['user_id']);
						unset($insert_arr['values']['chairperson_status']);
						unset($insert_arr['values']['status']);
						$insert_arr['values']['username'] = $data[$i][20];
						$insert_arr['values']['password'] = $data[$i][21];
						
						//getting institute name from institute id
						$instituteName = $this->_DAL_Obj->getValueWhere('institute_info', '*', 'institute_id', $insert_arr['values']['institute_id']);
						if(!empty($instituteName[0]))
						{
							$insert_arr['values']['institute_id'] = $instituteName[0]['name'];
						}
						
						//getting state name from state no.
						$stateName = $this->_DAL_Obj->getValueWhere('zone', '*', 'id', $insert_arr['values']['state']);
						if(!empty($stateName[0]))
						{
							$insert_arr['values']['state'] = $stateName[0]['name'];
						}

						//getting country name from country no.
						$countryName = $this->_DAL_Obj->getValueWhere('country', '*', 'id', $insert_arr['values']['country']);
						if(!empty($countryName[0]))
						{
							$insert_arr['values']['country'] = $countryName[0]['name'];
						}
						
						//creating a new excel sheet to send to user to inform him of his error
						//in filling up the fields
						$this->_PHP_EXCEL_Obj->createSheet();
						$this->_PHP_EXCEL_Obj->setActiveSheetIndex(1);
						$this->_PHP_EXCEL_Obj->getActiveSheet()->fromArray($insert_arr, null, 'A1');
        
				        // Rename worksheet
				        $this->_PHP_EXCEL_Obj->getActiveSheet()->setTitle('All fields are compulsory.');
				        
				        //auto sizing the columns
				        for($col = 'A'; $col !== 'AB'; $col++) 
				        {
						    $this->_PHP_EXCEL_Obj->getActiveSheet()
						        ->getColumnDimension($col)
						        ->setAutoSize(true);
						}
				        
				        // Save Excel 2007 file
				        $objWriter = PHPExcel_IOFactory::createWriter($this->_PHP_EXCEL_Obj, 'Excel2007');
				        $objWriter->save('../../../phpexcel/excelfiles/ChrExcelAdmin'.$i.'.xlsx');	
						//not inserting the present row(sending it to user) and moving 
						//towards the next row	
						continue;	
					}
				}
				if($rowCount == 0)
				{
					return "Chairperson Addition Unsuccessful";
				}
				else
				{
					return "Chairperson Added Successfully.";
				}	
			}
			else
			{
				return 'Give some content to your file or start your content from the second row, having headers in the first row.';	
			}
		}


		/*function insertExcelStudent($tablename, $column_names_arr, $inputFileNameWithPath)
		{
			$this->_PHP_EXCEL_Obj->setActiveSheetIndex(0);
			$this->_PHP_EXCEL_Obj = PHPExcel_IOFactory::load($inputFileNameWithPath);
			$data = $this->_PHP_EXCEL_Obj->getActiveSheet()->toArray();
			//checking column count
			if((count($column_names_arr)) != (count($data[0])))
			{
				return 'Check the column count.';
			}
			
			//checking headings and alerting about the specific heading
			for($j=0;$j<count($data[0]);$j++)
			{
				if($data[0][$j] != $column_names_arr[$j])
				{
					return 'Check the format of heading '.$column_names_arr[$j];	
				}
			}
			//inserting values
			//Checking content availability in user input file
			//Not checking the row containing the headers
			if(!empty($data[1]))
			{
				for($i=0;$i<count($data);$i++) 
				{
					$insert_arr = array(
				
					'table' => $tablename,
					'values' => array(
					
						$column_names_arr[0] => $data[$i][0],
						$column_names_arr[1] => $data[$i][1],
						$column_names_arr[2] => $data[$i][2],
						)
					);
					
		  			$this->_DAL_Obj->insertValue($insert_arr);
				}
				return "Student Added Successfully.";	
			}
			else
			{
				return 'Give some content to your file or start your content from the second row, having headers in the first row.';	
			}
		}*/
		
    }
?>
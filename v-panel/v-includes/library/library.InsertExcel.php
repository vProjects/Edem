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
		- Method to insert Excel files into database table  
		- Auth: Debojyoti 
		*/
		function insertExcel($tablename, $column_names_arr, $inputFileNameWithPath)
		{
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
								if(!in_array($data[0][$k], $column_names_arr))
								{
									return 'Check the format of '.$data[0][$k];
								}
								for($l=0;$l<count($data);$l++)
								{
									//replacing the misplaced column with the position of the another misplaced column where it should have been placed according to format	
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
				$course_id = $this->_DAL_Obj->getValueWhere('course_info', '*', 'name', $course_name);
				if(!empty($course_id[0]))
				{
					$data[$m][0] = $course_id[0]['course_id'];
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
			}
			for($n=1;$n<count($data);$n++)
			{
				$data[$n][9] = date('Y-m-d',strtotime($data[$n][9]));
			}
			
			//inserting values
			//Checking content availability in user input file
			//Not checking the row containing the headers
			if(!empty($data[1][0]))
			{
				for($i=1;$i<count($data);$i++) 
				{
					//initializing a variable to check whether a field in a row has a null value or not	
					$empty_variable = 0;	
					//generate the user id
					$user_id = "STU".uniqid();	
					
					$insert_arr = array(
				
					'table' => $tablename,
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
						$rowCount = $this->_DAL_Obj->insertValue($insert_arr);
					}
					else
					{
						$this->_PHP_EXCEL_Obj->getActiveSheet()->fromArray($insert_arr, null, 'B1');
        
				        // Rename worksheet
				        $this->_PHP_EXCEL_Obj->getActiveSheet()->setTitle('All fields are compulsory.');
				        
				         // Save Excel 2007 file
				        $objWriter = PHPExcel_IOFactory::createWriter($this->_PHP_EXCEL_Obj, 'Excel2007');
				        $objWriter->save('MyExcel.xlsx');	
						//not inserting the present row and moving towards the next row	
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
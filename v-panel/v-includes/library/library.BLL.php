<?php
	/*
	 * Fetches data from DAL and creates UI
	 * The UI calls the method to get full HTML output
	 * @Auth Singh
	 */
	 
	 //include the DAL layer
	 include 'library.DAL.php';
	 
	 class BLL_Library
	 {
	 	private $_DAL_Obj;
		
		function __construct()
		{
			//create the DAL
			$this->_DAL_Obj = new DAL_Library();
		}
		
		/*
		 * Method to get the country name and the state name
		 * @param string as city or state
		 * Auth Singh 
		 */
		 private function _getGeoValues( $type, $c_id )
		 {
			if( $type == "province" )
			{
				return $this->_DAL_Obj->getValueWhere('zone','*','country_id',$c_id);
			}
			else
			{
				return $this->_DAL_Obj->getValue('country','*');
			}
		 }
		 
		 /*
		 * Method to get the country name and the state name
		 * Generate the selectbox UI 
		 * @param string as city or state
		 * Auth Singh 
		 */
		 public function getGeoSelectBox($type, $c_id)
		 {
		 	$geoValues = $this->_getGeoValues($type, $c_id);
			
			//generate the HTML output for select box
			if( !empty($geoValues) )
			{
				foreach ($geoValues as $geoValue)
				{
					echo '<option value="'.$geoValue['id'].'">'.$geoValue['name'].'</option>';
				}
			}
			else
			{
				echo '<option value="">No Options.</option>';
			}
				
		 }
		 
		  /*
		 * Method to get the institute
		 * Generate the selectbox UI 
		 * Auth Singh 
		 */
		 public function getInstitute_SelectBox()
		 {
		 	$institutes = $this->_DAL_Obj->getValue('institute_info','*');
			
			if( !empty($institutes) )
			{
				foreach ($institutes as $institute)
				{
					echo '<option value="'.$institute['institute_id'].'">'.$institute['name'].'</option>';
				}
			}
		 }
		 
		  /*
		 * Method to get the course
		 * Generate the selectbox UI 
		 * Auth Singh 
		 */
		 public function getCourse_SelectBox($instituteId)
		 {
		 	$column_name = array('institute_id', 'course_status');	
			$column_values = array($instituteId, 1);
		 	$courses = $this->_DAL_Obj->getValueMultipleCondtn('course_info', '*', $column_name, $column_values);
			
			if( !empty($courses) )
			{
				foreach ($courses as $course)
				{
					echo '<option value="'.$course['course_id'].'">'.$course['name'].'</option>';
				}
			}
		 }
		 
		  /*
		 * Method to get the faculty
		 * Generate the selectbox UI 
		 * Auth Singh 
		 */
		 public function getFaculty_SelectBox($instituteId)
		 {
		 	$column_name = array('institute_id', 'faculty_status');	
			$column_values = array($instituteId, 1);	
		 	$faculties = $this->_DAL_Obj->getValueMultipleCondtn('faculty_info','*', $column_name, $column_values);
			
			if( !empty($faculties) )
			{
				foreach ($faculties as $faculty)
				{
					echo '<option value="'.$faculty['user_id'].'" selected="selected">'.$faculty['f_name'].' '.$faculty['m_name'].' '.$faculty['l_name'].'</option>';
				}
			}
		 }
		 
		/*
		- method for setting cookie value or session user id value whichever is missing
		- Auth: Dipanjan
		*/
		function setUserCredentials($user_id)
		{
			//get user details
			return $this->_DAL_Obj->getValueWhere('users','*','user_id',$user_id);
		}
		
		/*
		- method for getting room list
		- Auth: Dipanjan
		*/
		function getRoomList()
		{
			//get room list of user
			$rooms = $this->_DAL_Obj->getValueWhere('rooms','*','institute_id',$_SESSION['user_id']);
			if(!empty($rooms[0]))
			{
				foreach($rooms as $room)
				{
					echo '<a href="edit-room.php?id='.$room['id'].'"><button type="button" class="btn btn-info btn_name" readonly="readonly">'.$room['room_name'].'</button></a>';
				}
			}
		}
		
		/*
		- method for getting room info
		- Auth: Dipanjan
		*/
		function getRoomInfo($id)
		{
			//get room details
			$room = $this->_DAL_Obj->getValueWhere('rooms','*','id',$id);
			return $room[0]['room_name'];
		}
		
		/*
		 - Method for getting event-list
		 - @param user_id
		 - @return json
		 - Auth Singh 
		 */
		function getEventJson($user_id,$type)
		{
			//initialize the variables
			$returnJson = "";
			$rowName = "";
			$rowValue = "";
			
			//get the result according to the type
			if( $type == "institute")
			{
				$rowName = "institute_id";
				$rowValue = $user_id ;
			}
			if( $type == "chairperson")
			{
				$rowName = "chairperson_id";
				$rowValue = $user_id ;
			}
			if( $type == "faculty")
			{
				$rowName = "faculty_id";
				$rowValue = $user_id ;
			}
			if( $type == "student")
			{
				//get the groups of the student
				$studentGroups = $this->_DAL_Obj->getValue_wildcard('group_info','group_id',"students",'%'.$user_id.'%');
				
				$i = 0;
				
				foreach( $studentGroups as $group )
				{
					$rowValue[$i] = $group['group_id'] ;
					$i++ ;
				}
				$rowName = "group_id";
			}
			
			if( !empty($rowValue) && !empty($rowName) )
			{
				//get the value from the database
				if(is_array($rowValue))
				{
					$result = array() ;
					$i = 0;
					foreach ($rowValue as $value)
					{
						$results = $this->_DAL_Obj->getValue_wildcard('event_info','*',$rowName,'%'.$value.'%');
						foreach ($results as $result) {
							$events[$i] = $result;
							$i++ ;
						}
						
					}
				}
				else
				{
					$events = $this->_DAL_Obj->getValueWhere('event_info','*',$rowName,$rowValue);
				}
			}
			
			if(!empty($events))
			{
				$returnJson = '{
								"success": 1,
								"result": [';
				foreach( $events as $event )
				{
					$t = strtotime($event['date']);
					$returnJson = $returnJson . '{
							"id": "'.$event['event_id'].'",
							"title": "'.$event['event_name'].'",
							"url": "event-detail.php?eid='.$event['event_id'].'",
							"class": "event-warning",
							"start": "'.str_pad($t, 13, '0', STR_PAD_RIGHT).'",
							"end":   "'.str_pad($t, 13, '0', STR_PAD_RIGHT).'"
						},';
				}
				$returnJson = substr($returnJson ,"0",-1) . ']
					}';
			}
			return $returnJson;
		}

		function getEventDetails($eid)
		{
			$event = $this->_DAL_Obj->getValueWhere('event_info','*','event_id',$eid);
			return $event[0];
		}
		
		/* methode for getting subject color of student
		 * Method - Dipanjan
		*/
		 function getStudentSubjectStatus($sub_status)
		 {
		 	if($sub_status == 1)
			{
				$color = 'black-block';
			}
			else if($sub_status == 2)
			{
				$color = 'green-block';
			}
			else if($sub_status == 3)
			{
				$color = 'red-block';
			}
			
			return array($color);
		 }
		 
		 /*
		 - method for getting faculty members
		 - Auth: Debojyoti 
		 */
		 function getAdvisors($instituteId)
		 {
		 	$faculties = $this->_DAL_Obj->getValueWhere('faculty_info', '*', 'institute_id', $instituteId);
			//generate the HTML output for select box
			if( !empty($faculties) )
			{
				foreach ($faculties as $faculty)
				{
					echo '<option value="'.$faculty['user_id'].'">'.$faculty['f_name'].' '.$faculty['m_name'].' '.$faculty['l_name'].'</option>';
				}
			}
			else
			{
				echo '<option value="">No Faculties.</option>';
			}
		 }
		 
		 /*
		 - Method to get the student status select box UI
		 - Auth Anand 
		 */
		 public function getStudentStatus_SelectBox()
		 {
			$statuses = $this->_DAL_Obj->getValue('student_status','*');
			echo '<option value="0">Please select one</option>';
			if( !empty($statuses) )
			{
				foreach ($statuses as $status)
				{
					echo '<option value="'.$status['id'].'">'.$status['status_name'].'</option>';
				}
			}
		 }
		 
		  /*
		 - Method to get the availability select box UI
		 - Auth Thakur
		 */
		 public function getavailability_SelectBox()
		 {
			$availables = $this->_DAL_Obj->getValue('availability','*');
			echo '<option value="0">Please select one</option>';
			if( !empty($availables) )
			{
				foreach ($availables as $available)
				{
					echo '<option value="'.$available['id'].'">'.$available['availability_name'].'</option>';
				}
			}
		 }
		 
		 /*
		 - method to get creator name
		 - Auth: Debojyoti
		 */
		 function getCreatorName($userId, $creator_type)
		 {
		 	if($creator_type == 'chairperson')
			{
				$column_name = array('user_id','chairperson_status');	
		 		$column_values = array($userId,1); 	
				$creator = $this->_DAL_Obj->getValueMultipleCondtn('chairperson_info', '*', $column_name, $column_values);
				$creatorName = $creator[0]['f_name'].' '.$creator[0]['m_name'].' '.$creator[0]['l_name'];
				return $creatorName;
			}	
			elseif ($creator_type == 'faculty') 
			{
				$column_name = array('user_id','faculty_status');	
		 		$column_values = array($userId,1);	
				$creator = $this->_DAL_Obj->getValueMultipleCondtn('faculty_info', '*', $column_name, $column_values);
				$creatorName = $creator[0]['f_name'].' '.$creator[0]['m_name'].' '.$creator[0]['l_name'];
				return $creatorName;
			}
			elseif ($creator_type == 'institute') 
			{
				$column_name = array('institute_id','institute_status');	
		 		$column_values = array($userId,1);	
				$creator = $this->_DAL_Obj->getValueMultipleCondtn('institute_info', '*', $column_name, $column_values);
				$creatorName = $creator[0]['name'];
				return $creatorName;
			}
		  }
		 
		 /*
		 - Method to get the course list 
		 - Auth Dipanjan 
		 */
		 public function getCourseList()
		 {
			 //get all values from database
		 	 $courses = $this->_DAL_Obj->getValue('course_info','*');
			
			if(!empty($courses[0]))
			{
				foreach ($courses as $course)
				{
					//getting course status
					if($course['course_status'] == 1)
					{
						$btn = '<button class="btn btn-success">Active</button>';
					}
					else
					{
						$btn = '<button class="btn btn-danger">Deactive</button>';
					}
					echo '<tr>
							<td>'.$course['name'].'</td>
							<td>'.$this->getInstituteName('institute_info','institute_id',$course['institute_id'],'name').'</td>
							<td>'.$course['created_by'].'</td>
							<td>'.$course['created_on'].'</td>
							<td>'.$this->getInstituteName('student_status', 'id', $course['edu_level'], 'status_name').'</td>
							<td>'.$this->getInstituteName('availability', 'id', $course['availability'], 'availability_name').'</td>
							<td><a href="edit-course.php?cid='.$course['course_id'].'"><button class="btn btn-info">Edit</button></a></td>
							<td>'.$btn.'</td>
						</tr>';
				}
			}
		 }

		/*
		 - Method to get institute name from institute id
		 - Auth Dipanjan 
		 */
		 public function getInstituteName($table_name,$column_name,$column_value,$return_value)
		 {
			 //get value from database
			 $inst_name = $this->_DAL_Obj->getValueWhere($table_name,'*',$column_name,$column_value);
			 if(!empty($inst_name[0]))
			 {
				 return $inst_name[0][$return_value];
			 }
		 }

		/*
		 - Method to get selected multiple item from given id
		 - Auth Dipanjan 
		 */
		 public function getSelectedMultipleItemName($table_name,$selected_column_name,$selected_column_value)
		 {
			 //get all values from database
			 $selected_values = $this->_DAL_Obj->getValue($table_name,'*');
			 if(!empty($selected_values[0]))
			 {
				 foreach($selected_values as $selected_value)
				 {
					 if(in_array($selected_value[$selected_column_name],$selected_column_value))
					 {
						 echo '<option value="'.$selected_value[$selected_column_name].'" selected="selected">'.$selected_value['f_name'].' '.$selected_value['m_name'].' '.$selected_value['l_name'].'</option>';
					 }
					 else
					 {
						 echo '<option value="'.$selected_value[$selected_column_name].'">'.$selected_value['f_name'].' '.$selected_value['m_name'].' '.$selected_value['l_name'].'</option>';
					 }
				 }
			 }
		 }
		 
		 /*
		 - Method to get selected item from given id
		 - Auth Dipanjan 
		 */
		 public function getSelectedItemList($table_name,$selected_column_name,$selected_column_value,$return_value)
		 {
			 //get all values from database
			 $selected_values = $this->_DAL_Obj->getValue($table_name,'*');
			 if(!empty($selected_values[0]))
			 {
				 foreach($selected_values as $selected_value)
				 {
					 if($selected_value[$selected_column_name] == $selected_column_value)
					 {
						 echo '<option value="'.$selected_value[$selected_column_name].'" selected="selected">'.$selected_value[$return_value].'</option>';
					 }
					 else
					 {
						 echo '<option value="'.$selected_value[$selected_column_name].'">'.$selected_value[$return_value].'</option>';
					 }
				 }
			 }
		 }
		 
		 /*
		 - Method to get the student info 
		 - Auth Dipanjan 
		 */
		 public function getUserInfo($table_name,$column_name,$column_value)
		 {
			 //get values of this user id
			 $users = $this->_DAL_Obj->getValueWhere($table_name,'*',$column_name,$column_value);
			 if(!empty($users[0]))
			 {
				 return $users;
			 }
		 }
		 
		 /*
		 - Method to get the curriculam list 
		 - Auth Dipanjan 
		 */
		 public function getCurriculumList()
		 {
			 //get all values from database
		 	 $curriculams = $this->_DAL_Obj->getValue('curriculum_info','*');
			
			if(!empty($curriculams[0]))
			{
				foreach ($curriculams as $curriculam)
				{
					//getting curriculam status
					if($curriculam['curriculum_status'] == 1)
					{
						$btn = '<button class="btn btn-success">Active</button>';
					}
					else
					{
						$btn = '<button class="btn btn-danger">Deactive</button>';
					}
					echo '<tr>
							<td>'.$curriculam['name'].'</td>
							<td>'.$this->getInstituteName('institute_info','institute_id',$curriculam['institute_id'],'name').'</td>
							<td>'.$curriculam['created_by'].'</td>
							<td>'.$curriculam['created_on'].'</td>';
					
					//getting course list
					$courses = explode(',',$curriculam['course']);
					if(!empty($courses[0]))
					{
						echo '<td>';
						foreach($courses as $key1=>$value1)
						{
							echo ($key1+1).') '.$this->getInstituteName('course_info','course_id',$value1,'name').'<br>';
						}
						echo '</td>';
					}
					
					//getting advisor list
					$advisors = explode(',',$curriculam['advisor']);
					if(!empty($advisors[0]))
					{
						echo '<td>';
						foreach($advisors as $key2=>$value2)
						{
							echo ($key2+1).') '.$this->getInstituteName('faculty_info','user_id',$value2,'name').'<br>';
						}
						echo '</td>';
					}
					
					echo	'<td>'.$curriculam['session'].'</td>
							<td>'.$curriculam['hours'].'</td>
							<td><a href="edit-curriculum.php?cid='.$curriculam['curriculum_id'].'"><button class="btn btn-info">Edit</button></a></td>
							<td>'.$btn.'</td>
						</tr>';
				}
			}
		 }

		/*
		 - Method to get selected multiple item from given id
		 - Auth Dipanjan 
		 */
		 public function getSelectedMultipleItemList($table_name,$selected_column_name,$selected_column_value,$return_value)
		 {
			 //get all values from database
			 $selected_values = $this->_DAL_Obj->getValue($table_name,'*');
			 if(!empty($selected_values[0]))
			 {
				 foreach($selected_values as $selected_value)
				 {
					 if(in_array($selected_value[$selected_column_name],$selected_column_value))
					 {
						 echo '<option value="'.$selected_value[$selected_column_name].'" selected="selected">'.$selected_value[$return_value].'</option>';
					 }
					 else
					 {
						 echo '<option value="'.$selected_value[$selected_column_name].'">'.$selected_value[$return_value].'</option>';
					 }
				 }
			 }
		 }
		
		/*
		- Method for getting selected multiple values with where clause
		- Auth: Debojyoti 
		*/
		public function getSelectedFromList($table_name,$selected_column_name,$selected_column_value,$return_value1,$return_value2,$return_value3,$condition_column_names,$condition_column_values)
		{
			//get all values from database
			 $selected_values = $this->_DAL_Obj->getValueMultipleCondtn($table_name, '*', $condition_column_names, $condition_column_values);
			 if(!empty($selected_values[0]))
			 {
				 foreach($selected_values as $selected_value)
				 {
					 if(in_array($selected_value[$selected_column_name],$selected_column_value))
					 {
						 echo '<option value="'.$selected_value[$selected_column_name].'" selected="selected">'.$selected_value[$return_value1].' '.$selected_value[$return_value2].' '.$selected_value[$return_value3].'</option>';
					 }
					 else
					 {
						 echo '<option value="'.$selected_value[$selected_column_name].'">'.$selected_value[$return_value1].' '.$selected_value[$return_value2].' '.$selected_value[$return_value3].'</option>';
					 }
				 }
			 }
		}
		
		/*
		- Method to find institute id 
		- Auth: Debojyoti 
		*/
		public function getInstituteId($userId, $userType)
		{
			if($userType == 'chairperson')
			{
				$instituteId = $this->_DAL_Obj->getValueWhere('chairperson_info', '*', 'user_id', $userId);
				return $instituteId[0]['institute_id'];
			}
			else if($userType == 'institute')
			{
				return $userId;
			}
			else if($userType == 'faculty')
			{
				$instituteId = $this->_DAL_Obj->getValueWhere('faculty_info', '*', 'user_id', $userId);
				return $instituteId[0]['institute_id'];
			}
		}

		/*
		- Method to find course of student upon his login 
		- Auth: Debojyoti 
		*/
		public function getCourseIdOfStudent($userId)
		{
			$column_name = array('user_id', 'student_status');	
			$column_values = array($userId, 1);
			$courseId = $this->_DAL_Obj->getValueMultipleCondtn('students_info', '*', $column_name, $column_values);
			return $courseId[0]['course_id'];
		}

		/*
		- Method to find curriculum of student upon his login
		- Auth: Debojyoti		 
		*/
		public function getCurriculumListOfStudent($courseId, $edu_level)
		{
			if(!empty($courseId))
			{	
				$curriculum_info = $this->_DAL_Obj->getValue_wildcard('curriculum_info', '*', 'course', $courseId);
				foreach($curriculum_info as $curriculum)
				{
					if($curriculum['curriculum_status'] == 1 && $curriculum['edu_level'] == $edu_level)
					{
						$curriculum_array[$curriculum['curriculum_id']] = $curriculum['name'];
					}
				}
				return $curriculum_array;
			}
		}
	 }
?>
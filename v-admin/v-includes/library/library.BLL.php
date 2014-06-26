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
		 public function getCourse_SelectBox()
		 {
		 	$courses = $this->_DAL_Obj->getValue('course_info','*');
			
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
		 public function getFaculty_SelectBox()
		 {
		 	$faculties = $this->_DAL_Obj->getValue('faculty_info','*');
			
			if( !empty($faculties) )
			{
				foreach ($faculties as $faculty)
				{
					echo '<option value="'.$faculty['user_id'].'">'.$faculty['name'].'</option>';
				}
			}
		 }
		 
		 /*
		 - Method to get the curriculum select box UI
		 - Auth Dipanjan 
		 */
		 public function getCurriculum_SelectBox()
		 {
			$curriculums = $this->_DAL_Obj->getValue('curriculum_info','*');
			
			if( !empty($curriculums) )
			{
				foreach ($curriculums as $curriculum)
				{
					echo '<option value="'.$curriculum['curriculum_id'].'">'.$curriculum['name'].'</option>';
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
		 - Method to get the student list 
		 - Auth Dipanjan 
		 */
		 public function getStudentList()
		 {
			 //get all values from database
		 	 $students = $this->_DAL_Obj->getValue('students_info','*');
			
			if(!empty($students[0]))
			{
				foreach ($students as $student)
				{
					//getting student status
					if($student['student_status'] == 1)
					{
						$btn = '<button class="btn btn-success">Active</button>';
					}
					else
					{
						$btn = '<button class="btn btn-danger">Deactive</button>';
					}
					echo '<tr>
							<td>'.$student['name'].'</td>
							<td>'.$this->getInstituteName('institute_info','institute_id',$student['institute_id'],'name').'</td>
							<td>'.$student['email'].'</td>
							<td>'.$student['dob'].'</td>
							<td>'.$student['joining_date'].'</td>
							<td>'.$student['session'].'</td>
							<td><a href="edit-student.php?uid='.$student['user_id'].'"><button class="btn btn-info">Edit</button></a></td>
							<td>'.$btn.'</td>
						</tr>';
				}
			}
		 }
		 
		 /*
		 - Method to get the faculty list 
		 - Auth Dipanjan 
		 */
		 public function getFacultyList()
		 {
			 //get all values from database
		 	 $facultys = $this->_DAL_Obj->getValue('faculty_info','*');
			
			if(!empty($facultys[0]))
			{
				foreach ($facultys as $faculty)
				{
					//getting faculty status
					if($faculty['teachers_status'] == 1)
					{
						$btn = '<button class="btn btn-success">Active</button>';
					}
					else
					{
						$btn = '<button class="btn btn-danger">Deactive</button>';
					}
					echo '<tr>
							<td>'.$faculty['name'].'</td>
							<td>'.$this->getInstituteName('institute_info','institute_id',$faculty['institute_id'],'name').'</td>
							<td>'.$faculty['email'].'</td>
							<td>'.$faculty['dob'].'</td>
							<td>'.$faculty['course'].'</td>
							<td>'.$faculty['division'].'</td>
							<td><a href="edit-faculty.php?uid='.$faculty['user_id'].'"><button class="btn btn-info">Edit</button></a></td>
							<td>'.$btn.'</td>
						</tr>';
				}
			}
		 }
		 
		 /*
		 - Method to get the chair person list 
		 - Auth Dipanjan 
		 */
		 public function getChairPersonList()
		 {
			 //get all values from database
		 	 $chairpersons = $this->_DAL_Obj->getValue('chairperson_info','*');
			
			if(!empty($chairpersons[0]))
			{
				foreach ($chairpersons as $chairperson)
				{
					//getting chairperson status
					if($chairperson['chairman_status'] == 1)
					{
						$btn = '<button class="btn btn-success">Active</button>';
					}
					else
					{
						$btn = '<button class="btn btn-danger">Deactive</button>';
					}
					echo '<tr>
							<td>'.$chairperson['name'].'</td>
							<td>'.$this->getInstituteName('institute_info','institute_id',$chairperson['institute_id'],'name').'</td>
							<td>'.$chairperson['email'].'</td>
							<td>'.$chairperson['dob'].'</td>
							<td>'.$chairperson['course'].'</td>
							<td>'.$chairperson['division'].'</td>
							<td><a href="edit-chairperson.php?uid='.$chairperson['user_id'].'"><button class="btn btn-info">Edit</button></a></td>
							<td>'.$btn.'</td>
						</tr>';
				}
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
							<td>'.$course['session'].'</td>
							<td>'.$course['hours'].'</td>
							<td><a href="edit-course.php?cid='.$course['course_id'].'"><button class="btn btn-info">Edit</button></a></td>
							<td>'.$btn.'</td>
						</tr>';
				}
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
		 - Method to get the institute list 
		 - Auth Dipanjan 
		 */
		 public function getInstituteList()
		 {
			 //get all values from database
		 	 $institutes = $this->_DAL_Obj->getValue('institute_info','*');
			
			if(!empty($institutes[0]))
			{
				foreach ($institutes as $institute)
				{
					//getting institute status
					if($institute['institute_status'] == 1)
					{
						$btn = '<button class="btn btn-success">Active</button>';
					}
					else
					{
						$btn = '<button class="btn btn-danger">Deactive</button>';
					}
					echo '<tr>
							<td>'.$institute['name'].'</td>
							<td>'.$institute['email'].'</td>
							<td>'.$institute['institute_type'].'</td>
							<td>'.$institute['mobile'].'</td>
							<td><a href="edit-institute.php?uid='.$institute['institute_id'].'"><button class="btn btn-info">Edit</button></a></td>
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
		 - Method to get total number of category
		 - Auth Dipanjan 
		 */
		 public function getTotalCategory($table_name,$column_name,$column_value)
		 {
			 //get all values from table
			 $getValues = $this->_DAL_Obj->getRowValueMultipleCondition($table_name,$column_name,$column_value);
			 echo $getValues;
		 }
		 
		 /*
		 - Method to get ticket list
		 - Auth Dipanjan 
		 */
		 public function getTicketList($status)
		 {
			 //getting values of ticket
			 $tickets = $this->_DAL_Obj->getValueWhere('submit_ticket','*','status',$status);
			 if(!empty($tickets[0]))
			 {
				 
				 if($status == 1)
				 {
					 foreach($tickets as $ticket)
					 {
						//getting user credentials
				 		$userCred = $this->_DAL_Obj->getValueWhere('users','*','user_id',$ticket['created_by']);
						
						echo '<tr>
								<td>'.$ticket['email'].'</td>
								<td>'.$userCred[0]['user_type'].'</td>
								<td>'.$ticket['title'].'</td>
								<td>'.$ticket['subject'].'</td>
								<td>'.$ticket['date'].'</td>
								<td><a href="ticket-details.php?id='.$ticket['id'].'"><button class="btn btn-info">Details</button></a></td>
							</tr>';
					 }
					 
				 }
				 else if($status == 0)
				 {
					 foreach($tickets as $ticket)
					 {
						//getting user credentials
				 		$userCred = $this->_DAL_Obj->getValueWhere('users','*','user_id',$ticket['created_by']);
						
						echo '<tr>
								<td>'.$ticket['email'].'</td>
								<td>'.$userCred[0]['user_type'].'</td>
								<td>'.$ticket['title'].'</td>
								<td>'.$ticket['subject'].'</td>
								<td>'.$ticket['date'].'</td>
								<td><a href="ticket-details.php?id='.$ticket['id'].'"><button class="btn btn-info">Details</button></a></td>
							</tr>';
					 }
				 }
			 }
			 else
			 {
				 echo '<tr>
				 		<td colspan="6">No Result Found</td>
				 	</tr>';
			 }
		 }
		 
		 /*
		 - Method to get ticket details
		 - Auth Dipanjan 
		 */
		 public function getTicketDetails($ticket_id)
		 {
			 //get values of ticket
			 $ticket_details = $this->_DAL_Obj->getValueWhere('submit_ticket','*','id',$ticket_id);
			 //get user credential details
			 $user_cred = $this->_DAL_Obj->getValueWhere('users','*','user_id',$ticket_details[0]['created_by']);
			 return array($ticket_details,$user_cred);
		 }
	 }
?>
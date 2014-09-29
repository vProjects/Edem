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
		 function getAdvisors($userId)
		 {
		 	$institute = $this->_DAL_Obj->getValueWhere('chairperson_info', '*', 'user_id', $userId);
		 	$instituteId = $institute[0]['institute_id'];
		 	$faculties = $this->_DAL_Obj->getValueWhere('faculty_info', '*', 'institute_id', $instituteId);
			//generate the HTML output for select box
			if( !empty($faculties) )
			{
				foreach ($faculties as $faculty)
				{
					echo '<option value="'.$faculty['id'].'">'.$faculty['f_name'].' '.$faculty['m_name'].' '.$faculty['l_name'].'</option>';
				}
			}
			else
			{
				echo '<option value="">No Faculties.</option>';
			}
		 }
		 
		 /*
		 - method to get institute name
		 - Auth: Debojyoti 
		 */
		 function getInstituteId($userId)
		 {
		 	$institute = $this->_DAL_Obj->getValueWhere('chairperson_info', '*', 'user_id', $userId);
		 	$instituteId = $institute[0]['institute_id'];
			$instituteInfo = $this->_DAL_Obj->getValueWhere('institute_info', '*', 'institute_id', $instituteId);
			return $instituteInfo[0]['id'];
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
		 function getCreatorName($userId)
		 {
		 	$creator_name = $this->_DAL_Obj->getValueWhere('chairperson_info', '*', 'user_id', $userId);
			
		 }
	 }
?>
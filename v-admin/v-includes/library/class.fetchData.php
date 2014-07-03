<?php
	session_start();
	//include the DAL library to use the model layer methods
	include 'library.DAL.php';
	
	//class for fetching data of ajax request
	class fetchData
	{
		public $manageContent;
		
		/*
		- method for constructing DAL, Utility, Mail class
		- Auth: Dipanjan
		*/	
		function __construct()
		{
			$this->manageContent = new DAL_Library();
		}
		
		/*
		- method for getting session list from Institute id
		- Auth: Dipanjan
		*/
		function getSessionListFromInst($userData)
		{
			//get values from database
			$stuList = $this->manageContent->getValueMultipleCondtn('students_info','*',array('institute_id','status'),array($userData['inst_id'],1));
			if(!empty($stuList[0]))
			{
				//initiate an array to store session value
				$sessionList = array();
				echo '<option value="-1">-- Select Session --</option>';
				foreach($stuList as $stu)
				{
					if(!in_array($stu['session'],$sessionList))
					{
						array_push($sessionList,$stu['session']);
					}
				}
				//showing option value from array
				foreach($sessionList as $key=>$value)
				{
					echo '<option value="'.$value.'">'.$value.'</option>';
				}
			}
			else
			{
				echo '<option>No Student Found</option>';
			}
		}
		
		/*
		- method for getting faculty list from Institute id
		- Auth: Dipanjan
		*/
		function getFacultyListFromInst($userData)
		{
			//get values from database
			$facList = $this->manageContent->getValueMultipleCondtn('faculty_info','*',array('institute_id','teachers_status'),array($userData['inst_id'],1));
			if(!empty($facList[0]))
			{
				foreach($facList as $fac)
				{
					echo '<option value="'.$fac['user_id'].'">'.$fac['name'].'</option>';
				}
			}
		}
		
		/*
		- method for getting student list
		- Auth: Dipanjan
		*/
		function getStudentList($userData)
		{
			//get values from database
			$stuList = $this->manageContent->getValueMultipleCondtn('students_info','*',array('institute_id','session','status'),array($userData['institute'],$userData['session'],1));
			if(!empty($stuList[0]))
			{
				foreach($stuList as $stu)
				{
					echo '<option value="'.$stu['user_id'].'">'.$stu['name'].'</option>';
				}
			}
			else
			{
				echo '<option>No Student Found</option>';
			}
		}
		
		/*
		- method for showing selected student list
		- Auth: Dipanjan
		*/
		function getSelectedStudentList($userData)
		{
			//getting selected and setted student id into an array
			$selectedStu = explode(',',$userData['selectedStuId']);
			$steStu = explode(',',$userData['setStuId']);
			//getting new student id
			$newStu = array_diff($selectedStu,$steStu);
			if(!empty($newStu))
			{
				foreach($newStu as $key=>$value)
				{
					//getting student info
					$stuInfo = $this->manageContent->getValueWhere('students_info','*','user_id',$value);
					if(!empty($stuInfo[0]))
					{
						echo '<option value="'.$value.'" selected="selected">'.$stuInfo[0]['name'].'</option>';
					}
				}
			}
		}
		
		/*
		- method for removing selected student list
		- Auth: Dipanjan
		*/
		function removeSelectedStudentList($userData)
		{
			//print_r($userData['removeStuId']);
			//print_r($userData['setStuId']);
			//getting selected and setted student id into an array
			$removeStu = explode(',',$userData['removeStuId']);
			$steStu = explode(',',$userData['setStuId']);
			//getting sorting student id
			$sortStu = array_diff($steStu,$removeStu);
			if(!empty($sortStu))
			{
				foreach($sortStu as $key=>$value)
				{
					//getting student info
					$stuInfo = $this->manageContent->getValueWhere('students_info','*','user_id',$value);
					if(!empty($stuInfo[0]))
					{
						echo '<option value="'.$value.'" selected="selected">'.$stuInfo[0]['name'].'</option>';
					}
				}
			}
			else
			{
				echo '';
			}
		}
		
		/*
		- method for getting chairperson list from institute id
		- Auth: Dipanjan
		*/
		function getChairpersonListFromInstitute($userData)
		{
			//get values from database
			$chairs = $this->manageContent->getValueMultipleCondtn('chairperson_info','*',array('institute_id','chairman_status'),array($userData['institute'],1));
			if(!empty($chairs[0]))
			{
				foreach($chairs as $chair)
				{
					echo '<option value="'.$chair['user_id'].'">'.$chair['name'].'</option>';
				}
			}
		}
		
		/*
		- method for getting faculty list from institute id
		- Auth: Dipanjan
		*/
		function getFacultyListFromInstitute($userData)
		{
			//get values from database
			$chairs = $this->manageContent->getValueMultipleCondtn('faculty_info','*',array('institute_id','teachers_status'),array($userData['institute'],1));
			if(!empty($chairs[0]))
			{
				foreach($chairs as $chair)
				{
					echo '<option value="'.$chair['user_id'].'">'.$chair['name'].'</option>';
				}
			}
		}
		
		/*
		- method for getting room list from institute id
		- Auth: Dipanjan
		*/
		function getRoomListFromInstitute($userData)
		{
			//get values from database
			$chairs = $this->manageContent->getValueMultipleCondtn('rooms','*',array('institute_id'),array($userData['institute']));
			if(!empty($chairs[0]))
			{
				echo '<option value="-1">--  Select An Option --</option>';
				foreach($chairs as $chair)
				{
					echo '<option value="'.$chair['room_name'].'">'.$chair['room_name'].'</option>';
				}
			}
		}
		
		/*
		- method for getting group list from institute id
		- Auth: Dipanjan
		*/
		function getGroupListFromInstitute($userData)
		{
			//get values from database
			$chairs = $this->manageContent->getValueMultipleCondtn('group_info','*',array('institute_id','group_status'),array($userData['institute'],1));
			if(!empty($chairs[0]))
			{
				foreach($chairs as $chair)
				{
					echo '<option value="'.$chair['group_id'].'">'.$chair['group_name'].'</option>';
				}
			}
		}
		
		/*
		- method for showing selected group list
		- Auth: Dipanjan
		*/
		function getSelectedGroupList($userData)
		{
			//getting selected and setted student id into an array
			$selectedStu = explode(',',$userData['selectedGroupId']);
			$steStu = explode(',',$userData['setGroupId']);
			//getting new student id
			$newStu = array_diff($selectedStu,$steStu);
			if(!empty($newStu))
			{
				foreach($newStu as $key=>$value)
				{
					//getting student info
					$stuInfo = $this->manageContent->getValueWhere('group_info','*','group_id',$value);
					if(!empty($stuInfo[0]))
					{
						echo '<option value="'.$value.'" selected="selected">'.$stuInfo[0]['group_name'].'</option>';
					}
				}
			}
		}
		
		/*
		- method for removing selected group list
		- Auth: Dipanjan
		*/
		function removeSelectedGroupList($userData)
		{
			//print_r($userData['removeStuId']);
			//print_r($userData['setStuId']);
			//getting selected and setted student id into an array
			$removeStu = explode(',',$userData['removeGroupId']);
			$steStu = explode(',',$userData['setGroupId']);
			//getting sorting student id
			$sortStu = array_diff($steStu,$removeStu);
			if(!empty($sortStu))
			{
				foreach($sortStu as $key=>$value)
				{
					//getting student info
					$stuInfo = $this->manageContent->getValueWhere('group_info','*','group_id',$value);
					if(!empty($stuInfo[0]))
					{
						echo '<option value="'.$value.'" selected="selected">'.$stuInfo[0]['group_name'].'</option>';
					}
				}
			}
			else
			{
				echo '';
			}
		}
			
	}
	
	/* receiving data from UI layer Form */
	//making object of class fetchData 
	$fetchData = new fetchData();
	//applying switch case
	switch($GLOBALS['_POST']['refData'])
	{
		//for session list from Institute id
		case 'sessionListFromInstitute':
		{
			$sessionList = $fetchData->getSessionListFromInst($GLOBALS['_POST']);
			break;
		}
		//for faculty list from Institute id
		case 'facultyListFromInstitute':
		{
			$facultyList = $fetchData->getFacultyListFromInst($GLOBALS['_POST']);
			break;
		}
		//for student list from Institute and session
		case 'studentList':
		{
			$studentList = $fetchData->getStudentList($GLOBALS['_POST']);
			break;
		}
		//for showing selected student list
		case 'insertStudentList':
		{
			$selectedStuList = $fetchData->getSelectedStudentList($GLOBALS['_POST']);
			break;
		}
		//for removeing selected student list
		case 'removeStudentList':
		{
			$removeSelectedStuList = $fetchData->removeSelectedStudentList($GLOBALS['_POST']);
			break;
		}
		//for getting chairperson list from institute id
		case 'chairpersonListFromInst':
		{
			$chairpersonList = $fetchData->getChairpersonListFromInstitute($GLOBALS['_POST']);
			break;
		}
		//for getting faculty list from institute id
		case 'facultyListFromInst':
		{
			$facultyList = $fetchData->getFacultyListFromInstitute($GLOBALS['_POST']);
			break;
		}
		//for getting room list from institute id
		case 'roomListFromInst':
		{
			$roomList = $fetchData->getRoomListFromInstitute($GLOBALS['_POST']);
			break;
		}
		//for getting group from institute id
		case 'groupListFromInst':
		{
			$groupList = $fetchData->getGroupListFromInstitute($GLOBALS['_POST']);
			break;
		}
		//for showing selected group list
		case 'insertGroupList':
		{
			$selectedGroupList = $fetchData->getSelectedGroupList($GLOBALS['_POST']);
			break;
		}
		//for removeing selected group list
		case 'removeGroupList':
		{
			$removeSelectedGroupList = $fetchData->removeSelectedGroupList($GLOBALS['_POST']);
			break;
		}
		default:
		{
			break;	
		}
	}

?>
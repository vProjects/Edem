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
	 }
?>
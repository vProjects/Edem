<?php
	//include class library of database connection
	include 'class.database.php';
	

	class DAL_Library
	{
		public $link;
		
		//construct function
		function __construct()
		{
			$db_Connection = new dbConnection();
			$this->link = $db_Connection->connect();
			return $this->link;
		}
		
		
		function getValue($table_name,$value)
		{
			$query = $this->link->query("SELECT $value from $table_name");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		function getValueWhere($table_name,$value,$row_value,$value_entered)
		{
			try{
				$query = $this->link->prepare("SELECT $value from $table_name where $row_value='$value_entered'");
				$query->execute();
				$rowcount = $query->rowCount();
				if($rowcount > 0){
					$result = $query->fetchAll(PDO::FETCH_ASSOC);
					return $result;
				}
				else{
					return $rowcount;
				}
			}
			catch(Exception $e)
			{
				throw "Result Not Found";
			}
		}
		
		function insertValue($insert_ar)
		{
			$table_name = $insert_ar['table'];
			//initialize the values
			$index_i = "";
			$value_i = "";
			$q_array = array();
			
			//get the values for the inserting
			$values = $insert_ar['values'];
			
			foreach( $values as $valKey => $val )
			{
				$value_i .= '"'.$val.'", ';
				$index_i .= '`'.$valKey.'`, ';
			}
			
			//remove the commas from the end of the string
			$value_i = substr($value_i, 0, -2);
			$index_i = substr($index_i, 0, -2);
		
			//create the insert query
			$sql = "INSERT INTO `".$table_name."` (".$index_i.") VALUES (".$value_i.")" ;
			
			$query = $this->link->prepare($sql);
			$query->execute();
			
			return $query->rowCount();
		}
		
		function getValueAll( $query_array )
		{
			
		}
		
		/*
		- function to get the values from table with multiple conditions
		- auth: Dipanjan
		*/
		function getValueMultipleCondtn($table_name,$col_value,$column_name,$column_values)
		{
			//declaring variables for preparing the query
			$column = "";
			$value = "";
			
			for($i=0;$i<count($column_name);$i++)
			{
				$column = $column." AND ".$column_name[$i]."='".$column_values[$i]."'";
				
			}
			$column = substr($column,5);
			
			$query = $this->link->prepare("SELECT ". $col_value ." from ". $table_name ." where ". $column);
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
			
		}
	}
?>
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
		
		/*
		- method for updating the values using where clause
		- auth: Dipanjan
		*/
		function updateValueWhere($table_name,$update_column,$update_value,$column_name,$column_value)
		{
			$query = $this->link->prepare("UPDATE `$table_name` SET `$update_column`= '$update_value' WHERE `$column_name` = '$column_value'");
			$query->execute();
			$count = $query->rowCount();
			return $count;
		}
		
		/*
		- method for updating the values using where clause with multiple conditions
		- auth: Dipanjan
		*/
		function updateValueMultipleCondition($table_name,$update_column,$update_value,$column_name,$column_values)
		{
			//declaring variables for preparing the query
			$column = "";
			$value = "";
			
			for($i=0;$i<count($column_name);$i++)
			{
				$column = $column." AND ".$column_name[$i]."='".$column_values[$i]."'";
				
			}
			$column = substr($column,5);
			
			$query = $this->link->prepare("UPDATE `$table_name` SET `$update_column`= '$update_value' WHERE ". $column);
			$query->execute();
			$count = $query->rowCount();
			return $count;
		}
		
		/*
		- method for getting no of rows using multiple conditions
		- auth: Dipanjan
		*/
		function getRowValueMultipleCondition($table_name,$column_name,$column_values)
		{
			//declaring variables for preparing the query
			$column = "";
			$value = "";
			
			for($i=0;$i<count($column_name);$i++)
			{
				$column = $column." AND ".$column_name[$i]."='".$column_values[$i]."'";
				
			}
			$column = substr($column,5);
			
			$query = $this->link->prepare("SELECT * from ". $table_name ." where ". $column);
			$query->execute();
			$rowcount = $query->rowCount();
			return $rowcount;
			
		}
	}
?>
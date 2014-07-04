<?php
    session_start();
	//include the DAL library and create object
	include '../library/library.DAL.php';
	$DAL_Obj = new DAL_Library() ;
	
	if(isset($_POST['name']) && !empty($_POST['name']))
	{
		$update = $DAL_Obj->updateValueWhere('rooms','room_name',$_POST['name'],'id',$_POST['id']);
	}
	
	//redirect
	header('Location: ../../edit-room.php?id='.$_POST['id']);
?>
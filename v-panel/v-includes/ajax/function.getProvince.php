<?php
	//include the BLL library
	include '../library/library.BLL.php';
	
	//create an object of BLL
	$BLL_Obj = new BLL_Library();
	
	$BLL_Obj->getGeoSelectBox('province', $GLOBALS["_POST"]['id']);
?>
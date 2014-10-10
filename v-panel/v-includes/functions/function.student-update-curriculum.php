<?php
	$b = $GLOBALS["_POST"];
	$json_decoded = json_decode($b['data']);
	print_r($json_decoded);
?>

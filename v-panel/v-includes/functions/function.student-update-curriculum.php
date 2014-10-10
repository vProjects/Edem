<?php
	$b = $GLOBALS["_POST"];
	$json_decoded = json_decode($b['c']);
	print_r($json_decoded);
?>

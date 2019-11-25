<?php
	header('Content-type: text/plain');
	$tab = $_GET;
	foreach ($tab as $key => $value) 
	{
		echo $key.":".$value;
		echo "\n";
	}

?>
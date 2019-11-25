#!/usr/bin/php
<?php
$tab = $argv[1];
printf(preg_replace('/ +/', ' ', trim($tab)));
if (isset($tab) && !empty($tab))
	echo("\n");
?>

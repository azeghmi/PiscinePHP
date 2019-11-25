#!/usr/bin/php
<?php
if ($argc > 1)
{
	$res = trim($argv[1]);
	$res = preg_replace('/[ \t]+/', ' ', $res);
	echo $res."\n";
}
?>
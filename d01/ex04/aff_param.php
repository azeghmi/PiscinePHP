#!/usr/bin/php
<?php
$i = 1;
while ($i < $argc)
{
	if (isset($argv[$i]))
	{
		printf($argv[$i]);
		printf("\n");
	}
	$i++;
}

?>

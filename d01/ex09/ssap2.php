#!/usr/bin/php
<?php
$tab = implode(" ", $argv);
$tab = preg_replace('/\s+/', ' ', $tab);
$tab = trim($tab);
$tab = explode(" ", $tab);
$name = array_shift($tab);
if (empty($tab))
	return NULL;
if ($argc != 1)
{
	foreach ($tab as $elem)
	{
		if (($elem[0] >='A' && $elem[0] <= 'Z') || ($elem[0] >='a' && $elem[0] <= 'z'))
			$alpha[] = $elem;
		else if ($elem[0] >= '0' && $elem[0] <= '9')
			$number[] = $elem;
		else
			$other[] = $elem;
	}
	sort($number, SORT_STRING);
	sort($alpha, SORT_NATURAL | SORT_FLAG_CASE);
	sort($other);
	foreach ($alpha as $elem) 
		echo $elem."\n";
	foreach ($number as $elem) 
		echo $elem."\n";
	foreach ($other as $elem)
	{
		$n++;
		echo $elem;
		if ($n == count($other))
			break ;
		printf("\n");
	}
}
?>


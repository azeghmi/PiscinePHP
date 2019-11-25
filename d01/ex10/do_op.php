#!/usr/bin/php
<?php
if ($argc == 4)
{
	$param1 = trim($argv[1]);
	$param2 = trim($argv[2]);
	$param3 = trim($argv[3]);
	if (!is_numeric($param1) || !is_numeric($param1))
		return NULL;
	if ($param3 == '0' && ($param2 == '/' || $param2 == '%'))
	{
		echo "Division par 0 impossible\n";
		return NULL;
	}
	switch ($param2)
	{
		case '+':
			$res = $param1 + $param3;
			break;
		case '-':
			$res = $param1 - $param3;
			break;
		case '*':
			$res = $param1 * $param3;
			break;
		case '/':
			$res = $param1 / $param3;
			break;
		case '%':
			$res = $param1 % $param3;
			break;
	}
	echo $res."\n";
}
else
	echo "Incorrect Parameters\n";
?>

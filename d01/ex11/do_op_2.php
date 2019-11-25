#!/usr/bin/php
<?php
if ($argc != 2)
{
	printf("Incorrect Parameters\n");
	return NULL;
}
else
{
	$tab = preg_replace ("/\s+/", " ", $argv[1]);
	if (!is_numeric($tab[0]))
	{
		echo "Syntax Error\n";
		return NULL;
	}
	$i = 0;
	while ($i < strlen($tab))
	{
		if (is_numeric($tab[$i]) && $tab[$i + 1] == " " && is_numeric($tab[$i + 2]))
		{
			echo "Incorrect Parameters\n";
			return NULL;
		}
		$i++;
	}
	$tab = str_replace(" ", "", $argv[1]);
	$pos = strpos($tab, "+");
	$neg = strpos($tab, "-");
	$mul = strpos($tab, "*");
	$div = strpos($tab, "/");
	$mod = strpos($tab, "%");
	if ($pos)
		$op = $tab[$pos];
	if ($neg)
		$op = $tab[$neg];
	if ($mul)
		$op = $tab[$mul];
	if ($div)
		$op = $tab[$div];
	if ($mod)
		$op = $tab[$mod];
	if ($tab[strlen($tab) - 1] == '0' && ($tab[strlen($tab) - 2] == '/' || $tab[strlen($tab) - 2] == '%'))
    {
        echo "Division par 0 impossible\n";
        return NULL;
    }
    if (!$tab)
    	return NULL;
	$tab = explode($op, $tab);
	switch ($op)
	{
    	case '+':
        	$res = $tab[0] + $tab[1];
        	break;
    	case '-':
    	    $res = $tab[0] - $tab[1];
    	    break;
    	case '*':
    	    $res = $tab[0] * $tab[1];
    	    break;
    	case '/':
    	    $res = $tab[0] / $tab[1];
    	    break;
    	case '%':
    	    $res = $tab[0] % $tab[1];
    	    break;
	}
	echo $res."\n";
}

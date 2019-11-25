#!/usr/bin/php
<?php
if ($argc < 3)
	return (0);
function check($chaine)
{
	$chaine = trim($chaine);
	$space = substr_count($chaine, " ");
	if ($space > 0)
		return (0);
	if (strpos($chaine, ':') == FALSE)
		return (0);
	else 
		$poss = strpos($chaine, ':');
	$nb_str = substr($chaine, $poss + 1);
	$str_str = substr($chaine, $poss + 1);
	if (is_numeric ($nb_str) == FALSE)
		$num = 1;
	if (ctype_alpha ($str_str) == FALSE)
		$alph = 1;
	if (empty($alph) && empty($num) || $alph == 1 && $num == 1)
		return (0);
	else 
		return(1);
}
$i = 2;
$a = 1;
ctype_alpha ($argv[1]) == true ? $save = $argv[1] : $save;
is_numeric ($argv[1]) == true ? $save = $argv[1] : $save;
$save = trim($argv[1]);
while ($a < $argc)
{
	if (check($argv[$i]) == 1)
		break;
	$a++;
	$i++;
}
if(stristr($argv[$i], $save) == FALSE)
	return (0);
$j = strpos($argv[$i], ':');
$j = $j + 1;
$result = substr($argv[$i], $j);
echo "$result\n";
?>

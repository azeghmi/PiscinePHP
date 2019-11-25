#!/usr/bin/php
<?php
function trimUltime($chaine)
{
   $chaine = trim($chaine);
   $chaine = str_replace("/t", " ", $chaine);
   $chaine = str_replace("  ", " ", $chaine);
   $chaine = preg_replace ("/\s+/", " ", $chaine);
   return ($chaine);
}
$str = trimUltime($argv[1]);
$n = strrpos($str, " ") + 1;
if (!(strrpos($str, " ")))
	$n = 0;
$i = $n;
if ($argc == 1)
	printf($argv[1]);
else
{
	if (empty($argv[1]))
		return NULL;
	while ($str[$i])
	{
		printf($str[$i]);
		$i++;
	}
	if ($n != 0)
		printf(" ");
	$j = 0; 
	while ($j < $n - 1)
	{
		printf($str[$j]);
		$j++;
	}
	echo "\n";
}
?>
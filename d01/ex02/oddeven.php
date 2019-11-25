#!/usr/bin/php
<?php
while (1)
{
	print("Entrez un nombre: ");
	$nb = fgets(STDIN);
	$nb = str_replace("\n", "", $nb);
	$nb_str = (string)$nb;	
	$nb = substr($nb, -1);
	if (!is_numeric($nb))
	{
		echo("'".$nb_str."' n'est pas un chiffre\n");
		continue;
	}
	if ($nb % 2)
		echo("Le chiffre " . $nb_str . " est Impair\n");
	else
		echo("Le chiffre " . $nb_str . " est Pair\n");
}
?>

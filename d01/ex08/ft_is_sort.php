#!/usr/bin/php
<?php
function ft_is_sort($tab){
	$i = 0;
	$t = $tab;
	sort($t);
	for ($i=0; $i <= count($tab) - 1; $i++) { 
		if ($t[$i] != $tab[$i])
			return FALSE;
	}
	return TRUE;
}


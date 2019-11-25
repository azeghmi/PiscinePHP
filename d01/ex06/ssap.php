#!/usr/bin/php
<?php
if ($argc >= 2)
{
	$j = 1;
	$i = 0;
	while($argv[$j])
	{
    	 $tab[$i] = explode(" ", $argv[$j]);
    	 $i++;
    	 $j++;
	}
	$i = 0;
	$new_tab = array();
	if ($tab)
	{
		foreach($tab as $elem)
  			foreach($elem as $value)
    			array_push($new_tab, $value);
		sort($new_tab);
		foreach($new_tab as $print)
		{
    		print($print);
    		echo "\n";
		}
	}
}
?>
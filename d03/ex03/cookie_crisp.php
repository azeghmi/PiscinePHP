<?php
	$tab = $_GET;
	switch ($tab['action']) 
	{
	case("set"):
		if ($tab['name'] && $tab['value'])
			setcookie($tab['name'], $tab['value']);
			break;
	case("get"):
		if ($tab['name'] && $_COOKIE[$tab['name']] && !$tab['value'])
			echo $_COOKIE[$tab['name']]."\n";
			break;
	case("del"):
		if ($tab['name'] && !$tab['value'])
			setcookie($tab['name'], '', 1);
			break;
	}
?>
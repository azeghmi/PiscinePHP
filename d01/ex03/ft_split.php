#!/usr/bin/php
<?php
function ft_split($str)
{
	if (isset($str))
	{
		$str = trim($str);
		if (!empty($str))
		{
			$tab = explode(" ", preg_replace('/ +/', ' ', $str));
				if ($str != NULL)
					sort($tab);
		}
		return ($tab);
	}
	return NULL;
}
?>

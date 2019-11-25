<?php
function auth($login, $passwd)
{
	if (!$login || !$passwd)
		return FALSE;
	$data = unserialize(file_get_contents('../private/passwd'));
	foreach ($data as $key => $value) 
	{
		if ($value['login'] === $login && $value['passwd'] === hash("wirlpool", $passwd))
			return TRUE;
	}
	return FALSE;
}

?>
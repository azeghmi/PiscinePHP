<?php
if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] === "OK")
{
	if (!file_exists('../private'))
		mkdir("../private");
	if (!file_exists('../private/passwd')) 
		file_put_contents('../private/passwd', null);
	$data = unserialize(file_get_contents('../private/passwd'));
	$flag = 0;
	if ($data)
	{
		foreach ($data as $key => $value)
		{
			if ($value['login'] === $_POST['login'])
				$flag = 1;
		}
	}
	if ($flag) 
		echo "ERROR\n";
	else 
	{
		$tmp['login'] = $_POST['login'];
		$tmp['passwd'] = hash('whirlpool', $_POST['passwd']);
		$data[] = $tmp;
		file_put_contents('../private/passwd', serialize($data));
		echo "OK\n";
	}
}
else
	echo "ERROR\n";
?>

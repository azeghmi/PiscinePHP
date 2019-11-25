<?php
if ($_POST['login'] && $_POST['oldpwd'] && $_POST['newpwd'] && $_POST['submit'])
{
	$data = unserialize(file_get_contents('../private/passwd'));
	if ($data)
	{
		$flag = 0;
		foreach ($data as $key => $value)
		{
			if ($value['login'] === $_POST['login'] && $value['passwd'] === hash("whirlpool", $_POST['oldpwd']))
			{
				$flag = 1;
				$data[$key]['passwd'] = hash("whirlpool", $_POST['newpwd']);
			}
		}
		if ($flag)
		{
			file_put_contents('../private/passwd', serialize($data));
			echo "OK\n";
		}
		else
			echo "ERROR\n";	
	}
	else
		echo "ERROR\n";
}
else
	echo "ERROR\n";
?>

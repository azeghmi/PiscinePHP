<?php
session_start();
$boolLogin = false;
$boolPass = false;
include("bd_connection.php");
$sql = "SELECT * FROM client";
$result = $conn->query($sql);
$login = $_POST["login"];
$passwd = $_POST["passwd"];
if (isset($_POST['connect']))
{
	if(!$login === "" || $passwd === "")
	{
		echo "Login or password incorrect.";
		return ;
	}
	// $result = $result->fetch_array():
	// var_dump($result);
	// if ($result->num_rows > 0)
	// {
		foreach($result as $row)
		{
			if ($row["login"] == $login && $row["password"] == hash('whirlpool', $passwd))
				$boolLogin = true;
		}
	// }
	if ($boolLogin)
	{
		$_SESSION['login'] = $login;
		header("Location: http://localhost:8080/");
	}
	else
		echo "Login or password incorrect.";
	$conn->close();
}


?>

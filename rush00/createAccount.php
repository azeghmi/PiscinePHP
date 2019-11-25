<?php
function create_account()
{
	include("bd_connection.php");
	$login = $_POST["login"];
	$passwd = $_POST["passwd"];
	$nom = $_POST["nom"];
	$prenom = $_POST["prenom"];
	$email = $_POST["email"];
	$verifPassword = $_POST["verifPasswd"];
	if (isset($_POST['create']))
	{
		if (!$login === "" || $passwd === "" || $verifPassword === "")
		{
			echo "Please complete all informations.";
			// header("Location: http://127.0.0.1:8080/createAccount.html");
			return ;
		}
		if ($passwd != $verifPassword)
		{
			echo "Error, passwords are not the same.";
			return ;
		}
		$passwd = hash('whirlpool', $passwd);
		$sql = "INSERT INTO client (login, email, nom, prenom, password)
		VALUES ('$login', '$email', '$nom','$prenom','$passwd')";
		if ($conn->query($sql) === TRUE) {
			echo "Account created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
		header("Location: http://127.0.0.1:8080");
	}
}
if (isset($_POST['create']))
	create_account();
	?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="createAccount.css">
		<title>Create account</title>
	</head>
	<body>
		<form method="post" action="createAccount.php" id="createForm">
			Nom:<br>
  			<input type="text" name="nom"><br>
  			Prenom:<br>
			<input type="text" name="prenom"><br>
			Email:<br>
			<input type="text" name="email"><br>
			Login:<br>
			<input type="text" name="login"><br>
			Password:<br>
			<input type="password" name="passwd"><br>
			Verify password:<br>
			<input type="password" name="verifPasswd"><br>
			<input type="submit" value="Create account" name="create">
		</form>
	</body>
</html>

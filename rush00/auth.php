<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Minishop</title>
		<link rel="stylesheet" href="index.css">
	</head>
	<body>
		<?php
  			if ($_SESSION['login'] == "")
  			{
				echo "
				<form method=\"post\" action=\"connexion.php\" id=\"connectForm\">
					<h4>Login:<br></h4>
					<input type=\"text\" name=\"login\">
					<h4>Password:</h4>
					<input type=\"password\" name=\"passwd\"><br>
					<input type=\"submit\" value=\"Connect\" name=\"connect\">
				</form>
				<a class=\"createAccount\" href=\"createAccount.php\">Create account</a>";
  			}
  			else
  			{
				echo "Hello " . $_SESSION['login'] . "</br></br>";
				echo "<a href=\"logout.php\" style=\"
				float: right; \">Se déconnecter</a><br>";
				echo "<a href=\"modify_account.php\" style=\"
				float: right; \">Modifier mon compte</a>";
			}
			?>
	</body>

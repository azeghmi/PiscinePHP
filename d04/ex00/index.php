<?php
	session_start();
	if ($_GET['login'] && $_GET['passwd'] && $_GET['submit'] === 'OK' )
	{
		$_SESSION['login'] = $_GET['login'];
		$_SESSION['passwd'] = $_GET['passwd'];
	}	
?>

	<html>
		<body>
			<form method="get" action="index.php">
				<label>Identifiant</label>
				<input name="login" id="login" value="<?php echo $_SESSION['login']?>"</input>
				<br/>
				<label>Mot de passe</label>
				<input name="passwd" value="<?php echo ($_SESSION['passwd'])?>"></input>
				<button type="submit" value="OK">Submit</button>
			</form>
		</body>
	</html>

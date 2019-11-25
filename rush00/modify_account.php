<?php
session_start();
include("bd_connection.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="createAccount.css">
		<title>Create account</title>
	</head>
	<body>
		<form method="post" action="modify_account.php" id="modifyForm">
			Modifier nom:<br>
  			<input type="text" name="modif_nom"><br>
  			Modifier Prenom:<br>
			<input type="text" name="modif_prenom"><br>
			Modifier email:<br>
			<input type="text" name="modif_email"><br>
			<input type="submit" value="Modify account" name="modify">
			<input type="submit" value="Supprimer mon compte" name="supprimer" style="float: right;">
		</form>
	</body>
</html>
<?php
$nom = $_POST['modif_nom'];
$prenom = $_POST['modif_prenom'];
$email = $_POST['modif_email'];
$sess_login = $_SESSION['login'];
if (isset($_POST['modify']))
{
	if ($nom !== "")
	{
		$sql_nom = "UPDATE client SET nom = '$nom' WHERE login = '$sess_login'";
			$conn->query($sql_nom);
	}
	if ($prenom !== "")
	{
		$sql_prenom = "UPDATE client SET prenom = '$prenom' WHERE login = '$sess_login'";
		$conn->query($sql_prenom);
	}
	if ($email !== "")
	{
		$sql_email = "UPDATE client SET email = '$email' WHERE login = '$sess_login'";
		$conn->query($sql_email);
	}
}
if (isset($_POST['supprimer']))
{
	$sql_id_client = "SELECT id FROM client WHERE login = '$sess_login'";
	$result = $conn->query($sql_id_client);
	$row = $result->fetch_assoc();
	$id_client = $row['id'];
	$sql_suppr_commande = "DELETE FROM `commande`
	WHERE `id_client` = '$id_client'";
	$conn->query($sql_suppr_commande);
	$sql_suppr = "DELETE FROM `client`
		WHERE `login` = '$sess_login'";
	if ($conn->query($sql_suppr) === TRUE)
		echo "Account deleted successfully";
	$_SESSION['login'] = "";
	header("Location: http://localhost:8080/");
}
?>

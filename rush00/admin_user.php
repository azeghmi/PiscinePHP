<?php
session_start();
include("bd_connection.php");
?>
<h3>Créer un utilisateur </h3>
<?php
include("createAccount.php");
if (isset($_POST['create']))
	create_account();
?>
<h3>Modifier un utilisateur</h3>
<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" href="createAccount.css">
			<title>Admin</title>
		</head>
		<body>
			<form method="post" action="admin_user.php" id="modifyUserForm">
				Id of the user you want to edit:<br>
				<input type="text" name="idModify"><br>
				Change login:<br>
				<input type="text" name="loginModify"><br>
				Change email:<br>
				<input type="text" name="email"><br>
				<input type="submit" value="Modify account" name="modify">
			</form>
			<h3>Delete user</h3>
			<form method="post" action="admin.php" id="delUserForm">
				Id of the user you want to delete:<br>
				<input type="text" name="delId"><br>
				<input type="submit" value="Delete account" name="delete">
			</form>
		</body>
	</html>
<?php
if (isset($_POST['modify']))
{
	$idModify = $_POST['idModify'];
	$login = $_POST['loginModify'];
	$email = $_POST['email'];
	if ($login !== "")
	{
		$sql = "UPDATE client SET login = '$login' WHERE id = $idModify";
		if ($conn->query($sql) === TRUE)
		{
			echo "Account modified successfully";
		} else
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	if ($email !== "")
	{
		$sql = "UPDATE client SET email = '$email' WHERE id = $idModify";
		$conn->query($sql);
	}
}
if (isset($_POST['delete']))
{
	$id = $_POST['delId'];
	if ($id !== "")
	{
		$sql = "DELETE FROM `client`
		WHERE `id` = $id";
		if ($conn->query($sql) === TRUE)
			echo "Account deleted successfully";
		else
			echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>
			<h3>All users</h3>
<?php
$all_users = "SELECT id, login, email, nom, prenom FROM client";
$result = $conn->query($all_users);
if ($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
		echo "id: " . $row["id"]. " - Login: " . $row["login"] . " - Email: " . $row["email"]
		. " - Nom: " . $row["nom"].  " - Prenom: " . $row["prenom"]. "<br>";
}
else
    echo "0 results";
?>

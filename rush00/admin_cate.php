<h3>Ajouter une categorie</h3>
<form method="post" action="admin_cate.php" id="ajouter_produit">
	Nom:<br>
	<input type="text" name="nom_cate"><br>
	<input type="submit" value="Ajouter categorie" name="ajouter_cate">
</form>
<?php
include("bd_connection.php");
if (isset($_POST['ajouter_cate']))
{
	$nom_cate = $_POST['nom_cate'];
	if ($nom_cate !== "")
	{
		$sql_add_cate = "INSERT INTO categories (nom)
		VALUES ('$nom_cate')";
		$conn->query($sql_add_cate);
	}
}
?>

<h3>Modifier une categorie</h3>

<form method="post" action="admin_cate.php" id="modifier_produit">
	Id de la catégorie a modifier:<br>
	<input type="text" name="id_cate_modif"><br>
	Nouveau nom:<br>
	<input type="text" name="nom_cate_modif"><br>
	<input type="submit" value="Modifier categorie" name="modif_cate">
</form>
<?php
if (isset($_POST['modif_cate']))
{
	$id_cate_modif = $_POST['id_cate_modif'];
	$nom_cate_modif = $_POST['nom_cate_modif'];
	if ($id_cate_modif !== "")
	{
		if ($nom_cate_modif !== "")
		{
			$sql_modif_nom = "UPDATE categories SET nom = '$nom_cate_modif' WHERE id = $id_cate_modif";
			$conn->query($sql_modif_nom);
		}
	}
}
?>

<h3>Supprimer une catégorie </h3>
<form method="post" action="admin_cate.php" id="supprimer_cate">
	Id de la catégorie a supprimer:<br>
	<input type="text" name="id_cate_suppr"><br>
	<input type="submit" value="Supprimer catégorie" name="suppr_cate">
</form>
<?php
if (isset($_POST['suppr_cate']))
{
	$id_suppr = $_POST['id_cate_suppr'];
	if ($id_suppr !== "")
	{
		$sql_suppr = "DELETE FROM `categories`
		WHERE `id` = $id_suppr";
		$conn->query($sql_suppr);
	}
}
?>

<h3>Toutes les catégories</h3>
<?php
$all_cate = "SELECT * FROM categories";
$result = $conn->query($all_cate);
if ($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
		echo "id: " . $row["id"]. " - Nom: " . $row["nom"] . "<br>";
}
else
    echo "0 results";
?>

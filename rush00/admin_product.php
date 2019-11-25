<?php
include("bd_connection.php");
?>
<h3>Ajouter un produit</h3>
<form method="post" action="admin_product.php" id="ajouter_produit">
	Id:<br>
	<input type="text" name="id_produit"><br>
	Nom:<br>
	<input type="text" name="nom_produit"><br>
	Prix:<br>
	<input type="text" name="prix_produit"><br>
	Image:<br>
	<input type="text" name="image_produit"><br>
	Description:<br>
	<input type="text" name="description_produit"><br>
	Catégorie:<br>
<SELECT name="cate_produit" size="1">
<?php
$sql_id_cate ="SELECT id, nom FROM categories";
$result = $conn->query($sql_id_cate);
while ($row = $result->fetch_assoc())
	echo '<OPTION>'.$row['id'] . "-" .$row["nom"].'</OPTION>';
?>
</SELECT><BR>
	<input type="submit" value="Ajouter produit" name="ajouter_produit">
</form>

<?php
if (isset($_POST['ajouter_produit']))
{
	$bool = false;
	$id_produit = $_POST['id_produit'];
	$nom_produit = $_POST['nom_produit'];
	$prix_produit = $_POST['prix_produit'];
	$image_produit = $_POST['description_produit'];
	$description_produit = $_POST['description_produit'];
	$sql_verif_id = "SELECT id FROM produit";
	$result = $conn->query($sql_verif_id);
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
			if ($row["id"] == $id_produit)
				$bool = true;
	}
	$cate_produit = $_POST['cate_produit'];
	if ($nom_produit !== "" && $prix_produit !== "" && $image_produit !== "" && !$bool)
	{
		$sql_add = "INSERT INTO produit (id,nom, prix, image, description)
		VALUES ('$id_produit', '$nom_produit', '$prix_produit', '$image_produit','$description_produit')";
		if ($conn->query($sql_add) === TRUE) {
			echo "Produit ajouté avec succès";
		} else {
			echo "Error: " . $sql_add . "<br>" . $conn->error;
		}
		if ($cate_produit !== "")
		{
			$id_cate = explode("-", $cate_produit);
			$sql_add_cate = "INSERT INTO categories_produit (id_produit,id_categories)
			VALUES ('$id_produit', '$id_cate[0]')";
			if ($conn->query($sql_add_cate) === TRUE)
				echo "Produit ajouté avec succès";
			else
				echo "Error: " . $sql_add_cate . "<br>" . $conn->error;

		}
	}
}
?>
<h3>Modifier un produit</h3>
<form method="post" action="admin_product.php" id="modifier_produit">
	Id du produit a modifier:<br>
	<input type="text" name="id_produit_modif"><br>
	Nouveau nom:<br>
	<input type="text" name="nom_produit_modif"><br>
	Nouveau prix:<br>
	<input type="text" name="prix_produit_modif"><br>
	Nouvelle image:<br>
	<input type="text" name="image_produit_modif"><br>
	Nouvelle description:<br>
	<input type="text" name="description_produit_modif"><br>
	<input type="submit" value="Modifier produit" name="modif_produit">
</form>
<?php
if (isset($_POST['modif_produit']))
{
	$id_produit_modif = $_POST['id_produit_modif'];
	$nom_produit_modif = $_POST['nom_produit_modif'];
	$prix_produit_modif = $_POST['prix_produit_modif'];
	$image_produit_modif = $_POST['image_produit_modif'];
	$description_produit_modif = $_POST['description_produit_modif'];
	if ($id_produit_modif !== "")
	{

		if ($nom_produit_modif !== "")
		{
			$sql_modif_nom = "UPDATE produit SET nom = '$nom_produit_modif' WHERE id = $id_produit_modif";
			$conn->query($sql_modif_nom);
		}
		if ($prix_produit_modif !== "")
		{
			$sql_modif_prix = "UPDATE produit SET prix = '$prix_produit_modif' WHERE id = $id_produit_modif";
			$conn->query($sql_modif_prix);
		}
		if ($image_produit_modif !== "")
		{
			$sql_modif_image = "UPDATE produit SET image = '$image_produit_modif' WHERE id = $id_produit_modif";
			$conn->query($sql_modif_image);
		}
		if ($description_produit_modif !== "")
		{
			$sql_modif_description = "UPDATE produit SET description = '$description_produit_modif' WHERE id = $id_produit_modif";
			$conn->query($sql_modif_description);
		}
	}
}
?>
<h3>Supprimer un produit</h3>
<form method="post" action="admin_product.php" id="supprimer_produit">
	Id du produit a supprimer:<br>
	<input type="text" name="id_produit_suppr"><br>
	<input type="submit" value="Supprimer produit" name="suppr_produit">
</form>
<?php
if (isset($_POST['suppr_produit']))
{
	$id_suppr = $_POST['id_produit_suppr'];
	if ($id_suppr !== "")
	{
		$sql_suppr = "DELETE FROM `produit`
		WHERE `id` = $id_suppr";
		$conn->query($sql_suppr);
	}
}
?>
	<h3>Tous les produits</h3>
<?php
$all_products = "SELECT * FROM produit";
$result = $conn->query($all_products);
if ($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
		echo "id: " . $row["id"]. " - Nom: " . $row["nom"] . " - Prix: " . $row["prix"]
		. "€" . " - Image: " . $row["image"].  " - Description: " . $row["description"]. "<br>";
}
else
    echo "0 results";
?>

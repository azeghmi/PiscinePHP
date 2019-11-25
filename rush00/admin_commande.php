<?php
session_start();
include("bd_connection.php");
?>
<h3>Ajouter une commande</h3>

<form method="post" action="admin_commande.php" id="ajouter_commande">
	Prix:<br>
	<input type="text" name="prix_commande"><br>
	Id et nom client:<br>
<SELECT name="order_id" size="1">
<?php
$sql_id_cate ="SELECT id, nom FROM client";
$result = $conn->query($sql_id_cate);
while ($row = $result->fetch_assoc())
	echo '<OPTION>'.$row['id'] . "-" .$row["nom"].'</OPTION>';
?>
</SELECT><BR>
	<input type="submit" value="Ajouter produit" name="ajouter_produit">
</form>
<?php
$order = $_POST['order_id'];
$explode = explode("-", $order);
$order_price = $_POST['prix_commande'];
if (isset($_POST['ajouter_produit']))
{
		$sql_add = "INSERT INTO commande_c (id_client, prix)
	VALUES ('$explode[0]', '$order_price')";
	$conn->query($sql_add);
}
?>
<h3>Modifier une commande</h3>
<form method="post" action="admin_commande.php" id="modifier_commande">
	Id de la commande a modifier:<br>
	<input type="text" name="id_commande_modif"><br>
	Nouveau prix:<br>
	<input type="text" name="prix_commande_modif"><br>
	<input type="submit" value="Modifier commande" name="modif_commande">
</form>
<?php
if (isset($_POST['modif_commande']))
{
	$id_commande_modif = $_POST['id_commande_modif'];
	$prix_commande_modif = $_POST['prix_commande_modif'];
	if ($id_commande_modif !== "")
	{
		if ($prix_commande_modif !== "")
		{
			$sql_modif_prix = "UPDATE commande_c SET prix = '$prix_commande_modif' WHERE id = $id_commande_modif";
			$conn->query($sql_modif_prix);
		}
	}
}
?>
<h3>Supprimer une commande</h3>
<form method="post" action="admin_commande.php" id="supprimer_order">
	Id de la commande a supprimer:<br>
	<input type="text" name="id_commande_suppr"><br>
	<input type="submit" value="Supprimer commande" name="suppr_commande">
</form>
<?php
if (isset($_POST['suppr_commande']))
{
	$id_suppr = $_POST['id_commande_suppr'];
	if ($id_suppr !== "")
	{
		$sql_suppr = "DELETE FROM `commande_c`
		WHERE `id` = $id_suppr";
		$conn->query($sql_suppr);
	}
}
?>
<h3>Toutes les commandes</h3>
<?php
$all_orders = "SELECT * FROM commande_c";
$result = $conn->query($all_orders);
if ($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
		echo "id: " . $row["id"] . " - id client: " . $row["id_client"] ." - Prix: " . $row["prix"]
		. "€" . "<br>";
}
else
    echo "0 results";
?>

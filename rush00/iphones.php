<?php
include("bd_connection.php");
$sql = "SELECT produit.nom, produit.prix, produit.image, produit.description FROM `categories_produit`
INNER JOIN produit ON categories_produit.id_produit = produit.id
WHERE id_categories = 1";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
		echo $row["nom"]. " - Prix: " . $row["prix"] ."€" . "<br>" . " <img src=\"$row[image]\" alt=\"lunette1\" height=\"20%\" width=\"20%\">"
		. "<br>" . "  description: " . $row["description"]. "<br>" . "<br>" . "<br>" . "<br>";
}
else
    echo "0 results";


?>

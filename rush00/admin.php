<?php
session_start();
include("bd_connection.php");
echo "<a href=\"admin_user.php\">Utilisateur</a><br>";
echo "<a href=\"admin_product.php\">Produits</a><br>";
echo "<a href=\"admin_cate.php\">Categorie</a><br>";
echo "<a href=\"admin_commande.php\">Commande</a>";
?>


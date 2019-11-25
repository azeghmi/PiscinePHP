<?php
session_start();
$_SESSION['login'] = "";
$_SESSION['price'] = array();
$_SESSION['name'] = array();
echo $_SESSION['login'] = "";
header("Location: http://localhost:8080/panier.php");
?>

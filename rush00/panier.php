<?php
session_start();
include("bd_connection.php");
include("panier-functions.php");
if ($_SESSION['login']!== "")
{
	$is_admin = "SELECT admin_id FROM client WHERE '$_SESSION[login]' = login";
	$result = $conn->query($is_admin);
	$row = $result->fetch_assoc();
}
function display_panier($conn)
{
	include("bd_connection.php");
	$sql = "SELECT prix_produit FROM `panier`";
	$results = $conn->query($sql);
	$conn->close();
	return $results;
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Basket</title>
		<link rel="stylesheet" href="index.css">
	</head>
	<body>
		<h1> Bienvenue dans votre Panier</h1>

		<div class="aff_panier">
			<ul>
			<?php
				// foreach($_SESSION['panier_name'] as $name)
				// {
				// 	echo "WAAAAAAAA";
				// 	echo "<li>
				// 				<h1>Produit:<h1> <h1>$name<h1></span>
				// 				<br/>
				// 			</li>";
				// }

			?>

			</ul>
		</div>
	</body>
</html>

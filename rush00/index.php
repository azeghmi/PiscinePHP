<?php
session_start();
include("bd_connection.php");
if ($_SESSION['login']!== "")
{
	$is_admin = "SELECT admin_id FROM client WHERE '$_SESSION[login]' = login";
	$result = $conn->query($is_admin);
	$row = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Minishop</title>
		<link rel="stylesheet" href="index.css">
	</head>
	<body>
		<div class="titre"><h2>ft_minishop</h2></div>
		<div id="mySidebar" class="sidebar">
  				<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  				<a href=""http://localhost:8080/">Home</a>"
  				<a href="samsung.php">Samsung</a>
  				<a href="iphones.php">Iphone</a>
  				<a href="lunette.php">Lunettes</a>
				<?php if ($row['admin_id'] == 1)
						echo "<a href=\"admin.php\">Administrateur</a>";
				?>
  				<br/>
				  <?php
				  if ($_SESSION['price'] == "")
				  $_SESSION['price'] = array();
			  	 if ($_SESSION['name'] == "")
				  $_SESSION['name'] = array();
				  if ($_SESSION['login'] == "")
				  echo "<a href=\"auth.php\">Se Connecter</a>";
				  else
				  	echo "<a href=\"auth.php\">Se Deconnecter</a>";
				  ?>
  				<a href="panier.php"><img src="https://img.icons8.com/cotton/64/000000/shopping.png" style="padding-left: 50px;"></a>
		</div>
		<div id="main">
  			<button class="openbtn" onclick="openNav()">☰</button>
		</div>
		<div class="panier">
			<h3 style="float:right;"> Mon panier</h3><BR>
			<?php
				echo "<h4 style=\"float:right;\"> Prix total du panier: " . $_SESSION['total_price'] . "€" . "</h4><BR>";
				echo "<h4 style=\"float:right;\"> Nombre d'article(s) dans le panier: " . $_SESSION['nb_articles'] . "</h4>" . "<BR>";
			?>
		</div>
		<div class="articles">
			<br/><br/><br/><br/><br/><br/>
			<br/><br/><br/><br/><br/><br/>
			<br/><br/><br/><br/>
			<div class="sunglasses">
				<h3>Sunglasses</h3>
				<img src="https://www.costadelmar.com/dw/image/v2/BBDQ_PRD/on/demandware.static/-/Sites-master-catalog/default/dwf19eeb59/products/costa-sunglasses/loreto/lr64-rose-gold-green-mirror-lens-angle4.png?sw=700&sh=350&sm=fit&sfrm=png" alt="lunette1" height="20%" width="20%"></li>
				<img src="https://www.costadelmar.com/dw/image/v2/BBDQ_PRD/on/demandware.static/-/Sites-master-catalog/default/dwde356764/products/costa-sunglasses/rincon/rin156-smoke-crystal-blue-mirror-lens-angle4.png?sw=700&sh=350&sm=fit&sfrm=png" alt="lunette2" height="20%" width="20%"></li>
				<img src="img/glasses3.png" alt="lunette3" height="20%" width="20%"></li>
				<img src="https://opsm.scene7.com/is/image/OPSM/805289602057_shad_qt?$Large$&hei=300&wid=600" alt="lunette4" height="20%" width="20%"></li>
			</div>
			<br/><br/>
			<div class="iphones">
				<h3>Iphones</h3>
				<a href="panier.php?action=ajout&amp;l=LIBELLEPRODUIT&amp;q=QUANTITEPRODUIT&amp;p=PRIXPRODUIT" onclick="window.open(this.href, '',
				<img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone8-plus-gold-select-2018?wid=940&hei=1112&fmt=png-alpha&qlt=80&.v=1550795417455" alt="iphon8" height="20%" width="20%"></li>
				<img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-xr-white-select-201809?wid=940&hei=1112&fmt=png-alpha&qlt=80&.v=1551226036668" alt="iphonexrW" height="20%" width="20%"></li>
				<img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-xr-yellow-select-201809?wid=940&hei=1112&fmt=png-alpha&qlt=80&.v=1551226036826" alt="iphonexrY" height="20%" width="20%"></li>
				<img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-11-pro-max-gold-select-2019?wid=940&hei=1112&fmt=png-alpha&qlt=80&.v=1566953859132" alt="iphone11pro" height="20%" width="20%"></li>
			</div>
		</div>
		<script>
			function openNav()
			{
  				document.getElementById("mySidebar").style.width = "250px";
  				document.getElementById("main").style.marginLeft = "250px";
			}

			function closeNav()
			{
  				document.getElementById("mySidebar").style.width = "0";
  				document.getElementById("main").style.marginLeft= "0";
			}
		</script>
	</body>
</html>

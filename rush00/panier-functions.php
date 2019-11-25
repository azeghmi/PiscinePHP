<?php
session_start();
include("bd_connection.php");
function add_prod($conn)
{

    // include("bd_connection.php");
    // $sql = "SELECT * FROM commande_client";
    // $results = $conn->query($sql);
    // $conn->close();
    // return $results;
}
// if (isset($_GET['action']))
// {
//     if (isset($_SESSION['name']))
//     {
        if ($_GET['action'] == 'add')
        {
            if (isset($_POST['submit']))
            {
                $nom = $_POST['nom'];
                $price = $_POST['price'];
            }
            if ($title && $description && $price)
            {
                try
                {
                    $conn = new mysqli("localhost", "root", "abcdef", "minishop");
                    if ($conn->connect_error)
                        die("Connection failed: " . $conn->connect_error);
                }
                catch (Exception $e) {
                  echo 'Caught exception: ';
              }
                $insert = $conn->prepare("INSERT INTO commande_client VALUES('', '', '', $_nom, $_prix )");
            }
   ?>
	<form method="post" action="" id="ajouter_panier">
	Produit:<br>
	<SELECT name="panier_product" size="1" style="float:right;">
	<?php
	$sql_panier_product ="SELECT nom, prix, id FROM produit";
	$result = $conn->query($sql_panier_product);
	while ($row = $result->fetch_assoc())
		echo '<OPTION>'.$row['nom'] . "-" .$row["prix"]. "-€". "id-" . $row['id'] . '</OPTION>';
	?>
</SELECT><BR>
	<input type="submit" value="Ajouter au panier" name="ajouter_panier">
</form>
    <?php
    if (isset($_POST['ajouter_panier']))
    {
      $product = $_POST['panier_product'];
      $explode = explode("-", $product);
      if ($_SESSION['price'] == "")
         $_SESSION['price'] = array();
      if ($_SESSION['name'] == "")
         $_SESSION['name'] = array();
      array_push($_SESSION['price'], $explode[1]);
      array_push($_SESSION['name'], $explode[0]);
    }
        }
        else if ($_GET['action'] == 'modidfy&delete')
        {
             $insert = $conn->prepare("SELECT * FROM panier");
             while($s->$insert->fetch(FDO::FETCH_OBJ))
             {
                echo $s->name;
                ?>
                    <a href="?action=modify&amp;" id="<?php echo $s->id ;?>">Modifier</a>
                    <a href="?action=delete&amp;" id="<?php echo $s->id ;?>">X</a><br/><br/>
                <?php
             }
        }
        else if ($_GET['action'] == 'modify')
        {
            $id = $_GET['id'];
            $select = $conn->prepare("SELECT * FROM panier WHERE id=$id");
            $data = $select->fetch(PDO::FETCH_OBJ);
            ?>
            </form action="" method="post">
                <h3>Nom du produit</h3><input type="text" name="nom"></h3>
                <h3>Prix</h3><input type="text" name="prix"></h3><br/><br/>
                <input type="submit" name="submit">
            </form>
            <?php
            if (isset($_POST['submit']))
            {
                $nom = $_POST['nom'];
                $price = $_POST['price'];
                $update = $conn->prepare("UPDATE panier SET nom='$nom', prix='$price' WHERE id=$id");

            }
        }
        else if ($_GET['action'] == 'delete')
        {
            $id=$_GET['id'];
            $delete = $conn->prepare("DELETE FROM panier WHERE id=$id");
        }

          foreach ($_SESSION['price'] as $price)
          {
             echo "Prix : " . $price . "<br>";
            $total_price = $price + $total_price;
            $nb_articles++;
         }
         foreach ($_SESSION['name'] as $name)
         echo "Nom : " . $name . "<br>";
         echo "<BR> <h3>Prix total " . $total_price . "€" . "</h3>";
         $_SESSION['total_price'] = $total_price;
         $_SESSION['nb_articles'] = $nb_articles;
         ?>
<form method="post" action="" id="valider_order">
	<input type="submit" value="Valider la commande" name="valider_commande">
</form>
<?php
   if (isset($_POST['valider_commande']))
   {
      $login = $_SESSION['login'];
      if ($login === "")
      {
         echo "Vous devez vous connecter pour valide votre commande <BR>";
         echo "<a href=\"auth.php\">Se Connecter</a> <BR>";
      }
      else
      {
         $sql_id_client = "SELECT id FROM client WHERE login = '$login'";
         $result = $conn->query($sql_id_client);
         if ($result->num_rows > 0)
         {
            while($row = $result->fetch_assoc())
            $id_client = $row['id'];
         }
         else
         echo "0 results";
         $sql_valid = "INSERT INTO commande_c (id_client, prix)
	VALUES ('$id_client', '$total_price')";
	$conn->query($sql_valid);
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <br/>
        <a href="?action=add">Ajouter un produit</a>
        <a href="?action=modidfy&delete">Modifier/Supprimer</a>
    </body>

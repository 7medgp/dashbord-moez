<?php
require_once "securite.php";
require_once "connect.php";
$name = $_SESSION['user']['fullname'];
$info=isset($_SESSION['info'])?$_SESSION['info']:"";
unset($_SESSION['info']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau équipement</title>
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<?php
include "menubar.php";
?>
<section class="content">
<div class="myform" style="border:1px solid gray">
<div class="header">
<h1>Nouveau équipement</h1>
</div>
<form class="connexion" action="verif_create_equip.php" method="post">
        <?php 
		if (!empty($info)) { 
		echo "<div class = alert> $info </div>";
        }
		?>
            <input type="text" name="libelle" placeholder="Description...">
            <select name="genre">
			<option value="" selected>Choisir</option>
			<option value="Ordinateur bureau">Ordinateur bureau</option>
			<option value="Imprimante">Imprimante</option>
			<option value="Projecteur">Projecteur</option>
			<option value="Table">Table</option>
			<option value="Télevision">Télevision</option>
			<option value="Souris sans fil">Souris sans fil</option>
			<option value="Cable HDMI">Cable HDMI</option>
			<option value="Ecran">Ecran</option>
			</select>
			<button type="submit" class="btn-cnx">Créer cet équipement</button>
<a href="allequipements.php">
<i class="fa fa-info-circle" style="font-size:25px;color:black"></i>
Liste des équipements</a>
</form>
</div>
<section>
</body>
</html>
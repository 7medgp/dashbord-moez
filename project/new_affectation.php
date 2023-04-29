<?php
require_once "securite.php";
require_once "connect.php";
$name = $_SESSION['user']['fullname'];
$info=isset($_SESSION['info'])?$_SESSION['info']:"";
unset($_SESSION['info']);
date_default_timezone_set("Africa/Tunis");
$dateaffec = date('Y-m-d H:i:s');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle affectation</title>
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
<h1>Nouvelle affectation</h1>
</div>
<form class="connexion" action="verif_new_affectation" method="post">
        <?php 
		if (!empty($info)) { 
		echo "<div class = alert> $info </div>";
        }
		?>
            <input type="number" name="qtte" placeholder="Quantite...">

            <select name="equip">
			<?php
			mysqli_query($conn, "SET NAMES 'utf8'");
			$res1 = mysqli_query($conn, "select * from equipement");
			echo "<option value='' selected>Choisir un équipement</option>";
			while($data1 = mysqli_fetch_assoc($res1))
			{
				echo "<option value= $data1[code]>$data1[libelle]</option>";
			}
			?>
			</select>
			<select name="enseig">
			<?php
			mysqli_query($conn, "SET NAMES 'utf8'");
			$res2 = mysqli_query($conn, "select * from enseignant");
			echo "<option value='' selected>Choisir un enseignant</option>";
			while($data2 = mysqli_fetch_assoc($res2))
			{
				echo "<option value= $data2[id]>$data2[fullname]</option>";
			}
			
			?>
			</select>
			<input type="hidden" name="dateaffec" value="<?php echo $dateaffec?>">
			<button type="submit" class="btn-cnx">Affecter cet équipement</button>
<a href="">
<i class="fa fa-info-circle" style="font-size:25px;color:black"></i>
Liste des affectations</a>
</form>
</div>
<section>
</body>
</html>



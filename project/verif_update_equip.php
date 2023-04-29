<?php
require_once "securite.php";
require_once "connect.php";


if($_POST)
{
	extract($_POST);
	$res = mysqli_query($conn,
	"update equipement set libelle = '$libelle' and genre='$genre' where code = '$value'");
	if($res)
		{
			$_SESSION['info'] = "Equipement modifié avec succès.";
			header('location:allequipements.php');
		}
		else
		{
			$_SESSION['info'] = "erreur";
			//mysqli_error($conn)
			header('location:allequipements.php');
		}
		
		mysqli_close($conn);
	
}


?>
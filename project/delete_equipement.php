<?php
require_once "securite.php";
require_once "connect.php";


if($_GET)
{
	extract($_GET);
	$req= "delete from equipement where code = '$value'";
	$res = mysqli_query($conn, $req);
	
	if($res)
		{
			$_SESSION['info'] = "Equipement supprimé avec succès.";
			header('location:allequipements.php');
		}
		else
		{
			$_SESSION['info'] = "Equipement en cours d'affectation";
			//$_SESSION['info'] = "erreur". mysqli_error($conn);
			header('location:allequipements.php');
		}
		
		mysqli_close($conn);
	
}
?>
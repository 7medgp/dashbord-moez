<?php
require_once "securite.php";
require_once "connect.php";


if($_POST)
{
	extract($_POST);
	if(empty(trim($libelle))){
    $_SESSION['info'] = "Description svp ...";
    header('location:new_equipement.php');
	}
	if(empty($genre)){
    $_SESSION['info'] = "Choisir un type d'équipement ...";
    header('location:new_equipement.php');
	}
	
	
	if(!empty(trim($libelle)) && !empty($genre))
	{
		$req= "insert into equipement(libelle, genre) values('$libelle','$genre')";
		
		mysqli_query($conn, "SET NAMES 'utf8'");
		
		$res = mysqli_query($conn, $req);
		if($res)
		{
			$_SESSION['info'] = "Equipement créé avec succès.";
			header('location:new_equipement.php');
		}
		else
		{
			//$_SESSION['info'] = "Erreur !!!".mysqli_error($conn);
		    $_SESSION['info'] = "Libellé éjà existant";
			header('location:new_equipement.php');
		}
		
		mysqli_close($conn);
	}
}
?>
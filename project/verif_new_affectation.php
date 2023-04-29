<?php
require_once "securite.php";
require_once "connect.php";
if($_POST)
{
	extract($_POST);
	if(empty($qtte)){
    $_SESSION['info'] = "Quantité svp ...";
    header('location:new_affectation.php');
	}
	if(empty($enseig)){
    $_SESSION['info'] = "Choisir un enseignant...";
    header('location:new_affectation.php');
	}
	if(empty($equip)){
    $_SESSION['info'] = "Choisir un type d'équipement ...";
    header('location:new_affectation.php');
	}
	
	
	if(!empty($qtte) && !empty($enseig) && !empty($equip))
	{
		$req= "insert into affectation(id_enseignement, id_equip,dateaffec,qtte) 
		values('$enseig','$equip','$dateaffec','$qtte')";
		mysqli_query($conn, "SET NAMES 'utf8'");
		$res = mysqli_query($conn, $req);
		if($res)
		{
			$_SESSION['info'] = "affectation créé avec succès.";
			header('location:new_affectation.php');
		}
		else
		{
			$_SESSION['info'] = "Erreur !!!".mysqli_error($conn);
		    //$_SESSION['info'] = "erreur";
			header('location:new_affectation.php');
		}
		
		mysqli_close($conn);
	}
}
?>
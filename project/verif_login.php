<?php
session_start();
require_once('connect.php');
if($_POST){
extract($_POST);
if(empty(trim($pseudo))){
    $_SESSION['info'] = "Nom Utilisateur !!";
    header('location:login.php');
}
if(empty(trim($password))){
    $_SESSION['info'] = "Mot de passe !!";
    header('location:login.php');
} 
if(!empty(trim($pseudo)) && !empty(trim($password))){
	$sql = "SELECT * from admin
	where pseudo=trim('$pseudo') and password=md5('$password')";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		$row = $result->fetch_assoc();
		$_SESSION['user'] =$row;
		header('location:dashbord.php');	
	}
	else
	{
		$_SESSION['info'] = 'Utilisateur non reconnu !!';
		header('location:login.php');
	}
}
$conn->close();
}
?>
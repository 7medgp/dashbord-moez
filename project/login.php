<?php
session_start();
if(isset($_SESSION['info']))
$info = $_SESSION['info'];
else
$info="";

unset($_SESSION['info']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #1F618D;">
    <div class="myform">
        <div class="header">
            <h1>Connexion à la plateforme</h1>
        </div>
        <form class="connexion" action="verif_login.php" method="post">
        <?php if (!empty($info)) { 
		echo "<div class = alert> $info </div>";
        }
		?>
            <input type="text" name="pseudo" placeholder="Nom utilisateur">
            <input type="password" name="password" placeholder="Mot de passe">
            <button type="submit" class="btn-cnx">Se connecter</button>
        </form>
        
        <div class="footer">
            <p>&copy; 2022-2023 ISI ARIANA</p>
        </div>
    </div>
</body>
</html>
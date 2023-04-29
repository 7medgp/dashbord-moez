<?php
require_once "securite.php";
require_once "connect.php";
$name = $_SESSION['user']['fullname'];
$search=isset($_GET['chercher'])?$_GET['chercher']:"";
$info=isset($_SESSION['info'])?$_SESSION['info']:"";
unset($_SESSION['info']);
//recuperation
$sql= "select * from equipement where 
(libelle like '%$search%' or genre like '%$search%')";
mysqli_query($conn,"SET NAMES 'utf8'");
$res = mysqli_query($conn,$sql);
$nb=mysqli_num_rows($res);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des équipements</title>
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
include "menubar.php";
?>
<section class="content">
<form class="form-inline">
<input type="text" placeholder="mot(s) clé(s) ..." name="chercher">
&nbsp;&nbsp;&nbsp;
<input type="submit" value="Chercher" class="btn-info">
</form>
<a href="new_equipement.php">++ Nouveau équipement</a>
<?php 
if(!empty($info)) { 
echo "<div class = alert> $info </div>";
}
if($nb==0)
echo '<div class="alert">0 résultat ....</div>';
else{
?> 
<table>
    <tr>
        <th>Code</th>
        <th>Description</th>
		<th>Type</th>
        <th colspan="2">Actions</th>  
    </tr>
    <?php while ($rows = mysqli_fetch_assoc($res)){ ?>
    <tr>
    <td> <?php echo $rows['code']; ?></td>
    <td> <?php echo $rows['libelle']; ?></td>
	<td> <?php echo $rows['genre']; ?></td>
    <td> <a href="update_equipement.php?value=<?php echo $rows['code']; ?>">
	<i class="fa fa-edit" style="font-size:20px;color:blue"></i>
	</a> </td>
    <td> <a href="delete_equipement.php?value=<?php echo $rows['code']; ?>">
	<i class="fa fa-trash" style="font-size:20px;color:red"></i>
	</a> </td>
	</tr>
    <?php } ?>
</table>
<?php } ?>
<section>
</body>
</html>
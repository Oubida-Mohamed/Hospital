<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient-Nouveau mot de passe</title>
    <?php require "connexion.php"; ?>
    <link rel="stylesheet" href="CSS/NouveauMotPass.css">
</head>
<body>
    <form method="post">
        <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Nouveau<br><span>mot de passe</span></div>
		</div>
		<br>
		<div class="login">
				<input type="password" placeholder="Nouveau mot de passe" name="Motpass" maxlength="30"><br>
				<input type="password" placeholder="Confirmer Nouveau mot de passe" name="ReMotpass" maxlength="30"><br>
				<input type="submit" value="Enregistrer" name="appliquer">
		</div>
    </form>
    <?php
    if(isset($_POST['appliquer'])){
        $MtPass=$_POST['Motpass'];$ReMtPass=$_POST['ReMotpass'];$CinPac=$_SESSION['cinPacOubMotPass'];
        if($MtPass==$ReMtPass){
           $reqqt=$con->exec("UPDATE `userpac` SET `passpac`=sha1('$MtPass') WHERE `cinpac`='$CinPac'"); 
           header("location:../formConnecPatient.php?Mot_passe_Modifie");
        } 
        else echo "<script>alert('Le mot passe doit être le même de confirmation');</script>";
    }
    ?>
</body>
</html>
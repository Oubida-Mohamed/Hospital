<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient-Mot de passe oublié</title>
    <link rel="stylesheet" href="CSS/MotPassOubliePac.css">
    <?php require "connexion.php"; ?>
</head>
<body>
    <h2>Retrouvez votre compte</h2>
    <!-- <p>Veuillez entrer votre CIN, votre numéro de mobile et votre date de naissance pour rechercher votre compte.</p> -->
    <form method="post">
        <div class="contenir">
            <div class="cin">
                <input type="text" name="cinPac" placeholder="CIN" maxlength="10">
            </div>
            <div class="tele">
                <input type="tel" name="telePac" placeholder="Téléphone" maxlength="10">
            </div>
            <div class="date">
                <label for="DtNaissance">Date de naissance</label><input type="date" name="DtNaissance" id="DtNaissance">
            </div>
            <div class="submit">
                <input type="submit" value="Rechercher" name="rechercher">
            </div>
        </div>
    </form>
    <?php
    if(isset($_POST['rechercher'])){
        $cinPac=$_POST['cinPac'];$telePac=$_POST['telePac'];$dtNaissance=$_POST['DtNaissance'];
        $reqt=$con->query("SELECT `cinpac`, `nompac`, `prenompac`, `genrePac`, `datenaissancepac`, `TelePac`, `photopac` FROM `pacient` 
        WHERE `cinpac`='$cinPac' and `datenaissancepac`='$dtNaissance' and `TelePac`='$telePac'");
        if($line=$reqt->fetch()){
            $_SESSION['cinPacOubMotPass']=$cinPac;
            header("location:NouveauMotPass.php");
        }
        else echo "<script>alert('Ce patient n'existe pas');</script>";
    }
    ?>
</body>
</html>
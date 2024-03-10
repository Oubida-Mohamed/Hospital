<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/Rendez_vous.css">
    <?php require "connexion.php"; ?>
</head>
<body style="background-image: url(../images/backCreation.jpg);">
    <?php $img_name=$_SESSION['photoPac'];$nomPac=$_SESSION['nompac']; ?>
<form method="post">
    <div class="nav">
        <a href="DeconnexionPac.php">Deconnexion</a>
        <div class="info">
            <img class='image' src="<?php echo 'Profil_Patient_img/'.$img_name; ?>">
            <p>Hello,<span><?php echo $nomPac; ?></span></p>
        </div>
    </div>
    <h2>List des medcine</h2>
</form> 
<?php
    $CinPac=$_SESSION['cin'];
    $reqet=$con->query("SELECT `cinmed`, `nommed`, `prenommed`, `telemed`, `labelspecialiter` FROM `medcin`,`specialiter` 
    WHERE medcin.codspecialiter=specialiter.codespecialiter");
    echo("<table><tr><th>Nom de Medcin</th><th>Prénom de Medcin</th><th>Téléphone</th><th>Spécialité</th><th>Cliquer pour choisir</th></tr>");
    while($ligne=$reqet->fetch()){
        $CinMed=$ligne['cinmed'];$NomMed=$ligne['nommed'];$PrenomMed=$ligne['prenommed'];$TeleMed=$ligne['telemed'];$SpecialMed=$ligne['labelspecialiter'];
        echo "<tr><td class='td1'>".$NomMed."</td><td>".$PrenomMed."</td><td class='td3'>".$TeleMed."</td><td>".$SpecialMed."</td><td class='choix'><a href='Rendez_vous2.php?CinMed=$CinMed'>Choisir</a></td></tr>";
    }
    echo "</table>";


    
    ?>
</body>
</html>
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations sur le patient</title>
</head>
<body>
    <?php 
    require "conexion.php";
    $cinpac=$_GET["cinpas"];
    echo"<table border='1'><tr><td>CIN</td><td>Nom</td><td>Prenom</td><td>Date de Naissance</td>
    <td>Téléphon</td><td>Genre</td></tr>";
    $rep=$con->query("SELECT `cinpac`, `nompac`, `prenompac`, `datenaissancepac`, `photopac`, `telePac`, `genrePac`
     FROM `pacient` where  `cinpac`='$cinpac'");
    $ligne=$rep->fetch();
    echo"<tr><td>".$ligne["cinpac"]."</td><td>".$ligne["nompac"]."</td><td>".$ligne["prenompac"].
    "</td><td>".$ligne["datenaissancepac"]."</td><td>".$ligne["telePac"]."</td><td>".
    $ligne["genrePac"]."</td></tr>";
    echo"</table>";
     echo"<button type='button' onclick=window.location.href='accueilmed.php'> Retour</button>";
    
    ?>
    
    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $dbName="hopitale";
    $dbHost="localhost";
    $dbUser="root";
    $dbPass="";
    try{
        $con=new PDO("mysql:host=$dbHost;dbname=$dbName;",$dbUser,$dbPass);}
    catch(Exception $e){
        die("Connexion echouee ".$e->getMessage());
    }
    //echo "connexion reussite ";
    ?>
</body>
</html>
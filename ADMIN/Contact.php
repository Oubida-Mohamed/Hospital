<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration-Contact</title>
    <?php require "conexionadmin.php"; ?>
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<body>
    <div class="container">
        <div class="row">
        <?php
        $rep=$con->query("SELECT `IdContact`, `FullName`, `Email`, `Tele`, `Message` FROM `contact`");
        
        while($ligne=$rep->fetch()){
            $Name=$ligne['FullName'];$Email=$ligne['Email'];$Tele=$ligne['Tele'];$Message=$ligne['Message'];
            $idContact=$ligne['IdContact'];

            echo "<div class='col-lg-3 col-md-4 col-sm-6'>
            <div class='serviceBox green'>";

            echo "<button class='delete'><a href='suppr.php?idC=$idContact' onclick=\"return confirm('Vous êtes sûre ?');\">Supprimer</a></button>";

            echo "<h3 class='title'>".$Name."&nbsp&nbsp&nbsp&nbsp<span>".$Email."&nbsp&nbsp&nbsp".$Tele."</span></h3>
            <p class='description'>".$Message."</p>";
            
            echo "</div></div><br>";
        }
        ?>
            

        </div>
    </div>
    <div><center><button class="retr"><a href="admin.php">Retour</a></button></center><div>
    

</body>
</html>
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/info.css">
    <title>Informations sur le médecin</title>
</head>
<body>
   <?php require "conexionadmin.php";
   $cin=$_GET["cin"];
   $req="SELECT `cinmed`, `nommed`, `prenommed`, `telemed`, `photomed`, `emailmed`, 
   `codspecialiter`, `dplmmed`, `sexe` FROM `medcin` WHERE `cinmed`='$cin'";
   $rep=$con->query($req);
   $ligne=$rep->fetch();
   $cd=$ligne['codspecialiter'];
   $pht=$ligne['photomed'];
   $dpl=$ligne['dplmmed'];
   ?>
<div class='container'>
<div class="cv1">
    <?php echo"<img src='../Medcine/images/$pht' class='image'/>";?>
    <?php
        $rep1=$con->query("SELECT count(*) FROM `rendezvous` WHERE `cinmed`='$cin'");
        $ligne2=$rep1->fetch();
        
        echo"<dl>
                <dt style='margin-top:20px;'>
                <center> Les Rendez-vous </center>
                </dt>
                <center><dd style='padding:0px;'>$ligne2[0]</dd></center>
            </dl>";   
    ?>

</div>

    <div class='detail'>


      <dl>
        <dt>
        <center>Nom du médecin </center>
        </dt>
            <?php echo"<dd >".$ligne['nommed']." ".$ligne['prenommed']."</dd>"; ?>
        <dt>
        <center>E-mail </center>
        </dt>
           
            <?php echo"<dd>".$ligne['emailmed']."</dd>"; ?>
            
        <dt>
        <center>Téléphone </center>
        </dt>
            
            <?php echo"<dd>".$ligne['telemed']."</dd>"; ?>
            
        <dt>
        <center>Spécialité </center>
        </dt>
            <dd>
            <?php $rep=$con->query("SELECT `codespecialiter`, `labelspecialiter`, `presentationspecialiter` FROM `specialiter` 
            WHERE `codespecialiter`='$cd'");
            $lign=$rep->fetch();
            echo($lign['labelspecialiter']);?>
            </dd>
        <dt>
        <center>Genre </center>
        </dt>
           
            <?php echo"<dd>".$ligne['sexe']."</dd>"; ?>
        
        </dd>
        <dt><center>Le Diplôme </center>
        <?php echo"<dd><a href='../Medcine/deplomes/$dpl' target=_blank > Cliquer </a></dd>";?>
        </dt>
      </dl>
    <form method="post">
        <div class="button"> 
            
            <div>
            <button  type="submit" class='delete' name="delete" onclick="return confirm('Vous êtes sûre ?');">
                Suppr
            </button>
            </div>
            <div >
            <button  class='annuler'   name='annuler' >
                <a href="admin.php#Medcin">
               Annuler<a>
            </button>
            </div>
            <div >
            <button  class='update'  type="submit" name='update' >
               Modifier
            </button>
            </div>
            

        </div>
        </div>
    </form>
  </div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="js/index.js"></script>
  <?php
   if(isset($_POST["delete"])){
        $rep=$con->exec("DELETE FROM `medcin` WHERE `cinmed`='$cin'");
        $rep1=$con->exec("DELETE FROM  `usermed` WHERE `cinmed`='$cin'");
       
        if($rep && $rep1){ 
            header ("location:admin.php#Medcin");
        }
    }
    if (isset($_POST["update"])){
        $_SESSION["cin"]=$cin;
        header ("location:modifmed.php");

    }

    


  
  ?>
 

</body>
</html>
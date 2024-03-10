<?php session_start();?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'un compte Médecin</title>
    <link rel="stylesheet"  href="css/util.css">
	<link rel="stylesheet"  href="css/med.css">
</head>
<body>  
<?php
    require "conexion.php";
    $cinmed=''; $suiv='false';
     if(isset($_POST["creat"])){
        $cinmed=$_POST["cinmed"];$Nommed=$_POST["Nommed"];$Prenommed=$_POST["Prenommed"];$sex=$_POST["genre"];
        $telemed=$_POST["telemed"];$emailmed=$_POST["emailmed"];$codspecmed=$_POST["codspecmed"];

        $image=$_FILES['photomed']['tmp_name'];
        $img_name=$_FILES['photomed']['name'];
        $img_path="images/".$img_name;
        $uploadmg= move_uploaded_file($image,$img_path);

        $dplm=$_FILES['dplmmed']['tmp_name'];
        $dplm_name=$_FILES['dplmmed']['name'];
        $dplm_path="deplomes/".$dplm_name;
        $uploaddpm= move_uploaded_file($dplm,$dplm_path);
        if($uploadmg && $uploaddpm){

        $rep1=$con->query("SELECT `cinmed` FROM `medcin`  WHERE `cinmed`='$cinmed'");
         if($ligne=$rep1->fetch()){
            echo"<script>alert('pardon le cin est deja exist')</script>";
        }
        else{
              $insr=$con->query("INSERT INTO `medcin`(`cinmed`, `nommed`, `prenommed`, `telemed`, `photomed`, `emailmed`, `codspecialiter`,
              `dplmmed`,`sexe`) VALUES 
              ('$cinmed','$Nommed','$Prenommed','$telemed',\"$img_name\",'$emailmed',
              '$codspecmed',\"$dplm_name\",'$sex')");
             
             if($insr){
                $suiv='true';
                $_SESSION['cin']=$cinmed;
             }
             else{
                echo "<script>alert('Les données ne sont pas compatibles    Réessayer')</script>";
             }
        }}
        else echo"<script>alert('Error')</script>";
    }
    ?>
    <div class="limiter">
    <div class="container-login100" style="background-image:url('imagemedcin/med7.jpg');">
        <div class="wrap-login100 p-t-30 p-b-50" >
            <span class="login100-form-title p-b-41">
                Création d'un compte Médecin
            </span>
            <form class="login100-form validate-form p-b-33 p-t-5"  method="post"  enctype = "multipart/form-data">

                <div class="wrap-input100 validate-input" data-validate = "Entrer username">
                    <input class="input100" type="text" name="cinmed" id="cinmed" 
                        placeholder="CIN" maxlength="10" required>
                   
                </div>

                <div class="wrap-input100 validate-input" data-validate="Entrer nom">
                    <input  class="input100 " type="text" name="Nommed" id="Nommed" 
                    placeholder="Nom" maxlength="40" required>
                    
                </div>
                <div class="wrap-input100 validate-input" data-validate="Entrer prenom">
                    <input  class="input100 " type="text" name="Prenommed" id="Prenommed" 
                    placeholder="Prenom " maxlength="40" required>
                    
                </div>
                 <div  class="wrap-input100 validate-input">
                 <label for="sexe">Genre</label>
                <div class="input">
                    <input type="radio" name="genre" id="h" value="homme" >
                    <label for="h">Homme </label>
                    <input type="radio" name="genre" id="f" value="femme"><label for="f">Femme </label>
                </div>
            </div> 
                <div class="wrap-input100 validate-input" data-validate="Entrer telephone">
                    <input  class="input100 " type="text" name="telemed" id="telemed" 
                    placeholder="Telephone " maxlength="10" required>
                    
                </div>

                <div class="wrap-input100 validate-input" data-validate="Entrer email">
                    <input  class="input100 " type="text" name="emailmed" id="emailmed" 
                    placeholder="E-mail " maxlength="45" required>
                    
                </div>
                <div  class="wrap-input100 validate-input"> 
                    <div class="spc">
                    <label for="specmed"> Spécialité </label>
                    <select name="codspecmed" >
                        <?php $rep=$con->query("SELECT `codespecialiter`, `labelspecialiter`, `presentationspecialiter` FROM 
                        `specialiter`");
                        while($ligne=$rep->fetch()){
                            echo"<option value=".$ligne['codespecialiter'].">".$ligne['labelspecialiter']."</option>";
                        }

                        ?>
                    </select></div>
                </div>
                <div class="wrap-input100 validate-input" data-validate="image">
                <div class="pht">
                    <label for="photomed" > Photo :  </label>
                    <input type="file" name="photomed" id="photomed" class='file' accept="image/*" required>
                    
                    

                </div >
                </div>
                <div class="wrap-input100 validate-input" data-validate="deplom">
                <div class="dplm">
                    <label for="dplmmed" > Diplôme : </label>
                    <input type="file" name="dplmmed" id="dplmmed" class='file' accept="application/pdf" required>
                    <!-- <input name="Max-file-size" value="100000" hidden> -->
                    
                    
                </div>
                </div>
                <div style="display:flex;">
                    <div class="container-login100-form-btn m-t-32">
                        <button  type="submit" name="creat" class="login100-form-btn" >
                        Créer 
                        </button>       
                    </div>
                    <?php 
                    // si les donnes et inserrer on alez a une autre page s'appel password.php.
                    if($suiv=='true'){echo"<div class='container-login100-form-btn m-t-32'>
                        <button><a class='login100-form-btn' href='password.php'>
                        Suivant</a> </button></div>";}
                
                    ?>
                </div>
                <!-- <div class="lien" style="position:relative;left:240px; top:20px;"> <a href='oublier.php'>Oublier le Mots de Pass</a></div> -->
            </form>
        </div>
    </div>
	</div> 
    <?php

   
?>
    





            

   
    
   
</body>
</html>
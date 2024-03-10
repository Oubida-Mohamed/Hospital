<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médecin-Mot de passe oublié</title>
    <link rel="stylesheet"  href="css/util.css">
	<link rel="stylesheet"  href="css/med.css">
    <link rel="icon" type="image/png" href="Login_v16/images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="Login_v16/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
</head>
<body>
<div class="limiter">
    <div class="container-login100" method="post" style="background-image:url('imagemedcin/med2.jpg');">
        <div class="wrap-login100 p-t-30 p-b-50" >
            <span class="login100-form-title p-b-41">
               Oublier le mot de pass
            </span>
            <form class="login100-form validate-form p-b-33 p-t-5"  method="post"  enctype = "multipart/form-data">
                <div class="wrap-input100 validate-input" data-validate = "Entrer username">
                    <input class="input100" type="text" name="cinmed" id="cinmed" 
                    placeholder="CIN" maxlength="10"  required>
                   
                </div>
                <div class="wrap-input100 validate-input" data-validate="Entrer telephone">
                    <input  class="input100 " type="text" name="telemed" id="telemed" 
                    placeholder="Téléphone" maxlength="10" required>
                    
                </div>
                <div class="wrap-input100 validate-input" data-validate="Entrer email">
                    <input  class="input100 " type="text" name="emailmed" id="emailmed" 
                    placeholder="E-mail " maxlength="45" required>
                </div>
                
                <div style="display:flex;">
                    <div class="container-login100-form-btn m-t-32">
                        <button  type="submit" name="suiv" class="login100-form-btn" >
                        Suivant 
                        </button>       
                    </div> 
                </div>
            </form>
        </div>
    </div>
	</div> 
    
    <?php
    require "conexion.php";
    if(isset($_POST["suiv"])){
        // enregistrer les donnes d'input dans des variab
        $cin=$_POST['cinmed'];$tele=$_POST['telemed'];$email=$_POST['emailmed'];
        //on verifier si les donnes est exacte dans la base de donnes ou non 
        $rep=$con->query("SELECT *  FROM `medcin` WHERE 
         `cinmed`='$cin' and  `telemed`=$tele and `emailmed`='$email'" );
         //si les donnes est correcte on envoie dans une autre page appele mtpob.php
        if($ligne=$rep->fetch()){
            header("location:mtpob.php");
            // creie une session enregistrei le cin 
            $_SESSION["cin"]=$cin;
        }
        // sinon on affiche message pour dire que cette donnee est incorrect
        else{
            echo("<script>alert('Les données sont incorrectes')</script>");
        }

    }

    
    
    ?>
    
</body>
</html>
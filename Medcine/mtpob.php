<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médecin-Nouveau mot de passe</title>
    <link rel="stylesheet"  href="css/util.css">
	<link rel="stylesheet"  href="css/med.css">
    <link rel="icon" type="image/png" href="Login_v16/images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="Login_v16/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
</head>
<body>
<div class="limiter">
    <div class="container-login100" style="background-image:url('imagemedcin/med6.jpg');">
        <div class="wrap-login100 p-t-30 p-b-50" >
            <span class="login100-form-title p-b-41">
            Nouveau mot de passe
            </span>
            <form class="login100-form validate-form p-b-33 p-t-5" method="post">
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input  class="input100 " type="password" name="passwmed" id="passwmed" 
                    placeholder="Nouveau mot de passe" maxlength="30" required>
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input  class="input100 " type="password" name="conf" id="conf" 
                    placeholder="Confirmation" maxlength="30" required>
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                </div>
                <div style="display:flex;">
                    <div class="container-login100-form-btn m-t-32">
                        <button  type="submit" name="enrg" class="login100-form-btn" >
                        Enregistrer
                        </button>   
                    </div>
                </div>
            </form>
        </div>
    </div>
	</div>

<?php

require "conexion.php";
//apres entrer la nouvelle mots de pass 
    if(isset($_POST["enrg"])){
        //on verifier les donnee est correct
        $pass=$_POST["passwmed"];$conf=$_POST["conf"];$cin=$_SESSION["cin"];
        if($pass==$conf){
            // on modifier le mot de pass presedent par un nouvelle mot e pass
            $req="UPDATE `usermed` SET `passmed`=sha1('$conf') WHERE `cinmed`='$cin'";
            $con->exec($req);
            // on connecter directement 
            header ("location:medcin.php");
        }
        else{
           echo" confirmer votre mot de pass bien";
        }

}?>

    
    
    
    
            
    
</body>
</html>
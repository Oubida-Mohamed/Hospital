<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médecin-Mot de passe</title>
    <link rel="stylesheet"  href="css/util.css">
	<link rel="stylesheet"  href="css/med.css">
    <link rel="icon" type="image/png" href="Login_v16/images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="Login_v16/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
</head>
<body>
<?php
require "conexion.php";
//retourner la valeur de cin dans un variable 
// $Cin=$_SESSION['cin'];
//if urilisateur remplir tout les champs et clicker sur enregistrer 
if(isset($_POST["enrg"])){
    $Cin=$_SESSION['cin'];
    $req1="SELECT `cinmed` FROM `medcin` WHERE `cinmed`='$Cin' ";
    $rep1=$con->query($req1);
    if($ligne1=$rep1->fetch()){
        $conf=$_POST["conf"];
        $passwmed=$_POST["passwmed"];
        // si le mot de pass qui trouve dans l'input de mot de pass === le mot de pass de confirmation 
        if($passwmed==$conf){
            //on inserer le mot de pass chifrer dans l data base pour securiser le tulisateur 
            $req="INSERT INTO `usermed`( `passmed`, `cinmed`) VALUES (SHA1('$conf'),'$Cin') ";
            $con->exec($req);
            // faire la connexion dirrectement     
            header("location:medcin.php");
            
        }
        //sinon le mot de pass != le mot de pass de confirmation en affiche un message
        else{
            echo "<script>alert('Le mot passe doit être le même de confirmation')</script>" ;
        }     
    }else{
        echo "alert('pardon la patient qu'on la cin '".$Cin."'est ne pas crier rentrer votre donnes')";
    }
    
}
?>
<div class="limiter">
    <div class="container-login100" style="background-image:url('imagemedcin/med6.jpg');">
        <div class="wrap-login100 p-t-30 p-b-50" >
            <span class="login100-form-title p-b-41">
                Mot de passe 
            </span>
            <form class="login100-form validate-form p-b-33 p-t-5" method="post">

               

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input  class="input100 " type="password" name="passwmed" id="passwmed" 
                    placeholder="Mot de passe " maxlength="30" required>
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input  class="input100 " type="password" name="conf" id="conf" 
                    placeholder="Confirmation de Mot de passe" maxlength="30" required>
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
</body>
</html>
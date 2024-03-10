<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Médecin</title>
    <link rel="stylesheet"  href="css/util.css">
	<link rel="stylesheet"  href="css/med.css">
    <link rel="icon" type="image/png" href="Login_v16/images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="Login_v16/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

</head>

<body>
    

    <div class="container-login100" style="background-image:url('imagemedcin/med5.jpg');">
    <a class="navbar-brand" href="../index.php"><img id="imag" src="Logo/LOGO_white.png" alt="..." /></a>
        <div class="wrap-login100 p-t-30 p-b-50" >
            <span class="login100-form-title p-b-41">
            Connexion Médecin
            </span>
            
            <form class="login100-form validate-form p-b-33 p-t-5" method="post">
            

                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                    <input class="input100" type="text" name="cinmed" id="cinmed" 
                        placeholder="CIN" maxlength="10" value="<?php if(isset($_COOKIE["cin"])){ echo $_COOKIE["cin"]; } ?>">
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input  class="input100 " type="password" name="passwmed" id="passwmed" 
                    placeholder="Mot de passe " maxlength="30" value="<?php if(isset($_COOKIE["pass"])){ echo $_COOKIE["pass"]; }?>">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                </div>

                <div style="margin-left:140px;position:relative; top:20PX;">
                    <input type="radio" name='check' id='check'  >
                    <label style="position:relative;bottom:21px; left:20px;color:white;">se souvenir </label>
                </div>

                <div style="display:flex;">
                    <div class="container-login100-form-btn m-t-32">
                        <button  type="submit" name="login" class="login100-form-btn" >
                        Connexion
                        </button>   
                    </div>

                    <div class="container-login100-form-btn m-t-32">
                        <button  type="button" class="login100-form-btn" name="creet" onclick="window.location.href='crtmedcin.php'">
                        Créer un compte
                        </button>
                    </div>
                </div>
            
                    
                    <div class="lien" style="position:relative;left:190px; top:20px;"> <a href='oublier.php'>Mot de passe oublié ?</a></div>
               
            </form>
        </div>
    </div>
	</div>
    <?php 
        require "conexion.php";
        // si clicker sur le button connexion faire sa :
        if(isset($_POST["login"])){
			
            	// on a prend les valeurs des input
            $cinmed=$_POST["cinmed"]; 
			$passwmed=$_POST["passwmed"];
            	//cherche sur le mot de pass et la cin dans la base de donnes hotel.
            $req="SELECT `codeusermed`, `passmed`, `cinmed` FROM `usermed` WHERE `cinmed`='$cinmed' and 
            `passmed`=SHA1('$passwmed')";
            $rep=$con->query($req);
            	//si le mot de pass et la cin trouver  dans la base de donne.
            if($ligne=$rep->fetch()){
                // on faire la connexion est aller a la page d'accueil.
                header ("location:medcinaccueil.php");     
                $_SESSION["cin"]= $ligne['cinmed']  ;        
            }
            else{
                //sinon on affiche un message pour corecter l'utilisateur votre donnez.
                echo"<script>alert('Les données sont incorrectes')</script>";
            }
        }
        //si l'utilistaeur checker la button radio .
        if(isset($_POST["check"])){
            //  on fait la criation des cookie pour se connecter la prochaine foire dirrectement . 
            setcookie('cin',$_POST["cinmed"],time()+365*24*3600,null,null,false,true);
            setcookie('pass',$_POST["passwmed"],time()+365*24*3600,null,null,false,true);

        }
		
		?> 






















































</body>
</html>
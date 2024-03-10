<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Administration</title>
    <link rel="stylesheet"  href="css/util.css">
	<link rel="stylesheet"  href="css/med.css">
    <link rel="icon" type="image/png" href="../Login_v16/images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="../Login_v16/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
</head>
<body>
	<div class="limiter">
    <div class="container-login100" style="background-image:url('imageadmin/med9.jpg');">
        <div class="wrap-login100 p-t-30 p-b-50" >
            <span class="login100-form-title p-b-41">
                Compte ADMIN
            </span>
            <form class="login100-form validate-form p-b-33 p-t-5" method="post">

                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                    <input class="input100" type="text" name="cinmed" id="cinmed" 
                        placeholder="CIN" >
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input  class="input100 " type="password" name="passwmed" id="passwmed" 
                    placeholder="Mot de passe ">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                </div>
                <div style="display:flex;">
                    <div class="container-login100-form-btn m-t-32">
                        <button  type="submit" name="login" class="login100-form-btn" >
                        Connexion
                        </button>   
                    </div>
                    <div class="container-login100-form-btn m-t-32">
                        <button   class="login100-form-btn" >
                        <a href="../index.php">Retour</a>
                        </button>   
                    </div>
                    
                </div>
                <!-- <div class="lien" style="position:relative;left:190px; top:20px;"> <a href='oublier.php'>Oublier mot de Passe</a></div> -->

                
            </form>
        </div>
    </div>
	</div>
    <?php
        require "conexionadmin.php";
        if(isset($_POST["login"])){
            $cinmed=$_POST["cinmed"];
            $passwmed=$_POST["passwmed"];
            echo    $cinmed;
            echo  $passwmed;
            $req="SELECT `user`, `password` FROM `admin` WHERE `user`='$cinmed' and 
             `password`=SHA1('$passwmed')";
            $rep=$con->query($req);
            if($ligne=$rep->fetch()){
                header("location:admin.php");
            }
            else{
                echo"<script>alert('Vos données sont incorrectes')</script>";
            }
        }
    ?>
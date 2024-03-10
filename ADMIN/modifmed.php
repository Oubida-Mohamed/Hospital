<?php session_start();?>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier-info-Med</title>
    <link rel="stylesheet"  href="css/util.css">
	<link rel="stylesheet"  href="css/med.css">
</head>
<body> 
<?php
    require "conexionadmin.php";
    $suiv="false";
    $cin=$_SESSION["cin"];
    
    $rep=$con->query("SELECT `cinmed`, `nommed`, `prenommed`, `telemed`, `emailmed`,
        `sexe` FROM `medcin` WHERE `cinmed`='$cin'");
        $ligne=$rep->fetch();
        $Nommed=$ligne["nommed"];
        $Prenommed=$ligne["prenommed"];
        $sex=$ligne["sexe"];
        $telemed=$ligne["telemed"];
        $emailmed=$ligne["emailmed"];

       
    ?>
    <div class="limiter">
        <div class="container-login100" style="background-image:url('imageadmin/med7.jpg');">
            <div class="wrap-login100 p-t-30 p-b-50" >
                <span class="login100-form-title p-b-41">
                    Modifier les informations
                </span>
                <form class="login100-form validate-form p-b-33 p-t-5"  method="post"  >
                    <div class="wrap-input100 validate-input" data-validate = "Entrer username">
                        <input class="input100" type="text" name="cinmed" id="cinmed" 
                            value="<?php echo $cin ;?>" required disabled>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Entrer nom">
                        <input  class="input100 " type="text" name="Nommed" id="Nommed" 
                        value="<?php echo $Nommed ;?>" required>
                        
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Entrer prenom">
                        <input  class="input100 " type="text" name="Prenommed" id="Prenommed" 
                        value="<?php echo $Prenommed ;?>" required> 
                    </div>
                    <div  class="wrap-input100 validate-input">
                        <label for="sexe">Genre</label>
                        <?php
                        if($sex=="homme"){
                            echo " <div class='input'>
                            <input type='radio' name='sex' id='h' value='homme' checked ><label for='h'>Homme </label>
                            <input type='radio' name='sex' id='f' value='femme'><label for='f'>Femme </label></div>";
                        }else{
                            echo "<div class='input'>
                            <input type='radio' name='sex' id='h' value='homme'><label for='h'>Homme </label>
                            <input type='radio' name='sex' id='f' value='femme'checked><label for='f'>Femme </label></div>";
                        }
                        ?>
                    
                    </div> 
                    <div class="wrap-input100 validate-input" data-validate="Entrer telephone">
                        <input  class="input100 " type="text" name="telemed" id="telemed" 
                        placeholder="Telephone " value="<?php echo $telemed ;?>"required>
                        
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Entrer email">
                        <input  class="input100 " type="text" name="emailmed" id="emailmed" 
                        placeholder="Email " value="<?php echo $emailmed ;?>" required>
                        
                    </div>
                    <div  style="display:flex;">
                        <div class="container-login100-form-btn m-t-32">
                            <button  type="submit" name="modf"  class="login100-form-btn" >
                            Modifier 
                            </button>       
                        <!-- </div>
                        <?php
                        // if($suiv=='true'){echo"<div class='container-login100-form-btn m-t-32'>
                        // <button><a class='login100-form-btn' href='index.php?'>
                        // retour</a> </button></div>";}?>-->
                        
                    </div>
                </form>
            </div>
        </div>
	</div> 
    <?php
     if(isset($_POST["modf"])){
        $Nommed=$_POST["Nommed"];
        $Prenommed=$_POST["Prenommed"];
        $sex=$_POST["sex"];
        $telemed=$_POST["telemed"];$emailmed=$_POST["emailmed"];
        $rep=$con->exec("UPDATE `medcin` SET `cinmed`='$cin',`nommed`='$Nommed',`prenommed`='$Prenommed',
        `telemed`='$telemed',`emailmed`='$emailmed',`sexe`='$sex' WHERE `cinmed`='$cin'");
        if($rep){
            echo "<script>alert('Modifier avec succès')</script>";
            header("location:information.php?cin=$cin");
            $suiv='true';
            

        }
    }
  

?>
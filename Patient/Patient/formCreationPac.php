<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Création d'un compte patient</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php require "connexion.php"; ?>
	<!-- <link rel="stylesheet" href="script/css/jquery.passwordRequirements.css">
    <script src="script/js/Jquery.js"></script>
    <script src="script/js/jquery.passwordRequirements.js"></script>
    <script src="script/js/jquery.passwordRequirements.min.js"></script>
    <script src="script/JqeuryScript.js"></script> -->

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/img3.jpg');">
			<div class="wrap-login100">
				<form method="post" enctype="multipart/form-data">

					<span class="login100-form-title p-b-34 p-t-27">
					Création d'un compte patient
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="cinPat" placeholder="CIN *" maxlength="10" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="nomPat" placeholder="Nom *" maxlength="40" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="prenomPat" placeholder="Prénom *" maxlength="40" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="sexe">
						<input type="radio" name="genrePac" value="Homme" id="Homme" checked>&nbsp&nbsp<label for="Homme">Homme</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<input type="radio" name="genrePac" value="Femme" id="Femme">&nbsp&nbsp<label for="Femme">Femme</label>
					</div><br>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="motPass" class="pr-password" placeholder="Mot de passe *" maxlength="30" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="RemotPass" class="pr-password" placeholder="Confirmer mot de passe*" maxlength="30" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="date" name="dtNaissancePat" required>
						<span class="focus-input100" data-placeholder="&#x1F5D3;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="tel" name="telePat" id="telePat" placeholder="Téléphone *" maxlength="10" required>
						<span class="focus-input100" data-placeholder="&#xf2bc;"></span>
					</div>

					<div><label for="photoPat" style="color:white;">optional</label>
						<input class="file" type="file" name="photoPat" id="photoPat" accept="image/*">
						
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="envoyer">
						Créer
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="../formConnecPatient.php">
							Vous avez dèja un compte ?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div ></div>
	<?php
    $status = $statusMsg = '';
    if(isset($_POST['envoyer'])){
        $CIN=$_POST['cinPat'];$nom=$_POST['nomPat'];$prenom=$_POST['prenomPat'];$pass=$_POST['motPass'];$Repass=$_POST['RemotPass'];
        $DtNaiss=$_POST['dtNaissancePat'];$genrePac=$_POST['genrePac'];$telePat=$_POST['telePat'];
    $reqette=$con->query("SELECT `cinpac` FROM `userpac` where cinpac='$CIN'");
    if($line=$reqette->fetch()) echo "<script>alert('Cin dèjà exist');</script>";
    else{
    if($pass!==$Repass) echo"<script>alert('Le mot passe doit être le même de confirmation');</script>";
    else{
        if(!empty($_FILES["photoPat"]["name"])){
            $image = $_FILES['photoPat']['tmp_name'];
            $image_name=$_FILES["photoPat"]["name"];
            $img_path="Profil_Patient_img/".$image_name;
            $imgContent= move_uploaded_file($image,$img_path);
        }
        else {
            $image_name="profil_img.png";
        }
        // Insert image into database 
        $insert = $con->exec("INSERT INTO `pacient`(`cinpac`, `nompac`, `prenompac`, `genrePac`, `datenaissancepac`, `TelePac`, `photopac`) 
        VALUES ('$CIN','$nom','$prenom','$genrePac','$DtNaiss','$telePat',\"$image_name\")");
        $req = $con->exec("INSERT INTO `userpac`(`codeuserpac`, `passpac`, `cinpac`) VALUES (null,sha1('$pass'),'$CIN')");
        if($insert && $req){
            echo "<script>alert('Le compte est bien créé');</script>";
            // header("location:formConnecPatient.php");
        }
        else{
            echo "<script>alert('Réessayer');</script>";
        }
        
    }
}
}
?>
</body>
</html>
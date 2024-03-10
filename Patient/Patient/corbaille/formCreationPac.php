<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de compte</title>
    <?php require "connexion.php"; ?>
    <link rel="stylesheet" href="script/css/jquery.passwordRequirements.css">
    <script src="script/js/Jquery.js"></script>
    <script src="script/js/jquery.passwordRequirements.js"></script>
    <script src="script/js/jquery.passwordRequirements.min.js"></script>
    <script src="script/JqeuryScript.js"></script>
</head>
<body>
    <h2>Creation of a patient account</h2>
    <form method="post" enctype="multipart/form-data">
        <div>
            <input type="text" name="cinPat" placeholder="CIN" required>
        </div>
        <div>
            <input type="text" name="nomPat" id="nomPat" placeholder="Last name" required>
            <input type="text" name="prenomPat" id="prenomPat" placeholder="First name" required>
        </div>
        <div>
            <input type="radio" name="genrePac" value="Homme" checked><label for="H">Homme</label>&nbsp&nbsp&nbsp&nbsp
            <input type="radio" name="genrePac" value="Femme"><label for="F">Femme</label>
        </div>
        <div>
            <input type="password" name="motPass" id="motPass" class="pr-password" placeholder="Password" required>
            <input type="password" name="RemotPass" id="RemotPass" class="pr-password" placeholder="Confirm password" required>
        </div>
        <div>
            <label for="dtNaissancePat">Date de naissance</label> 
            <input type="date" name="dtNaissancePat" id="dtNaissancePat" required>
        </div>
        <div>
            <input type="tel" name="telePat" id="telePat" placeholder="Phone number" required>
        </div>
        <div>Choose : 
            <label for="photoPat">Photo profile</label>
            <input type="file" name="photoPat" id="photoPat" accept="image/*" hidden>
        </div>
        <div>
            <input type="submit" value="Create" name="envoyer">
        </div>
        <div>
            <a href="../formConnecPatient.php">Vous avez dèja un compte ?</a>
        </div>
            
            
                
            
            
            
        </table>
    </form>
<?php
    $status = $statusMsg = '';
    if(isset($_POST['envoyer'])){
        $CIN=$_POST['cinPat'];$nom=$_POST['nomPat'];$prenom=$_POST['prenomPat'];$pass=$_POST['motPass'];$Repass=$_POST['RemotPass'];
        $DtNaiss=$_POST['dtNaissancePat'];$genrePac=$_POST['genrePac'];$telePat=$_POST['telePat'];
    $reqette=$con->query("SELECT `cinpac` FROM `userpac` where cinpac='$CIN'");
    if($line=$reqette->fetch()) echo "<script>alert('Cin dèjà exist');</script>";
    else{
    if($pass!==$Repass) echo"<script>alert('Mot de passe doit être le même');</script>";
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
        $insert = $con->query("INSERT INTO `pacient`(`cinpac`, `nompac`, `prenompac`, `genrePac`, `datenaissancepac`, `TelePac`, `photopac`) 
        VALUES ('$CIN','$nom','$prenom','$genrePac','$DtNaiss','$telePat','$image_name')");
        $req = $con->query("INSERT INTO `userpac`(`codeuserpac`, `passpac`, `cinpac`) VALUES (null,sha1('$pass'),'$CIN')");
        if($insert && $req){
            echo "<script>alert('File uploaded successfully');</script>";
            header("location:../formConnecPatient.php");
        }
        else{
            echo "<script>alert('File upload failed, please try again');</script>";
        }
        
    }
}
}
?>
</body>
</html>
<?php
// Start the session
session_start();
?>
<!doctype html>
<html lang="fr">
  <head>
  	<title>Connexion Patient</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<!-- Connexion au base donnee -->
	<?php require "Patient/connexion.php"; ?>
	</head>
	<body class="img js-fullheight" style="background-image: url(images/img2.jpg);">
	<!-- PHP CODE -->
	<?php
    if(isset($_POST['connexion'])){
        $cin=$_POST['cinPat'];$pass=$_POST['passPat'];
        $req="SELECT `passpac`, `cinpac` FROM `userpac` where cinpac='$cin' and passpac=sha1('$pass')";
        $rep=$con->query($req);
        if($ligne=$rep->fetch()){
			$reqq=$con->query("SELECT `cinpac`, `nompac`, `prenompac`, `genrePac`, `datenaissancepac`, `TelePac`, `photopac` FROM `pacient` 
			WHERE `cinpac`='$cin'");
			$line=$reqq->fetch();
			$photoPac=$line['photopac'];$nomPac=$line['nompac'];

			$_SESSION['photoPac']=$photoPac;$_SESSION['nompac']=$nomPac;$_SESSION['cin']=$cin;

            header("location:Patient/Rendez_vous.php");
        }
        else echo "<script>alert('Les données sont incorrectes');</script>";
    }
?>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Espace Patient</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Avoir un compte ?</h3>
		      	<form class="signin-form" method="POST">
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="CIN" name="cinPat" maxlength="10" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" placeholder="Mot de passe" name="passPat" maxlength="30" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3" name="connexion">Connexion</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
					</div>
					<div class="w-50 text-md-right">
						<a href="Patient/MotPassOubliePac.php" style="color: #fff">Mot de passe oublié ?</a>
					</div>
	            </div>
	          </form>
	          <p class="w-100 text-center">&mdash; Or &mdash;</p>
	          <div class="social d-flex text-center">
	          	<a href="Patient/formCreationPac.php" class="px-2 py-2 mr-md-1 rounded"><span>Créer un compte</span></a>
	          	
	          </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>


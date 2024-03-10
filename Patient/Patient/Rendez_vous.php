<?php
// Start the session
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Patient-Choisir un médecin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/Rendez_vous.css">
	<?php require "connexion.php"; ?>
	</head>
	<body>
	<?php $img_name=$_SESSION['photoPac'];$nomPac=$_SESSION['nompac']; ?>
	<header class="header">
		<div class="info">
			<img class='image' src="<?php echo 'Profil_Patient_img/'.$img_name; ?>">
			<p>Hello,<span><?php echo $nomPac; ?></span></p>
		</div>
		<!-- <h1 class="logo"><a href="#">Flexbox</a></h1> -->
      <ul class="main-nav">
          <li><a href="DeconnexionPac.php">Déconnexion</a></li>
      </ul>
	</header> 

	
	
	<!-- <form method="post">
		<div class="nav">
			<a href="DeconnexionPac.php">Deconnexion</a>
			<div class="info">
				<img class='image' src="<?php echo 'Profil_Patient_img/'.$img_name; ?>">
				<p>Hello,<span><?php echo $nomPac; ?></span></p>
			</div>
		</div>
    <h2>List des medcine</h2>
	</form>  -->
	<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						<?php
						$CinPac=$_SESSION['cin'];
						$reqet=$con->query("SELECT `cinmed`, `nommed`, `prenommed`, `telemed`, `labelspecialiter` FROM `medcin`,`specialiter` 
						WHERE medcin.codspecialiter=specialiter.codespecialiter");

					    echo "
						<thead class='thead-primary'>
							<tr>
								<th>Nom de médecin</th>
								<th>Prénom de médecin</th>
								<th>Téléphone</th>
								<th>Spécialité</th>
								<th>Cliquer pour choisir</th>
							</tr>
					    </thead>";
						echo "<tbody>";
						while($ligne=$reqet->fetch()){
							$CinMed=$ligne['cinmed'];$NomMed=$ligne['nommed'];
							$PrenomMed=$ligne['prenommed'];$TeleMed=$ligne['telemed'];
							$SpecialMed=$ligne['labelspecialiter'];
							echo"
								<tr>
									<th scope='row' class='scope' >".$NomMed."</th>
									<th>".$PrenomMed."</th>
									<td>".$TeleMed."</td>
									<td>".$SpecialMed."</td>
									<td><a href='Rendez_vous2.php?CinMed=$CinMed' class='btn btn-primary'>Choisir</a></td>
								</tr>";
						}
						echo "</tbody>";
						?>
					  </table>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script> -->

	</body>
</html>


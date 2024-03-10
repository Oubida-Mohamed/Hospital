<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration-Accueil</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/Specialite.css">
    
</head>
<body>
<div  class="body">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
        <a class="navbar-brand" href="../index.php"><img id="imag" src="logo/LOGO_white.png" alt="..." /></a>     
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item" ><a class="nav-link" href="#Accueil" >Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#Medcin" >Medcin</a></li>
                    <li class="nav-item"><a class="nav-link" href="#Spécialité">Spécialité</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>

                    <li class="nav-item" id="adm"><a class="nav-link"  href="DeconnexionMed.php">Deconnexion</a></li> 
                </ul>
            </div>
        </div>
        </nav>
        <header class="masthead" id="Accueil">
            <div class="container" >
                <div class="masthead-heading text-uppercase">Bienvenue !</div>
                <div class="masthead-subheading">ADMIN</div>
            </div>
        </header>
</div>
<section class="page-section bg-light" id="Medcin"><br><br>
        <!-- <div class="h2">
            <h2 >Les Medcines...</h2>
        </div> -->
        <div class="text-center">
                    <h2 class="section-heading text-uppercase">Les Médecins...</h2>
                </div>
        <main>
            <table>
                <thead>
                <tr>
                    <th>CIN Médecin</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Choisir</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    require "conexionadmin.php"; 
                    $reqet=$con->query("SELECT `cinmed`, `nommed`, `prenommed` FROM `medcin` ");
                    while($ligne=$reqet->fetch()){
                        $cinmed=$ligne['cinmed'];
                        $NomMed=$ligne['nommed'];
                        $PrenomMed=$ligne['prenommed'];
                        echo "<tr>
                            <td data-title='Provider Name'>
                            ".$cinmed."
                            </td>
                            <td data-title='E-mail'>
                            ".$NomMed."
                            </td>
                            <td>
                            ".$PrenomMed."
                            </td>
                            <td class='select'>
                            <a class='button' href='information.php?cin=$cinmed'>
                                Select
                            </a>
                            </td>
                        </tr>";}?>
                </tbody>
            </table>
        </main>
</section>
        <!-- specialiter -->
        <br><br>
        <section class="page-section bg-light"  id="Spécialité">
		<div class="container">
			<div class="row justify-content-center">
            <!-- <div class="h2">
                <h2>Les Spécialiter...</h2>
            </div> -->
            <div class="text-center">
                    <h2 class="section-heading text-uppercase">Les Spécialités...</h2>
                </div>
			</div><br><br>
			<div class="row" >
					<div class="table-wrap">
						<table class="table">
					    <thead class="thead-primary">
					      <tr>
					        <th>Code Spécialité</th>
					        <th>Le nom Spécialité</th>
					        <th>Présentation de Spécialité</th>
					        <th>Choisir</th>
					      </tr>
					    </thead>
						<?php
						$rep=$con->query("SELECT `codespecialiter`, `labelspecialiter`, `presentationspecialiter` FROM `specialiter`");
						while($ligne=$rep->fetch()){
							$codeSp=$ligne['codespecialiter'];$labelSp=$ligne['labelspecialiter'];$Presentation=$ligne['presentationspecialiter'];
							echo "<tbody>
								<tr>
									<th scope='row' class='scope' >".$codeSp."</th>
									<td>".$labelSp."</td>
									<td>".$Presentation."</td>
									<td><a href='SupprSpecialite.php?code=$codeSp' onclick=\"return confirm('Vous êtes sûre ?');\" class='btn btn-primary'>Supprimer</a></td>
								</tr>
							</tbody>";
						}
						?>
					    <tbody>
					      <tr>
					        <th scope="row" class="scope" colspan="3">Pour ajouter une nouvelle spécialité, cliquer sur le bouton Ajouter</th>
					        <td><a href="AddSpecialite.php" class="btn btn-primary">Ajouter</a></td>
					      </tr>
					    </tbody>
						
					  </table>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>
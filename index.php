<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MEDICAL</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="index_dossier/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
         <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script> 
        
        
        <link href="index_dossier/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                 <a class="navbar-brand" href="index.php"><img id="imag" src="index_dossier/Logo/LOGO_white.png" alt="..." /></a>
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" 
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">  -->
                   
                   
                    <!-- Menu -->
                    <!-- <i class="fas fa-bars ms-1"></i> -->
                <!-- </button> -->
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <!-- <li class="nav-item"><a class="nav-link" href="#services">Services</a></li> -->
                        <!-- <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li> -->
                        <li class="nav-item"><a class="nav-link" href="#Accueil">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="#Équipe">Équipe</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                        <li class="nav-item" id="adm"><a class="nav-link" href="ADMIN/admincmpt.php">Administration</a></li> 

                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead" id="Accueil">
            <div class="container" >
                <div class="masthead-heading text-uppercase">Bienvenue !</div>
                <div class="masthead-subheading">Nous sommes toujours Prêts à aider !</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="Patient\formConnecPatient.php">Espace patient</a>
                <a class="btn btn-primary btn-xl text-uppercase" href="Medcine/medcin.php">Espace médecin</a>  
            </div>
        </header>
        
        
        
                        
        <!-- Team-->
        <section class="page-section bg-light" id="Équipe">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Notre incroyable équipe</h2>
                    
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="index_dossier\team\AyoubProfil.jpg" alt="..." />
                            <h4>Oubakki Ayoub</h4>
                            <p class="text-muted">Développeur principal</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/ayoub.lasvegas/" target="_blank" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="index_dossier\team\MohamedProfil.jpg" alt="..." />
                            <h4>Oubida Mohamed</h4>
                            <p class="text-muted">Développeur principal</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/mohamed.oubida.35" target="_blank" aria-label="Larry Parker Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
        

        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contactez nous</h2>
                </div>
                <form id="contactForm"  method='post' action="">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input  type="text"  name="name" id="name" class="form-control"
                                placeholder="Votre Nom complet *" maxlength="45" required />                             
                            </div>
                            <div class="form-group">
                                <!-- Email address input-->
                            <input  type="email"  name="email" id="email" class="form-control"
                                placeholder="Votre E-mail *" maxlength="45" required />    
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Phone number input-->
                                <input  type="tel"  name="tele" id="phone" class="form-control"
                                placeholder="Votre Téléphone *" maxlength="10" required />    
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <!-- Message input-->
                                <textarea id="message" name="messge"class="form-control"placeholder="Votre Message *" maxlength="490" required></textarea> 
                            </div>
                        </div>
                    </dIV>
                    <!-- Submit Button-->
                    <div class="text-center">
                        <button class="send" id="submitButton" type="submit" name="contact">Envoyer</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    
                </div>
            </div>
        </footer>

        <!-- Bootstrap core JS-->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
        <!-- Core theme JS-->

        <?php
        require 'index_dossier/conexion.php';
        if(isset($_POST["contact"])){
                 $email=$_POST["email"];
                 $name=$_POST["name"];
                 $tele=$_POST["tele"];
                 $messg=$_POST["messge"];
                 $req="INSERT INTO `contact`(`idContact`, `fullName`, `email`, `tele`, `message`) 
                 VALUES (null,'$name','$email','$tele','$messg')";
                 $con->exec($req);
        }
        ?>
        <script src="index_dossier/js/scripts.js"></script>
    </body>
</html>

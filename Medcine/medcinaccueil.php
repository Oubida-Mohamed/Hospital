<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Medcin-Accueil</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script> 
         <link rel="stylesheet"  href="css/acueil.css">
        <link href="css/styles.css" rel="stylesheet" />
        <?php
        require "conexion.php";
        $cin=$_SESSION["cin"];
        $rep1=$con->query("SELECT `photomed`, `nommed`, `prenommed`,`sexe` FROM `medcin` 
        WHERE `cinmed`='$cin'");
        $ligne=$rep1->fetch();?>
    </head>
    <body id="page-top" >
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <?php $photo=$ligne["photomed"];
            echo"<img src='images/$photo' style=' width:80px;
            height:50px;
            border-radius: 50%;'/>";?>
            <div id='enligne'> </div>
    <div style=' position:relative;
    top:10px; left:5px;'>en Ligne</div>
            <div class="container">
                <!-- Menu -->
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#Accueil">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="#ajourdhuit">Rendez-vous</a></li>
                        <li class="nav-item"><a class="nav-link" href="#patient">Chercher un patient</a></li>
                        <li class="nav-item" id="adm"><a class="nav-link" href="DeconnexionPac.php">Déconnexion</a></li> 
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Masthead-->
        <header class="masthead" id="Accueil">
            <div class="container" >
                <div class="masthead-heading text-uppercase">Bienvenue !</div>
                <?php
                    if($ligne["sexe"]=="homme"){
                        echo"<div class='masthead-subheading' id='welcom'>Mr le docteur ".$ligne['nommed'] ." ".
                        $ligne['prenommed']."</div>";
                    }
                    else{
                        echo"<div class='masthead-subheading' id='welcom'>Mme la docteure ".$ligne['nommed'] ." ".
                        $ligne['prenommed']."</div>";
                    }
                ?>
            </div>
        </header> 

        <!-- Rendez-vous-->
        <br><br><br>
        <!-- <div id="mdrndv"> -->
            <section  id='ajourdhuit' >
            <?php 
                $x=0;
                $r=0;
                $date=date("Y-m-d");
                $req="SELECT `numrend`, `daterend`, `heurerend`, `cinmed`, `cinpac` FROM `rendezvous` WHERE 
                `daterend`='$date' and `cinmed`='$cin' order by `heurerend`";
                $rep=$con->query($req);
                while($ligne=$rep->fetch()){  
                    $r++;   
                    if($x==0) {
                        echo"<div class='text-center'>
                                <h2 class='section-heading text-uppercase'>Les rendez-vous d'aujourd-huit</h2>
                            </div>";
                        echo"<table border='1' class='table'><tr><th>Numero de Rendez-vous</th>
                        <th>Date de Rendez-vous</th><th>Heure de Rendez-vous</th><th>cin de patient </th></tr>";$x++; 
                    }                       
                        $cinpac=$ligne["cinpac"];                
                        echo"<tr><td id='col1'>".$ligne["numrend"]."</td><td id='col2'>".$ligne["daterend"]."</td>
                        <td id='col1'>".$ligne["heurerend"]."</td>
                        <td id='col2'>".$ligne["cinpac"]."</td></tr>";
                }
                    echo("</table>"); 
                    
                    if($r==0){
                        echo"<div class='text-center' id='dans'>
                                <h2 class='section-heading text-uppercase'>Pas de rendez-vous aujourd'hui </h2>
                            </div>";
                    }
                ?>
                <section id="rendezvous">
                <form  method="post"  action="medcinaccueil.php#rendezvous" class="rend">
                    <div class='rendezvous'>
                    
                        <input type="date" name="date"  >
                        <input type="submit" value=" Chercher" name="rendv" class="rndv">
                    <div>
                </form>
                <?php 
                echo "<div class='rslrndv'>";
                if(isset($_POST["rendv"])){
                    $a=0;
                    $x=0;
                    if(!empty($_POST["date"])){
                        $date=$_POST["date"];
                        $rep=$con->query("SELECT `numrend`, `daterend`, `heurerend`, `cinmed`, `cinpac` FROM `rendezvous`
                        WHERE `daterend`='$date' and `cinmed`='$cin'  order by `heurerend`");
                        while($ligne=$rep->fetch()){
                            $x++;
                                if($a==0){
                                    echo"<div class='text-center' id='dans'>
                                    <h2 class='section-heading text-uppercase'>Les rendez-vous dans ".$date."</h2>
                                    </div>";
                                    echo"<table border='1'><tr><th>Numero de Rendez-vous</th><th>Date de Rendez-vous</th>
                                    <th>Heure de Rendez-vous</th><th>cin de patient </th></tr>"; }
                                $a++;
                                $cinpac=$ligne["cinpac"];
                                echo"<tr><td id='col1'>".$ligne["numrend"]."</td><td id='col2'>".$ligne["daterend"]."</td>
                                <td id='col1'>".$ligne["heurerend"]."</td>
                                <td id='col2'>".$ligne["cinpac"]."</td></tr>";
                        }
                        echo("</table>"); 
                        if($x==0){
                            echo"<div class='text-center' id='dans'>
                                    <h2 class='section-heading text-uppercase'>Pas de rendez-vous dans  ".$date."</h2>
                                </div>";
                        }
                    }
                    
                    else{
                        echo"<script>alert('Choisir une date')</script>";
                    }     
            }else{
                echo"<div class='text-center' id='dans'>
                        <h2 class='section-heading text-uppercase'>Vous Choisiriez une Date pour afficher les rendez-vous dans cette date  </h2>
                    </div>";

            }
            echo "</div>" ;?>
            </section>
                </section>
        <!-- </div> -->
            
        <!-- chercher sur un patient -->
        <section id='patient'>
            <form method='post' class="form" action="medcinaccueil.php#patient">
                <input type="search" name="inpcherch" placeholder="Chercher un patient..." required/>
                <button type="submit"  name="cherch" class="chrch"><i class="fa fa-search"></i></button><br>
            <form >
        <?php
    //    echo"<section id='patient'>";
        if(isset($_POST["cherch"])){
            $cinpac=$_POST["inpcherch"];
            $rep=$con->query ("SELECT `cinpac`, `nompac`, `prenompac`, `genrePac`, `datenaissancepac`, 
            `telePac`, `photopac` FROM `pacient` WHERE `cinpac`='$cinpac' and 
            `cinpac`=any(select `cinpac` from rendezvous  where `cinmed`='$cin')");
            if($ligne=$rep->fetch()){
                echo"<div class='text-center' id='info'>
                        <h2 class='section-heading text-uppercase'>Plus d'informations...</h2>
                     </div>";
                $photopac=$ligne["photopac"];
                echo"<div class='medcin'>";
                echo"<img src='../Patient/Patient/Profil_Patient_img/$photopac'/>
                <span id='p1'> ". $ligne['nompac'] ." " . $ligne['prenompac']."</span >
                <hr>
                <p id='p2'>Date de Naissance :".$ligne['datenaissancepac']."</p>
                <hr>
                <p id='p3'> Genre : ".$ligne['genrePac']."</p>
                <hr>
                <p id='p4'>Telephone :".$ligne['telePac']."</p>
                <hr>
                </div>";   
            }
            else{
                echo"<div class='text-center' >
                    <h2 class='text2'>Le patient qu'il a le CIN   '".$cinpac."' est introuvable</h2>
                </div>";
            } 
        }else{
            echo"<div class='text-center' >
                    <h2 class='text3'>Vous feriez taper le CIN de patient pour donner plus d'information sur lui </h2>
                </div>";
            
        }
        ?>
        </section>
      


       
         <script src="js/scripts.js"></script> 
  
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

       
    </body>
</html>
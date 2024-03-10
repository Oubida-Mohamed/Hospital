<?php 
    session_start(); // demarrage de la session
    session_destroy(); // on détruit les sessions
    header('Location:medcin.php'); // On redirige
    die();
    ?>
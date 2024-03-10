<?php 
    session_start(); // demarrage de la session
    session_destroy(); // on détruit les sessions
    header('Location:admincmpt.php'); // On redirige
    die();
    ?>
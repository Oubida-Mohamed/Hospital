<?php
    require "conexionadmin.php";
    $idCont=$_GET['idC'];
        $reqt=$con->query("DELETE FROM `contact` WHERE `IdContact`=$idCont");
        if($reqt){
            header("location:Contact.php");
        }
?>
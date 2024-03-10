<?php 
require "conexionadmin.php";
$codeSp=$_GET['code'];
$reqt=$con->query("DELETE FROM `specialiter` where `codespecialiter`=$codeSp");
if($reqt){
    header("location:admin.php#Spécialité");
}
?>
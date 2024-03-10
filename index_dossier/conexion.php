<!DOCTYPE html>
<html>
<body>
<?php
    $dbhost='localhost';
    $dbname='hopitale';
    $dbuser='root';
    $dbpass='';
    $dsn="mysql:host=".$dbhost.";dbname=".$dbname;
    try
    {
    $con=new pdo($dsn,$dbuser,$dbpass); }
    catch (Exception $ex)
    {
    die('connection echouee'.$ex->getMessage())   ;
    exit;}
    ?>
</body>
</html>
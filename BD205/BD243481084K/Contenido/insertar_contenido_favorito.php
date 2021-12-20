<?php
$usuari= $_POST['usuari'];  //Hacer un SELECT con el nombre de usuario para sacar el idContracte
$video = $_POST['video'];

include "../../PHP/conexion.php";

$consulta = 'SELECT idContracte from CONTRACTE where nomUsuari = "'.$usuari.'"';
$idContracte = mysqli_query($con, $consulta);

$cadena = "insert into CONTFAV (idContracte,video) values ('".$idContracte."','".$video."')";

mysqli_query($con,$cadena);

echo $cadena;
?>
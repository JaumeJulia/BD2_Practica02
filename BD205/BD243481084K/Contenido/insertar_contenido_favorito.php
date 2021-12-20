<?php
$usuari= $_POST['usuari'];  //Hacer un SELECT con el nombre de usuario para sacar el idContracte
$video = $_POST['video'];

$con = mysqli_connect("localhost","root",""); 
$db = mysqli_select_db($con,"BD205");

$consulta = 'SELECT idContracte from CONTRACTE where nomUsuari = '.$usuari;
$idContracte = mysqli_query($con, $consulta);

$cadena = "insert into CONTFAV (idContracte,video) values ('".$idContracte."','".$video."')";

mysqli_query($con,$cadena);


echo $cadena;
?>
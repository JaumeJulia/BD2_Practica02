<?php
$idFavoritCont = $_POST['idFavoritCont'];
$idContracte = $_POST['idContracte'];
$idContingut = $_POST['idContingut'];

$cadena = "insert into CONTFAV (idFavoritCont,idContracte,idContingut) values ('".$idFavoritCont."','".$idContracte."','".$idContingut."')";


$con = mysqli_connect("localhost","root",""); 
$db = mysqli_select_db($con,"BD205");
mysqli_query($con,$cadena);


echo $cadena;
?>
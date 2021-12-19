<?php
$idFavoritCat = $_POST['idFavoritCat'];
$idContracte = $_POST['idContracte'];
$categoria = $_POST['categoria'];

$cadena = "insert into CATFAV (idFavoritCat,idContracte,categoria) values ('".$idFavoritCat."','".$idContracte."','".$categoria."')";


$con = mysqli_connect("localhost","root","");
$db = mysqli_select_db($con,"BD205");
mysqli_query($con,$cadena);


echo $cadena;
?>
<?php
$idContracte = $_POST['idContracte'];
$categoria = $_POST['categoria'];

$cadena = "insert into CATFAV (idContracte,categoria) values ('".$idContracte."','".$categoria."')";


$con = mysqli_connect("localhost","root","");
$db = mysqli_select_db($con,"BD205");
mysqli_query($con,$cadena);


echo $cadena;
?>
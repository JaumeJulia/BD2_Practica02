<?php
//$idContracte = $_POST['idContracte'];
include "../../PHP/conexion.php";
$categoria = $_POST['categoria'];
$user = $_POST['uname'];
$consultaContracte = 'SELECT idContracte FROM contracte WHERE contracte.nomUsuari = "'.$user.'"'; //sacamos el contrato del usuario
$contestacioContracte = mysqli_query($con, $consultaContracte);
$arrayContracte = mysqli_fetch_array($contestacioContracte);
$idContracte = $arrayContracte['idContracte'];

$cadena = "insert into CATFAV (idContracte,categoria) values ('".$idContracte."','".$categoria."')";

mysqli_query($con,$cadena);

include "mostrar_categoria_favorita.php";
?>
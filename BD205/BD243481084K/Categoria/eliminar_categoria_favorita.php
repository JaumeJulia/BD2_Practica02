<?php
session_start();
//$con = mysqli_connect("localhost","root","");
//$db = mysqli_select_db($con,"BD205");
include "../../PHP/conexion.php";
$eliminar = $_POST['categoria'];
$user = $_SESSION['user'];
$consultaContracte = 'SELECT idContracte FROM contracte WHERE contracte.nomUsuari = "'.$user.'"'; //sacamos el contrato del usuario
$contestacioContracte = mysqli_query($con, $consultaContracte);
$arrayContracte = mysqli_fetch_array($contestacioContracte);
$idContracte = $arrayContracte['idContracte'];

$consulta = 'DELETE from CATFAV where CATFAV.idContracte = "'.$idContracte.'" AND CATFAV.categoria = "'.$eliminar.'"';

$resultado = mysqli_query($con,$consulta);

include "mostrar_categoria_favorita.php";

?>
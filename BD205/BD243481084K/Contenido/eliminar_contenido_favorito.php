<?php
session_start();
include "../../PHP/conexion.php";
$eliminar = $_POST['video'];
$user = $_SESSION['user'];
$consultaContracte = 'SELECT idContracte FROM contracte WHERE contracte.nomUsuari = "'.$user.'"'; //sacamos el contrato del usuario
$contestacioContracte = mysqli_query($con, $consultaContracte);
$arrayContracte = mysqli_fetch_array($contestacioContracte);
$idContracte = $arrayContracte['idContracte'];

$consulta = 'DELETE from CONTFAV where CONTFAV.idContracte = "'.$idContracte.'" AND CONTFAV.video = "'.$eliminar.'"';

$resultado = mysqli_query($con,$consulta);

include "mostrar_contenido_favorito.php";

?>
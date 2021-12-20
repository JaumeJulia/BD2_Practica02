<?php
//$con = mysqli_connect("localhost","root","");
//$db = mysqli_select_db($con,"BD205");
include "../../PHP/conexion.php";
$eliminar = $_POST['categoria'];

$consulta = 'DELETE from CONTFAV where CONTFAV.idContingut = "'.$eliminar.'"';

$resultado = mysqli_query($con,$consulta);

mysqli_close($con);

?>
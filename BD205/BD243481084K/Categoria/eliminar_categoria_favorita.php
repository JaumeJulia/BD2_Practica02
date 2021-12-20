<?php
//$con = mysqli_connect("localhost","root","");
//$db = mysqli_select_db($con,"BD205");
include "../../PHP/conexion.php";
$eliminar = $_POST['categoria'];

$consulta = 'DELETE from CATFAV where CATFAV.categoria = '.$eliminar;

$resultado = mysqli_query($con,$consulta);

mysqli_close($con);

?>
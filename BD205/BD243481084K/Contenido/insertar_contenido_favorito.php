<?php
session_start();
$user= $_SESSION['user'];  //Hacer un SELECT con el nombre de usuario para sacar el idContracte
$video = $_POST['video'];

include "../../PHP/conexion.php";

$consulta = 'SELECT idContracte from CONTRACTE where nomUsuari = "'.$user.'"';
$idContracte = mysqli_query($con, $consulta);
$idContracte = mysqli_fetch_array($idContracte);
$idContracte = $idContracte['idContracte'];

$cadena = "insert into CONTFAV (idContracte,video) values ('".$idContracte."','".$video."')";

if (mysqli_query($con,$cadena)) {

    echo "<script>
alert('Añadido con éxito');
window.location.href='../../BD243466710E/ConsultarContenidoCompleto.php';
</script>";

} else {

    echo "<script>
alert('Error al crear usuario');
window.location.href='../../BD243466710E/ConsultarContenidoCompleto.php';
</script>";

}
?>
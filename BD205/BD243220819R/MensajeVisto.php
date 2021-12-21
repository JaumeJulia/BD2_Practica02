<?php

session_start();

while (!isset($_SESSION)) {
    
    echo "session no iniciada";

    // Recollida de paràmetres


    $idm= $_POST['idmissatge'];
      
}

include "../PHP/conexion.php";


$idm= $_POST['idmissatge'];

$cadena = "UPDATE missatge SET missatge.vist='1' WHERE missatge.idMissatge= '".$idm."'";

if (mysqli_query($con,$cadena)) {

    echo "<script>
alert('Mensaje visto');
window.location.href='VisualizarMensajes.php';
</script>";

} 

mysqli_close($con);

?>
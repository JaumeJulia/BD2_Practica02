<?php

session_start();

while (!isset($_SESSION)) {
    
    echo "session no iniciada";

    // Recollida de paràmetres

    $cat= $_POST['categoria'];

    $tit= $_POST['titulo'];

    $vid= $_POST['video'];

    $date= $_POST['fecha'];
      
}

include "../PHP/conexion.php";


$cat= $_POST['categoria'];

$tit= $_POST['titulo'];

$vid= $_POST['video'];

$date= $_POST['fecha'];

$cadena = "UPDATE contingut SET contingut.categoria='".$cat."',contingut.titol= '".$tit."',contingut.dataIntroduit= '".$date."' WHERE contingut.video= '".$vid."'";


if (mysqli_query($con,$cadena)) {

    echo "<script>
alert('Contenido modificado');
window.location.href='VisualizacionContenidos.php';
</script>";

} else {

    echo "<script>
alert('Error al modificar contenido');
window.location.href='VisualizacionContenidos.php';
</script>";

}

mysqli_close($con);

?>
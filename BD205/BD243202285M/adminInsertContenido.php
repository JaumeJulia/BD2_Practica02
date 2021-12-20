<?php

session_start();

while (!isset($_SESSION)) {
    
    echo "session no iniciada";

    // Recollida de paràmetres

    $cat= $_POST['categoria'];

    $tit= $_POST['titulo'];

    $vid= .$_POST['video'];

    $date= $_POST['fecha'];
      
}

include "../PHP/conexion.php";


$cat= $_POST['categoria'];

$tit= $_POST['titulo'];

$vid= $_POST['video'];

$date= $_POST['fecha'];


$cadena = "INSERT INTO contingut VALUES ('".$cat."', '".$tit."', '".$vid."', '".$date."' )";

if (mysqli_query($con,$cadena)) {

    echo "<script>
alert('Contenido creado');
window.location.href='../PHP/Admin.php';
</script>";

} else {

    echo "<script>
alert('Error al crear contenido');
window.location.href='../PHP/Admin.php';
</script>";

}

mysqli_close($con);

?>
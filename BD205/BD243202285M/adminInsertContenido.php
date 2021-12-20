<?php

session_start();

while (!isset($_SESSION)) {
    
    echo "session no iniciada";

    // Recollida de paràmetres

    $id= $_POST['id'];

    $cat= $_POST['categoria'];

    $tit= $_POST['titulo'];

    $vid= .$_POST['video'];

    $date= $_POST['fecha'];
      
}

include "../PHP/conexion.php";

$id= $_POST['id'];

$cat= $_POST['categoria'];

$tit= $_POST['titulo'];

$vid= '<iframe width="560" height="315" src="'.$_POST['video'].'"title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

$date= $_POST['fecha'];


$cadena = "INSERT INTO contingut VALUES ('".$id."', '".$cat."', '".$tit."', '".$vid."', '".$date."' )";

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
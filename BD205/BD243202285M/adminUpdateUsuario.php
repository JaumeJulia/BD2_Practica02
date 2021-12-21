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


$user= $_POST['user'];

$tip= $_POST['tipo'];
if(!empty($_POST['admin'])){
    $admin ='1';
}else{
    $admin ='0';
}


$cadena = "UPDATE usuari SET usuari.tipusUsuari='".$tip."',usuari.admin= '".$admin."' WHERE usuari.nomUsuari= '".$user."'";


if (mysqli_query($con,$cadena)) {

    echo "<script>
alert('Usuario modificado');
window.location.href='VisualizacionUsuarios.php';
</script>";

} else {

    echo "<script>
alert('Error al modificar usuario');
window.location.href='VisualizacionUsuarios.php';
</script>";

}

mysqli_close($con);
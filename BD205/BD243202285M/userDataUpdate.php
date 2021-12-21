<?php

session_start();

while (!isset($_SESSION)) {
    
    echo "session no iniciada";

    // Recollida de paràmetres

    $user= $_POST['user'];

    $contr= $_POST['contr'];
      
}

include "../PHP/conexion.php";


$user= $_POST['user'];

$contr= $_POST['contr'];
  


$cadena = "UPDATE usuari SET usuari.contrasenya='".$contr."' WHERE usuari.nomUsuari= '".$user."'";

if (mysqli_query($con,$cadena)) {

    echo "<script>
alert('Contraseña modificada');
window.location.href='../PHP/Usuario.php?uname='.$user.'';
</script>";

} else {

    echo "<script>
alert('Error al modificar contraseña');
window.location.href='../PHP/Usuario.php?uname='.$user.'';
</script>";

}

mysqli_close($con);

?>
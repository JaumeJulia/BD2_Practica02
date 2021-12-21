<?php 
if (!isset($_SESSION['user'])){
    session_start();
}
?>
<!DOCTYPE html>
<html>
    <body>
    <?php

include "../PHP/conexion.php";

$user= $_SESSION['user'];

$tipusContracte= $_POST['tipusContracte'];

$idContracte= $_POST['idContracte'];

$startdate = date('Y-m-d');
if($tipusContracte == "mensual"){
    $enddate = date('Y-m-d',strtotime($startdate."+ 1 month"));
}else if($tipusContracte == "trimestral"){
    $enddate = date('Y-m-d',strtotime($startdate."+ 3 month"));
}

$cadena = "UPDATE contracte SET tipusContracte = '$tipusContracte', dataFinal = '$enddate', suscrit = TRUE WHERE idContracte = $idContracte";
echo $cadena;

if (mysqli_query($con,$cadena)) {
    echo "<script>
alert('Actualizado con éxito');
</script>";
header("Location: ../PHP/Usuario.php?uname=$user");

} else {
    echo "<script>
alert('Error al actualizar');
</script>";
header("Location: ../PHP/Usuario.php?uname=$user");
}

mysqli_close($con);

?>
</body>
</html>
<!DOCTYPE html>
<html>
    <body>
    <?php

session_start();

while (!isset($_SESSION)) {
    
    echo "session no iniciada";

    // Recollida de paràmetres

    $user= $_POST['uname'];

    $tipusContracte= $_POST['tipusContracte'];
      
}

include "../PHP/conexion.php";

$user= $_POST['uname'];

$tipusContracte= $_POST['tipusContracte'];

$idContracte = 1;

$consultaContratoUsuario = 'SELECT contracte.idContracte FROM contracte ORDER BY (contracte.idContracte)'; //sacamos el contrato del usuario si existe
$contrato = mysqli_query($con, $consultaContratoUsuario);
if(!empty($contrato) && mysqli_num_rows($contrato) > 0){
    while($mostrar=mysqli_fetch_array($contrato)){
        if($mostrar['idContracte'] == $idContracte){
            $idContracte++;
        }else{
            break;
        }
    }
}
$startdate = date('Y-m-d');
if($tipusContracte == "mensual"){
    $enddate = date('Y-m-d',strtotime($startdate."+ 1 month"));
}else if($tipusContracte == "trimestral"){
    $enddate = date('Y-m-d',strtotime($startdate."+ 3 month"));
}

$cadena = "INSERT INTO contracte VALUES ('".$idContracte."', '".$user."', '".$tipusContracte."', '".$startdate."', '".$enddate."',TRUE)";

if (mysqli_query($con,$cadena)) {
    echo "<script>
alert('Contrato creado con éxito');
</script>";
header("Location: ../PHP/Usuario.php?uname=$user");

} else {
    echo "<script>
alert('Error al crear el contrato');
</script>";
header("Location: ../PHP/Usuario.php?uname=$user");
}

mysqli_close($con);

?>
</body>
</html>
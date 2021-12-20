<!DOCTYPE html>
<html>
    <body>
    <?php

session_start();

while (!isset($_SESSION)) {
    
    echo "session no iniciada";

    // Recollida de paràmetres

    $user= $_POST['uname'];

    $pass= $_POST['psw'];

    $age= $_POST['number'];

    $name= $_POST['name'];
      
}

include "conexion.php";

$user= $_POST['uname'];

$tipusContracte= $_POST['tipusContracte'];

$idContracte = 1;

$consultaContratoUsuario = 'SELECT contracte.suscrit, contracte.dataFinal FROM contracte WHERE contracte.nomUsuari = "'.$user.'"'; //sacamos el contrato del usuario si existe
$contrato = mysqli_query($con, $consultaContratoUsuario);
if(!empty($contrato) && mysqli_num_rows($contrato) > 0){
    while($mostrar=mysqli_fetch_array($contrato)){
        if($mostrar['idContracte'] == $idContracte){
            $idContracte++;
        }
    }
}

$cadena = "INSERT INTO contracte VALUES ('".$idContracte."', '".$user."', '".$tipusContracte."', '".$startdate."', '".$enddate."' )";

if (mysqli_query($con,$cadena)) {

    echo "<script>
alert('Usuario creado con éxito');
window.location.href='../index.html';
</script>";

} else {

    echo "<script>
alert('Error al crear usuario');
window.location.href='../index.html';
</script>";

}

mysqli_close($con);

?>
</body>
</html>
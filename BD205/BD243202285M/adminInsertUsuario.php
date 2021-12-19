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

include "../PHP/conexion.php";

$user= $_POST['uname'];

$pass= $_POST['psw'];

$age= $_POST['number'];

$name= $_POST['name'];

if ($age < 9) {
    
    $tipoUsuario = "<9";

}elseif ( 9 <= $age && $age <= 18) {

    $tipoUsuario = "9-18";
    
}elseif (18 < $age) {

    $tipoUsuario = ">18";
    
}

$cadena = "INSERT INTO usuari VALUES ('".$user."', '".$tipoUsuario."', '".$pass."', '".$name."', 'FALSE' )";

if (mysqli_query($con,$cadena)) {

    echo "<script>
alert('Usuario creado');
window.location.href='../PHP/Admin.php';
</script>";

} else {

    echo "<script>
alert('Error al crear usuario');
window.location.href='../PHP/Admin.php';
</script>";

}

mysqli_close($con);

?>
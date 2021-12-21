<?php 

session_start();

while (!isset($_SESSION)) {
    
    echo "session no iniciada";

    // Recollida de paràmetres
    $_SESSION['user'] = $_POST['uname'];
    $user= $_POST['uname'];

    $pass= $_POST['psw'];
      
}

include "conexion.php";

$_SESSION['user'] = $_POST['uname'];

$user= $_POST['uname'];

$pass= $_POST['psw'];

$cadena = "select admin from usuari WHERE usuari.nomUsuari='".$user."' AND usuari.contrasenya ='".$pass."'";

$result = mysqli_query($con,$cadena);

if (mysqli_num_rows($result) > 0){
    
    $row = mysqli_fetch_row($result);

    if($row[0]==1){

        include "Admin.php";

    }else{
        
        include "Usuario.php";
   
    }
  
}else{

    echo "<script>
alert('Usuario o contraseña incorrecta');
</script>";
header("Location: ../index.html");

}

mysqli_close($con);

?>

<?php 

session_start();

while (!isset($_SESSION)) {
    
    echo "session no iniciada";

    // Recollida de paràmetres

    $user= $_POST['uname'];

    $pass= $_POST['psw'];
      
}

include "conexion.php";

$user= $_POST['uname'];

$pass= $_POST['psw'];

$cadena = "select admin from usuari WHERE usuari.nomUsuari='".$user."' AND usuari.contrasenya ='".$pass."'";

$result = mysqli_query($con,$cadena);

if (mysqli_num_rows($result) > 0){
    
    $row = mysqli_fetch_row($result);

    if($row[0]==1){

        include "../admin.html";

    }else{

        echo("Eres no ADMIN");
    }
  
}else{

    include "index.html";

    echo('<span style="color: red;" /><center> Usuario o contraseña incorrectos </center></span>');

}

mysqli_close($con);

?>
<?php

$conexion = mysqli_connect("localhost","root","") or die("Error de conexión con el servidor");

$db = mysqli_select_db($conexion, "prueba_db") or die("Error de conexión con la base de datos");

$consulta = 'SELECT * FROM tabla_prueba';

$resultado = mysqli_query($conexion, $consulta);

while ($reg = mysqli_fetch_array($resultado)){

    echo $reg['persona_id']; 
    echo $reg['apellido'];
    echo $reg['nombre']; 

}

mysqli_close($conexion);

?>
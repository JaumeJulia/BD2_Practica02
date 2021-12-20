<!DOCTYPE html>
<html>

<body>

<?php
$con = mysqli_connect("localhost","root","");
$db = mysqli_select_db($con,"BD205");

$user = $_GET['uname']; //queremos conseguir el usuario para poder hacer el select de su contenido favorito

$consulta = 'SELECT idContingut, categoria, titol, video from 
                ( CONTRACTE INNER JOIN CONTFAV ON
                contracte.nomUsuari = '.$user.'
                AND contracte.idContracte = contfav.idContracte
                ) INNER JOIN CONTINGUT ON
                CONTFAV.idContingut = CONTINGUT.contingut'; 

$resultado = mysqli_query($con,$consulta);

if($resultado == false){
    echo "No hay contenido favorito. Prueba a agregar algunos videos que te gusten!";
} else {
    while ($reg = mysqli_fetch_array($resultado)){
    ?>
        <tr>
            <td><center><?php echo $mostrar['idContingut'] ?></center></td> 
            <td><center><?php echo $mostrar['titol'] ?></center></td> 
            <td><center><?php echo $mostrar['categoria'] ?></center></td> 
            <td><center><?php echo $mostrar['video'] ?></center></td> 
        </tr>

    <?php
    }
}

mysqli_close($con);

?>

</body>
</html>
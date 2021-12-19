<!DOCTYPE html>
<html>

<body>

<?php
$con = mysqli_connect("localhost","root","");
$db = mysqli_select_db($con,"BD205");

$user = $_POST['uname']; //queremos conseguir el usuario para poder hacer el select de su contenido favorito

$consulta = 'SELECT categoria from 
                ( CONTRACTE INNER JOIN CATFAV ON
                contracte.nomUsuari = '".$user"'
                AND contracte.idContracte = catfav.idContracte
                ) INNER JOIN CATEGORIA ON
                catfav.categoria = CATEGORIA.categoria'; //hacer select


$resultado = mysqli_query($con,$consulta);

while ($reg = mysqli_fetch_array($resultado)){

?>
    <tr>
        <td><center><?php echo $reg['categoria'] ?></center></td> 
    </tr>
}

<?php

mysqli_close($con);

?>

</body>
</html>
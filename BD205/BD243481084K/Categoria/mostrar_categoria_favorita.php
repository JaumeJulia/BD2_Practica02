<!DOCTYPE html>
<html>

<body>

<?php
//$con = mysqli_connect("localhost","root","");
//$db = mysqli_select_db($con,"BD205");
include "../../PHP/conexion.php";

$user = $_GET['uname']; //queremos conseguir el usuario para poder hacer el select de su contenido favorito
$consultaContracte = 'SELECT idContracte FROM contracte WHERE contracte.nomUsuari = "'.$user.'"'; //sacamos el contrato del usuario

$contestacioContracte = mysqli_query($con, $consultaContracte);
$arrayContracte = mysqli_fetch_array($contestacioContracte);
$idContracte = $arrayContracte['idContracte'];

$consulta = 'SELECT categoria.categoria from 
                ( contracte INNER JOIN catfav ON
                contracte.nomUsuari = "'.$user.'"
                AND contracte.idContracte = catfav.idContracte
                ) INNER JOIN CATEGORIA ON
                catfav.categoria = CATEGORIA.categoria'; //hacer select


$categoriasFavoritas = mysqli_query($con,$consulta);

if($categoriasFavoritas == false){
    ?> <center> No hay categorias favoritas. <br> Añade una categoria que te guste en el menu de categorias disponibles!</center>; <?php
} else {
    while ($reg = mysqli_fetch_assoc($categoriasFavoritas)){
    ?>
        <tr>
            <td><center><?php echo $reg['categoria'] ?></center></td> 
        </tr>
    <?php
    }
}

?>

<?php

$consulta = 'SELECT categoria from CATEGORIA where
            CATEGORIA.categoria NOT IN 
            (SELECT categoria.categoria from 
                ( contracte INNER JOIN catfav ON
                contracte.nomUsuari = "'.$user.'"
                AND contracte.idContracte = catfav.idContracte
                ) INNER JOIN CATEGORIA ON
                catfav.categoria = CATEGORIA.categoria)';

$resultado = mysqli_query($con,$consulta);

?>

<form action="insertar_categoria_favorita.php" method="post">
  <div class="container">
    <label for="Categoria"><b>Categorias disponibles</b></label>
    <?php if ($resultado != false) { ?>
        <select name="categoria" required>
            <option value=""></option>
            <?php while ($reg = mysqli_fetch_array($resultado)) { ?>
            <option value="<?php echo $reg['categoria']; ?>"><?php echo $reg['categoria']; ?></option> <?php //pone que no está definido el array. Revisar el paso por parametro ?>
            <?php }  ?> 
        </select>
        <input  type="hidden" value = "<?php echo $idContracte?>" name = "idContracte" readonly>
    <?php }  ?>    
    <button type="submit">Añadir</button>
  </div>
</form>

<?php mysqli_close($con); ?>

</body>
</html>
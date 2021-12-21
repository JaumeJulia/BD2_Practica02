<!DOCTYPE html>
<html>
<head>
    <title>Contenidos</title>
    <style>
    table, th, td {
        border: 2px solid pink;
        background-color: #68b9da;
        
    }
    table.center{
        margin-left: auto;
        margin-right: auto;
    }

    </style>
<head>

<body>
    <?php
    if (array_key_exists('uname',$_GET)){ //solo existe el nombre de usuario en ese array cuando no lo hemos cogido nunca
        $user = $_GET['uname']; //queremos conseguir el usuario para poder hacer el select de su contenido favorito
    }
    ?>

<center><a href="../../PHP/Usuario.php?uname=<?php echo $user ?>"><img src="../../Images/Notflix.PNG" width="300"></a></center>
<center><H3>Categorias favoritas</H3></center>
    <br>

<?php
include "../../PHP/conexion.php";

$consultaCatFav = 'SELECT categoria.categoria from  
                ( contracte INNER JOIN catfav ON
                contracte.nomUsuari = "'.$user.'"
                AND contracte.idContracte = catfav.idContracte 
                ) INNER JOIN CATEGORIA ON
                catfav.categoria = CATEGORIA.categoria'; //consulta las categorias favoritas del usuario

$categoriasFavoritas = mysqli_query($con,$consultaCatFav);

?>
<table class="center">
    <tr>
        <td><b><p style="color:black">Categoria</p></b></td>  
        <!-- <td><b><p style="color:black">Añadir a favoritos</p></b></td>  -->
    </tr>
    <?php
    if($categoriasFavoritas == false){ //evita el error de que el array sea devuelto como una booleana, caso provocado por la tabla siendo de nueva generación
        ?> <center> No hay categorias favoritas. <br> Añade una categoria que te guste en el menu de categorias disponibles!</center>; <?php
    } else {
        while ($reg = mysqli_fetch_assoc($categoriasFavoritas)){ //muestra las categorias favoritas
        ?>
            <tr>
                <td><center><?php echo $reg['categoria'] ?></center></td> 
            </tr>
        <?php
        }
    }

    ?>
</table>

<?php

$consultaCatNoFav = 'SELECT categoria from CATEGORIA where
                    CATEGORIA.categoria NOT IN 
                    (SELECT categoria.categoria from 
                        ( contracte INNER JOIN catfav ON
                        contracte.nomUsuari = "'.$user.'"
                        AND contracte.idContracte = catfav.idContracte
                        ) INNER JOIN CATEGORIA ON
                        catfav.categoria = CATEGORIA.categoria)'; //consulta las categorias que no estan en favoritos

$resultado = mysqli_query($con,$consultaCatNoFav);

?>
<center>
<form action="insertar_categoria_favorita.php" method="post">
  <div class="container">
    <label for="Categoria"><b>Categorias disponibles</b></label>
    <?php if ($resultado != false) { ?>
        <select name="categoria" required>
            <option value=""></option>
            <?php while ($reg = mysqli_fetch_array($resultado)) { //muestra en una lista las categorias no favoritas para poder ser seleccionadas y agregadas?>
            <option value="<?php echo $reg['categoria']; ?>"><?php echo $reg['categoria']; ?></option>
            <?php }  ?> 
        </select>
        <input  type="hidden" value = "<?php echo $user?>" name = "uname" readonly> <?php //se pasa el usuario en oculto a través de post
    }  ?>    
    <button type="submit">Añadir</button>
  </div>
</form>

<?php $categoriasFavoritas = mysqli_query($con,$consultaCatFav); ?>

<form action="eliminar_categoria_favorita.php" method="post">
  <div class="container">
    <label for="Categoria"><b>Eliminar categoria favorita</b></label>
    <?php if ($resultado != false) { ?>
        <select name="categoria" required>
            <option value=""></option>
            <?php while ($reg = mysqli_fetch_array($categoriasFavoritas)) { //muestra en una lista las categorias no favoritas para poder ser seleccionadas y agregadas?>
            <option value="<?php echo $reg['categoria']; ?>"><?php echo $reg['categoria']; ?></option>
            <?php }  ?> 
        </select>
        <input  type="hidden" value = "<?php echo $user?>" name = "uname" readonly> <?php //se pasa el usuario en oculto a través de post
    }  ?>    
    <button type="submit">Eliminar</button>
  </div>
</form>
</center>

<?php mysqli_close($con); ?>

</body>
</html>
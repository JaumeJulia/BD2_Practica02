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
<center><a href="../PHP/Usuario.php?uname='.$user.'"><img src="../../Images/Notflix.PNG" width="300"></a></center>
<center><H3>Contenidos favoritos</H3></center>
    <br>

<?php
include "../../PHP/conexion.php";

if (array_key_exists('uname',$_GET)){
    $user = $_GET['uname']; //queremos conseguir el usuario para poder hacer el select de su contenido favorito
}

$consulta = 'SELECT contingut.categoria, titol, contingut.video from 
                ( CONTRACTE INNER JOIN CONTFAV ON
                contracte.nomUsuari = "'.$user.'"
                AND contracte.idContracte = contfav.idContracte
                ) INNER JOIN CONTINGUT ON
                CONTFAV.video = CONTINGUT.video'; 

$contenidoFavorito = mysqli_query($con,$consulta);

?>
<table class="center">
    <tr>
        <td><b><p style="color:black">Titol</p></b></td> 
        <td><b><p style="color:black">Categoria</p></b></td> 
        <td><b><p style="color:black">Video</p></b></td> 
        <!-- <td><b><p style="color:black">Añadir a favoritos</p></b></td>  -->
    </tr>
<?php

    if($contenidoFavorito == false){
        echo "No hay contenido favorito. Prueba a agregar algunos videos que te gusten!";
    } else {
        while ($reg = mysqli_fetch_array($contenidoFavorito)){
        ?>
            <tr>
                <!-- <td><center><?php// echo $mostrar['idContingut'] ?></center></td>  -->
                <td><center><?php echo $mostrar['titol'] ?></center></td> 
                <td><center><?php echo $mostrar['categoria'] ?></center></td> 
                <td><center><?php echo $mostrar['video'] ?></center></td> 
            </tr>

        <?php
        }
    }
    $contenidoFavorito = mysqli_query($con,$consulta);
    ?>
</table>

<form action="eliminar_contenido_favorito.php" method="post">
  <div class="container">
    <label for="Contenido"><b>Eliminar contenido favorito</b></label>
    <?php if ($contenidoFavorito != false) { ?>
        <select name="video" required>
            <option value=""></option>
            <?php while ($reg = mysqli_fetch_array($contenidoFavorito)) { //muestra en una lista las categorias no favoritas para poder ser seleccionadas y agregadas?>
            <option value="<?php echo $reg['video']; ?>"><?php echo $reg['titol'].", url: ".$reg['video']; ?></option>
            <?php }  ?> 
        </select>
        <input  type="hidden" value = "<?php echo $user?>" name = "uname" readonly> <?php //se pasa el usuario en oculto a través de post
    }  ?>    
    <button type="submit">Eliminar</button>
  </div>
</form>

<?php mysqli_close($con); ?>

</body>
</html>
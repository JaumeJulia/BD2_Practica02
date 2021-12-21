<?php 
if (!isset($_SESSION['user'])){
    session_start();
}
?>
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
    
    $user = $_SESSION['user']; //queremos conseguir el usuario para poder hacer el select de su contenido favorito
    
    ?>
<center><a href="../../PHP/Usuario.php"><img src="../../Images/Notflix.PNG" width="300"></a></center>
<center><H3>Contenidos favoritos</H3></center>
    <br>

<?php
include "../../PHP/conexion.php";
function getYoutubeEmbedUrl($url)
{
     $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
     $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

    if (preg_match($longUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }

    if (preg_match($shortUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }
    return 'https://www.youtube.com/embed/' . $youtube_id ;
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
                <td><center><?php echo $reg['titol'] ?></center></td> 
                <td><center><?php echo $reg['categoria'] ?></center></td> 
                <td><center><?php echo '<iframe width="560" height="315" src='.getYoutubeEmbedUrl($reg['video']).' title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' ?></center></td> 
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
    <?php }  ?>    
    <button type="submit">Eliminar</button>
  </div>
</form>

<?php mysqli_close($con); ?>

</body>
</html>
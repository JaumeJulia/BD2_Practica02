<?php session_start(); ?>
<html>
<body>
<style>
body {font-family: Arial, Helvetica, sans-serif;
        background-color: pink;
    }
.container {
     padding: 16px;
     background-color: #99d8ea;
    }
    table, th, td {
        border: 2px solid pink;
        background-color: #ffff80;
        
    }
    table.center{
        margin-left: auto;
        margin-right: auto;
    }

</style>
<div class="container">
<center><a href="../PHP/Admin.php"><img src="../Images/Notflix.PNG" width="300"></a></center>
<div class="container">
<br>

<?php
include "../PHP/conexion.php";

$cadena = "select * from contingut ORDER BY contingut.titol";
$resultat = mysqli_query($con,$cadena);
?>´
<center><H3><p style="color:#ffff80">Tabla de Contenidos</p></H3></center>
<table align="center" class="center">
<tr>
    <td><center><b><p style="color:#68b9da">Categoria</p></b></center></td> 
    <td><center><b><p style="color:#68b9da">Titol</p></b></center></td> 
    <td><center><b><p style="color:#68b9da">Video</p></b></center></td> 
    <td><center><b><p style="color:#68b9da">DataIntroduit</p></b></center></td> 
    <td><center><b><p style="color:#68b9da">Modificar</p></b></center></td> 
    <td><center><b><p style="color:#68b9da">Eliminar</p></b></center></td> 
</tr>
<?php 
include "../PHP/conexion.php";
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
while($mostrar=mysqli_fetch_array($resultat)){
?>
    <tr>
    <td><center><?php echo $mostrar['categoria'] ?></center></td> 
    <td><center><?php echo $mostrar['titol'] ?></center></td> 
    <td><center><?php echo '<iframe width="560" height="315" src='.getYoutubeEmbedUrl($mostrar["video"]).' title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' ?></center></td> 
    <td><center><?php echo $mostrar['dataIntroduit'] ?></center></td> 
    <td><form method="post" action="ModificarContenido.php">
                                <input type="hidden" name="video" value= <?php echo $mostrar['video'];?>>
                                <center><button type="submit" formaction="ModificarContenido.php">Modificar</button></center>
                            </form>
                        </td>
    <td><form method="post" action="EliminarContenido.php">
                                <input type="hidden" name="video" value= <?php echo $mostrar['video'];?>>
                                <center><button type="submit" formaction="EliminarContenido.php">Eliminar</button></center>
                            </form>
                        </td> 

</tr>
<?php
}
?>  
</table>

</body>
</html>
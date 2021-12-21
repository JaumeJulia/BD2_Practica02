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
    <?php $user= $_SESSION['user'];
    echo '<center><a href="../PHP/Usuario.php"><img src="../Images/Notflix.PNG" width="300"></a></center>';
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
    ?>
    <center><H3>Contenidos Disponible</H3></center>
    <br>
    
    <table class="center">
        <tr>
            <td><b><p style="color:black">Titol</p></b></td> 
            <td><b><p style="color:black">Categoria</p></b></td> 
            <td><b><p style="color:black">Video</p></b></td> 
            <td><b><p style="color:black">Añadir a favoritos</p></b></td> 
        </tr>
        <?php
        include "../PHP/conexion.php";
        $sql_edad="SELECT usuari.tipusUsuari FROM usuari WHERE usuari.nomUsuari='".$user."'";
        $edad=mysqli_query($con,$sql_edad);
        if(mysqli_num_rows($edad) > 0){
        $edad=mysqli_fetch_array($edad);
        switch($edad['tipusUsuari']){
            case ">18":
                $sql_18="SELECT contingut.titol,contingut.categoria,contingut.video FROM recomanat  
                            INNER JOIN contingut 
                            ON recomanat.video=contingut.video AND recomanat.tipusUsuari='>18'";
                
                $result=mysqli_query($con,$sql_18);
                if(mysqli_num_rows($result) > 0){
                    while($mostrar=mysqli_fetch_array($result)){
        ?>
                        <tr>
                            <td><center><?php echo $mostrar['titol'] ?></center></td> 
                            <td><center><?php echo $mostrar['categoria'] ?></center></td> 
                            <td><center><?php echo '<iframe width="560" height="315" src='.getYoutubeEmbedUrl($mostrar["video"]).' title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' ?></center></td> 
                            <td><form method="post" action="../BD243481084K/Contenido/insertar_contenido_favorito.php">
                                    <input type="hidden" name="video" value="<?php echo $mostrar['video'];?>">                                    
                                    <input type="hidden" name="url" value="BD243466710E/ConsultarContenidoCompleto.php">
                                    <center><button type="submit" >Favorito</button></center>
                                    </form>
                            </td>
                        </tr>
                        <?php
                    }
                }
            case "9-18":
                $sql_9_18="SELECT contingut.titol,contingut.categoria,contingut.video FROM recomanat  
                                INNER JOIN contingut 
                                ON recomanat.video=contingut.video AND recomanat.tipusUsuari='9-18'";

                $result=mysqli_query($con,$sql_9_18);
                if(mysqli_num_rows($result) > 0){
                    while($mostrar=mysqli_fetch_array($result)){
        ?>
                            <tr>
                                <td><center><?php echo $mostrar['titol'] ?></center></td> 
                                <td><center><?php echo $mostrar['categoria'] ?></center></td> 
                                <td><center><?php echo '<iframe width="560" height="315" src='.getYoutubeEmbedUrl($mostrar["video"]).' title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' ?></center></td> 
                                <td><form method="post" action="../BD243481084K/Contenido/insertar_contenido_favorito.php">
                                    <input type="hidden" name="video" value="<?php echo $mostrar['video'];?>">
                                    <input type="hidden" name="url" value="BD243466710E/ConsultarContenidoCompleto.php">
                                    <center><button type="submit" >Favorito</button></center>
                                    </form>
                                </td>
                            </tr>
                            <?php
                    }
                }
            case "<9":
                $sql_9="SELECT contingut.titol,contingut.categoria,contingut.video FROM recomanat  
                            INNER JOIN contingut 
                            ON recomanat.video=contingut.video AND recomanat.tipusUsuari='<9'";

                $result=mysqli_query($con,$sql_9);
                if(mysqli_num_rows($result) > 0){
                    while($mostrar=mysqli_fetch_array($result)){
        ?>
                        <tr>
                            <td><center><?php echo $mostrar['titol'] ?></center></td> 
                            <td><center><?php echo $mostrar['categoria'] ?></center></td> 
                            <td><center><?php echo '<iframe width="560" height="315" src='.getYoutubeEmbedUrl($mostrar["video"]).' title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' ?></center></td> 
                            <td><form method="post" action="../BD243481084K/Contenido/insertar_contenido_favorito.php">
                                    <input type="hidden" name="video" value="<?php echo $mostrar['video'];?>">
                                    <input type="hidden" name="url" value="BD243466710E/ConsultarContenidoCompleto.php">
                                    <center><button type="submit" >Favorito</button></center>
                                    </form>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                }
                    break;
        }
    }

    ?>  
    </table>

</body>
</html>
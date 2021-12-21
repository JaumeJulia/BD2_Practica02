<?php 
if (!isset($_SESSION['user'])){
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mensajes</title>
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
    $user= $_SESSION['user'];
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
<center><H3>Tabla de facturas</H3></center>
<br>
<br>
    <table class="center">
        <tr>
            <td><b><p style="color:black">Mensaje</p></b></td> 
            <td><b><p style="color:black">Video</p></b></td>            
            <td><b><p style="color:black">Visto</p></b></td> 
        </tr>
        <?php 
        include "../PHP/conexion.php";
        $sql="SELECT * from missatges WHERE missatges.vist='0' AND missatge.nomUsuari='".$user."'" ;
        
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result) > 0){
        while($mostrar=mysqli_fetch_array($result)){
        ?>
            <tr>
            <td><center><?php echo $mostrar['missatge'] ?></center></td> 
            <td><center><?php echo '<iframe width="280" height="157" src='.getYoutubeEmbedUrl($mostrar["video"]).' title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' ?></center></td>             
            <td><form method="post" action="../BD243481084K/Contenido/MensajeVisto.php">
                <input type="hidden" name="idmissatge" value="<?php echo $mostrar['idmissatge'];?>">
                <input type="hidden" name="url" value="BD243220819R/VisualizarMensajes.php">
                <center><button type="submit" >Visto</button></center>
                </form>
            </td> 
        </tr>
        <?php
        }
    }
    ?>  
    </table>

</body>
</html>
</html>
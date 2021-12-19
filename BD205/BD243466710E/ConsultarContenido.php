<!DOCTYPE html>
<html>
<head>
    <title>Recomendaciones</title>
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
    <?php $user= $_GET['uname'];
    echo '<center><a href="../PHP/Usuario.php?uname='.$user.'"><img src="../Images/Notflix.PNG" width="300"></a></center>';
    ?>
    <center><H3>Contenidos Disponible</H3></center>
    <br>
    
    <table class="center">
        <tr>
            <td><b><p style="color:black">idContingut</p></b></td> 
            <td><b><p style="color:black">Titol</p></b></td> 
            <td><b><p style="color:black">Categoria</p></b></td> 
            <td><b><p style="color:black">Video</p></b></td> 
                <?php
                    //haremos la referencia al parametro que queremos visualizar
                    //Ej: <td>nombre </td> 
                ?>
        </tr>
        <?php 
        //como mirar la fecha actual
        include "../PHP/conexion.php";
        $user= $_GET['uname'];
        $sql_edad="SELECT usuari.tipusUsuari FROM usuari WHERE usuari.nomUsuari='".$user."'";
        $edad=mysqli_query($con,$sql_edad);
        $edad=mysqli_fetch_array($edad);
        switch($edad['tipusUsuari']){
            case ">18":
                $sql_18="SELECT contingut.idContingut,contingut.titol,contingut.categoria,contingut.video FROM recomanat  
                            INNER JOIN contingut 
                            ON recomanat.idContingut=contingut.idContingut AND recomanat.tipusUsuari='>18'";
                
                $result=mysqli_query($con,$sql_18);

                    while($mostrar=mysqli_fetch_array($result)){
        ?>
                        <tr>
                            <td><center><?php echo $mostrar['idContingut'] ?></center></td> 
                            <td><center><?php echo $mostrar['titol'] ?></center></td> 
                            <td><center><?php echo $mostrar['categoria'] ?></center></td> 
                            <td><center><?php echo $mostrar['video'] ?></center></td> 
                        </tr>
                        <?php
                    }
            case "9-18":
                $sql_9_18="SELECT contingut.idContingut,contingut.titol,contingut.categoria,contingut.video FROM recomanat  
                                INNER JOIN contingut 
                                ON recomanat.idContingut=contingut.idContingut AND recomanat.tipusUsuari='9-18'";

                $result=mysqli_query($con,$sql_9_18);

                    while($mostrar=mysqli_fetch_array($result)){
        ?>
                            <tr>
                                <td><center><?php echo $mostrar['idContingut'] ?></center></td> 
                                <td><center><?php echo $mostrar['titol'] ?></center></td> 
                                <td><center><?php echo $mostrar['categoria'] ?></center></td> 
                                <td><center><?php echo $mostrar['video'] ?></center></td> 
                            </tr>
                            <?php
                    }
            case "<9":
                $sql_9="SELECT contingut.idContingut,contingut.titol,contingut.categoria,contingut.video FROM recomanat  
                                INNER JOIN contingut 
                                ON recomanat.idContingut=contingut.idContingut AND recomanat.tipusUsuari='<9'";

                $result=mysqli_query($con,$sql_9);

                    while($mostrar=mysqli_fetch_array($result)){
        ?>
                        <tr>
                            <td><center><?php echo $mostrar['idContingut'] ?></center></td> 
                            <td><center><?php echo $mostrar['titol'] ?></center></td> 
                            <td><center><?php echo $mostrar['categoria'] ?></center></td> 
                            <td><center><?php echo $mostrar['video'] ?></center></td> 
                        </tr>
                        <?php
                    }
                    break;
        }
        

    ?>  
    </table>

</body>
</html>
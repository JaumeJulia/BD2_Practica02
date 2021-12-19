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
    echo '<center><a href="Usuario.php?uname='.$user.'"><img src="../Images/Notflix.PNG" width="300"></a></center>';
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
        include "conexion.php";
        $user= $_GET['uname'];
        $sql_edad="SELECT usuari.tipusUsuari FROM usuari WHERE usuari.nomUsuari='".$user."'";
        $edad=mysqli_query($con,$sql_edad);
        switch($edad){
            case ">18":
                $sql_18="SELECT contingut.idContingut,contingut.titol,contingut.categoria,contingut.video FROM usuari 
                            INNER JOIN (tipus_usuari 
                                INNER JOIN (recomanat
                                    INNER JOIN contingut 
                                    ON recomanat.idContingut=contingut.idContingut)
                                ON tipus_Usuari.tipusUsuari=recomanat.tipusUsuari)
                            ON usuari.tipusUsuari=tipus_usuari.tipusUsuari AND usuari.nomUsuari= '".$user."'";
            case "9-18":
                $sql_9_18="SELECT contingut.idContingut,contingut.titol,contingut.categoria,contingut.video FROM usuari 
                            INNER JOIN (tipus_usuari 
                                INNER JOIN (recomanat
                                    INNER JOIN contingut 
                                    ON recomanat.idContingut=contingut.idContingut)
                                ON tipus_Usuari.tipusUsuari=recomanat.tipusUsuari)
                            ON usuari.tipusUsuari=tipus_usuari.tipusUsuari AND usuari.nomUsuari= '".$user."'";
            case "<9":
                $sql_9="SELECT contingut.idContingut,contingut.titol,contingut.categoria,contingut.video FROM usuari 
                            INNER JOIN (tipus_usuari 
                                INNER JOIN (recomanat
                                    INNER JOIN contingut 
                                    ON recomanat.idContingut=contingut.idContingut)
                                ON tipus_Usuari.tipusUsuari=recomanat.tipusUsuari)
                            ON usuari.tipusUsuari=tipus_usuari.tipusUsuari AND usuari.nomUsuari= '".$user."'";
                            break;
        }
        
        
        $result18=mysqli_query($con,$sql_18);

        while($mostrar=mysqli_fetch_array($result18)){
        ?>
            <tr>
            <td><center><?php echo $mostrar['idContingut'] ?></center></td> 
            <td><center><?php echo $mostrar['titol'] ?></center></td> 
            <td><center><?php echo $mostrar['categoria'] ?></center></td> 
            <td><center><?php echo $mostrar['video'] ?></center></td> 
        </tr>
    <?php
    }

    ?>  
    </table>

</body>
</html>
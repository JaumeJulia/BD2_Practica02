<!DOCTYPE html>
<html>
<head>
    <title>Recomendaciones</title>
    <style>
    table, th, td {
        border: 1px solid black;
        background-color: #68b9da;
        
    }
    table.center{
        margin-left: auto;
        margin-right: auto;
    }

    </style>
<head>
<body>
<center><a href="identifica.php"><img src="../Images/Notflix.PNG" width="300"></a></center>
<center><H3>Nuevos Contenidos Recomendados</H3></center>
<br>
    <table class="center">
        <tr>
            <td><b>idContenido</b></td> 
            <td><b>titol</b></td> 
            <td><b>categoria</b></td> 
            <td><b>video</b></td> 
                <?php
                    //haremos la referencia al parametro que queremos visualizar
                    //Ej: <td>nombre </td> 
                ?>
        </tr>
        <?php 
        //como mirar la fecha actual
        $user= $_POST['uname'];
        $date = date('y-m-d');
        $sql="SELECT contingut.idContingut, contingut.titol, contingut.categoria, contingut.video from Usuari INNER JOIN(
            contracte INNER JOIN (
                catfav INNER JOIN( 
                    categoria INNER JOIN(
                        contingut INNER JOIN
                            recomanat ON contingut.idContingut = recomanat.idContingut) 
                            ON categoria.categoria = contingut.categoria AND DATEDIFF('".$date."',contingut.dataIntroduit)<7)
                            ON catfav.categoria = categoria.categoria)
                            ON contracte.idContracte = catfav.idContracte)
                            ON usuari.nomUsuari = contracte.nomUsuari WHERE 
                            usuari.tipusUsuari = recomanat.tipusUsuari AND usuari.nomUsuari = '".$user."'";
        
        $result=mysqli_query($con,$sql);

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

    ?>  
    </table>

</body>
</html>
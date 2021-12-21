<!DOCTYPE html>
<html>
<head>
    <title>Contratos</title>
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

<head>
<body>

<div class="container">
       <center><a href="../PHP/Admin.php"><img src="../Images/Notflix.PNG" width="300"></a></center>
<div class="container">
   

<center><H3><p style="color:#ffff80">Tabla de Contratos</p></H3></center>
<br>
<br>
    <table class="center">
        <tr>
            <td><b><p style="color:#68b9da">ID del Contrato</p></b></td> 
            <td><b><p style="color:#68b9da">Usuario</p></b></td> 
            <td><b><p style="color:#68b9da">Tipo de Contrato</p></b></td> 
            <td><b><p style="color:#68b9da">Fecha de Alta</p></b></td> 
            <td><b><p style="color:#68b9da">Fecha de Fin</p></b></td> 
            <td><b><p style="color:#68b9da">Vigencia</p></b></td> 
            <td><b><p style="color:#68b9da">Eliminar Contrato</p></b></td> 
        </tr>
        <?php 
        include "../PHP/conexion.php";
        $sql="SELECT * from Contracte";
        $date = date_create_from_format('Y-m-d', date('Y-m-d'));
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result) > 0){
        while($mostrar=mysqli_fetch_array($result)){
        ?>
            <tr>
            <td><center><?php echo $mostrar['idContracte'] ?></center></td> 
            <td><center><?php echo $mostrar['nomUsuari'] ?></center></td> 
            <td><center><?php echo $mostrar['tipusContracte'] ?></center></td> 
            <td><center><?php echo $mostrar['dataAlta'] ?></center></td> 
            <td><center><?php echo $mostrar['dataFinal'] ?></center></td> 
            <td><center><?php echo $mostrar['suscrit'] ?></center></td>
            <?php 
            $diff = date_diff($date,date_create($mostrar['dataFinal']));
                if($mostrar['suscrit'] == 0){
                    if($diff->d > 7){
                        ?>
                        <td><form method="post" action="eliminar_contrato.php">
                                <input type="hidden" name="idContracte" value="<?php echo $mostrar['idContracte'];?>">
                                <center><button type="submit" formaction="eliminar_contrato.php">Eliminar</button></center>
                            </form>
                        </td>
                        <?php
                    } 
            }
            ?>
        </tr>
        <?php
        }
    }
    ?>  
    </table>

</body>
</html>
</html>
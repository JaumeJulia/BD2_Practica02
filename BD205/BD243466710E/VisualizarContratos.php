<!DOCTYPE html>
<html>
<head>
    <title>Contratos</title>
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

    <center><a href="../PHP/Admin.php"><img src="../Images/Notflix.PNG" width="300"></a></center>';

<center><H3>Tabla de Contratos</H3></center>
<br>
<br>
    <table class="center">
        <tr>
            <td><b><p style="color:black">ID del Contrato</p></b></td> 
            <td><b><p style="color:black">Usuario</p></b></td> 
            <td><b><p style="color:black">Tipo de Contrato</p></b></td> 
            <td><b><p style="color:black">Fecha de Alta</p></b></td> 
            <td><b><p style="color:black">Vigencia</p></b></td> 
        </tr>
        <?php 
        include "../PHP/conexion.php";
        $sql="SELECT * from Contracte";
        $date = date('y-m-d');
        $result=mysqli_query($con,$sql);

        while($mostrar=mysqli_fetch_array($result)){
        ?>
            <tr>
            <td><center><?php echo $mostrar['idContracte'] ?></center></td> 
            <td><center><?php echo $mostrar['nomUsuari'] ?></center></td> 
            <td><center><?php echo $mostrar['tipusContracte'] ?></center></td> 
            <td><center><?php echo $mostrar['dataAlta'] ?></center></td> 
            <td><center><?php echo $mostrar['suscrit'] ?></center></td>
            <?php 
                if($mostrar['suscrit'] == 0){
                    if($mostrar['tipusContracte'] == "mensual"){
                        if(DATEDIFF($date, $mostrar['dataAlta']) > 37){
                            ?>
                            <td><form method="post" action="../BD243466710E/eliminar_contrato.php">
                                    <input type="hidden" name="idContracte" value="<?php echo $mostrar['idContracte'];?>">
                                    <center><button type="submit" formaction="../BD243466710E/eliminar_contrato.php">Eliminar</button></center>
                                    </form>
                            </td>
                            <?php
                        }
                    }else if($mostrar['tipusContracte'] == "trimestral"){
                        if(DATEDIFF($date, $mostrar['dataAlta']) > 97){
                            ?>
                            <td><form method="post" action="../BD243466710E/eliminar_contrato.php">
                                    <input type="hidden" name="idContracte" value="<?php echo $mostrar['idContracte'];?>">
                                    <center><button type="submit" formaction="../BD243466710E/eliminar_contrato.php">Eliminar</button></center>
                                    </form>
                            </td>
                            <?php
                        }
                }
            }
            ?>
        </tr>
        <?php
        }
    ?>  
    </table>

</body>
</html>
</html>
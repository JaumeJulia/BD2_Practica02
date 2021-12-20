<!DOCTYPE html>
<html>
<head>
    <title>Facturas</title>
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
    
    $user= $_GET['uname'];
    echo '<center><a href="../PHP/Usuario.php?uname='.$user.'"><img src="../Images/Notflix.PNG" width="300"></a></center>';
    ?>
<center><H3>Tabla de facturas</H3></center>
<br>
<br>
    <table class="center">
        <tr>
            <td><b><p style="color:black">idFactura</p></b></td> 
            <td><b><p style="color:black">idContracte</p></b></td> 
            <td><b><p style="color:black">Data</p></b></td> 
            <td><b><p style="color:black">Import</p></b></td> 
        </tr>
        <?php 
        include "../PHP/conexion.php";
        $sql="SELECT * from Contracte INNER JOIN Factura on Contracte.idContracte = Factura.idContracte WHERE Contracte.nomUsuari='".$user."'";
        
        $result=mysqli_query($con,$sql);
    if($result){
        while($mostrar=mysqli_fetch_array($result)){
        ?>
            <tr>
            <td><center><?php echo $mostrar['idFactura'] ?></center></td> 
            <td><center><?php echo $mostrar['idContracte'] ?></center></td> 
            <td><center><?php echo $mostrar['data'] ?></center></td> 
            <td><center><?php echo $mostrar['import'] ?>€</center></td> 
        </tr>
        <?php
        }
    }
    ?>  
    </table>

</body>
</html>
</html>
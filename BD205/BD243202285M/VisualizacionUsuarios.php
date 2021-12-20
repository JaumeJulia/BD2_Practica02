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
<center><a href="../PHP/Admin.php"><img src="../Images/Notflix.PNG" width="300"></a></center>';
<div class="container">
<br>

<?php
include "../PHP/conexion.php";

$cadena = "select * from usuari";
$resultat = mysqli_query($con,$cadena);
?>
<table align="center" class="center">
<tr>
    <td><center><b><p style="color:#68b9da">nomUsuari</p></b></center></td> 
    <td><center><b><p style="color:#68b9da">TipusUsuari</p></b></center></td> 
    <td><center><b><p style="color:#68b9da">Contrasenya</p></b></center></td> 
    <td><center><b><p style="color:#68b9da">NomiLlinatges</p></b></center></td> 
    <td><center><b><p style="color:#68b9da">Admin</p></b></center></td> 
    <td><center><b><p style="color:#68b9da">Modificar</p></b></center></td> 
    <td><center><b><p style="color:#68b9da">Eliminar</p></b></center></td> 
</tr>
<?php 
include "../PHP/conexion.php";

while($mostrar=mysqli_fetch_array($resultat)){
?>
    <tr>
    <td><center><?php echo $mostrar['nomUsuari'] ?></center></td> 
    <td><center><?php echo $mostrar['tipusUsuari'] ?></center></td> 
    <td><center><?php echo $mostrar['contrasenya'] ?></center></td> 
    <td><center><?php echo $mostrar['nomiLlinatges'] ?></center></td> 
    <td><center><?php echo $mostrar['admin'] ?></center></td> 
    <td><center><a href="InsercionContenido.php">Modifica</a></center></td> 
    <td><center><a href="InsercionContenido.php">Elimina</a></center></td> 

</tr>
<?php
}
?>  
</table>

</body>
</html>
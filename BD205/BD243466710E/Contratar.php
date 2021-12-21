<!DOCTYPE html>
<html>
<head>
    <title>Contratar</title>
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
    echo '<center><H3>Contratos</H3></center><br>';

    include "../PHP/conexion.php";

    $consultaContratoUsuario = 'SELECT contracte.suscrit, contracte.dataFinal FROM contracte WHERE contracte.nomUsuari = "'.$user.'"'; //sacamos el contrato del usuario si existe
    $contrato = mysqli_query($con, $consultaContratoUsuario);
    if(!empty($contrato) && mysqli_num_rows($contrato) > 0){
        $mostrar=mysqli_fetch_array($contrato);
        if($mostrar['suscrit'] == 1){
            $date = date_create_from_format('Y-m-d', date('Y-m-d'));
            $diff = date_diff($date,date_create($mostrar['dataFinal']));
            echo 'Su contrato sige vigente. Caduca en '.$diff->d. ' dias.';
        }else{
            ?>
            <center><form method="post" action ="actualizaContrato.php">
            Tipo de Contrato:
                <input type="radio" name="tipusContracte" value="mensual" checked>Mensual
                <input type="radio" name="tipusContracte" value="trimestral">Trimestral
                <input type="hidden" name="uname" value="<?php echo $user;?>">
                <input type="hidden" name="idContracte" value="<?php echo $mostrar['idContracte'];?>">
                <input type="submit" name="Aceptar" value="Aceptar"> 
            </form></center>
            <?php
        }

    }else{
        ?>
            <center><form method="post" action ="crearContrato.php">
            Tipo de Contrato:
                <input type="radio" name="tipusContracte" value="mensual" checked>Mensual
                <input type="radio" name="tipusContracte" value="trimestral">Trimestral
                <input type="hidden" name="uname" value="<?php echo $user;?>">
                <input type="submit" name="Aceptar" value="Aceptar"> 
            </form></center>
            <?php
    }
        
?>
</body>
</html>